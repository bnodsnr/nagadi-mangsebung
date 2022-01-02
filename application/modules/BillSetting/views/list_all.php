 <!--dynamic table-->
    <link href="<?php echo base_url()?>assets/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/assets/data-tables/DT_bootstrap.css" />
<!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> गृहपृष्ठ</a></li>
                  <li class="breadcrumb-item" ><a href="<?php echo base_url()?>BillSetting" style="color:red" > रसिद  विवरण </a></li>
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
                    रसिद विवरण
                    <span class="tools">
                      <?php if($this->authlibrary->HasModulePermission('BILL-SETTING', "ADD")) { ?>
                      <a class="btn btn-primary btn-sm pull-right" style="color:#FFF"  href="<?php echo base_url()?>BillSetting/add"><i class="fa fa-plus"></i> नयाँ थप्नुहोस् </a>
                      <?php } ?>
                    </span>
                    </header>
                    <div class="card-body">
                      <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="dynamic-table">
                          <thead style="background: #1b5693; color:#fff">
                              <tr>
                                <th text-aligh="right">#</th> 
                                <th>आ  व</th>
                              <th>वडा </th>
                                <th>प्रयोगकर्ता</th>
                                <th>रसिद को किसिम </th>
                                <th>रसिद विवरण</th>
                                 <?php if($this->authlibrary->HasModulePermission('BILL-SETTING', "EDIT") || $this->authlibrary->HasModulePermission('BILL-SETTING', "DELETE") ) { ?>
                                  <th class="hidden-phone">.....</th>
                                <?php } ?>
                              </tr>
                          </thead>
                          <tbody>
                            <?php if(!empty($bill_details)) :
                              $i = 1;
                              foreach($bill_details as $key => $value) : ?>
                              <tr class="gradeX">
                                  <td><?php echo $this->mylibrary->convertedcit($i++)?></td>
                                  <td><p class="badge badge-sm badge-info"><?php echo $this->mylibrary->convertedcit($value['fiscal_year'])?></p></td>
                                  <td><?php echo $this->mylibrary->convertedcit($value['ward'])?></td>
                                  <td><?php echo $value['name']?></td>
                                  <td>
                                      <?php if($value['bill_type'] == 1 ) {
                                          echo 'नगदी';
                                      } else {
                                          echo 'सम्पति भूमिकर';
                                      } ?>
                                  </td>
                                  <td><?php echo $value['bill_from'].'-'. $value['bill_to']?></td>
                                  <?php if($this->authlibrary->HasModulePermission('BILL-SETTING', "EDIT") || $this->authlibrary->HasModulePermission('BILL-SETTING', "DELETE") ) { ?>
                                  <td class="center hidden-phone">
                                   

                                      <?php if($this->authlibrary->HasModulePermission('BILL-SETTING', "DELETE") ) { ?>
                                        
                                        <button data-url ='<?php echo base_url()?>BillSetting/delete' class='btn-danger btn-sm btn-delete' data-id = "<?php echo $value['id']?>"><i class='fa fa-trash-o'></i></button>
                                      <?php } ?>
                                  </td>
                                <?php } ?>
                              </tr>
                              <?php endforeach;endif; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
             </div>
              <!-- page end-->
          </section>
      </section>
    <script type="text/javascript" language="javascript" src="<?php echo base_url()?>assets/assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/assets/data-tables/DT_bootstrap.js"></script>
    
    <script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.btn-delete', function(e){
      //e.preventDefault();
      var id = $(this).data('id'); //Fetch id from modal trigger button
     
      var url = $(this).data('url');
      if (confirm("Are you sure want to delete?") == true) {
            $(this).closest('tr').css('backgroundColor', 'red');
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