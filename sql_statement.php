<?php

class SQL_Statement {

var $result;
var $query;
var $dbh;

  function SQL_Statement($dbh, $query) {
	
	$this->query = $query;
	$this->dbh = $dbh;
	if (!is_resource($dbh))
	  die("Not a valid database connection<br>");
  }
	
  function fetch_row() {
	if (!$this->result)
      die("Query not executed<br>");
	return mysql_fetch_row($this->result);
  }
	
  function fetch_assoc() {
	if (!$this->result)
		die("Query not executed<br>");
	return mysql_fetch_assoc($this->result);
  }
  
  function fetchall_assoc() {
    $retval = array();
    while ($row = $this->fetch_assoc()) {
      $retval[] = $row;
    }
    return $retval;
  }
  function fetch_array() {
   if (!$this->result)
     die("Query not executed<br>");
	return mysql_fetch_array($this->result);
  }
  function sql_result() {
     if (!$this->result)
     die("Query not executed<br>");
        return mysql_result($this->result, 0);
  }

}

?>
