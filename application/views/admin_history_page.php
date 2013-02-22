<div class ='pagination pagination-centered'>
<?php
if($record){
	echo $record;
	echo $this->pagination->create_links();
}
else
{
	echo "No history to show";
}
?>
</div>