 
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Divisions
* GENERATION DATE:  02.05.2016
* CLASS FILE:       C:\wamp\www\gen/generated_classes/class.Divisions.php
* FOR mysqli TABLE:  division
* FOR mysqli DB:     orgtree 
*
*/

include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class Divisions
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $division_id;   // KEY ATTR. WITH AUTOINCREMENT
var $division_name;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function Divisions()
{
	$this->database = new Database();
}


// **********************
// GETTER METHODS
// **********************


function getdivision_id()
{ 	return $this->division_id;   }

function getdivision_name()
{ 	return $this->division_name;   }

// **********************
// SETTER METHODS
// **********************


function setdivision_id($val)
{	$this->division_id =  $val; }


function setdivision_name($val)
{	$this->division_name =  $val; }


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{
	$sql =  "SELECT * FROM division WHERE division_id = $id;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	if ($row = mysqli_fetch_object($result))
	{
$this->division_id = $row->division_id;
$this->division_name = $row->division_name;

	return true; 
	}
	else {return false;}
	}

// **********************
// SELECT METHOD / LOAD / With Custom Where Field
// **********************

function selectWhere($fieldName,$value)
{
	$sql = "SELECT * FROM division WHERE $fieldName = $value;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	if ($row = mysqli_fetch_object($result))
	{

$this->division_id = $row->division_id;

$this->division_name = $row->division_name;

	return true; 
	}
	else {return false;}
	}

// **********************
// SELECT METHOD / LOAD / RETURN JSON
// **********************

function selectAll()
{

	$sql = "SELECT * FROM division";
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
	$sql = "DELETE FROM division WHERE division_id = $id;";
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
	$this->division_id = ""; // clear key for autoincrement

	$sql = "INSERT INTO division ( division_name ) VALUES ( '$this->division_name' )";
	$result = $this->database->query($sql);
	if($this->division_id = mysqli_insert_id($this->database->link)){
		return true;
	}else {return false;}

}

// **********************
// UPDATE
// **********************

function update($id)
{
	$sql = " UPDATE division SET  division_name = '$this->division_name' WHERE division_id = $id ";

	if($result = $this->database->query($sql)){
		return true;
	}else {
		return false;
	}

}


} // class : end

 
//<!-- end of generated class -->
