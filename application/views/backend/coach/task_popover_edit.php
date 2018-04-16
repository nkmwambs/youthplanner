<div id="popover_edit_task" class="hidden">
    <div class="popover-heading"><?=get_phrase('edit_task');?></div>
    
    <div class="popover-body">
    	<?php 
			 echo form_open(base_url() . 'index.php?coach/edit_task/', array('id'=>'frm_edit_task','class' => 'form-horizontal validate','enctype' => 'multipart/form-data'));
			//echo form_open("", array('id'=>'frm_add_task','class' => 'form-horizontal validate','enctype' => 'multipart/form-data'));
		?>   
		
			<div class="form-group">
				<!-- <label for="" class="col-xs-12 control-label"><?php echo get_phrase('task_title');?></label> -->
				<div class="col-xs-12"><INPUT type="text" name="tasks_name" id="tasks_name" class="form-control" placeholder="<?php echo get_phrase('task_title');?>" required="required"/></div>
			</div>
			
			<input  type="hidden" id="edit_tasks_id" />
			<input  type="hidden" name="goals_id" id="goals_id" />
			
			<div  class="form-group">
				<!-- <label for="" class="col-xs-12 control-label"><?php echo get_phrase('due_date');?></label> -->
				<div class="col-xs-12">
					<div class="input-group">
						<input placeholder="<?php echo get_phrase('due_date');?>" type="text" name="tasks_due_date" id="tasks_due_date" data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" 
							data-format="yyyy-mm-dd" data-start-date="" 
								data-end-date="" readonly="readonly">
												
							<div class="input-group-addon">
								<a href="#"><i class="entypo-calendar"></i></a>
							</div>
					</div>

				</div>
			</div>
			
			<div  class="form-group">
				<!-- <label for="" class="col-xs-12 control-label"><?php echo get_phrase('notes');?></label> -->
				<div class="col-xs-12">
						<textarea class="form-control" name="notes" id="notes" placeholder="<?=get_phrase('notes');?>"></textarea>

				</div>
			</div>
			
			
			

			
			</form>
			
			<div class="form-group">
				<div class="col-xs-12" style="text-align: center;">
					<button class="btn btn-default" onclick="edit_task();" id="save_task">
						<i class="fa fa-pencil"></i>
						<span><?php echo get_phrase('edit_task'); ?></span>
					</button>
					
					<!-- <div class="btn btn-default pull-right" id="close_popover"><i class="fa fa-minus"></i> <?=get_phrase('close');?></div> -->
				</div>
			</div>
			
			<div  class="form-group">
				<label for="" class="col-xs-12" style="text-align: center;"><?php echo get_phrase('click_edit_task_button_to_exit');?></label>
				
			</div>		
		 
    </div>
</div> 

