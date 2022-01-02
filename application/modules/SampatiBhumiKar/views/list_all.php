
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> गृहपृष्ठ</a></li>
        <li class="breadcrumb-item"><a href="#">सम्पतिकर तथा भूमिकर</a></li>
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
            सम्पतिकर तथा भूमिकर
            <span class="tools">
            <?php if($this->authlibrary->HasModulePermission('SAMPATI-BHUMI-KAR', "ADD")) { ?>
              
              <a class="btn btn-primary btn-sm pull-right" style="color:#FFF" data-toggle="modal" href="#addModel" data-url="<?php echo base_url()?>SampatiBhumiKar/addNew"><i class="fa fa-plus"></i> नयाँ थप्नुहोस् </a>
            <?php } ?>
          </span>
          </header>
          <div class="card-body">
            <div class="adv-table">
              <table  class="display table table-bordered table-striped" id="dynamic-table">
                <thead style="background: #1b5693; color:#fff">
                  <tr>
                    <th text-aligh="right">#</th> 
                    <th>आर्थिक वर्ष</th>
                    <th>देखि</th>
                    <th>सम्म</th>
                   <!--  <th>सम्पतिकर</th> -->
                    <th>भूमिकर</th>
                    <th class="hidden-phone">.....</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($sampati_bhumi_kar)) :
                    $i = 1;
                    foreach($sampati_bhumi_kar as $key => $value) : ?>
                      <tr class="gradeX">
                        <td><?php echo $this->mylibrary->convertedcit($i++)?></td>
                        <td><p class="badge badge-sm badge-info"><?php echo $this->mylibrary->convertedcit($value['fiscal_year'])?></p></td>
                        <td><?php echo $this->mylibrary->convertedcit($value['from_rate'],"मात्र |")?></td>
                        <td><?php echo $this->mylibrary->convertedcit($value['to_rate'],"मात्र |")?></td>
                        <!-- <td><?php //echo $this->mylibrary->convertedcit($value['sampati_kar'])?></td> -->
                        <td><?php echo $this->mylibrary->convertedcit($value['bhumi_kar'])?></td>
                        <td class="center hidden-phone">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" href="#editModel" data-id ="<?php echo $value['id']?>" data-url="<?php echo base_url()?>SampatiBhumiKar/editDetailsView"><i class="fa fa-edit"></i></button>
                          <button data-url ='<?php echo base_url()?>SampatiBhumiKar/delete' class='btn-danger btn-sm btn-delete' data-id = "<?php echo $value['id']?>"><i class='fa fa-trash-o'></i></button>
                        </td>
                      </tr>
                    <?php endforeach;endif; ?>
                  </tbody>
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
    $('#dynamic-table').DataTable({
       'order': false,
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
        
  })
</script>
  
  