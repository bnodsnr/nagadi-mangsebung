 
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>Dashboard"><i class="fa fa-home"></i> गृहपृष्ठ</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>Road">रोड को किसिम</a></li>
            <li class="breadcrumb-item"><a href=""> नयाँ थप्नुहोस् </a></li>
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
              <header class="card-header" style="background: #1b5693;color:#FFF">
               रोड को किसिम नयाँ थप्नुहोस् 
              </header>
              <div class="card-body">
                <div class="valid_errors"></div>
                <form role="form" action="<?php echo base_url()?>Road/Save" method="post" class="form save_post">
                   <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>आर्थिक वर्ष</label>
                        <div class="">
                          <input type ="hidden" name = "id" value="<?php if(!empty($row['id'])){ echo $row['id'];}?>"> 

                          <select class="form-control" name="fiscal_year" id = "set_fiscal_year">
                            <option value="">आर्थिक वर्ष चयन गर्नुहोस्</option>
                            <?php
                            if(!empty($fiscal_year)) : 
                              foreach ($fiscal_year as $key => $value) : ?>
                                <option value="<?php echo $value['year']?>" <?php if($value['year'] ==get_current_fiscal_year()){ echo 'selected';} ?>><?php echo $value['year']?></option>
                              <?php endforeach;endif?>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>टोल<span style="color:red">*</span></label>
                        <input type="text" class="form-control" placeholder="" name="tol" value="<?php if(!empty($row['id'])){ echo $row['tole'];} ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>वार्ड<span style="color:red">*</span></label>
                        <select class="form-control" name="ward_no">
                          <option></option>
                          <?php if(!empty($ward)) :
                            foreach ($ward as $key => $value) :?>
                              <option value="<?php echo $value['name']?>"
                                <?php 
                                if(!empty($row)){ 
                                  if($row['ward'] == $value['name']){ echo 'selected';}?>

                                <?php } ?>

                                ><?php echo $value['name']?></option>
                          <?php endforeach;endif;?>
                        </select>
                       <!--  <input type="number" class="form-control" placeholder=""  name="ward_no" value="<?php //if(!empty($row['id'])){ echo $row['ward'];} ?>"> -->
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>रोडको किसिम<span style="color:red">*</span></label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                  <button type="button" data-toggle="modal" href="#editModel" class="input-group-text btn btn-warning" title="रोडको किसिम थप्नुहोस्" data-url="<?php echo base_url()?>Road/addRoadType"><i class="fa fa-plus"></i></button>
                              </div>
                              <select class="form-control" name="road_type" id = "set_fiscal_year">
                                <option value="">रोडको किसिम चयन गर्नुहोस्</option>
                                <?php
                                $selected = '';
                                if(!empty($row['id'])) {
                                  $selected = $row['road_type'];
                                }
                                if(!empty($road_type)) : 
                                  foreach ($road_type as $key => $road) : ?>
                                    <option value="<?php echo $road['id']?>" 
                                    <?php 
                                    if(!empty($row['id'])) {
                                      if($row['road_type'] == $road['id']) {
                                        echo 'selected';
                                      }
                                    } ?>
                                     >

                                      <?php echo $road['road_type']?></option>
                                  <?php endforeach;endif?>
                                </select>
                              <div class="invalid-feedback">
                                Please choose a username.
                              </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>रोडको नाम<span style="color:red">*</span></label>
                        <input type="text" class="form-control " placeholder="" name="road_name" value="<?php if(!empty($row['id'])){ echo $row['road_name'];} ?>">
                      </div>
                    </div>

                    <div class="col-md-12 text-center">
                      <hr>
                       <button class="btn btn-primary btn-xs save_btn" data-toggle="tooltip" title=" सेभ  गर्नुहोस्" name="Submit" type="submit" value="Submit"> सेभ गर्नुहोस्</button>
                        <a href="<?php echo base_url()?>Road" class="btn btn-danger btn-xs" data-toggle="tooltip" title="सम्पादन गर्नुहोस्">रद्द गर्नुहोस्</a>
                    </div>
                  </div>
                </form>
              </div>
              </div>
            </section>
          </div>
        </div>
        <!-- page end-->
    </section>
</section>
   