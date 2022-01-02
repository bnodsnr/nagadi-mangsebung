<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> गृहपृष्ठ</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">जग्गाको क्षेत्रगत किसिम</a></li>
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
        
          <section class="card" style="margin-bottom: -25px;">
              <header class="card-header">
                जग्गाको क्षेत्रगत किसिम
                  <span class="tools">
                  <?php if($this->authlibrary->HasModulePermission('LAND-RATE', "ADD")) { ?>
                    <button type="button" data-toggle="modal" href="#addModel" class="btn-primary btn-sm pull-right" title="जग्गाको क्षेत्रगत किसिम थप्नुहोस्" data-url="<?php echo base_url()?>LandAreaType/add">नयाँ थप्नुहोस्</button>
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
                          <th>जग्गाको क्षेत्रगत किसिम</th>
                          <?php if(MODULE == 2) { ?>
                          <th>जग्गाको वर्गिकरण</th>
                          <?php } ?>
                          <?php if($this->authlibrary->HasModulePermission('LAND-TYPE','EDIT') && $this->authlibrary->HasModulePermission('LAND-TYPE', 'DELETE')) { ?>
                            <th class="hidden-phone">.....</th>
                          <?php } ?>
                                                          
                        </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($landareatype)) :
                        $i = 1;
                        foreach($landareatype as $key => $value) : ?>
                        <tr class="gradeX">
                            <td><?php echo $this->mylibrary->convertedcit($i++)?></td>
                             <td><p class="badge badge-sm badge-info"><?php echo $this->mylibrary->convertedcit($value['fiscal_year'])?></p></td>
                             <td><?php echo $this->mylibrary->convertedcit($value['land_area_type'])?></td>
                              <?php if(MODULE == 2) { ?>
                             <td><?php echo $this->mylibrary->convertedcit($value['category'])?></td>
                             <?php } ?>
                             <?php if($this->authlibrary->HasModulePermission('LAND-TYPE','EDIT') && $this->authlibrary->HasModulePermission('LAND-TYPE', 'DELETE')) { ?>
                                <td class="center hidden-phone">
                                  <?php if($this->authlibrary->HasModulePermission('LAND-TYPE', "EDIT")) { ?>
                                     <button type="button" data-toggle="modal" href="#editModel" class="btn-primary btn-sm" title="जग्गाको क्षेत्रगत किसिम थप्नुहोस्" data-url="<?php echo base_url()?>LandAreaType/edit" data-id = "<?php echo $value['id']?>"><i class="fa fa-edit"></i></button>
                                  <?php } ?>

                                  <?php if($this->authlibrary->HasModulePermission('LAND-TYPE', "DELETE")) { ?>
                                   
                                   <button data-url = "<?php echo base_url()?>LandAreaType/delete" data-id = "<?php echo $value['id']?>" class="btn btn-danger btn-sm delete_data"><i class="fa fa-trash-o"></i></button>
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
        <!-- page end-->
    </section>
</section>
      
<script src="<?php echo base_url('assets/datatable/datatables.min.js') ?>"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#dynamic-table').DataTable({
       'order': false,
    });
  })
</script>
