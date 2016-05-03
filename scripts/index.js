

/*
-----------------------------------------------------------------------------
-----------------------------------------------------------------------------
-----------------------------------------------------------------------------
--------------------------------- Site Functions ----------------------------
-----------------------------------------------------------------------------
-----------------------------------------------------------------------------
-----------------------------------------------------------------------------
*/

function showHint() {
	document.getElementById("txthint").innerHTML = "<i class='fa fa-refresh fa-spin fa-3x fa-fw margin-bottom center-block'></i>";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txthint").innerHTML = xmlhttp.responseText;
                  $('#example').DataTable();
            }
        };
        xmlhttp.open("GET", "app_code/controller.php?query=emp", true);
        xmlhttp.send();

}


function showdatatable(query,field,q)  {
	document.getElementById("tableRows").innerHTML = "<i class='fa fa-refresh fa-spin fa-3x fa-fw margin-bottom center-block'></i>";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("tableRows").innerHTML = xmlhttp.responseText;
                  $('#example').DataTable();
            }
        };
		xmlhttp.open("GET", "app_code/controller.php?query="+query+"&method=sort&field="+field+"&order="+dataorder+"&q="+q, true);
         
        xmlhttp.send();

}



// function showdatatable(query,field,q) {
// 	if(dataorder =="asc") {dataorder = "desc";}
// 	else if(dataorder =="desc") {dataorder = "asc";}
// 	document.getElementById("tableRows").innerHTML = "<i class='fa fa-refresh fa-spin fa-3x fa-fw margin-bottom center-block'></i>";
//         var xmlhttp = new XMLHttpRequest();
// 	ajaxPrinter(xmlhttp,"tableRows" , "Printing" , 0);
     
// 	xmlhttp.open("GET", "app_code/controller.php?query="+query+"&method=sort&field="+field+"&order="+dataorder+"&q="+q, true);
//     xmlhttp.send();

// }






function createNoty(message, type) {
    var html = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">';    
    html += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
    html += message;
    html += '</div>';    
    $(html).hide().prependTo('#noty-holder').slideDown();
};
 

var myVar = setInterval(function(){ myTimer() }, 1000);

function myTimer() {
    var d = new Date();
    var t = d.toLocaleTimeString();
    document.getElementById("timer").innerHTML = t;
}


function deleter(id,ele,index){
	var val= ele.name;
	document.getElementById('cName').innerHTML = val ;
	document.getElementById("btn_no").onclick = function() { 
	 $('#myModel').modal('hide');
   	};
   	document.getElementById("btn_yes").onclick = function() { 
	 $('#myModel').modal('hide');

	 delete_employee(id, index);
	var myTable = $('#example').DataTable();
	var rows = myTable.rows( '#ind'+index ).remove().draw();	 
	  
   	};
}

function editor(id,ele,query){ 
	var val= ele.title;
	var hid= ele.name;
	document.getElementById('txt_editer').value = val ;
	document.getElementById('txt_editer_hid').value = hid ;
	document.getElementById("btnSave").onclick = function() { 
		val = document.getElementById('txt_editer').value;

    	if (query == 1) {
			hid	= document.getElementById('txt_editer_hid').value; 
    		update_title(id, val, hid);
    	} 
    	else if (query == 0){
    		update_division(id, val);
    	}
   	};
}


// function show_data(query) {
// 	var xmlhttp = new XMLHttpRequest();
// 	ajaxPrinter(xmlhttp,"tableRows");
// 	xmlhttp.open("GET", "app_code/controller.php?query="+query+"&method=show", true);
// 	xmlhttp.send(); 
// }

var dataorder = "desc";

function show_data(query,field,q) {
	if(dataorder =="asc") {dataorder = "desc";}
	else if(dataorder =="desc") {dataorder = "asc";}
	var xmlhttp = new XMLHttpRequest();
	ajaxPrinter(xmlhttp,"tableRows" , "Printing" , 0);
	xmlhttp.open("GET", "app_code/controller.php?query="+query+"&method=sort&field="+field+"&order="+dataorder+"&q="+q, true);
	xmlhttp.send(); 
}


function show_ddl_data(query,ddl) {
	var xmlhttp = new XMLHttpRequest(); 

	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(query).innerHTML = xmlhttp.responseText;
                  
            }
        };


	xmlhttp.open("GET", "app_code/controller.php?query="+query+"&method=show"+ddl, true);
	xmlhttp.send(); 
}


function ajaxPrinter(xmlhttp, divID , txt, htmltext,flag){
	xmlhttp.onreadystatechange = function() {
		//myDatatable
			

			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			
			document.getElementById("myDatatable").innerHTML = "";
		 	var myDataTable = $("#myDatatable").html(htmltext);
			document.getElementById(divID).innerHTML = "";
			document.getElementById(divID).innerHTML = xmlhttp.responseText;

			$("table",myDataTable).DataTable();


				if(flag==1) {
					toastr.success(txt+' Sucessfully');
				}

			}
			if (xmlhttp.readyState == 4 && xmlhttp.status == 201) {
				 toastr.error(xmlhttp.statusText+' Please Check Recent Log');
				 document.getElementById(divID).innerHTML = xmlhttp.responseText;
			}
			 
		}
}



// function LoadData() {
//     var myDataTable = $("#my-datatable").html("<table><thead></thead><tbody></tbody></table>");
//     $("table",myDataTable).dataTable({...});
// }
// $(document).ready(function() {
//     $("#my-button").click(LoadData);
//     LoadData();
// });


/* 
-----------------------------------------------------------------------------
----------------------------- Division Functions ----------------------------
----------------------------------------------------------------------------- 
*/

 //Delete Divison 
 function delete_division(id) {
		var xmlhttp = new XMLHttpRequest();
		ajaxPrinter(xmlhttp,"tableRows",  "Delete", "<table><thead><th>#</th><th>Division Name</th><th># Restaurants</th><th>Action</th></thead><tbody id='tableRows'></tbody></table>" , 1);
		xmlhttp.open("GET", "app_code/controller.php?query=division&method=delete&division_id="+id+"", true);
		xmlhttp.send();  
 }


//Create Divison 
 function insert_division() {
 		var name = document.getElementById('division_name').value; 
 	 
 		if(name == '') {
    		createNoty('Name cannot be Empty', 'danger');
 		 }else {
		document.getElementById('division_name').value= '';
		var xmlhttp = new XMLHttpRequest();
		ajaxPrinter(xmlhttp,"tableRows" , "Added" ,"<table><thead><th>#</th><th>Division Name</th><th># Restaurants</th><th>Action</th></thead><tbody id='tableRows'></tbody></table>", 1 );
		xmlhttp.open("GET", "app_code/controller.php?query=division&method=insert&division_name="+name+"", true);
		xmlhttp.send();  

 		}
}

//Update Divison 
function update_division(id,value) {
 		if(value == 		  '') {
    		createNoty('Name cannot be Empty', 'danger');
 		 }else {
		var xmlhttp = new XMLHttpRequest();
		ajaxPrinter(xmlhttp,"tableRows", "Updated" ,"<table><thead><th>#</th><th>Division Name</th><th># Restaurants</th><th>Action</th></thead><tbody id='tableRows'></tbody></table>", 1);
		xmlhttp.open("GET", "app_code/controller.php?query=division&method=update&division_name="+value+"&division_id="+id+"", true);
		xmlhttp.send();  
		 
 		}
}
 

 
//List Divison 

/*
-----------------------------------------------------------------------------
----------------------------- Titled Functions ----------------------------
----------------------------------------------------------------------------- 
*/




//Delete Title 
 function delete_title(id,index) {
		var xmlhttp = new XMLHttpRequest();
		var myTable = $('#example').DataTable();
		var rows = myTable.rows( '#ind'+index ).remove().draw();
		ajaxPrinter(xmlhttp,"tableRows",  "Delete","<table><thead><th>#</th><th>Title</th><th>Title Hierarchy</th><th>Action</th></thead><tbody id='tableRows'></tbody></table>" , 1);
		xmlhttp.open("GET", "app_code/controller.php?query=title&method=delete&title_id="+id+"", true);
		xmlhttp.send();  
 
 }


//Create Title `
 function insert_title() {
 		var name = document.getElementById('title_name').value; 
		document.getElementById('title_name').value= '';
		var hid = document.getElementById('title_hid').value; 
		document.getElementById('title_hid').value= '';
 	 // ==-=-=-=-=-= Note edit Herachy ID =-=-===========
 		if(name == '') {
    		createNoty('Name cannot be Empty', 'danger');
 		 }else {
		var xmlhttp = new XMLHttpRequest();
		ajaxPrinter(xmlhttp,"tableRows", "Added","<table><thead><th>#</th><th>Title</th><th>Title Hierarchy</th><th>Action</th></thead><tbody id='tableRows'></tbody></table>" , 1);
		xmlhttp.open("GET", "app_code/controller.php?query=title&method=insert&title_name="+name+"&hid="+hid, true);
		xmlhttp.send();  
		 
 		}
}

//Update Title 
function update_title(id,value,hid) {
 		 
 		if(value == '') {
    		createNoty('Name cannot be Empty', 'danger');
 		 }else {
		var xmlhttp = new XMLHttpRequest();
		ajaxPrinter(xmlhttp,"tableRows","Updated" , "<table><thead><th>#</th><th>Title</th><th>Title Hierarchy</th><th>Action</th></thead><tbody id='tableRows'></tbody></table>" ,1);
		xmlhttp.open("GET", "app_code/controller.php?query=title&method=update&title_name="+value+"&title_id="+id+"&hid="+hid, true);
		xmlhttp.send();  
	 
 		}
}
 






/* 
-----------------------------------------------------------------------------
----------------------------- Restaurant Functions --------------------------
----------------------------------------------------------------------------- 
*/




//Delete Restaurant 
 function delete_restaurant(id,index) {
		var xmlhttp = new XMLHttpRequest();
		var myTable = $('#example').DataTable();
		var rows = myTable.rows( '#ind'+index ).remove().draw();
		ajaxPrinter(xmlhttp,"tableRows", "Delete" ,"<table><thead><th>#</th><th>Name</th><th>Division</th><th>Zipcode</th><th>Action</th></thead><tbody id='tableRows'></tbody></table>", 1);
		xmlhttp.open("GET", "app_code/controller.php?query=restaurant&method=delete&restaurant_id="+id+"", true);
		xmlhttp.send();  
	 
 }

 function showdetail (ele) {
 	// body...
 	var name= document.getElementById("rName");
 	var email= document.getElementById("rEmail");
 	var contact= document.getElementById("rContact");
 	var address= document.getElementById("rAddress");
 	var zip= document.getElementById("rZipcode");
 	var division= document.getElementById("rDivision");
 	name.innerHTML=(ele.dataset.name);
 	email.innerHTML=(ele.dataset.email);
 	contact.innerHTML=(ele.dataset.contact);
 	address.innerHTML=(ele.dataset.address);
 	division.innerHTML=(ele.dataset.division);
 	zip.innerHTML=(ele.dataset.zipcode);
 	$('#myDetailsModal').modal('show');
 }


 function showeditor (id,ele) {
 	// body...
 	var name= document.getElementById("edit_restaurant_name");
 	var email= document.getElementById("edit_restaurant_email");
 	var contact= document.getElementById("edit_restaurant_contact");
 	var address= document.getElementById("edit_restaurant_address");
 	var zip= document.getElementById("edit_restaurant_postcode"); 

 	var first = document.getElementById('division');
	var options = first.innerHTML;

	var second = document.getElementById('edit_division');
	second.innerHTML = options; 
	second.value= ele.dataset.did;
	$("#edit_division").val(ele.dataset.did);

	var id= ele.dataset.rid;
 	name.value=(ele.dataset.name);
 	email.value=(ele.dataset.email);
 	contact.value=(ele.dataset.contact);
 	address.value=(ele.dataset.address);
 	division.value=(ele.dataset.division);
 	zip.value=(ele.dataset.zipcode);
 		document.getElementById("btnSave").onclick = function() { 
 		var e = document.getElementById("edit_division");
		var did = e.options[e.selectedIndex].value;
		var query= "app_code/controller.php?query=restaurant&method=update&restaurant_name="+name.value+"&restaurant_id="+id+"&restaurant_postcode="+zip.value+"&did="+did+"&restaurant_email="+email.value+"&restaurant_contact="+contact.value+"&restaurant_address="+address.value;
   		update_restaurant(query);
   		};
}

 	//$('#myModal').modal('show');
  




//Create Restaurant 
 function insert_restaurant() {
 		var name = document.getElementById('restaurant_name').value; 
 		var postcode = document.getElementById('restaurant_postcode').value; 
 		var email = document.getElementById('restaurant_email').value; 
 		var contact = document.getElementById('restaurant_contact').value; 
 		var address = document.getElementById('restaurant_address').value; 
 		var e = document.getElementById("division");
		var did = e.options[e.selectedIndex].value;
		document.getElementById('restaurant_name').value= '';
		document.getElementById('restaurant_postcode').value= '';
		document.getElementById('restaurant_email').value= '';
		document.getElementById('restaurant_contact').value= '';
		document.getElementById('restaurant_address').value= ''; 

 	 // ==-=-=-=-=-= Note edit Herachy ID =-=-===========
 		if(name == '' || postcode=='') {
    		createNoty('Fields cannot be Empty', 'danger');
 		 }else {
		var xmlhttp = new XMLHttpRequest();
		ajaxPrinter(xmlhttp,"tableRows", "Added", "<table><thead><th>#</th><th>Name</th><th>Division</th><th>Zipcode</th><th>Action</th></thead><tbody id='tableRows'></tbody></table>" , 1);
		xmlhttp.open("GET", "app_code/controller.php?query=restaurant&method=insert&restaurant_name="+name+"&restaurant_postcode="+postcode+"&did="+did+"&restaurant_email="+email+"&restaurant_contact="+contact+"&restaurant_address="+address, true);
		xmlhttp.send();  
		 
 		}
}

//Update Restaurant 
function update_restaurant(query) {
		var xmlhttp = new XMLHttpRequest();
		ajaxPrinter(xmlhttp,"tableRows", "Updated","<table><thead><th>#</th><th>Name</th><th>Division</th><th>Zipcode</th><th>Action</th></thead><tbody id='tableRows'></tbody></table>"  , 1);
		xmlhttp.open("GET", query , true);
		xmlhttp.send();  
	 
 		}
 
 



/* 
-----------------------------------------------------------------------------
----------------------------- Employee Functions ----------------------------
----------------------------------------------------------------------------- 
*/


                                     

//Delete Employee 
 function delete_employee(id,index) {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET", "app_code/controller.php?query=employee&method=delete&employee_id="+id+"", true);
		xmlhttp.send();  
		ajaxPrinter(xmlhttp,"tableRows",  "Delete","<th>Avatar</th><th>Title</th><th>Name</th><th>Contact</th><th>Email</th><th>Restaurant</th><th>Action</th>" , 1);
		var myTable = $('#example').DataTable();
		var indexx = "#ind"+index;
		var rows = myTable.rows( indexx ).remove().draw();
 }

 

 
