<div class="sidebar-menu" style="position: absolute;top:75px;">

    <div class="sidebar-menu-inner">	
    <ul id="main-menu" class="main-menu">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->

        <!-- Personal -->       
        
        <li class="<?php
        if ($page_name == 'goals' ||
            $page_name == 'dreams'||
			$page_name == 'status'||
			$page_name == 'journal'||
			$page_name == 'reports'||
			$page_name == 'goals_settings')
            
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="fa fa-user"></i>
                <span><?php echo get_phrase('personal'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'goals') echo 'active'; ?> ">
                    <a href="<?php echo base_url("index.php?coach/goals"); ?>">
                        <span><i class="fa fa-star-o"></i> <?php echo get_phrase('goals'); ?></span>
                       <div class="badge badge-info" id="goals_count"><?php $goals_count = $this->db->get_where('goals',array('users_id'=>$this->session->login_user_id))->num_rows(); echo $goals_count;?></div>
                    </a>
                </li>

                <li class="<?php if ($page_name == 'dreams') echo 'active'; ?> ">
                			<a href="<?php echo base_url("index.php?coach/dreams"); ?>">
                        <span><i class="fa fa-cloud"></i> <?php echo get_phrase('dreams'); ?></span>
                        <span class="badge badge-info"><?php $dreams_count='2'; echo $dreams_count;?></span>
                        
                   </a> 
                </li> 
                
                <li class="<?php if ($page_name == 'status') echo 'active'; ?> ">
                    <a href="<?php echo base_url("index.php?coach/status"); ?>">
                        <span><i class="fa fa-heartbeat"></i> <?php echo get_phrase('status'); ?></span>

                    </a>
                </li>
                
                <li class="<?php if ($page_name == 'journal') echo 'active'; ?> ">
                    <a href="<?php echo base_url("index.php?coach/journal"); ?>">
                        <span><i class="fa fa-bookmark"></i> <?php echo get_phrase('journal'); ?></span>
                    </a>
                </li>
                
                <li class="<?php if ($page_name == 'reports') echo 'active'; ?> ">
                    <a href="<?php echo base_url("index.php?coach/reports"); ?>">
                        <span><i class="fa fa-line-chart"></i> <?php echo get_phrase('reports'); ?></span>
                    </a>
                </li>
                
                <li class="<?php if ($page_name == 'goals_settings') echo 'active'; ?> ">
                    <a href="<?php echo base_url("index.php?coach/goals_settings"); ?>">
                        <span><i class="fa fa-cog"></i> <?php echo get_phrase('settings'); ?></span>
                    </a>
                </li>
                              
            </ul>
        </li>
        
        <!-- ACCOUNT -->
        <li class="<?php if ($page_name == 'mentees') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?coach/mentees">
                <i class="fa fa-users"></i>
                <span><?php echo get_phrase('mentees'); ?></span>
            </a>
        </li>

        <!-- ACCOUNT 
        <li class="<?php if ($page_name == 'business') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?coach/business">
                <i class="fa fa-briefcase"></i>
                <span><?php echo get_phrase('business'); ?></span>
            </a>
        </li>-->
        
        <li class="<?php
        if ($page_name == 'settings' ||
            $page_name == 'coaches'||
			$page_name == 'mentees'||
			$page_name == 'groups'||
			$page_name == 'objectives'||
			$page_name == 'scales'||
			$page_name == 'language'||
			$page_name == 'profile')
            
            echo 'opened active';
        ?> ">
            <a href="#">
                <i class="fa fa-briefcase"></i>
                <span><?php echo get_phrase('business'); ?></span>
            </a>
            <ul>
                <li class="<?php if ($page_name == 'settings') echo 'active'; ?> ">
                    <a href="<?php echo base_url("index.php?coach/goals"); ?>">
                        <span><i class="fa fa-cogs"></i> <?php echo get_phrase('settings'); ?></span>
                    </a>
                </li>

                <li class="<?php if ($page_name == 'coaches') echo 'active'; ?> ">
                			<a href="<?php echo base_url("index.php?coach/coaches"); ?>">
                        <span><i class="fa fa-user"></i> <?php echo get_phrase('coaches'); ?></span>
                        
                   </a> 
                </li> 
                
                <li class="<?php if ($page_name == 'mentees') echo 'active'; ?> ">
                    <a href="<?php echo base_url("index.php?coach/mentees"); ?>">
                        <span><i class="fa fa-users"></i> <?php echo get_phrase('mentees'); ?></span>

                    </a>
                </li>
                
                <li class="<?php if ($page_name == 'groups') echo 'active'; ?> ">
                    <a href="<?php echo base_url("index.php?coach/groups"); ?>">
                        <span><i class="fa fa-sitemap"></i> <?php echo get_phrase('groups'); ?></span>

                    </a>
                </li>
                
                <li class="<?php if ($page_name == 'objectives') echo 'active'; ?> ">
                    <a href="<?php echo base_url("index.php?coach/objectives"); ?>">
                        <span><i class="fa fa-pie-chart"></i> <?php echo get_phrase('YDS_objectives'); ?></span>
                    </a>
                </li>
                
                <li class="<?php if ($page_name == 'scales') echo 'active'; ?> ">
                    <a href="<?php echo base_url("index.php?coach/scales"); ?>">
                        <span><i class="fa fa-balance-scale"></i> <?php echo get_phrase('scales'); ?></span>
                    </a>
                </li>
                
                <li class="<?php if ($page_name == 'language') echo 'active'; ?> ">
                    <a href="<?php echo base_url("index.php?coach/language"); ?>">
                        <span><i class="fa fa-info-circle"></i> <?php echo get_phrase('language'); ?></span>
                    </a>
                </li>
                
                <li class="<?php if ($page_name == 'profile') echo 'active'; ?> ">
                    <a href="<?php echo base_url("index.php?coach/manage_profile"); ?>">
                        <span><i class="fa fa-lock"></i> <?php echo get_phrase('profile'); ?></span>
                    </a>
                </li>
                              
            </ul>
        </li>
        

    </ul>

</div>
</div>

	<script>
	    	//$(document).ready(function(){
	    		//var uri = '<?=$this->uri->segment(2);?>';
	    		//$('.'+uri).toggleClass('show','hide');
	    	//});
	</script>
