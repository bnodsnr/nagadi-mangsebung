<style type="text/css">
.select2-container--default .select2-selection--single {
    height: 36px;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    line-height: 37px;
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
                            अभिलेख</a></li>
                           <li class="breadcrumb-item"><a
                        href="<?php echo base_url()?>SanrachanaDetails/veiwDetails/<?php echo $lo_details['file_no']?>">
                        भोतिक संरचनाको विवरण </a></li>
                    <li class="breadcrumb-item"><a href="javascript:;">
                      विवरण सम्पादन गर्नुहोस्  </a></li>
                
            </ol>
        </nav>
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <form action="<?php echo base_url()?>SanrachanaDetails/Update" method="post" class="save_post">
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <section class="card">
                        <header class="card-header" style="background: #1b5693;color:#FFF">
                            भोतिक संरचनाको विवरण : जग्गाधनी - <?php echo $lo_details['land_owner_name_np']?> /
                            जग्गाधनिको क्र.स नम्बर :<?php echo $lo_details['file_no']?>
                        </header>
                        <div class="card-body">
                            <div class="notification"></div>
                             <div class="valid_errors"></div>
                            <div class="row">
                                <input type="hidden" value="<?php echo $row['id']?>" name ="id">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="hidden" name="ls_file_no"
                                            value="<?php echo $lo_details['file_no']?>">
                                        <label>संरचना रहेको कि.नं<span style="color:red">*</span></label>
                                        <select name="k_no" class="from-control dd_select" id="k_no" required>
                                          
                                            <?php 
                                    if(!empty($landDescription)) :
                                    foreach ($landDescription as $key => $ld) : ?>
                                            <option value="<?php echo  $ld['k_number']?>" <?php if($row['k_no'] == $ld['k_number']){echo 'selected';}?>><?php echo  $ld['k_number']?>
                                            </option>
                                            <?php endforeach; endif;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>संरचना रहेको जग्गाको क्षेत्रफल(रोपनी)<span
                                                style="color:red">*</span></label>
                                        <input type="text" name="toal_land_area" value="<?php echo $row['toal_land_area']?>" class=" form-control"
                                            id="land_area_ropani" readonly="readonly">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label> क्षेत्रफल(वर्गफुट)<span style="color:red">*</span></label>
                                        <input type="text" name="total_land_area_sqft" value="<?php echo $row['total_land_area_sqft']?>" class=" form-control"
                                            id="land_area_sqft" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> जग्गाको कबुल गरेको मूल्य(<?php if(CALC == 1){ echo 'प्रति रोपनी';} else { echo 'प्रति रोपनी';}?>)<span
                                                style="color:red">*</span></label>
                                        <input type="text" name="total_land_min_amount" value="<?php echo $row['total_land_min_amount']?>"
                                            class=" form-control total_land_amount" readonly="readonly">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label> जग्गाको कर लाग्ने मुल्य <span style="color:red">*</span></label>
                                        <input type="text" name="total_land_tax_amount" value="<?php echo $row['total_land_min_amount']?>"
                                            class=" form-control total_land_tax_amount" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>संरचना रहेको न.नं<span style="color:red">*</span></label>
                                        <input type="text" name="sanrachana_n_no" class="form-control" id="n_no"
                                            required readonly="readonly" value="<?php echo $row['sanrachana_n_no']?>">
                                        <!-- <select name="n_no" class="from-control dd_select" id="n_no" required>
                                            <option value="">छान्नुहोस्</option>
                                            <?php 
                                                if(!empty($landDescription)) :
                                                foreach ($landDescription as $key => $ld) : ?>
                                                <option value="<?php echo  $ld['nn_number']?>">
                                                <?php echo  $ld['nn_number']?></option>
                                            <?php endforeach; endif;?>
                                        </select> --> 
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>संरचनाको प्रकार<span style="color:red">*</span></label>
                                        <select name="sanrachana_prakar" class="from-control dd_select land_sa_type"
                                            id="land_sa_type" required>
                                            <option value="">छान्नुहोस्</option>
                                            <?php 
                                                if(!empty($architecttype)) :
                                                foreach ($architecttype as $key => $at) : ?>
                                                <option value="<?php echo  $at['id']?>" <?php if($row['sanrachana_prakar'] == $at['id']){echo 'selected';}?>><?php echo $at['architect_type']?></option>
                                            <?php endforeach; endif;?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>संरचनाको बनौटको किसिम<span style="color:red">*</span></label>
                                        <select name="sanrachana_banot_kisim"
                                            class="from-control dd_select land_area_type" id="land_area_type" required>
                                            <option value="">छान्नुहोस्</option>
                                            <?php 
                                            if(!empty($architectstructure)) :
                                                foreach ($architectstructure as $key => $as) : 
                                            ?>
                                            <option value="<?php echo  $as['id']?>" <?php if($row['sanrachana_banot_kisim'] == $as['id']){ echo 'selected';}?>><?php echo $as['structure_type']?>
                                            </option>
                                            <?php endforeach; endif;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>संरचनाको प्रयोगको किसिम<span style="color:red">*</span></label>
                                        <select name="sanrachana_usages" class="from-control dd_select " id="land_usage"
                                            required>
                                         
                                            	<option value="निजी <?php if($row['sanrachana_usages']=='निजी'){echo 'selected';}?>">निजी</option>
											<option value="भाडा" <?php if($row['sanrachana_usages']=='भाडा'){echo 'selected';}?>>भाडा</option>
											<option value="अन्य" <?php if($row['sanrachana_usages']=='अन्य'){echo 'selected';}?>>अन्य</option>
                                           
                                        </select>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>संरचनाको तला<span style="color:red">*</span></label><br>
                                        <select name="sanrachana_floor" class="form-control dd_select floor" id=""
                                            required="">
                                            <option value="1" <?php if($row['sanrachana_floor'] == 1) {
                                                echo 'selected';
                                            }?>>1</option>
                                            <option value="1.5" <?php if($row['sanrachana_floor'] == 1.5) {
                                                echo 'selected';
                                            }?>>1.5</option>
                                            <option value="2" <?php if($row['sanrachana_floor'] == 2) {
                                                echo 'selected';
                                            }?>>2</option>
                                            <option value="2.5" <?php if($row['sanrachana_floor'] == 2.5) {
                                                echo 'selected';
                                            }?>>2.5</option>
                                            <option value="3" <?php if($row['sanrachana_floor'] == 3) {
                                                echo 'selected';
                                            }?>>3</option>
                                            <option value="3.5" <?php if($row['sanrachana_floor'] == 3.5) {
                                                echo 'selected';
                                            }?>>3.5</option>
                                            <option value="4" <?php if($row['sanrachana_floor'] == 4) {
                                                echo 'selected';
                                            }?>>4</option>
                                            <option value="4.5" <?php if($row['sanrachana_floor'] == 4.5) {
                                                echo 'selected';
                                            }?>>4.5</option>
                                            <option value="5" <?php if($row['sanrachana_floor'] == 5) {
                                                echo 'selected';
                                            }?>>5</option>
                                            <option value="5.5" <?php if($row['sanrachana_floor'] == 5.5) {
                                                echo 'selected';
                                            }?>>5.5</option>
                                            <option value="6" <?php if($row['sanrachana_floor'] == 6) {
                                                echo 'selected';
                                            }?>>6</option>
                                            <option value="6.5" <?php if($row['sanrachana_floor'] == 6.5) {
                                                echo 'selected';
                                            }?>>6.5</option>
                                            <option value="7" <?php if($row['sanrachana_floor'] == 7) {
                                                echo 'selected';
                                            }?>>7</option>
                                            <option value="7.5" <?php if($row['sanrachana_floor'] == 7.5) {
                                                echo 'selected';
                                            }?>>7.5</option>
                                            <option value="8" <?php if($row['sanrachana_floor'] == 8 ){
                                                echo 'selected';
                                            }?>>8</option>
                                            <option value="8.5" <?php if($row['sanrachana_floor'] == 8.5) {
                                                echo 'selected';
                                            }?>>8.5</option>
                                            <option value="9" <?php if($row['sanrachana_floor'] == 9) {
                                                echo 'selected';
                                            }?>>9</option>
                                            <option value="9.5" <?php if($row['sanrachana_floor'] == 9.5) {
                                                echo 'selected';
                                            }?>>9.5</option>
                                            <option value="10" <?php if($row['sanrachana_floor'] == 10) {
                                                echo 'selected';
                                            }?>>10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <hr>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>प्लिन्थलेभलको संरचनाको लम्बाई<span style="color:red">*</span></label>
                                        <input type="text" name="sanrachana_ground_lenth" value="<?php echo $row['sanrachana_ground_lenth']?>" class=" form-control decimal_field" id="length" >
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>प्लिन्थलेभलको संरचनाको चौडाई<span style="color:red">*</span></label>
                                        <input type="text" name="sanrachana_ground_width" value="<?php echo $row['sanrachana_ground_width']?>" class=" form- decimal_field"
                                            id="width">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>प्लिन्थलेभलको क्षेत्रफल वर्गफुट<span style="color:red">*</span></label>
                                        <input type="text" name="sanrachana_ground_area_sqft" value="<?php echo $row['sanrachana_ground_area_sqft']?>"
                                            class=" form-control" id="area_sqft">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>संरचनाको क्षेत्रफल जम्मा वर्गफुट<span style="color:red">*</span></label>
                                        <input type="text" name="sanrachana_ground_housing_area_sqft" value="<?php echo $row['sanrachana_ground_housing_area_sqft']?>"
                                            class=" form-control" id="area_sqft_g" readonly="readonly">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>बनेको साल<span style="color:red">*</span></label>
                                        <select name="contructed_year" class="from-control dd_select year"
                                            id="constructed_year" required>
                                            <option value="">छान्नुहोस्</option>
                                            <?php 
                                            if(!empty($year)) :
                                                foreach ($year as $key => $year) : 
                                            ?>
                                            <option value="<?php echo  $year['name']?>" <?php if($row['contructed_year'] == $year['name']){echo 'selected';}?>><?php echo $year['name']?>
                                            </option>
                                            <?php endforeach; endif;?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> संरचनाको ह्रासकट्टी प्रतिशत <span style="color:red">*</span></label>
                                        <input type="text" name="sanrachana_dep_rate" value="<?php echo $row['sanrachana_dep_rate']?>"
                                            class=" form-control dep_rate" readonly>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> संरचनाको तोकिएको न्युनतम मुल्य <span style="color:red">*</span></label>
                                        <input type="text" name="sanrachana_min_amount" value="<?php echo $row['sanrachana_min_amount']?>"
                                            class=" form-control structure_min_amount" readonly="readonly">
                                    </div>
                                </div>
                                <!-- <div class="col-md-3">
                                    <div class="form-group">
                                        <label> संरचनाको तोकिएको अधिक्तम मुल्य <span style="color:red">*</span></label>
                                        <input type="text" name="structure_max_amount" value=""
                                            class=" form-control structure_max_amount" readonly="readonly">
                                    </div>
                                </div> -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> संरचनाको कवोल गरेको कुल मुल्य <span style="color:red">*</span></label>
                                        <input type="text" name="sanrachana_kubul_amount" value="<?php echo $row['sanrachana_kubul_amount']?>"
                                            class=" form-control min_fixed_rate">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <hr>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>संरचनाको खुद कायम मुल्य <span style="color:red">*</span></label>
                                        <input type="text" name="sanrachana_khud_amount" value="<?php echo $row['sanrachana_khud_amount']?>"
                                            class=" form-control khud_rate" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>प्लिन्थलेभलको क्षेत्रफल(रोपनी)<span style="color:red">*</span></label>
                                        <input type="text" name="sanrachana_ground_area_ropani" value="<?php echo $row['sanrachana_ground_area_ropani']?>"
                                            class=" form-control" id="area_sqft_ropani" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>चर्चेकाे जग्गाको क्षेत्रफल<span style="color:red">*</span></label>
                                        <input type="text" name="charcheko_area" value="<?php echo $row['sanrachana_ground_area_sqft']?>"
                                            class="form-control charcheko_area" readonly>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>संरचनाले चर्चेकाे जग्गाको कर लाग्ने मुल्य<span
                                                style="color:red">*</span></label>
                                        <input type="text" name="sanrachana_land_tax_amount" value="<?php echo $row['sanrachana_land_tax_amount']?>"
                                            class="form-control sanrachna_ck_land" readonly>

                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> सम्पति मूल्याङ्कन जम्मा मुल्य <span style="color:red">*</span></label>
                                        <input type="text" name="net_tax_amount" value="<?php echo $row['net_tax_amount']?>"
                                            class=" form-control net_total_amount" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> चर्चेकाे बाहेक भूमिकर  जग्गाको क्षेत्रफल <span
                                                style="color:red">*</span></label>
                                        <input type="text" name="bhumi_kar_area" value="<?php echo $row['r_bhumi_area']?>"
                                            class=" form-control bhumi_kar_area" readonly>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> चर्चेकाे बाहेक जग्गाको भूमिकर मूल्याङ्कन <span
                                                style="color:red">*</span></label>
                                        <input type="text" name="bhumi_kar_amount" value="<?php echo $row['r_bhumi_kar']?>"
                                            class=" form-control bhumi_kar_amount" readonly>
                                    </div>
                                </div>



                                <div class="col-md-12 text-center">
                                    <hr>
                                    <button class="btn btn-primary btn-xs save_btn" data-toggle="tooltip"
                                        title=" सेभ  गर्नुहोस्" name="Submit" type="submit" value="Save"> सेभ
                                        गर्नुहोस्</button>
                                    <a href="<?php echo base_url()?>Profile" class="btn btn-danger btn-xs"
                                        data-toggle="tooltip" title="सम्पादन गर्नुहोस्">रद्द गर्नुहोस्</a>
                                </div>
                            </div>
                            <!--row-->
                        </div>
                        <!--cardbody-->
                    </section>
                </form>
            </div>
        </div>
    </section>
</section>
<script type="text/javascript" src="<?php echo base_url()?>assets/assets/select2/js/select2.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.dd_select').select2();
    $(document).on('change', '#k_no', function() {
        var obj = $(this);
        var k_no = obj.val();
            var file_no = $('#file_no').val();
           
        $.ajax({
            method: "POST",
            url: base_url + "SanrachanaDetails/getLandDescriptionByKNo",
            data: {
            k_no: k_no, file_no:file_no,
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            success: function(resp) {
                if (resp.status == 'success') {
                    if (resp.data == null) {
                        $(".total_land_amount").val('');
                    } else {
                        $(".total_land_amount").val(resp.data.k_land_rate);
                        $(".total_land_tax_amount").val(resp.data.t_rate);
                        $('#land_area_sqft').val(resp.data.total_square_feet);
                        var ropani_value = resp.data.a_ropani + '-' + resp.data.a_ana +
                            '-' + resp.data.a_paisa + '-' + resp.data.a_dam;
                        $('#land_area_ropani').val(ropani_value);
                        $('#n_no').val(resp.data.nn_number);
                    }
                }
            }
        });
    });

    $(document).on('change', '.land_area_type, .land_sa_type', function() {
        var obj = $(this);
        var land_area_type = $('.land_area_type').val();
        var structure_type = $('.land_sa_type').val();
        $.ajax({
            method: "POST",
            url: base_url + "SanrachanaDetails/getMinStructureAmount",
            data: {
                land_area_type: land_area_type,
                structure_type: structure_type,
                '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            success: function(resp) {
                if (resp.status == 'success') {
                    if (resp.data == null) {
                        //alert('संरचनाको तोकिएको न्युनतम मुल्य राखिएको छैन');
                        $('.structure_min_amount').val(0);
                        $('.structure_max_amount').val(0);
                        $('.min_fixed_rate').val(0);
                        var min_fixed_rate = $('.min_fixed_rate').val();
                        var area_sqft_g = $('#area_sqft_g').val();
                        var total_sanrachana_area = area_sqft_g * min_fixed_rate;
                        $('.khud_rate').val(total_sanrachana_area);
                        $('.sanrachna_ck_land').val(0);
                    } else {
                        $('.structure_min_amount').val(resp.data.minimum_amount);
                        $('.structure_max_amount').val(0)
                        $('.min_fixed_rate').val(resp.data.minimum_amount);
                        var floor = $('.floor').val();
                        var area_sqft = $('#area_sqft').val();
                        var total_area = floor * area_sqft;
                        $('#area_sqft_g').val(total_area);
                        var area_sqft_g = $('#area_sqft_g').val();
                        //alert(area_sqft_g);
                        var min_fixed_rate = $('.min_fixed_rate').val();
                        var total_sanrachana_area = area_sqft_g * min_fixed_rate;
                        $('.khud_rate').val(total_sanrachana_area);

                        //sanrahana charcheko land calculation
                //      var ropani = area_sqft / 5476;
                //      var total_cherckeko_land_tax = ropani * min_fixed_rate * $(
                //          '.total_land_amount').val();
                //      $('.sanrachna_ck_land').val(total_cherckeko_land_tax);

                        //calculate sampati kar amount
                        var totalGharKoTax =  $('.khud_rate').val();
                        var toatalCharchekeTax = $('.sanrachna_ck_land').val();
                        var toatl_samptati_kar_amount = parseFloat(totalGharKoTax) + parseFloat(toatalCharchekeTax);
                        $('.net_total_amount').val(toatl_samptati_kar_amount.toFixed(2));
                    }
                }
            }
        });
    });

    $(document).on('input', '#length, #width', function() {
        var l = $('#length').val();
        var w = $('#width').val();
        var f = $('.floor').val();
        var total = l * w;
        var min_fixed_rate = $('.min_fixed_rate').val();
        $('#area_sqft').val(total);
        total_value = $('#area_sqft').val();
        var ropani_convetor = total_value / 5476;

        var total_sanrachana_area = total * f;
        $('#area_sqft_g').val(total_sanrachana_area);

        var total_sanrachana_rate = total_sanrachana_area * min_fixed_rate;
        $('.khud_rate').val(total_sanrachana_rate);
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
        var ropani_value = a + '-' + total_aana + '-' + Math.trunc(t_paisa) + '-' + t_dam.toFixed(0);
        $('#area_sqft_ropani').val(ropani_convetor);

        //calculate bhumi kar details

        // var ropani = total_value / 5476;
        // var total_cherckeko_land_tax = ropani * min_fixed_rate * $(
        //  '.total_land_amount').val();
        // $('.sanrachna_ck_land').val(total_cherckeko_land_tax)

        //-----------------------------------------------//
        var total_land_area = $('#land_area_sqft').val();
        var charcheko_area = $('.charcheko_area').val();
        var total_sanrachana_cover_area = total * 2;
        var total_sanrachana_diff = total_land_area - charcheko_area;
        if (total_sanrachana_cover_area <= total_land_area) {
            var total_charckeko_area = total_value * 2;
            var ropani_value = total_charckeko_area / 5476;
            var total_cherckeko_land_tax = ropani_value * $('.total_land_amount').val();
            $('.sanrachna_ck_land').val(total_cherckeko_land_tax.toFixed(2));
            $('.charcheko_area').val(total_charckeko_area);
            var bhumi_kar_convertor = total_sanrachana_diff / 5476;
            var total_bhu_kar = bhumi_kar_convertor * $('.total_land_amount').val();
            $('.bhumi_kar_area').val(total_sanrachana_diff);
            $('.bhumi_kar_amount').val(total_bhu_kar.toFixed(2));

        } else {
            var ropani_value = total_land_area / 5476;
            var total_cherckeko_land_tax = ropani_value * $('.total_land_amount').val();
            $('.sanrachna_ck_land').val(total_cherckeko_land_tax.toFixed(2));
            $('.charcheko_area').val(total_land_area);
            $('.bhumi_kar_amount').val(0);
            $('.bhumi_kar_area').val(0);
        }

        //calculate sampati kar amount
        var totalGharKoTax =  $('.khud_rate').val();
        var toatalCharchekeTax = $('.sanrachna_ck_land').val();
        var toatl_samptati_kar_amount = parseFloat(totalGharKoTax) + parseFloat(toatalCharchekeTax);
        $('.net_total_amount').val(toatl_samptati_kar_amount.toFixed(2));
    });

    $(document).on('change', '#constructed_year', function() {
        obj = $(this);
        var year = obj.val();
        var land_strucutre_type = $('.land_area_type').val();
        $.ajax({
            method: "POST",
            url: base_url + "SanrachanaDetails/getDepRate",
            data: {
                year: year,
                land_strucutre_type: land_strucutre_type,
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
            },
            success: function(resp) {
                console.log(resp.data);
                if (resp.status == 'success') {
                    if (resp.data == null) {
                        $('.dep_rate').val(0);
                    } else {
                        $('.dep_rate').val(resp.data.rate);
                        var rp = resp.data.rate / 100;
                        var min_fixed_rate = $('.min_fixed_rate').val();
                        var khud_rate = min_fixed_rate * rp;
                        var area_sqft_g = $('#area_sqft_g').val();
                        var floor = $('.floor').val();
                        var total = min_fixed_rate * area_sqft_g;
                        var total_khud_rate = total - khud_rate;
                        $('.khud_rate').val(total_khud_rate);
                    }
                }
            }
        });
    });


    $(document).on('input', '#area_sqft', function() {
        obj = $(this);
        r = 0;
        var total_value = obj.val();
        var land_min_amount = $('.total_land_amount').val();

        var l = $('#length').val('');
        var w = $('#width').val('');
        //-------------------------------------
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
        var ropani_value = a + '-' + total_aana + '-' + Math.trunc(t_paisa) + '-' + t_dam.toFixed(0);
        $('#area_sqft_ropani').val(ropani_value);
        var talla = $('.floor').val();
        var total_sar_area = talla * total_value;
        $('#area_sqft_g').val(total_sar_area);
        //get sanracha land amount
        var floor = $('.floor').val();
        var ropani_calculation = total_value / 5476;
        var total_land = ropani_calculation * 2;
        var total_land_tax = total_land * land_min_amount;
        //$('.sanrachna_ck_land').val(total_land_tax);
        var sanrachana_kubul_amount = $('.min_fixed_rate').val();
        var total_khud_rate = total_sar_area * sanrachana_kubul_amount;
        $('.khud_rate').val(total_khud_rate);
        var net_total = total_land_tax + total_khud_rate;
        $('.net_total_amount').val(net_total.toFixed(2));

        var total_land_area = $('#land_area_sqft').val();
        var total_jagga_less = total_value*2;
        //var total_land_area = $('#land_area_sqft').val();
        //var charcheko_area = $('.charcheko_area').val();
        
        var total_sanrachana_cover_area = total_value * 2;
        var total_sanrachana_diff = total_land_area - total_jagga_less;
       
        if (total_sanrachana_cover_area <= total_land_area) {
            var total_charckeko_area = total_value * 2;
            var ropani_value = total_charckeko_area / 5476;
            var total_cherckeko_land_tax = ropani_value * $('.total_land_amount').val();
            $('.sanrachna_ck_land').val(total_cherckeko_land_tax.toFixed(2));
            $('.charcheko_area').val(total_charckeko_area);
            var bhumi_kar_convertor = total_sanrachana_diff / 5476;
            var total_bhu_kar = bhumi_kar_convertor * $('.total_land_amount').val();
            $('.bhumi_kar_area').val(total_sanrachana_diff);
            $('.bhumi_kar_amount').val(total_bhu_kar.toFixed(2));

        } else {
            var ropani_value = total_land_area / 5476;
            var total_cherckeko_land_tax = ropani_value * $('.total_land_amount').val();
            $('.sanrachna_ck_land').val(total_cherckeko_land_tax.toFixed(2));
            $('.charcheko_area').val(total_land_area);
            $('.bhumi_kar_amount').val(0);
            $('.bhumi_kar_area').val(0);
        }

    });

    $(document).on('change', '.floor', function() {
        var floor = $(this).val();
        var unit = $('#area_sqft').val();
        var total = floor * unit;
        $('#area_sqft_g').val(total);
        var sanrachana_kubul_amount = $('.min_fixed_rate').val();
        var total_khud = total * sanrachana_kubul_amount;
        $('.khud_rate').val(total_khud);

        //calculate sampati kar amount
        var totalGharKoTax =  $('.khud_rate').val();
        var toatalCharchekeTax = $('.sanrachna_ck_land').val();
        var toatl_samptati_kar_amount = parseFloat(totalGharKoTax) + parseFloat(toatalCharchekeTax);
        $('.net_total_amount').val(toatl_samptati_kar_amount.toFixed(2));

    });

    $(document).on('input', '.min_fixed_rate', function() {
        obj = $(this);
        var min_land_rate = obj.val();
        var structure_min_amount = $('.structure_min_amount').val();
        if(min_land_rate < $(structure_min_amount)) {
            var kubul_rate = structure_min_amount;
        } else {
            var kubul_rate = min_land_rate;
        }
        var total_value = $('#area_sqft').val();
        if (min_land_rate < structure_min_amount) {
            $('.k_alert').text('तोकिएको मुल्य भन्दा काम हल्ना मिल्दैन');
            $('.save_button').attr('disabled', 'disabled');
            var area_sqft_g = $('#area_sqft_g').val();
            var total_land_tax_g = kubul_rate * area_sqft_g;
            $('.khud_rate').val(total_land_tax_g);
            var ropani = total_value / 5476;
            var total_cherckeko_land_tax = ropani * structure_min_amount * $(
                '.total_land_amount').val();
            $('.sanrachna_ck_land').val(total_cherckeko_land_tax)

            //calculate sampati kar amount
            var totalGharKoTax =  $('.khud_rate').val();
            var toatalCharchekeTax = $('.sanrachna_ck_land').val();
            var toatl_samptati_kar_amount = parseFloat(totalGharKoTax) + parseFloat(toatalCharchekeTax);
            $('.net_total_amount').val(toatl_samptati_kar_amount.toFixed(2));


        } else {
            $('.k_alert').text('');
            $('.save_button').prop("disabled", false); 
            var area_sqft_g = $('#area_sqft_g').val();
            var total_land_tax_g = kubul_rate * area_sqft_g;
            $('.khud_rate').val(total_land_tax_g);
            var ropani = area_sqft_g / 5476;
            var total_cherckeko_land_tax = ropani * min_land_rate * $(
                '.total_land_amount').val();
            $('.sanrachna_ck_land').val(total_cherckeko_land_tax);

            //calculate sampati kar amount
            var totalGharKoTax =  $('.khud_rate').val();
            var toatalCharchekeTax = $('.sanrachna_ck_land').val();
            var toatl_samptati_kar_amount = parseFloat(totalGharKoTax) + parseFloat(toatalCharchekeTax);
            $('.net_total_amount').val(toatl_samptati_kar_amount.toFixed(2));
        }

    });

});
</script>
