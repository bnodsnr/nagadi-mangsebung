<div class="valid_errors"></div>
<form action="<?php echo base_url()?>RoadType/save" method="post" class="form save_post">
  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
  <div class="form-group">
    <div class="col-md-12">
      <div class="form-group">
        <label>आर्थिक वर्ष <span style="color:red">*</span></label>
       <select class="form-control" name="fiscal_year" required="required">
         <?php if(!empty($fiscal_year)) :
            foreach ($fiscal_year as $key => $fy) :?>
              <option value="<?php echo $fy['year']?>" <?php if($fy['year'] == get_current_fiscal_year()){echo 'selected';}?>><?php echo $fy['year']?></option>
            <?php endforeach; endif;?>
       </select>
      </div>
      <div class="form-group">
       <label><b>सडकको किसिम</b></label>
         <input type="text" class="form-control" placeholder=""  name="road_type" value="" required="required">
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn btn-primary btn-xs save_btn" data-toggle="tooltip" title="सम्पादन गर्नुहोस्" name="Submit" type="submit" value="Submit">सम्पादन गर्नुहोस्</button>
    <button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" title="सम्पादन गर्नुहोस्" data-dismiss="modal">रद्द गर्नुहोस्</button>
  </div>
</form>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/customjs.js"></script>