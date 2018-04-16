   <style>
   	.hide{
   		display:none;
   	}
   	
   	.show{
   		display:block;
   	}
   </style>
    
    <header class="navbar navbar-fixed-top" style="min-height: 80px;">
		<div class="navbar-inner" >

        <!-- logo -->
		<div class="navbar-brand">
			<a href="<?php echo base_url(); ?>">
                <img src="uploads/logo.png"  style="max-height:60px;margin-top: -10px;"/>
           </a>
		</div>
	
    <ul id="" class="navbar-nav">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->

		<li>
			<button class="btn btn-default" style="margin-top: 30px;margin-left: 5px;"><?php echo $page_title;?></button>
		</li>
		
		<!--Goals Buttons-->
		
        <li class="">
        	
            <button class="btn btn-default hide goals" onclick="showAjaxModal('<?=base_url();?>index.php?modal/popup/modal_create_goal','<?=get_phrase('goal');?>');" style="margin-top: 30px;margin-left: 5px;">
                <i class="fa fa-plus"></i>
                <span><?php echo get_phrase('create_goal'); ?></span>
            </button>
    
        </li>
        
        
        <li class="">
        	
            <button class="btn btn-default hide goals dreams" onclick="showAjaxModal('<?=base_url();?>index.php?modal/popup/modal_add_coach','<?=get_phrase('coach');?>');" style="margin-top: 30px;margin-left: 5px;">
                <i class="fa fa-user-plus"></i>
                <span><?php echo get_phrase('add_coach'); ?></span>
            </button>
    
        </li>
        
        <li class="">
        	
            <button class="btn btn-default hide goals dreams" onclick="showAjaxModal('<?=base_url();?>index.php?modal/popup/modal_add_themes','<?=get_phrase('themes');?>');" style="margin-top: 30px;margin-left: 5px;">
                <i class="fa fa-pie-chart"></i>
                <span><?php echo get_phrase('add_themes'); ?></span>
            </button>
    
        </li>
        
        <!--Dreams Button-->
		
		<li class="">
        	
            <button class="btn btn-default hide dreams" onclick="showAjaxModal('<?=base_url();?>index.php?modal/popup/modal_add_dream','<?=get_phrase('dream');?>');" style="margin-top: 30px;margin-left: 5px;">
                <i class="fa fa-plus"></i>
                <span><?php echo get_phrase('create_dream'); ?></span>
            </button>
    
        </li>
        
        
        <!--Status Button-->
		
		<li class="">
        	
            <button class="btn btn-default hide status" onclick="" style="margin-top: 30px;margin-left: 5px;">
                <i class="fa fa-plus"></i>
                <span><?php echo get_phrase('add_widget'); ?></span>
            </button>
    
        </li>
        
        <!--Status Button-->
		
		<li class="">
        	
            <button class="btn btn-default hide journal" onclick="" style="margin-top: 30px;margin-left: 5px;">
                <i class="fa fa-plus"></i>
                <span><?php echo get_phrase('add_write_entry'); ?></span>
            </button>
    
        </li> 
        
        <li class="">
        	
            <button class="btn btn-default hide journal" onclick="" style="margin-top: 30px;margin-left: 5px;">
                <i class="fa fa-plus"></i>
                <span><?php echo get_phrase('add_record_tracker'); ?></span>
            </button>
    
        </li>        
       
		<li class="">
        	
            <button class="btn btn-default hide journal" onclick="" style="margin-top: 30px;margin-left: 5px;">
                <i class="fa fa-gear"></i>
                <span><?php echo get_phrase('configure_trackers'); ?></span>
            </button>
    
        </li> 
    </ul>

	
	<!-- notifications and other links -->
			<ul class="nav navbar-right pull-right">
				
				<!-- dropdowns -->
				<li class="dropdown hidden-xs">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="entypo-list"></i>
						<span class="badge badge-info">6</span>
					</a>
					
					<!-- dropdown menu (tasks) -->
					<ul class="dropdown-menu">
						<li class="top">
	<p>You have 6 pending tasks</p>
</li>

<li>
	<ul class="dropdown-menu-list scroller">
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Procurement</span>
					<span class="percent">27%</span>
				</span>
			
				<span class="progress">
					<span style="width: 27%;" class="progress-bar progress-bar-success">
						<span class="sr-only">27% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">App Development</span>
					<span class="percent">83%</span>
				</span>
				
				<span class="progress progress-striped">
					<span style="width: 83%;" class="progress-bar progress-bar-danger">
						<span class="sr-only">83% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">HTML Slicing</span>
					<span class="percent">91%</span>
				</span>
				
				<span class="progress">
					<span style="width: 91%;" class="progress-bar progress-bar-success">
						<span class="sr-only">91% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Database Repair</span>
					<span class="percent">12%</span>
				</span>
				
				<span class="progress progress-striped">
					<span style="width: 12%;" class="progress-bar progress-bar-warning">
						<span class="sr-only">12% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Backup Create Progress</span>
					<span class="percent">54%</span>
				</span>
				
				<span class="progress progress-striped">
					<span style="width: 54%;" class="progress-bar progress-bar-info">
						<span class="sr-only">54% Complete</span>
					</span>
				</span>
			</a>
		</li>
		<li>
			<a href="#">
				<span class="task">
					<span class="desc">Upgrade Progress</span>
					<span class="percent">17%</span>
				</span>
				
				<span class="progress progress-striped">
					<span style="width: 17%;" class="progress-bar progress-bar-important">
						<span class="sr-only">17% Complete</span>
					</span>
				</span>
			</a>
		</li>
	</ul>
</li>

<li class="external">
	<a href="#">See all tasks</a>
</li>					</ul>
					
				</li>
				
				<li class="dropdown">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="entypo-mail"></i>
						<span class="badge badge-secondary">10</span>
					</a>
					
					<!-- dropdown menu (messages) -->
					<ul class="dropdown-menu">
						<li>
	<form class="top-dropdown-search">
		
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search anything..." name="s" />
		</div>
		
	</form>
	
	<ul class="dropdown-menu-list scroller">
		<li class="active">
			<a href="#">
				<span class="image pull-right">
					<img src="assets/images/thumb-1@2x.png" width="44" alt="" class="img-circle" />
				</span>
				
				<span class="line">
					<strong>Luc Chartier</strong>
					- yesterday
				</span>
				
				<span class="line desc small">
					This ain’t our first item, it is the best of the rest.
				</span>
			</a>
		</li>
		
		<li class="active">
			<a href="#">
				<span class="image pull-right">
					<img src="assets/images/thumb-2@2x.png" width="44" alt="" class="img-circle" />
				</span>
				
				<span class="line">
					<strong>Salma Nyberg</strong>
					- 2 days ago
				</span>
				
				<span class="line desc small">
					Oh he decisively impression attachment friendship so if everything. 
				</span>
			</a>
		</li>
		
		<li>
			<a href="#">
				<span class="image pull-right">
					<img src="assets/images/thumb-3@2x.png" width="44" alt="" class="img-circle" />
				</span>
				
				<span class="line">
					Hayden Cartwright
					- a week ago
				</span>
				
				<span class="line desc small">
					Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
				</span>
			</a>
		</li>
		
		<li>
			<a href="#">
				<span class="image pull-right">
					<img src="assets/images/thumb-4@2x.png" width="44" alt="" class="img-circle" />
				</span>
				
				<span class="line">
					Sandra Eberhardt
					- 16 days ago
				</span>
				
				<span class="line desc small">
					On so attention necessary at by provision otherwise existence direction.
				</span>
			</a>
		</li>
	</ul>
</li>

<li class="external">
	<a href="mailbox.html">All Messages</a>
</li>					</ul>
					
				</li>
				
				<li class="dropdown">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
						<i class="entypo-globe"></i>
						<span class="badge badge-warning">1</span>
					</a>
					
					<!-- dropdown menu (messages) -->
					<ul class="dropdown-menu">
						<li class="top">
	<p class="small">
		<a href="#" class="pull-right">Mark all Read</a>
		You have <strong>3</strong> new notifications.
	</p>
</li>

<li>
	<ul class="dropdown-menu-list scroller">
		<li class="unread notification-success">
			<a href="#">
				<i class="entypo-user-add pull-right"></i>
				
				<span class="line">
					<strong>New user registered</strong>
				</span>
				
				<span class="line small">
					30 seconds ago
				</span>
			</a>
		</li>
		
		<li class="unread notification-secondary">
			<a href="#">
				<i class="entypo-heart pull-right"></i>
				
				<span class="line">
					<strong>Someone special liked this</strong>
				</span>
				
				<span class="line small">
					2 minutes ago
				</span>
			</a>
		</li>
		
		<li class="notification-primary">
			<a href="#">
				<i class="entypo-user pull-right"></i>
				
				<span class="line">
					<strong>Privacy settings have been changed</strong>
				</span>
				
				<span class="line small">
					3 hours ago
				</span>
			</a>
		</li>
		
		<li class="notification-danger">
			<a href="#">
				<i class="entypo-cancel-circled pull-right"></i>
				
				<span class="line">
					John cancelled the event
				</span>
				
				<span class="line small">
					9 hours ago
				</span>
			</a>
		</li>
		
		<li class="notification-info">
			<a href="#">
				<i class="entypo-info pull-right"></i>
				
				<span class="line">
					The server is status is stable
				</span>
				
				<span class="line small">
					yesterday at 10:30am
				</span>
			</a>
		</li>
		
		<li class="notification-warning">
			<a href="#">
				<i class="entypo-rss pull-right"></i>
				
				<span class="line">
					New comments waiting approval
				</span>
				
				<span class="line small">
					last week
				</span>
			</a>
		</li>
	</ul>
</li>

<li class="external">
	<a href="#">View all notifications</a>
</li>					</ul>
				
				</li>
				
				<!-- raw links -->
				<li class="dropdown">
										<li>
						<a href="#"><?=get_phrase('logged_as_');?> <?=$this->session->firstname;?></a>
					</li>
									</li>
				
				<li class="sep"></li>
				
				<li>
					<a href="<?=base_url();?>index.php?login/logout">
						Log Out <i class="entypo-logout right"></i>
					</a>
				</li>
				
				
				<!-- mobile only -->
				<li class="visible-xs">	
				
					<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
					<div class="horizontal-mobile-menu visible-xs">
						<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
							<i class="entypo-menu"></i>
						</a>
					</div>
					
				</li>
				
			</ul>
			
			
	</div>    
    </header>
    
	<script>
	    	$(document).ready(function(){
	    		var uri = '<?=$this->uri->segment(2);?>';
	    		$('.'+uri).toggleClass('show','hide');
	    	});
	</script>
