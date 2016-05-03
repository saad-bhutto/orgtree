 
<?php
/*
*
* -------------------------------------------------------
* CLASSNAME:        Login
* GENERATION DATE:  02.05.2016
* CLASS FILE:       C:\wamp\www\gen/generated_classes/class.Login.php
* FOR mysqli TABLE:  login
* FOR mysqli DB:     orgtree 
*
*/
include_once("class.database.php");
 

// **********************
// CLASS DECLARATION
// **********************

class Login
{ // class : begin


// **********************
// ATTRIBUTE DECLARATION
// **********************

var $id;   // KEY ATTR. WITH AUTOINCREMENT
var $username;   // (normal Attribute)var $password;   // (normal Attribute)var $email;   // (normal Attribute)var $lastlogin;   // (normal Attribute)var $role;   // (normal Attribute)

var $database; // Instance of class database


// **********************
// CONSTRUCTOR METHOD
// **********************

function Login()
{
	$this->database = new Database();
}


// **********************
// GETTER METHODS
// **********************


function getid()
{ 	return $this->id;   }

function getusername()
{ 	return $this->username;   }

function getpassword()
{ 	return $this->password;   }

function getemail()
{ 	return $this->email;   }

function getlastlogin()
{ 	return $this->lastlogin;   }

function getrole()
{ 	return $this->role;   }

// **********************
// SETTER METHODS
// **********************


function setid($val)
{	$this->id =  $val; }


function setusername($val)
{	$this->username =  $val; }


function setpassword($val)
{	$this->password =  $val; }


function setemail($val)
{	$this->email =  $val; }


function setlastlogin($val)
{	$this->lastlogin =  $val; }


function setrole($val)
{	$this->role =  $val; }


// **********************
// SELECT METHOD / LOAD
// **********************

function select($id)
{
	$sql =  "SELECT * FROM login WHERE id = $id;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	if ($row = mysqli_fetch_object($result))
	{
$this->id = $row->id;
$this->username = $row->username;
$this->password = $row->password;
$this->email = $row->email;
$this->lastlogin = $row->lastlogin;
$this->role = $row->role;

	return true; 
	}
	else {return false;}
	}

// **********************
// SELECT METHOD / LOAD / With Custom Where Field
// **********************

function selectWhere($fieldName,$value)
{
	$sql = "SELECT * FROM login WHERE $fieldName = $value;";
	$result = $this->database->query($sql);
	$result = $this->database->result;
	if ($row = mysqli_fetch_object($result))
	{

$this->id = $row->id;

$this->username = $row->username;

$this->password = $row->password;

$this->email = $row->email;

$this->lastlogin = $row->lastlogin;

$this->role = $row->role;

	return true; 
	}
	else {return false;}
	}

// **********************
// SELECT METHOD / LOAD / RETURN JSON
// **********************

function selectAll()
{

	$sql = "SELECT * FROM login";
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
	$sql = "DELETE FROM login WHERE id = $id;";
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
	$this->id = ""; // clear key for autoincrement

	$sql = "INSERT INTO login ( username,password,email,lastlogin,role ) VALUES ( '$this->username','$this->password','$this->email','$this->lastlogin','$this->role' )";
	$result = $this->database->query($sql);
	if($this->id = mysqli_insert_id($this->database->link)){
		return true;
	}else {return false;}

}

// **********************
// UPDATE
// **********************

function update($id)
{
	$sql = " UPDATE login SET  username = '$this->username',password = '$this->password',email = '$this->email',lastlogin = '$this->lastlogin',role = '$this->role' WHERE id = $id ";

	if($result = $this->database->query($sql)){
		return true;
	}else {
		return false;
	}

}


} // class : end

 
//<!-- end of generated class -->
