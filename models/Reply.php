<?php

class reply {
  private $id;
  private $messageId;
  private $content;
  function __construct($id,$messageId,$content) {  
    $this->messageId = $messageId;
    $this->content = $content;
    $this->id = $id;
  }
  function set_messageId($n) {  
    $this->messageId = $n;
  }
   function set_content($n) { 
    $this->content = $n;
  }

  function get_messageId() {  
    return $this->messageId;
  }
   function get_content() {
    return $this->content;
  }
    function get_id() { 
    return $this->id;
  }
}
?>

