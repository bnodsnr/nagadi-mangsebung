<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo GNAME?></title>
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

      margin: 0 auto;

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

      font-size: 12pt;

      margin: 2em auto;

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

    @media all {



      .print_table {

        width: 100%;

        border: solid 1px;

        border-collapse: collapse;

      }

      .print_table th{

        border-color: black;

        font-size: 14px;

        border: solid 1px;

        /*border-collapse: collapse;
*/
        margin: 0;

        padding: 0;

       /* background-color:#407ac5;
*/
       /* color: #FFF;*/

      }

      .print_table td{

        border-color: white;

        font-size: 14px;

        border: solid 1px;

        border-collapse: collapse;

        margin: 0;

        padding: 0;

        text-align: left;

      }

      .print_table tr:nth-child(odd){

        background-color:#FFF;

      }

      .print_table tr:nth-child(even){

        background-color:#FFF;

        /*color: #FFF;*/

      }



    }

  </style>



</head>



<body style="--bleeding: 0.5cm;--margin: 1cm;">

  <div class="page">

    <!-- Your content here -->

    <div style="margin-left: 986px; " class="hideme">

      <button class="btn btn-default btn-sm " style="color:#FFF;" id="basic"><i class="fa fa-print"></i></button>

      <a href="<?php echo base_url()?>" class ="btn btn-success btn-sm"><i class="fa fa-home"></i></a>

    </div>

    <img src="<?php echo base_url()?>assets/img/nepal-govt.png" style="height: 120px; width: 140px;">

    <div style="font-size:10px; margin-left:5px;">??? ???: <?php echo $this->mylibrary->convertedcit(get_current_fiscal_year()) ?></div>
    <div style="font-size: 28px;margin-left: 484px;margin-top: -130px;"><b><?php echo GNAME?></b></div>
    <div style="margin-left: 500px;margin-top: 0;font-size: 14px;"><b><?php  if($this->session->userdata('PRJ_USER_ID') == 1){ echo SLOGAN; } else { echo $this->mylibrary->convertedcit($this->session->userdata('PRJ_USER_WARD')).' ??????. ????????? ?????????????????????';}?></b></div>
    <div style="margin-left: 524px;margin-top:0;font-size: 14px;"><b><?php echo ADDRESS.','.DISTRICT?></b></div>
   

    <div style="margin-left: 905px; margin-top:0px;">

       ???????????????- <?php 
        $date = !empty($current_month)?$current_month:get_current_month();
       echo  getNepaliMonthName($date)
      ?>
    </div>

          <div class="tab-content tasi-tab" id="myTabContent">

                    <div class=""><h2 class="text-center"><?php if($ward_no == 0){ echo '???????????????????????????' ;}  else { echo $this->mylibrary->convertedcit($ward_no).' ?????? ????????? ?????????????????????'; }?>  ??????????????? ???????????? ?????? ?????????????????? ?????????????????????

                    </h2>

                    </div>

                      <?php if(!empty($details)) { ?>

                        <table class="print_table table table-stripe table-bordered">

                          <thead>

                            <tr>

                              <th>??????.??????</th>

                              <th>????????????</th>

                              <th>???????????? ??????</th>

                              <th>???????????????????????? ?????????</th>

                              <th class="hidden-phone">??????????????? ??????????????????</th>

                              <th class="hidden-phone">?????? ??????????????????</th>

                              <th class="hidden-phone">??????????????????</th>

                              <th class="hidden-phone">?????????</th>

                              <th class="hidden-phone">??????????????????</th>
                              <th class="hidden-phone">???????????? ???????????????????????? ????????? </th>
                              <th>??????????????????</th>

                            </tr>

                          </thead>

                          <tbody>

                            <?php $i =1;

                            $total_amount_d = '';

                            if(!empty($details)) : 

                            foreach($details as $key => $detail) : ?>

                              <tr style="background-color:<?php if($detail['status'] == 2 ){echo 'red';}?>">

                                <td><?php echo $this->mylibrary->convertedcit($i++)?></td>

                                <td><?php echo $this->mylibrary->convertedcit($detail['added'])?></td>

                                <td><?php echo $this->mylibrary->convertedcit($detail['bill_no'])?></td>

                                <td><?php echo $detail['customer_name']?></td>

                                <td><?php echo $detail['topic_name']?></td>

                                <td><?php echo $detail['sub_topic']?></td>

                                <td><?php

                                  if($detail['topic'] == "others") {

                                      echo $detail['others_topic'];

                                  } else {

                                    echo $detail['topic_title'];

                                  } ?>

                                  </td>

                                <td><?php echo $this->mylibrary->convertedcit($detail['t_rates'])?></td>

                                <td><?php 

                                if($detail['status'] == 1) {

                                  echo '?????????';

                                } else {

                                  echo '?????????';

                                }

                                ?></td>
                                <td><?php echo $detail['name']?></td>
                                <td><?php echo $detail['reason']?></td>

                                <?php 
                                //if(!empty($detail['t_rates'])) {
                                  $total_amount_d += (float)$detail['t_rates'];
                                ?>
                              </tr>

                          <?php endforeach;endif;?>

                          </tbody>

                         

                        </table>

                         <table class="table-bordered table">

                            <tr>

                              <td colspan="8" style="text-align: right">??????????????? ????????? </td>

                              <td colspan="3"><?php echo !empty($total_amount_d)? $this->mylibrary->convertedcit($total_amount_d):$this->mylibrary->convertedcit(0)?></td>

                            </tr>

                            <tr>

                              <td colspan="8" style="text-align: right">????????? ???????????? ?????????????????? ??????????????? ?????????  </td>

                              <td colspan="3"><?php echo !empty($cancel_amount['cancel_bills'])? $this->mylibrary->convertedcit($cancel_amount['cancel_bills']):$this->mylibrary->convertedcit(0)?></td>

                            </tr>

                            <tr>

                              <td colspan="8" style="text-align: right">????????? ??????????????? : </td>

                              <td colspan="3">

                              <?php 

                                $net_total = $total_amount_d - $cancel_amount['cancel_bills'];

                                echo $this->mylibrary->convertedcit($net_total);

                              ?></td>

                            </tr>

                          </table>

                      <?php } else { ?>

                        <div class="alert alert-danger"> ???????????? ???????????? ????????????????????? ?????????</div>

                      <?php } ?>

                      <div class=""><h2 class="text-center">

                      <?php  

                        if($ward_no == '0'){

                          echo '???????????????????????????' ;

                        }  else {

                          echo $this->mylibrary->convertedcit($ward_no).' ?????? ????????? ?????????????????????';

                        }

                      ?>  ???????????????  ?????????????????? /???????????? ?????? ?????????????????? ?????????????????????

                    </h2></div> 

                      <?php if(!empty($sampati_bhumi_kar)) { ?>

                        <table class="print_table table table-stripe table-bordered">

                          <thead>

                            <tr>

                              <th>??????.??????</th>

                              <th>????????????</th>

                              <th>???????????? ??????</th>

                              <th>???????????????????????? ??????????????? ??????</th>

                              <th class="hidden-phone">?????????????????? ?????? ?????????</th>

                              <th class="hidden-phone">?????????????????? ??????</th>

                              <th class="hidden-phone">???????????? ??????</th>

                              <th class="hidden-phone">???????????? ???????????? ???????????????</th>

                              <th class="hidden-phone">????????????????????? ?????????</th>

                              <th class="hidden-phone">????????????????????? ?????????</th>

                              <th class="hidden-phone">????????? ?????????</th>

                              <th class="hidden-phone"> ???????????????  ?????????</th>
                              <th class="hidden-phone">??????????????????</th>
                              <th class="hidden-phone">???????????? ???????????????????????? ????????? </th>

                              <th>??????????????????</th>

                            </tr>

                          </thead>

                          <tbody>

                            <?php 

                            $i =1;

                            $sampati_total = 0;
                            $date_sum = 0;

                            if(!empty($sampati_bhumi_kar)) :

                              foreach ($sampati_bhumi_kar as $key => $sampatikar) : ?>

                                <tr style="background-color:<?php if($sampatikar['status'] == 2 ){echo 'red';}?>; color:<?php if($sampatikar['status'] == 2 ){echo '#FFF';}?>">

                                  <td><?php echo $this->mylibrary->convertedcit($i++)?></td>

                                  <td><?php echo $this->mylibrary->convertedcit($sampatikar['billing_date'])?></td>

                                  <td><?php echo $this->mylibrary->convertedcit($sampatikar['bill_no'])?></td>

                                  <td><?php echo $this->mylibrary->convertedcit($sampatikar['nb_file_no'])?></td>

                                  <td><?php echo $this->mylibrary->convertedcit($sampatikar['land_owner_name_np'])?></td>

                                  <td><?php echo $this->mylibrary->convertedcit($sampatikar['sampati_kar'])?></td>

                                  <td><?php echo $this->mylibrary->convertedcit($sampatikar['bhumi_kar'])?></td>

                                  <td><?php echo $this->mylibrary->convertedcit($sampatikar['other_amount'])?></td>

                                  <td><?php echo $this->mylibrary->convertedcit($sampatikar['fine_amount'])?></td>

                                  <td><?php echo $this->mylibrary->convertedcit($sampatikar['bakeyuta_amount'])?></td>

                                  <td><?php echo $this->mylibrary->convertedcit($sampatikar['discount_amount'])?></td>

                                  <td><?php echo $this->mylibrary->convertedcit(number_format($sampatikar['net_total_amount']))?></td>

                                 <td>

                                    <?php 

                                    if($sampatikar['status'] == 1) {

                                      echo '?????????';

                                    } else {

                                      echo '?????????';

                                    } ?>

                                  </td>
                                  <td><?php echo $sampatikar['name']?></td>
                                  <td><?php echo $sampatikar['reason']?></td>

                                   <?php $sampati_total += $sampatikar['net_total_amount']?>

                                </tr>

                            <?php endforeach;endif;?>

                          </tbody>

                         
                        </table>
                         <table class="table table-bordered">

                            <tr>

                              <td colspan="12" style="text-align: right">??????????????? ????????? </td>

                              <td colspan="3"><?php echo !empty($sampati_total)? $this->mylibrary->convertedcit($sampati_total):$this->mylibrary->convertedcit(0)?></td>

                            </tr>

                            <tr>

                              <td colspan="12" style="text-align: right">????????? ???????????? ?????????????????? ??????????????? ?????????  </td>

                              <td colspan="3"><?php echo !empty($sampati_cancel_amount['sampati_cancel_bills'])? $this->mylibrary->convertedcit($sampati_cancel_amount['sampati_cancel_bills']):$this->mylibrary->convertedcit(0)?></td>

                            </tr>

                            <tr>

                              <td colspan="12" style="text-align: right">????????? ??????????????? : </td>

                              <td colspan="3">

                              <?php 

                                $net_total = $sampati_total- $sampati_cancel_amount['sampati_cancel_bills'];

                                echo $this->mylibrary->convertedcit(number_format($net_total));

                              ?></td>

                            </tr>

                          </table>

                      <?php } else { ?>

                        <div class="alert alert-danger"> ?????????????????? /????????????  ???????????? ????????????????????? ?????????</div>

                      <?php } ?>

                  </div>


  </div><!--end of page-->
    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/jsprint/printThis.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $('#basic').on("click", function () {
            $('.hideme').hide();
            window.print();
       });
      });
    </script>
  </body>
</html>

