<style>
	select{
	  font-family: FontAwesome, sans-serif;
	}
</style>

<div>
	<div>
		<?php 
		
			$goal = $this->db->get_where('goals',array('goals_id'=>$param2))->row();
			
			echo form_open(base_url() . 'index.php?coach/edit_goal/'.$param2, array('id'=>'frm_edit_goal','class' => 'form-vertical validate','enctype' => 'multipart/form-data'));
							
		?>
			<div id="" class="form-group">
				<label for="" class="col-xs-12 control-label"><?php echo get_phrase('goal_name');?></label>
				<div class="col-xs-12"><INPUT type="text" name="goals_name" id="goals_name" value="<?=$goal->goals_name;?>" class="form-control" required="required"/></div>
			</div>
			
			<input type="hidden" name="users_id" id="users_id" value="<?=$this->session->login_user_id;?>" />
			
			<div id="" class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label for="" class="col-xs-12 control-label"><?php echo get_phrase('due_date');?></label>
						<div class="col-xs-12">
							<!--<INPUT type="text" name="due_date" id="due_date" class="form-control datepicker" required="required"/>-->
							<div class="input-group">
												<input type="text" name="due_date" id="due_date" data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" 
													data-format="yyyy-mm-dd" data-start-date="" 
														data-end-date="" readonly="readonly" value="<?=$goal->due_date;?>">
												
												<div class="input-group-addon">
													<a href="#"><i class="entypo-calendar"></i></a>
												</div>
											</div>
						</div>
								
					</div>

					<div class="col-md-6">
						<label for="" class="col-xs-12 control-label"><?php echo get_phrase('theme');?></label>
						<div class="col-xs-12">
							<!--<INPUT type="text" name="yds_obj" id="yds_obj" class="form-control" required="required"/>-->
							<select class="form-control" name="yds_obj" id="yds_obj" required="required">
								<option value=""><?=get_phrase('select');?></option>
								<?php 
									$themes = $this->db->get('goal_themes')->result_object();
									foreach($themes as $row):
								?>
									<option value="<?=$row->goal_themes_id;?>" <?php if($row->goal_themes_id===$goal->yds_obj) echo "selected";?>><?=$row->theme_name;?></option>
								<?php 
									endforeach;
								?>
							</select>
						</div>
					</div>
				</div>
			
			</div>
			
			<div id="" class="form-group">
			
				<div class="row">
					
					<div class="col-md-6">
							<label for="" class="col-xs-12 control-label"><?php echo get_phrase('magnitude');?></label>
							<div class="col-xs-12">
								<!--<INPUT type="text" name="magnitude" id="magnitude" class="form-control" required="required"/>-->
								<select class="form-control" name="magnitude" id="magnitude" required="required">
									<option value=""><?=get_phrase('select');?></option>
									<?php 
										$magnitude = $this->db->get('goal_magnitude')->result_object();
										foreach($magnitude as $row):
									?>
										<option value="<?=$row->goal_magnitude_id;?>" <?php if($row->goal_magnitude_id===$goal->magnitude) echo "selected";?>><?=$row->magnitude_name;?></option>
									<?php 
										endforeach;
									?>
								</select>
							</div>
					</div>
					
					<div class="col-md-6">
							<label for="" class="col-xs-12 control-label"><?php echo get_phrase('priority');?></label>
							<div class="col-xs-12">
								<!--<INPUT type="text" name="priority" id="priority" class="form-control" required="required"/>-->
								<select class="form-control" name="priority" id="priority" required="required">
									<option value=""><?=get_phrase('select');?></option>
									<?php 
										$priority = $this->db->get('goal_priority')->result_object();
										foreach($priority as $row):
									?>
										<option value="<?=$row->goal_priority_id;?>" <?php if($row->goal_priority_id===$goal->priority) echo "selected";?>><i class="<?=$row->icon;?>"></i><?=$row->priority_name;?></option>
									<?php 
										endforeach;
									?>
								</select>
							</div>
					</div>
					
				</div>
			
			</div>
			
			
			<div id="" class="form-group">
					<label for="" class="col-xs-12 control-label">Why do you want to achieve this goal?</label>
					<div class="col-xs-12">
						<textarea class="form-control" id="reason" name='reason' cols="" rows="6" required='required'><?=$goal->reason;?></textarea>
					</div>
			</div>	
			
			<div class="form-group">
				<div class="row">
					<div class="col-md-12">
						<p>Is your goal a S.M.A.R.T. goal?</p>
						<ul>
							<li>Specific: Does the goal clearly state what it will achieve?</li>
							<li>Measurable: Will you know if you achieved your goal?</li>
							<li>Achievable: Is this a goal that can actually be achieved?</li>
							<li>Relevant: Does this goal reflect values in your life?</li>
							<li>Time specific: When do you want to achieve this goal by?</li>
						</ul>
					</div>
					
					<div class="col-md-12">
						<input type="checkbox" value="1" <?php if($goal->smart==='1') echo "checked";?> name="smart" id="smart" /> Yes, my goal is a smart goal.
					</div>
				</div>

			</div>
			
			<div class="form-group">
				<button id="btn_edit_goal" class="btn btn-primary btn-icon"><i class="fa fa-pencil"></i><?=get_phrase('edit');?></button>
			</div>	
		</form>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd'
		});
		
		$('#btn_edit_goal').click(function(ev){
			
			var url = $('#frm_edit_goal').attr('action');
			var data = $('#frm_edit_goal').serializeArray();
			$.ajax({
				url:url,
				data:data,
				type:"POST",
				beforeSend:function(){
					jQuery('#modal_ajax .modal-body').html('<div style="text-align:center;margin-top:200px;"><img src="<?php echo base_url();?>uploads/preloader.gif" /></div>');
				},
				success:function(response){
					showAjaxModal('<?=base_url();?>index.php?modal/popup/modal_add_goal_details/<?=$param2;?>');
					$('#goal_<?=$param2;?>').html(response);
				}
			});
			
			ev.preventDefault();
		});
	});
</script>