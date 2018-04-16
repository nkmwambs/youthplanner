<div id="theme-chart"></div>

<script>
			Morris.Donut({
			  element: 'theme-chart',
			  data: [
			  		<?php 
			  			$themes = $this->db->get_where("goal_themes",array('theme_status'=>1))->result_object();
			  			foreach($themes as $row):
							$goals_count = $this->db->get_where("goals",array("yds_obj"=>$row->goal_themes_id))->num_rows();
			  		?>
			  		
			  			{label: "<?=$row->theme_name;?>", value: <?=$goals_count;?>},
			  		<?php endforeach;?>
	
			  ]
			});
</script>