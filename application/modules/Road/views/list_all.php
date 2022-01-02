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
<section id="main-content">
    <section class="wrapper site-min-height">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> गृहपृष्ठ</a></li>
            <li class="breadcrumb-item"><a href="javascript:;"> सडकको  नाम</a></li>
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
              <div class="card-body">
                <div class="mail-option">
                   <div class="btn-group hidden-phone">
                      <select class="form-control" id="fiscal_year"  style="width: 130px;">
                        <option value="" selected="selected" >आर्थिक वर्ष</option>
                        <?php if(!empty($fiscal_year)) :
                        foreach ($fiscal_year as $key => $fy) : ?>
                          <option value="<?php echo $fy['year']?>"><?php echo $fy['year']?></option>
                        <?php endforeach;endif;?>
                      </select>
                   </div>
                   <?php if(MODULE == 2) : ?>
                   <div class="btn-group hidden-phone">
                      <select class="form-control" id="land_area_type" name="land_area_type" style="width: 180px;">
                        <option value="" selected="selected" >जग्गाको क्षेत्रगत किसिम</option>
                        <?php if(!empty($land_area_type)) :
                        foreach ($land_area_type as $key => $lyt) : ?>
                          <option value="<?php echo $lyt['id']?>"><?php echo $lyt['land_area_type']?></option>
                        <?php endforeach;endif;?>
                      </select>
                   </div>
                 <?php endif;?>
                   <div class="btn-group hidden-phone">
                      <select class="form-control" id="road_type" style="width: 230px;">
                        <option value="" selected="selected" >सडकको किसिम</option>
                        <?php if(!empty($road_type)) :
                        foreach ($road_type as $key => $rt) : ?>
                          <option value="<?php echo $rt['id']?>"><?php echo $rt['road_type']?></option>
                        <?php endforeach;endif;?>
                      </select>
                   </div>
                    <div class="btn-group">
                      <div class="input-group">
                          <input type="text" placeholder="सडकको नाम" value="" class="form-control" id="road_name" style="width: 280;">
                      </div>
                    </div>
                    <div class="btn-group hidden-phone">
                         <div class="">
                            <button type="button" class="btn btn-sm btn-warning" title="खोजी गर्नुहोस्" id="filter">खोजी गर्नुहोस्</button>
                          </div>
                    </div>
                    <?php if($this->authlibrary->HasModulePermission('ROAD-TYPE', "ADD")) { ?>
                      <div class="float-right position">
                        <a class="btn btn-primary btn-sm pull-right" href="<?php echo base_url()?>Road/Add" style="color:#FFF"><i class="fa fa-plus"></i> नयाँ थप्नुहोस् </a>
                      </div>
                    <?php } ?>
                </div>
                <table  class="table table-inbox table-bordered table-striped" id="listtable">
                  <thead style="background: #1b5693; color:#fff">
                      <tr>
                        <th text-aligh="right">#</th> 
                        <th>आ व</th>
                       <?php if(MODULE == 2):?>
                        <th style="width: 200px;">क्षेत्रगत किसिम </th><?php endif;?>
                        <th style="width: 200px;">सडकको किसिम </th>
                        <th> सडकको नाम </th>
                        <?php if(MODULE == 2):?><th> न्युनतम मुल्य </th>
                        <th> अधिक्कतम मुल्य </th>
                        <?php endif;?>
                         <?php if($this->authlibrary->HasModulePermission('ROAD', "EDIT") || $this->authlibrary->HasModulePermission('ROAD', "DELETE") ) { ?>
                          <th class="hidden-phone">.....</th>
                        <?php } ?>
                      </tr>
                  </thead>
                </table>
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
    function fetch_all_data(fiscal_year = '', land_area_type = '',road_type='', road_name){
      var oTable = $('#listtable').DataTable({
        "order": [[ 4, "desc" ],[0,'asc']],
        "searching": false,
        'lengthChange':false,
        "processing": true,
        "serverSide": true,
        'language': {
            'loadingRecords': '&nbsp;',
            'processing': '<div class="spinner"></div>'
        },
        "ajax":{
          "url": "<?php echo base_url('Road/get_road_list') ?>",
          "dataType": "json",
          "type": "POST",
          "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', fiscal_year:fiscal_year,land_area_type:land_area_type, road_type:road_type,road_name:road_name}
          },
        "columns": [
              { "data": "sn" },
              { "data": "fiscal_year" },
              { "data": "road_type" },
              { "data": "road_name" },
              <?php if(MODULE == 2) : ?>
               <?php endif;?>
              {
                "data": "", render: function ( data, type, row ) {
                   <?php if($this->authlibrary->HasModulePermission('ROAD', "EDIT")) { ?>
                    var res ="<a href='<?php echo base_url()?>Road/Add/"+row.id+"' class='btn-primary btn-sm' ><i class='fa fa-edit'></i></a>";
                  <?php } ?>

                  <?php if($this->authlibrary->HasModulePermission('ROAD', "DELETE")) { ?>
                      res +="<button data-url ='<?php echo base_url()?>Road/delete' class='btn-danger btn-sm btn-delete' data-id = "+row.id+"><i class='fa fa-trash-o'></i></button>";
                  <?php } ?>
                      return res;


                },"bVisible": true, "bSearchable": false, "bSortable": false
              },
           ] 
      });
    }
    
    $('#filter').click(function(){
      var fiscal_year     = $('#fiscal_year').val();
      var land_area_type  = $('#land_area_type').val();
      var road_type       = $('#road_type').val();
      var road_name       = $('#road_name').val();
      $('#listtable').DataTable().destroy();
      fetch_all_data(fiscal_year, land_area_type,road_type,road_name);
    });
    
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