$('#eregion').change(function(){
    var id = $(this).val();

    $('#eassociation').find('option').not(':first').remove();

    var url_path = window.location.origin + "/employees/getAssociations/"+ id.toString();
    $.ajax({
        url: url_path,
        type: 'GET',
        dataType: 'json',
        success: function(response){

            var len = 0;
            if(response['data'] != null){
                len = response['data'].length;
            }

            if(len > 0){
                // Read data and create <option >
                for(var i=0; i<len; i++){

                    var id = response['data'][i].association_id;
                    var name = response['data'][i].name;

                    console.log('the loop');
                    console.log(name);

                    var option = "<option value='"+id+"'>"+name+"</option>";

                    console.log('the option to append');
                    console.log(option);
                    $("#eassociation").append(option);
                }
                console.log('outside loop');
            }

        },
        error: function() {
            console.log(this.url);
        }
    });
});
