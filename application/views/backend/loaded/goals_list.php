<hr />

<div class="col-sm-12">
	<?php if(sizeof($goals)>0){?>
		
				<table class="table table-bordered" style="background-color:#ffffff;">
					<?php  foreach($goals as $goal):?>
						<tr style="color: #336699;font-weight:bold;font-size: 10pt;">
							<td>
														
								<div  class="pull-left" >
									<a href="#" onclick="showAjaxModal('<?=base_url();?>index.php?modal/popup/modal_add_goal_details/<?=$goal->goals_id;?>');"><?=$goal->goals_name;?></a>
								</div>
								
								<div style="font-size: 8pt;" class="pull-right">
									Due: <?=date('j M Y',strtotime($goal->due_date));?>
								</div>
							</td>
						</tr>
					<?php endforeach;?>	
				</table>	
	
	<?php }else{?>
		<div class="well"><?=get_phrase('goals_not_available_or_completed');?></div>
	<?php }?>	
</div>	