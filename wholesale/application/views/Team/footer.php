<script src="<?php echo base_url();?>admin/js/app.js" type="text/javascript"></script>

    <!-- end of global js -->

    <!-- begining of page level js -->

    <!-- EASY PIE CHART JS -->

    <script src="<?php echo base_url();?>admin/vendors/jquery.easy-pie-chart/js/easypiechart.min.js"></script>

    <script src="<?php echo base_url();?>admin/vendors/jquery.easy-pie-chart/js/jquery.easypiechart.min.js"></script>

    <script src="<?php echo base_url();?>admin/js/jquery.easingpie.js"></script>

    <!--end easy pie chart -->

    <!--for calendar-->

    <script src="<?php echo base_url();?>admin/vendors/moment/js/moment.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>admin/vendors/fullcalendar/js/fullcalendar.min.js" type="text/javascript"></script>

    <!--   Realtime Server Load  -->

    <script src="<?php echo base_url();?>admin/vendors/flotchart/js/jquery.flot.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>admin/vendors/flotchart/js/jquery.flot.resize.js" type="text/javascript"></script>

    <!--Sparkline Chart-->

    <script src="<?php echo base_url();?>admin/vendors/sparklinecharts/jquery.sparkline.js"></script>

    <!-- Back to Top-->

    <script type="text/javascript" src="<?php echo base_url();?>admin/vendors/countUp.js/js/countUp.js"></script>

    <!--   maps -->

    <script src="<?php echo base_url();?>admin/vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js"></script>

    <script src="<?php echo base_url();?>admin/vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js"></script>

    <script src="<?php echo base_url();?>admin/vendors/chartjs/Chart.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>admin/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

    <!--  todolist-->

    <script src="<?php echo base_url();?>admin/js/pages/todolist.js"></script>

    <script src="<?php echo base_url();?>admin/js/pages/dashboard.js" type="text/javascript"></script>

    <script type="text/javascript" src="<?php echo base_url();?>admin/vendors/datatables/js/jquery.dataTables.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>admin/vendors/datatables/js/dataTables.bootstrap.js"></script>

    

    <script type="text/javascript" src="<?php echo base_url();?>admin/vendors/jeditable/js/jquery.jeditable.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>admin/vendors/datatables/js/dataTables.buttons.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>admin/vendors/datatables/js/dataTables.colReorder.js"></script> 

    <script type="text/javascript" src="<?php echo base_url();?>admin/vendors/datatables/js/dataTables.responsive.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>admin/vendors/datatables/js/dataTables.rowReorder.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>admin/vendors/datatables/js/buttons.colVis.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>admin/vendors/datatables/js/buttons.html5.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>admin/vendors/datatables/js/buttons.print.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>admin/vendors/datatables/js/buttons.bootstrap.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>admin/vendors/datatables/js/pdfmake.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>admin/vendors/datatables/js/vfs_fonts.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>admin/vendors/datatables/js/dataTables.scroller.js"></script>
    
    
<!--text editor-->
    <script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
    
    <script>
	    CKEDITOR.replace( 'editor2' );
    </script>  
<!--text editor-->
    
<!-- 
    <script type="text/javascript" src="<?php echo base_url();?>admin/js/pages/table-advanced.js"></script> -->
       <script src="<?php echo base_url();?>admin/vendors/pickadate/js/picker.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>admin/vendors/pickadate/js/picker.date.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script>
       <!--  <script src="<?php echo base_url();?>admin/js/pages/datepicker.js" type="text/javascript"></script> -->
            <script src="<?php echo base_url();?>admin/vendors/daterangepicker/js/daterangepicker.js" type="text/javascript"></script>

     <script>

    $(document).ready(function() {

     var table = $('#table').DataTable({
        "paging":   true,
        "ordering": true,
        "info":     true
    });
  });
    </script>
<script type="text/javascript">
  $(document).ready(function() {
    //table tools example
    var table = $('#table1').DataTable({
        dom: 'Bfrtip',
        buttons: [
             'csv', 'pdf'
        ]

    });



    //re-order columns
    var table2 = $('#table2').dataTable({
        lengthMenu: [10, 25, 50, 100, 200, 500],
        responsive:true
    });

    new $.fn.dataTable.ColReorder(table2);


    // add row, delete row example
    var table3 = $('#table3').DataTable({
        "order": [
            [0, "desc"]
        ],
        responsive:true
    });
    //total number of existing rows
    var counter = 18;


    //row addition code
    $('#addButton').on('click', function() {
        table3.row.add([
            counter,
            counter + ' new',
            counter + ' user',
            counter + '_unique_user',
            counter + '_unique_user@domain.com'
        ]).draw();

        counter++;
    });

    //row deletion code

    $('#table3 tbody').on('click', 'tr', function() {
        if ($(this).hasClass('danger')) {
            $(this).removeClass('danger');
        } else {
            table3.$('tr.danger').removeClass('danger');
            $(this).addClass('danger');
        }
    });

    $('#delButton').click(function() {
        if (!$("#table3 tr").hasClass('danger')) {
            alert('please select a row first');
            //exit;
        }
        table3.row('.danger').remove().draw(false);
    });

});
$('#sample_5').dataTable( {

    "scrollY": "200px",
    "dom": "frtiS",
    "deferRender": true,
    responsive:true
});

$(document).ready(function() {
    var oTable;
    /* Apply the jEditable handlers to the table */
    $('#inline_edit tbody td').editable( function( sValue ) {
        /* Get the position of the current data from the node */
        var aPos = oTable.fnGetPosition( this );

        /* Get the data array for this row */
        var aData = oTable.fnGetData( aPos[0] );

        /* Update the data array and return the value */
        aData[ aPos[1] ] = sValue;
        return sValue;
    }, { "onblur": 'submit' } ); /* Submit the form when bluring a field */

    /* Init DataTables */
    oTable = $('#inline_edit').dataTable();
});


$("a.slide_menu").click(function(){
    $(this).toggleClass('active');
    $(this).next('.inner_menu').toggleClass('active');
  //$(".inner_menu").addClass("intro");
});
</script>


    <!-- end of page level js -->
    
    

</body>



</html>

