
<!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> गृहपृष्ठ</a></li>
                  <li class="breadcrumb-item" ><a href="<?php echo base_url()?>RoadType/" > सडकको किसिम</a></li>
              </ol>
            </nav>
              <!-- page start-->
              <div class="row">
                <div class="col-sm-12">
                    <aside class="card">
                        <div class="card-body">
                            <div class="mail-option">
                               <div class="btn-group hidden-phone">
                                  <select class="form-control col-md-12" id="filter_1" >
                                    <option value="" disabled="disabled" selected="selected" >आर्थिक वर्ष</option>
                                    <?php if(!empty($fiscal_year)) :
                                    foreach ($fiscal_year as $key => $fy) : ?>
                                      <option value="<?php echo $fy['year']?>"><?php echo $fy['year']?></option>
                                    <?php endforeach;endif;?>
                                  </select>
                               </div>
                               <div class="btn-group">
                                <div class="input-group">
                                    <input type="text" placeholder="सडकको किसिम" value="" class="form-control" id="filter_2">
                                    
                                </div>
                               
                              </div>
                              <div class="btn-group hidden-phone">
                                   <div class="">
                                      <button type="button" class="input-group-text btn btn-warning" title="खोजी गर्नुहोस्" id="filter">खोजी गर्नुहोस्</button>
                                    </div>
                               </div>
                               <?php if($this->authlibrary->HasModulePermission('ROAD-TYPE', "ADD")) { ?>
                                <div class="float-right position">
                                 <button type="button" data-toggle="modal" class="btn btn-primary btn-sm pull-right" href="#addModel" data-url="<?php echo base_url()?>RoadType/add" data-id = "">नयाँ थप्नुहोस्</button>
                                </div>
                              <?php } ?>
                            </div>
                            <table class="table table-inbox table-bordered table-striped" id="listtable">
                               <thead style="background: #1b5693; color:#fff">
                                  <tr>
                                    <th text-aligh="right">#</th> 
                                    <th>आर्थिक वर्ष</th>
                                    <th>सडकको किसिम</th>
                                    <th></th>
                                  </tr>
                              </thead>
                            
                            </table>
                        </div>
                    </aside>
                  
                </div>
              </div>
          </section>
      </section>

    
<script src="<?php echo base_url('assets/datatable/datatables.min.js') ?>"></script>
<script type="text/javascript">
  $(document).ready(function(){
    fetch_all_data();
    function fetch_all_data(filter_1 = '', filter_2 = ''){
      var oTable = $('#listtable').DataTable({
       "order": [[ 1, "desc" ]],
        "searching": false,
        'lengthChange':false,
        "processing": true,
        "serverSide": true,
        "ajax":{
          "url": "<?php echo base_url('RoadType/posts') ?>",
          "dataType": "json",
          "type": "POST",
          "data":{  '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>', filter_1:filter_1,filter_2:filter_2}
          },
        "columns": [
              { "data": "sn" },
              { "data": "fiscal_year" },
              { "data": "road_type" },
              {
                "data": "", render: function ( data, type, row ) {
                   <?php if($this->authlibrary->HasModulePermission('ROAD-TYPE', "EDIT")) { ?>
                    var res ="<button type='button' data-toggle='modal' href='#editModel' class='btn-primary btn-sm' data-url='<?php echo base_url()?>RoadType/edit' data-id = "+row.id+"><i class='fa fa-edit'></i></button>";
                  <?php } ?>

                  <?php if($this->authlibrary->HasModulePermission('ROAD-TYPE', "DELETE")) { ?>
                      res +="<button data-url ='<?php echo base_url()?>RoadType/delete' class='btn-danger btn-sm btn-delete' data-id = "+row.id+"><i class='fa fa-trash-o'></i></button>";
                  <?php } ?>
                      return res;


                },"bVisible": true, "bSearchable": false, "bSortable": false
              },
           ] 
      });
    }
    
    $('#filter').click(function(){
        var filter_1 = $('#filter_1').val();
        var filter_2 = $('#filter_2').val();
        $('#listtable').DataTable().destroy();
        fetch_all_data(filter_1, filter_2);
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