<section id="main-content">
  <section class="wrapper site-min-height">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> गृहपृष्ठ</a></li>
        <li class="breadcrumb-item" ><a href="<?php echo base_url()?>Profile"> सम्पतीकर / भूमिकर</a></li>
        <li class="breadcrumb-item" ><a href="javascript:;"> सम्पतीकर / भूमिकर</a></li>
      </ol>
   <a class="btn btn-info btn-sm pull-right" style="color:#FFF; margin-top: -50px;"  href="<?php echo base_url()?>SampatiKarRasid/viewBill/<?php echo $land_owner_details['file_no']?>" target="__blank"><i class="fa fa-print"></i> प्रिन्ट गर्नुहोस् </a>
   <!-- <button class="btn btn-info btn-sm pull-right" style="color:#FFF; margin-top: -50px;" id="basic">प्रिन्ट गर्नुहोस्</button> -->
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
        <section class="card" id="printbill">
          <div class="card-body">
              <div class="row">
                <div class="col-md-3">
                  <img src="<?php echo base_url()?>assets/img/nepal-govt.png" style="height: 70px; width: 70px;">
                </div>
                <div class="col-md-6">
                  <div  style="margin-left:120px;">
                   <div style="height: 70px; width: 200px;margin-left:80px;"><h5><?php echo GAPA?></h5></div>
                    <div style="height: 70px; width: 200px;margin-top: -50px;margin-left:60px;"><b><h4>गाउँ कार्यपालिकाको कार्यालय</h4></b></div>
                    <div style="height: 70px; width: 200px;margin-top: -50px;margin-left:105px;"><?php echo SLOGAN?>
                    </div>
                    <div style="height: 70px; width: 200px;margin-top: -50px;margin-left:85px;"><?php echo PROVIENCE?>, नेपाल </div>
                  <div style="height: 70px; width: 400px;margin-top: -40px;margin-left:45px;"><h3><u>सम्पतीकर / भूमिकर  रिसद</u></h3></div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div style="float: right;">
                    <img src="<?php echo base_url()?>assets/img/2020logo.png" style="height: 85px; width: 85px;">
                  </div>
                </div>
              </div>
            <div class="row">
              <div class="col-md-6">
                <div style=" ">
                 क.रसिद नं. - <?php echo $this->mylibrary->convertedcit($bill_details[0]['bill_no']) ?>
                </div>
                <div style="margin-right: 90px;">
                 करदाताको संकेत नं.- <?php echo $this->mylibrary->convertedcit($bill_details[0]['nb_file_no'])?>
                </div>
                <div style="margin-right: 90px;">
                 करदाताको नामः-<?php echo $land_owner_details['land_owner_name_np']?>
                </div>
              </div>
              <div class=" col-md-6">
                <div class="pull-right" style="margin-right: 150px;">
                  आ.व.- <?php echo $this->mylibrary->convertedcit($bill_details['0']['fiscal_year']) ?>
                </div><br>
                <div class="pull-right" style="margin-right: 150px;">
                  पछिल्लो पटक तिरेको रसिद नं.-
                </div><br>
                <div class="pull-right" style="margin-right: 150px;">
                  आन्तरीक संकेत नं.- <?php echo $this->mylibrary->convertedcit($billcount)?>
                </div><br>

                <div class="pull-right" style="margin-right: 150px;">
                  मितिः- <?php echo $this->mylibrary->convertedcit($kar_details['billing_date'])?>
                </div><br>
               <!--  <div class="pull-right" style="margin-right: 150px;">
                  गापा/नापा :<?php //echo  GAPA;?>
                </div> -->
              </div>
              <div class="col-md-12"><hr></div>
              <div class="col-md-3">करदाताको ठेगानाः- बागमती प्रदेश </div>
              <div class="col-md-2">जिल्लाः <?php 
                $district = $this->CommonModel->getDistrictsByID($land_owner_details['lo_district']);
              echo $district['name']?></div>
              <div class="col-md-2"><?php echo $land_owner_details['gapa']?> </div>
              <div class="col-md-1">वडा नं.- <?php echo $this->mylibrary->convertedcit($land_owner_details['lo_ward'])?>  </div>
              <div class="col-md-2">टोलः <?php echo $land_owner_details['lo_tol']?> </div>
              <div class="col-md-2">घर नं.- <?php echo $this->mylibrary->convertedcit($land_owner_details['lo_house_no'])?> </div>
            </div>
            <br><br>
            <div class="row">
              <div class="col-md-12">
                <table class="table table-bordered table-responsive">
                  <thead>
                      <tr>
                        <th rowspan="2">क्र.सं</th>
                        <th colspan="6">जग्गाको विवरण</th>
                        <th colspan="4">भौतिक संरचनाको विवरण</th>
                        <th rowspan="2">जम्मा सम्पतिकर मूल्यांकन </th>
                        <th colspan="2">भूमिकर मूल्यांकन</th>
                        <th rowspan="2">सम्पतीकर</th>
                        <th rowspan="2">भूमिकर</th>
                      </tr>
                      <tr>
                        <th>साबिक गा.पा/न.पा</th>
                        <th>वडा</th>
                        <th>हालको वडा</th>
                        <th>नक्सा नं</th>
                        <th>कित्ता नं</th>
                        <th>क्षेत्रफल(व फु )</th>

                        <th>बनावटको किसिम</th>
                        <th>प्रयोग</th>
                        <th>प्रकार </th>
                        <th>क्षेत्रफल(व फु )</th>

                        <th>क्षेत्रफल(व फु )</th>
                        <th>जग्गाको कयम मुल्य </th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php
                      $total_sampati_kar = 0;
                      $total_r_bhumi_kar = 0;
                      $total_tax_amount_with_san = 0;
                      $total_bhumi_kar_rate = 0;
                      $i =1;
                      if(!empty($land_details)) : 
                        foreach ($land_details as $key => $value) :?>
                          <tr>
                            <td><?php echo $i++?></td>
                            <td><?php echo $this->mylibrary->convertedcit($value['old_gapa_napa']) ?></td>
                            <td><?php echo $this->mylibrary->convertedcit($value['old_ward']) ?></td>
                            <td><?php echo $this->mylibrary->convertedcit($value['present_ward']) ?></td>
                            <td><?php echo $this->mylibrary->convertedcit($value['nn_number']) ?></td>
                            <td><?php echo $this->mylibrary->convertedcit($value['k_number']) ?></td>
                            <td>
                              (<?php
                              $ropani = !empty($value['a_ropani'])?$value['a_ropani']:0;
                              $aana = !empty($value['a_ana'])?$value['a_ana']:0;
                              $paisa = !empty($value['a_paisa'])?$value['a_paisa']:0;
                              $dam = !empty($value['a_dam'])?$value['a_dam']:0;
                              echo $this->mylibrary->convertedcit($ropani).'-'.$this->mylibrary->convertedcit($aana).'-'.$this->mylibrary->convertedcit($paisa).'-'.$this->mylibrary->convertedcit($dam); ?>)
                            </td>
                            <?php 
                               $sanrachana_details = $this->SampatiKarRasidModel->getBSanrachanaDetailsByKNo($value['k_number'],$value['fiscal_year']); 
                              if(!empty($sanrachana_details)) {
                                foreach ($sanrachana_details as $key => $sanrachana) { ?>
                                  <td><?php echo $sanrachana['st']?></td>
                                  <td><?php echo $sanrachana['sanrachana_usages']?></td>
                                  <td><?php echo $sanrachana['architect_type']?></td>
                                  <td><?php echo $this->mylibrary->convertedcit($sanrachana['sanrachana_ground_housing_area_sqft'])?></td>
                                  <td><?php echo $this->mylibrary->convertedcit(number_format($sanrachana['net_tax_amount']))?></td>
                                  <td><?php echo $this->mylibrary->convertedcit($sanrachana['r_bhumi_area'])?></td>
                                  <td><?php echo $this->mylibrary->convertedcit(number_format($sanrachana['r_bhumi_kar']))?></td>
                                  <?php
                                      $sampati_kar = $this->SampatiKarRasidModel->getSampatiKarRateDetails($sanrachana['net_tax_amount']);
                                      if($sampati_kar['is_percent'] == 1) {
                                        $sam_kar = $sanrachana['net_tax_amount'] * $sampati_kar['amount']/100;
                                      } else {
                                        $sam_kar = $sampati_kar['amount'];
                                      }
                                  ?>
                                <!-- sampati kar -->
                                <td><?php echo $this->mylibrary->convertedcit(round($sam_kar,2))?></td>
                                <?php 
                                  $t_bhumi_kar_wl = $this->SampatiKarRasidModel->getBhumiKarRateDetails($value['present_ward'],$value['land_category'], $value['land_area_type']);
                                  $total_sampati_kar +=$sam_kar;
                                  $biga= !empty($value['a_ropani'])?$value['a_ropani']:0;
                                  $kattha = !empty($value['a_ana'])?$value['a_ana']:0;
                                  $dhur= !empty($value['a_paisa'])?$value['a_paisa']:0;
                                  $c_biga = $biga*20*$t_bhumi_kar_wl['rate'];
                                  $c_kattha = $kattha*$t_bhumi_kar_wl['rate'];
                                  $c_dhur = $dhur*20*20*$t_bhumi_kar_wl['rate'];
                                  $toal_kar = $c_biga + $c_kattha+ $c_dhur;
                                  $total_r_bhumi_kar += $toal_kar;
                                  $kattha_rate = $sanrachana['r_bhumi_area']/3645;
                                  $bhumi_kar_with_s = $kattha_rate * $t_bhumi_kar_wl['rate'];
                                  $total_tax_amount_with_san  += $bhumi_kar_with_s;
                                ?>
                                <td><?php echo $this->mylibrary->convertedcit(round($bhumi_kar_with_s,2))?></td>
                                <?php  } //end of sanrachana blocks. 
                              } else { ?> 
                                <td colspan="4"><div class="alert alert-danger">भौतिक संरचनाको विवरण बनेको छैन </div></td><td><?php echo $this->mylibrary->convertedcit(0)?></td>
                                <td><?php echo $this->mylibrary->convertedcit(number_format($value['total_square_feet']))?></td>
                                <td><?php echo $this->mylibrary->convertedcit(number_format($value['t_rate']))?></td>
                                 <?php  $t_bhumi_kar_wl = $this->SampatiKarRasidModel->getBhumiKarRateDetails($value['present_ward'],$value['land_category'], $value['land_area_type']);  
                                  $biga= !empty($value['a_ropani'])?$value['a_ropani']:0;
                                  $kattha = !empty($value['a_ana'])?$value['a_ana']:0;
                                  $dhur= !empty($value['a_paisa'])?$value['a_paisa']:0;
                                  $c_biga = $biga*20*$t_bhumi_kar_wl['rate'];
                                  $c_kattha = $kattha*$t_bhumi_kar_wl['rate'];
                                  $c_dhur = $dhur*20*20*$t_bhumi_kar_wl['rate'];
                                  $toal_kar = $c_biga + $c_kattha+ $c_dhur;
                                  //$dam = !empty($value['a_dam'])?$value['a_dam']:0;
                               ?>
                                <td><?php echo $this->mylibrary->convertedcit(0)?></td>
                                <td><?php echo $this->mylibrary->convertedcit($toal_kar)?></td>
                                <?php $total_bhumi_kar_rate += $toal_kar?>
                             <?php } ?>
                          </tr>
                    <?php endforeach;endif;?>
                  </tbody>
                   <tfoot>
                    <tr>
                      <td colspan="15" align="right">जम्मा कर रु</td>
                      <td><?php 
                         $total_kar_amount = round($total_tax_amount_with_san,2)+ round($sam_kar,2)+round($total_bhumi_kar_rate);
                         
                      echo $this->mylibrary->convertedcit($total_kar_amount);
                      ?> </td>
                    </tr>
                    <tr>
                      <td colspan="15" align="right">अन्य सेवा शुल्क रु: </td>
                      <td><?php echo $this->mylibrary->convertedcit(number_format($kar_details['other_amount'])) ?></td>
                    </tr>
                    <tr>
                      <td colspan="15" align="right">छुट रकम रु:</td>
                      <td colspan="" > <?php echo $this->mylibrary->convertedcit(number_format($kar_details['discount_amount']))?></td>
                    </tr>
                    <tr>
                      <td colspan="15" align="right">खुद रकम रु: </td>
                      <td><?php 
                        $khud_amount =  $total_kar_amount +$kar_details['other_amount']-$kar_details['discount_amount'];
                        echo $this->mylibrary->convertedcit(number_format($khud_amount));
                       ?></td>
                    </tr>
                    <tr>
                      <td colspan="15" align="right">बक्यौता रकम रु:  </td>
                      <td><?php echo !empty($kar_details['bakeyuta_amount']) ? $this->mylibrary->convertedcit(number_format($kar_details['bakeyuta_amount'])) : $this->mylibrary->convertedcit(0)?></td>
                    </tr>
                    <tr>
                      <td colspan="15" align="right">जरिवाना रकम रु: </td>
                      <td><?php echo !empty($kar_details['fine_amount']) ? $this->mylibrary->convertedcit($kar_details['fine_amount']) : $this->mylibrary->convertedcit(0)?>
                      </td>
                    </tr>
                     <tr>
                      <td colspan="15" align="right">कुल  जम्मा मुल्य रु: </td>
                      <td><?php
                          $ba_amount = !empty($kar_details['bakeyuta_amount']) ? $kar_details['bakeyuta_amount']:0;
                          $fine_amount = !empty($kar_details['fine_amount']) ? $kar_details['fine_amount']:0;
                          $net_total = $khud_amount + $ba_amount + $fine_amount;
                          echo $this->mylibrary->convertedcit(number_format($net_total));
                      ?></td>
                    </tr>
                    <tr>
                      <td colspan="16" align="center"><?php echo 'अक्षरूपी ' .$this->convertlib->convert_number($net_total ,"मात्र |").' '.'मात्र ।';?></td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>

            <div style="margin-left:340px;"><b>कृपयाः अर्को पटक कर तिर्न आउँदा यो रसिद साथमा लिएर आउनुहोला ।</b></div>
          </div>

          <div style="margin-top: 35px; float:left">
        ------------------------<br>
        बुझाउनेकाे सही:
      </div>
      <div style="margin-top: 28px">
        <div style="float:right">
          <?php
           $user_details = $this->CommonModel->getCurrentUser($kar_details['added_by']);?>
          
                नाम: <?php echo $user_details['name']?><br>
              
                दर्जा: <?php echo $user['designation']?><br>
             
                कर्मचारी संकेत नं:  <?php echo $this->mylibrary->convertedcit($user['symbol_no'])?><br>
              
        
        </div><br><br>
        <div style="float:right; margin-top:20px; margin-left:20px;">
          ------------------------<br>
          बुझिलिनेकाे सही :
        </div><br>
        <div class="col-md-12"><?php echo $this->mylibrary->convertedcit(1)?>) समयमा बुझाउनु पर्ने कर नबुझाएमा जरिवाना लाग्ने छ । </div>
      <div class="col-md-12"><?php echo $this->mylibrary->convertedcit(2)?>) सम्पतीकर थपघट भएमा थपघट भएको ३५ दिन भित्र नगरपालिकाको सम्बन्धित वडा कार्यालयमा आइ सो को विवरण पेश गर्नुपर्ने छ ।  </div>
      <div class="col-md-12"><?php echo $this->mylibrary->convertedcit(3)?>) सम्पतीकर बुझाउदैमा विदुर नगरपालिकावाट घरको नक्सापास गर्नुपर्ने दायित्ववाट छुटकार हुनेछैन ।  </div>
          </section>
        </div>
      </div>
      <!-- page end-->
    </section>
  </section>

  <script type="text/javascript" src="<?php echo base_url()?>assets/jsprint/printThis.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#basic').on("click", function () {
      $('#printbill').printThis();
    });
    });
  </script>