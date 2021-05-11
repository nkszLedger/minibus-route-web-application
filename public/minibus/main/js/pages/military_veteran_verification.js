function verifyMilitaryVeteran(military_veteran_id)
{
    return swal({   
        title: "Military Veteran Verification Status",   
        text: "You are about to save Military Veteran Verification State. Continue ?",   
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
            var strcheckbox1 = 'associationapprovedcheckbox_mv_' + military_veteran_id.toString();
            var strcheckbox2 = 'isletterissuedcheckbox_mv_' + military_veteran_id.toString();
            var strcheckbox3 = 'islettersignedcheckbox_mv_' + military_veteran_id.toString();
            var strcheckbox4 = 'isbankingdetailsconfirmedcheckbox_mv_' + military_veteran_id.toString();

            var val1 = 0;
            var val2 = 0;
            var val3 = 0;
            var val4 = 0;

            if( document.getElementById(strcheckbox1).checked )
            { val1 = 1; }
            if( document.getElementById(strcheckbox2).checked )
            { val2 = 1; }
            if( document.getElementById(strcheckbox3).checked )
            { val3 = 1; }
            if( document.getElementById(strcheckbox4).checked )
            { val4 = 1; }

            var url_path = window.location.origin 
                + "/military_veteran_verification/" + military_veteran_id.toString() 
                + "/association/" + val1.toString()
                + "/issued/" + val2.toString() 
                + "/signed/" + val3.toString()
                + "/confirmed/" + val4.toString();

            $.ajax({
                url: url_path,
                type: 'GET',
                async: false, 
                success: function(response) 
                { 
                    swal("Updated!", 
                        "Military Veteran Verification state has been updated", "success");  
                    window.location.reload(); 
                },
                error: swal("Failed to Update", 
                    "Military Veteran Verification State could not be updated", "error"),
            });
                  
        } 
        else {     
            swal("Cancelled", 
                "Military Veteran Verification State update action cancelled", "error");
        }
    });
}