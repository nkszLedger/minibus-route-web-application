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
            //alert(response['data'][0]['latitude']);
            for(var i=0; i<len; i++)
            {
                L.marker([response['data'][i]['latitude'], 
                          response['data'][i]['longitude']]).addTo(map)
                .bindPopup('Facility: ' + response['data'][i]['name']);
            }
        }
    }
});
