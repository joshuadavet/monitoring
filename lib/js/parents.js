var displayReportCard = function () {

    var reportCards = function() {
        var parent_ID = 1;
        /* Formatting function for row details */
      

       AjaxGet = function (grade_ID) {
            var result = $.ajax({
                type: "POST",
                 url:"data.php?scores", 
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
            //"sAjaxSource":"report_card_json.php?view",
          //  "sAjaxDataProp":"data"
        });

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
        init: function () {
            
            if (!jQuery().dataTable) {
                return;
            }

            reportCards();
        }

    };

}();