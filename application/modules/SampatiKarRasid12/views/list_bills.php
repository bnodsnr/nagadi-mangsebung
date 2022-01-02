

 <!--main content start-->

 <section id="main-content">

  <section class="wrapper site-min-height">

    <nav aria-label="breadcrumb">

      <ol class="breadcrumb">

        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> गृहपृष्ठ</a>

        </li>

        <li class="breadcrumb-item"><a href="javascript:;">सम्पतीकर - भूमिकर नगदी रसिद</a></li>

      </ol>

    </nav>

    <!-- page start-->

    <div class="row">

      <div class="col-sm-12">

        <?php $success_message = $this->session->flashdata("MSG_SUCCESS");

                      if(!empty($success_message)) { ?>

        <div class="alert alert-success">

          <button class="close" data-close="alert"></button>

          <span> <?php echo $success_message;?> </span>

        </div>

        <?php } ?>

        <section class="card">

          <header class="card-header">

            <div class="mail-option">

              <div class="btn-group hidden-phone">

                <input type="text" class="form-control" id="file_no" placeholder="क्र.स नम्बर:">

              </div>

              <div class="btn-group hidden-phone">

                <input type="text" class="form-control" id="bill_no" placeholder="रसिद नम्बर">

              </div>

              <div class="btn-group hidden-phone">

                <!-- <input type="text" class="form-control" id="from_date" placeholder="देखी मिति"> -->

                <div class="input-group">

                  <input type="text" name="from_date" class="form-control " value="" placeholder="देखी मिति" autocomplete="off" id="fromdate">

                  <div class="input-group-prepend">

                    <button type="button" class="input-group-text btn btn-danger" title=""><i class="fa fa-calendar" style="color:#1b5693;background: radial-gradient(#ffffff, transparent);"></i></button>

                  </div>

                </div>

              </div>

              <div class="btn-group hidden-phone">

                <!-- <input type="text" class="form-control" id="to_date" placeholder="सम्म मिति"> -->

                <div class="input-group">

                  <input type="text" name="to_date" class="form-control nepali-calendar" value="" placeholder="सम्म मिति" autocomplete="off" id="todate">

                  <div class="input-group-prepend">

                    <button type="button" class="input-group-text btn btn-danger" title=""><i class="fa fa-calendar" style="color:#1b5693;background: radial-gradient(#ffffff, transparent);"></i></button>

                  </div>

                </div>

              </div>

              <div class="btn-group hidden-phone">

                <div class="">

                  <button type="button" class="btn btn-warning" title="खोजी गर्नुहोस्" id="filter">खोजी गर्नुहोस्</button>

                  <a href="<?php echo base_url()?>SampatiKarRasid/viewCancelBills" class="btn btn-warning" style="background-color: #1b5693;color:#fff">रद्द गरिएको रसिदको सुची हेर्नुहोस</a>

                </div>

              </div>

            </div>

          </header>

          <div class="card-body">

            <!-- <div class="adv-table "> -->

              <table class=" table table-bordered table-striped" id="listtable">

                <thead style="background: #1b5693; color:#fff">

                  <tr>

                    <th text-aligh="right">#</th>

                    <th>मिति</th>

                    <th> क्र.स नम्बर</th>

                    <th>जग्गाधनिको नाम</th>

                    <th>रसिद नम्बर</th>

                    <th>सम्पतीकर</th>

                    <th>भूमिकर</th>

                    <th>अवस्था</th>

                    <th>रशिद काट्ने नाम</th>
                    <?php if($this->session->userdata("PRJ_USER_ID") != "") {?>
                        <th class="hidden-phone"></th>
                    <?php } ?>
                    
                    <th class="hidden-phone"></th>

                  </tr>

                </thead>

              </table>

           <!--  </div> -->

          </div>

        </section>

      </div>

    </div>

    <!-- page end-->

  </section>

 </section>

<script src="<?php echo base_url('assets/datatable/datatables.min.js') ?>"></script>

<script type="text/javascript" src="<?php echo base_url()?>assets/nepali_datepicker/nepali.datepicker.v2.2.min.js"></script>

<script type="text/javascript">

  $(document).ready(function(){

    $('#fromdate').nepaliDatePicker();

    $('#todate').nepaliDatePicker();

    fetch_all_data();

    function fetch_all_data(file_no= '', bill_no= '', from_date, to_date){

      var oTable = $('#listtable').DataTable({

        "order": [[ 0, "desc" ]],

        "searching": false,

        'lengthChange':false,

        "processing": true,

        "serverSide": true,

        'language': {

            'loadingRecords': '&nbsp;',

            'processing': '<div class="spinner"></div>'

        },

        "ajax":{

          "url": "<?php echo base_url('SampatiKarRasid/GetBills') ?>",

          "dataType": "json",

          "type": "POST",

          "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', file_no:file_no, bill_no:bill_no}

          },

        "columns": [

              { "data": "sn" },

              { "data": "billing_date" },

              { "data": "nb_file_no" },

              { "data": "land_owner_name_np" },

              { "data": "bill_no" },

              { "data": "sampati_kar" },

              { "data": "bhumi_kar" },

              // { "data": "status" },



              {

                "data": "", render: function ( data, type, row ) {

                    if(row.status == 'सदर')

                    var res = '<a class="btn btn-success">'+row.status+'</a>';

                    else {

                      var res = '<a class="btn btn-danger btn-sm"  data-toggle="modal" href="#previewModel" data-url="<?php echo base_url()?>SampatiKarRasid/viewReason" data-id = "'+row.bill_no_en+'"">'+row.status+'</a>';

                    }

                        

                      return res;

                }, "bVisible": true, "bSearchable": false, "bSortable": false

              },





              { "data": "user_name" },
               <?php if($this->session->userdata('PRJ_USER_ID') !="") { ?>

              {

                "data": "", render: function ( data, type, row ) {

                  <?php if($this->authlibrary->HasModulePermission('SAMPATI-RASID', 'VIEW')) { ?>
                     
                       if(row.pstatus == 1 ) {

                       res = '<a class="btn btn-danger btn-sm"  data-toggle="modal" href="#editModel" data-url="<?php echo base_url()?>SampatiKarRasid/CancelBill" data-id = "'+row.id+'"">रद्द गर्नुहोस्</a>';

                      } else {
                        res = '<p>कार्य उपलब्ध छैन</p>'
                      } 
                      return res;

                  <?php }  ?>

                }, "bVisible": true, "bSearchable": false, "bSortable": false

              },
            <?php }  ?>


              {

                "data": "", render: function ( data, type, row ) {

                  <?php if($this->authlibrary->HasModulePermission('SAMPATI-RASID', 'VIEW')) { ?>

                    var res = '<a class="btn btn-warning btn-sm" href = "<?php echo base_url()?>SampatiKarRasid/viewRasid/'+row.bill_no_en+'" target="_blank">विवरण हेर्नुहोस</a>';
                      return res;

                  <?php } ?>

                }, "bVisible": true, "bSearchable": false, "bSortable": false

              },





           ] 

      });

    }



    

    $('#filter').click(function(){

      var file_no     = $('#file_no').val();

      var bill_no  = $('#bill_no').val();

      var from_date  = $('#from_date').val();

      var to_date  = $('#to_date').val();

      $('#listtable').DataTable().destroy();

      fetch_all_data(file_no, bill_no,from_date, to_date);

    });

    

    $(document).on('click','.btn-delete', function(e){

      //e.preventDefault();

      var id = $(this).data('id'); //Fetch id from modal trigger button

      var url = $(this).data('url');

      //alert(url);

      if (confirm("Are you sure want to delete?") == true) {

              $.ajax({

                type : 'POST',

                url : url, //Here you will fetch records 

                data: {id:id,'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'}, //Pass $id

                success : function(resp){

                  console.log(resp);

                //   return;

                  if(resp.status == 'success') {

                    toastr.options = {

                      "closeButton": true,

                      "debug": true,

                      "progressBar": true,

                      "positionClass": "toast-top-right",

                      "showDuration": "200",

                      "hideDuration": "1000",

                      "timeOut": "3000",

                      "extendedTimeOut": "1000",

                      "showEasing": "swing",

                      "hideEasing": "linear",

                      "showMethod": "fadeIn",

                      "hideMethod": "fadeOut"

                    };

                    toastr.success(resp.data);

                    setTimeout(function(){ 

                      location.reload();

                    }, 2000);

                  } else {

                    toastr.options = {

                      "closeButton": true,

                      "debug": true,

                      "progressBar": true,

                      "positionClass": "toast-top-right",

                      "showDuration": "300",

                      "hideDuration": "1000",

                      "timeOut": "5000",

                      "extendedTimeOut": "1000",

                      "showEasing": "swing",

                      "hideEasing": "linear",

                      "showMethod": "fadeIn",

                      "hideMethod": "fadeOut"

                    };

                    toastr.success(resp.data);

                    setTimeout(function(){ 

                      location.reload();

                    }, 2000);

                  }

                 }

              });

      } else {

        return false;

      }

    });

  });

</script>

