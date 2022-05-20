<?php
session_start();
ini_set('display_errors', 1);
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include 'db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

    function delete_comment(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM hdms_tickets where id = ".$id);
		if($delete){
			return 1;
		}
	}
}
