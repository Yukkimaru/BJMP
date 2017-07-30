<?php include_once('first.php'); ?>
<?php include_once('header.php'); ?>
<?php include_once('sidebar.php'); ?>

<?php include_once('config.php'); ?>
<head>
    
    <title>Records | Fugitives</title>

    <!-- bootstrap-wysiwyg -->
    <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">    
  </head>
 <body onload="viewData()">
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Fugitives <small> Records</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <!--start form here-->
                     <button class="btn btn-primary" data-toggle="modal" data-target="#addData">Insert Fugtive Data</button>
                    <!-- Modal -->
                    <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="addLabel">Insert Fugtive Data</h4>
                          </div>
                          <form>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="firstname">First Name</label>
                              <input type="text" class="form-control" id="firstname" placeholder="Enter first name">
                            </div>
                            <div class="form-group">
                              <label for="lastname">Last Name</label>
                              <input type="text" class="form-control" id="lastname" placeholder="Enter last name">
                            </div>
                            <div class="form-group">
                              <label for="middlename">Middle Name</label>
                              <input type="text" class="form-control" id="middlename" placeholder="Enter middle name">
                            </div>
                            <div class="form-group">
                              <label for="age">Age</label>
                              <input type="number" class="form-control" id="age" placeholder="Enter Age">
                            </div>
                            <div class="form-group">
                              <label for="datemissing">Date Missing</label>
                              <input type="text" class="form-control" id="datemissing" placeholder="MM/DD/YYYY">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" onclick="saveData()" class="btn btn-primary">Save</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div id="result"></div>
                    <p></p>
                    <!--// end form here-->
                    <br />

                    <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th width="40">ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Middle Name</th>
                          <th>Age</th>
                          <th>Date Missing</th>
                          <th width="150">Action</th>
                        </tr>
                      </thead>

                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>               
            </div>
          </div>
        </div>
        <!-- /page content -->

    <!-- bootstrap-wysiwyg -->
    <script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../vendors/starrr/dist/starrr.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
      function saveData() {
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var middlename = $('#middlename').val();
        var age = $('#age').val();
        var datemissing = $('#datemissing').val();
        $.ajax({
          type: "POST",
          url: "fugitives_records_server.php?p=add",
          data: "firstname="+firstname+"&lastname="+lastname+"&middlename="+middlename+"&age="+age+"&datemissing="+datemissing,
          success: function(data){
            viewData();
          }
        });
      }

      function viewData() {
        $.ajax({
          type: "GET",
          url: "fugitives_records_server.php",
          success: function(data){
            $('tbody').html(data);
          }
        });
      }

      function updateData(str) {
        var id          = str;
        var firstname   = $('#firstname-'+str).val();
        var lastname    = $('#lastname-'+str).val();
        var middlename  = $('#middlename-'+str).val();
        var age         = $('#age-'+str).val();
        var datemissing = $('#datemissing-'+str).val();
        $.ajax({
          type: "POST",
          url: "fugitives_records_server.php?p=edit",
          data: "firstname="+firstname+"&lastname="+lastname+"&middlename="+middlename+"&age="+age+"&datemissing="+datemissing+"&id="+id,
          success: function(data) {
            viewData();
          }
        });
      }
    </script>
    <?php include_once('last.php'); ?>
