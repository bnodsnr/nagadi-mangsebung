<style type="text/css">
  @keyframes spinner {
  to {transform: rotate(360deg);}
}
 
.spinner:before {
  content: '';
  box-sizing: border-box;
  position: absolute;
  top: 50%;
  left: 50%;
  width: 20px;
  height: 20px;
  margin-top: -10px;
  margin-left: -10px;
  border-radius: 50%;
  border: 2px solid #ccc;
  border-top-color: #333;
  animation: spinner .6s linear infinite;
}
</style>
 <!--main content start-->
 <section id="main-content">
  <section class="wrapper site-min-height">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> गृहपृष्ठ</a></li>
        <li class="breadcrumb-item"><a href="javascript:;">संरचनाको न्युनतम मूल्य</a></li>
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
                <select class="form-control" id="fiscal_year"  style="width: 270px;">
                  <option value="" selected="selected" >आर्थिक वर्ष</option>
                  <?php if(!empty($fiscal_year)) :
                  foreach ($fiscal_year as $key => $fy) : ?>
                    <option value="<?php echo $fy['year']?>"><?php echo $fy['year']?></option>
                  <?php endforeach;endif;?>
                </select>
             </div>
             <div class="btn-group hidden-phone">
                <select class="form-control" id="structure_type" name="structure_type" style="width: 270px;">
                  <option value="" selected="selected" >संरचनाको बनौटको किसिम</option>
                  <?php if(!empty($arcet_type)) :
                  foreach ($arcet_type as $key => $st) : ?>
                    <option value="<?php echo $st['id']?>"><?php echo $st['structure_type']?></option>
                  <?php endforeach;endif;?>
                </select>
             </div>
             <div class="btn-group hidden-phone">
                <select class="form-control" id="architect_type" style="width: 270px;">
                  <option value="" selected="selected" >संरचनाको प्रकार</option>
                  <?php if(!empty($struct_type)) :
                  foreach ($struct_type as $key => $rt) : ?>
                    <option value="<?php echo $rt['id']?>"><?php echo $rt['architect_type']?></option>
                  <?php endforeach;endif;?>
                </select>
             </div>
             
              <div class="btn-group hidden-phone">
                   <div class="">
                      <button type="button" class="btn btn-sm btn-warning" title="खोजी गर्नुहोस्" id="filter">खोजी गर्नुहोस्</button>
                    </div>
              </div>
              <?php if($this->authlibrary->HasModulePermission('ROAD-TYPE', "ADD")) { ?>
                <div class="float-right position">
                  <a class="btn btn-primary btn-sm pull-right" href="<?php echo base_url()?>StructureMinimumAmount/addSanrachanaRate" style="color:#FFF"><i class="fa fa-plus"></i> नयाँ थप्नुहोस् </a>
                </div>
              <?php } ?>
            </div>
          </header>
        <div class="card-body">
          <div class="adv-table">
            <table  class="display table table-bordered table-striped" id="listtable">
              <thead style="background: #1b5693; color:#fff">
                <tr>
                  <th text-aligh="right">#</th> 
                  <th>आ व</th>
                  <th>संरचनाको बनौटको किसिम</th>
                  <th>संरचनाको प्रकार</th>
                  <th>न्युनतम मूल्य</th>
                  <?php if($this->authlibrary->HasModulePermission('STRUCUTRE-MIN-AMOUNT', "MODIFY") ||  $this->authlibrary->HasModulePermission('STRUCUTRE-MIN-AMOUNT', "DELETE")){ ?>
                    <th class="hidden-phone">.....</th>
                  <?php } ?>
                </tr>
              </thead>
             
            </table>
          </div>
        </div>
      </section>
    </div>
  </div>
  <!-- page end-->
</section>
</section>
<script src="<?php echo base_url('assets/datatable/datatables.min.js') ?>"></script>
<script type="text/javascript">
  $(document).ready(function(){
    fetch_all_data();
    function fetch_all_data(fiscal_year = '', structure_type = '',architect_type=''){
      var oTable = $('#listtable').DataTable({
        "order": [[ 1, "desc" ],[0,'asc']],
        "searching": false,
        'lengthChange':false,
        "processing": true,
        "serverSide": true,
        'language': {
            'loadingRecords': '&nbsp;',
            'processing': '<div class="spinner"></div>'
        },
        "ajax":{
          "url": "<?php echo base_url('StructureMinimumAmount/posts') ?>",
          "dataType": "json",
          "type": "POST",
          "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', fiscal_year:fiscal_year,structure_type:structure_type, architect_type:architect_type}
          },
        "columns": [
              { "data": "sn" },
              { "data": "fiscal_year" },
              { "data": "structure_type" },
              { "data": "architect_type" },
              { "data": "minimum_amount" },

              {
                "data": "", render: function ( data, type, row ) {
                   <?php if($this->authlibrary->HasModulePermission('STRUCUTRE-MIN-AMOUNT', "EDIT")) { ?>
                    var res ="<a href='<?php echo base_url()?>StructureMinimumAmount/addSanrachanaRate/"+row.id+"' class='btn-primary btn-sm' ><i class='fa fa-edit'></i></a>";
                  <?php } ?>

                  <?php if($this->authlibrary->HasModulePermission('STRUCUTRE-MIN-AMOUNT', "DELETE")) { ?>
                      res +="<button data-url ='<?php echo base_url()?>StructureMinimumAmount/delete' class='btn-danger btn-sm btn-delete' data-id = "+row.id+"><i class='fa fa-trash-o'></i></button>";
                  <?php } ?>
                      return res;


                },"bVisible": true, "bSearchable": false, "bSortable": false
              },
           ] 
      });
    }
    
    $('#filter').click(function(){
      var fiscal_year     = $('#fiscal_year').val();
      var structure_type  = $('#structure_type').val();
      var architect_type       = $('#architect_type').val();
      $('#listtable').DataTable().destroy();
      fetch_all_data(fiscal_year, structure_type,architect_type);
    });
    
    $(document).on('click','.btn-delete', function(e){
      //e.preventDefault();
      var id = $(this).data('id'); //Fetch id from modal trigger button
     
      var url = $(this).data('url');
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
