<?php
									
									$theme_cnt = 1;
									
									$themes = $this->db->get_where('goal_themes')->result_object();
									foreach($themes as $row){

								?>
									<div class="row">
											<div class="col-sm-12">
												<div class="goal-title" id="goal_<?=$row->goal_themes_id;?>">
													
													<!--Theme Title-->
													
													<div class="row">
														<div class="col-sm-12">
															<a style="text-decoration: none;" href="#" onclick="showAjaxModal('<?=base_url();?>index.php?modal/popup/modal_theme_description/<?=$row->goal_themes_id;?>');">
																<h4 style="font-weight: bold;"><?=get_phrase('theme');?> <?=$theme_cnt;?>: <div class="label <?=$row->theme_color;?>"><?=$row->theme_name;?></div></h4>
															</a>
														</div>	
													</div>
													
													<div class="row">
																													
														<div class="col-sm-5">
																															
															<div class="col-sm-4 show_hide_goals" id="<?=$row->goal_themes_id;?>"> 
																
																<div class="pull-left" style="font-size: 10pt;">
																	<a class="btn"><i class="fa fa-compress"></i> <span><?=get_phrase('show_goals');?></span> </a>
																</div> 
															</div>	
																														
														</div>
														
													</div>
													
													<div class="row" style="padding-left: 10px;" id="theme_goals_display_<?=$row->goal_themes_id;?>">
														
													</div>
													
												</div>
											</div>

									</div>
								<?php
									$theme_cnt++;
									}
								?>