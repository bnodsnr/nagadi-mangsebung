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
     /* font-family: freesans;*/
       font-family: Kalimati, Georgia, serif;
       /* background-image: url("../../assets/img/nepal-govt.png");
        background-repeat:no-repeat;
      background-position: center center;
      opacity: 0.5;*/
    }
    </style>
  </head>
  <body>
    <div id="container" style="margin:20px;">
      <div style="height: 100px;width: 100px; ">
        <img src="<?php echo base_url()?>assets/img/nepal-govt.png"
          style="height: 100px; width: 120px;">
      </div>
      <div style="margin-top: -40px;margin-left: 1057px;" class="hideme">
                <button class="btn btn-info btn-sm " style="color:#FFF;" id="basic"><i class="fa fa-print"></i>प्रिन्ट गर्नुहोस्</button>
                <a href="<?php echo base_url()?>" class ="btn btn-success btn-sm">Dashboard</a>
      </div>
      <div style="height: 70px; width: 200px;margin-top: -90px;margin-left:576px;"><?php echo GNAME?></div>
      
      <div style="height: 70px; width: 200px;margin-top: -50px;margin-left:540px;">
        <?php echo SLOGAN?></div> 
      <div style="height: 70px; width: 200px;margin-top: -47px;margin-left:576px;"><?php echo STATENAME?>,नेपाल</div>

        <div style="height: -58px; width: 450px;margin-top: -40px;margin-left:480px;"><h3><u>सम्पतीकर / भूमिकर नगदी रसिद</u></h3></div>
      <br>
       <div style=" ">
          क. रसिद नं. - <?php echo !empty($bill_details[0]['bill_no'])?$this->mylibrary->convertedcit($bill_details[0]['bill_no']):''; ?>
        </div>
        <div style="margin-right: 90px;">
         करदाताको संकेत नं.- <?php echo $this->mylibrary->convertedcit($bill_details[0]['nb_file_no'])?>
        </div>  
          <div style="margin-right: 90px;">
           करदाताको नामः-<?php echo $land_owner_details['land_owner_name_np']?>
          </div>

          <div style="margin-left:1080px; margin-top:-70px;">
           आ.व.- <?php echo $this->mylibrary->convertedcit(get_current_fiscal_year()) ?>
          </div>
          <div style="margin-left: 1000px; margin-top:0px;">
           पछिल्लो पटक तिरेको रसिद नं.- 
          </div>
          <div style="margin-left: 1080px; margin-top:0px;">
           आन्तरीक संकेत नं.-<?php echo $this->mylibrary->convertedcit($billcount)?> 
          </div>
          <div style="margin-left: 1080px; margin-top:0px;">
           मितिः- <?php echo $this->mylibrary->convertedcit($kar_details['billing_date'])?>
          </div>
          <!-- ---------------------------------------------------------------- -->
         <div>
          करदाताको ठेगानाः- <?php echo STATENAME?> 
         </div>

          <div style="margin-top: -20px; margin-left: 261px;">
          जिल्लाः <?php  echo DISTRICT?>
          </div>
          <div style="margin-top: -25px; margin-left: 400px;">
           <?php echo $land_owner_details['gapa']?>
          </div>

          <div style="margin-top: -25px; margin-left: 550px;">
            वडा नं.- <?php echo $this->mylibrary->convertedcit($land_owner_details['lo_ward'])?>
          </div>

          <div style="margin-top: -25px; margin-left: 660px;">
           टोलः <?php echo $land_owner_details['lo_tol']?>
          </div>
          <div style="margin-top: -20px; margin-left: 960px;">
            घर नं.-<?php echo $this->mylibrary->convertedcit($land_owner_details['lo_house_no'])?>
          </div>
            
          <div style="margin-top:20px;">
            <table class="print_table table table-bordered  table-responsive">
                                     <thead>
                                <tr>
                                  <th rowspan="2">क्र.सं</th>
                                  <th colspan="8" class="text-center">जग्गाको विवरण</th>
                                  <th colspan="2" style="width:180px;">भूमिकर मूल्यांकन</th>
                                </tr>
                                <tr>
                                  <th style="width:180px;">साबिक गा.पा/न.पा</th>
                                  <th style="width:180px;">हालको वडा</th>
                                  <th style="width:350px;">सडकको नाम</th>
                                      <th style="width:250px;">जग्गाको क्षेत्रगत किसिम</th>
                                      <th style="width:180px;">तोकिएको न्युनतम मुल्य(प्रति रोपनी</th>
                                  <th style="width:180px;">नक्सा नं</th>
                                  <th style="width:180px;">कित्ता नं</th>
                                  <th style="width:180px;">क्षेत्रफल(रो-आ-पै-दा)</th>
                                  <th>कर लाग्ने मुल्य </th>
                                </tr>
                             </thead>
                             <tbody>
                              <?php if(!empty($Billsdetails)){
                                $i=1;
                                $bhumi_kar_mulyankan_rakam = 0;
                                foreach ($Billsdetails as $key => $value) { ?>
                                <tr>
                                  <td style="width: 180px"><?php echo $this->mylibrary->convertedcit($i++)?></td>
                                  <td><?php echo $value['old_gapa_napa'].'-'.$this->mylibrary->convertedcit($value['old_ward'])?></td>
                                  <td><?php echo $value['present_gapa_napa'].'-'.$this->mylibrary->convertedcit($value['present_ward'])?></td>
                                  <td style="width:350px;"><?php echo $value['rm']?></td>
                                  <td><?php echo $value['land_area_type']?></td>
                                  <td><?php echo $this->mylibrary->convertedcit($value['k_land_rate'])?></td>
                                  <td><?php echo $this->mylibrary->convertedcit($value['nn_number'])?></td>
                                  <td><?php echo $this->mylibrary->convertedcit($value['k_number'])?></td>
                                  <td>
                                  <?php
                                    $a_ropani = !empty($value['a_ropani']) ? $this->mylibrary->convertedcit($value['a_ropani']): $this->mylibrary->convertedcit(0);
                                    $a_ana = !empty($value['a_ana']) ? $this->mylibrary->convertedcit($value['a_ana']): $this->mylibrary->convertedcit(0);
                                    $a_paisa = !empty($value['a_paisa']) ? $this->mylibrary->convertedcit($value['a_paisa']): $this->mylibrary->convertedcit(0);
                                    $a_dam = !empty($value['a_dam']) ? $this->mylibrary->convertedcit($value['a_dam']): $this->mylibrary->convertedcit(0);
                                    echo $a_ropani.'-'.$a_ana.'-'.$a_paisa.'-'.$a_dam;
                                  ?>  
                                  </td>
                                  <td><?php 
                                  $bhumi_kar_mulyankan_rakam += $value['t_rate'];
                                  echo $this->mylibrary->convertedcit($value['t_rate'])?></td>
                                <tr>
                              <?php } } ?>
                              </tbody>
                              <tfoot>
                              <tr>
                                <td colspan="9">जम्मा भूमिकर मूल्यांकन</td>
                                <td colspan="">
                                <?php echo !empty($bhumi_kar_mulyankan_rakam)?$this->mylibrary->convertedcit($bhumi_kar_mulyankan_rakam):0; ?>
                                </td>

                              </tr>
                    </tfoot>
                                  </table>
          </div>
         <div style="width:500px;margin-left: 30px;margin-top: 10px;">
            <ul class="">
              <li>समयमा बुझाउनु पर्ने कर नबुझाएमा जरिवाना लाग्ने छ ।</li>
              <li>सम्पतीकर थपघट भएमा थपघट भएको ३५ दिन भित्र  <?php echo TYPE?> कार्यालयमा आइ सो को विवरण पेश गर्नुपर्ने छ।</li>
              <li>सम्पतीकर बुझाउदैमा <?php echo TYPE?> घरको नक्सापास गर्नुपर्ने दायित्ववाट छुटकार हुनेछैन ।</li>
            </ul>
         </div>
         <div style="width:400px;margin-left: 1080px; margin-top: -130px;">
              <table>
                <tr>
                  <td><b>सम्पतीकर रु:</b></td><td align="right"> <?php echo !empty($kar_details['sampati_kar'])?$this->mylibrary->convertedcit(number_format($kar_details['sampati_kar'])):$this->mylibrary->convertedcit(0)?></td>
                </tr>
                <tr>
                  <td><b>भूमिकर:</b> </td><td align="right"><?php echo !empty($kar_details['bhumi_kar'])?$this->mylibrary->convertedcit(number_format($kar_details['bhumi_kar'])):$this->mylibrary->convertedcit(0)?></td>
                </tr> 
                <tr>
                  <td align="right"><b>अन्य सेवा शुल्क रु:</b></td><td align="right"> <?php echo !empty($kar_details['other_amount'])?$this->mylibrary->convertedcit(number_format($kar_details['other_amount'])):$this->mylibrary->convertedcit(0)?></td>
                </tr>
                <tr>
                  <td><b>छुट रकम रु:</b></td><td align="right"> <?php echo !empty($kar_details['discount_amount'])?$this->mylibrary->convertedcit(number_format($kar_details['discount_amount'])):$this->mylibrary->convertedcit(0)?></td>
                </tr>
                <tr>
                  <td><b>जरिवाना रकम रु:</b></td><td align="right"> <?php echo !empty($kar_details['fine_amount'])?$this->mylibrary->convertedcit(number_format($kar_details['fine_amount'])):$this->mylibrary->convertedcit(0)?></td>
                </tr>
                <tr>
                  <td><b>बक्यौता रकम रु:</b></td><td align="right"> <?php echo !empty($kar_details['bakeyuta_amount'])?$this->mylibrary->convertedcit(number_format($kar_details['bakeyuta_amount'])):$this->mylibrary->convertedcit(0)?></td>
                </tr>
                <tr>
                  <td style="border-top: 2px solid #000"><b>कुल जम्मा रु:</b></td><td align="right" style="border-top: 2px solid #000"> <?php echo !empty($kar_details['net_total_amount'])?$this->mylibrary->convertedcit(number_format($kar_details['net_total_amount'])):$this->mylibrary->convertedcit(0)?></td>
                </tr>
              </table>
            <!-- </ul> -->
         </div>
          <hr style="border:1px solid #000">
         <div style="margin-left:382px; margin-top: 10px;"><b><u>कृपयाः अर्को पटक कर तिर्न आउँदा यो रसिद साथमा लिएर आउनुहोला ।</u></b></div>

         <!-- ------------------------------ -->
         <div style="margin-top:50px;margin-left: 30px;">
          ------------------------<br>
          बुझाउनेकाे सही:
         </div>

         <div style="margin-left: 1080px;margin-top: -47px; ">
          ------------------------<br>
          बुझिलिनेकाे सही<br>
          (<?php
              $user = $this->CommonModel->getCurrentUser($kar_details['added_by']);
          echo $user['name'];
          ?>)
      </div>
      
     <!--  <div style="margin-top: 20px;margin-left: 50px;">
        <?php //echo $this->mylibrary->convertedcit(1)?>) समयमा बुझाउनु पर्ने कर नबुझाएमा जरिवाना लाग्ने छ ।<br>
        <?php //echo $this->mylibrary->convertedcit(2)?>) सम्पतीकर थपघट भएमा थपघट भएको ३५ दिन भित्र  <?php //echo TYPE?> कार्यालयमा आइ सो को विवरण पेश गर्नुपर्ने छ ।<br>
         <?php //echo $this->mylibrary->convertedcit(3)?>) सम्पतीकर बुझाउदैमा <?php //echo TYPE?> घरको नक्सापास गर्नुपर्ने दायित्ववाट छुटकार हुनेछैन ।
      </div>
    </div> -->

    
      
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
