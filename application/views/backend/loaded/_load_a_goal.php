<?php
	
						
		$count_of_tasks = $this->db->get_where('tasks',array('goals_id'=>$row->goals_id))->num_rows();
		$count_completed_tasks = $this->db->get_where('tasks',array('goals_id'=>$row->goals_id,'tasks_status'=>'0'))->num_rows();
?>
													
													<div class="row">
														<div class="col-sm-12">
															<a href="#" onclick="showAjaxModal('<?=base_url();?>index.php?modal/popup/modal_add_goal_details/<?=$row->goals_id;?>');"><h4 style="font-weight: bold;"><?=$row->goals_name;?></h4></a>
														</div>	
													</div>
													
													<div class="row">
														<?php
															$obj_theme = $this->db->get_where('goal_themes',array('goal_themes_id'=>$row->yds_obj))->row();
														
															$priority = $this->db->get_where('goal_priority',array('goal_priority_id'=>$row->priority))->row();
															
															$magnitude = $this->db->get_where('goal_magnitude',array('goal_magnitude_id'=>$row->magnitude))->row();
														?>
															
														<div class="col-sm-5">
															<div class="col-sm-5">
																<a href="#" onclick="showAjaxModal('<?=base_url();?>index.php?modal/popup/modal_add_goal_details/<?=$row->goals_id;?>');">
																	<div title="<?=$obj_theme->theme_description;?>" class="label <?=$obj_theme->theme_color;?> pull-left"><?=$obj_theme->theme_name;?></div>
																</a>
															</div>
																
															<div class="col-sm-4 show_hide_tasks" id="<?=$row->goals_id;?>"> 
																
																<div class="pull-left" style="font-size: 8pt;">
																	<i class="fa fa-compress"></i> <span><?=get_phrase('show_tasks');?></span> 
																</div> 
															</div>	
															
															<div class="col-sm-3">	
																<div style="margin-left: 5px;" id="goal_progress_bar_<?=$row->goals_id;?>">
																	<div class="progress" style="height: 10px;margin-top: 2px;margin-left: 5px;" title="<?=number_format(($count_completed_tasks/$count_of_tasks)*100);?>% <?=get_phrase('completed');?>">
																		  <div class="progress-bar" role="progressbar" aria-valuenow="<?=$count_completed_tasks;?>"
																		  	aria-valuemin="0" aria-valuemax="<?=$count_of_tasks;?>" style="width:<?=($count_completed_tasks/$count_of_tasks)*100;?>%">
																		  </div>
																	</div>
																</div>
															</div>
															
														</div>
														
														<div class="col-sm-6">
															<a href="#" onclick="showAjaxModal('<?=base_url();?>index.php?modal/popup/modal_add_goal_details/<?=$row->goals_id;?>');">
																<div class="pull-right" style="font-size: 8pt;color: #336699;font-weight: bold;"><?=get_phrase('due');?> : <?=date('j M Y',strtotime($row->due_date));?></div>
															</a>
														</div>
														
														
														<!--Priority, Magnitude & Due Date-->
														<!-- <div class="col-sm-4">
															<?php
																$priority = $this->db->get_where('goal_priority',array('goal_priority_id'=>$row->priority))->row();
																$magnitude = $this->db->get_where('goal_magnitude',array('goal_magnitude_id'=>$row->magnitude))->row();
															?>
															<div class="col-sm-6"><span title="<?=get_phrase('priority');?> : <?=ucfirst($priority->priority_name);?>" class="pull-right fa fa-<?=$priority->icon;?>"></span> <span title="<?=get_phrase('magnitude');?> : <?=ucfirst($magnitude->magnitude_name);?>" class="pull-right fa fa-<?=$magnitude->icon;?>"></span></div>
															<div class="col-sm-6"><?=get_phrase('due');?> : <?=$row->due_date;?></div>
														</div> -->	
													</div>
													
													<div class="row" style="padding-left: 10px;" id="goal_tasks_display_<?=$row->goals_id;?>">
														
													</div>