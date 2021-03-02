//[Data Table Javascript]

//Project:	VoiceX Admin - Responsive Admin Template
//Primary use:   Used only for the Data Table

$(function () {
    "use strict";

    $('#example1').DataTable();
    $('#employee_captured_per_region').DataTable({
        pageLength: 5,
        'lengthChange': false,
        'searching'   : true,
    });
    $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
    });	
	
	$('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
            { 
                extend: 'csv', 
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                },
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8,
                                10, 11, 12, 13, 14, 15,
                                16, 17, 18, 19, 20, 21],
                },
            },
            {
                extend: 'pdf',
                alignment: "center",
                orientation: 'landscape',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8],
                    modifier: {
                        page: 'current'
                    }
                },
            },
            {
                extend: 'print',
                alignment: "center",
                orientation: 'landscape',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 8]
                },
            }
            //'copy', 'csv', 'excel', 'pdf', 'print'
	  ]
    } );
    
    $('#mvdatatable').DataTable( {
		dom: 'Bfrtip',
		buttons: [
            { 
                extend: 'csv', 
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 9,
                                10, 11, 12, 13, 14, 15,
                                16, 17, 18, 19, 20, 21,
                                22, 23, 24, 25, 26, 27, 
                                28, 29, 30, 31],
                },
            },
            {
                extend: 'excel',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7, 9, 
                                10, 11, 12, 13, 14, 15,
                                16, 17, 18, 19, 20, 21,
                                22, 23, 24, 25, 26, 27, 
                                28, 29, 30, 31],
                },
            },
            {
                extend: 'pdf',
                alignment: "center",
                orientation: 'landscape',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7],
                    modifier: {
                        page: 'current'
                    }
                },
            },
            {
                extend: 'print',
                alignment: "center",
                orientation: 'landscape',
                exportOptions: {
                    columns: [0, 1, 2, 3, 4, 5, 6, 7]
                },
            }
            //'copy', 'csv', 'excel', 'pdf', 'print'
	  ]
	} );
	
	$('#tickets').DataTable({
	  'paging'      : true,
	  'lengthChange': true,
	  'searching'   : true,
	  'ordering'    : true,
	  'info'        : true,
	  'autoWidth'   : false,
	});
	
	$('#productorder').DataTable({
	  'paging'      : true,
	  'lengthChange': true,
	  'searching'   : true,
	  'ordering'    : true,
	  'info'        : true,
	  'autoWidth'   : false,
	});
	

	$('#complex_header').DataTable();
	
	//--------Individual column searching
	
    // Setup - add a text input to each footer cell
    $('#example5 tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example5').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
	
	
	//---------------Form inputs
	var table = $('#example6').DataTable();
 
    $('button').click( function() 
    {
        //var data = table.$('input, select').serialize(); 
    });


  }); // End of use strict
