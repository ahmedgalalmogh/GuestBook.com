<?php
class User {
  private $id;
  private $name;
  private $password;
  private $email;

  
  function __construct($id,$name,$email,$password) {  
    $this->name = $name;
    $this->email = $email;
    $this->password = $password;
    $this->id=$id;
  }
  
  function set_name($n) {  
    $this->name = $n;
  }
   function set_password($n) { 
    $this->password = $n;
  }
   function set_email($n) { 
    $this->email = $n;
  }
  function get_name() {  
    return $this->name;
  }
   function get_password() {
    return $this->password;
  }
   function get_email() { 
    return $this->email;
  }
     function get_id() { 
    return $this->id;
  }
}
?>