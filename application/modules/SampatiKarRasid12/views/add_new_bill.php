 <!--main content start-->
 <section id="main-content">
 	<section class="wrapper site-min-height">
 		<nav aria-label="breadcrumb">
 			<ol class="breadcrumb">
 				<li class="breadcrumb-item"><a href="<?php echo base_url()?>Setting"><i class="fa fa-home"></i>
 						गृहपृष्ठ</a></li>
 			</ol>
 		</nav>
 		<!-- page start-->
 		<div class="row">
 			<div class="col-sm-12">
 				<div class="card card-primary">
 					<div class="card-body">
 						<div class="bio-graph-heading">
 							<h3>सम्पतिकर / भूमिकर नगदी रसिद</h3>
 							जग्गाको विवरण : नाम <?php echo $land_owner_details['land_owner_name_np']?>/ जग्गाधनिको
 							क्र.स
 							नम्बर : <?php echo $land_owner_details['file_no']?>
 							<a href="<?php echo base_url()?>SampatiKarRasid/BakauytaDetails/<?php echo $land_owner_details['file_no']?>"
 								class="btn btn-danger">बक्यौता
 								थप्नुहोस्</a>
 						</div>
 						<hr>
 						<div class="row">
 							<div class="col-md-4">
 								<aside class="left-side">
			                       <div class="user-head">
			                          <h3>सम्पतिकर/भूमि विवरण</h3>
							        </div>
			                       <ul class="chat-list">
			                       	<?php if(!empty($land_details)) : 
						 			foreach($land_details as $key => $ld) : ?>

						 			<?php 
                                        $sanrachana_details = $this->SampatiKarRasidModel->getBSanrachanaDetailsByKNo($ld['k_number'],$ld['fiscal_year']);
                                        //pp($sanrachana_details); 
                                      ?>
			                           <li>
			                              <a href="<?php echo base_url()?>SampatiKarRasid/viewLandDetailsByKNo/<?php echo $ld['k_number']?>" target="_blank">
			                                <i class="fa fa-eye"></i>
			                                <span><?php echo 'जग्गाको कित्ता नं.: '. $ld['k_number']?></span><br>
			                                <?php if(empty($sanrachana_details)) { ?>
			                                	<span>(<?php echo 'सम्पतिकर कर लाग्ने मुल्या.: '. 0?>)</span><br>
			                                	<span>(<?php echo 'भूमिकर लाग्ने मूल्य.: '. $ld['t_rate']?>)</span>
			                                <?php } else { ?>
			                                	<?php 
			                                		foreach($sanrachana_details as $key => $s): ?>
			                                	<span><b>(<?php echo 'सम्पतिकर कर लाग्ने मुल्या.: '. $s['net_tax_amount']?>)</span></b><br>
			                                	<span><b>(<?php echo 'भूमिकर लाग्ने मूल्य.: '. $s['r_bhumi_kar']?>)</b></span>
			                                	<?php endforeach;?>
			                                <?php } ?>
			                              </a>
			                           </li>
			                        <?php endforeach;endif;?>
			                      </ul>
				                 </aside>
 							</div>


 							<?php 
 									$sampati_kar = 0;
 									$bhumi_kar = 0;
 									$r_bhumi_kar = 0;
	 								if(!empty($SanrachanaDetails)) {
	 									foreach($SanrachanaDetails as $key =>$sd) {
	 										$sampati_kar += $sd['net_tax_amount'];
	 										$bhumi_kar += $sd['r_bhumi_kar'];
	 									}
	 								}

 									$bhumi_kar_with_building = $this->SampatiKarRasidModel->getBhumiKarAmount($bhumi_kar, $fiscal_year['year']);
	 								$f_bhukar=0;
	 								if(!empty($LandWithoutSanrachana)) {
	 									foreach ($LandWithoutSanrachana as $key => $bhukar) {
	 									$r_bhumi_kar +=$bhukar['t_rate'];
	 									$bhi_kar = $this->SampatiKarRasidModel->getBhumiKarAmount($bhukar['t_rate'], $fiscal_year['year']);
	 										$f_bhukar+= $bhi_kar['bhumi_kar'];
	 									}
	 								}
	 								$total_bhumi_kar = $bhumi_kar + $r_bhumi_kar;
	 								$total_sampati_kar_rate = $this->SampatiKarRasidModel->getSampatiKarAmount($sampati_kar, $fiscal_year['year']);

	 								$t_bhumi_kar_rate = $this->SampatiKarRasidModel->getBhumiKarAmount($total_bhumi_kar, $fiscal_year['year']);
	 								$total_k_rakam = $total_sampati_kar_rate['sampati_kar'] + $t_bhumi_kar_rate['bhumi_kar'];

	 								$bhu_kar_rate_without_building = $this->SampatiKarRasidModel->getBhumiKarAmount($r_bhumi_kar, $fiscal_year['year']);
	 								//print_r($f_bhukar );
	 								$final_bhumi_kar_amount = $bhumi_kar_with_building['bhumi_kar'] + $f_bhukar;
 							?>

 							<?php
 								$khud_amount =  $total_sampati_kar_rate['sampati_kar'] + $t_bhumi_kar_rate['bhumi_kar'];
 							?>
 							<?php $baamount = !empty($baamount->bhumi_kar) ? $baamount->bhumi_kar:0;?>

 							<?php if(!empty($baamount)) {
 													$ba = $baamount;
 												} else {
 													$ba = 0;
 												}
 												$total_kul_rakam = $total_k_rakam + $ba;
 												?>

 							<div class="col-md-8">

 								<?php 
 									$bill_no_a = !empty($sampati_kar_details['bill_no']) ? $sampati_kar_details['bill_no']:$bill;
 									$saranchana_ko_kar_amount = !empty($sampati_kar_details['saranchana_ko_kar_amount']) ? $sampati_kar_details['saranchana_ko_kar_amount']:$sampati_kar;
 									$saranchana_ko_sampti_kar = !empty($sampati_kar_details['saranchana_ko_sampti_kar']) ? $sampati_kar_details['saranchana_ko_sampti_kar']:$sampati_kar;
 									//$saranchana_ko_charckeko_kar_amount = !empty($sampati_kar_details['saranchana_ko_charckeko_kar_amount']) ? $sampati_kar_details['saranchana_ko_charckeko_kar_amount']:'';
 									//$saranchana_ko_charcheko_bhumi_kar = !empty($sampati_kar_details['saranchana_ko_charcheko_bhumi_kar']) ? $sampati_kar_details['saranchana_ko_charcheko_bhumi_kar']:'';

 									$total_land_area_kar_amount = !empty($sampati_kar_details['total_land_area_kar_amount']) ? $sampati_kar_details['total_land_area_kar_amount']:'';
 									$other_amount = !empty($sampati_kar_details['other_amount']) ? $sampati_kar_details['other_amount']:'';
 									$discount_amount_a = !empty($sampati_kar_details['discount_amount']) ? $sampati_kar_details['discount_amount']:'';
 									$khud_amount_a = !empty($sampati_kar_details['khud_amount']) ? $sampati_kar_details['khud_amount']:$khud_amount;
 									$bakeyuta_amount_a = !empty($sampati_kar_details['bakeyuta_amount']) ? $sampati_kar_details['bakeyuta_amount']:$baamount;
 									$fine_amount = !empty($sampati_kar_details['fine_amount']) ? $sampati_kar_details['fine_amount']:'';
 									$recieved_amount = !empty($sampati_kar_details['recieved_amount']) ? $sampati_kar_details['recieved_amount']:'';

 									$retruned_amount = !empty($sampati_kar_details['retruned_amount']) ? $sampati_kar_details['retruned_amount']:'';

 									$net_total_amount = !empty($sampati_kar_details['net_total_amount']) ? $sampati_kar_details['net_total_amount']:$total_kul_rakam;

 								 ?>
 								 <?php if(!empty($land_details)) 
 								 		foreach($land_details as $land) {
 								 			$land_area_type = $land['land_area_type'];
 								 			$land_category = $land['']
 								 		}
 								 ?>
 								<form method="post"
 									action="<?php echo base_url()?>SampatiKarRasid/saveSampatiKarBhumiKarBillDetails">
 									<input type="hidden" name="nb_file_no"
 										value="<?php echo $land_owner_details['file_no']?>">
 									<div class="row">
 										<div class="col-md-12">
	 										<div class="form-group">
	 											<label>रसिद नम्बर <span style="color:red">*</span>
	 											</label>
	 											<input type="text" class="form-control" placeholder="" name="bill_no"
	 												required="required" value="<?php echo $bill_no_a?>" readonly>
	 										</div>
 										</div>

 										<div class="col-md-6">
 											<div class="form-group">
 												<label>जम्म सम्पतिकर कर लाग्ने मुल्या<span style="color:red">*</span>
 												</label>
 												<input type="text" class="form-control" placeholder=""
 													name="saranchana_ko_kar_amount" required="required"
 													value="<?php echo $sampati_kar?>" readonly>
 											</div>
 										</div>

 										<div class="col-md-6">
 											<div class="form-group">
 												<label>जम्मा भूमिकर लाग्ने मूल्य<span style="color:red">*</span>
 												</label>
 												<input type="text" name="total_land_area_kar_amount"
 													class="form-control" id="nepaliDate23"
 													value="<?php echo !empty($total_bhumi_kar)?$total_bhumi_kar:0?>" required readonly>
 											</div>
 										</div>

 										<div class="col-md-6">
 											<div class="form-group">
 												<label>सम्पतिकर
 												</label>
 												<?php $total_sampati_kar = $this->SampatiKarRasidModel->getSampatiKarRateDetails($sampati_kar) ?>
 												<input type="text" class="form-control" placeholder=""
 													name="saranchana_ko_sampti_kar" 
 													value="<?php echo !empty($total_sampati_kar_rate['amount'])?$total_sampati_kar_rate['amount']:0?>" readonly>
 											</div>
 										</div>
 										<div class="col-md-6">
 											<div class="form-group">
 												<label>भूमिकर.
 												</label>
 												<?php 

 												?>
 												<input type="text" name="total_land_area_kar_amount"
 													class="form-control" id=""
 													value="<?php echo $final_bhumi_kar_amount ?>"
 													readonly>
 											</div>
 										</div>
 										
 										<div class="col-md-4">
 											<div class="form-group">
 												<label>अन्य सेवा शुल्क रु.
 												</label>
 												<input type="text" name="other_amount" class="form-control other_amount"
 													id="other_amount" value="<?php echo $other_amount?>">
 											</div>
 										</div>
 										
 										<div class="col-md-4">
 											<div class="form-group">
 												<label>छुट रकम रु.
 												</label>
 												
 												<input type="text" name="discount_amount" class="form-control discount_amount"
 													id="discount_amount" value="<?php echo $discount_amount_a?>">
 											</div>
 										</div>
 										
 										<div class="col-md-4">
 											<div class="form-group">
 											
 												<label>खुद रकम रु
 												</label>
 												<input type="text" name="khud_amount" class="form-control khud_amount"
 													id="khud_amount" value="<?php echo $khud_amount_a?>">
 											</div>
 										</div>

 										<div class="col-md-6">
 											<div class="form-group">
 												<label>बक्यौता रकम रु.<span style="color:red">*</span>
 												</label>
 												
 												<input type="text" name="bakeyuta_amount" class="form-control"
 													id="bakeyuta_amount" value="<?php echo $bakeyuta_amount_a?>" readonly required>
 											</div>
 										</div>
 										<div class="col-md-6">
 											<div class="form-group">
 												<label>जरिवाना रकम रु.
 												</label>
 												<input type="text" name="fine_amount" class="form-control fine_amount"
 													id="fine_amount" value="<?php echo $fine_amount?>">
 											</div>
 										</div>

 										<div class="col-md-12">
 											<hr>
 											<div class="form-group">
 												<label>कुल जम्मा रु.<span style="color:red">*</span>
 												</label>
 												
 												
 												<input type="text" name="net_total_amount"
 													class="form-control net_total" id="net_total"
 													value="<?php echo $net_total_amount ?>" readonly>
 											</div>
 										</div>

 										<div class="col-md-6">
 											<div class="form-group">
 												<label>लिईएको रकम रु.<span style="color:red">*</span>
 												</label>
 												<input type="text" name="recieved_amount" class="form-control"
 													id="nepaliDate23" value="<?php echo $recieved_amount?>" required>
 											</div>
 										</div>

 										<div class="col-md-6">
 											<div class="form-group">
 												<label>फिर्ता रकम रु.
 												</label>
 												<input type="text" name="retruned_amount" class="form-control"
 													id="retruned_amount" value="<?php echo $retruned_amount?>">
 											</div>
 										</div>
 										

 										<div class="col-md-12 text-center">
 											<hr>
 											<button class="btn btn-primary btn-xs save_button" data-toggle="tooltip"
 												title=" सेभ  गर्नुहोस्" name="Submit" type="submit" value="Save"> सेभ
 												गर्नुहोस्</button>
 											<a href="<?php echo base_url()?>Profile" class="btn btn-danger btn-xs"
 												data-toggle="tooltip" title="सम्पादन गर्नुहोस्">रद्द गर्नुहोस्</a>
 										</div>
 									</div>
 								</form>
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
	$('.dd_select').select2();
	$('.nepaliDate5').nepaliDatePicker();
	$('#date_1').nepaliDatePicker();
	$(document).on('input', '.fine_amount', function() {
		obj = $(this);
		var fine_amount = obj.val();
		if(fine_amount ==""){
		fine_amount = 0;
		}		
		var discount_amount = $('#discount_amount').val();
	 	if(discount_amount == '' ) {
	 		discount_amount  = 0;
	 	}
	 	var other_amount= $('#other_amount').val();
	 	if(other_amount== '' ) {
	 		other_amount= 0;
	 	}
	 	var sampati_kar = "<?php echo !empty($total_sampati_kar_rate['sampati_kar'])?$total_sampati_kar_rate['sampati_kar']:0?>";
		var bhumi_kar = "<?php echo !empty($t_bhumi_kar_rate['bhumi_kar'])?$t_bhumi_kar_rate['bhumi_kar']:0?>";
	   	var khud_amount = parseFloat(other_amount) + parseFloat(sampati_kar) + parseFloat(bhumi_kar)-parseFloat(discount_amount);
	 	var ba_amount = "<?php echo $ba;?>";
	 	var net_total = parseFloat(ba_amount) + khud_amount + parseFloat(fine_amount);
	 	$('#khud_amount').val(khud_amount);
	 	$('.net_total').val(net_total );
		//var total_p = "<?php echo $total_kul_rakam; ?>";
		//var total = $('#net_total').val();
		//var net_total = parseFloat(fine_amount) + parseFloat(total_p);
		//$('.net_total').val(net_total);
	});
	
	//$total_sampati_kar_rate['sampati_kar'] + $t_bhumi_kar_rate['bhumi_kar']
	
	$(document).on('input', '#other_amount', function(){
	 var other_amount = $(this).val();
	 if(other_amount == ""){
	 	other_amount = 0;
	 }
	 var discount_amount = $('#discount_amount').val();
	 if(discount_amount == '' ) {
	 	discount_amount  = 0;
	 }
	 var fine_amount = $('#fine_amount').val();
	 if(fine_amount==""){
	  fine_amount = 0;
	 }
	 // var sampati_kar = "<?php //echo $total_sampati_kar_rate['sampati_kar']?>";
	 // var bhumi_kar = "<?php //echo $t_bhumi_kar_rate['bhumi_kar']?>";
	 var sampati_kar = "<?php echo !empty($total_sampati_kar_rate['sampati_kar'])?$total_sampati_kar_rate['sampati_kar']:0?>";
	 var bhumi_kar = "<?php echo !empty($t_bhumi_kar_rate['bhumi_kar'])?$t_bhumi_kar_rate['bhumi_kar']:0?>";
	 var khud_amount = parseFloat(other_amount) + parseFloat(sampati_kar) + parseFloat(bhumi_kar)-parseFloat(discount_amount);
	 var ba_amount = "<?php echo $ba;?>";
	 var net_total = parseFloat(ba_amount) + khud_amount + parseFloat(fine_amount);
	 $('#khud_amount').val(khud_amount);
	 $('.net_total').val(net_total );
	});
	
	$(document).on('input', '#discount_amount', function(){
	 var discount_amount = $(this).val();
	 if(discount_amount == ""){
	 	discount_amount = 0;
	 }
	 var other_amount= $('#other_amount').val();
	 if(other_amount== '' ) {
	 	other_amount= 0;
	 }
	 var fine_amount = $('#fine_amount').val();
	 if(fine_amount==""){
	  fine_amount = 0;
	 }
	 var sampati_kar = "<?php echo !empty($total_sampati_kar_rate['sampati_kar'])?$total_sampati_kar_rate['sampati_kar']:0?>";
	 var bhumi_kar = "<?php echo !empty($t_bhumi_kar_rate['bhumi_kar'])?$t_bhumi_kar_rate['bhumi_kar']:0?>";
	 var khud_amount = parseFloat(other_amount) + parseFloat(sampati_kar) + parseFloat(bhumi_kar)-parseFloat(discount_amount);
	 var ba_amount = "<?php echo $ba;?>";
	 var net_total = parseFloat(ba_amount) + khud_amount + parseFloat(fine_amount);
	 $('#khud_amount').val(khud_amount);
	 $('.net_total').val(net_total );
	});
	
	

}); //end of dom

 </script>
