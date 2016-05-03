 
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Restaurants
* GENERATION DATE:  02.05.2016
* CLASS FILE:       C:\wamp\www\gen/generated_classes/class.Restaurants.php
* FOR mysqli TABLE:  restaurant
* FOR mysqli DB:     orgtree 
*
*/
include_once("class.database.php");

// **********************
// CLASS DECLARATION
// **********************

class Restaurants
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $restaurant_id;   // KEY ATTR. WITH AUTOINCREMENT
var $restaurant_name;   // (normal Attribute)var $restaurant_postcode;   // (normal Attribute)var $division_id;   // (normal Attribute)var $restaurant_email;   // (normal Attribute)var $restaurant_contact;   // (normal Attribute)var $restaurant_address;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function Restaurants()
{
	$this->database = new Database();
}


// **********************
// GETTER METHODS
// **********************


function getrestaurant_id()
{ 	return $this->restaurant_id;   }

function getrestaurant_name()
{ 	return $this->restaurant_name;   }

function getrestaurant_postcode()
{ 	return $this->restaurant_postcode;   }

function getdivision_id()
{ 	return $this->division_id;   }

function getrestaurant_email()
{ 	return $this->restaurant_email;   }

function getrestaurant_contact()
{ 	return $this->restaurant_contact;   }

function getrestaurant_address()
{ 	return $this->restaurant_address;   }

// **********************
// SETTER METHODS
// **********************


function setrestaurant_id($val)
{	$this->restaurant_id =  $val; }


function setrestaurant_name($val)
{	$this->restaurant_name =  $val; }


function setrestaurant_postcode($val)
{	$this->restaurant_postcode =  $val; }


function setdivision_id($val)
{	$this->division_id =  $val; }


function setrestaurant_email($val)
{	$this->restaurant_email =  $val; }


function setrestaurant_contact($val)
{	$this->restaurant_contact =  $val; }


function setrestaurant_address($val)
{	$this->restaurant_address =  $val; }


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{
	$sql =  "SELECT * FROM restaurant WHERE restaurant_id = $id;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	if ($row = mysqli_fetch_object($result))
	{
$this->restaurant_id = $row->restaurant_id;
$this->restaurant_name = $row->restaurant_name;
$this->restaurant_postcode = $row->restaurant_postcode;
$this->division_id = $row->division_id;
$this->restaurant_email = $row->restaurant_email;
$this->restaurant_contact = $row->restaurant_contact;
$this->restaurant_address = $row->restaurant_address;

	return true; 
	}
	else {return false;}
	}

// **********************
// SELECT METHOD / LOAD / With Custom Where Field
// **********************

function selectWhere($fieldName,$value)
{
	$sql = "SELECT * FROM restaurant WHERE $fieldName = $value;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	if ($row = mysqli_fetch_object($result))
	{

$this->restaurant_id = $row->restaurant_id;

$this->restaurant_name = $row->restaurant_name;

$this->restaurant_postcode = $row->restaurant_postcode;

$this->division_id = $row->division_id;

$this->restaurant_email = $row->restaurant_email;

$this->restaurant_contact = $row->restaurant_contact;

$this->restaurant_address = $row->restaurant_address;

	return true; 
	}
	else {return false;}
	}

// **********************
// SELECT METHOD / LOAD / RETURN JSON
// **********************

function selectAll()
{

	$sql = "SELECT * FROM restaurant";
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
	$sql = "DELETE FROM restaurant WHERE restaurant_id = $id;";
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
	$this->restaurant_id = ""; // clear key for autoincrement

	$sql = "INSERT INTO restaurant ( restaurant_name,restaurant_postcode,division_id,restaurant_email,restaurant_contact,restaurant_address ) VALUES ( '$this->restaurant_name','$this->restaurant_postcode','$this->division_id','$this->restaurant_email','$this->restaurant_contact','$this->restaurant_address' )";
	$result = $this->database->query($sql);
	if($this->restaurant_id = mysqli_insert_id($this->database->link)){
		return true;
	}else {return false;}

}

// **********************
// UPDATE
// **********************

function update($id)
{
	$sql = " UPDATE restaurant SET  restaurant_name = '$this->restaurant_name',restaurant_postcode = '$this->restaurant_postcode',division_id = '$this->division_id',restaurant_email = '$this->restaurant_email',restaurant_contact = '$this->restaurant_contact',restaurant_address = '$this->restaurant_address' WHERE restaurant_id = $id ";

	if($result = $this->database->query($sql)){
		return true;
	}else {
		return false;
	}

}


} // class : end

 
//<!-- end of generated class -->
