<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title><?php echo GAPA?></title>
		<style>
		body {
			font-family: freesans;
		}

		@media print {
			.pagebreak {
				page-break-before: always;
			}

			/* page-break-after works, as well */
		}

		#customers {
			/*font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;*/
			border-collapse: collapse;
			width: 100%;
		}

		#customers td,
		#customers th {
			border: 1px solid #000;
			padding: 8px;
		}

		/*#customers tr:nth-child(even){background-color: #f2f2f2;}*/

		/* #customers tr:hover {
			background-color: #000;
		} */

		#customers th {
			/*  padding-top: 12px;
          padding-bottom: 12px;*/
			text-align: left;
			/* background-color: #4CAF50;*/
			color: #000;
		}

		</style>
	</head>

	<body>
		<div id="container" style="margin:10px;">
			<div style="height: 100px;width: 100px; ">
				<img src="<?php echo base_url()?>assets/img/nepal-govt.png"
					style="height: 70px; width: 70px;">
			</div>
			<div style="height: 70px; width: 200px;margin-top: -90px;margin-left:270px;"><?php echo GAPA?></div>
			<div style="height: 70px; width: 200px;margin-top: -40px;margin-left:250px;">गाउँपालिका कार्य पलिकको कार्यालय</div>
			<div style="height: 70px; width: 200px;margin-top: -40px;margin-left:250px;">
				 <?php echo PROVIENCE?></div>

				<div style="height: 70px; width: 270px;margin-top: -40px;margin-left:250px;"><h3><u>सम्पतिकर / भूमिकर नगदी रसिद</u></h3></div>
			<br>
			<div>कम्पुटर संकेत नम्बर : <?php echo $this->mylibrary->convertedcit($bill_details[0]['bill_no']) ?></div>
			<div>करदाताको .स नबर: <?php echo $this->mylibrary->convertedcit($bill_details[0]['nb_file_no'])?></div>
			<div>अञ्चल : <?php echo ZONE?></div>
			<div>सडकको नाम : <?php echo $land_details[0]['rn']?> </div>


			<div style="height: 70px; width: 200px;margin-top: -90px;margin-left:270px;">जिल्ला : <?php echo DISTRICT?></div>
			<div style="height: 70px; width: 200px;margin-top: -40px;margin-left:270px;">वडा : <?php echo $this->mylibrary->convertedcit($land_owner_details['lo_ward'])?></div>

			<div style="height: 70px; width: 300px;margin-top: -100px;margin-left:450px;">पछील्लो पटक तिरेको क.संकेत नम्बर
				:
			</div>
			<div style="height: 70px; width: 200px;margin-top: -90px;margin-left:500px;">आ व :<?php echo $this->mylibrary->convertedcit($fy)?> </div>
			<div style="height: 70px; width: 200px;margin-top: -30px;margin-left:490px;">आन्तरिक संकेत नं: <?php echo $this->mylibrary->convertedcit($billcount)?></div>
			<div style="height: 70px; width: 200px;margin-top: -40px;margin-left:490px;">मिति: <?php echo $this->mylibrary->convertedcit($bill_details[0]['billing_date'])?></div>
			<div style="height: 70px; width: 200px;margin-top: -50px;margin-left:490px;">गापा/नापा : <?php echo GAPA?> </div>
			 <table class="" id="customers">
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
            $total_tax_amount_without_san = 0;
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
                      <td><?php echo $this->mylibrary->convertedcit(number_format($sam_kar))?></td>
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
                        $total_tax_amount_without_san  += $bhumi_kar_with_s;
                      ?>
                      <td><?php echo $this->mylibrary->convertedcit(number_format($bhumi_kar_with_s))?></td>
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
                      <?php $total_bhumi_kar_rate += $t_bhumi_kar_wl['rate']?>
                   <?php } ?>
                </tr>
          <?php endforeach;endif;?>
        </tbody>
         <tfoot>
          <tr>
            <td colspan="15" align="right">जम्मा कर रु</td>
            <td><?php 
               $total_kar = $toal_kar + $sam_kar + $total_bhumi_kar_rate;
               
            echo $this->mylibrary->convertedcit($total_kar);
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
              $khud_amount =  $total_kar+$kar_details['other_amount']-$kar_details['discount_amount'];
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
			<div style="margin-left:170px;">कृपयाः अर्को पटक कर तिर्न आउँदा यो रसिद साथमा लिएर आउनुहोला</div>
			<div style="margin-top: 35px;">
				------------------------<br>
				बुझाउनेकाे सही:
			</div>
			<div style="margin-top: -28px;margin-left:540px;">
				<div>
					<?php echo $user['name']?>
				</div>
				<div>
					------------------------
					बुझिलिनेकाे सही :
				</div>

			</div>
	</body>

</html>
