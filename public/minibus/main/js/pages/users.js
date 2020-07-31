function verify(state)
{
    return swal({   
        title: "User Activity",   
        text: "Are you sure you want to deactivate user ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, deactivate!",   
        cancelButtonText: "No, cancel plx!",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, 
    function(isConfirm)
    {   
        if (isConfirm) 
        {
            var id = 0;
            var url_path = "";

            if( state == '0') { 
                id = document.getElementById("deactivate").value;
                url_path = window.location.origin + "/users/deactivate/"+ id.toString();
                $.ajax({
                    url: url_path,
                    type: 'GET',
                    async: false, 
                    success: function(response) 
                    { 
                        swal("Deactivated!", "User Profile has been deactivated", "success");  
                        window.location.reload(); 
                    },
                    error: swal("Unsuccessful", "User could not be deactivated", "error"),
                });
            }
            else { 
                id = document.getElementById("activate").value; 
                url_path = window.location.origin + "/users/activate/"+ id.toString();

                $.ajax({
                    url: url_path,
                    type: 'GET',
                    async: false, 
                    success: function(response) 
                    { 
                        swal("Deactivated!", "User Profile has been activated", "success");  
                        window.location.reload(); 
                    },
                    error: swal("Unsuccessful", "User could not be activated", "error"),
                });
            }
        } 
        else {     
            swal("Cancelled", "User status update action cancelled", "error");
        }
    });
}