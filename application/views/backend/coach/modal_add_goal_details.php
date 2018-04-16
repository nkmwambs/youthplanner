<style>
	.tasks{border: 1px solid #D3D3D3;margin-bottom: 5px;padding: 15px;border-radius: 5px;background-color: #D3D3D3;}
</style>

<?=$goal = $this->db->get_where('goals',array('goals_id'=>$param2))->row();?>
<div class="row">
	<div class="col-sm-12">
		<h4 class="text-primary font-weight-bold" style="font-weight: bold;"><?=$goal->goals_name;?></h4>
	</div>
</div>

<hr/>

<div class="row">
	<div class="col-sm-3">
		<?php
			$obj_theme = $this->db->get_where('goal_themes',array('goal_themes_id'=>$goal->yds_obj))->row();
		?>
			<div title="<?=$obj_theme->theme_description;?>" class="label <?=$obj_theme->theme_color;?>"><?=$obj_theme->theme_name;;?></div>
	</div>
	
<!--Priority, Magnitude & Due Date-->
	<div class="col-sm-7">
		<?php
			$priority = $this->db->get_where('goal_priority',array('goal_priority_id'=>$goal->priority))->row();
			$magnitude = $this->db->get_where('goal_magnitude',array('goal_magnitude_id'=>$goal->magnitude))->row();
		?>
			<div class="col-sm-5"><span title="<?=get_phrase('priority');?>" class="pull-right text-nowrap label label-default" style="border:2px solid white;"> <?=ucfirst($priority->priority_name);?></span> &nbsp; <span title="<?=get_phrase('magnitude');?>" class="pull-right text-nowrap  label label-default"  style="border:2px solid white;"> <?=ucfirst($magnitude->magnitude_name);?></span></div>
			<div class="col-sm-5 fa fa-calendar text-nowrap"> <?=$goal->due_date;?></div>
			<div class="col-sm-2">
				<button class="btn btn-default" onclick="showAjaxModal('<?=base_url();?>index.php?modal/popup/modal_edit_goal/<?=$param2;?>')" style="margin-top: -10px;">
	                <i class="fa fa-pencil"></i>
	                <span><?php echo get_phrase('edit'); ?></span>
	            </button>
			</div>
	</div>	
</div>

<hr/>

<div class="row">
	<div class="col-sm-12">
		<!--data-toggle="popover" data-trigger="click" data-placement="left" data-content="It's so simple to create a tooltop for my website!" data-original-title="Twitter Bootstrap Popover"-->
		<button id="add_task"  class="btn btn-default action_popup">
	       <i class="fa fa-plus"></i>
	          <span><?php echo get_phrase('add_task'); ?></span>
	    </button>
	
	</div>
</div>
<hr/>
<div class="row">
	<div class="col-sm-12">
		<div id="tasks_view">
			<table class="table">
					<?php  
						$tasks = $this->db->get_where('tasks',array('goals_id'=>$param2))->result_object();
						foreach($tasks as $task):
						$checked = "";
						$strike="";	
						$opacity = "";
						if($task->tasks_status==='0'){
							$checked = "checked";
							$strike="text-decoration: line-through";	
							$opacity ="opacity: 0.3";
						}
					?>
						<tr style="background-color: #eff5f6;color: #336699;font-weight:bold;font-size: 12pt;" id="row_<?=$task->tasks_id;?>">
							<td   style="<?=$opacity;?>;">
								<div class="col-sm-1" id="tasks_check_holder_<?=$task->tasks_id;?>">
									<input onclick="update_task_status(this);" type="checkbox" <?=$checked;?> class="task <?=$task->goals_id;?>" id="<?=$task->tasks_id;?>" style="width: 20px;height: 20px;" />
								</div>  
								
								<div  class="pull-left col-sm-4" style="<?=$strike;?>;">
									<?=$task->tasks_name;?>
								</div>
								
								<div style="font-weight:bold;font-size: 8pt;" class="col-sm-3">
									<?php if($task->tasks_status==='1'){?>
										<?=get_phrase('due');?>: <?=date('j M Y',strtotime($task->tasks_due_date));?>
									<?php }else{?>
										<?=get_phrase('completed_by');?> <?=$this->db->get_where('users',array('users_id'=>$task->completed_by))->row()->firstname;?> <?=get_phrase('on');?> <?=$task->timestamp;?>	
									<?php }?>	
								</div>
								
								<div class="col-sm-4">
									<button class="btn btn-default action_popup_add_comment" id="<?=$task->tasks_id;?>"><i class="fa fa-comments"></i> <?=get_phrase('comments');?></button>
									<button id="<?=$task->tasks_id;?>" data-placement="top" class="btn btn-default action_popup_edit"><i class="fa fa-pencil"></i> <?=get_phrase('edit');?></button>
								</div>
							</td>
						</tr>
					<?php endforeach;?>	
				</table>
		</div>
	</div>
</div>		


  	
    	
<?php include 'task_popover_add.php';?>     	
<?php include 'task_popover_edit.php';?> 
<?php include 'task_popover_comments.php';?> 

<script>
$(document).ready(function(){

   $('.action_popup').popover({
   		trigger:"click",
   		html:true,
   		title: function(){
   			var id = $(this).attr('id');
           	return $('#popover_'+id).children(".popover-heading").html();   			
   		}, 
   		content: function(){
   			var id = $(this).attr('id');
           	return $('#popover_'+id).children(".popover-body").html(); 
   		}
   		
   		}); 
   		
   		
   $('.action_popup_edit').popover({
   		trigger:"click",
   		html:true,
   		title: function(){
   			//var id = $(this).attr('id');
           	return $('#popover_edit_task').children(".popover-heading").html();   			
   		}, 
   		content: function(){
   			var id = $(this).attr('id');
   			$.ajax({
   				url:"<?=base_url();?>index.php?coach/get_task_details/"+id,
   				success:function(response){
   					
   					var obj = JSON.parse(response);
   					
   					$('#tasks_name').val(obj.tasks_name);
   					$('#tasks_due_date').val(obj.tasks_due_date);
   					$('#notes').val(obj.notes);
   					$('#goals_id').val(obj.goals_id);
   					$('#edit_tasks_id').val(obj.tasks_id);
   				}
   			});
           	return $('#popover_edit_task').children(".popover-body").html(); 
   		}
   		
   		});
   		
   		
   		
   	$('.action_popup_add_comment').popover({
   		trigger:"click",
   		html:true,
   		placement:"left",
   		title: function(){
   			//var id = $(this).attr('id');
           	return $('#popover_task_comments').children(".popover-heading").html();   			
   		}, 
   		content: function(){
   			var id = $(this).attr('id');
   			$.ajax({
   				url:"<?=base_url();?>index.php?coach/get_task_comments/"+id,
   				success:function(response){
   					$('#past_comments').html(response);
   					
   				}
   			});
           	return $('#popover_task_comments').children(".popover-body").html(); 
   		}
   		
   	});
});


	function update_task_status(elem){
		var task_id = $(elem).attr('id');
		var goals_id = "<?=$param2;?>";
		//alert(task_id);
		var url = "<?=base_url();?>index.php?coach/get_single_task_update/"+task_id;
		
		$.ajax({
			url:url,
			beforeSend:function(){
					$('#tasks_check_holder_'+task_id).html('<div style="text-align:center;"><img style="width:20px;height:20px;" src="<?php echo base_url();?>uploads/preloader4.gif" /></div>');
			},
			success:function(response){
				$('#pop_tasks_id').val(task_id);
				$('#row_'+task_id).html(response);
				
					
			}
		});
		
		//Update Progress
		var url2 = "<?=base_url();?>index.php?coach/mark_task_progress_on_add/"+goals_id;
		$.ajax({
			url:url2,
			success:function(response){
			//alert(response);
			$('#goal_progress_bar_'+goals_id).html(response);
			}
		});
	}
    	
       	
    	function add_new_task(){
				var url = $('#frm_add_task').attr('action');
				var data = $('#frm_add_task').serializeArray();
				$.ajax({
					url:url,
					data:data,
					type:"POST",
					success:function(){
						
							
							var goal_id = "<?=$param2;?>";
							
							//Update Goals list of tasks
							var url = "<?=base_url();?>index.php?coach/get_tasks_list/"+<?=$param2;?>;
							$.ajax({
								url:url,
								beforeSend:function(){
									$('#goal_tasks_display_'+goal_id).html('<div style="text-align:center;"><img style="width:60px;height:60px;" src="<?php echo base_url();?>uploads/preloader4.gif" /></div>');
								},
								success:function(response){
									showAjaxModal('<?=base_url();?>index.php?modal/popup/modal_add_goal_details/<?=$param2;?>');
									$('#goal_tasks_display_'+goal_id).html(response);
									//closePopover();
								}
							});
							
							//Update Progress
							var url2 = "<?=base_url();?>index.php?coach/mark_task_progress_on_add/"+goal_id;
							$.ajax({
								url:url2,
								success:function(response){
									//alert(response);
									$('#goal_progress_bar_'+goals_id).html(response);
								}
							});
							
							
					}
				});
				
				ev.preventDefault();
		}
    
    
    	function edit_task(){
				var url = $('#frm_edit_task').attr('action')+$('#edit_tasks_id').val();
				var data = $('#frm_edit_task').serializeArray();
				//alert(url);
				$.ajax({
					url:url,
					data:data,
					type:"POST",
					success:function(){
						var goal_id = "<?=$param2;?>";
						showAjaxModal('<?=base_url();?>index.php?modal/popup/modal_add_goal_details/<?=$param2;?>');
							
					}
				});
				
				ev.preventDefault();
		}
		
		function add_comment(){
				var url = $('#frm_add_comment').attr('action')+$('#pop_tasks_id').val();
				var data = $('#frm_add_comment').serializeArray();
				//alert(url);
				$.ajax({
					url:url,
					data:data,
					type:"POST",
					success:function(){

						$('#past_comments').html(response);
							
					}
				});
				
				ev.preventDefault();
		}
		
		
	$('.task_progress').click(function(){
		//alert('Hello');
		var id = $(this).attr('id');
		var url = "<?=base_url();?>index.php?coach?task_progress/"+id;
		
		$.ajax({
			url:url,
			beforeSend:function(){
				$('#'+id).closest('div').html('<img style="width:80px;" src="<?php echo base_url();?>uploads/preloader2.gif" />');
			},
			success:function(response){
				alert(response);
			}
		});
			
		
	});
</script>