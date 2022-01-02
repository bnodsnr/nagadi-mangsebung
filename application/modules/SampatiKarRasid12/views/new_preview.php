<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
  <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/bootstrap-reset.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <style type="text/css">
    :root {
      --bleeding: 0.5cm;
      --margin: 1cm;
    }

    @page {
      size: A4;
      margin: 0;
    }
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Kalimati, Georgia, serif;
      margin: 10px auto;
      padding: 0;
      background: rgb(204, 204, 204);
      display: flex;
      flex-direction: column;
    }

    .page {
      display: inline-block;
      position: relative;
      /*height: 327mm;*/
      width: 310mm;
      font-size: 16pt;
      margin: 5em auto;
      padding: calc(var(--bleeding) + var(--margin));
      box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
      background: white;
    }

    @media screen {
      .page::after {
        position: absolute;
        content: '';
        top: 0;
        left: 0;
        width: calc(100% - var(--bleeding) * 2);
        height: calc(100% - var(--bleeding) * 2);
        margin: var(--bleeding);
        /*outline: thin dashed black;*/
        pointer-events: none;
        z-index: 9999;
      }
    }

    @media print {
      .page {
        margin: 0;
        overflow: hidden;
      }
    }


    .print_table {
      width: 100%;
      border: solid 1px;
      border-collapse: collapse;
      margin-top: 10px;
    }
    .print_table th{
      border-color: black;
      font-size: 16px;
      border: solid 1px;
      border-collapse: collapse;
      margin: 0;
      padding: 0;
      color:#000;
      background-color:#c2cdd8;
      text-align: center;
    }
    .print_table td{
      border-color: black;
      font-size: 16px;
      border: solid 1px;
      border-collapse: collapse;
      margin: 0;
      padding: 10px;
      text-align: center;
      width: auto;
    }
    .print_table tr:nth-child(odd){
      background-color:#fff;
    }
    .print_table tr:nth-child(even){
      background-color:#ffffff;
    }
    .print_table table tfoot {
      background-color:#c2cdd8;
    }
  </style>

</head>

<body style="--bleeding: 0.5cm;--margin: 1cm;">
  <div class="page">
    <!-- Your content here -->
    <div style="margin-left: 794px;" class="hideme">
      <a href="<?php echo base_url()?>" class ="btn btn-success btn-sm"><i class="fa fa-home"></i> गृह पृष्ठमा जानुहोस् </a>
      <button class="btn btn-info btn-sm " style="color:#FFF;" id="basic"><i class="fa fa-print"></i> प्रिन्ट गर्नुहोस </button>
    </div>
    <img src="<?php echo base_url()?>assets/img/nepal-govt.png" style="height: 100px; width: 130px;">
    <div style="font-size:14px; margin-left:5px;">आ ब: <?php echo $this->mylibrary->convertedcit(get_current_fiscal_year()) ?></div>

    <div style="font-size: 28px;margin-left: 484px;margin-top: -135px;"><b><?php echo GNAME?></b></div>
    <div style="margin-left: 500px;margin-top: 0;font-size: 14px;"><b><?php  if($this->session->userdata('PRJ_USER_ID') == 1){echo SLOGAN;} else{echo $this->mylibrary->convertedcit($this->session->userdata('PRJ_USER_WARD').' नं. वडा कार्यलय');}?></b></div>
    <div style="margin-left: 524px;margin-top:0;font-size: 14px;"><b>

      <?php if($this->session->userdata('PRJ_USER_ID') == 1 ) {
        echo ADDRESS;
      } else {
        echo $user['users_address'];
      } ?>
        <?php echo ','.DISTRICT?>
        

      </b></div>
    <div style="margin-left: 486px;margin-top: 12px;font-size: 24px;"><b>सम्पतीकर/भूमिकर रसिद</b></div>
    <hr style="margin-top: 5px;">
    <div style="margin-left: 825px;font-size: 18px;">
      क. संकेत नं. - <?php echo !empty($kar_details['bill_no'])?$this->mylibrary->convertedcit($kar_details['bill_no']) :''; ?>
    </div>
    <div style="margin-right: 90px; font-size: 18px;">
     संकेत नं. - <b><?php echo $this->mylibrary->convertedcit($land_owner_details['file_no'])?></b>
   </div>
   <div style="margin-right: 90px;width: 440px; font-size: 18px; ">
    करदाताको नाम. - <?php echo $land_owner_details['land_owner_name_np']?>
  </div>
  <div style="margin-top: 0; font-size: 18px; ">करदाताको ठेगाना. -  <?php echo $land_owner_details['lo_tol'].', '.$gapa['name'].'-'.$this->mylibrary->convertedcit($land_owner_details['lo_ward']);?></div>
  <div style="margin-top: 0; font-size: 18px;margin-left: 122px;"><?php echo $district['name'].', '.$state['Title'];?></div>
   <div style="margin-left: 825px; margin-top:-93px;font-size: 18px;">
   मितिः- <?php echo $this->mylibrary->convertedcit($kar_details['billing_date'])?>
 </div>
  <div style="margin-left: 720px; margin-top:5px;font-size: 18px;">  राजस्व संकेत नं.-<?php echo $this->mylibrary->convertedcit('११३१३/११३१४')?>  </div>
 
 <br>
 <table class="print_table">
  <thead>
    <tr>
      <th rowspan="2">क्र.सं</th>
      <th colspan="6" class="text-center">जग्गाको विवरण</th>
      <th colspan="2" style="width:180px;">भौतिक संरचनाको विवरण</th>
    </tr>
    <tr>
      <!-- land details -->
      <th style="width:180px;">साबिक गा.पा/न.पा</th>
      <th style="width:180px;">हालको वडा</th>
      <th style="width:180px;">सडकको नाम</th>
      <th style="width:180px;">नक्सा नं</th>
      <th style="width:180px;">कित्ता नं</th>
      <th style="width:180px;">क्षेत्रफल</th>
      <!-- end of land details -->
      <!-- sanrachana details -->
      <th style="width:180px;">बनावटको किसिम</th>
      <th style="width:180px;">क्षेत्रफल</th>
      <!--  <th style="width:180px;">सम्पतिकर मूल्यांकन </th> -->
     
      <!-- end of sanrachana details -->
      <!-- bhumi kar -->

     
      <!-- ends section -->
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
    ?>

    <tr>
      <!-- jagga ko biwaran -->
      <td><?php echo $this->mylibrary->convertedcit($i++)?></td>
      <td><?php echo $value['old_gapa_napa'].'-'.$this->mylibrary->convertedcit($value['old_ward'])?></td>
      <td><?php echo $value['present_gapa_napa'].'-'.$this->mylibrary->convertedcit($value['present_ward'])?></td>
      <td><?php echo $value['rm']?></td>
      <td><?php echo $this->mylibrary->convertedcit($value['nn_number'])?></td>
      <td><?php echo $this->mylibrary->convertedcit($value['k_number'])?></td>
      <td>
        <?php
        echo $this->mylibrary->convertedcit($value['a_ropani']).'-'.$this->mylibrary->convertedcit($value['a_ana']).'-'.$this->mylibrary->convertedcit($value['a_paisa'])?><br>(बि.क.धु)
      </td>
            <!-- ----------------------------------------------------------------------
              ------------------------------------------------------------------------- -->
              <?php if(!empty($value['sanrachana_id'])) { ?>
              <td><?php echo $value['structure_type']?></td>
              <td>

                <?php 
                $sanrachanako_sqft = $value['sanrachana_ground_housing_area_sqft']/3645;
                ?>
                <?php echo $this->mylibrary->convertedcit(round($sanrachanako_sqft,2));?>(कठ्ठा)
              </td>
            
              <?php } else { ?>
              <td colspan="3"><div class="alert alert-danger">संरचना छैन </div></td>
              <?php } ?>

             

        </tr>
        <?php } } ?>
      </tbody>
    </table>

    <div style="width: 100%;margin-left: 790px; margin-top: 11px;">
      <table class="">
        <tr>
          <td style="font-size: 18px"><b>सम्पतीकर रु:</b>

          </td><td align="right"> 

            <?php 

              if(!empty($kar_details['sampati_kar'])) {
                $num = explode(".",$kar_details['sampati_kar']);
                if(!empty($num[1]))
                { 
                  $decimal = substr($num[1], 0, 2);
                } else {
                  $decimal = '00';
                }
                $sampati_kar_amount = $num[0].'.'.$decimal;
              }
              echo !empty($sampati_kar_amount) ? $this->mylibrary->convertedcit($sampati_kar_amount):'0.00'?>
              
            </td>
        </tr>
        <tr>
          <td style="font-size: 18px"><b>भूमिकर:</b> </td><td align="right">


            <?php 

              if(!empty($kar_details['bhumi_kar'])) {
                $num = explode(".",$kar_details['bhumi_kar']);
                if(!empty($num[1]))
                { 
                  $decimal = substr($num[1], 0, 2);
                } else {
                  $decimal = '00';
                }
                $bhumi_kar_amount = $num[0].'.'.$decimal;
              }
              
              echo !empty($bhumi_kar_amount)?$this->mylibrary->convertedcit($bhumi_kar_amount):'0.00'?>
              

          </td>
        </tr> 
        <tr>
          <td align="right" style="font-size: 18px"><b>अन्य सेवा शुल्क रु:</b></td><td align="right"> <?php echo !empty($kar_details['other_amount'])?$this->mylibrary->convertedcit(number_format($kar_details['other_amount'])):'0.00'?></td>
        </tr>
        <tr>
          <td style="font-size: 18px"><b>छुट रकम रु:</b></td><td align="right"> <?php echo !empty($kar_details['discount_amount'])?$this->mylibrary->convertedcit(number_format($kar_details['discount_amount'])):'0.00'?></td>
        </tr>
        <tr>
          <td style="font-size: 18px"><b>जरिवाना रकम रु:</b></td><td align="right"> <?php echo !empty($kar_details['fine_amount'])?$this->mylibrary->convertedcit($kar_details['fine_amount']):'0.00'?></td>
        </tr>
        <tr>
          <td style="font-size: 18px"><b>बक्यौता रकम रु:</b></td><td align="right"> <?php 


          echo !empty($kar_details['bakeyuta_amount'])?$this->mylibrary->convertedcit(number_format($kar_details['bakeyuta_amount'])):'0.00'

          ?></td>
        </tr>
        <tr>
          <td style="border-top: 2px solid #000"><b>कुल जम्मा रु:</b></td>

          <td align="right" style="border-top: 2px solid #000">

            <?php 

             if(!empty($kar_details['net_total_amount'])) {
                $num = explode(".",$kar_details['net_total_amount']);
                if(!empty($num[1]))
                { 
                  $decimal = substr($num[1], 0, 2);
                } 
                $net_total = $num[0].'.'.$decimal;
              }

            echo !empty($net_total)?$this->mylibrary->convertedcit($net_total):'0.00'

            ?>

          </td>

        </tr>
       
      </table>
      <?php if(!empty($kar_details['remarks'])){ ?>
        <p style="font-size: 12px;"><?php echo !empty($kar_details['remarks'])? $kar_details['remarks']:'';?></p>
      <?php } ?>
    </div>
    <div style="width: 570px;margin-left: 30px; margin-top: -164px;font-size: 14px;">
      <ul class="">
        <li>समयमा बुझाउनु पर्ने कर नबुझाएमा जरिवाना लाग्ने छ ।</li>
        <li>सम्पतीकर थपघट भएमा थपघट भएको ३५ दिन भित्र  <?php echo TYPE?> कार्यालयमा आइ सो को विवरण पेश गर्नुपर्ने छ।</li>
        <li>सम्पतीकर बुझाउदैमा <?php echo TYPE?> घरको नक्सापास गर्नुपर्ने दायित्ववाट छुटकार हुनेछैन ।</li>
      </ul>
    </div>
    <div style="margin-top: 87px;margin-left: 315px; font-size: 18px;"><b>अक्षेरुपी <?php echo $this->convertlib->convert($net_total,"मात्र |");?> मात्र |</b></div>
    <div style="margin-top:50px;margin-left: 30px;">
      ------------------------<br>
      बुझाउनेकाे सही:
    </div>

    <div style="margin-left: 843px;margin-top: -54px; ">
      ------------------------<br>
      बुझिलिनेकाे सही<br>
      (<?php
      $user = $this->CommonModel->getCurrentUser($kar_details['added_by']);
      echo $user['name'];
      ?>)
    </div>
    <div style="margin-left: 268px;
    margin-top: 219px; font-size: 12px;"><b><u>कृपयाः अर्को पटक कर तिर्न आउँदा यो रसिद साथमा लिएर आउनुहोला ।
    </div><!--end of page-->

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
