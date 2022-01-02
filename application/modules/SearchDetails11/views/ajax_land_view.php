
<?php if(!empty($details)) { ?>
	<table class="table table-bordered table-strip">
		<thead style="background: #1b5693;color:#FFF">
			<tr>
				<th>जग्गाधनि को संकेत नं</th>
				<th>जग्गघनीको नाम</th>
				<th>साबिकको ठेगाना</th>
				<th>हालको  ठेगाना</th>
				<th>सडकको नाम</th>
				<th>क्षेत्रगत किसिम</th>
				<th>क्षेत्रफल</th>
				<th>कबुल गरेको मुल्य</th>
			</tr>
		</thead>
		<tbody>
			<?php if(!empty($details)) :
				foreach($details as $detail) : ?>
					<tr>
						<td><?php echo $this->mylibrary->convertedcit($detail['ld_file_no'])?></td>
						<td><?php echo $detail['land_owner_name_np']?></td>
						<td><?php echo $detail['old_gapa_napa'].'-'.$this->mylibrary->convertedcit($detail['old_ward'])?></td>
						<td><?php echo $detail['present_gapa_napa'].'-'.$this->mylibrary->convertedcit($detail['present_ward'])?></td>
						<td><?php echo $detail['road_name']?></td>
						<td><?php echo $detail['land_area_type']?></td>
						<td><?php
							$a_ropani = !empty($detail['a_ropani'])?$this->mylibrary->convertedcit($detail['a_ropani']) :$this->mylibrary->convertedcit(0);
							$a_ana = !empty($detail['a_ana'])?$this->mylibrary->convertedcit($detail['a_ana']) :$this->mylibrary->convertedcit(0);
							$a_paisa = !empty($detail['a_paisa'])?$this->mylibrary->convertedcit($detail['a_paisa']) :$this->mylibrary->convertedcit(0);
							$a_dam = !empty($detail['a_dam'])?$this->mylibrary->convertedcit($detail['a_dam']) :$this->mylibrary->convertedcit(0);
						 	echo $a_ropani. '-'. $a_ana.'-'.$a_paisa.'-'.$a_dam; 

						 ?></td>
						<td><?php echo $this->mylibrary->convertedcit($detail['k_land_rate'])?></td>
					</tr>
			<?php endforeach;endif;?>
		</tbody>
	</table>
<?php } else {
	$kitta_no = $this->mylibrary->convertedcit($kitta_no);
	echo "<div class = 'alert alert-danger'><b>".$kitta_no."</b> नं कित्तामा जग्गाको विवरण दाखिला गरिएको छैन !</div>";
} ?>
