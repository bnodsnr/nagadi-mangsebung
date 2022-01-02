<!--main content start-->
<section id="main-content">
	<section class="wrapper site-min-height">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> गृहपृष्ठ</a>
				</li>
				<li class="breadcrumb-item"><a href="<?php echo base_url()?>BillSetting">रसिद विवरण</a></li>
				<li class="breadcrumb-item"><a href="javascript:;"> नयाँ थप्नुहोस् </a></li>
			</ol>
		</nav>
		<!-- page start-->
		<div class="row">
			<div class="col-sm-12">
				<?php $success_message = $this->session->flashdata("MSG_ALERT");
        if(!empty($success_message)) { ?>
				<div class="alert alert-danger">
					<button class="close" data-close="alert"></button>
					<span> <?php echo $success_message;?> </span>
				</div>
				<?php } ?>
				<section class="card">
					<header class="card-header" style="background: #1b5693;color:#FFF">
						रसिद विवरण
					</header>
					<div class="card-body">
						<form action="<?php echo base_url()?>BillSetting/saveBillSetting" method="post" class="form">
							<div class="row">
							     <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
								<div class="col-md-6">
									<div class="form-group">
										<label>आर्थिक वर्ष<span style="color:red">*</span></label>
										<select class="form-control set_fiscal_year_frm" name="fiscal_year"
											id="set_fiscal_year_frm" required>
											<option value="">आर्थिक वर्ष चयन गर्नुहोस्</option>
											<?php
                  if(!empty($fiscal_year)) : 
                    foreach ($fiscal_year as $key => $value) : ?>
											<option value="<?php echo $value['year']?>"
												<?php if($value['year'] ==get_current_fiscal_year()){ echo 'selected';} ?>>
												<?php echo $value['year']?></option>
											<?php endforeach;endif?>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>रसिद <span style="color:red">*</span></label>
										<select class="form-control js-example-basic-single" name="bill_type" required>
											<option value="1">नगदी रशिद
											</option>
											<option value="2">
												सम्पतिकर / भूमिकर नगदी रसिद</option>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>प्रयोगकर्ता<span style="color:red">*</span></label>
										<select class="form-control js-example-basic-single" name="user_id" required>
											<?php if(!empty($user)) :
                      foreach($user as $key => $u):?>
											<option value="<?php echo $u['userid']?>"><?php echo $u['user_name']?>
											</option>
											<?php endforeach;endif;?>
										</select>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>देखि <span style="color:red">*</span></label>
										<input type="text" class="form-control" placeholder="" name="bill_from"
											required="required" value="" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>सम्म <span style="color:red">*</span></label>
										<input type="text" class="form-control" placeholder="" name="bill_to"
											required="required" value="" required>
									</div>
								</div>

								<div class="col-md-12 text-center">
									<hr>
									<button class="btn btn-primary btn-xs btn-save" data-toggle="tooltip"
										title=" सेभ  गर्नुहोस्" name="Submit" type="submit" value="Submit"> सेभ
										गर्नुहोस्</button>
									<a href="<?php echo base_url()?>BillSetting" class="btn btn-danger btn-xs"
										data-toggle="tooltip" title="सम्पादन गर्नुहोस्">रद्द गर्नुहोस्</a>
								</div>
							</div>
						</form>
				</section>
			</div>
		</div>
		<!-- page end-->
	</section>
</section>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/customjs.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/assets/select2/js/select2.min.js"></script>
