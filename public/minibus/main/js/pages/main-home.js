$(function () {
    "use strict";

    /* Monitoring & Regulation System General - MANAGE MILITARY VETERANS */

    $("#list_of_delegated_schools").change(function () 
    {
        var count = $('#list_of_delegated_schools :selected').length;

        if(  count > 1 )
        {
            swal("Exceeded!", "Number of selected schools are more than the number specified", "error"); 
        }
    });
    
});