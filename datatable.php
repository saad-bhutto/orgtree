<?php   
include('header.php'); ?>
  
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">

<body  >
 
 
<div  class="jumbotron text-center" >


<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>id</th> 
            </tr>
        </thead>
        <tfoot>
            <tr>
               <th>id</th> 
            </tr>
        </tfoot>
    </table>

</div>
 

 

<script type="text/javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable( {
    	 "processing": true,
        "ajax": "http://localhost/optimizedOrgtree/app_code/api.php/division"
    } );
} );
</script>