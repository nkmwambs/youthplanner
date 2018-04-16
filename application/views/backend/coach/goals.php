<style>
	.goal-title{border: 1px solid #D3D3D3;margin-bottom: 5px;padding: 15px;border-radius: 5px;background-color: #F0FFFF;}
</style>
		<div class="row">
			
			<div class="col-md-8">
			
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
							<div class="tab-pane active" id="themes">
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
							</div>
							
							<div class="tab-pane active" id="supporting">
							
							</div>
						
						</div>	
					</div>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="panel panel-basic" data-collapsed="0">
									
				<!-- panel body -->
					<div class="panel-body">
						<div class="col-sm-12" style="text-align: center;font-weight: bold;"><?=get_phrase('themes');?></div>
						<div id="theme_chart_container"><div id="theme-chart"></div></div>
					</div>
			</div>	
		</div>
		
	</div>							
  
<script>
	jQuery(document).ready(function($) 
		{
			$('.show_hide_goals').click(function(){
				var theme_id = $(this).attr('id');
				var cur = $(this);
				
				if($('#theme_goals_display_'+theme_id).text().length===0){
					cur.find('div > i').prop('class','fa fa-expand');
					cur.find('div > span').html('<?=get_phrase('hide_goals');?>');
					var url = "<?=base_url();?>index.php?coach/get_goals_list/"+theme_id;
					$.ajax({
						url:url,
						beforeSend:function(){
							$('#theme_goals_display_'+theme_id).html('<div style="text-align:center;"><img style="width:60px;height:60px;" src="<?php echo base_url();?>uploads/preloader4.gif" /></div>');
						},
						success:function(response){
							
							$('#theme_goals_display_'+theme_id).html(response);
						}
					});
				}else{
					$('#theme_goals_display_'+theme_id).html("");
					cur.find('div > i').prop('class','fa fa-compress');
					cur.find('div > span').html('<?=get_phrase('show_tasks');?>');
				}
			});
		
			
			Morris.Donut({
			  element: 'theme-chart',
			  data: [
			  		<?php 
			  			$themes = $this->db->get_where("goal_themes",array('theme_status'=>1))->result_object();
			  			foreach($themes as $row):
							$goals_count = $this->db->get_where("goals",array("yds_obj"=>$row->goal_themes_id))->num_rows();
			  		?>
			  		
			  			{label: "<?=$row->theme_name;?>", value: <?=$goals_count;?>},
			  		<?php endforeach;?>
	
			  ]
			});
			

	});		
</script>