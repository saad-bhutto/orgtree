<?php 
 

$model = $_GET["model"];
$method = $_GET["method"];
$response = '';
$requestMethod = $_SERVER['REQUEST_METHOD'];
echo  var_dump($_REQUEST); die;

   include 'PasswordHash.php';

// ===========================================================================
// =============--- Division Request Handler ---==============================
// ===========================================================================

	if ($model == "division") {
	   include("models/class.Divisions.php");
	   $divison =  new Divisions();
	   if($requestMethod == "GET") {
	   		$response = $divison->selectAll();
	   }
	   if($requestMethod == "POST") {
	   		$divison->division_name= $_REQUEST["division_name"];
	   		$divison->insert();
	   		$response = $divison->selectAll();
	   }
	}

// ===========================================================================
// =============--- Titles Request Handler ---================================
// ===========================================================================
	
	if ($model == "title") {
	   include("models/class.Titles.php");
	   $title =  new Titles();
	   if($requestMethod == "GET") {
	   		$response = $title->selectAll();
	   }
	}

// ===========================================================================
// =============--- Titles Request Handler ---================================
// ===========================================================================
	
	if ($model == "restaurant") {
	   include("models/class.Restaurants.php");
	   $restaurant =  new Restaurants();
	   if($requestMethod == "GET") {
	   		$response = $restaurant->selectAll();
	   }
	}

// ===========================================================================
// =============--- Employees Request Handler ---=============================
// ===========================================================================
	
	if ($model == "employee") {
	   include("models/class.Employees.php");
	   $employee =  new Employees();
	   if($requestMethod == "GET") {
	   		$response = $employee->selectAll();
	   }
	}

header('Content-Type: application/json');
echo ($response);