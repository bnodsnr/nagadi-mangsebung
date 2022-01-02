
<style type="text/css">
  .select2-container--default .select2-selection--single {
    height: 36px;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
  line-height: 37px;
}
</style>
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> गृहपृष्ठ</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url()?>PersonalProfile">
        <li class="breadcrumb-item"><a href="<?php echo base_url()?>PersonalProfile">
           व्यक्तिगत अभिलेख</a></li></a></li>
        <li class="breadcrumb-item"><a href="javascript:;">
           सम्पादन गर्नुहोस</a></li></a></li>
      </ol>
    </nav>
    <!-- page start-->
    <div class="row">
      <div class="col-sm-12">
        <form action ="<?php echo base_url()?>PersonalProfile/updateProfileDetails" method="post">
           <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          <div class="row">
            <div class="col-md-12">
              <section class="card">
                <header class="card-header" style="background: #1b5693;color:#FFF">
                  घर जग्गा व्यत्तिगत अभिलेख
                <div class="col-md-2 pull-right">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <button type="button" class="input-group-text btn btn-danger" title=""><i class="fa fa-calendar" style="color:#1b5693"></i></button>
                    </div>
                    <input type="text" name="form_filler_date" class="form-control" value="<?php echo convertDate(date('Y-m-d'))?>" readonly>
                  </div>
                </div>
                </header>
                <input type="hidden" name="id" value="<?php echo !empty($profile_details['id']) ? $profile_details['id'] :'';?>" id="profile_id">
                <input type="hidden" name="old_file_no" value="<?php echo !empty($profile_details['file_no']) ? $profile_details['id'] :'';?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                        <label>आर्थिक वर्ष <span style="color:red">*</span></label>
                        <div class="">
                          <select class="form-control" name="fiscal_year" required  >
                            <option value="">छान्नुहोस्</option>
                            <?php $fy = current_fiscal_year();?>
                            <?php  foreach($fiscal_year as  $data): ?>
                              <option value="<?php echo $data['year']?>" <?php if($data['year'] == $fy['year']){echo 'selected';} ?>><?php echo $data['year']?> </option>
                            <?php  endforeach; ?>       
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>जग्गाको स्वामित्वको किसिम<span style="color:red">*</span></label>
                        <select name="land_own_type" class="form-control" required>
                          <option value="">छान्नुहोस् </option>
                          <option value="एकल" selected="selected" <?php if($profile_details['land_own_type'] == 'एकल'){ echo 'selected';}?>>एकल</option>
                          <option value="संयुक्त" <?php if($profile_details['land_own_type'] != 'एकल'){ echo 'selected';}?>>संयुक्त</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>जग्गाधनिको नाम र थर<span style="color:red">*</span></label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                          </div>
                          <input type="text" class="form-control" id="land_owner_name_np" placeholder=""  name="land_owner_name_np" required="required" value="<?php echo !empty($profile_details['land_owner_name_np']) ? $profile_details['land_owner_name_np']:'';?>">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>जग्गाधनिको नाम (अंग्रेजी)<span style="color:red">*</span></label>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder=""  name="land_owner_name_en" required="required" id="land_owner_name_en" value="<?php echo !empty($profile_details['land_owner_name_en']) ? $profile_details['land_owner_name_en']:'';?>">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>नगरिकता नं <span style="color:red">*</span></label>
                          <input type="text" class="form-control citizenship_no" placeholder=""  name="lo_czn_no" value="<?php echo !empty($profile_details['lo_czn_no']) ? $profile_details['lo_czn_no']:'';?>">
                         <span class="du_error"></span>
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <label>स्थायी लेखा नं<span style="color:red">*</span></label>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder=""  name="lo_pan_no" id="lo_pan_no" value="<?php echo !empty($profile_details['lo_pan_no']) ? $profile_details['lo_pan_no']:'';?>">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>बाबु/पतिको नाम र थर<span style="color:red">*</span>
                        </label>
                        <input type="text" class="form-control" placeholder=""  name="land_owner_father_name" required="required" value="<?php echo !empty($profile_details['land_owner_father_name']) ? $profile_details['land_owner_father_name']:'';?>">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>बाजे/ससुराको नाम र थर<span style="color:red">*</span>
                        </label>
                        <input type="text" class="form-control" placeholder=""  name="land_owner_grandpa_name" required="required" value="<?php echo !empty($profile_details['land_owner_grandpa_name']) ? $profile_details['land_owner_grandpa_name']:'';?>">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>पेशा<span style="color:red">*</span>
                        </label>
                        <select name="land_owner_occupation" class="form-control dd_select">
                          <option value="">छान्नुहोस् </option>
                          <?php if(!empty($occupation)) :
                          foreach($occupation as $data): ?>
                            <option value="<?php echo  $data['name'] ?>" <?php if($data['name'] == $profile_details['land_owner_occupation']){ echo 'selected';}?>><?php echo  $data['name'] ?></option>
                          <?php endforeach; endif; ?>    
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>करदाताको लिंग *<span style="color:red">*</span>
                        </label>
                        <select name="land_owner_gender" class="form-control dd_select">
                          <option value="">छान्नुहोस् </option>
                          <option value="पुरुष" <?php if($profile_details['land_owner_gender'] == 'पुरुष'){ echo 'selected';}?>>पुरुष</option>
                          <option value="महिला" <?php if($profile_details['land_owner_gender'] == 'महिला'){ echo 'selected';}?>>महिला</option>
                          <option value="अन्य" <?php if($profile_details['land_owner_gender'] == "अन्य" ){ echo 'selected';}?>>अन्य</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>राष्ट्रियता<span style="color:red">*</span>
                        </label>
                        <select name="nationality" class="form-control dd_select">
                          <option value="">छान्नुहोस् </option>
                          <?php if(!empty($nationality)) :
                            foreach($nationality as $key => $n) : ?>
                              <option value="<?php echo $n['name']?>" <?php if($profile_details['nationality'] == $n['name']){ echo 'selected';} ?>><?php echo $n['name']?></option>
                          <?php endforeach;endif;?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>इमेल ठेगाना
                        </label>
                        <input type="email" class="form-control" placeholder=""  name="land_owner_email" value="<?php echo !empty($profile_details['land_owner_email']) ? $profile_details['land_owner_email']: '' ?>">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>सम्पर्क फोन नं.<span style="color:red">*</span>
                        </label>
                        <input type="text" class="form-control contact_number" placeholder=""  name="land_owner_contact_no" required="required" value="<?php echo !empty($profile_details['land_owner_contact_no']) ? $profile_details['land_owner_contact_no']: '' ?>">
                        <span class="du_mobile"></span>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>अन्य विवरण/कैफियत<span style="color:red">*</span>
                        </label>
                        <input type="text" class="form-control" placeholder=""  name="land_owner_remarks" value="<?php echo !empty($profile_details['remarks']) ? $profile_details['remarks']: '' ?>">
                      </div>
                    </div>
                  </div>
                </div><!--end of card body-->
              </section>
            </div>
            <div class="col-md-12">
              <section class="card">
                <header class="card-header" style="background: #1b5693;color:#FFF">जग्गाधनिको ठेगाना(स्थायी)</header>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>प्रदेश<span style="color:red">*</span>
                        </label>
                        <select class="form-control dd_select npl_state" name="lo_province" required id="province">
                          <option value="">छान्नुहोस्</option>
                          <?php if(!empty($provinces)) : 
                              foreach ($provinces as $key => $p) : ?>
                                <option value="<?php echo $p['ID']?>" <?php if($p['ID'] == $profile_details['lo_state']) {echo 'selected';}?>><?php echo $p['Title']?></option>
                          <?php endforeach;endif;?>
                        </select>
                      </div>
                    </div> 

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>जिल्ला<span style="color:red">*</span>
                        </label>
                        <select class="form-control dd_select npl_districts" id="district" required name="lo_district_id" >
                          <option value=""></option>
                          <?php if(!empty($districts)) : 
                              foreach($districts as $d) :?>
                                <option value="<?php echo $d['id']?>" <?php if($d['id'] == $profile_details['lo_district']) {echo 'selected';}?>><?php echo $d['name']?></option>
                          <?php endforeach;endif;?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>गा पा / न पा <span style="color:red">*</span>
                        </label>
                        <select class="form-control npl_gapana dd_select lo_gapanapa" name="lo_gapanapa" id="metro" required>
                          <?php
                            $gapana = $this->CommonModel->getGapanaByDistrict($profile_details['lo_district']);
                            if(!empty($gapana)) :
                              foreach ($gapana as $key => $gp) : ?>
                                <option value="<?php echo $gp['id']?>" <?php if($gp['id'] == $profile_details['lo_gapa_napa']) {echo 'selected';}?>><?php echo $gp['name']?></option>
                          <?php endforeach;endif;?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>वडा नं<span style="color:red">*</span>
                        </label>
                        <select name="lo_address_ward" class="form-control p_address_ward dd_select " id="address_ward" required>
                          <option value="">छान्नुहोस्</option>
                          <?php if(!empty($ward)) :
                            foreach ($ward as $key => $w) : ?>
                              <option value="<?php echo $w['name']?>" <?php if($w['name'] ==$profile_details['lo_ward']){ echo 'selected';}?>><?php echo 'वडा नं-'.$this->mylibrary->convertedcit($w['name'])?></option>
                          <?php endforeach;endif;?>
                                      
                        </select>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>जग्गा रहेको वडा नं<span style="color:red">*</span>
                        </label>
                        <select name="lo_land_ward" class="form-control dd_select" id="land_ward" required>
                          <option value="">छान्नुहोस्</option>
                          <?php if(!empty($ward)) :
                            foreach ($ward as $key => $w) : ?>
                              <option value="<?php echo $w['name']?>" <?php if($w['name'] == $profile_details['lo_land_lac_ward']){ echo 'selected';}?>><?php echo 'वडा नं-'.$this->mylibrary->convertedcit($w['name'])?></option>
                          <?php endforeach;endif;?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>टोल/ठाउँ<span style="color:red">*</span>
                        </label>
                        <input type="text" class="form-control per_tol" placeholder=""  name="lo_tol"  value="<?php echo !empty($profile_details['lo_tol']) ? $profile_details['lo_tol']: '' ?>">
                      </div>
                    </div>

                   <!--  <div class="col-md-3">
                      <div class="form-group">
                        <label>अस्थायी ठेगाना<span style="color:red">*</span>
                        </label>
                        <input type="text" class="form-control" placeholder=""  name="lo_temp_add" required="required" value="">
                      </div>
                    </div> -->

                    <div class="col-md-3">
                      <div class="form-group">
                        <label>घर नम्बर<span style="color:red">*</span>
                        </label>
                        <input type="text" class="form-control per_house_no" placeholder=""  name="lo_house_no" required="required" value="<?php echo !empty($profile_details['lo_house_no']) ? $profile_details['lo_house_no']: '' ?>">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                         <label>करदाताको क्र.स नम्बर<span style="color:red">*</span>
                          </label>
                          <input type="text" name="lo_file_no" required class="form-control" id="lo_owner_symbol" readonly="true" value="<?php echo !empty($profile_details['file_no']) ? $profile_details['file_no']: '' ?>" >
                      </div>
                    </div>

                  </div>
                </div>
              </section>
            </div>

            <div class="col-md-12">
              <section class="card">
                <header class="card-header" style="background: #1b5693;color:#FFF">जग्गाधनिको ठेगाना(अस्थायी) </header>
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>प्रदेश<span style="color:red">*</span>
                        </label>
                        <select class="form-control dd_select npl_temp_state" name="lo_temp_state" required id="province">
                          <option value="">छान्नुहोस्</option>
                          <?php if(!empty($provinces)) : 
                              foreach ($provinces as $key => $p) : ?>
                                <option value="<?php echo $p['ID']?>" <?php if($p['ID'] == $profile_details['lo_temp_state']) {echo 'selected';}?>><?php echo $p['Title']?></option>
                          <?php endforeach;endif;?>
                        </select>
                      </div>
                    </div> 

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>जिल्ला<span style="color:red">*</span>
                        </label>
                        <select class="form-control dd_select npl_temp_districts" id="lodistrict" required name="lo_temp_district" >
                          <option value=""></option>
                          <?php if(!empty($districts)) : 
                              foreach($districts as $d) :?>
                                <option value="<?php echo $d['id']?>" <?php if($d['id'] == $profile_details['lo_temp_dis']) {echo 'selected';}?>><?php echo $d['name']?></option>
                          <?php endforeach;endif;?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>गा पा / न पा <span style="color:red">*</span>
                        </label>
                        <select class="form-control dd_select lo_temp_gapanapa" name="lo_temp_gapanapa" id="metro" required>
                          <?php 
                            $gapana = $this->CommonModel->getGapanaByDistrict($profile_details['lo_temp_dis']);
                            if(!empty($gapana)) :
                              foreach ($gapana as $key => $gp) : ?>
                              <option value="<?php echo $gp['name']?>" <?php if($gp['name'] == $profile_details['lo_temp_gapanapa']) {echo 'selected';}?>><?php echo $gp['name']?></option>
                            <?php endforeach;endif;?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>वडा नं<span style="color:red">*</span>
                        </label>
                        <select name="lo_temp_ward" class="form-control dd_select" id="temp_address_ward" required>
                          <option value="">छान्नुहोस्</option>
                          <?php if(!empty($ward)) :
                            foreach ($ward as $key => $w) : ?>
                              <option value="<?php echo $w['name']?>" <?php if($profile_details['lo_temp_ward'] == $w['name']){ echo 'selected';}?>><?php echo 'वडा नं-'.$this->mylibrary->convertedcit($w['name'])?></option>
                          <?php endforeach;endif;?>
                                      
                        </select>
                      </div>
                    </div>

                   <!--  <div class="col-md-2">
                      <div class="form-group">
                        <label>जग्गा रहेको वडा नं<span style="color:red">*</span>
                        </label>
                        <select name="lo_land_ward" class="form-control dd_select" id="land_ward" required>
                          <option value="">छान्नुहोस्</option>
                          <?php //if(!empty($ward)) :
                            //foreach ($ward as $key => $w) : ?>
                              <option value="<?php //echo $w['name']?>"><?php //echo 'वडा नं-'.$this->mylibrary->convertedcit($w['name'])?></option>
                          <?php //endforeach;endif;?>
                        </select>
                      </div>
                    </div> -->

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>टोल/ठाउँ<span style="color:red">*</span>
                        </label>
                        <input type="text" class="form-control tem_tol" placeholder=""  name="lo_temp_tol" required="required" value="<?php echo !empty($profile_details['lo_temp_tol']) ? $profile_details['lo_temp_tol']: '' ?>">
                      </div>
                    </div>

                   <!--  <div class="col-md-3">
                      <div class="form-group">
                        <label>अस्थायी ठेगाना<span style="color:red">*</span>
                        </label>
                        <input type="text" class="form-control" placeholder=""  name="lo_temp_add" required="required" value="">
                      </div>
                    </div> -->

                    <div class="col-md-4">
                      <div class="form-group">
                        <label>घर नम्बर<span style="color:red">*</span>
                        </label>
                        <input type="text" class="form-control tem_house_no" placeholder=""  name="lo_temp_house_no" required="required" value="<?php echo !empty($profile_details['lo_temp_house_no']) ? $profile_details['lo_temp_house_no']: '' ?>">
                      </div>
                    </div>

                  <!--   <div class="col-md-2">
                      <div class="form-group">
                         <label>करदाताको क्र.स नम्बर<span style="color:red">*</span>
                          </label>
                          <input type="text" name="lo_file_no" required class="form-control" id="lo_owner_symbol" readonly="true" >
                      </div>
                    </div> -->

                  </div>
                </div>
              </section>
            </div>


            <div class="col-md-12">
              <section class="card">
                <header class="card-header" style="background: #1b5693;color:#FFF">सम्पतिधनीको पारिबारिक विवरण <span><button class="btn btn-danger btn-sm" type="button">आफै</button></span></header>
                <div class="card-body">
                  <div class="row">
                    <table class="table table-bordered" id="add_new_fields">
                      <thead>
                        <tr>
                          <th>परिवार सदस्यहरुको नाम</th>
                          <th>जग्गा/घरधनी सँगको नाता</th>
                          <th> जन्म मिति </th>
                          <th>
                            <button  type="button" class="btn-sm btn btn-success btnAddNew"><i class="fa fa-plus"></i> </button>
                          </th>
                          <!-- <th>
                            <button  type="button" class="btn-sm btn btn-success btnAddNew"><i class="fa fa-plus"></i> </button>
                          </th> -->
                        </tr>
                      </thead>
                      <tbody>
                      	<?php if(!empty($lo_family_details)) :
                      		foreach($lo_family_details as $key => $fd): ?>
		                      	<tr class="productPurchaseFields" id="partsPurchaseFields_1" data-id="1">
                              <input type="hidden" name="member_id[]" class="form-control " id=""  value = "<?php echo $fd['id']?>" required>
			                         <td><input type="text" name="family_member_name[]" class="form-control " id="family_name_1"  value = "<?php echo $fd['member_name']?>" required></td>
			                            <td>
			                            <select name="family_member_relation[]" class="form-control dd_select" id="relation_1" required>
			                              <option value="">छान्नुहोस् </option>
			                               <?php if(!empty($rel)) : 
			                                   foreach ($rel as $key => $re) : ?>
			                                        <option value="<?php echo $re['name']?>" <?php if($fd['member_relation'] == $re['name']) {echo 'selected';}?>><?php echo $this->mylibrary->convertedcit($re['name'])?></option>
			                                  <?php endforeach;endif;?>   
			                            </select>
			                          </td>
			                         <td>
			                            <div class="form-group row">
			                              <div class="col-sm-10">
			                                  <input type="text" placeholder="" data-mask="9999/99/99" class="form-control" name="family_member_dob[]"  value = "<?php echo $fd['member_age']?>">
			                              </div>
			                            </div>
			                         </td>
			                         
			                          <td>
			                            <button type="button" class="btn btn-sm btn-danger btn-delete" data-id = "<?php echo $fd['id']?>" data-url ="<?php echo base_url()?>PersonalProfile/removeFamaily"><i class="fa fa-times"></i></button>
			                          </td>

                       		 	</tr>
                    <?php endforeach; endif;?>
                      </tbody>
                    </table>
                </div>
              </section>
            </div>

            <div class="col-md-12">
              <section class="card">
                <header class="card-header" style="background: #1b5693;color:#FFF">विवरण दाखिला गर्ने को विवरण(सुचक) <span><button class="btn btn-danger btn-sm" type="button" id="suchak_details">आफै</button></span></header>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>प्रदेश<span style="color:red">*</span>
                          </label>
                          <select class="form-control bi_state dd_select" name="form_filler_state" required id="">
                            <option value="">छान्नुहोस्</option>
                            <?php if(!empty($provinces)) : 
                                foreach ($provinces as $key => $p) : ?>
                                  <option value="<?php echo $p['ID']?>" <?php if($p['ID'] == $profile_details['lo_fi_state']) {echo 'selected';}?>><?php echo $p['Title']?></option>
                            <?php endforeach;endif;?>
                          </select>
                        </div>
                      </div> 

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>जिल्ला<span style="color:red">*</span>
                          </label>
                          <select class="form-control bi_districts dd_select" id="district_selected" required name="form_filler_district" >
                            <option value=""></option>
                            <?php if(!empty($districts)) : 
                                foreach($districts as $d) :?>
                                  <option value="<?php echo $d['id']?>" <?php if($d['id'] == $profile_details['lo_fi_district']) {echo 'selected';}?>><?php echo $d['name']?></option>
                            <?php endforeach;endif;?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>गाविस / न पा <span style="color:red">*</span>
                          </label>
                          <select class="form-control bi_gapana dd_select" name="form_filler_vdc_municipality_id" id="metro" required>
                            <?php  
                            $gapana = $this->CommonModel->getGapanaByDistrict($profile_details['lo_fi_district']);
                            if(!empty($gapana)) :
                              foreach ($gapana as $key => $gp) : ?>
                                <option value="<?php echo $gp['id']?>" <?php if($d['id'] == $profile_details['lo_fi_gapa_napa']) {echo 'selected';}?>><?php echo $gp['name']?></option>
                            <?php endforeach;endif;?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label>वडा नं<span style="color:red">*</span>
                          </label>
                          <select name="form_filler_ward_no_id" class="form-control dd_select" id="app_ward_no" required>
                            <option value="">छान्नुहोस्</option>
                            <?php if(!empty($ward)) :
                              foreach ($ward as $key => $w) : ?>
                                <option value="<?php echo $w['name']?>" <?php if($profile_details['lo_fi_ward'] == $w['name']){ echo 'selected';}?>><?php echo 'वडा नं-'.$this->mylibrary->convertedcit($w['name'])?></option>
                            <?php endforeach;endif;?>
                                        
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                           <label>नाम/थर<span style="color:red">*</span>
                            </label>
                            <input type="text" class="form-control form_filler_name" placeholder=""  name="form_filler_name" required="required" value="<?php echo !empty($profile_details['lo_fi_name']) ? $profile_details['lo_fi_name']:''?>">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                            <label>जग्गाधनी संगको नाता <span style="color:red">*</span>
                            </label>
                            <select name="form_filler_relation" class="form-control" id="app_relation" required>
                              
                              <?php if(!empty($rel)) : 
                               foreach ($rel as $key => $re) : ?>
                                    <option value="<?php echo $re['name']?>" <?php if($profile_details['lo_fi_relation'] == $re['name']){ echo 'selected';}?>><?php echo $this->mylibrary->convertedcit($re['name'])?></option>
                              <?php endforeach;endif;?>
                            </select>
                        </div>
                      </div>
                    </div>
                  </div>
              </section>
            </div>
            <hr>
            <div class="col-md-12 text-center">
              <button class="btn btn-primary btn-xs save_button" data-toggle="tooltip" title=" सेभ  गर्नुहोस्" name="Submit" type="submit" value="Save"> सेभ गर्नुहोस्</button>
              <a href="<?php echo base_url()?>PersonalProfile" class="btn btn-danger btn-xs" data-toggle="tooltip" title="सम्पादन गर्नुहोस्">रद्द गर्नुहोस्</a>
            </div>
        </form>
      </div>
    </div>
  </section>
</section>
<script type="text/javascript" src="<?php echo base_url()?>assets/assets/select2/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/nepali_datepicker/nepali.datepicker.v2.2.min.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>assets/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.dd_select').select2();
    $('.nepaliDate5').nepaliDatePicker();
    $('#date_1').nepaliDatePicker();
    //add multiple fields
    $('.btnAddNew').click(function(e) {
      $('.nepaliDate5').nepaliDatePicker();
      e.preventDefault();
      var trOneNew = $('.partsPurchaseFields').length+1;
      var sn = $(this).closest('.sn_1').val();
      var new_row = 
          '<tr class ="partsPurchaseFields" id="partsPurchaseFields_'+trOneNew+'" data-id="'+trOneNew+'">'+
          '<td>'+
          '<input type="text" name="family_member_name[]" value="" class="form-control topic_fixed_rate">'+
          '</td>'+
         '<td>'+
          '<select class="form-control dd_select" name="family_member_relation[]" data-placeholder="छान्नुहोस्" id="main_topic'+trOneNew+'" data-id="'+trOneNew+'"><option value="">छान्नुहोस्</option><?php if(!empty($rel)) {
                          foreach ($rel as $key => $re) { ?><option value="<?php echo $re['name']?>"><?php echo $re['name']; } }?></option></select>'+
         
          '</td>'+
          '<td>'+
             '<input type="text" placeholder="" data-mask="9999/99/99" class="form-control" name="family_member_dob[]">'+
          '</td>'+
          '<td><button type="button" class="btn btn-danger btn-sm remove-row" data-toggle="tooltip" title="हटाउनुहोस्"><span class="fa fa-times" tabindex="-1"></span></button></td>'+
        '<tr>'
      $("#add_new_fields").append(new_row);
      $('.dd_select').select2();
      $('#date_'+trOneNew).nepaliDatePicker();
    });
    $("body").on("click",".remove-row", function(e){
      e.preventDefault();
      if (confirm('के तपाइँ  यसलाई हटाउन निश्चित हुनुहुन्छ ?')) {
        var amt = $(this).closest("tr").find('.topic_rate').val();
        var t_amt = $('#t_total').val();
        var new_amt = t_amt-amt;
        $("#t_total").val(new_amt);
        $(this).parent().parent().remove();
      }
    });

    //on change get distrist 
    $(document).on('change', '.npl_state', function() {
      obj = $(this);
      var state = obj.val();
      var name = $('#land_owner_name_en').val();
      var ganapa = $('.lo_gapanapa').val();
      var ward = $('.address_ward').val();
      $.ajax({
        url:base_url+'PersonalProfile/getDistrictByState',
        method:"POST",
        data:{state:state, name:name,gapana:ward,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
        success : function(resp){
          if(resp.status == 'success') {
            $('.npl_districts').html(resp.option);
          }
        }
      });
    });

    //onchange generate file no
    $(document).on('change','#address_ward', function() {
      obj = $(this);
      var address_ward = obj.val();
      var name = $('#land_owner_name_en').val();
      var ganapa = $('.lo_gapanapa').val();

      var profile_id = $('#profile_id').val();
      if(name == '') {

        alert('जग्गाधनिको नाम (अंग्रेजी)');
        return;
      }
      //alert(ganapa);
      $.ajax({
        url:base_url+'PersonalProfile/generateCodeForEdit',
        method:"POST",
        data:{address_ward:address_ward,name:name,ganapa:ganapa,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',profile_id:profile_id},
        success : function(resp){
          $("#lo_owner_symbol").val(resp);
        }
      });
    });

    $(document).on('input','#land_owner_name_en', function() {
      obj = $(this);
      var name = obj.val();
      if(name == '') {
        alert('जग्गाधनिको नाम (अंग्रेजी)');
        return
      }
      var address_ward = $('#address_ward').val();
      var ganapa = $('.lo_gapanapa').val();
      var profile_id = $('#profile_id').val();
      $.ajax({
        url:base_url+'PersonalProfile/generateCodeForEdit',
        method:"POST",
        data:{address_ward:address_ward,name:name,ganapa:ganapa,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',profile_id:profile_id},
        success : function(resp){
          //console.log(resp);
          $("#lo_owner_symbol").val(resp);
        }
      });
    });

    $(document).on('change','.lo_gapanapa',function(){
   
      var ganapa = $(this).val();
      var name = $('#land_owner_name_en').val();
      var address_ward = $('#address_ward').val();
      var profile_id = $('#profile_id').val();
      if(name == '') {
        alert('जग्गाधनिको नाम (अंग्रेजी)');
        return
      }
      $.ajax({
        url:base_url+'PersonalProfile/generateCodeForEdit',
        method:"POST",
        data:{address_ward:address_ward,name:name,ganapa:ganapa,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',profile_id:profile_id},
        success : function(resp){
          $("#lo_owner_symbol").val(resp);
        }
      });
    });

    $(document).on('change', '.npl_districts', function() {
      obj = $(this);
      var district = obj.val();
      $.ajax({
        url:base_url+'PersonalProfile/getGapanapaByDistricts',
        method:"POST",
        data:{district:district,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
        success : function(resp){
          if(resp.status == 'success') {
            $('.npl_gapana').html(resp.option);
            $('#lo_owner_symbol').val('');
          }
        }
      });
    });

    // --------------------------------------------//
    $(document).on('change', '.bi_state', function() {
      obj = $(this);
      var state = obj.val();
      $.ajax({
        url:base_url+'PersonalProfile/getDistrictByState',
        method:"POST",
        data:{state:state,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
        success : function(resp){
          if(resp.status == 'success') {
            $('.bi_districts').html(resp.option);
          }
        }
      });
    });

    $(document).on('change', '.bi_districts', function() {
      obj = $(this);
      var district = obj.val();
      $.ajax({
        url:base_url+'PersonalProfile/getGapanapaByDistricts',
        method:"POST",
        data:{district:district,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
        success : function(resp){
          if(resp.status == 'success') {
            console.log(resp.option);
            $('.bi_gapana').html(resp.option);
          }
        }
      });
    });


    $(document).on('input', '.per_tol', function(){
      var per_tol = $(this).val();
      $('.tem_tol').val(per_tol);
    });

    //per_house_no
    $(document).on('input', '.per_house_no', function(){
      var per_house_no = $(this).val();
      $('.tem_house_no').val(per_house_no);
    });

    $(document).on('click','#suchak_details', function(){
      var name = $('#land_owner_name_np').val();
      var ward = $('.p_address_ward').val();
     
      $('.form_filler_name').val(name);

      $("#app_relation option").each(function () {
        if ($(this).html() == "आफै") {
            $(this).attr("selected", "selected");
            return;
        }
      });

      $("#app_ward_no option").each(function () {
        if ($(this).html() == 3) {
            $(this).attr("selected", "selected");
            return;
        }
      });

      
     //  var s = $("#app_relation").prop("selectedIndex", 1).val();
     //  $('#app_relation').val(s);
     // // $('#app_relation  option[value="'+s+'"]').attr("selected");
     //  $('#app_relation').prop('selected','selected');
      // var s = $("#app_relation option:second").val();
      //alert(s);
    });

    $(document).on('input', '#land_owner_name_np', function(){
        var name = $(this).val();
        $('#family_name_1').val(name);
    });

    $(document).on('change', '.npl_temp_state', function() {
      obj = $(this);
      var state = obj.val();
      $.ajax({
        url:base_url+'PersonalProfile/getDistrictByState',
        method:"POST",
        data:{state:state,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
        success : function(resp){
          if(resp.status == 'success') {
            $('.npl_temp_districts').html(resp.option);
          }
        }
      });
    });

    $(document).on('change', '.npl_temp_districts', function() {
      obj = $(this);
      var district = obj.val();
      $.ajax({
        url:base_url+'PersonalProfile/getGapanapaByDistricts',
        method:"POST",
        data:{district:district,'<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'},
        success : function(resp){
          if(resp.status == 'success') {
            console.log(resp.option);
            $('.lo_temp_gapanapa').html(resp.option);
          }
        }
      });
    });





  });//end of dom
</script>
