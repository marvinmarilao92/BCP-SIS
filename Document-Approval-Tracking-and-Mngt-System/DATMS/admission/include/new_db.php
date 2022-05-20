<?php
// domain config
class DB{
   protected $host='localhost';
   protected $user='u692894633_sis_db';
   protected $password='l95o@WMN6~a';
   protected $database='u692894633_sis_db';

   public $conn;

   public function __construct()
   {
       $this->conn=new mysqli($this->host,$this->user,$this->password,$this->database);
       if($this->conn->error){
           die('Database error');
      }
   }
}//

// local config
//  class DB{
//    protected $host='localhost';
//    protected $user='u692894633_sis_db';
//    protected $password='l95o@WMN6~a';
//    protected $database='u692894633_sis_db';

//    public $conn;

//    public function __construct()
//    {
//        $this->conn=new mysqli($this->host,$this->user,$this->password,$this->database);
//        if($this->conn->error){
//            die('Database error');
//        }
//    }
// }




