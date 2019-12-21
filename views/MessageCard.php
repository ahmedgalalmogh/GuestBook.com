<?php

function messageCardCreator($arr,$head,$caller,$conn)
{
	
	if(count($arr)>0)
	{   

		foreach ($arr as $value) 
		{ 
			if ($head!='reply')
			{
		
				echo'<div class="list-group col-lg-10"><a href="messageDetail.php?id='.$value->get_id().'"';
			}
			else if ($head=='reply')
			{
					echo'<div class="list-group col-lg-10">
					<a ';
			}
			echo 'class="list-group-item" style="opacity:0.7;background:white;">
				<h4 class="list-group-item-heading">:'.$head.':</h4>
				<p class="list-group-item-text">
				<span> Content :'.$value->get_content().'</span>
				</p>
			  </a>
			</div>
			<div class="col-lg-1" style="margin-top:3px">
			
			<a class="btn" href="delete.php?type='.$head.'&id='.$value->get_id().'&call='.$caller.'"style=";color:white"><span style="padding-right:5px"class="glyphicon glyphicon-trash"></span>delete </a>
			';
			if ($caller!='Recieved')
			{
				echo '<a class="btn" href="edit.php?type='.$head.'&id='.$value->get_id().'"style=";color:white"><span style="padding-right:5px" class="glyphicon glyphicon-edit"></span>edit</a>';
			}
			
		echo '</div>'	;
			
		}
	}
	
	else
	{
		echo '<span style="margin-left:30%;color:white"> No  Messages </span>';
	}
	
	
}

?>