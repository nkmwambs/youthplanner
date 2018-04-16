<div class="progress" style="height: 10px;margin-top: 2px;margin-left: 5px;" title="<?=number_format(($count_completed_tasks/$count_of_tasks)*100);?>% <?=get_phrase('completed');?>">
	<div class="progress-bar" role="progressbar" aria-valuenow="<?=$count_completed_tasks;?>"
		aria-valuemin="0" aria-valuemax="<?=$count_of_tasks;?>" style="width:<?=($count_completed_tasks/$count_of_tasks)*100;?>%">
			
	</div>
</div>