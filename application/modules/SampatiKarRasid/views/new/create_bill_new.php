

 <!--main content start-->

 <section id="main-content">

 	<section class="wrapper site-min-height">

 		<nav aria-label="breadcrumb">

 			<ol class="breadcrumb">

 				 <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i>

                            गृहपृष्ठ</a>

                    </li>

                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>BusinessProfile">

                           व्यक्तिगत अभिलेख</a></li>

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

		                          		<?php if(!empty($Billsdetails)) : ?> 

		                          		<table class="  print_table table table-bordered  table-responsive">

			                               <thead>

							                  <tr>

							                    <th rowspan="2">क्र.सं</th>

							                    <th colspan="8" class="text-center">जग्गाको विवरण</th>

							                   <!--  <th colspan="5" style="width:180px;">भौतिक संरचनाको विवरण</th> -->

							                    <th colspan="2" style="width:180px;">भूमिकर मूल्यांकन</th>

							                    <!-- <th colspan="2" style="width:180px;">करहरुकोदर रेट</th> -->

							                    <!-- <th rowspan="2" style="width:180px;">सम्पतीकर</th>

							                    <th rowspan="2" style="width:180px;">भूमिकर</th> -->

							                  </tr>

							                  <tr>

							                    <th style="width:180px;">साबिक गा.पा/न.पा</th>

							                    <th style="width:180px;">हालको वडा</th>

							                    <th style="width:180px;">सडकको नाम</th>

	                          					<th style="width:180px;">जग्गाको क्षेत्रगत किसिम</th>

	                          					<?php if(MODULE == 2){ ?>

	                          						<th style="width:180px;">जग्गाको श्रेणी</th>

	                          					<?php } ?>

	                          					<th style="width:180px;">तोकिएको न्युनतम मुल्य(प्रति <?php if(CALC == 1){echo 'रोपनी';} else { echo 'कठ्ठा';}?>)</th>

							                    <th style="width:180px;">नक्सा नं</th>

							                    <th style="width:180px;">कित्ता नं</th>

							                    <th style="width:180px;">क्षेत्रफल(रो-आ-पै-दा)</th>



							                    <!-- <th style="width:180px;">बनावटको किसिम</th>

							                    <th style="width:180px;">प्रयोग</th>

							                    <th style="width:180px;">प्रकार </th>

							                    <th style="width:180px;">क्षेत्रफल(व फु )</th>

							                    <th style="width:180px;">सम्पतिकर मूल्यांकन </th>
 -->


							                    <!-- <th>क्षेत्रफल(व फु )</th> -->

	                    						<th>कर लाग्ने मुल्य </th>



	                    						<!-- <th>सम्पतीकर</th>

	                    						<th>भूमिकर (प्रति कठ्ठा )</th> -->



							                  </tr>

							               </thead>

							               <tbody>

							              	<?php 

							              	if(!empty($Billsdetails)){

							              		$i=1;

							              		$sampati_mulyankan_amount = 0;

							              		$bhumi_kar_mulyankan_rakam = 0;

							              		// $sampatiKar =0;

							              		// $bhumiKar = 0;

							              		// $total_sampati_eval = 0;

							              		// $sampati_dar_rate = 0;

							              		foreach ($Billsdetails as $key => $value) { ?>

							              			<tr>

							              				<!-- jagga ko biwaran -->

							              				<td style="width: 180px"><?php echo $this->mylibrary->convertedcit($i++)?></td>

							              				<td><?php echo $value['old_gapa_napa'].'-'.$this->mylibrary->convertedcit($value['old_ward'])?></td>

							              				<td><?php echo $value['present_gapa_napa'].'-'.$this->mylibrary->convertedcit($value['present_ward'])?></td>

							              				<td><?php echo $value['rm']?></td>

							              				<td><?php echo $value['land_area_type']?></td>

							              				<?php if(MODULE == 2) { ?>

							              					<td><?php echo $value['category']?></td>

							              				<?php } ?>

							              				<td><?php echo $this->mylibrary->convertedcit($value['k_land_rate'])?></td>

							              				<td><?php echo $this->mylibrary->convertedcit($value['nn_number'])?></td>

							              				<td><?php echo $this->mylibrary->convertedcit($value['k_number'])?></td>

							              				<!-- land area details -->

							              				<td>

							              					<?php

							              						$a_ropani = !empty($value['a_ropani']) ? $this->mylibrary->convertedcit($value['a_ropani']): $this->mylibrary->convertedcit(0);

							              						$a_ana = !empty($value['a_ana']) ? $this->mylibrary->convertedcit($value['a_ana']): $this->mylibrary->convertedcit(0);

							              						

							              						$a_paisa = !empty($value['a_paisa']) ? $this->mylibrary->convertedcit($value['a_paisa']): $this->mylibrary->convertedcit(0);

							              						$a_dam = !empty($value['a_dam']) ? $this->mylibrary->convertedcit($value['a_dam']): $this->mylibrary->convertedcit(0);

							              						

							              						echo $a_ropani.'-'.$a_ana.'-'.$a_paisa.'-'.$a_dam;

							              					?>

							              					= <?php echo $this->mylibrary->convertedcit($value['total_square_feet']).'(व फु)'?>

							              					<br></td>

							              				<!-- ends land area details -->

							              				<!-- if not empty show snarachana details -->

							              				<?php //if(!empty($value['sanrachana_id'])) { ?>

							              					<!-- <td><?php echo $value['structure_type']?></td> -->

							              					<!-- <td><?php echo $value['sanrachana_usages']?></td> -->

							              					<!-- <td><?php echo $value['architect_type']?></td> -->

							              					<!-- <td><?php echo $this->mylibrary->convertedcit($value['sanrachana_ground_housing_area_sqft'])?> -->

							              						<?php 

							              							//$sanrachanako_sqft = $value['sanrachana_ground_housing_area_sqft']/5476;  // sanrachan ground level convert into ropani



							              						?>

							              					<?php //echo $this->mylibrary->convertedcit(round($sanrachanako_sqft,2));?>

							              					<!-- </td> -->

							              					<!-- <td><?php echo $this->mylibrary->convertedcit($value['net_tax_amount'])?></td> -->

							              					<!-- sum sampati mulyankan rakam -->

							              					<?php //if(!empty($value['net_tax_amount'])){

							              						//$sampati_mulyankan_amount += $value['net_tax_amount']; //sum sampati mulyankan rakam.

							              					//} else{

							              						//$sampati_mulyankan_amount = 0;

							              					//} ?>

							              					<!-- sum sampati mulyankan rakam -->

							              				<?php //} else { ?>

							              					<!-- <td colspan="5"><div class="alert alert-danger">भौतिक संरचनाको विवरण बनेको छैन </div></td> -->

							              				<?php //} ?>

							              				<!-- end of sanrachana section -->

							              				<td>

							              					<?php if(!empty($value['sanrachana_id'])) { 

							              						$bhumi_eval = $value['r_bhumi_area'];

							              						$ropani = $bhumi_eval/5476;

							              					} else { 

							              						$bhumi_eval = $value['total_square_feet'];

							              						$ropani = $bhumi_eval/5476;

							              					 } 

							              					 if(CALC ==1) {

							              					 	$unit = 'रोपनी';

							              					 } else {

							              					 	$unit = 'कठ्ठा';

							              					 }

							              					 echo $this->mylibrary->convertedcit($bhumi_eval).'('.$this->mylibrary->convertedcit(round($ropani,2)).$unit.')';

							              					 ?>

							              				</td>

							              				<!-- bhumi kar rakam -->

							              				<td>

							              					<?php if(!empty($value['sanrachana_id'])) {

							              						$bhumi_kar_lagne_rakam =  $value['r_bhumi_kar'];

							              					}else {

							              						$bhumi_kar_lagne_rakam = $value['t_rate'];

							              					} 

							              					//get bhumi_kar_mulyankan_rakam

							              					if(!empty($bhumi_kar_lagne_rakam)) {

							              						$bhumi_kar_mulyankan_rakam += $bhumi_kar_lagne_rakam;

							              					}

							              					echo $this->mylibrary->convertedcit($bhumi_kar_lagne_rakam);

							              					?>

							              				</td>

							              			</tr>

							              			

							              	<?php }

							              	} ?>

							              </tbody>

							              <tfoot>

							              	<tr>

							              		<td colspan="13" class="text-right">जम्मा सम्पती मूल्यांकन </td>

							              		<td colspan="" class="text-left"><?php echo $this->mylibrary->convertedcit($sampati_mulyankan_amount)?></td>

							              		<td colspan="">जम्मा भूमिकर मूल्यांकन</td>

							              		<td colspan="">

							              		<?php echo !empty($bhumi_kar_mulyankan_rakam)?$this->mylibrary->convertedcit($bhumi_kar_mulyankan_rakam):0; ?>

							              		</td>

							              	</tr>

							              	<!-- <tr>

							              		<td>करहरुकोदर रेट</td>

							              		<td rowspan="2" style="width:250px;">सम्पतीकर</td>

							                    <td rowspan="2" style="width:250px;">भूमिकर</td>

							              	</tr> -->

			                            </table>

			                            <form action="<?php echo base_url()?>SampatiKarRasid/SaveBillDetails" method="post" class="save_post">

			                            	<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

							              		<input type="hidden" name="nb_file_no" value="<?php echo $land_owner['file_no']?>">

			                            	<div class="row">

			                            		<div class="col-md-4">

			                                        <div class="form-group">

			                                            <label>सम्पतीकर<span style="color:red">*</span></label>

			                                            <!-- get sampati kar -->

			                                            <?php 

			                                            	$sampati_kar_range = $this->SampatiKarRasidModel->getSampatiKarAmount($sampati_mulyankan_amount);

			                                            	$sampati_payable_amount = !empty($sampati_kar_range['sampati_kar'])? $sampati_kar_range['sampati_kar']:0;

			                                            ?>



			                                            <input type="text" name="sampati_kar" value="<?php echo  !empty($sampati_kar_range)?$sampati_kar_range['sampati_kar']:0;?>"

			                                                class=" form-control sampati_kar" readonly>

			                                        </div>

			                                    </div>



			                                    <div class="col-md-4">

			                                        <div class="form-group">

			                                            <label>भूमिकर<?php //echo $bhumi_kar_mulyankan_rakam?><span style="color:red">*</span></label>

			                                            <!-- bhumi kar range -->

			                                            <?php 

			                                            

			                                            	$bhumi_kar_range = $this->SampatiKarRasidModel->getBhumiKarAmount($bhumi_kar_mulyankan_rakam);



			                                            	$bhumi_payable_amount = !empty($bhumi_kar_range['bhumi_kar'])? $bhumi_kar_range['bhumi_kar']:0;

			                                            ?>

			                                            <input type="text" name="bhumi_kar" value="<?php echo  !empty($bhumi_kar_range)?$bhumi_kar_range['bhumi_kar']:0?>"

			                                                class=" form-control sampati_kar" readonly>

			                                        </div>

			                                    </div>



			                                    <div class="col-md-4">

			                                        <div class="form-group">

			                                            <label>जम्मा कर मूल्य </label>

							              				<?php 

							              					$totalPayableKar = $sampati_payable_amount + $bhumi_payable_amount;

							              					

							              				?>

		                                 				<input type="text" name="total_kar_amount" value="<?php echo round($totalPayableKar,2)?>" class="form-control" id="total_amount" readonly>

			                                        </div>

			                                    </div>



			                                    <div class="col-md-4">

			                                        <div class="form-group">

			                                            <label>रसिद नम्बर.<span style="color:red">*</span>

		 												</label>

		                                 				<input type="text" name="bill_no" value="<?php echo $bill?>" class="form-control" id="bill_no">

			                                        </div>

			                                    </div>



			                                    <div class="col-md-4">

			                                        <div class="form-group">

			                                           <label>अन्य सेवा शुल्क रु.</label>

		                                 				<input type="text" name="other_amount" value="0" class="form-control decimal_field" id="other_amount">

			                                        </div>

			                                    </div>

			                                    <div class="col-md-4">

			                                        <div class="form-group">

			                                          <label>छुट रकम रु.</label>

		                                 				<input type="text" name="discount_amount" value="0" class="form-control decimal_field" id="discount_amount">

			                                        </div>

			                                    </div>

			                                    <div class="col-md-4">

			                                        <div class="form-group">

			                                         <label>जरिवाना रकम रु.

		 												</label>

		                                 				<input type="text" name="fine_amount" value="0" class="form-control decimal_field" id="fine_amount">

			                                        </div>

			                                    </div>



			                                    <div class="col-md-4">

			                                        <div class="form-group">

			                                        <label>बक्यौता रकम रु.<span style="color:red">*</span>

		 												</label>

		                                 				<input type="text" name="bakeyuta_amount" value="0" class="form-control decimal_field" id="bakeyuta_amount">

			                                        </div>

			                                    </div>



			                                    <div class="col-md-4">

			                                        <div class="form-group">

			                                        <label>कुल जम्मा रु.<span style="color:red">*</span>

	 													</label>

		                                 				<input type="text" name="net_total_amount" value="<?php echo $totalPayableKar?>" class="form-control net_total" id="total_sum" readonly>

			                                        </div>

			                                    </div>



			                                    <div class="col-md-4">

			                                        <div class="form-group">

			                                        <label>लिईएको रकम रु.<span style="color:red">*</span>

	 												</label>

		                                 				<input type="text" name="recieved_amount" value="0" class="form-control recieved_amount decimal_field">

			                                        </div>

			                                    </div>



			                                    <div class="col-md-4">

			                                        <div class="form-group">

			                                        <label>फिर्ता रकम रु.

	 												</label>

		                                 				<input type="text" name="return_amount" value="0" class="form-control return_amount" readonly="readonly">

			                                        </div>

			                                    </div>



			                                    <div class="col-md-4">

			                                        <div class="form-group">

			                                        <label>

							              				    

							              				बाँकी रकम रु.

	 												</label>

		                                 				<input type="text" name="due_amount" value="" class="form-control due_amount" readonly="readonly">

			                                        </div>

			                                    </div>

			                                    <div class="col-md-12">

			                                    	<div class="text-center">

			                             					<button class="btn btn-primary btn-xs save_btn" data-toggle="tooltip"

	 												title=" सेभ  गर्नुहोस्" name="Submit" type="submit" value="Save"> सेभ

	 												गर्नुहोस्</button>

	 													<a href="<?php echo base_url()?>" class="btn btn-danger btn-xs"

	 												data-toggle="tooltip" title="सम्पादन गर्नुहोस्">रद्द गर्नुहोस्</a>

	 												</div>

			                                    </div>

			                            	</div>

			                            </form>

			                            <?php else : ?>

			                            	<div class="alert alert-warning">जग्गाको विबरण राखिएको राखिएको छैन | कृपया जाग्गा को विवरण थप्नुहोस <a href="<?php echo base_url()?>LandDetails/AddLandDetails/<?php echo $land_owner['file_no']?>">जग्गा को विवरण थप्नुहोस</a></div>

			                            <?php endif;?>

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

	$(document).on('input', '#fine_amount,#discount_amount,#other_amount,#bakeyuta_amount', function() {

		obj = $(this);

		// alert('hello');

		//var  = obj.val();

		var net_total_amount = $('#total_amount').val();

		//alert(net_total_amount);

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

	 	var bakeyuta_amount= $('#bakeyuta_amount').val();

	 	if(bakeyuta_amount== '' ) {

	 		bakeyuta_amount= 0;

	 	}

	  	var net_total = parseFloat(net_total_amount) + parseFloat(bakeyuta_amount) + parseFloat(other_bill) + parseFloat(fine_amount)- parseFloat(discount_amount);

	 	$('.net_total').val(net_total );

	});



	$(document).on('input', '.recieved_amount', function() {



		// alert('hello');



	 	var recieved_amount = $(this).val();

	 	var total_amount = $('.net_total').val();

	 	if(recieved_amount == '') {

	 		recieved_amount = 0;

	 	}

	 	

	 	var return_amount = parseFloat(recieved_amount) - parseFloat(total_amount);

	 	$('.return_amount').val(return_amount);

	});

}); //end of dom

</script>