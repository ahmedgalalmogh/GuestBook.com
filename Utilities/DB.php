<?php
include_once("../models/User.php");
include_once("../models/Message.php");
include_once("../models/reply.php");
function connect()
{
	
	
    $conn = new mysqli("sql12.freemysqlhosting.net", 'sql12316183', 'LHwp6NJ2W5','sql12316183');
   if ($conn->connect_error) 
    {
		die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
$conn=connect();
function insert($table,$data,$_conn)
{
	
	if ($table=="User")
	{
	$name=$data->get_name();$email=$data->get_email();$password=$data->get_password();	
		$ins_query="insert into User (name,email,password) values ('$name','$email','$password')";
		$answer= mysqli_query($_conn, $ins_query)or die(mysqli_error($_conn));
	}
	else if ($table=="Message")
	{
		$sender=$data->get_sender();$reciever=$data->get_reciever();$content=$data->get_content();
		$query="insert into Message(user_id,content,reciever) values ($sender,'$content',$reciever)";
		$answer= mysqli_query($_conn, $query)or die(mysqli_error($_conn));
	}
	else if ($table=="reply")
	{
		echo "hii";;
		$content=$data->get_content();$messageId=$data->get_messageId();
		$query='insert into reply (message_id,content) values ('.$messageId.',"'.$content.'")';
		$answer= mysqli_query($_conn, $query)or die(mysqli_error($_conn));
	}
	
}

function view($table,$parms,$_conn)//sent
{	
	if ($table=="User")
		{
			$query = "SELECT* FROM User";
			$answer= mysqli_query($_conn,$query)or die(mysqli_error($_conn));
			if (mysqli_num_rows($answer) > 0) 
			{
				while($row = mysqli_fetch_array($answer)) 
				{
					
					$list[] = new User($row[0],$row[1],$row[2],$row[3]);		   
				}
				
				
				return $list;
			}
							return null;		

			
		}
		else if ($table=="Message")
		{
			$query = "SELECT* FROM Message where user_id=$parms";
			$answer= mysqli_query($_conn,$query)or die(mysqli_error($_conn));
			if (mysqli_num_rows($answer) > 0) 
			{
				while($row = mysqli_fetch_array($answer)) 
				{
					
					$list[] = new Message($row[0],$row[1],$row[2],$row[3]);
							   
				}				
				return $list;
			}
							return null;		

			
		}
		else if ($table=="reply")
		{
			$query = "SELECT* FROM reply where message_id=$parms";
			$answer= mysqli_query($_conn,$query)or die(mysqli_error($_conn));
			if (mysqli_num_rows($answer) > 0) 
			{
				while($row = mysqli_fetch_array($answer)) 
				{
					
					$list[] = new reply($row[0],$row[1],$row[2]);
							   
				}				
				return $list;
			}
							return null;		

			
		}
}

function Update($table,$data,$_conn)
{
	if ($table=="User")
	{
	$name=$data->get_name();$email=$data->get_email();$password=$data->get_password();$id=$data->get_id();
	$query="UPDATE User set name ='$name',password ='$password',email='$email' where id=$id";
	$answer= mysqli_query($_conn, $query)or die(mysqli_error($_conn));
	}
	else if ($table=="Message")
	{
	$sender=$data[0]->get_sender();$reciever=$data[0]->get_reciever();$content=$data[0]->get_content();$id=$data[0]->get_id();
	$query="UPDATE Message set user_id='$sender',reciever='$reciever',Content='$content'where id=$id";
		$answer= mysqli_query($_conn, $query)or die(mysqli_error($_conn));
	}
	else if($table=="reply")
	{
		$id=$data[0]->get_id();$content=$data[0]->get_content();$messageId=$data[0]->get_messageId();
		$query="UPDATE reply set message_id='$messageId',content='$content'where id=$id";
		$answer= mysqli_query($_conn, $query)or die(mysqli_error($_conn));
	}	
}

function select($table,$parm,$_conn)
{	
	if ($table=="User")
		{
			$query = "SELECT * FROM User where email='$parm'";
			$answer= mysqli_query($_conn,$query)or die(mysqli_error($_conn));
				$row = mysqli_fetch_array($answer);
				$obj= new User($row[0],$row[1],$row[2],$row[3]);	
				return $obj;		
		}
		

	else if ($table=="Message")
		{
			
			$query = "SELECT * FROM Message where id=$parm";
			$answer= mysqli_query($_conn,$query)or die(mysqli_error($_conn));
			if (mysqli_num_rows($answer) > 0) 
			{
			$row = mysqli_fetch_array($answer);
			$obj[]=new Message($row[0],$row[1],$row[2],$row[3]);	
			
				return $obj;	
			}			
				return null;		
			
				
		}
		
	else if ($table=="reply")
		{
			$query = "SELECT * FROM reply where id=$parm";
			$answer= mysqli_query($_conn,$query)or die(mysqli_error($_conn));
			if (mysqli_num_rows($answer) > 0) 
			{
				$row = mysqli_fetch_array($answer);
				
				$obj[]= new reply($row[0],$row[1],$row[2]);
				
				
				return $obj;	
			}
				return null;		
				
		}
		
		
}

function remove($table,$id,$_conn,$caller)
{
	if ($table=="Message" && $caller=='sent')
	{	
		removeAllReply($id,$_conn);
		$query = "delete FROM Message where id=$id";
	$answer= mysqli_query($_conn,$query)or die(mysqli_error($_conn));
		
	}
	else if ($table=="Message"&&  $caller=='Recieved')
	{	
		$query = "UPDATE Message set reciever=NULL where id=$id";	
		$answer= mysqli_query($_conn,$query)or die(mysqli_error($_conn));

	}
	
	if ($table=="reply")
	{  
			$query = "delete FROM reply where id=$id";
			$answer= mysqli_query($_conn,$query)or die(mysqli_error($_conn));

		
	}

	
}
function removeAllReply($id,$_conn)
{
	
		$query = "delete FROM reply where message_id=$id";
		$answer= mysqli_query($_conn,$query)or die(mysqli_error($_conn));

		
}
function Recieved($user,$_conn)
{
	$query = "SELECT * FROM Message where reciever=$user";
			$answer= mysqli_query($_conn,$query)or die(mysqli_error($_conn));
			if (mysqli_num_rows($answer) > 0) 
			{
				while($row = mysqli_fetch_array($answer)) 
				{
					if($row==null)
					{
						return null;
					}
					$list[] = new Message($row[0],$row[1],$row[2],$row[3]);
							   
				}	
						
				return $list;
			}
							return null;		

}

function selectUserMail($id,$_conn)
{
		
			$query = "SELECT email FROM User where id=$id";
			$answer= mysqli_query($_conn,$query)or die(mysqli_error($_conn));
				$row = mysqli_fetch_array($answer);
				$obj= $row;
				return $obj;		
		
}
?>




