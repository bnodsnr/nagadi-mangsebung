 <style type="text/css">
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
 </style>
 <!--main content start-->
 <section id="main-content">
 	<section class="wrapper site-min-height">
 		<nav aria-label="breadcrumb">
 			<ol class="breadcrumb">
 				<li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i>
 				गृहपृष्ठ</a>
 			</li>
 			<li class="breadcrumb-item"><a href="<?php echo base_url()?>BusinessProfile">
 			उद्योगहरु अभिलेख</a></li>
 			<li class="breadcrumb-item"><a href="javascript:;">
 			बिल बनाउनुहोस् </a></li>
 		</ol>
 	</nav>
 	<!-- page start-->
 	<div class="row">
 		<div class="col-sm-12">
 			<div class="card card-primary">
 				<div class="card-body">
 					<div class="row">
 						<div class="col-lg-4 col-sm-4 ">
 							<!-- <h4>उद्योगहरु अभिलेख</h4> -->
 							<p class="alert alert-primary"><b>
 								क्र.स नम्बर: <?php echo $this->mylibrary->convertedcit($land_owner['file_no'])?>  <br>
 								संस्थाको नाम: <?php echo $land_owner['land_owner_name_np']?><br>
 							</b>
 						</p>
 					</div>
 					<div class="col-lg-4 col-sm-4">
 						<!-- <h4>उद्योगहरु अभिलेख</h4> -->
 						<p class="alert alert-primary"><b>
 							दर्ता न: <?php echo $this->mylibrary->convertedcit($land_owner['lo_czn_no'])?>  <br>
 							पान न: <?php echo $this->mylibrary->convertedcit($land_owner['lo_pan_no'])?><br>
 						</b>
 					</p>
 				</div>
 				<div class="col-lg-4 col-sm-4">
 					<!-- <h4>उद्योगहरु अभिलेख</h4> -->
 					<p class="alert alert-primary"><b>
 						जग्गा रहेको वडा नं: <?php echo $this->mylibrary->convertedcit($land_owner['lo_land_lac_ward'])?><br>
 						ठेगाना: <?php echo $land_owner['name'].'-'.$this->mylibrary->convertedcit($land_owner['lo_ward']).' '.$land_owner['district'];?>  <br>
 					</b>
 				</p>
 			</div>
 		</div>

 		<div class="row">
 			<div class="col-md-12">
 				<div class="card">

 					<div class="card-body">
 						<table class="  print_table table table-bordered  table-responsive">
 							<thead>
 								<tr>
 									<th rowspan="2">क्र.सं</th>
 									<th colspan="9" class="text-center">जग्गाको विवरण</th>
 									<th colspan="5" style="width:250px;">भौतिक संरचनाको विवरण</th>
 									<th colspan="2" style="width:250px;">भूमिकर मूल्यांकन</th>
 									<th colspan="2" style="width:250px;">करहरुकोदर रेट</th>
 									<th rowspan="2" style="width:250px;">सम्पतीकर</th>
 									<th rowspan="2" style="width:250px;">भूमिकर</th>
 								</tr>
 								<tr>
 									<th style="width:250px;">साबिक गा.पा/न.पा</th>
 									<th style="width:250px;">हालको वडा</th>
 									<th style="width:250px;">सडकको नाम</th>
 									<th style="width:250px;">जग्गाको क्षेत्रगत किसिम</th>
 									<th style="width:250px;">जग्गाको श्रेणी</th>
 									<th style="width:250px;">तोकिएको न्युनतम मुल्य(प्रति कठ्ठा )</th>
 									<th style="width:250px;">नक्सा नं</th>
 									<th style="width:250px;">कित्ता नं</th>
 									<th style="width:250px;">क्षेत्रफल((बिघा-कठ्ठा -धुर))</th>

 									<th style="width:250px;">बनावटको किसिम</th>
 									<th style="width:250px;">प्रयोग</th>
 									<th style="width:250px;">प्रकार </th>
 									<th style="width:250px;">क्षेत्रफल(व फु )</th>
 									<th style="width:250px;">सम्पतिकर मूल्यांकन </th>

 									<th>क्षेत्रफल(व फु )</th>
 									<th>जग्गाको कयम मुल्य </th>

 									<th>सम्पतीकर</th>
 									<th>भूमिकर (प्रति कठ्ठा )</th>

 								</tr>
 							</thead>
 							<tbody>
 								<?php 
 								if(!empty($Billsdetails)){
 									$i=1;
 									$sampatiKar =0;
 									$bhumiKar = 0;
 									$bhumiKar = 0;
 									$sampati_kar =0;
 									$total_sampati_eval = 0;
 									$sampati_dar_rate = 0;
 									$sam_kar_total_tax = 0;
 									foreach ($Billsdetails as $key => $value) { ?>
 										<tr>
 											<!-- jagga ko biwaran -->
 											<td><?php echo $this->mylibrary->convertedcit($i++)?></td>
 											<td><?php echo $value['old_gapa_napa'].'-'.$value['old_ward']?></td>
 											<td><?php echo $value['present_gapa_napa'].'-'.$value['present_ward']?></td>
 											<td><?php echo $value['rm']?></td>
 											<td><?php echo $value['land_area_type']?></td>
 											<td><?php echo $value['category']?></td>

 											<td><?php echo $this->mylibrary->convertedcit($value['k_land_rate'])?></td>
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
 												<td><?php echo $value['sanrachana_usages']?></td>
 												<td><?php echo $value['architect_type']?></td>
 												<td><?php echo $this->mylibrary->convertedcit($value['sanrachana_ground_housing_area_sqft'])?>
 												<?php 
 												$sanrachanako_sqft = $value['sanrachana_ground_housing_area_sqft']/3645;

 												?>
 												(कठ्ठा)
 											</td>
 											<td><?php echo $this->mylibrary->convertedcit($value['net_tax_amount'])?></td>
 										<?php } else { ?>
 											<td colspan="5"><div class="alert alert-danger">भौतिक संरचनाको विवरण बनेको छैन </div></td>
 										<?php } ?>
 										<td>
 											<?php if(!empty($value['sanrachana_id'])) { 
 												$bhumi_eval = $value['r_bhumi_area'];
 												$kaatha = $bhumi_eval/3645;
 											} else { 
 												$bhumi_eval = $value['total_square_feet'];
 												$kaatha = $bhumi_eval/3645;
 											} 
 											echo $this->mylibrary->convertedcit($bhumi_eval).'('.$this->mylibrary->convertedcit(round($kaatha,2)).'कठ्ठा)';
 											?>
 										</td>

 										<td>--</td>
 										<?php 
 										if(!empty($value['sanrachana_id'])) {
 											$sampati_kar = $this->SampatiKarRasidModel->getSampatiKarRateDetails($value['net_tax_amount']);
 										} 
 										$t_bhumi_kar_dar = $this->SampatiKarRasidModel->getBhumiKarRateDetails($value['present_ward'],$value['land_category'], $value['lat']);
 										?>
 										<td>
 											<?php 
 											if(!empty($value['sanrachana_id'])) {
 												$sampati_kar_dar = $sampati_kar['amount'];
 											} else {
 												$sampati_dar_rate = 0;
 											}
 											echo !empty($sampati_dar_rate)?$this->mylibrary->convertedcit($sampati_kar_dar):$this->mylibrary->convertedcit(0);
 											?>
 										</td>
 										<td>
 											<?php
 											$t_bhumi_kar_dar = $this->SampatiKarRasidModel->getBhumiKarRateDetails($value['present_ward'],$value['land_category'], $value['lat']);

 											echo $this->mylibrary->convertedcit($t_bhumi_kar_dar['rate']);
 											?>
 										</td>
 										<td>
 											<?php if(!empty($value['sanrachana_id'])) {
 												$sampati_kar = $this->SampatiKarRasidModel->getSampatiKarRateDetails($value['net_tax_amount']);
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
 											echo '--';
 											?>
 										</td>
 										<td>
 											<?php 

 											if(!empty($value['sanrachana_id'])) { 
 												$bhumi_kar = $kaatha * $t_bhumi_kar_dar['rate'];
 											} else { 
 												$bhumi_kar = $kaatha * $t_bhumi_kar_dar['rate'];
 											} 
 											echo $this->mylibrary->convertedcit(round($bhumi_kar));
 											?>
 										</td>
 										<?php   
 										$sampatiKar +=$sam_kar;
 										$bhumiKar +=$bhumi_kar;
 										?>
 										<?php if(!empty($value['sanrachana_id'])) {
 											$total_sampati_eval  += $value['net_tax_amount'];
 										} ?>
 									</tr>
 								<?php }
 							} ?>
 						</tbody>
 						<tfoot>
 							<tr>
 								<td colspan="14" class="text-right">जम्मा सम्पती मूल्यांकन </td>
 								<td colspan="5" class="text-left"><?php echo !empty($total_sampati_eval)?$this->mylibrary->convertedcit($total_sampati_eval):'';?></td>
 								<!--<td colspan="">सम्पतीकर</td>-->
 								<td colspan="">
 									<?php 
 									if(!empty($total_sampati_eval)) {
 										$sampati_kar_total = $this->SampatiKarRasidModel->getSampatiKarRateDetails($total_sampati_eval);
 										$total_kar_eval = $total_sampati_eval / 100000;
 										if($total_sampati_eval > 100000001) {
 											$sam_kar_total_tax = $total_kar_eval * 60;
 										} else {
 											$sam_kar_total_tax = $total_kar_eval * $sampati_kar_total['amount'];
 										}
 									} 
 									else {

 										$sam_kar_total_tax = 0;
 									}

 									echo $this->mylibrary->convertedcit(round($sam_kar_total_tax));

 									?>
 								</td>
 								<!-- 	<td><?php //echo $this->mylibrary->convertedcit(round($sampatiKar,2))?></td> -->
 								<td colspan=""><?php echo !empty($bhumiKar)?$this->mylibrary->convertedcit(round($bhumiKar)):'';?></td>
 							</tr>
 							
 						</tfoot>
 					</table>

 					<form action="<?php echo base_url()?>SampatiKarRasid/SaveBillDetails" method="post" class="save_post">
						<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
						<input type="hidden" name="nb_file_no" value="<?php echo $land_owner['file_no']?>">
						<input type="hidden" name="customer_id" value="<?php echo $land_owner['id']?>">
						<input type ="hidden" name="sampati_kar" value="<?php echo !empty($sam_kar_total_tax)?(round($sam_kar_total_tax)):0?>">
						<input type ="hidden" name="bhumi_kar" value="<?php echo !empty($bhumiKar)?(round($bhumiKar)):0?>">
						<div class="row">
							<div class="col-md-4">
								<label>रसिद नम्बर.<span style="color:red">*</span>
								</label>
								<input type="text" name="bill_no" value="<?php echo $bill?>" class="form-control" id="bill_no" readonly>
							</div>

							<div class="col-md-4">
								<label>जम्मा कर मूल्य </label>

								<?php 
								if(empty($sam_kar_total_tax)) {
									$sam_kar = $sam_kar_total_tax;
								} else {
									$sam_kar = 0;
								}
								$totalPayableKar = $sam_kar_total_tax + $bhumiKar;?>
								<input type="text" name="total_kar_amount" value="<?php echo round($totalPayableKar)?>" class="form-control" id="total_amount" readonly>
							</div>
							<div class="col-md-4">
								<label>अन्य सेवा शुल्क रु.</label>
								<input type="text" name="other_amount" value="0" class="form-control" id="other_amount">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>मालपोत बक्यौता रकम रु.</label>
								<input type="text" name="discount_amount" value="0" class="form-control" id="discount_amount">
							</div>

							<div class="col-md-4">
								<label>बक्यौता रकम रु.
								</label>
								<input type="text" name="bakeyuta_amount" value="0" class="form-control" id="bakeyuta_amount">
							</div>

							<div class="col-md-4">
								<label>जरिवाना रकम रु.
								</label>
								<input type="text" name="fine_amount" value="0" class="form-control" id="fine_amount" readonly="readonly">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<label>कुल जम्मा रु.<span style="color:red">*</span>
								</label>
								<input type="text" name="net_total_amount" value="<?php echo round($totalPayableKar)?>" class="form-control net_total" id="total_sum" readonly>
							</div>

							<div class="col-md-4">
								<label>लिईएको रकम रु.<span style="color:red">*</span>
								</label>
								<input type="text" name="recieved_amount" value="0" class="form-control recieved_amount">
							</div>

							<div class="col-md-4">
								<label>फिर्ता रकम रु.
								</label>
								<input type="text" name="return_amount" value="0" class="form-control return_amount">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label class="form-label">कैफियत .</label>
								<textarea class="form-control" name="remarks"></textarea>
								<!-- <input type="text" name="return_amount" value="0" class="form-control return_amount"> -->
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<hr>
								<div class="text-center">
									<button class="btn btn-primary btn-xs save_btn" data-toggle="tooltip"
									title=" सेभ  गर्नुहोस्" name="Submit" type="submit" value="Save"> सेभ
								गर्नुहोस्</button>
								<a href="<?php echo base_url()?>BusinessProfile" class="btn btn-danger btn-xs"
									data-toggle="tooltip" title="सम्पादन गर्नुहोस्">रद्द गर्नुहोस्</a>
								</div>
							</div>
						</div>
					</form>
 				</div>
 			</div>
 		</div>
 	</div>
 </div>
</div>

</div>
</section>
</section>
<script type="text/javascript" src="<?php echo base_url()?>assets/assets/select2/js/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/nepali_datepicker/nepali.datepicker.v2.2.min.js">
</script>
<script type="text/javascript">
	$(document).ready(function() {

		$('.nepaliDate5').nepaliDatePicker();
		$('#date_1').nepaliDatePicker();
		$(document).on('input', '#fine_amount,#discount_amount,#other_amount', function() {
			obj = $(this);
		
		var net_total_amount = $('#total_amount').val();
	
		var fine_amount = $('#fine_amount').val();
		if(fine_amount ==""){
			fine_amount = 0;
		}		
		var discount_amount = $('#discount_amount').val();
		if(discount_amount == '' ) {
			discount_amount  = 0;
		}
		var other_bill= $('#other_amount').val();
		if(other_amount== '' ) {
			other_amount= 0;
		}
		// var bakeyuta_amount= $('#bakeyuta_amount').val();
		// if(bakeyuta_amount== '' ) {
		// 	bakeyuta_amount= 0;
		// }
		// alert(fine_amount);
		var net_total = parseFloat(net_total_amount) + parseFloat(other_bill) + parseFloat(fine_amount)+ parseFloat(discount_amount);
		$('.net_total').val(net_total );
	});


		$(document).on('input', '#bakeyuta_amount', function() {
			obj = $(this);
		
			var net_total_amount = $('#total_amount').val();
	
			// var fine_amount = $('#fine_amount').val();
			// if(fine_amount ==""){
			// 	fine_amount = 0;
			// }		
			var bakeyuta_amount = $('#bakeyuta_amount').val();
			if(bakeyuta_amount == '' ) {
				bakeyuta_amount  = 0;
				fine_amount = $('#fine_amount').val();
			} else {
				var fine_amount = bakeyuta_amount * 0.1;
				$('#fine_amount').val(fine_amount.toFixed(2));

			}
			var other_bill= $('#other_amount').val();
			if(other_amount== '' ) {
				other_amount= 0;
			}
			var discount_amount= $('#discount_amount').val();
			if(discount_amount== '' ) {
				discount_amount= 0;
			}
			
			var net_total = parseFloat(net_total_amount) + parseFloat(bakeyuta_amount) + parseFloat(other_bill) + parseFloat(fine_amount)+ parseFloat(discount_amount);
			$('.net_total').val(net_total );
		});

		$(document).on('input', '.recieved_amount', function() {
			var recieved_amount = $(this).val();
			var total_amount = $('.net_total').val();
			var return_amount = parseFloat(recieved_amount) - parseFloat(total_amount);
			$('.return_amount').val(return_amount);
		});
}); //end of dom
</script>