<?php

class Message {
  private $id;
  private $sender;
  private $reciever;
  private $content;
  function __construct($id,$reciever,$content,$sender) {  
    $this->sender = $sender;
    $this->reciever = $reciever;
    $this->content = $content;
	$this->id=$id;
  }
  function set_sender($n) {  
    $this->sender = $n;
  }
   function set_reciever($n) { 
    $this->reciever = $n;
  }
   function set_content($n) { 
    $this->content = $n;
  }
  function get_sender() {  
    return $this->sender;
  }
   function get_content() {
    return $this->content;
  }
   function get_reciever() { 
    return $this->reciever;
  }
   function get_id() { 
    return $this->id;
  }
}

?>

