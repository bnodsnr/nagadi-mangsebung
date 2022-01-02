    <!--main content start-->

    <section id="main-content">

        <section class="wrapper site-min-height">

            <nav aria-label="breadcrumb">

                <ol class="breadcrumb">

                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i>

                            गृहपृष्ठ</a>

                    </li>

                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>PersonalProfile">

                            व्यक्तिगत अभिलेख </a></li>

                    <li class="breadcrumb-item"><a href="<?php echo base_url()?>LandDetails/veiwLandDescription/<?php echo $lo_details['file_no']?>">

                            जग्गाको विवरण </a></li>

                    <li class="breadcrumb-item"><a href="javascript:;">

                           नया थप्नुहोस</a></li>



                </ol>

            </nav>

            <!-- page start-->

            <div class="row">

                <div class="col-sm-12">

                    <form action="<?php echo base_url()?>LandDetails/saveLandDetails" method="post" class="save_post">
                        <input type="hidden" name="ld_file_no" value="<?php echo $lo_details['file_no']?>">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <section class="card">
                            <header class="card-header" style="background: #1b5693;color:#FFF"> जग्गाको विवरण : जग्गाधनी - <?php echo $lo_details['land_owner_name_np']?> / जग्गाधनिको क्र.स नम्बर :<?php echo $lo_details['file_no']?> <!-- <span style="color:red">(प्र रो = प्रति रोपनी )</span> --></header>
                            <div class="card-body">
                               <table class="table table-bordered table-striped" id="add_new_fields">
                                    <tbody>
                                        <tr class="nagadi_rasid_frm">
                                            <td>
                                                <div class ="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                         <label>साबिक गा.पा/न.पा<span style="color:red">*</span></label>
                                                         <select name="old_gapa_napa[]" class="from-control dd_select oldaddress" id="oldwardaddress" required>
                                                            <option value="">छान्नुहोस्</option>
                                                            <?php
                                                            if(!empty($oldwardaddress)) :
                                                                foreach ($oldwardaddress as $key => $oa) : ?>
                                                                    <option value="<?= $oa['old_name']?>"><?= $oa['old_name']?></option>
                                                                <?php endforeach; endif;?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>साबिक वडा नं<span style="color:red">*</span></label>
                                                            <select name="old_ward[]" class="from-control dd_select oldward" id="old_ward" required>
                                                                <option value="">छान्नुहोस्</option>
                                                                <?php if(!empty($wardadrress)) :
                                                                    foreach ($wardadrress as $key => $ow) : ?>
                                                                        <option value="<?php echo  $ow['old_ward']?>"><?php echo $ow['old_ward']?></option>
                                                                    <?php endforeach; endif;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>हाल गा.पा/न.पा<span style="color:red">*</span></label>
                                                            <input type="text" name="present_gapa_napa[]" value="" class=" form-control present_name" readonly="readonly" required="true">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>हाल वडा नं<span style="color:red">*</span></label>
                                                            <input type="text" name="present_ward[]" value="" class=" form-control present_ward" readonly="readonly" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>जग्गाको क्षेत्रगत किसिम<span style="color:red">*</span></label>
                                                            <select name="land_area_type[]" class="from-control dd_select land_area_type" id="land_area_type" required>
                                                                <option value="">छान्नुहोस्</option>
                                                                <?php 
                                                                if(!empty($areatype)) :
                                                                    foreach ($areatype as $key => $at) : ?>
                                                                        <option value="<?php echo  $at['id']?>" <?php if($at['id'] == 4){ echo 'selected';}?>><?php echo $at['land_area_type']?> </option>
                                                                    <?php endforeach; endif;?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>सडकको नाम<span style="color:red">*</span></label>
                                                            <select name="road_name[]" class="from-control dd_select road_details" id="road_details" required></select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>नक्सा  नं<span style="color:red">*</span></label>
                                                            <input type="text" name="nn_number[]" value="" class=" form-control nn_number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>कित्ता  नं<span style="color:red">*</span></label>
                                                            <input type="text" name="k_number[]" value="" class=" form-control k_number" required="true">
                                                            <div id="num_err"></div>
                                                        </div>
                                                    </div>
                                                  
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>रोपनी<span style="color:red">*</span></label>
                                                            <input type="text" name="a_ropani[]" value="" class=" form-control ropani number_field">
                                                            <div class="r_sqft"></div>
                                                            <div id="num_err"></div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>आना<span style="color:red">*</span></label>
                                                            <input type="text" name="a_ana[]" value="" class=" form-control aana number_field">
                                                            <div class="a_sqft"></div>
                                                            <div id="num_err"></div>
                                                            <!-- <span style="color:red">(कृपया १ देखि १५ मात्र प्रविष्ट गर्नुहोस्)</span> -->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>पैसा<span style="color:red">*</span></label>
                                                            <input type="text" name="a_paisa[]" value="" class=" form-control paisa number_field">
                                                            <div class="p_sqft"></div>
                                                            <div id="num_err"></div>
                                                           <!--  <span style="color:red">(कृपया १ देखि ३ मात्र प्रविष्ट गर्नुहोस्)</span> -->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>दाम<span style="color:red">*</span></label>
                                                            <input type="text" name="a_dam[]" value="" class=" form-control dam decimal_field">
                                                            <div class="d_sqft"></div>
                                                            <!-- <span style="color:red">(कृपया १ देखि ३ मात्र प्रविष्ट गर्नुहोस्)</span> -->
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>क्षेत्रफल (meter sqft)<span style="color:red">*</span></label>
                                                            <input type="text" name="total_meter_square[]" value="" class=" form-control meter_sqft decimal_field">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>क्षेत्रफल (sqft)<span style="color:red">*</span></label>
                                                            <input type="text" name="total_square_feet[]" value="" class=" form-control total_sqft" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="a_unit" value="1">
                                                    
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>न्युनतम मुल्य(प्र रो)<span style="color:red">*</span></label>
                                                            <input type="text" name="min_land_rate[]" value="" class=" form-control min_rate" readonly="readonly">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>अधिक्तम मुल्य(प्र रो)<span  style="color:red">*</span></label>
                                                            <input type="text" name="max_land_rate[]" value="" class=" form-control max_rate" readonly="readonly">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>कबुल गरेको मुल्य(प्र रो)<span style="color:red">*</span></label>
                                                            <input type="text" name="k_land_rate[]" value="" class=" form-control kubul_rate decimal_field">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>कर लाग्ने मुल्य<span style="color:red">*</span></label>
                                                            <input type="text" name="t_rate[]" value="" class=" form-control tax_amount">
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                               </table>
                               <button type="button" class="btn btn-warning btn-block  btnAddNew" data-toggle="tooltip" title=" नयाँ थप्नुहोस्" tabindex="-1"><i class="fa fa-plus"> </i> नयाँ कित्ता थप्नुहोस् </button>
                               <hr>
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary btn-xs btn-save save_btn" data-toggle="tooltip" title=" सेभ  गर्नुहोस्" name="Submit" type="submit" value="Submit" id="btn_save_details"> सेभ गर्नुहोस्</button>
                                    <a href="<?php echo base_url()?>NagadiRasid" class="btn btn-danger btn-xs" data-toggle="tooltip" title="सम्पादन गर्नुहोस्">रद्द गर्नुहोस्</a>
                                </div>
                            </div><!--cardbody-->
                        </section>
                    </form>
                </div>
            </div><!--row-->
        </section>
    </section>

<script type="text/javascript" src="<?php echo base_url()?>assets/assets/select2/js/select2.min.js"></script>

<script type="text/javascript">

$(document).ready(function() {

    $('.btnAddNew').click(function(e) {
        e.preventDefault();
        var trOneNew = $('.nagadi_rasid_frm').length+1;
        var new_row =  '<tr class="nagadi_rasid_frm"><td>'+
            '<div class ="row">'+
                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                     '<label>साबिक गा.पा/न.पा<span style="color:red">*</span></label>'+
                     '<select name="old_gapa_napa[]" class="from-control dd_select oldaddress" id="oldwardaddress" required><option value="">छान्नुहोस्</option>+<?php if(!empty($oldwardaddress)) :foreach ($oldwardaddress as $key => $oa) : ?><option value="<?php echo  $oa["old_name"]?>"><?php echo  $oa["old_name"]?></option><?php endforeach; endif;?></select>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>साबिक वडा नं<span style="color:red">*</span></label>'+
                        '<select name="old_ward[]" class="from-control dd_select oldward" id="old_ward" required><option value="">छान्नुहोस्</option><?php if(!empty($wardadrress)) :foreach ($wardadrress as $key => $ow) : ?><option value="<?php echo  $ow["old_ward"]?>"><?php echo $ow["old_ward"]?></option><?php endforeach; endif;?></select>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>हाल गा.पा/न.पा<span style="color:red">*</span></label>'+
                        '<input type="text" name="present_gapa_napa[]" value="" class=" form-control present_name" readonly="readonly">'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>हाल वडा नं<span style="color:red">*</span></label>'+
                        '<input type="text" name="present_ward[]" value="" class=" form-control present_ward" readonly="readonly">'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>सडकको नाम<span style="color:red">*</span></label>'+
                        '<select name="road_name[]" class="from-control dd_select road_details" id="road_details" required></select>'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>जग्गाको क्षेत्रगत किसिम<span style="color:red">*</span></label>'+
                        '<select name="land_area_type[]" class="from-control dd_select land_area_type" id="land_area_type" required><option value="">छान्नुहोस्</option><?php  if(!empty($areatype)) :foreach ($areatype as $key => $at) : ?> <option value="<?php echo  $at['id']?>" <?php if($at['id'] == 4){ echo 'selected';}?>><?php echo $at['land_area_type']?> </option><?php endforeach; endif;?></select>'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>नक्सा  नं<span style="color:red">*</span></label>'+
                        '<input type="text" name="nn_number[]" value="" class=" form-control nn_number">'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>कित्ता  नं<span style="color:red">*</span></label>'+
                        '<input type="text" name="k_number[]" value="" class=" form-control k_number" required="">'+
                        '<div id="num_err"></div>'+
                    '</div>'+
                '</div>'+
                                              
                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>रोपनी<span style="color:red">*</span></label>'+
                        '<input type="text" name="a_ropani[]" value="" class=" form-control ropani number_field">'+
                        '<div class="r_sqft"></div>'+
                        '<div id="num_err"></div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>आना<span style="color:red">*</span></label>'+
                        '<input type="text" name="a_ana[]" value="" class=" form-control aana number_field">'+
                        '<div class="a_sqft"></div>'+
                        '<div id="num_err"></div>'+
                        
                    '</div>'+
                '</div>'+

                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>पैसा<span style="color:red">*</span></label>'+
                        '<input type="text" name="a_paisa[]" value="" class=" form-control paisa number_field">'+
                        '<div class="p_sqft"></div>'+
                        '<div id="num_err"></div>'+
                        
                    '</div>'+
                '</div>'+

                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>दाम<span style="color:red">*</span></label>'+
                        '<input type="text" name="a_dam[]" value="" class=" form-control dam decimal_field">'+
                        '<div class="d_sqft"></div>'+
                       
                    '</div>'+
                '</div>'+

                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>क्षेत्रफल (meter sqft)<span style="color:red">*</span></label>'+
                        '<input type="text" name="total_meter_square[]" value="" class=" form-control meter_sqft decimal_field">'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>क्षेत्रफल (sqft)<span style="color:red">*</span></label>'+
                        '<input type="text" name="total_square_feet[]" value="" class=" form-control total_sqft" readonly="readonly">'+
                    '</div>'+
                '</div>'+
                '<input type="hidden" name="a_unit" value="1">'+
                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>न्युनतम मुल्य(प्र रो)<span style="color:red">*</span></label>'+
                        '<input type="text" name="min_land_rate[]" value="" class=" form-control min_rate" readonly="readonly">'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>अधिक्तम मुल्य(प्र रो)<span  style="color:red">*</span></label>'+
                        '<input type="text" name="max_land_rate[]" value="" class=" form-control max_rate" readonly="readonly">'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>कबुल गरेको मुल्य(प्र रो)<span style="color:red">*</span></label>'+
                        '<input type="text" name="k_land_rate[]" value="" class=" form-control kubul_rate decimal_field">'+
                    '</div>'+
                '</div>'+

                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        '<label>कर लाग्ने मुल्य<span style="color:red">*</span></label>'+
                        '<input type="text" name="t_rate[]" value="" class=" form-control tax_amount">'+
                    '</div>'+
                '</div>'+
            '</div>'+
             '<div class="col-md-1 pull-right">'+
                  '<div class="form-group">'+
                    '<button type="button" class="btn btn-danger btn-sm remove-row" data-id = "'+trOneNew+'">हटाउनुहोस्</button>'+
                  '</div>'+
                '</div>'+
              '</div>'+
              
            '</td></tr>';
          
      $("#add_new_fields").append(new_row);
      $('.dd_select').select2();
     
    });

    $("body").on("click",".remove-row", function(e){
        e.preventDefault();
        var id = $(this).data('id');
        if (confirm('के तपाइँ  यसलाई हटाउन निश्चित हुनुहुन्छ ?')) {
          var trOneNew = $('.nagadi_rasid_frm').length;
          $(this).parent().parent().parent().remove();
        }
    });

    $('.dd_select').select2();
    
    $(document).on('change', '.oldward', function() {
        var obj = $(this);
        var gapana = obj.closest("tr").find('.oldaddress').val();
        var ward = obj.closest("tr").find('.oldward').val();
        $.ajax({
            method: "POST",
            url: base_url + "LandDetails/getNewAddress",
            data: {
                gapana: gapana,
                ward: ward,
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
            },
            success: function(resp) {
                if (resp.status == 'success') {
                    if (resp.data == null) {
                        obj.closest("tr").find(".present_name").val(gapana);
                        obj.closest("tr").find(".present_ward").val(ward);
                        obj.closest("tr").find('.notification').html(
                            '<div class="alert alert-danger">हालको विवरण राखिएको छैन</div>'
                        )
                    } else {
                        obj.closest("tr").find(".present_name").val(resp.data.present_name);
                        obj.closest("tr").find(".present_ward").val(resp.data.present_ward);
                        obj.closest("tr").find(".road_details").html(resp.road_option);
                        obj.closest("tr").find('.notification').empty();
                    }
                }
            }
        });
    });


    $(document).on('change', '.oldaddress', function() {
        var obj = $(this);
        var gapana = obj.closest("tr").find('.oldaddress').val();
        $.ajax({
            method: "POST",
            url: base_url + "LandDetails/getNewWard",
            data: {
                gapana: gapana,

                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
            },
            success: function(resp) {
                if (resp.status == 'success') {
                        obj.closest("tr").find(".oldward").html(resp.wards);
                        obj.closest("tr").find('.present_name').val('');
                        obj.closest("tr").find('.present_ward').val('');
                        obj.closest("tr").find('.notification').empty();
                }
            }
        });

    });


    // $(document).on('change', '.road_details', function() {

    //     var obj = $(this);

    //     var land_area_type = obj.closest("tr").find('.land_area_type').val();

    //     var road_name = obj.closest("tr").find('.road_details').val();

    //     var present_ward = obj.closest("tr").find('.present_ward').val();

    //     $.ajax({
    //         method: "POST",
    //         url: base_url + "LandDetails/getLandAreaCost",
    //         data: {
    //             land_area_type: land_area_type,
    //             road_name: road_name,
    //             present_ward:present_ward,
    //             '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',
    //         },
    //         success: function(resp) {

    //             console.log(resp);

    //             if (resp.status == 'success') {

    //                 if (resp.data == null) {
    //                     obj.closest("tr").find('.min_rate').val(0.00);
    //                     obj.closest("tr").find('.max_rate').val(0.00);
    //                     obj.closest("tr").find('.kubul_rate').val(0.00);
    //                     obj.closest("tr").find('.tax_amount').val(0.00);

    //                 } else {
    //                     obj.closest("tr").find('.min_rate').val(resp.data.minimal_cost);
    //                     obj.closest("tr").find('.max_rate').val(resp.data.maximum_cost);
    //                     obj.closest("tr").find('.kubul_rate').val(resp.data.minimal_cost);
    //                     //-------------------------------------------------//

    //                     var kubul_rate = resp.data.minimal_cost;

    //                     var ropani = obj.closest("tr").find('.ropani').val();

    //                     var aana = obj.closest("tr").find('.aana').val();

    //                     var paisa = obj.closest("tr").find('.paisa').val();

    //                     var dam = obj.closest("tr").find('.dam').val();

    //                     var ropani_amount = ropani * kubul_rate;

    //                     var aana_rate = aana / 16;

    //                     var paisa_rate = paisa / 64;

    //                     var dam_rate = dam / 256;

    //                     var aana_amount = aana_rate * kubul_rate;

    //                     var paisa_amount = paisa_rate * kubul_rate;

    //                     var dam_amount = dam_rate * kubul_rate

    //                     var total_amount = ropani_amount + aana_amount + paisa_amount + dam_amount;

    //                     obj.closest("tr").find('.tax_amount').val(resp.tax_amount);

    //                 }



    //             }

    //         }

    //     });

    // });

    $(document).on('change', '.road_details, .land_area_type', function() {

		var obj = $(this);

		var land_area_type = obj.closest("tr").find('.land_area_type').val();

		var road_name = obj.closest("tr").find('.road_details').val();

        var present_ward = obj.closest("tr").find('.present_ward').val();

		$.ajax({

			method: "POST",

			url: base_url + "LandDetails/getLandAreaCost",

			data: {

				land_area_type: land_area_type,

				road_name: road_name,

                present_ward:present_ward,

                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>',

			},

			success: function(resp) {

                console.log(resp);

				if (resp.status == 'success') {

					if (resp.data == null) {

						obj.closest("tr").find('.min_rate').val(0.00);

						obj.closest("tr").find('.max_rate').val(0.00);

                        obj.closest("tr").find('.kubul_rate').val(0.00);

                        obj.closest("tr").find('.tax_amount').val(0.00);

					} else {

						obj.closest("tr").find('.min_rate').val(resp.data.minimal_cost);

						obj.closest("tr").find('.max_rate').val(resp.data.maximum_cost);

                        obj.closest("tr").find('.kubul_rate').val(resp.tax_amount);

                        //-------------------------------------------------//

                        var kubul_rate = resp.data.minimal_cost;

                        //console.log(kubul_rate);

                        var ropani = obj.closest("tr").find('.ropani').val();

                        var aana = obj.closest("tr").find('.aana').val();

                        var paisa = obj.closest("tr").find('.paisa').val();

                        var dam = obj.closest("tr").find('.dam').val();

                        var ropani_amount = ropani * kubul_rate;

                        var aana_rate = aana / 16;

                        var paisa_rate = paisa / 64;

                        var dam_rate = dam / 256;

                        var aana_amount = aana_rate * kubul_rate;

                        var paisa_amount = paisa_rate * kubul_rate;

                        var dam_amount = dam_rate * kubul_rate

                        var total_amount = ropani_amount + aana_amount + paisa_amount + dam_amount;

                        obj.closest("tr").find('.tax_amount').val(total_amount.toFixed());

					}



				}

			}

		});

	});
	
	
	$(document).on('input', '.ropani, .aana, .paisa, .dam', function() {

		obj = $(this);

		// var ropani = obj.val();

		//----------------------calculation-------------//

		var one_ropani = "5476";

		var one_aana = "342.25";

		var one_paisa = "85.56";

		var one_dam = "21.39";

		//var total_sq = $('.total_sqft').val();

		var ropani = obj.closest("tr").find('.ropani').val();

		var aana = obj.closest("tr").find('.aana').val();

		var paisa = obj.closest("tr").find('.paisa').val();

		var dam = obj.closest("tr").find('.dam').val();

		if (aana > 15) {

			alert('आना १५ भन्दा बढि हुन सक्दैन');

		obj.closest("tr").find('.aana').val(0);

			aana = 0;

		}

		if (paisa > 3.9) {

			alert('पैसा ३.९ भन्दा बढि हुन सक्दैन');

			obj.closest("tr").find('.paisa').val(0);

			paisa = 0;

		}

		if (dam > 3.9) {

			alert('दाम ३.९  भन्दा बढि हुन सक्दैन');

			obj.closest("tr").find('.dam').val(0);

			dam = 0;

		}

		var total_ropani_sqft = ropani * one_ropani;

		var total_aana_sqft = aana * one_aana;

		var total_paisa_sqft = paisa * one_paisa;

		var total_dam_sqft = dam * one_dam;

		obj.closest("tr").find('.r_sqft').html('<span class="label label-success">' + total_ropani_sqft +

			' sqft </span>');

		obj.closest("tr").find('.a_sqft').html('<span class="label label-success">' + total_aana_sqft + ' sqft </span>');

		obj.closest("tr").find('.p_sqft').html('<span class="label label-success">' + total_paisa_sqft + ' sqft </span>');

		obj.closest("tr").find('.d_sqft').html('<span class="label label-success">' + total_dam_sqft + ' sqft </span>');

		var total_cal_sqlfeet = total_ropani_sqft + total_aana_sqft + total_paisa_sqft + total_dam_sqft

		obj.closest("tr").find('.total_sqft').val(total_cal_sqlfeet.toFixed(2));



        //-------------------------------------------------//

        var kubul_rate = obj.closest("tr").find('.kubul_rate').val();

        var ropani = obj.closest("tr").find('.ropani').val();

        var aana = obj.closest("tr").find('.aana').val();

        var paisa = obj.closest("tr").find('.paisa').val();

        var dam = obj.closest("tr").find('.dam').val();

        var ropani_amount = ropani * kubul_rate;

        var aana_rate = aana / 16;

        var paisa_rate = paisa / 64;

        var dam_rate = dam / 256;

        var aana_amount = aana_rate * kubul_rate;

        var paisa_amount = paisa_rate * kubul_rate;

        var dam_amount = dam_rate * kubul_rate

        var total_amount = ropani_amount + aana_amount + paisa_amount + dam_amount;

        obj.closest("tr").find('.tax_amount').val(total_amount.toFixed()); 



	});



	$(document).on('input', '.total_sqft', function() {

		obj = $(this);

		r = 0;

		var total_value = obj.val();

		var one_ropani = 5476;

		var one_aana = 342.25;

		var one_paisa = 85.56;

		var one_dam = 21.39;

		//-----------------------------------------

		var r = total_value - one_ropani;

		var ropani = total_value / one_ropani;

		var a = Math.trunc(ropani);

		var b = a * one_ropani;

		var c = total_value - b;

		var aana = c / one_aana;

		//--------------------------------------------

		var total_aana = Math.trunc(aana);

		var rem_sqft_after_aana = total_aana * one_aana;

		var d = c - rem_sqft_after_aana;

		var t_paisa = d / one_paisa;

		//----------------------------------------

		var t_paisa_p = Math.trunc(t_paisa);

		var rem_t_paisa = t_paisa_p * one_paisa;

		var e = d - rem_t_paisa;

		var t_dam = e / one_dam;



		obj.closest("tr").find('.ropani').val(a);

		//--------------------------

		obj.closest("tr").find('.aana').val(total_aana);

		obj.closest("tr").find('.paisa').val(Math.trunc(t_paisa));

		obj.closest("tr").find('.dam').val(t_dam.toFixed(0));





        // -------------------------calculate total rate

        //---------------------------------------------

        var kubul_rate = obj.closest("tr").find('.kubul_rate').val();

        var ropani = obj.closest("tr").find('.ropani').val();

        var aana = obj.closest("tr").find('.aana').val();

        var paisa = obj.closest("tr").find('.paisa').val();

        var dam = obj.closest("tr").find('.dam').val();

        var ropani_amount = ropani * kubul_rate;

        var aana_rate = aana / 16;

        var paisa_rate = paisa / 64;

        var dam_rate = dam / 256;

        var aana_amount = aana_rate * kubul_rate;

        var paisa_amount = paisa_rate * kubul_rate;

        var dam_amount = dam_rate * kubul_rate

        var total_amount = ropani_amount + aana_amount + paisa_amount + dam_amount;

        obj.closest("tr").find('.tax_amount').val(total_amount.toFixed()); 



        // var aana_amount = aana_rate * kubul_rate;

        // var paisa_amount = paisa_rate * kubul_rate;

        // var dam_amount = dam_rate * kubul_rate

        // var total_amount = ropani_amount + aana_amount + paisa_amount + dam_amount;

        // $('.tax_amount').val(total_amount.toFixed(2)); 

      



	});



    $(document).on('input', '.meter_sqft', function() {

        obj = $(this);

        r = 0;

        var meter_square = obj.val();

        // alert(meter_square);

        var meter_to_sqft = meter_square * 10.76391204;

        obj.closest("tr").find('.total_sqft').val(meter_to_sqft.toFixed(2));

        var total_value = meter_to_sqft;

        var one_ropani = 5476;



        var one_aana = 342.25;

        var one_paisa = 85.56;

        var one_dam = 21.39;

        //-----------------------------------------

        var r = total_value - one_ropani;

        var ropani = total_value / one_ropani;

        var a = Math.trunc(ropani);

        var b = a * one_ropani;

        var c = total_value - b;

        var aana = c / one_aana;

        //--------------------------------------------

        var total_aana = Math.trunc(aana);

        var rem_sqft_after_aana = total_aana * one_aana;

        var d = c - rem_sqft_after_aana;

        var t_paisa = d / one_paisa;

        //----------------------------------------

        var t_paisa_p = Math.trunc(t_paisa);

        var rem_t_paisa = t_paisa_p * one_paisa;

        var e = d - rem_t_paisa;

        var t_dam = e / one_dam;



        obj.closest("tr").find('.ropani').val(a);

        //--------------------------

        obj.closest("tr").find('.aana').val(total_aana);

        obj.closest("tr").find('.paisa').val(Math.trunc(t_paisa));

        obj.closest("tr").find('.dam').val(t_dam.toFixed(0));





        // -------------------------calculate total rate

        //---------------------------------------------

        var kubul_rate = obj.closest("tr").find('.kubul_rate').val();

        var ropani = obj.closest("tr").find('.ropani').val();

        var aana = obj.closest("tr").find('.aana').val();

        var paisa = obj.closest("tr").find('.paisa').val();

        var dam = obj.closest("tr").find('.dam').val();

        var ropani_amount = ropani * kubul_rate;

        var aana_rate = aana / 16;

        var paisa_rate = paisa / 64;

        var dam_rate = dam / 256;

        var aana_amount = aana_rate * kubul_rate;

        var paisa_amount = paisa_rate * kubul_rate;

        var dam_amount = dam_rate * kubul_rate

        var total_amount = ropani_amount + aana_amount + paisa_amount + dam_amount;

        obj.closest("tr").find('.tax_amount').val(total_amount.toFixed(2)); 



    });





	$(document).on('input', '.kubul_rate', function() {

		var obj = obj.closest("tr").find(this);

		var kubul_rate = obj.val();

		var ropani = obj.closest("tr").find('.ropani').val();

		var aana = obj.closest("tr").find('.aana').val();

		var paisa = obj.closest("tr").find('.paisa').val();

		var dam = obj.closest("tr").find('.dam').val();

		var ropani_amount = ropani * kubul_rate;

		var aana_rate = aana / 16;

		var paisa_rate = paisa / 64;

		var dam_rate = dam / 256;

		var aana_amount = aana_rate * kubul_rate;

		var paisa_amount = paisa_rate * kubul_rate;

		var dam_amount = dam_rate * kubul_rate

		var total_amount = ropani_amount + aana_amount + paisa_amount + dam_amount;

		obj.closest("tr").find('.tax_amount').val(total_amount.toFixed());

	});

});

</script>

