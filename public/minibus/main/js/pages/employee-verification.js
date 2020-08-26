function verify(employee_id)
{
    return swal({   
        title: "Employee Verification Status",   
        text: "You are about to save Employee Verification State. Continue ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, save verification-state!",   
        cancelButtonText: "No, cancel plx!",   
        closeOnConfirm: false,   
        closeOnCancel: false 
    }, 
    function(isConfirm)
    {   
        if (isConfirm) 
        {
            var association_approved = 0;
            var letter_issued = 0;
            var letter_signed = 0;

            var url_path = "";//window.location.origin + "/employees/verify/"+ employee_id.toString();

            $.ajax({
                url: url_path,
                type: 'GET',
                async: false, 
                success: function(response) 
                { 
                    swal("Updated!", "Employee Verification state has been updated", "success");  
                    window.location.reload(); 
                },
                error: swal("Failed to Update","Employee Verification State could not be updated", "error"),
            });
                  
        } 
        else {     
            swal("Cancelled", "Employee Verification State update action cancelled", "error");
        }
    });
}