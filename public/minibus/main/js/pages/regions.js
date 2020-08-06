
$('#region_selector').change(function(){
    var id = $(this).val();
    
    var url_path = window.location.origin + "/filterByRegionID/"+ id.toString();

    $.ajax({
        url: url_path,
        type: 'GET',
        dataType: 'json',
        success: function(response)
        { 
            $('#employee_count').html(response['employee_count'].toString());
            $('#route_count').html(response['route_count'].toString());
            $('#association_count').html(response['association_count'].toString());

            document.getElementById('operator_count').value = 0;
            document.getElementById('driver_count').value =  0;

            $('#flotPie2').html('');

            cManager = response['manager'];
            cMarshall = response['marshall'];
            cCoordinator = response['coordinator'];
            cSquad = response['squad'];
            cOther = response['other'];

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
