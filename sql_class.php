<?php

class SQL_Class {

var $host;
var $user;
var $passwd;
var $db_name;
var $dbh;
var $db;

	function SQL_Class($db) {
	$this->host = "localhost";
	switch($db) {
		
		case 'phpMYfive':
			$this->user = "";
			$this->passwd = "";
			$this->db_name = "phpMDforce";
		break;
		

	}
	
	if (!$this->dbh = mysql_pconnect($this->host, $this->user, $this->passwd))
		die("Can't open sql connection on host<br>");
	if (!mysql_select_db($this->db_name, $this->dbh))
		die("Can't select database on host<br>");
		
	}

	function execute($query) {
	if (!$this->dbh)
		die("Can't execute query without connection<br>");

	$ret = mysql_query($query, $this->dbh);
	
	if (!$ret) {
		die("Can't send query to db<br>");
		}
	else if (!is_resource($ret)) {
		return TRUE;
		}
	else {
		$stmt = new SQL_Statement($this->dbh, $query);
		$stmt->result = $ret;
		return $stmt;
		}
	}
}
?>
