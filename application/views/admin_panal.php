		<h4>This is admin panal</h4>
<div class ='pagination pagination-centered'>
<?php
if($record){
	echo $record;
	echo $this->pagination->create_links();
}
else
{
	echo "No user to show";
}
?>
</div>