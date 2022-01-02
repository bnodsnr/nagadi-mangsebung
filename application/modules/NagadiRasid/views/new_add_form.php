<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i> गृहपृष्ठ</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url()?>NagadiRasid">नगदी रशिद सूची</a></li>
        <li class="breadcrumb-item"><a href="javascript:;" style="color:red"> नयाँ थप्नुहोस् </a></li>
      </ol>
    </nav>
    <!-- page start-->
    <div class="row">
      <div class="col-sm-12">
            <section class="card">
              <header class="card-header" style="background: #1b5693;color:#FFF"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                नगदी रशिद
              </header>
              <div class="card-body">
                <?php 
                  if($bill > $bill_range['bill_to']) {
                    $d  = '';
                  } else {
                    $d = $bill;
                  }
                ?>
                <?php if($d == '') { ?>
                  <div class="alert alert-warning">सबै रशिद नम्बर पहिले नै प्रयोग गरीएको छ</div>
                <?php } ?>

                   <?php $success_message = $this->session->flashdata("MSG_ERR");
                      if(!empty($success_message)) { ?>
                      <div class="alert alert-success">
                          <button class="close" data-close="alert"></button>
                          <span> <?php echo $success_message;?> </span>
                      </div>
                    <?php } ?>
                  <form role="form" action="<?php echo base_url()?>NagadiRasid/saveNagadiRasid" method="post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-bordered">
                          <thead style="background: #1b5693; color:#fff">
                            <tr>
                              <th>करदाताको विवरण प्रविष्ट गर्नुहोस्</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label class="">प्रदेश </label>
                                      <input type="text" class="form-control" name="pradesh" value="<?php echo PROVIENCE?>" readonly="readonly" tabindex="-1">
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label class="">जिल्ला</label>
                                      <input type="text" class="form-control" name="" value="<?php echo DISTRICT?>" readonly="readonly" tabindex="-1">
                                     <input type="hidden" class="form-control" name="district" value="<?php echo DISTRICTID?>" readonly="readonly" tabindex="-1">
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group">
                                     <label class="">ग.पा / न. पा 
                                     </label>
                                     <select class=" form-control select_option" name="gaunpalika_nagarpalika">
                                      <?php if(!empty($gapana)) : 
                                        foreach ($gapana as $key => $gn) : ?>
                                          <option value="<?php echo $gn['id']?>" <?php if($userdetails->gapa_napa == $gn['id']){ echo 'selected';}?>><?php echo $gn['name']?></option>
                                        <?php endforeach;endif;?>
                                    </select>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group">
                                     <label class="">वडा </label>
                                     <select class="select_option form-control" name = "ward_no">
                                      <?php if(!empty($ward)) : 
                                        foreach ($ward as $key => $w) : ?>
                                          <option value="<?php echo $w['name']?>" <?php if($userdetails->ward== $w['name']){ echo 'selected';}?>><?php echo $this->mylibrary->convertedcit($w['name'])?></option>
                                        <?php endforeach;endif;?>
                                    </select>
                                    </div>
                                  </div>

                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>आर्थिक वर्ष<span style="color:red">*</span></label>
                                      <input type="text" class="form-control" placeholder="" name="fiscal_year" required="required" value="<?php echo $current_fy['year']?>" readonly="readonly">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>मिति <span style="color:red">*</span></label>
                                      <input type="text" class="form-control" placeholder="" name="date" required="required" value="<?php echo convertDate(date('Y-m-d'))?>" readonly="readonly">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <?php 
                                        if($bill > $bill_range['bill_to']) {
                                          $b  = '';
                                        } else {
                                          $b = $bill;
                                        }
                                      ?>
                                      <label> रशिद  नं <span style="color:red">*</span></label>
                                      <input type="text" class="form-control" placeholder="" name="bill_no" required="required" readonly="readonly" value="<?php echo $b?>" tabindex="-1">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label> करदातको नाम  <span style="color:red">*</span></label>
                                      <input type="text" class="form-control" placeholder="" name="customer_name" required="required" value="" tabindex="1" autofocus>
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table table-bordered" id="add_new_fields">
                          <thead style="background: #1b5693; color:#fff">
                            <tr>
                              <th>बिल विवरण प्रविष्ट गर्नुहोस् <button class="btn btn-success btn-sm btnAddNew pull-right" data-toggle="tooltip" title=" नयाँ थप्नुहोस्" tabindex="-1"><i class="fa fa-plus"> </i> नयाँ थप्नुहोस् </button></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr class="nagadi_rasid_frm">
                              <td>
                                <div class ="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label class="">मुख्य शीर्षक </label>
                                       <select class="main_topic" name="main_topic[]" data-placeholder="मुख्य शीर्षक छनौट गर्नुहोस्" tabindex="0" required="required">
                                        <option value="">मुख्य शीर्षक छनौट गर्नुहोस्</option>
                                        <?php if(!empty($main_topic)) : 
                                          foreach ($main_topic as $key => $value) : ?>
                                            <option value="<?php echo $value['id']?>"><?php echo $value['topic_name']?></option>
                                        <?php endforeach;endif;?>
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="">सहायक शीर्षक </label>
                                        <select class="select_option sub_topic" name="sub_topic[]" data-placeholder="" tabindex="1" required="required">
                                        </select>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <label class=""> शीर्षक </label>
                                    <select class="main_title" name="main_title[]" required="required">
                                    </select>
                                  </div>
                                </div>
                                <div class="row other_space_section">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label class="qty_title">परिमाण/रकम  </label>
                                       <input type="text" class="form-control topic_qty" placeholder="" name="qty[]"  value="" style="height: 30px;" autocomplete="off" tabindex="-1">
                                       <span class="notifiy_percent" style="color:red"></span>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label class="rate_type">दर/रकम</label>
                                       <input type="text" name="rate[]" value="" class="form-control topic_fixed_rate" readonly="readonly" style="height: 30px;" tabindex="-1">
                                       <input type = "hidden" name="percent_rate" class="percent_rate">
                                    </div>
                                  </div>
                                 
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label class="">जम्मा </label>
                                      <input type="text" class="form-control topic_rate " placeholder="" name="rates[]"  value="" style="height: 30px;" tabindex="-1">
                                    </div>
                                  </div>
                                </div>
                                <!-- other title input -->
                                <div class="row other_space">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label class="">अन्य शीर्षक</label>
                                       <input type="text" name="other_title[]" value="" class="form-control other_title" style="height: 30px;" tabindex="-1">
                                      
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label class="rate_type">दर</label>
                                       <input type="text" name="rate[]" value="" class="form-control other_rate" style="height: 30px;" tabindex="-1">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label class="qty_title">परिमाण/रकम  </label>
                                       <input type="text" class="form-control other_topic_qty" placeholder="" name="qty[]" value="" style="height: 30px;" autocomplete="off" tabindex="-1">
                                       <span class="notifiy_percent" style="color:red"></span>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label class="">जम्मा </label>
                                      <input type="text" class="form-control other_topic_rate " placeholder="" name="rates[]" value="" style="height: 30px;" tabindex="-1">
                                    </div>
                                  </div>
                                </div>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                         <label class="">कुल जम्मा </label>
                         <input type="text" class="form-control t_total" placeholder="" name="t_total"  id= "t_total" required="required" readonly="readonly" tabindex="-1">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                         <label class="">लिएको रकम </label>
                         <input type="text" class="form-control recieved_amount" placeholder="" name="recieved_amount" required="required">
                        </div>
                        <div class="rec_err"></div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                         <label class="">फिर्ता रकम </label>
                         <input type="text" class="form-control return_amount" placeholder="" name="return_amount" readonly="readonly">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <hr>
                      <button class="btn btn-primary btn-xs btn-save btn_save_nagadi" data-toggle="tooltip" title=" सेभ  गर्नुहोस्" name="Submit" type="submit" value="Submit" id="btn_save_details"> सेभ गर्नुहोस्</button>
                      <a href="<?php echo base_url()?>JaggakoRate" class="btn btn-danger btn-xs" data-toggle="tooltip" title="सम्पादन गर्नुहोस्">रद्द गर्नुहोस्</a>
                    </div>
                  </form>
              </div>
            </section>
        </div>
      </div>
      <!-- page end-->
    </section>
  </section>
  <script type="text/javascript" src="<?php echo base_url()?>assets/assets/select2/js/select2.min.js"></script>
  <script type="text/javascript">
    $(".main_topic").select2();
    $(document).ready(function () {
      $('.other_space').hide();
        //add new fields
      $('.select_option').select2();
      $('.main_title').select2();
      $('.btnAddNew').click(function(e) {
        e.preventDefault();
        var trOneNew = $('.nagadi_rasid_frm').length+1;
        var new_row =  '<tr class="nagadi_rasid_frm"><td>'+
              '<div class ="row">'+
                  '<div class="col-md-4">'+
                    '<div class="form-group">'+
                      '<label class="">मुख्य शीर्षक </label>'+
                        '<select class="select_option form-control main_topic" name="main_topic[]" data-placeholder="मुख्य शीर्षक छनौट गर्नुहोस्" tabindex="0" required="required"><option value="">मुख्य शीर्षक छनौट गर्नुहोस्</option><?php if(!empty($main_topic)) : foreach ($main_topic as $key => $value) : ?><option value="<?php echo $value['id']?>"><?php echo $value['topic_name']?></option><?php endforeach;endif;?></select>'+
                    '</div>'+
                  '</div>'+
                  '<div class="col-md-4">'+
                    '<div class="form-group">'+
                        '<label class="">सहायक शीर्षक </label>'+
                        '<select class="select_option form-control sub_topic" name="sub_topic[]" required="required"></select>'+
                    '</div>'+
                  '</div>'+
                  '<div class="col-md-4">'+
                    '<label class="">शीर्षक </label>'+
                    '<select class="main_title " name = "main_title[]" required="required"></select>'+
                  '</div></div>'+
                  '<div class="row other_space_section">'+
                    '<div class="col-md-4">'+
                      '<div class="form-group">'+
                        '<label class="rate_type">दर </label>'+
                          '<input type="text" name="rate[]" value="" class="form-control topic_fixed_rate" readonly="readonly" style="height: 30px;" tabindex="-1">'+
                          '<input type = "hidden" name="percent_rate" class="percent_rate">'+
                      '</div>'+
                   '</div>'+
                    '<div class="col-md-4">'+
                      '<div class="form-group">'+
                        '<label class="qty_title">परिमाण/रकम</label>'+
                        '<input type="text" class="form-control topic_qty" placeholder="" name="qty[]" value="" style="height: 30px;" autocomplete="off" tabindex="-1">'+
                        '<span class="notifiy_percent" style="color:red"></span>'+
                      '</div>'+
                    '</div>'+
                    '<div class="col-md-4">'+
                      '<div class="form-group">'+
                        '<label class="">जम्मा </label>'+
                        '<input type="text" class="form-control topic_rate " placeholder="" name="rates[]" id="total_rate_'+trOneNew+'" value="" style="height: 30px;" tabindex="-1">'+
                      '</div>'+
                     '</div>'+
                   '</div>'+ //end not other section

                   '<div class ="row other_space" id="other_space_'+trOneNew+'">'+//other space section
                     '<div class="col-md-3">'+
                        '<div class="form-group">'+
                          '<label class="">अन्य शीर्षक</label>'+
                           '<input type="text" name="other_title[]" value="" class="form-control other_title" style="height: 30px;" tabindex="-1">'+
                        '</div>'+
                      '</div>'+
                      '<div class="col-md-3">'+
                        '<div class="form-group">'+
                          '<label class="rate_type">दर</label>'+
                           '<input type="text" name="other_rate[]" value="" class="form-control other_rate" style="height: 30px;" tabindex="-1">'+
                        '</div>'+
                      '</div>'+
                      '<div class="col-md-3">'+
                        '<div class="form-group">'+
                          '<label class="qty_title">परिमाण/रकम  </label>'+
                           '<input type="text" class="form-control other_topic_qty" placeholder="" name="other_qty[]"  value="" style="height: 30px;" autocomplete="off" tabindex="-1">'+
                        '</div>'+
                      '</div>'+
                      '<div class="col-md-3">'+
                        '<div class="form-group">'+
                          '<label class="">जम्मा </label>'+
                          '<input type="text" class="form-control other_topic_rate" id="other_topic_rate'+trOneNew+'" placeholder="" name="other_rates[]" value="" style="height: 30px;" tabindex="-1">'+
                        '</div>'+
                      '</div>'+
                   '</div>'+
                  
                  '<div class="col-md-1 pull-right">'+
                    '<div class="form-group">'+
                      '<button class="btn btn-danger btn-sm remove-row" data-id = "'+trOneNew+'">हटाउनुहोस्</button>'+
                    '</div>'+
                  '</div>'+
                  
                '</div>'+
                
              '</td></tr>';
            
        $("#add_new_fields").append(new_row);
        $('.select_option').select2();
        $('.main_title').select2();
        $('#other_space_'+trOneNew).hide();
        //$('#add_new_fields').find("tr").closest('.other_space').hide();
      });


      $("body").on("click",".remove-row", function(e){
        e.preventDefault();
        var id = $(this).data('id');
        if (confirm('के तपाइँ  यसलाई हटाउन निश्चित हुनुहुन्छ ?')) {
          var trOneNew = $('.nagadi_rasid_frm').length;

          var amt = $('#total_rate_'+id).val();
          var other_amt = $('#other_topic_rate'+id).val();
          var t_amt = $('.t_total').val();

          var new_amt = t_amt-amt-other_amt;
          $("#t_total").val(new_amt);
          $(this).parent().parent().parent().remove();
        }
      });

      $(document).on('click','#first_row_remove', function(){
        alert('यसलाई हटाउन सक्दैन');
      });

      $(document).on('change','.main_topic', function() {
        obj = $(this);
        var main_topic = obj.val();
        $.ajax({
          method:"POST",
          url:base_url+"NagadiRasid/getSubTopic",
          data: {main_topic:main_topic},
          success:function(resp) {
            if(resp.status == 'success') {
              obj.closest("tr").find(".sub_topic").html(resp.data);
            }
          }
        });
      });

      $(document).on('input', '.topic_qty', function(){
        obj =$(this);
        var final_total = 0
        var qty = obj.val();
        var rate = obj.closest("tr").find('.topic_fixed_rate').val();
        var is_percent = obj.closest("tr").find(".percent_rate").val();
        if(is_percent == 1) {
          var p = rate/100;
          var total = qty * p;
          obj.closest("tr").find('.topic_rate').val(total)
         
        } else {
          trp = qty*rate;
          obj.closest("tr").find('.topic_rate').val(trp)
        }
        $( ".topic_rate" ).each( function(){
          final_total += parseFloat( $( this ).val() ) || 0;
        });

        other_final_total_amount = 0;
        $( ".other_topic_rate" ).each( function(){
          other_final_total_amount += parseFloat( $( this ).val() ) || 0;
        });

        var net_total = final_total + other_final_total_amount;
        $('#t_total').val(net_total);
      });

      $(document).on('input','.recieved_amount', function()  {
        
        obj = $(this);
        var rec_amount = obj.val();
        var t_total = $('.t_total').val();
        var return_amount = rec_amount -t_total;
        $('.return_amount').val(return_amount);
        
      });

      $(document).on('click','#btn_save_details', function(){
          var rec_amount = $('.recieved_amount').val();
          var t_total = $('.t_total').val();
          var return_amount = rec_amount-t_total;
          if(rec_amount < t_total) {
            $('.rec_err').html('<div class="alert alert-danger">प्राप्त रकम कुल रकम भन्दा कम हुन सक्दैन</div>');
            return false;
          } else {
            $('.rec_err').empty();
          }
          $('.return_amount').val(return_amount);
      });

      //subtopic change
      $(document).on('change','.sub_topic', function(){
        obj = $(this);
        var subtopic = obj.val();
        $.ajax({
          method:"POST",
          url:base_url+"NagadiRasid/getTopicRate",
          data: {subtopic:subtopic},
          success:function(resp) {
            if(resp.status == 'success') {
              obj.closest("tr").find(".main_title").html(resp.data);
            }
          }
        });
      });


      $(document).on('change', '.main_title', function(){
        obj = $(this);
        var topic_rate = obj.val();
        if(topic_rate == "others") {
          obj.closest("tr").find('.other_space_section').hide();
          obj.closest("tr").find('.other_space').show();
          obj.closest("tr").find('.other_topic_qty').val(1);

          // obj.closest("tr").find('.topic_fixed_rate').attr('required', false);
          // obj.closest("tr").find('.rates').attr('required', false);
          // obj.closest("tr").find('.topic_qty').attr('required', false);

        } else {
           $.ajax({
          method:"POST",
          url:base_url+"NagadiRasid/getTopicRateDetails",
          data: {topic_rate:topic_rate},
          success:function(resp) {
            if(resp.status == 'success') {
              if(resp.data.is_percent == 1 && resp.data.is_percent != null) {

                // obj.closest("tr").find('.topic_fixed_rate').attr('required', true);
                // obj.closest("tr").find('.rates').attr('required', true);
                // obj.closest("tr").find('.topic_qty').attr('required', true);

               
                // obj.closest("tr").find('.other_title').attr('.other_title', false);
                // obj.closest("tr").find('.other_rate').attr('.other_rate', false);
                // obj.closest("tr").find('.other_topic_qty').attr('.other_topic_qty', false);
                // obj.closest("tr").find('.other_topic_rate').attr('.other_topic_rate', false);

                obj.closest("tr").find('.other_space_section').show();
                obj.closest("tr").find('.other_space').hide();

               


                obj.closest("tr").find(".rate_type").text('प्रतिशत ');
                obj.closest("tr").find(".qty_title").text('रकम');
                obj.closest("tr").find(".percent_rate").val(1);
                obj.closest("tr").find(".topic_fixed_rate").val(resp.data.rate);
                obj.closest("tr").find(".topic_qty").val(0);
                obj.closest("tr").find(".topic_rate").val(0);
                obj.closest("tr").find(".notifiy_percent").text('कृपया रकम प्रविष्ट गर्नुहोस्');
                $('.btn_save_nagadi').attr('disabled');
              } else {

                obj.closest("tr").find('.other_space_section').show();

                // obj.closest("tr").find('.other_title').attr('.other_title', false);
                // obj.closest("tr").find('.other_rate').attr('.other_rate', false);
                // obj.closest("tr").find('.other_topic_qty').attr('.other_topic_qty', false);
                // obj.closest("tr").find('.other_topic_rate').attr('.other_topic_rate', false);

                obj.closest("tr").find('.other_space').hide();

                // obj.closest("tr").find('.topic_fixed_rate').attr('required', true);
                // obj.closest("tr").find('.rates').attr('required', true);
                // obj.closest("tr").find('.topic_qty').attr('required', true);

                


                obj.closest("tr").find(".rate_type").text('दर/रकम');
                obj.closest("tr").find(".topic_fixed_rate").val(resp.data.rate);
                obj.closest("tr").find(".topic_qty").val(1);
                obj.closest("tr").find(".topic_rate").val(resp.data.rate);
                $('.t_total').val(resp.data.rate);
                 obj.closest("tr").find(".notifiy_percent").text('');
              }
             
              var sum = 0;
              $(".topic_rate ").each(function(){
                  sum += +$(this).val();
              });

              // sum other total value to net total

              other_final_total_amount = 0;
              $( ".other_topic_rate" ).each( function(){
                other_final_total_amount += parseFloat( $( this ).val() ) || 0;
              });
              var net_total = sum + other_final_total_amount;
              $(".t_total").val(net_total);

            }
          }
        });
        }
      });

      $(document).on('input','.other_rate',function(){
        obj = $(this);
        var topic_rate = obj.val();
        var topic_qty = obj.closest("tr").find('.other_topic_qty').val();
        var total_rate = topic_rate * topic_qty;
        obj.closest("tr").find('.other_topic_rate').val(total_rate);

        other_final_total_amount = 0;
        $( ".other_topic_rate" ).each( function(){
          other_final_total_amount += parseFloat( $( this ).val() ) || 0;
        });

        var sum = 0;
              $(".topic_rate ").each(function(){
                  sum += +$(this).val();
          });
        var net_total = sum + other_final_total_amount;
        $('#t_total').val(net_total); 
      });


       $(document).on('input', '.other_topic_qty', function(){
        obj =$(this);
        var other_final_total = 0;
        var final_total = 0;
        var qty = obj.val();
        var other_rate = obj.closest("tr").find('.other_rate').val();
        var other_total_value = qty * other_rate;
        var rate = obj.closest("tr").find('.other_topic_rate').val(other_total_value);

        other_final_total_amount = 0;
        $( ".other_topic_rate" ).each( function(){
          other_final_total_amount += parseFloat( $( this ).val() ) || 0;
        });
        //$('#t_total').val(other_final_total_amount); 

        $( ".topic_rate" ).each( function(){
          final_total += parseFloat( $( this ).val() ) || 0;
        });

        var net_total = other_final_total + final_total;
        $('#t_total').val(net_total); 
      });


    });//end dom
  </script>
  