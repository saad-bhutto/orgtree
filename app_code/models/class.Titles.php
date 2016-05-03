 
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Titles
* GENERATION DATE:  02.05.2016
* CLASS FILE:       C:\wamp\www\gen/generated_classes/class.Titles.php
* FOR mysqli TABLE:  title
* FOR mysqli DB:     orgtree 
*
*/

include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class Titles
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $title_id;   // KEY ATTR. WITH AUTOINCREMENT
var $title_name;   // (normal Attribute)var $hierarchy_id;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function Titles()
{
	$this->database = new Database();
}


// **********************
// GETTER METHODS
// **********************


function gettitle_id()
{ 	return $this->title_id;   }

function gettitle_name()
{ 	return $this->title_name;   }

function gethierarchy_id()
{ 	return $this->hierarchy_id;   }

// **********************
// SETTER METHODS
// **********************


function settitle_id($val)
{	$this->title_id =  $val; }


function settitle_name($val)
{	$this->title_name =  $val; }


function sethierarchy_id($val)
{	$this->hierarchy_id =  $val; }


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{
	$sql =  "SELECT * FROM title WHERE title_id = $id;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	if ($row = mysqli_fetch_object($result))
	{
$this->title_id = $row->title_id;
$this->title_name = $row->title_name;
$this->hierarchy_id = $row->hierarchy_id;

	return true; 
	}
	else {return false;}
	}

// **********************
// SELECT METHOD / LOAD / With Custom Where Field
// **********************

function selectWhere($fieldName,$value)
{
	$sql = "SELECT * FROM title WHERE $fieldName = $value;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	if ($row = mysqli_fetch_object($result))
	{

$this->title_id = $row->title_id;

$this->title_name = $row->title_name;

$this->hierarchy_id = $row->hierarchy_id;

	return true; 
	}
	else {return false;}
	}

// **********************
// SELECT METHOD / LOAD / RETURN JSON
// **********************

function selectAll()
{

	$sql = "SELECT * FROM title";
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
	$sql = "DELETE FROM title WHERE title_id = $id;";
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
	$this->title_id = ""; // clear key for autoincrement

	$sql = "INSERT INTO title ( title_name,hierarchy_id ) VALUES ( '$this->title_name','$this->hierarchy_id' )";
	$result = $this->database->query($sql);
	if($this->title_id = mysqli_insert_id($this->database->link)){
		return true;
	}else {return false;}

}

// **********************
// UPDATE
// **********************

function update($id)
{
	$sql = " UPDATE title SET  title_name = '$this->title_name',hierarchy_id = '$this->hierarchy_id' WHERE title_id = $id ";

	if($result = $this->database->query($sql)){
		return true;
	}else {
		return false;
	}

}


} // class : end

 
//<!-- end of generated class -->
