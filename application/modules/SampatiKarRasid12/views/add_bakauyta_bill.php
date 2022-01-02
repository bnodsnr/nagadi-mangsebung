  <!--main content start-->
 <section id="main-content">
    <section class="wrapper site-min-height">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url()?>"><i class="fa fa-home"></i>
                        गृहपृष्ठ</a></li>
            </ol>
        </nav>
        <!-- page start-->
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class ="table table-bordered">
                                <thead>
                                    <tr>
                                      <th rowspan="2">क्र.सं</th>
                                      <th colspan="6">जग्गाको विवरण</th>
                                      <th colspan="4">भौतिक संरचनाको विवरण</th>
                                      <th rowspan="2">जम्मा सम्पतीकर मूल्यांकन </th>
                                      <th colspan="2">भूमिकर मूल्यांकन</th>
                                      <th rowspan="2">सम्पतीकर</th>
                                      <th rowspan="2">भूमिकर</th>
                                    </tr>
                                    <tr>
                                      <th>साबिक गा.पा/न.पा</th>
                                      <th>वडा</th>
                                      <th>हालको वडा</th>
                                      <th>नक्सा नं</th>
                                      <th>कित्ता नं</th>
                                      <th>क्षेत्रफल(व फु )</th>

                                      <th>बनावटको किसिम</th>
                                      <th>प्रयोग</th>
                                      <th>प्रकार </th>
                                      <th>क्षेत्रफल(व फु )</th>

                                      <th>क्षेत्रफल(व फु )</th>
                                      <th>जग्गाको कयम मुल्य </th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $total_sam_kar = 0;
                                        $total_bhu_kar = 0;
                                        $i = 1;if(!empty($SanrachanaDetails)) { 
                                        
                                        foreach($SanrachanaDetails as $key => $sanrachana) { 
                                      ?>
                                      <tr>
                                        <td><?php echo $this->mylibrary->convertedcit($i++)?></td>
                                        <td><?php echo $this->mylibrary->convertedcit($land_details[0]['old_gapa_napa']) ?></td>
                                        <td><?php echo $this->mylibrary->convertedcit($land_details[0]['old_ward']) ?></td>
                                        <td><?php echo $this->mylibrary->convertedcit($land_details[0]['present_ward']) ?></td>
                                        <?php $land_by_k = $this->SampatiKarRasidModel->getNaxaNumber($sanrachana['k_no']); ?>
                                        <td><?php echo $land_by_k['nn_number']?></td>
                                        <td><?php echo $sanrachana['k_no'];?></td>
                                        <td><?php echo $land_by_k['total_square_feet'];?></td>
                                        <td><?php echo $sanrachana['st']?></td>
                                        <td><?php echo $sanrachana['sanrachana_usages']?></td>
                                        <td><?php echo $sanrachana['architect_type']?></td>
                                        <td><?php echo $this->mylibrary->convertedcit($sanrachana['sanrachana_ground_housing_area_sqft'])?></td>
                                        <td><?php echo $this->mylibrary->convertedcit($sanrachana['net_tax_amount'])?></td>
                                        <td><?php echo $this->mylibrary->convertedcit($sanrachana['r_bhumi_area'])?></td>
                                        <td><?php echo $this->mylibrary->convertedcit($sanrachana['r_bhumi_kar'])?></td>
                                        <?php 
                                           $total_sampati_kar_rate = $this->SampatiKarRasidModel->getSampatiKarAmount($sanrachana['net_tax_amount'], '2076/077');
                                            $t_bhumi_kar_rate = $this->SampatiKarRasidModel->getBhumiKarAmount($sanrachana['r_bhumi_kar'],'2076/077');
                                              ?>
                                        <td><?php echo $this->mylibrary->convertedcit($total_sampati_kar_rate['sampati_kar'])?></td>
                                        <td><?php echo $this->mylibrary->convertedcit($t_bhumi_kar_rate['bhumi_kar'])?></td>
                                      </tr>
                                       <?php
                                        if(!empty($total_sampati_kar_rate['sampati_kar'])){
                                          $total_sam_kar +=$total_sampati_kar_rate['sampati_kar'];
                                        }
                                        if(!empty($t_bhumi_kar_rate['bhumi_kar'])) {
                                          $total_bhu_kar +=$t_bhumi_kar_rate['bhumi_kar']; 
                                        }
                                      ?>

                                   <?php } } ?>

                                   <?php $total_sam_kar_without_building = 0;
                                        $total_bhu_kar_without_building = 0; 
                                        if(!empty($LandWithoutSanrachana)) { 
                                        
                                      foreach($LandWithoutSanrachana as $key => $land) { 
                                      ?>
                                      <tr>
                                        <td><?php echo $i++?></td>
                                       <td><?php echo $this->mylibrary->convertedcit($land['old_gapa_napa']) ?></td>
                                        <td><?php echo $this->mylibrary->convertedcit($land['old_ward']) ?></td>
                                        <td><?php echo $this->mylibrary->convertedcit($land['present_ward']) ?></td>
                                        <td><?php echo $this->mylibrary->convertedcit($land['nn_number']) ?></td>
                                        <td><?php echo $this->mylibrary->convertedcit($land['k_number']) ?></td>
                                        <td>
                                            <?php echo $land['a_ropani'].'-'.$land['a_ana'].'-'.$land['a_paisa'].'-'.$land['a_dam']; ?>
                                        </td>
                                        <td colspan="4"><div class="alert alert-danger">भौतिक संरचनाको विवरण बनेको छैन </div></td>
                                        
                                        <td><?php echo $this->mylibrary->convertedcit(0)?></td>
                                        <td><?php echo $this->mylibrary->convertedcit($land['total_square_feet'])?></td>
                                        <td><?php echo $this->mylibrary->convertedcit($land['t_rate'])?></td>
                                        <?php 
                                          //$total_sampati_kar_rate = $this->SampatiKarRasidModel->getSampatiKarAmount($sanrachana['net_tax_amount'], '2076/077');
                                          $t_bhumi_kar_rate_without_building = $this->SampatiKarRasidModel->getBhumiKarAmount($land['t_rate'],'2076/077');
                                        ?>
                                        <td><?php echo $this->mylibrary->convertedcit(0)?></td>
                                        <td><?php echo $this->mylibrary->convertedcit($t_bhumi_kar_rate_without_building['bhumi_kar'])?></td>
                                      </tr>
                                      <?php
                                        if(!empty($t_bhumi_kar_rate_without_building['bhumi_kar'])) {
                                          $total_bhu_kar_without_building +=$t_bhumi_kar_rate_without_building['bhumi_kar']; 
                                        } ?>
                                    <?php } } ?>
                                    <tr>
                                        <td colspan='14' align="right">जम्मा </td>
                                        <?php $total_bhumi_kar = $total_bhu_kar+ $total_bhu_kar_without_building?>
                                        <td><?php echo $this->mylibrary->convertedcit($total_sam_kar)?> </td>
                                        <td><?php echo $this->mylibrary->convertedcit($total_bhumi_kar)?></td>
                                    <tr>
                               </tbody>
                            </table>
                        </div>
                        <hr>
                        <form class="form" method="post" action="<?php echo base_url()?>SampatiKarRasid/saveBaAmount">
                            <table class="table" id='add_new_fields'>
                                <thead>
                                    <tr>
                                        <th>आर्थिक वर्ष</th>
                                        <th>एकिकृत कर लाग्ने मुल्य</th>
                                        <th>एकिकृत सम्पतिकर</th>
                                        <th><button type="button" class="btn btn-success btnAddNew">Add New</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="hidden" name="lo_file_no" value="<?php echo $lo_details['file_no']?>">
                                            <div class="form-group">
                                                
                                                <select class="form-control fiscal_year_frm" name="fiscal_year[]"
                                                    id="set_fiscal_year_frm">
                                                    <option value="">आर्थिक वर्ष देखि</option>
                                                    <?php
                                                        if(!empty($fyear)) : 
                                                            foreach ($fyear as $key => $value) : ?>
                                                    <option value="<?php echo $value['year']?>">
                                                        <?php echo $value['year']?></option>
                                                    <?php endforeach;endif?>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <?php //$total_kar_amount = $sampati_kar + $total_bhumi_kar?>
                                                <input type="text" name="total_t_tax[]" class="form-control" id="total_t_tax" readonly="readonly" value="<?php //echo $total_kar_amount?>">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" name="bhumi_kar[]" class="form-control bhumi_kar" readonly="readonly">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="col-md-12 text-center">
                                <hr>
                                <button class="btn btn-primary btn-xs save_button" data-toggle="tooltip"
                                    title=" सेभ  गर्नुहोस्" name="Submit" type="submit" value="Save"> सेभ
                                    गर्नुहोस्</button>
                                <a href="<?php echo base_url()?>Profile" class="btn btn-danger btn-xs"
                                    data-toggle="tooltip" title="सम्पादन गर्नुहोस्">रद्द गर्नुहोस्</a>
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
        
        $('.btnAddNew').click(function(e) {
                e.preventDefault();
                var trOneNew = $('.partsPurchaseFields').length+1;
                var sn = $(this).closest('.sn_1').val();
                var new_row =
                    '<tr class ="partsPurchaseFields" id="partsPurchaseFields_'+trOneNew+'" data-id="'+trOneNew+'">'+
                   '<td><select class="form-control fiscal_year_frm" name="fiscal_year[]" data-placeholder="छान्नुहोस्" id="main_topic'+trOneNew+'" data-id="'+trOneNew+'"><option value="">छान्नुहोस्</option><?php if(!empty($fyear)) {
                        foreach ($fyear as $key => $fy) { ?><option value="<?php echo $fy['year']?>"><?php echo $fy['year']; } }?></option></select></td>'+
                    '<td><input class="form-control"  type="text" name="total_t_tax[]" id="" readonly="readonly" value="<?php //echo $total_kar_amount?>"  required></td>'+
                    '<td><input class="form-control bhumi_kar"  type="text" name="bhumi_kar[]" id="karrate" readonly="readonly"  required></td>'+
                    '<td><button type="button" class="btn btn-danger btn-sm remove-row" data-toggle="tooltip" title="हटाउनुहोस्"><span class="fa fa-times" tabindex="-1"></span></button></td>'+
                    '<tr>'
                $("#add_new_fields").append(new_row);
        });
        $("body").on("click",".remove-row", function(e){
            e.preventDefault();
            if (confirm('के तपाइँ  यसलाई हटाउन निश्चित हुनुहुन्छ ?')) {
                var amt = $(this).closest("tr").find('.topic_rate').val();
                var t_amt = $('#t_total').val();
                var new_amt = t_amt-amt;
                $("#t_total").val(new_amt);
                $(this).parent().parent().remove();
            }
        });

        $(document).on('change','.fiscal_year_frm', function() {
            obj = $(this);
            var fiscal_year = obj.val();
            var total_t_tax = $('#total_t_tax').val();
           $.ajax({
                method: "POST",
                url: base_url + "SampatiKarRasid/getBRateByFiscalYear",
                data: {
                    fiscal_year: fiscal_year,
                    total_t_tax: total_t_tax
                },
                success: function(resp) {
                    obj.closest('tr').find('.bhumi_kar').val(resp);
                 }
           });
        });
    }); //end of dom
 </script>
