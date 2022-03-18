<?php
class Node{
    public $next;
  }
  class main_linkedlist{
      public $head;
      public $tail;
      function __construct() {
        $this->head = NULL;
        $this->next = NULL;
      }
      public function insert($pnn)
      {
          if($this->head==NULL)
          {
              $this->head=$pnn;
              $this->tail=$pnn;
          }
          else
          {
            $this->tail->next=$pnn;
            $this->tail=$pnn;
          }
      }
      public function delete($data){
          $ptrav=$this->head;
          $prev=$this->head;
          while($ptrav!=NULL&&$prev!=NULL)
          {
              if($this->head==$ptrav&&$this->tail==$ptrav)
              {
                  $this->head=NULL;
                  $this->tail=NULL;
                  break;
              }
              else if($this->tail==$ptrav)
              {
                  $this->tail=$prev;
                  break;
              }
              else if($this->head==$ptrav)
              {
                $this->head=$this->head->next;   
              }
              else
              {
                if($ptrav==$data)
                {
                    $prev->next=$ptrav->next;
                }
              }
              $prev=$ptrav;
              $ptrav=$ptrav->next;
          }
      }
  }
?>