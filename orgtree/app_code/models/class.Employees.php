 
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Employees
* GENERATION DATE:  02.05.2016
* CLASS FILE:       C:\wamp\www\gen/generated_classes/class.Employees.php
* FOR mysqli TABLE:  employee
* FOR mysqli DB:     orgtree 
*
*/
include_once("class.database.php");
 

// **********************
// CLASS DECLARATION
// **********************

class Employees
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $employee_id;   // KEY ATTR. WITH AUTOINCREMENT
var $employee_name;   // (normal Attribute)var $employee_contact;   // (normal Attribute)var $employee_email;   // (normal Attribute)var $employee_avatar;   // (normal Attribute)var $restaurant_id;   // (normal Attribute)var $title_id;   // (normal Attribute)var $employee_address;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function Employees()
{
	$this->database = new Database();
}


// **********************
// GETTER METHODS
// **********************


function getemployee_id()
{ 	return $this->employee_id;   }

function getemployee_name()
{ 	return $this->employee_name;   }

function getemployee_contact()
{ 	return $this->employee_contact;   }

function getemployee_email()
{ 	return $this->employee_email;   }

function getemployee_avatar()
{ 	return $this->employee_avatar;   }

function getrestaurant_id()
{ 	return $this->restaurant_id;   }

function gettitle_id()
{ 	return $this->title_id;   }

function getemployee_address()
{ 	return $this->employee_address;   }

// **********************
// SETTER METHODS
// **********************


function setemployee_id($val)
{	$this->employee_id =  $val; }


function setemployee_name($val)
{	$this->employee_name =  $val; }


function setemployee_contact($val)
{	$this->employee_contact =  $val; }


function setemployee_email($val)
{	$this->employee_email =  $val; }


function setemployee_avatar($val)
{	$this->employee_avatar =  $val; }


function setrestaurant_id($val)
{	$this->restaurant_id =  $val; }


function settitle_id($val)
{	$this->title_id =  $val; }


function setemployee_address($val)
{	$this->employee_address =  $val; }


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{
	$sql =  "SELECT * FROM employee WHERE employee_id = $id;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	if ($row = mysqli_fetch_object($result))
	{
$this->employee_id = $row->employee_id;
$this->employee_name = $row->employee_name;
$this->employee_contact = $row->employee_contact;
$this->employee_email = $row->employee_email;
$this->employee_avatar = $row->employee_avatar;
$this->restaurant_id = $row->restaurant_id;
$this->title_id = $row->title_id;
$this->employee_address = $row->employee_address;

	return true; 
	}
	else {return false;}
	}

// **********************
// SELECT METHOD / LOAD / With Custom Where Field
// **********************

function selectWhere($fieldName,$value)
{
	$sql = "SELECT * FROM employee WHERE $fieldName = $value;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	if ($row = mysqli_fetch_object($result))
	{

$this->employee_id = $row->employee_id;

$this->employee_name = $row->employee_name;

$this->employee_contact = $row->employee_contact;

$this->employee_email = $row->employee_email;

$this->employee_avatar = $row->employee_avatar;

$this->restaurant_id = $row->restaurant_id;

$this->title_id = $row->title_id;

$this->employee_address = $row->employee_address;

	return true; 
	}
	else {return false;}
	}

// **********************
// SELECT METHOD / LOAD / RETURN JSON
// **********************

function selectAll()
{

	$sql = "SELECT * FROM employee";
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
	$sql = "DELETE FROM employee WHERE employee_id = $id;";
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
	$this->employee_id = ""; // clear key for autoincrement

	$sql = "INSERT INTO employee ( employee_name,employee_contact,employee_email,employee_avatar,restaurant_id,title_id,employee_address ) VALUES ( '$this->employee_name','$this->employee_contact','$this->employee_email','$this->employee_avatar','$this->restaurant_id','$this->title_id','$this->employee_address' )";
	$result = $this->database->query($sql);
	if($this->employee_id = mysqli_insert_id($this->database->link)){
		return true;
	}else {return false;}

}

// **********************
// UPDATE
// **********************

function update($id)
{
	$sql = " UPDATE employee SET  employee_name = '$this->employee_name',employee_contact = '$this->employee_contact',employee_email = '$this->employee_email',employee_avatar = '$this->employee_avatar',restaurant_id = '$this->restaurant_id',title_id = '$this->title_id',employee_address = '$this->employee_address' WHERE employee_id = $id ";

	if($result = $this->database->query($sql)){
		return true;
	}else {
		return false;
	}

}


} // class : end

 
//<!-- end of generated class -->
