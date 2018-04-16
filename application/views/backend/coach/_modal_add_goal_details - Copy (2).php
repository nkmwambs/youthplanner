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
		<!--data-toggle="popover" data-trigger="click" data-placement="left" data-content="It's so simple to create a tooltop for my website!" data-original-title="Twitter Bootstrap Popover"-->
		<button id="add_task" class="btn btn-default action_popup">
	       <i class="fa fa-plus"></i>
	          <span><?php echo get_phrase('add_task'); ?></span>
	    </button>
	
	</div>
</div>
<hr/>
<div class="row">
	<div class="col-sm-12">
		<div id="tasks_view">
			<table class="table table-striped">
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
			</table>
		</div>
	</div>
</div>		


<!--<div id="popover_view_notes" class="hidden">
    <div class="popover-heading"><?=get_phrase('note');?></div>
    
    <div class="popover-body">
 
    	<textarea style="overflow:hidden" cols="25" rows="5" class="form-control" name="notes" placeholder="<?=get_phrase('enter_notes_here');?>"></textarea><br/>
    	<button class="btn btn-primary"><?=get_phrase('save');?></button>
    	
    </div>
    
</div> -->   
    	
    	
    	

<div id="popover_add_task" class="hidden">
    <div class="popover-heading"><?=get_phrase('add_task');?></div>
    
    <div class="popover-body">
    	<?php 
			echo form_open(base_url() . 'index.php?coach/add_task/', array('id'=>'frm_add_task','class' => 'form-vertical validate','enctype' => 'multipart/form-data'));
			
		?>   
		
			<div class="form-group">
				<label for="" class="col-xs-12 control-label"><?php echo get_phrase('task_title');?></label>
				<div class="col-xs-12"><INPUT type="text" name="tasks_name" id="tasks_name" class="form-control" required="required"/></div>
			</div>
			
			<!--<div  class="form-group">
				<div class="col-xs-12 text-nowrap">
					<div class="col-sm-4"><input type="radio" name="" value="single" checked="checked" /> <?=get_phrase('single');?></div>
					<div class="col-sm-4"></div>
				</div>
			</div>-->	
			
			<input  type="hidden" name="goals_id" value="<?=$param2;?>"/>
			
			<div  class="form-group">
				<label for="" class="col-xs-12 control-label"><?php echo get_phrase('due_date');?></label>
				<div class="col-xs-12">
					<div class="input-group">
						<input type="text" name="tasks_due_date" id="tasks_due_date" data-provide="datepicker" data-date-format="yyyy-mm-dd" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" 
							data-format="yyyy-mm-dd" data-start-date="" 
								data-end-date="" readonly="readonly">
												
							<div class="input-group-addon">
								<a href="#"><i class="entypo-calendar"></i></a>
							</div>
					</div>

				</div>
			</div>
			
			<div  class="form-group">
				<label for="" class="col-xs-12 control-label"><?php echo get_phrase('notes');?></label>
				<div class="col-xs-12">
						<textarea class="form-control" name="notes" id="notes" placeholder="<?=get_phrase('notes');?>"></textarea>

				</div>
			</div>
			
			
			
			<div class="form-group">
				&nbsp;
			</div>
			</form>
			<div class="form-group">
				<button id="btn_add_task" onclick="add_task(this);" class="btn btn-primary btn-icon"><i class="fa fa-plus"></i><?=get_phrase('add_task');?></button>
			</div>
			
			<div class="form-group">
				&nbsp;
			</div>
		
		 
    </div>
</div> 

<script>
$(document).ready(function(){

   //$('.action_popup').popover({
   	//	html:true,
   		//title: function(){
   			//var id = $(this).attr('id');
           	//return $('#popover_'+id).children(".popover-heading").html();   			
   		//}, 
   		//content: function(){
   			//var id = $(this).attr('id');
           	//return $('#popover_'+id).children(".popover-body").html(); 
   		//}
   		//}); 
   		
   		
   		$('.action_popup').popover({  
		      title:'Task',  
		      content:fetchData,
		      html:true,  
		      placement:'right'  
		}); 

        function fetchData(){  
                var fetch_data = '';  
               
                $.ajax({  
                     url:"<?=base_url();?>index.php?Coach/tasks_form",            
                     success:function(data){ 
                     	//var obj = JSON.parse(data);	 
                          //fetch_data = obj.view;  
                          fetch_data = data;
                          
                     }  
                });  
                return fetch_data;  
           }

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