 <style>

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



    /*font-family: Kalimati, Georgia, serif;*/



     /* margin: 0 auto;



      padding: 0;



      background: rgb(204, 204, 204);



      display: flex;



      flex-direction: column;*/



    }







    .page {



      display: inline-block;



      position: relative;



      /*height: 327mm;*/



      width: auto;

      font-size: 12pt;

      margin-left: -16px;



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



      font-size: 18px;



      border: solid 1px;



      border-collapse: collapse;



      margin: 0;



      padding: 0;



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

  <!--main content start-->

  <section id="main-content">

    <section class="wrapper site-min-height">

      <nav aria-label="breadcrumb">

        <ol class="breadcrumb">

          <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> गृहपृष्ठ</a>

          </li>

          <li class="breadcrumb-item"><a href="javascript:;">व्यक्तिगत अभिलेख</a></li>

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

            <div class="card-header">

             <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">

               <?php 

               $sampati_mulyankan_amount = 0;

               if(!empty($bill_details)): 

                 foreach($bill_details as $key => $bill_value) :?>

                   <li class="nav-item">

                    <a class="nav-link show <?php if($key == 0){echo 'active';}?> btn btn-warning" id="home-tab" href="<?php echo base_url()?>SampatiKarRasid/printPreview/<?php echo $bill_value['bill_no'];?>" target= "_blank">रसिद नं <?php echo $this->mylibrary->convertedcit($bill_value['bill_no'])?></a>

                  </li>

                <?php endforeach;endif?>

              </ul>

            </div>

            <?php 

            $sampati_mulyankan_amount = 0;

            if(!empty($bill_details)): 

             foreach($bill_details as $key => $bill_value) :?>
              <?php 

                $billing_details_amount = $this->CommonModel->getDataBySelectedFields('sampati_kar_bhumi_kar_bill_details','bill_no',$bill_value['bill_no']);?>
              <div class="card-body">

                <div class="tab-content tasi-tab" id="myTabContent">

                  <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">



                   <div class="page">



                    <!-- Your content here -->



                    <div style="margin-left: 896px; " class="hideme">

                      <a href="<?php echo base_url()?>SampatiKarRasid/printPreview/<?php echo $bill_value['bill_no'];?>" class ="btn btn-info btn-sm"><i class="fa fa-print"></i> प्रिन्ट</a>

                    </div>



                    <img src="<?php echo base_url()?>assets/img/nepal-govt.png" style="height: 100px; width: 120px;">



                    <div style="font-size:14px; margin-left:5px;">आ ब: <?php echo $this->mylibrary->convertedcit(get_current_fiscal_year()) ?></div>







                    <div style="font-size: 28px;margin-left: 484px;margin-top: -65px;"><b><?php echo GNAME?></b></div>



                    <div style="margin-left: 500px;margin-top: 12px;font-size: 18px;"><b><?php  if($this->session->userdata('PRJ_USER_ID') == 1){echo SLOGAN;} else{echo $this->session->userdata('PRJ_USER_WARD').' नं. वडा कार्यलय';}?></b></div>



                    <div style="margin-left: 524px;margin-top:12px;font-size: 18px;"><b><?php echo ADDRESS.','.DISTRICT?></b></div>



                    <div style="margin-left: 474px;margin-top: 12px;font-size: 22px;"><b>सम्पतीकर/भूमिकर रसिद</b></div>



                    <hr style="margin-top: 5px;">



                    <div style="margin-right: 90px;">



                      करदाताको संकेत नं. - <b><?php echo $this->mylibrary->convertedcit($land_owner_details['file_no'])?></b>



                    </div>



                    <div style="margin-right: 90px;">



                      करदाताको नाम. - <?php echo $land_owner_details['land_owner_name_np']?>



                    </div>



                    <div style="margin-top: 0; font-size: 18px;">करदाताको ठेगाना. -  <?php echo $land_owner_details['lo_tol'].', '.$gapa['name'].'-'.$this->mylibrary->convertedcit($land_owner_details['lo_ward']);?></div>



                    <div style="margin-top: 0; font-size: 18px;margin-left: 122px;"><?php echo $district['name'].', '.$state['Title'];?></div>



                    <div style="margin-left: 857px; margin-top: -76px;">



                      रसिद नं. - <?php echo !empty($bill_value['bill_no'])?$this->mylibrary->convertedcit($bill_value['bill_no']) :''; ?>



                    </div>





                    <div style="margin-left: 857px; margin-top: 5px;">  आन्तरीक संकेत नं.-<?php echo $this->mylibrary->convertedcit($billcount)?>  </div>



                    <div style="margin-left: 857px; margin-top:0px;">



                     मितिः- <?php echo $this->mylibrary->convertedcit($billing_details_amount['billing_date'])?>



                   </div>

                   <div style="margin-left: 817px; "> पछिल्लो पटक तिरेको रसिद नं.- </div>

                   <br>



                  <table class="print_table table">
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
                      <?php $Billsdetails  = $this->SampatiKarRasidModel->getPrintPreview($bill_value['bill_no'], $bill_value['nb_file_no']);?>
                     <?php
                     if(!empty($Billsdetails)) {
                       $i=1;
                       $bhumi_kar_mulyankan_rakam = 0;
                       $total_ropani = 0;
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
    <!-- <tfoot>



      <tr>



        <td colspan="10" class="text-right">जम्मा सम्पती मूल्यांकन </td>



        <td colspan="" class="text-left"><?php echo $this->mylibrary->convertedcit($sampati_mulyankan_amount)?></td>



        <td colspan="">जम्मा भूमिकर मूल्यांकन</td>



        <td colspan="">



          <?php //echo !empty($bhumi_kar_mulyankan_rakam)?$this->mylibrary->convertedcit($bhumi_kar_mulyankan_rakam):0; ?>



        </td>



      </tr>



    </tfoot> -->

    <tfoot>
                              <tr>
                                <td colspan="9">जम्मा भूमिकर मूल्यांकन</td>
                                <td colspan="">
                                <?php echo !empty($bhumi_kar_mulyankan_rakam)?$this->mylibrary->convertedcit($bhumi_kar_mulyankan_rakam):0; ?>
                                </td>

                              </tr>
                    </tfoot>



  </tbody>



</table>







<div style="width: 100%;margin-left: 795px; margin-top: 11px;">



  <table style="border: 1px solid #000;">



    <tr style="border: 1px solid #000;">



      <td ><b>सम्पतीकर रु:</b></td><td align="right"> <?php echo !empty($billing_details_amount['sampati_kar'])?$this->mylibrary->convertedcit(number_format($billing_details_amount['sampati_kar'])).'/-':$this->mylibrary->convertedcit(0).'/-'?></td>



    </tr>



    <tr style="border: 1px solid #000;">



      <td><b>भूमिकर:</b> </td><td align="right"><?php echo !empty($billing_details_amount['bhumi_kar'])?$this->mylibrary->convertedcit(number_format($billing_details_amount['bhumi_kar'])).'/-':$this->mylibrary->convertedcit(0).'/-'?></td>



    </tr> 



    <tr style="border: 1px solid #000;">



      <td align="right"><b>अन्य सेवा शुल्क रु:</b></td><td align="right"> <?php echo !empty($billing_details_amount['other_amount'])?$this->mylibrary->convertedcit(number_format($billing_details_amount['other_amount'])).'/-':$this->mylibrary->convertedcit(0).'/-'?></td>



    </tr>



    <tr style="border: 1px solid #000;">



      <td><b>छुट रकम रु:</b></td><td align="right"> <?php echo !empty($billing_details_amount['discount_amount'])?$this->mylibrary->convertedcit(number_format($billing_details_amount['discount_amount'])).'/-':$this->mylibrary->convertedcit(0).'/-'?></td>



    </tr>



    <tr style="border: 1px solid #000;">



      <td><b>जरिवाना रकम रु:</b></td><td align="right"> <?php echo !empty($billing_details_amount['fine_amount'])?$this->mylibrary->convertedcit(number_format($billing_details_amount['fine_amount'])).'/-':$this->mylibrary->convertedcit(0).'/-'?></td>



    </tr>



    <tr style="border: 1px solid #000;">



      <td><b>बक्यौता रकम रु:</b></td><td align="right"> <?php echo !empty($billing_details_amount['bakeyuta_amount'])?$this->mylibrary->convertedcit(number_format($billing_details_amount['bakeyuta_amount'])).'/-':$this->mylibrary->convertedcit(0).'/-'?></td>



    </tr>



    <tr style="border: 1px solid #000;">



      <td style="border-top: 2px solid #000"><b>कुल जम्मा रु:</b></td><td align="right" style="border-top: 2px solid #000"> <?php echo !empty($billing_details_amount['net_total_amount'])?$this->mylibrary->convertedcit(number_format($billing_details_amount['net_total_amount'])).'/-':$this->mylibrary->convertedcit(0).'/-'?>







    </td>







  </tr>



</table>







</div>



<div style="width: 570px;margin-left: 30px; margin-top: -164px;">



  <ul class="">



    <li>समयमा बुझाउनु पर्ने कर नबुझाएमा जरिवाना लाग्ने छ ।</li>



    <li>सम्पतीकर थपघट भएमा थपघट भएको ३५ दिन भित्र  <?php echo TYPE?> कार्यालयमा आइ सो को विवरण पेश गर्नुपर्ने छ।</li>



    <li>सम्पतीकर बुझाउदैमा <?php echo TYPE?> घरको नक्सापास गर्नुपर्ने दायित्ववाट छुटकार हुनेछैन ।</li>



  </ul>



</div>



<div style="margin-top: 87px;margin-left: 315px;"><b>अक्षेरुपी <?php echo $this->convertlib->convert($kar_details['net_total_amount'],"मात्र |").' '.'रुपैया मात्र ';?></b></div>



<div style="margin-top:50px;margin-left: 30px;">



  ------------------------<br>



  बुझाउनेकाे सही:



</div>







<div style="margin-left: 843px;margin-top: -54px; ">



  ------------------------<br>



  बुझिलिनेकाे सही<br>



  (<?php

    $user = $this->CommonModel->getCurrentUser($kar_details['added_by']);

    //echo $user['name'].'<br>';

   if($user['ward'] =="0") {
      echo SLOGAN;
    } else {
      $user['ward'] .' नं. वडा कार्यलय';

}

    ?>)



  </div>



  <div style="    margin-left: 268px;



  margin-top: 239px;"><b><u>कृपयाः अर्को पटक कर तिर्न आउँदा यो रसिद साथमा लिएर आउनुहोला ।



  </div><!--end of page-->

</div>

</div> 

<?php endforeach;endif;?>     

</div>

</section>

</div>

</div>

<!-- page end-->

</section>

</section>