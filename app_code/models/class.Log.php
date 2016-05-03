 
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Log
* GENERATION DATE:  02.05.2016
* CLASS FILE:       C:\wamp\www\gen/generated_classes/class.Log.php
* FOR mysqli TABLE:  site_log
* FOR mysqli DB:     orgtree 
*
*/
include_once("class.database.php");
 

// **********************
// CLASS DECLARATION
// **********************

class Log
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $log_id;   // KEY ATTR. WITH AUTOINCREMENT
var $username;   // (normal Attribute)var $labelname;   // (normal Attribute)var $query_type;   // (normal Attribute)var $query;   // (normal Attribute)var $log_date;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function Log()
{
	$this->database = new Database();
}


// **********************
// GETTER METHODS
// **********************


function getlog_id()
{ 	return $this->log_id;   }

function getusername()
{ 	return $this->username;   }

function getlabelname()
{ 	return $this->labelname;   }

function getquery_type()
{ 	return $this->query_type;   }

function getquery()
{ 	return $this->query;   }

function getlog_date()
{ 	return $this->log_date;   }

// **********************
// SETTER METHODS
// **********************


function setlog_id($val)
{	$this->log_id =  $val; }


function setusername($val)
{	$this->username =  $val; }


function setlabelname($val)
{	$this->labelname =  $val; }


function setquery_type($val)
{	$this->query_type =  $val; }


function setquery($val)
{	$this->query =  $val; }


function setlog_date($val)
{	$this->log_date =  $val; }


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{
	$sql =  "SELECT * FROM site_log WHERE log_id = $id;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	if ($row = mysqli_fetch_object($result))
	{
$this->log_id = $row->log_id;
$this->username = $row->username;
$this->labelname = $row->labelname;
$this->query_type = $row->query_type;
$this->query = $row->query;
$this->log_date = $row->log_date;

	return true; 
	}
	else {return false;}
	}

// **********************
// SELECT METHOD / LOAD / With Custom Where Field
// **********************

function selectWhere($fieldName,$value)
{
	$sql = "SELECT * FROM site_log WHERE $fieldName = $value;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	if ($row = mysqli_fetch_object($result))
	{

$this->log_id = $row->log_id;

$this->username = $row->username;

$this->labelname = $row->labelname;

$this->query_type = $row->query_type;

$this->query = $row->query;

$this->log_date = $row->log_date;

	return true; 
	}
	else {return false;}
	}

// **********************
// SELECT METHOD / LOAD / RETURN JSON
// **********************

function selectAll()
{

	$sql = "SELECT * FROM site_log";
	$result = $this->database->query($sql);
	$rows = array();
	$result = $this->database->result; 
	while($r = mysqli_fetch_assoc($result)) {
		    array_push($rows, $r);
		}
		return json_encode($rows);
}


// **********************
// DELETE
// **********************

function delete($id)
{
	$sql = "DELETE FROM site_log WHERE log_id = $id;";
	if($result = $this->database->query($sql)){
		return true;
	}else {
		return false;
	}

}

// **********************
// INSERT
// **********************

function insert()
{
	$this->log_id = ""; // clear key for autoincrement

	$sql = "INSERT INTO site_log ( username,labelname,query_type,query,log_date ) VALUES ( '$this->username','$this->labelname','$this->query_type','$this->query','$this->log_date' )";
	$result = $this->database->query($sql);
	if($this->log_id = mysqli_insert_id($this->database->link)){
		return true;
	}else {return false;}

}

// **********************
// UPDATE
// **********************

function update($id)
{
	$sql = " UPDATE site_log SET  username = '$this->username',labelname = '$this->labelname',query_type = '$this->query_type',query = '$this->query',log_date = '$this->log_date' WHERE log_id = $id ";

	if($result = $this->database->query($sql)){
		return true;
	}else {
		return false;
	}

}


} // class : end

 
//<!-- end of generated class -->
