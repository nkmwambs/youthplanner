<?php  
	$checked = "";
	$strike="";	
	$opacity = "";
		if($task->tasks_status==='1'){
			$checked = "checked";
			$strike="text-decoration: line-through";	
			$opacity ="opacity: 0.3";
		}
?>
	<td  style="<?=$opacity;?>;">
		<div style="" class="col-sm-1" id="tasks_check_holder_<?=$task->tasks_id;?>">
			<input onclick="update_task_status(this);" type="checkbox" <?=$checked;?> class="task <?=$task->goals_id;?>" id="<?=$task->tasks_id;?>" style="width: 20px;height: 20px;" />
		</div>  
								
		<div  class="col-sm-5" style="<?=$strike;?>;">
			<?=$task->tasks_name;?>
		</div>
							
		<div style="font-weight:bold;font-size: 8pt;" class="col-sm-4">
			<?php if($task->tasks_status==='0'){?>
				<?=get_phrase('due');?>: <?=date('j M Y',strtotime($task->tasks_due_date));?>
			<?php }else{?>
				<?=get_phrase('completed_by');?> <?=$this->db->get_where('users',array('users_id'=>$task->completed_by))->row()->firstname;?> <?=get_phrase('on');?> <?=$task->timestamp;?>	
			<?php }?>	
		</div>
		
		<div class="col-sm-2">
			<div style="color:" class="btn btn-default"><i class="fa fa-pencil"></i><?=get_phrase('edit');?></div>
		</div>
	</td>
	
	
	

<script>
	function update_task_status(elem){
		var task_id = $(elem).attr('id');
		var goals_id = "<?=$task->goals_id;?>";
		//alert(task_id);
		var url = "<?=base_url();?>index.php?coach/get_single_task_update/"+task_id;
		
		$.ajax({
			url:url,
			beforeSend:function(){
					$('#tasks_check_holder_'+task_id).html('<div style="text-align:center;"><img style="width:20px;height:20px;" src="<?php echo base_url();?>uploads/preloader4.gif" /></div>');
			},
			success:function(response){
				$('#row_'+task_id).html(response);
				
			}
		});
		
		var url2 = "<?=base_url();?>index.php?coach/mark_task_progress_on_add/"+goals_id;
		$.ajax({
			url:url2,
			success:function(response){
			//alert(response);
			$('#goal_progress_bar_'+goals_id).html(response);
			}
		});
	}
</script>