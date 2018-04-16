<style>
	.tasks{border: 1px solid #D3D3D3;margin-bottom: 5px;padding: 15px;border-radius: 5px;background-color: #D3D3D3;}
</style>

<?php $goal = $this->db->get_where('goals',array('goals_id'=>$param2))->row();?>
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
				<button class="btn btn-default" onclick="" style="margin-top: -10px;">
	                <i class="fa fa-pencil"></i>
	                <span><?php echo get_phrase('edit'); ?></span>
	            </button>
			</div>
	</div>	
</div>

<hr/>

<div class="row">
	<div class="col-sm-12">
		
		<button id="add_task" class="btn btn-default" onclick="showAjaxModal('<?=base_url();?>index.php?modal/popup/modal_add_task/<?=$goal->goals_id;?>');">
	       <i class="fa fa-plus"></i>
	          <span><?php echo get_phrase('add_task'); ?></span>
	    </button>
	
	</div>
</div>
<hr/>
<div class="row">
	<div class="col-sm-12">
		<div id="tasks_view">
			<!-- <table class="table table-striped">
				<thead></thead>
				<tbody>
					<?php
						$tasks = $this->db->get_where('tasks',array('goals_id'=>$param2))->result_object();
						foreach($tasks as $row):
					?>
						<tr>
							<td><div><input type="checkbox" name="" id="<?=$row->tasks_id;?>" class="task_progress" onclick="task_progress(this);"/></div> <?=$row->tasks_name;?></td>
							<td>
								<span class="fa fa-drivers-license-o"></span> |
								<span><?=get_phrase('due');?>: <?=$row->tasks_due_date;?></span> |
								<button class="btn btn-default"><i class="fa fa-pencil"></i> <?=get_phrase('edit');?></button>
							</td>
						</tr>
					<?php
						endforeach;
					?>
			</tbody>
			</table> -->
			
			<table class="table">
					<?php  
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
						<tr style="background-color: #eff5f6;<?=$opacity;?>">
							<td>
								<div style="" class="pull-left" id="tasks_check_holder_<?=$task->tasks_id;?>">
									<input type="checkbox" <?=$checked;?> class="task <?=$task->goals_id;?>" id="<?=$task->tasks_id;?>" style="width: 20px;height: 20px;" />
								</div>  
								
								<div  class="pull-left" style="font-size: 12pt;<?=$strike;?>;">
									<?=$task->tasks_name;?>
								</div>
								
								<div style="font-weight:bold;font-size: 8pt;" class="pull-right">
									<?php if($task->tasks_status==='1'){?>
										<?=get_phrase('due');?>: <?=date('j M Y',strtotime($task->tasks_due_date));?>
									<?php }else{?>
										<?=get_phrase('completed_by');?> <?=$this->db->get_where('users',array('users_id'=>$task->completed_by))->row()->firstname;?> <?=get_phrase('on');?> <?=$task->timestamp;?>	
									<?php }?>	
								</div>
							</td>
						</tr>
					<?php endforeach;?>	
				</table>
		</div>
	</div>
</div>		




<script>
$(document).ready(function(){

 		


});

	 function add_task(el){
        var data = $('#frm_add_task').serializeArray();
        var url =  "<?=base_url();?>index.php?coach/add_task";
        //alert(url);
        $.ajax({
        	url:url,
        	data:data,
        	type:'POST',
        	success:function(response){
        		$('#tasks_view').html(response);
        	}
        });
    };
    
    $('body').on('click', function (e) {
    	$('.action_popup').each(function () {

            if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            	$(this).popover('hide');
        	}

    	});
    });

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