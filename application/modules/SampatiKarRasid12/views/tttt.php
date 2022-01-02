<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <title><?php echo GNAME?></title>
    <head>
      <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo base_url()?>assets/css/bootstrap-reset.css" rel="stylesheet">
      <link rel="shortcut icon" href="http://bmsnepal.net/budiganga/assets/img/nepal-govt.png">
    <style>
    
    @media all {

      .print_table {
          width: 100%;
          border: solid 1px;
          border-collapse: collapse;
      }
      .print_table th{
          border-color: black;
          font-size: 12px;
          border: solid 1px;
          border-collapse: collapse;
          margin: 0;
          padding: 0;
      }
      .print_table td{
          border-color: black;
          font-size: 12px;
          border: solid 1px;
          border-collapse: collapse;
          margin: 0;
          padding: 0;
          text-align: center;
      }
      .print_table tr:nth-child(odd){
          background-color:#E8E8E8;
      }
      .print_table tr:nth-child(even){
          background-color:#ffffff;
      }
      
      }

    body {
      font-family: freesans;
    }

    #customers {
      /*font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;*/
      border-collapse: collapse;
      width: 100%;
    }

    #customers td,
    #customers th {
      border: 1px solid #000 !important;
      padding: 8px;
    }

    /*#customers tr:nth-child(even){background-color: #f2f2f2;}*/

    /* #customers tr:hover {
      background-color: #000;
    } */

    #customers th {
      
      text-align: left;
      /* background-color: #4CAF50;*/
      color: #000;
    }

    </style>
  </head>
  <body>
    <div id="container" style="margin:10px;">
      <div style="height: 100px;width: 100px; margin-top:33px">
        <img src="<?php echo base_url()?>assets/img/nepal-govt.png"
          style="height: 100px; width: 120px;">
      </div>
      
      
      <div style="margin-top: -43px;margin-left: 1189px;" class="hideme">
        <button class="btn btn-info btn-sm " style="color:#FFF; margin-top: -50px;" id="basic">प्रिन्ट गर्नुहोस्</button>
         <a href="<?php echo base_url()?>" class ="btn btn-success btn-sm"style="margin-top:-49px">Dashboard</a>
      </div>
      <div style="height: 70px; width: 200px;margin-top: -90px;margin-left:576px;font-size:16px;"><p style ="font-size:23px;"><b><?php echo GNAME?></b></p></div>
      <div style="height: 70px; width: 279px;margin-top: -37px;margin-left:550px;"><b><?php echo SLOGAN?>
      
      </b></div>
      <div style="height: 70px; width: 200px;margin-top: -50px;margin-left:580px;">
        </div> 
      <div style="height: 70px; width: 300px;margin-top: -65px;margin-left:612px;"><?php echo STATENAME?>,नेपाल</div>

        <div style="height: -58px; width: 350px;margin-top: -40px;margin-left:520px;"><h3><u>सम्पतीकर / भूमिकर नगदी रसिद</u></h3></div>
      <br>
       <div style=" ">
          क. रसिद नं. - <?php echo $this->mylibrary->convertedcit($bill_details[0]['bill_no']) ?>
        </div>
          <div style="margin-right: 90px;">
           करदाताको संकेत नं.- <?php echo $this->mylibrary->convertedcit($bill_details[0]['nb_file_no'])?>
          </div>  
            <div style="margin-right: 90px;">
             करदाताको नामः-<?php echo $land_owner_details['land_owner_name_np']?>
            </div>

            <div style="margin-left:1272px; margin-top:-70px;">
             आ.व.- <?php echo $this->mylibrary->convertedcit(get_current_fiscal_year()) ?>
            </div>
            <div style="margin-left: 1123px; margin-top:0px;">
             पछिल्लो पटक तिरेको रसिद नं.- 
            </div>
            <div style="margin-left: 1194px; margin-top:0px;">
             आन्तरीक संकेत नं.-<?php echo $this->mylibrary->convertedcit($billcount)?> 
            </div>
            <div style="margin-left: 1194px; margin-top:0px;">
             मितिः- <?php echo $this->mylibrary->convertedcit($kar_details['billing_date'])?>
            </div>
            <!-- ---------------------------------------------------------------- -->
           <div>
            करदाताको ठेगानाः- <?php echo
            STATENAME
            
            ?> 
           </div>

            <div style="margin-top: -20px; margin-left: 261px;">
            जिल्लाः <?php 
                $district = $this->CommonModel->getDistrictsByID($land_owner_details['lo_district']);
              echo $district['name']?>
            </div>
            <div style="margin-top: -20px; margin-left: 480px;">
             <?php echo $land_owner_details['gapa']?>
            </div>

            <div style="margin-top: -20px; margin-left: 600px;">
              वडा नं.- <?php echo $this->mylibrary->convertedcit($land_owner_details['lo_ward'])?>
            </div>

            <div style="margin-top: -20px; margin-left: 800px;">
             टोलः <?php echo $land_owner_details['lo_tol']?>
            </div>
            <div style="margin-top: -20px; margin-left: 960px;">
              घर नं.-<?php echo $this->mylibrary->convertedcit($land_owner_details['lo_house_no'])?>
            </div>

          <div style="margin-top:20px;">
            <table class="  print_table">
              <thead>
                <tr>
                  <th rowspan="2">क्र.सं</th>
                  <th colspan="5" class="text-center">जग्गाको विवरण</th>
                  <th colspan="3" style="width:250px;">भौतिक संरचनाको विवरण</th>
                  <th colspan="2" style="width:250px;">मूल्यांकन</th>
                  <!-- <th colspan="2" style="width:250px;">करहरुकोदर रेट</th> -->
                  <th rowspan="2" style="width:250px;">सम्पतीकर</th>
                  <th rowspan="2" style="width:250px;">भूमिकर</th>
                </tr>
                <tr>
                  <th style="width:250px;">साबिक गा.पा/न.पा</th>
                  <th style="width:250px;">हालको वडा</th>
                  <!-- <th style="width:250px;">सडकको नाम</th> -->
                  <!-- <th style="width:250px;">जग्गाको क्षेत्रगत किसिम</th> -->
                  <!-- <th style="width:250px;">जग्गाको श्रेणी</th -->
                  <!-- <th style="width:250px;">तोकिएको न्युनतम मुल्य(प्रति कठ्ठा )</th> -->
                  <th style="width:250px;">नक्सा नं</th>
                  <th style="width:250px;">कित्ता नं</th>
                  <th style="width:250px;">क्षेत्रफल((बिघा-कठ्ठा -धुर))</th>

                  <th style="width:250px;">बनावटको किसिम</th>
                  <th style="width:250px;">प्रयोग</th>
                  <!-- <th style="width:250px;">प्रकार </th> -->
                  <th style="width:250px;">क्षेत्रफल(व फु )</th>
                 <!--  <th style="width:250px;">सम्पतिकर मूल्यांकन </th> -->

                  <!-- <th>क्षेत्रफल(व फु )</th>
                  <th>जग्गाको कयम मुल्य </th> -->

                  <th>संरचनाको कायम मुल्य</th>
                  <th>भूमिकर कायम मुल्य</th>

                </tr>
              </thead>
              <tbody>
                <?php 
                if(!empty($Billsdetails)){
                  $i=1;
                  $sampatiKar =0;
                  $bhumiKar = 0;
                    $total_sampati_eval = 0;
            $sampati_dar_rate = 0;
            $over_all_sam_kar = 0;
                  foreach ($Billsdetails as $key => $value) { 
                    //$sanrachana_details = $this->CommonModel->getDataBySelectedField('sanrachana_details','k_no', $value['k_number']);
                  ?>

                    <tr>
                      <!-- jagga ko biwaran -->
                      <td><?php echo $this->mylibrary->convertedcit($i++)?></td>
                      <td><?php echo $value['old_gapa_napa'].'-'.$value['old_ward']?></td>
                      <td><?php echo $value['present_gapa_napa'].'-'.$value['present_ward']?></td>
                      <!-- <td><?php //echo $value['rm']?></td> -->
                      <!-- <td><?php //echo $value['land_area_type']?></td> -->
                      <!-- <td><?php //echo $value['category']?></td> -->
                      
                     <!--  <td><?php //echo $this->mylibrary->convertedcit($value['k_land_rate'])?></td> -->
                      <td><?php echo $this->mylibrary->convertedcit($value['nn_number'])?></td>
                      <td><?php echo $this->mylibrary->convertedcit($value['k_number'])?></td>
                      <td>
                        <?php
                          echo $this->mylibrary->convertedcit($value['a_ropani']).'-'.$this->mylibrary->convertedcit($value['a_ana']).'-'.$this->mylibrary->convertedcit($value['a_paisa'])
                        ?>
                    </td>
                        <!-- end of jagga ko bibiaran -->
                      <?php if(!empty($value['sanrachana_id'])) { ?>
                        <td><?php echo $value['structure_type']?></td>
                        
                        <td><?php if( $value['sanrachana_usages'] == '2'){ echo 'उद्योग';}?></td>
                        
                        <td><?php echo $this->mylibrary->convertedcit($value['sanrachana_ground_housing_area_sqft'])?>
                          <?php 
                            $sanrachanako_sqft = $value['sanrachana_ground_housing_area_sqft']/3645;

                          ?>
                          =<?php echo $this->mylibrary->convertedcit(round($sanrachanako_sqft,2));?>(कठ्ठा)
                        </td>
                        <!-- <td><?php //echo $this->mylibrary->convertedcit($value['net_tax_amount'])?></td> -->
                      <?php } else { ?>
                        <td colspan="3"><div class="alert alert-danger">भौतिक संरचनाको विवरण बनेको छैन </div></td>
                      <?php } ?>
                      <td>
                        <?php if(!empty($value['sanrachana_id'])) { 
                          $bhumi_eval = $value['r_bhumi_area'];
                          $kaatha = $bhumi_eval/3645;
                        } else { 
                          $bhumi_eval = $value['total_square_feet'];
                          $kaatha = $bhumi_eval/3645;
                         } 
                         //echo $this->mylibrary->convertedcit($bhumi_eval).'('.$this->mylibrary->convertedcit(round($kaatha,2)).'कठ्ठा)';
                          if(!empty($value['sanrachana_id'])) {
                            echo $this->mylibrary->convertedcit($value['net_tax_amount']);
                          } else {
                            echo '0';
                          }
                         ?>
                      </td>

                      <td><?php echo $this->mylibrary->convertedcit($value['k_land_rate'])?></td>
                      <?php 
                      if(!empty($value['sanrachana_id'])) {
                        $sampati_kar = $this->SampatiKarRasidModel->getSampatiKarRateDetails($value['net_tax_amount']);
                      } 
                      $t_bhumi_kar_dar = $this->SampatiKarRasidModel->getBhumiKarRateDetails($value['present_ward'],$value['land_category'], $value['lat']);
                      ?>
                      <?php $total_sampati_eval +=$value['net_tax_amount']; ?>
                      <td>
                        <?php if(!empty($value['sanrachana_id'])) {
                                     
                                      if($sampati_kar['is_percent'] == 1) {
                                        $sam_kar = $value['net_tax_amount'] * $sampati_kar['amount']/100;
                                      } else if($value['net_tax_amount'] > 500000000) {
                                          $sam_kar = $value['net_tax_amount'] * 0.40/100;
                                      }
                                      else {
                                        $sam_kar = $sampati_kar['amount'];
                                      }
                        } else {
                          $sam_kar = 0;
                        }
                        if(!empty($value['sanrachana_id'])) { 
                        $sampati_kar_new = $this->SampatiKarRasidModel->getSampatiKarRateDetails($total_sampati_eval);
                        if($value['ld_file_no'] == '00-02-0006') {
                                          $sampati_dar_rate = $total_sampati_eval * 0.15/100;
                                      }
                         else if($sampati_kar_new['is_percent'] == 1) {
                                        $sampati_dar_rate = $total_sampati_eval * $sampati_kar['amount']/100;
                                      } 
                                     
                                      else if($total_sampati_eval > 500000000) {
                                          $sampati_dar_rate = $total_sampati_eval * 0.40/100;
                                      } 
                                      else {
                                       $sampati_dar_rate  = $sampati_kar_new['amount'];
                                      }
                                     
                        //echo $this->mylibrary->convertedcit(round//($sampati_dar_rate,2));
                        echo '--';
                        
                        } else {
                        echo '--';
                        }?>
                        <?php  $over_all_sam_kar += $sampati_dar_rate;?>
                      </td>
                      <td>
                        <?php 
                          
                        if(!empty($value['sanrachana_id'])) { 
                          $bhumi_kar = $kaatha * $t_bhumi_kar_dar['rate'];
                        } else { 
                          $bhumi_kar = $kaatha * $t_bhumi_kar_dar['rate'];
                         } 
                         echo $this->mylibrary->convertedcit(round($bhumi_kar,2));
                         ?>
                      </td>
                      <?php $sampatiKar +=$sam_kar;
                          $bhumiKar +=$bhumi_kar;
                      ?>
                    </tr>
                <?php }
                } ?>
              </tbody>
              <tfoot>
                            <tr>
                              <td colspan="9" class="text-right">जम्मा सम्पती मूल्यांकन </td>
                              <td colspan="2" class="text-right"><?php 
                            
                                                      echo !empty($total_sampati_eval)?$this->mylibrary->convertedcit($total_sampati_eval):0;
                              ?></td>
                              <td colspan="">
                              <?php 
                                 if(!empty($total_sampati_eval)) {
                        $sampati_kar_total = $this->SampatiKarRasidModel->getSampatiKarRateDetails($total_sampati_eval);
                          $total_kar_eval = $total_sampati_eval / 100000;
                          $sam_kar_total_tax = $total_kar_eval * $sampati_kar_total['amount'];
          
                          } else {
                          $sam_kar_total_tax = 0;
                          }
                          echo  $this->mylibrary->convertedcit(round($sam_kar_total_tax));
                          ?>
                              </td>
                          
                              <td colspan=""><?php 
                               if($land_owner_details['file_no'] == '00-14-0001' && $sampati_kar_total['is_percent'] == 1) {
                                     
                                     
                                                    $bhumiKar = 10376.11 ;
                                                    echo $this->mylibrary->convertedcit(round($bhumiKar));
                                                } else {
                                                      echo !empty($bhumiKar)?$this->mylibrary->convertedcit(round($bhumiKar,2)):'';
                                                }
                            ?></td>
                            </tr>
              </tfoot>
            </table>
          </div>
          <?php 
            $total_sampati_kar_rate = !empty($sam_kar_total_tax)? $sam_kar_total_tax:0;
            $total_bhumi_kar_rate = !empty($bhumiKar)?$bhumiKar:0;
            $total_t_amount =  $total_sampati_kar_rate + $total_bhumi_kar_rate;?>
          <!-- bill footer -->
          <div style="margin-top:20px;">
            <table id="customers">
             <tbody>
               
                <tr>
                <td align="right">जम्मा कर  रु  </td><td> <?php echo $this->mylibrary->convertedcit(number_format($total_t_amount))?></td>
              </tr>
              <tr>
                <td colspan="" align="right">अन्य सेवा शुल्क रु: </td>
                <td><?php echo $this->mylibrary->convertedcit(number_format($kar_details['other_amount'])) ?></td>
              </tr>
              <tr>
                <td colspan="" align="right">छुट रकम रु:</td>
                <td colspan="" > <?php echo $this->mylibrary->convertedcit(number_format($kar_details['discount_amount']))?></td>
              </tr>
              <tr>
                <td colspan="" align="right">बक्यौता रकम रु:  </td>
                <td><?php echo !empty($kar_details['bakeyuta_amount']) ? $this->mylibrary->convertedcit($kar_details['bakeyuta_amount']) : $this->mylibrary->convertedcit(0)?></td>
              </tr>
              <tr>
                <td colspan="" align="right">जरिवाना रकम रु: </td>
                <td><?php echo !empty($kar_details['fine_amount']) ? $this->mylibrary->convertedcit($kar_details['fine_amount']) : $this->mylibrary->convertedcit(0)?>
                  </td>
              </tr>
              <tr>
                <td colspan="" align="right">कुल  जम्मा मुल्य रु </td>
                <td>
                <?php 
                $fine_amount = !empty($kar_details['fine_amount']) ? $kar_details['fine_amount']:0;
                $other_amount = !empty($kar_details['other_amount']) ? $kar_details['other_amount']:0;
                $bakeyuta_amount = !empty($kar_details['bakeyuta_amount']) ? $kar_details['bakeyuta_amount']:0;
                $discount_amount = !empty($kar_details['discount_amount']) ? $kar_details['discount_amount']:0;

                $net_total = $fine_amount + $total_t_amount + $other_amount + $bakeyuta_amount - $discount_amount;
                echo $this->mylibrary->convertedcit(round($net_total),2);
                ?>
                  </td>
              </tr>

              <tr>
                 <td colspan="8" align="center"><b><i><?php echo 'अक्षरूपी ' .$this->convertlib->convert_number(round($net_total) ,"मात्र |").' '.'मात्र ।';?></i></b></td>

               </tr>
             </tbody>
            </table>
          </div>
         <div style="margin-left:382px; margin-top: 10px;"><b>कृपयाः अर्को पटक कर तिर्न आउँदा यो रसिद साथमा लिएर आउनुहोला ।</b></div>

         <!-- ------------------------------ -->
         <div style="margin-top:40px;">
          ------------------------<br>
          बुझाउनेकाे सही:
         </div>

         <div style="margin-left: 1277px;margin-top: -57px; ">
          ------------------------<br>
          बुझिलिनेकाे सही<br>
          (<?php
              $user = $this->CommonModel->getCurrentUser($kar_details['added_by']);
          echo $user['name'];
          ?>)
      </div>

      <div style="margin-top: 20px;">
        <?php echo $this->mylibrary->convertedcit(1)?>) समयमा बुझाउनु पर्ने कर नबुझाएमा जरिवाना लाग्ने छ ।<br>
        <?php echo $this->mylibrary->convertedcit(2)?>) सम्पतीकर थपघट भएमा थपघट भएको ३५ दिन भित्र  <?php echo TYPE?> कार्यालयमा आइ सो को विवरण पेश गर्नुपर्ने छ ।<br>
         <?php echo $this->mylibrary->convertedcit(3)?>) सम्पतीकर बुझाउदैमा <?php echo TYPE?> घरको नक्सापास गर्नुपर्ने दायित्ववाट छुटकार हुनेछैन ।
      </div>
    </div>

    
      
      <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
      <script type="text/javascript" src="<?php echo base_url()?>assets/jsprint/printThis.js"></script>

      <script type="text/javascript">
        $(document).ready(function(){
          $('#basic').on("click", function () {
            $('.hideme').hide();
            window.print();
         // $('#container').printThis();
        });
        });
      </script>
  </body>
</html>
