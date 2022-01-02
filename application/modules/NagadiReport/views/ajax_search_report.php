							<table class=" table table-bordered table-responsive print_table" id="hidden-table-info">

							<thead>

								<tr>

									<th style="width: 200px">आम्दानी शिर्षक</th>

									<th class="hidden-phone">शिर्षक नं	</th>

									<th class="hidden-phone">नगरपालिका</th>

									<th class="hidden-phone">वडा १</th>

									<th class="hidden-phone">वडा २</th>

									<th class="hidden-phone">वडा ३</th>

									<th class="hidden-phone">वडा ४</th>

									<th class="hidden-phone">वडा ५</th>

									<th class="hidden-phone">वडा ६</th>

									<th class="hidden-phone">वडा ७</th>

									<th class="hidden-phone">वडा ८</th>

									<th class="hidden-phone">वडा ९</th>
									<th class="hidden-phone">वडा १०</th>
									<th class="hidden-phone">वडा ११</th>
									<th class="hidden-phone">वडा १२</th>
									<th class="hidden-phone">वडा १३</th>

									<th class="hidden-phone">जम्मा रु:</th>

								</tr>

							</thead>

								<tbody>

								<?php if(!empty($main_topic)) : 

									$i=1; foreach($main_topic as $mt):

									?>

									<tr>

									<td><?php echo $mt['topic_name']?></td>

									<td><?php echo $this->mylibrary->convertedcit($mt['topic_no'])?></td>
									
									<?php 

										$ward_0 = $this->Reportmodel->getNagadiTotalByTopic($mt['id'], '0');

										$ward_1 = $this->Reportmodel->getNagadiTotalByTopic($mt['id'], '1');

										$ward_2 = $this->Reportmodel->getNagadiTotalByTopic($mt['id'], '2');

										$ward_3 = $this->Reportmodel->getNagadiTotalByTopic($mt['id'],'3');

										$ward_4 = $this->Reportmodel->getNagadiTotalByTopic($mt['id'],'4');

										$ward_5 = $this->Reportmodel->getNagadiTotalByTopic($mt['id'],'5');

										$ward_6 = $this->Reportmodel->getNagadiTotalByTopic($mt['id'],'6');

										$ward_7 = $this->Reportmodel->getNagadiTotalByTopic($mt['id'],'7');

										$ward_8 = $this->Reportmodel->getNagadiTotalByTopic($mt['id'],'8');

										$ward_9 = $this->Reportmodel->getNagadiTotalByTopic($mt['id'],'9');
										$ward_10 = $this->Reportmodel->getNagadiTotalByTopic($mt['id'],'10');
										$ward_11 = $this->Reportmodel->getNagadiTotalByTopic($mt['id'],'11');
										$ward_12 = $this->Reportmodel->getNagadiTotalByTopic($mt['id'],'12');
										$ward_13 = $this->Reportmodel->getNagadiTotalByTopic($mt['id'],'13');


										$total_byMt = $this->Reportmodel->getNagadiTotalByMT($mt['id']);

									?>

									<td><?php echo !empty($ward_0->total)?$this->mylibrary->convertedcit($ward_0->total):$this->mylibrary->convertedcit(0)?></td>

									<td><?php echo !empty($ward_1->total)?$this->mylibrary->convertedcit($ward_1->total):$this->mylibrary->convertedcit(0) ?></td>

									<td><?php echo !empty($ward_2->total)?$this->mylibrary->convertedcit($ward_2->total):$this->mylibrary->convertedcit(0) ?></td>

									<td><?php echo !empty($ward_3->total)?$this->mylibrary->convertedcit($ward_3->total):$this->mylibrary->convertedcit(0) ?></td>

									<td><?php echo !empty($ward_4->total)?$this->mylibrary->convertedcit($ward_4->total):$this->mylibrary->convertedcit(0) ?></td>

									<td><?php echo !empty($ward_5->total)?$this->mylibrary->convertedcit($ward_5->total):$this->mylibrary->convertedcit(0) ?></td>

									<td><?php echo !empty($ward_6->total)?$this->mylibrary->convertedcit($ward_6->total):$this->mylibrary->convertedcit(0) ?></td>

									<td><?php echo !empty($ward_7->total)?$this->mylibrary->convertedcit($ward_7->total):$this->mylibrary->convertedcit(0) ?></td>

									<td><?php echo !empty($ward_8->total)?$this->mylibrary->convertedcit($ward_8->total):$this->mylibrary->convertedcit(0) ?></td>

									<td><?php echo !empty($ward_9->total)?$this->mylibrary->convertedcit($ward_9->total):$this->mylibrary->convertedcit(0) ?></td>

									<td><?php echo !empty($ward_10->total)?$this->mylibrary->convertedcit($ward_10->total):$this->mylibrary->convertedcit(0) ?></td>
									<td><?php echo !empty($ward_11->total)?$this->mylibrary->convertedcit($ward_11->total):$this->mylibrary->convertedcit(0) ?></td>
									<td><?php echo !empty($ward_12->total)?$this->mylibrary->convertedcit($ward_12->total):$this->mylibrary->convertedcit(0) ?></td>
									<td><?php echo !empty($ward_13->total)?$this->mylibrary->convertedcit($ward_13->total):$this->mylibrary->convertedcit(0) ?></td>


									<td><?php echo !empty($total_byMt->total)?$this->mylibrary->convertedcit(round($total_byMt->total),2):$this->mylibrary->convertedcit(0) ?></td>

								
								<tr>
								<?php $i++; endforeach; endif;?>
								<tr>



										<?php

											$sward_0 = $this->Reportmodel->getNagadiTotalByWard( '0');

											$sward_1 = $this->Reportmodel->getNagadiTotalByWard( '1');

											$sward_2 = $this->Reportmodel->getNagadiTotalByWard( '2');

											$sward_3 = $this->Reportmodel->getNagadiTotalByWard('3');

											$sward_4 = $this->Reportmodel->getNagadiTotalByWard('4');

											$sward_5 = $this->Reportmodel->getNagadiTotalByWard('5');

											$sward_6 = $this->Reportmodel->getNagadiTotalByWard('6');

											$sward_7 = $this->Reportmodel->getNagadiTotalByWard('7');

											$sward_8 = $this->Reportmodel->getNagadiTotalByWard('8');

											$sward_9 = $this->Reportmodel->getNagadiTotalByWard('9');
											$sward_10 = $this->Reportmodel->getNagadiTotalByWard('10');
											$sward_11 = $this->Reportmodel->getNagadiTotalByWard('11');
											$sward_12 = $this->Reportmodel->getNagadiTotalByWard('12');
											$sward_13 = $this->Reportmodel->getNagadiTotalByWard('13');
											$nward_0 = !empty($sward_0)?$sward_0->total:0;

											$nward_1 = !empty($sward_1)?$sward_1->total:0;
											$nward_2 = !empty($sward_2)?$sward_2->total:0;
											$nward_3 = !empty($sward_3)?$sward_3->total:0;
											$nward_4 = !empty($sward_4)?$sward_4->total:0;
											$nward_5 = !empty($sward_5)?$sward_5->total:0;
											$nward_6 = !empty($sward_6)?$sward_6->total:0;
											$nward_7 = !empty($sward_7)?$sward_7->total:0;
											$nward_8 = !empty($sward_8)?$sward_8->total:0;
											$nward_9 = !empty($sward_9)?$sward_9->total:0;
											$nward_10 = !empty($sward_10)?$sward_10->total:0;
											$nward_11 = !empty($sward_11)?$sward_11->total:0;
											$nward_12 = !empty($sward_12)?$sward_12->total:0;
											$nward_13 = !empty($sward_13)?$sward_13->total:0;

										?>

										<td colspan="2" align="right">जम्मा नगदि रु:</td>

										<td><?php echo !empty($sward_0->total)?$this->mylibrary->convertedcit(number_format($sward_0->total)):$this->mylibrary->convertedcit(0)?></td>

										<td><?php echo !empty($sward_1->total)?$this->mylibrary->convertedcit(number_format($sward_1->total)):$this->mylibrary->convertedcit(0) ?></td>

										<td><?php echo !empty($sward_2->total)?$this->mylibrary->convertedcit(number_format($sward_2->total)):$this->mylibrary->convertedcit(0) ?></td>

										<td><?php echo !empty($sward_3->total)?$this->mylibrary->convertedcit(number_fomat($sward_3->total)):$this->mylibrary->convertedcit(0) ?></td>

										<td><?php echo !empty($sward_4->total)?$this->mylibrary->convertedcit(number_format($sward_4->total)):$this->mylibrary->convertedcit(0) ?></td>

										<td><?php echo !empty($sward_5->total)?$this->mylibrary->convertedcit(number_format($sward_5->total)):$this->mylibrary->convertedcit(0) ?></td>

										<td><?php echo !empty($sward_6->total)?$this->mylibrary->convertedcit(number_format($sward_6->total)):$this->mylibrary->convertedcit(0) ?></td>

										<td><?php echo !empty($sward_7->total)?$this->mylibrary->convertedcit(number_format($sward_7->total)):$this->mylibrary->convertedcit(0) ?></td>

										<td><?php echo !empty($sward_8->total)?$this->mylibrary->convertedcit(number_format($sward_8->total)):$this->mylibrary->convertedcit(0) ?></td>

										<td><?php echo !empty($sward_9->total)?$this->mylibrary->convertedcit(number_format($sward_9->total)):$this->mylibrary->convertedcit(0) ?></td>
										<td><?php echo !empty($sward_10->total)?$this->mylibrary->convertedcit(number_format($sward_10->total)):$this->mylibrary->convertedcit(0) ?></td>
										<td><?php echo !empty($sward_11->total)?$this->mylibrary->convertedcit(number_format($sward_11->total)):$this->mylibrary->convertedcit(0) ?></td>
										<td><?php echo !empty($sward_12->total)?$this->mylibrary->convertedcit(number_format($sward_12->total)):$this->mylibrary->convertedcit(0) ?></td>
										<td><?php echo !empty($sward_13->total)?$this->mylibrary->convertedcit(number_format($sward_13->total)):$this->mylibrary->convertedcit(0) ?></td>

										

										<td>

											<?php $total_nagadi = 

											$nward_0 + $nward_1+$nward_2 +$nward_3+$nward_4+$nward_5+$nward_6+$nward_7+$nward_8+$nward_9+$nward_10+$nward_11+$nward_12+$nward_13;

											echo $this->mylibrary->convertedcit($total_nagadi)?>

										</td>

									</tr>
									<tr>
										<td colspan="2" align="right">सम्पति/भुमि कर </td>
										<td>--</td>
										<?php
											$sam_ward_1 = $this->Reportmodel->getSampatiTotalByWard( '1');

											$sam_ward_2 = $this->Reportmodel->getSampatiTotalByWard( '2');

											$sam_ward_3 = $this->Reportmodel->getSampatiTotalByWard('3');

											$sam_ward_4 = $this->Reportmodel->getSampatiTotalByWard('4');

											$sam_ward_5 = $this->Reportmodel->getSampatiTotalByWard('5');

											$sam_ward_6 = $this->Reportmodel->getSampatiTotalByWard('6');

											$sam_ward_7 = $this->Reportmodel->getSampatiTotalByWard('7');

											$sam_ward_8 = $this->Reportmodel->getSampatiTotalByWard('8');

											$sam_ward_9 = $this->Reportmodel->getSampatiTotalByWard('9');
											$sam_ward_10 = $this->Reportmodel->getSampatiTotalByWard('10');
											$sam_ward_11 = $this->Reportmodel->getSampatiTotalByWard('11');
											$sam_ward_12 = $this->Reportmodel->getSampatiTotalByWard('12');
											$sam_ward_13 = $this->Reportmodel->getSampatiTotalByWard('13');


											$sam_1 = !empty($sam_ward_1)?$sam_ward_1->sampati_total:0;
											$sam_2 = !empty($sam_ward_2)?$sam_ward_2->sampati_total:0;
											$sam_3 = !empty($sam_ward_3)?$sam_ward_3->sampati_total:0;
											$sam_4 = !empty($sam_ward_4)?$sam_ward_4->sampati_total:0;
											$sam_5 = !empty($sam_ward_5)?$sam_ward_5->sampati_total:0;
											$sam_6 = !empty($sam_ward_6)?$sam_ward_6->sampati_total:0;
											$sam_7 = !empty($sam_ward_7)?$sam_ward_7->sampati_total:0;
											$sam_8 = !empty($sam_ward_8)?$sam_ward_8->sampati_total:0;
											$sam_9 = !empty($sam_ward_9)?$sam_ward_9->sampati_total:0;
											$sam_10 = !empty($sam_ward_10)?$sam_ward_10->sampati_total:0;
											$sam_11 = !empty($sam_ward_11)?$sam_ward_11->sampati_total:0;
											$sam_12 = !empty($sam_ward_12)?$sam_ward_12->sampati_total:0;
											$sam_13 = !empty($sam_ward_13)?$sam_ward_13->sampati_total:0;
										?>

										<td><?php echo $this->mylibrary->convertedcit($sam_1)?></td>

										<td><?php echo $this->mylibrary->convertedcit($sam_2)?></td>

										<td><?php echo $this->mylibrary->convertedcit($sam_3) ?></td>

										<td><?php echo $this->mylibrary->convertedcit($sam_4)?></td>

										<td><?php echo $this->mylibrary->convertedcit($sam_5) ?></td>

										<td><?php echo $this->mylibrary->convertedcit($sam_6)?></td>

										<td><?php echo $this->mylibrary->convertedcit($sam_7) ?></td>

										<td><?php echo $this->mylibrary->convertedcit($sam_8) ?></td>

										<td><?php echo $this->mylibrary->convertedcit($sam_9) ?></td>
										<td><?php echo $this->mylibrary->convertedcit($sam_10) ?></td>
										<td><?php echo $this->mylibrary->convertedcit($sam_11) ?></td>
										<td><?php echo $this->mylibrary->convertedcit($sam_12) ?></td>
										<td><?php echo $this->mylibrary->convertedcit($sam_13) ?></td>
										<td>
										<?php 
											$total_sam = $sam_1 + $sam_2 +$sam_3 + $sam_4+$sam_5+$sam_6+$sam_7+$sam_8+$sam_9+$sam_10+$sam_11+$sam_12+$sam_13;
											echo $this->mylibrary->convertedcit($total_sam);
										?>
										</td>
									</tr>
								</tbody>
								<tfoot>

									<tr>

										<td colspan="2" align="right">समग्र रु:</td>

										<td><?php echo $this->mylibrary->convertedcit($nward_0)?></td>
										<?php $ward_1_collection = $nward_1+$sam_1;
											  $ward_2_collection = $nward_2 + $sam_2;
											  $ward_3_collection = $nward_3 +$sam_3;
											  $ward_4_collection = $nward_4 + $sam_4;
											  $ward_5_collection = $nward_5 + $sam_5;
											  $ward_6_collection = $nward_6 + $sam_6;
											  $ward_7_collection = $nward_7 + $sam_7;
											  $ward_8_collection = $nward_8 + $sam_8;
											  $ward_9_collection = $nward_9 + $sam_9;
											  $ward_10_collection = $nward_10 + $sam_10;
											  $ward_11_collection = $nward_11 + $sam_11;
											  $ward_12_collection = $nward_12 + $sam_12;
											  $ward_13_collection = $nward_13 + $sam_13;
											  $total_collection = $ward_1_collection + $ward_2_collection + $ward_3_collection + $ward_4_collection + $ward_5_collection + $ward_6_collection + $ward_7_collection + $ward_8_collection + $ward_9_collection+ $ward_10_collection + $ward_11_collection + $ward_12_collection + $ward_13_collection + $nward_0;
										?>
										<td><?php echo $this->mylibrary->convertedcit($ward_1_collection)?></td>
										<td><?php echo $this->mylibrary->convertedcit($ward_2_collection)?></td>
										<td><?php echo $this->mylibrary->convertedcit($ward_3_collection)?></td>
										<td><?php echo $this->mylibrary->convertedcit($ward_4_collection)?></td>
										<td><?php echo $this->mylibrary->convertedcit($ward_5_collection)?></td>
										<td><?php echo $this->mylibrary->convertedcit($ward_6_collection)?></td>
										<td><?php echo $this->mylibrary->convertedcit($ward_7_collection)?></td>
										<td><?php echo $this->mylibrary->convertedcit($ward_8_collection)?></td>
										<td><?php echo $this->mylibrary->convertedcit($ward_9_collection)?></td>
										<td><?php echo $this->mylibrary->convertedcit($ward_10_collection)?></td>
										<td><?php echo $this->mylibrary->convertedcit($ward_11_collection)?></td>
										<td><?php echo $this->mylibrary->convertedcit($ward_12_collection)?></td>
										<td><?php echo $this->mylibrary->convertedcit($ward_13_collection)?></td>
										<td><?php echo $this->mylibrary->convertedcit($total_collection)?></td>
										<!-- <td colspan="14">अक्षरुपी : <?php //echo $this->convertlib->convert($total_value);?></td> -->
									</tr>

								</tfoot>

                          </table>