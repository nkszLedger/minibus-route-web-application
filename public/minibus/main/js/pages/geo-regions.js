var map = L.map('map').setView([-26.2050000, 28.0497220], 6);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var url_path = window.location.origin + "/getAllFacilities";

$.ajax({
    url: url_path,
    type: 'GET',
    dataType: 'json',
    success: function(response){

        var len = 0;
        if(response['data'] != null){
            len = response['data'].length;
        }

        if(len > 0)
        {
            for(var i=0; i<len; i++)
            {
                var text = 'Facility: ' + response['data'][i]['facility']['name']
                            + '\n' + 
                            'Managers: ' + response['data'][i]['c_managers']
                            + '\n' +
                            'Coordinators: ' + response['data'][i]['c_coordinators']
                            + '\n' +
                            'Marshalls: ' + response['data'][i]['c_marshalls']
                            + '\n' +
                            'Squad Patrol: ' + response['data'][i]['c_squad']
                            + '\n' +
                            'Other: ' + response['data'][i]['c_other'];

                
                L.marker([response['data'][i]['facility']['latitude'], 
                                response['data'][i]['facility']['longitude']]).addTo(map)
                                .bindPopup(text);
                // if( response['data'][i]['c_managers'] > 0 )
                //     marker._icon.classList.add("filter: hue-rotate(120deg);");
            }
        }
    }
});
