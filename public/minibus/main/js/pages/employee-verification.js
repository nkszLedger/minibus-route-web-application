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
            var strcheckbox1 = 'associationapprovedcheckbox_' + employee_id.toString();
            var strcheckbox2 = 'isletterissuedcheckbox_' + employee_id.toString();
            var strcheckbox3 = 'islettersignedcheckbox_' + employee_id.toString();

            var val1 = 0;
            var val2 = 0;
            var val3 = 0;

            if( document.getElementById(strcheckbox1).checked )
            { val1 = 1; }
            if( document.getElementById(strcheckbox2).checked )
            { val2 = 1; }
            if( document.getElementById(strcheckbox3).checked )
            { val3 = 1; }

            var url_path = window.location.origin 
                + "/employees_verification/" + employee_id.toString() 
                + "/association/" + val1.toString()
                + "/issued/" + val2.toString() 
                + "/signed/" + val3.toString();

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