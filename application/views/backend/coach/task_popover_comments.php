<!-- <div id="popover_task_comments" class="hidden">
    <div class="popover-heading"><?=get_phrase('add_comment');?></div>
    
    <div class="popover-body">
    	
    	
    	
    	<?php 
			 echo form_open(base_url() . 'index.php?coach/add_comment/', array('id'=>'frm_add_comments','class' => 'form-horizontal validate','enctype' => 'multipart/form-data'));
			
		?>   
				
			<div class="form-group">
				<div class="col-sm-12" id="past_comments"><input type="text" class="form-control" value="No Comments" /></div>
			</div>	
				
			<div class="form-group">
				<div class="col-sm-12"><textarea class="form-control" id="" name=""></textarea></div>
			</div>
			
			
			</form>
			
			<div class="form-group">
				<div class="col-xs-12" style="text-align: center;">
					<button class="btn btn-default" onclick="edit_task();" id="save_comment">
						<i class="fa fa-save"></i>
						<span><?php echo get_phrase('save'); ?></span>
					</button>
					

				</div>
			</div>
			
			<div  class="form-group">
				<label for="" class="col-xs-12" style="text-align: center;"><?php echo get_phrase('click_comments_button_to_exit');?></label>
				
			</div>		
		 
    </div>
</div>  -->

<div id="popover_task_comments" class="hidden">
    <div class="popover-heading"><?=get_phrase('add_comment');?></div>
    
    <div class="popover-body">
    	<?php 
			 echo form_open(base_url() . 'index.php?coach/add_comment/', array('id'=>'frm_add_comment','class' => 'form-horizontal validate','enctype' => 'multipart/form-data'));
		?>   
		
				<div class="form-group">
	
					<div class="col-xs-12" id="past_comments"></div>
				</div>
	
				<input  type="hidden" id="pop_tasks_id" />
				
				<div  class="form-group">
	
					<div class="col-xs-12">
							<textarea class="form-control" name="comment" id="comment" placeholder="<?=get_phrase('comment');?>"></textarea>
	
					</div>
				</div>
	
			</form>
			
			<div class="form-group">
				<div class="col-xs-12" style="text-align: center;">
					<button class="btn btn-default" onclick="add_comment();" id="save_task">
						<i class="fa fa-pencil"></i>
						<span><?php echo get_phrase('save'); ?></span>
					</button>
					
					<!-- <div class="btn btn-default pull-right" id="close_popover"><i class="fa fa-minus"></i> <?=get_phrase('close');?></div> -->
				</div>
			</div>
			
			<div  class="form-group">
				<label for="" class="col-xs-12" style="text-align: center;"><?php echo get_phrase('click_save_button_to_exit');?></label>
				
			</div>		
		 
    </div>
</div> 

