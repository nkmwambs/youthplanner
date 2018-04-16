<div>
	<div>
		<?php 
			echo form_open(base_url() . 'index.php?coach/goals/add/', array('class' => 'form-vertical validate','enctype' => 'multipart/form-data'));
							
		?>
			<div id="" class="form-group">
				<label for="" class="col-xs-12 control-label"><?php echo get_phrase('goal_name');?></label>
				<div class="col-xs-12"><INPUT type="text" name="goals_name" id="goals_name" class="form-control" required="required"/></div>
			</div>
			
			<div id="" class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label for="" class="col-xs-12 control-label"><?php echo get_phrase('due_date');?></label>
						<div class="col-xs-12"><INPUT type="text" name="due_date" id="due_date" class="form-control datepicker" required="required"/></div>
								
					</div>

					<div class="col-md-6">
						<label for="" class="col-xs-12 control-label"><?php echo get_phrase('theme');?></label>
						<div class="col-xs-12"><INPUT type="text" name="yds_obj" id="yds_obj" class="form-control" required="required"/></div>
					</div>
				</div>
			
			</div>
			
			<div id="" class="form-group">
			
				<div class="row">
					
					<div class="col-md-6">
							<label for="" class="col-xs-12 control-label"><?php echo get_phrase('magnitude');?></label>
							<div class="col-xs-12"><INPUT type="text" name="magnitude" id="magnitude" class="form-control" required="required"/></div>
					</div>
					
					<div class="col-md-6">
							<label for="" class="col-xs-12 control-label"><?php echo get_phrase('priority');?></label>
							<div class="col-xs-12"><INPUT type="text" name="priority" id="priority" class="form-control" required="required"/></div>
					</div>
					
				</div>
			
			</div>
			
			
			<div id="" class="form-group">
					<label for="" class="col-xs-12 control-label">Why do you want to achieve this goal?</label>
					<div class="col-xs-12">
						<textarea class="form-control" id="reason" name='reason' cols="" rows="6" required='required'></textarea>
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
						<input type="checkbox" name="smart" id="smart" /> Yes, my goal is a smart goal.
					</div>
				</div>

			</div>
			
			<div class="form-group">
				<button class="btn btn-primary btn-icon"><i class="fa fa-plus"></i><?=get_phrase('create');?></button>
			</div>	
		</form>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('.datepicker').datepicker();
	});
</script>