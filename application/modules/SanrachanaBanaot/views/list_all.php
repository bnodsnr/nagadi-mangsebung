<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> गृहपृष्ठ</a></li>
            <li class="breadcrumb-item"><a href="javascript:;">संरचनाको बनौटको किसिम</a></li>
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
                संरचनाको बनौटको किसिम
                  <span class="tools">
                  <?php if($this->authlibrary->HasModulePermission('SANRACHANA-BANAOT', "ADD")) { ?>
                    <button type="button" data-toggle="modal" href="#addModel" class="btn-primary btn-sm pull-right" title="जग्गाको क्षेत्रगत किसिम थप्नुहोस्" data-url="<?php echo base_url()?>SanrachanaBanaot/add">नयाँ थप्नुहोस्</button>
                  <?php } ?>
                </span>
              </header>
              <div class="card-body">
                <div class="adv-table">
                  <table  class="table table-inbox table-bordered table-striped">
                    <thead style="background: #1b5693; color:#fff">
                        <tr>
                          <th text-aligh="right">#</th> 
                         <!--  <th>आर्थिक वर्ष</th> -->
                          <th>संरचनाको बनौटको </th>
                          <?php if($this->authlibrary->HasModulePermission('SANRACHANA-BANAOT','EDIT') && $this->authlibrary->HasModulePermission('SANRACHANA-BANAOT', 'DELETE')) { ?>
                            <th class="hidden-phone">.....</th>
                          <?php } ?>
                                                          
                        </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($datas)) :
                        $i = 1;
                        foreach($datas as $key => $value) : ?>
                        <tr class="gradeX">
                            <td><?php echo $this->mylibrary->convertedcit($i++)?></td>
                             <td><?php echo $this->mylibrary->convertedcit($value['structure_type'])?></td>

                             <?php if($this->authlibrary->HasModulePermission('SANRACHANA-BANAOT','EDIT') && $this->authlibrary->HasModulePermission('SANRACHANA-BANAOT', 'DELETE')) { ?>
                                <td class="center hidden-phone">
                                  <?php if($this->authlibrary->HasModulePermission('SANRACHANA-BANAOT', "EDIT")) { ?>
                                      <button type="button" data-toggle="modal" href="#editModel" class="btn-primary btn-sm" title="जग्गाको क्षेत्रगत किसिम थप्नुहोस्" data-url="<?php echo base_url()?>SanrachanaBanaot/add" data-id = "<?php echo $value['id']?>"><i class="fa fa-edit"></i></button>
                                  <?php } ?>

                                  <?php if($this->authlibrary->HasModulePermission('SANRACHANA-BANAOT', "DELETE")) { ?>
                                    <button data-url = "<?php echo base_url()?>SanrachanaBanaot/delete" data-id = "<?php echo $value['id']?>" class="btn btn-danger btn-sm delete_data"><i class="fa fa-trash-o"></i></button>
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
