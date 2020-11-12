$(function () {
    "use strict";

    $('#region_selector').change(function(){
        var region_id = $(this).val();
        var taxi_rank_id = document.getElementById('taxi_rank_selector').value;
        
        var url_path = window.location.origin 
        + "/filterByRegionID/"+ region_id.toString() 
        + "/" + taxi_rank_id.toString();

        $.ajax({
            url: url_path,
            type: 'GET',
            dataType: 'json',
            success: function(response)
            { 
                $('#employee_count').html(response['employee_count'].toString());
                $('#route_count').html(response['route_count'].toString());
                $('#association_count').html(response['association_count'].toString());
                $('#taxi_ranks_count').html(response['taxi_ranks_count'].toString());
                $('#verified_count').html(response['verified_employees_count'].toString());

                var len = 0;
				if(response['taxi_ranks'] != null){
					len = response['taxi_ranks'].length;
                }
                
                if(len > 0)
                {
                    $("#taxi_rank_selector").html('');
                    var option = "<option value=0> All </option>";
                    $("#taxi_rank_selector").append(option);
                    
                    // Read data and create <option>
					for(var i=0; i<len; i++){

						var id = response['taxi_ranks'][i].organization.facility.id;
                        var name = response['taxi_ranks'][i].organization.facility.name;
                        
						var option = "<option value='"+id+"'>"+name+"</option>";
						$("#taxi_rank_selector").append(option);
					}
				}


                document.getElementById('driver_count').value =  0;

                var dataset = [];
                var len = response['employees'].length;

                for(var i=0; i<len; i++){
                    var record = [  response['employees'][i]['name'], 
                                    response['employees'][i]['surname'],
                                    response['employees'][i]['position']
                                ];
                    dataset.push(record);
                }
                
                $('#employee_captured_per_region').DataTable({
                    data: dataset,
                    pageLength: 5,
                    destroy: true,
                    columns: [
                        { title: "Name" },
                        { title: "Surname" },
                        { title: "Position" },
                    ]
                });

                $('#flotPie2').html('');
                
                var cManager = response['manager'];
                var cMarshall = response['marshall'];
                var cCoordinator = response['coordinator'];
                var cSquad = response['squad'];
                var cOther = response['other'];

                var piedata = [
                        { label: "Managers", data: [[1,cManager]], color: '#38649f'},
                        { label: "Marshalls", data: [[1,cMarshall]], color: '#389f99'},
                        { label: "Coordinators", data: [[1,cCoordinator]], color: '#689f38'},
                        { label: "Squad Patrol", data: [[1,cSquad]], color: '#d5d5d5'},
                        { label: "Other", data: [[1,cOther]], color: '#ee1044'},
                    ];
                
                    $.plot('#flotPie2', piedata, {
                        series: {
                            pie: {
                                show: true,
                                radius: 1,
                                innerRadius: 0.5,
                                label: {
                                    show: true,
                                    radius: 2/3,
                                    formatter: labelFormatter,
                                    threshold: 0.1
                                }
                            }
                        },
                        grid: {
                            hoverable: true,
                            clickable: true
                        }
                    });
                
                function labelFormatter(label, series) {
                    return "<div style='font-size:8pt; text-align:center; padding:2px; color:white;'>" + label + "<br/>" + Math.round(series.percent) + "%</div>";
                }

            },
            error: function() {
                console.log(this.url);
            }
        });
    });
});
