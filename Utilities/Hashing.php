<?php

function passwordHashing($password)
{
$passwordHashed=password_hash($password, PASSWORD_DEFAULT);
return $passwordHashed;
}
function passwordCheck($password,$passwordHashed){
	
if (password_verify($password, $passwordHashed)) 
{
    return True;
} 
else 
{
   return false;
}
}
?>

