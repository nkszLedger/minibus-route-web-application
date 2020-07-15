
$(function() {
    "use strict";

    var ekurhuleni_count = 0;
    var jhb_count = 0;
    var sedibeng_count = 0;
    var tshwane_count = 0;
    var westrand_count = 0;
    var unknown_count = 0;

    var url_path = window.location.origin + "/getEmployeeRegionDistribution";

    $.ajax({
        url: url_path,
        type: 'GET',
        dataType: 'json',
        async: false,
        success: function(response)
        { 
            ekurhuleni_count = response['ekurhuleni_count'];
            jhb_count = response['jhb_count'];
            sedibeng_count = response['sedibeng_count'];
            tshwane_count = response['tshwane_count']; 
            westrand_count = response['westrand_count'];
            unknown_count = response['unknown_count'];
        },
        error: function() {
            console.log(this.url);
        }
    });
    
    // ------------------------------
    // Basic pie chart
    // ------------------------------
    // based on prepared DOM, initialize echarts instance
        var basicpieChart = echarts.init(document.getElementById('basic-pie'));
        var option = {
            // Add title
                title: {
                    text: 'Employee Count Distribution By Region',
                    subtext: 'A Physical Distribution Representation',
                    x: 'center'
                },

                // Add tooltip
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },

                // Add legend
                legend: {
                    orient: 'vertical',
                    x: 'left',
                    data: ['Ekurhuleni', 'Johannesburg', 'Sedibeng', 'Tswane', 'Westrand', 'Unknown']
                },

                // Add custom colors
                color: ['#689f38', '#38649f', '#389f99', '#ee1044', '#ff8f00', '#d5d5d5'],

                // Display toolbox
                toolbox: {
                    show: true,
                    orient: 'vertical',
                    feature: {
                        mark: {
                            show: true,
                            title: {
                                mark: 'Markline switch',
                                markUndo: 'Undo markline',
                                markClear: 'Clear markline'
                            }
                        },
                        dataView: {
                            show: true,
                            readOnly: false,
                            title: 'View data',
                            lang: ['View chart data', 'Close', 'Update']
                        },
                        magicType: {
                            show: true,
                            title: {
                                pie: 'Switch to pies',
                                funnel: 'Switch to funnel',
                            },
                            type: ['pie', 'funnel'],
                            option: {
                                funnel: {
                                    x: '25%',
                                    y: '20%',
                                    width: '50%',
                                    height: '70%',
                                    funnelAlign: 'left',
                                    max: 1548
                                }
                            }
                        },
                        restore: {
                            show: true,
                            title: 'Restore'
                        },
                        saveAsImage: {
                            show: true,
                            title: 'Same as image',
                            lang: ['Save']
                        }
                    }
                },

                // Enable drag recalculate
                calculable: true,

                // Add series
                series: [{
                    name: 'Regions',
                    type: 'pie',
                    radius: '70%',
                    center: ['50%', '57.5%'],
                    data: [
                        {value: ekurhuleni_count, name: 'Ekurhuleni'},
                        {value: jhb_count, name: 'Johannesburg'},
                        {value: sedibeng_count, name: 'Sedibeng'},
                        {value: tshwane_count, name: 'Tswane'},
                        {value: westrand_count, name: 'Westrand'},
                        {value: unknown_count, name: 'Unknown'},
                    ]

                }]
        };
    
        basicpieChart.setOption(option);
});