<div class="col-sm-12">
	<?php if(sizeof($tasks)>0){?>
		
				<table class="table table-bordered" style="background-color:#ffffff;">
					<?php  foreach($tasks as $task):?>
						<tr style="color: #336699;font-weight:bold;font-size: 10pt;">
							<td>
								<div class="pull-left" id="tasks_check_holder_<?=$task->tasks_id;?>">
									<input type="checkbox" class="<?=$task->goals_id;?>" id="<?=$task->tasks_id;?>" style="width: 20px;height: 20px;" />
								</div>  
								
								<div  class="pull-left" >
									<?=$task->tasks_name;?>
								</div>
								
								<div style="font-size: 8pt;" class="pull-right">
									Due: <?=date('j M Y',strtotime($task->tasks_due_date));?>
								</div>
							</td>
						</tr>
					<?php endforeach;?>	
				</table>	
	
	<?php }else{?>
		<div class="well"><?=get_phrase('tasks_not_available_or_completed');?></div>
	<?php }?>	
</div>	

<script>
	$(':checkbox').click(function(){
		var task_id = $(this).attr('id');
		var goals_id = $(this).attr('class');
		if($(this).is(':checked')){
			var url = "<?=base_url();?>index.php?coach/mark_task_progress/"+task_id;
			$.ajax({
				url:url,
				beforeSend:function(){
					$('#tasks_check_holder_'+task_id).html('<div style="text-align:center;"><img style="width:20px;height:20px;" src="<?php echo base_url();?>uploads/preloader4.gif" /></div>');
				},
				success:function(response){
					
					$('#tasks_check_holder_'+task_id).closest("tr").remove();
					
					$('#goal_progress_bar_'+goals_id).html(response);
				}
			});
		}
	});
</script>