
<?php 
$current_date = convertDate(date('Y-m-d'));
if($current_date != $bill_details['date'] && $this->session->userdata('PRJ_USER_ID')!= '1') { ?>
<div class="alert alert-warning">
  Cannot cancel bill
</div>
<?php } else { ?>
  <form action="<?php echo base_url()?>NagadiRasid/DeleteBill" method="post" class="form save_post">

  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

  <div class="form-group">

    <div class="col-md-12">

      <div class="form-group">

        <input type="hidden" name="id" value="<?php echo $bill_details['id']?>">
        <input type="hidden" name="guid" value="<?php echo $bill_details['guid']?>">

        <label>रशिद नं</label>

        <input type="number" class="form-control" placeholder=""  name="bill_no" required="required" value="<?php echo !empty($bill_details['bill_no']) ? $bill_details['bill_no']:''?>" readonly>

      </div>



      <div class="form-group">

        <label>मिति </label>

        <input type="text" name="date" class="form-control" value="<?php echo convertDate(date('Y-m-d'))?>" readonly>

        

        <div class="form-group">

          <label>कारण<span style="color:red">*</span></label>

          <textarea class="form-control" name="reason" required="required"></textarea>

        </div>

      </div>

    </div>

  </div>

  <div class="modal-footer">

    <button class="btn btn-primary btn-xs save_btn" data-toggle="tooltip" title="सम्पादन गर्नुहोस्" name="Submit" type="submit" value="Submit"><i class="fa fa-save"></i> सम्पादन गर्नुहोस्</button>

    <button type="button" class="btn btn-danger btn-xs" data-toggle="tooltip" title="सम्पादन गर्नुहोस्" data-dismiss="modal">पछाडी जानुहोस </button>

  </div>

</form>
<?php } ?>


<script type="text/javascript" src="<?php echo base_url()?>assets/js/customjs.js"></script>