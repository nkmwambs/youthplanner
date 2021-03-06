<style>
	.goal-title{border: 1px solid #D3D3D3;margin-bottom: 5px;padding: 15px;border-radius: 5px;background-color: #F0FFFF;}
</style>
		<div class="row">
			
			<div class="col-md-10">
			
				<div class="panel minimal minimal-gray">
					
					<div class="panel-heading">

						<div class="panel-options">
							
							<ul class="nav nav-tabs">
								<li class="active"><a href="#goals" data-toggle="tab"><?=get_phrase('goals');?></a></li>
								<li><a href="#supporting" data-toggle="tab"><?=get_phrase('supporting');?></a></li>
							</ul>
						</div>
					</div>
					
					<div class="panel-body">
						
						<div class="tab-content">
							<div class="tab-pane active" id="goals">
								<?php
									$goals = $this->db->get_where('goals',array('users_id'=>$this->session->login_user_id))->result_object();
									foreach($goals as $row){
										
										$count_of_tasks = $this->db->get_where('tasks',array('goals_id'=>$row->goals_id))->num_rows();
										$count_completed_tasks = $this->db->get_where('tasks',array('goals_id'=>$row->goals_id,'tasks_status'=>'0'))->num_rows();
								?>
									<div class="row">
											<div class="col-sm-12">
												<div class="goal-title" id="goal_<?=$row->goals_id;?>">
													
													<!--Goal Title-->
													
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
													
												</div>
											</div>

									</div>
								<?php
									}
								?>
							</div>
							
							<div class="tab-pane active" id="supporting">
							
							</div>
						
						</div>	
					</div>
			</div>
		</div>
		
		<div class="col-md-2">
			<div class="" >
				<div class="row">
					<div class="col-md-12">
						
						<div class="panel panel-basic" data-collapsed="0">
							<!-- panel head -->
							<div class="panel-heading">
								<div class="panel-title"><?=get_phrase('core_values');?></div>
								
							</div>
							
							<!-- panel body -->
							<div class="panel-body">
								<span class="pie-values"></span>
							</div>
						</div>	
						
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-basic" data-collapsed="0">
							<!-- panel head -->
							<div class="panel-heading">
								<div class="panel-title"><?=get_phrase('magnitude');?></div>
								
							</div>
							
							<!-- panel body -->
							<div class="panel-body">
								<span class="pie-magnitude"></span>
							</div>
						</div>		
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-basic" data-collapsed="0">
							<!-- panel head -->
							<div class="panel-heading">
								<div class="panel-title"><?=get_phrase('priority');?></div>
								
							</div>
							
							<!-- panel body -->
							<div class="panel-body">
								<span class="pie-priority"></span>
							</div>
						</div>		
					</div>
				</div>
			</div>
		</div>
		
	</div>							
  
<script>
	jQuery(document).ready(function($) 
		{
			$('.show_hide_tasks').click(function(){
				var goal_id = $(this).attr('id');
				var cur = $(this);
				
				if($('#goal_tasks_display_'+goal_id).text().length===0){
					cur.find('div > i').prop('class','fa fa-expand');
					cur.find('div > span').html('<?=get_phrase('hide_tasks');?>');
					var url = "<?=base_url();?>index.php?coach/get_tasks_list/"+goal_id;
					$.ajax({
						url:url,
						beforeSend:function(){
							$('#goal_tasks_display_'+goal_id).html('<div style="text-align:center;"><img style="width:60px;height:60px;" src="<?php echo base_url();?>uploads/preloader4.gif" /></div>');
						},
						success:function(response){
							
							$('#goal_tasks_display_'+goal_id).html(response);
						}
					});
				}else{
					$('#goal_tasks_display_'+goal_id).html("");
					cur.find('div > i').prop('class','fa fa-compress');
					cur.find('div > span').html('<?=get_phrase('show_tasks');?>');
				}
			});
		
			$(".pie-values").sparkline([3,9,5], {
				type: 'pie',
				width: '150px ',
				height: '150px',
				sliceColors: ['green', 'brown','orange']
				
			});
			
			$(".pie-magnitude").sparkline([5,5], {
				type: 'pie',
				width: '150px ',
				height: '150px',
				sliceColors: ['red', '#c13638']
				
			});
			
			$(".pie-priority").sparkline([3,2,5], {
				type: 'pie',
				width: '150px ',
				height: '150px',
				sliceColors: ['#ee4749', '#c13638','#fe9193']
				
			});
	});		
</script>