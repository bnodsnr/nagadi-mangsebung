<div class="valid_errors"></div>
<form action="<?php echo base_url()?>RoadType/Update" method="post" class="form save_post">
  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
  <div class="form-group">
    <div class="col-md-12">
       <input type="hidden" class="form-control" placeholder=""  name="id" value="<?php echo $row['id']?>">
      <div class="form-group">
        <label>आर्थिक वर्ष <span style="color:red">*</span></label>
       <select class="form-control" name="fiscal_year" required="required">
         <?php if(!empty($fiscal_year)) :
            foreach ($fiscal_year as $key => $fy) :?>
              <option value="<?php echo $fy['year']?>" <?php if($fy['year'] == $row['fiscal_year']){echo 'selected';}?>><?php echo $fy['year']?></option>
            <?php endforeach; endif;?>
       </select>
      </div>
      <div class="form-group">
       <label><b>सडकको किसिम</b></label>
        <input type="text" class="form-control" placeholder=""  name="road_type" value="<?php echo $row['road_type']?>" required="required">
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn btn-primary btn-xs save_btn" data-toggle="tooltip" title="सम्पादन गर्नुहोस्" name="Submit" type="submit" value="Submit">सम्पादन गर्नुहोस्</button>
    <button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" title="सम्पादन गर्नुहोस्" data-dismiss="modal">रद्द गर्नुहोस्</button>
  </div>
</form>