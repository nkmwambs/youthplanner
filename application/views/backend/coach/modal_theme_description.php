<div class="row">
	<div class="col-sm-12">
		<div class="panel minimal minimal-gray" data-collapsed="0">
        	<!-- <div class="panel-heading">
            	<div class="panel-title">
                	<i class="fa fa-note"></i>
                    	<?php echo get_phrase('theme_description');?>
                </div>
            </div> -->
            <div class="panel-body">
                 <?php 
                 	echo $this->db->get_where("goal_themes",array('goal_themes_id'=>$param2))->row()->theme_description;   	
                 ?>
			</div>
		</div>
	</div>
</div>