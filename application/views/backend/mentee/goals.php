<!-- UI Panels -->
		<div class="row">
			
			<div class="col-md-10">
			
				<div class="panel minimal minimal-gray">
					
					<div class="panel-heading">

						<div class="panel-options">
							
							<ul class="nav nav-tabs">
								<li class="active"><a href="#profile-1" data-toggle="tab"><?=get_phrase('goals');?></a></li>
								<li><a href="#profile-2" data-toggle="tab"><?=get_phrase('supporting');?></a></li>
							</ul>
						</div>
					</div>
					
					<div class="panel-body">
						
						<div class="tab-content">
							<div class="tab-pane active" id="profile-1">
							
							</div>
							
							<div class="tab-pane active" id="profile-1">
							
							</div>
						
						</div>	
					</div>
			</div>
		</div>
		
		<div class="col-md-2">
			<div class="" >
				<div class="row">
					<div class="col-md-12">
						
						<div class="panel panel-basic" data-collapsed="0">
							<!-- panel head -->
							<div class="panel-heading">
								<div class="panel-title"><?=get_phrase('core_values');?></div>
								
							</div>
							
							<!-- panel body -->
							<div class="panel-body">
								<span class="pie-values"></span>
							</div>
						</div>	
						
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-basic" data-collapsed="0">
							<!-- panel head -->
							<div class="panel-heading">
								<div class="panel-title"><?=get_phrase('magnitude');?></div>
								
							</div>
							
							<!-- panel body -->
							<div class="panel-body">
								<span class="pie-magnitude"></span>
							</div>
						</div>		
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-basic" data-collapsed="0">
							<!-- panel head -->
							<div class="panel-heading">
								<div class="panel-title"><?=get_phrase('priority');?></div>
								
							</div>
							
							<!-- panel body -->
							<div class="panel-body">
								<span class="pie-priority"></span>
							</div>
						</div>		
					</div>
				</div>
			</div>
		</div>
		
	</div>							
  
<script>
	jQuery(document).ready(function($) 
		{
		
		
			$(".pie-values").sparkline([3,9,5], {
				type: 'pie',
				width: '150px ',
				height: '150px',
				sliceColors: ['green', 'brown','orange']
				
			});
			
			$(".pie-magnitude").sparkline([5,5], {
				type: 'pie',
				width: '150px ',
				height: '150px',
				sliceColors: ['red', '#c13638']
				
			});
			
			$(".pie-priority").sparkline([3,2,5], {
				type: 'pie',
				width: '150px ',
				height: '150px',
				sliceColors: ['#ee4749', '#c13638','#fe9193']
				
			});
	});		
</script>