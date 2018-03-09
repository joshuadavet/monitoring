var TableAdvanced = function (student_ID) {

    var initTable1 = function(student_ID) {

        /* Formatting function for row details */
        AjaxGet = function (grade_ID) {
            var result = $.ajax({
                type: "POST",
                 url:"report_card_json.php?scores&student_ID="+student_ID, 
               param: '{}',
                data:{
                    grade_ID:grade_ID
                },
                dataType:"html",
               async: false, 
                success: function (data) { 
                    // nothing needed here 
              }
            }) .responseText ;
            return  result;
        }
        

        /*
         * Insert a 'details' column to the table
         */
         /*
        var nCloneTh = document.createElement( 'th' );
        var nCloneTd = document.createElement( 'td' );
        nCloneTd.innerHTML = '<span class="row-details row-details-close"></span>';
         
        $('#report_card thead tr').each( function () {
            this.insertBefore( nCloneTh, this.childNodes[0] );
        } );
         
        $('#report_card tbody tr').each( function () {
            this.insertBefore(  nCloneTd.cloneNode( true ), this.childNodes[0] );
        } );
         */
        /*
         * Initialize DataTables, with no sorting on the 'details' column
         */
        var oTable = $('#report_card').dataTable( {
            "aoColumnDefs": [
                {"bSortable": false, "aTargets": [ 1 ] }
            ],
            "bPaginate": false,
            "bInfo": false,
             "bFilter": false,
            "aaSorting": [[1, 'asc']],
            "bSort" : false,
             "aLengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "iDisplayLength": 10,
            "sAjaxSource":"report_card_json.php?view&student_ID="+student_ID,
            "sAjaxDataProp":"data"
        });

        jQuery('#report_card_1_wrapper .dataTables_filter input').addClass("form-control input-small"); // modify table search input
        jQuery('#report_card_1_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
        jQuery('#report_card_1_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
         
        /* Add event listener for opening and closing details
         * Note that the indicator for showing which row is open is not controlled by DataTables,
         * rather it is done here
         */
        $('#report_card').on('click', ' tbody td #name', function () {
            var nTr = $(this).parents('tr')[0];
            var aData = oTable.fnGetData( nTr );
           // alert($(this).attr( "id-grading" ))
            if ( oTable.fnIsOpen(nTr) )
            {
                /* This row is already open - close it */
                $(this).addClass("row-details-close").removeClass("row-details-open");
                oTable.fnClose( nTr );
            }
            else
            {
                /* Open this row */                
                $(this).addClass("row-details-open").removeClass("row-details-close");
                oTable.fnOpen( nTr,  AjaxGet($(this).attr( "id-grading" )), 'details' );
            }
        });
    }

    return {

        //main function to initiate the module
        init: function (student_ID) {
            
            if (!jQuery().dataTable) {
                return;
            }
           
            initTable1(student_ID);
        }

    };

}();