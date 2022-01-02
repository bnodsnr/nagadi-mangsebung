 <a href="<?php echo base_url()?>Report/MonthlyReport/printOverAllMonthlyCollection/<?php echo $current_month?>/<?php echo $ward_no?>" class="btn btn-warning btn-sm pull-right" target="_blank"><i class="fa fa-eye"></i> पुरा विवरण हेर्नुहोस</a>
 <a href="<?php echo base_url()?>Report/MonthlyReport/printMonthlyCollection/<?php echo $current_month?>/<?php echo $ward_no?>" class="btn btn-info btn-sm pull-right" style="margin-right: 4px;" target="_blank"><i class="fa fa-print"></i> प्रिन्ट गर्नुहोस</a>
 <table class="print_table table table-stripe table-bordered">
  <thead>
    <tr>
      <th>सि.नं</th>
      <th>आम्दानी शिर्षक</th>
      <th class="hidden-phone">शिर्षक नं  </th>
      <th class="hidden-phone">मुल्य रु</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>१</td>
      <td>सम्पति /भुमि कर </td>
      <td>--</td>
      <td><?php echo !empty($sampati_bhumi_kar['total'])?$this->mylibrary->convertedcit(number_format($sampati_bhumi_kar['total'])):$this->mylibrary->convertedcit(0)?></td>
      <td><a href="<?php echo base_url()?>Report/MonthlyReport/viewSampatiKarDetails/<?php echo $current_month.'/'.$ward_no?>" class="btn btn-warning" target="_blank">विवरण हेर्नुहोस</a></td>
    </tr>
    <?php if(!empty($main_topic)) : 
      $i=2;
      $nagadi_total = 0;
      foreach($main_topic as $mt): ?>
        <tr>
          <td><?php echo $this->mylibrary->convertedcit($i++)?></td>
          <td><?php echo $mt['topic_name']?></td>
          <td><?php echo $this->mylibrary->convertedcit($mt['topic_no'])?></td>
          <?php
            $collection_rate = $this->Reportmodel->MonthlyNagadiCollection($mt['id'], $current_month, $ward_no);
          ?>
          <td><?php echo !empty($collection_rate['total'])?$this->mylibrary->convertedcit(round($collection_rate['total'])):$this->mylibrary->convertedcit(0)?></td>
          <?php $nagadi_total += $collection_rate['total'];?>
          <td><a href="<?php echo base_url()?>Report/MonthlyReport/printNagadiDetailsByTopic/<?php echo $mt['id'].'/'.$current_month.'/'.$ward_no?>" class="btn btn-warning" target="_blank">विवरण हेर्नुहोस</a></td>
        </tr>
      <?php endforeach;endif;?>
    </tbody>
    <tfoot>
      <tr>
      <td colspan="3" style="text-align: right"> जम्मा </td>
      <?php
        $net_total = $nagadi_total + $sampati_bhumi_kar['total'];
      ?>
      <td colspan="2" align="left"><?php echo !empty($net_total)?$this->mylibrary->convertedcit(round($net_total)):$this->mylibrary->convertedcit(0)?></td>
      </tr>
    </tfoot>

  </table>