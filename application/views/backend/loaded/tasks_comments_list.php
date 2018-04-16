<div class="col-sm-12">
	<?php if(sizeof($comments)>0){?>
		
				<table class="table table-bordered" style="background-color:#ffffff;">
					<?php  foreach($comments as $comment):?>
						<tr style="color: #336699;font-weight:bold;font-size: 10pt;">
							<td>
																
								<div  class="pull-left" >
									<?=$comment->task_comment;?>
								</div>
								
							</td>
						</tr>
					<?php endforeach;?>	
				</table>	
	
	<?php }else{?>
		<div class="well"><?=get_phrase('comments_not_available');?></div>
	<?php }?>	
</div>