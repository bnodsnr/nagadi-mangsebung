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
 							<a href="<?php echo base_url()?>SampatiKarRasid/Bakauyta/<?php echo $land_owner_details['file_no']?>"
 								class="btn btn-danger">बक्यौता
 								थप्नुहोस्</a>
 						</div>
 						<hr>
 						<div class="row">

 							<div></div>
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
 								if(!empty($LandWithoutSanrachana)) {
 									foreach ($LandWithoutSanrachana as $key => $bhukar) {
 										$r_bhumi_kar += $bhukar['t_rate'];
 									}
 								}
 								$total_bhumi_kar = $bhumi_kar + $r_bhumi_kar;
 								$total_sampati_kar_rate = $this->SampatiKarRasidModel->getSampatiKarAmount($sampati_kar, $fiscal_year['year']);
 								$t_bhumi_kar_rate = $this->SampatiKarRasidModel->getBhumiKarAmount($total_bhumi_kar, $fiscal_year['year']);
 								$total_k_rakam = $total_sampati_kar_rate['sampati_kar'] + $t_bhumi_kar_rate['bhumi_kar'];
 							?>

 							<div class="col-md-12">
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
	 												required="required" value="<?php echo $bill?>" readonly>
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
 													value="<?php echo $total_bhumi_kar?>" required readonly>
 											</div>
 										</div>

 										<div class="col-md-6">
 											<div class="form-group">
 												<label>सम्पतिकर
 												</label>
 												<input type="text" class="form-control" placeholder=""
 													name="saranchana_ko_sampti_kar" 
 													value="<?php echo $total_sampati_kar_rate['sampati_kar']?>" readonly>
 											</div>
 										</div>
 										<div class="col-md-6">
 											<div class="form-group">
 												<label>भूमिकर.
 												</label>
 												<input type="text" name="total_land_area_kar_amount"
 													class="form-control" id=""
 													value="<?php echo $t_bhumi_kar_rate['bhumi_kar']?>"
 													readonly>
 											</div>
 										</div>
 										
 										<div class="col-md-4">
 											<div class="form-group">
 												<label>अन्य सेवा शुल्क रु.
 												</label>
 												<input type="text" name="other_amount" class="form-control other_amount"
 													id="other_amount" value="">
 											</div>
 										</div>
 										
 										<div class="col-md-4">
 											<div class="form-group">
 												<label>छुट रकम रु.
 												</label>
 												
 												<input type="text" name="discount_amount" class="form-control discount_amount"
 													id="discount_amount" value="">
 											</div>
 										</div>
 										
 										<div class="col-md-4">
 											<div class="form-group">
 											<?php
 										$khud_amount =  $total_sampati_kar_rate['sampati_kar'] + $t_bhumi_kar_rate['bhumi_kar'];
 											?>
 												<label>खुद रकम रु
 												</label>
 												<input type="text" name="khud_amount" class="form-control khud_amount"
 													id="khud_amount" value="<?php echo $khud_amount?>">
 											</div>
 										</div>

 										<div class="col-md-6">
 											<div class="form-group">
 												<label>बक्यौता रकम रु.<span style="color:red">*</span>
 												</label>
 												<?php $baamount = !empty($baamount->bhumi_kar) ? $baamount->bhumi_kar:0;?>
 												<input type="text" name="bakeyuta_amount" class="form-control"
 													id="bakeyuta_amount" value="<?php echo $baamount?>" readonly required>
 											</div>
 										</div>
 										<div class="col-md-6">
 											<div class="form-group">
 												<label>जरिवाना रकम रु.
 												</label>
 												<input type="text" name="fine_amount" class="form-control fine_amount"
 													id="fine_amount" value="">
 											</div>
 										</div>

 										<div class="col-md-12">
 											<hr>
 											<div class="form-group">
 												<label>कुल जम्मा रु.<span style="color:red">*</span>
 												</label>
 												
 												<?php if(!empty($baamount)) {
 													$ba = $baamount;
 												} else {
 													$ba = 0;
 												}
 												$total_kul_rakam = $total_k_rakam + $ba;
 												?>
 												<input type="text" name="net_total_amount"
 													class="form-control net_total" id="net_total"
 													value="<?php echo $total_kul_rakam ?>" readonly>
 											</div>
 										</div>

 										<div class="col-md-6">
 											<div class="form-group">
 												<label>लिईएको रकम रु.<span style="color:red">*</span>
 												</label>
 												<?php $total ;?>
 												<input type="text" name="recieved_amount" class="form-control"
 													id="nepaliDate23" value="" required>
 											</div>
 										</div>
 										<div class="col-md-6">
 											<div class="form-group">
 												<label>फिर्ता रकम रु.
 												</label>
 												<input type="text" name="retruned_amount" class="form-control"
 													id="retruned_amount" value="">
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
	 	var sampati_kar = "<?php echo $total_sampati_kar_rate['sampati_kar']?>";
		 var bhumi_kar = "<?php echo $t_bhumi_kar_rate['bhumi_kar']?>";
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
	 var sampati_kar = "<?php echo $total_sampati_kar_rate['sampati_kar']?>";
	 var bhumi_kar = "<?php echo $t_bhumi_kar_rate['bhumi_kar']?>";
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
	 var sampati_kar = "<?php echo $total_sampati_kar_rate['sampati_kar']?>";
	 var bhumi_kar = "<?php echo $t_bhumi_kar_rate['bhumi_kar']?>";
	 var khud_amount = parseFloat(other_amount) + parseFloat(sampati_kar) + parseFloat(bhumi_kar)-parseFloat(discount_amount);
	 var ba_amount = "<?php echo $ba;?>";
	 var net_total = parseFloat(ba_amount) + khud_amount + parseFloat(fine_amount);
	 $('#khud_amount').val(khud_amount);
	 $('.net_total').val(net_total );
	});
	
	

}); //end of dom

 </script>
