<?php include('session_check.php');
include('plateformdetect.php');
include('header.php'); ?>

<script src="Graph/js/d3.v3.js"></script>
<script src="Graph/js/graphlib-dot.js"></script>
<script src="Graph/js/dagre-d3.js"></script>
<script src="Graph/js/jquery-1.3.2.min.js"></script>
 <link rel="stylesheet" href="Graph/assets/css/graphstyle.css">



<body onLoad="GetRoot();">
<form>
 
  <textarea id="inputGraph" rows="5" style="display: none" onKeyUp="tryDraw();">

digraph {
    node [rx=10 ry=10 labelStyle="font-family:Verdana, Geneva, sans-serif;"]
    edge [labelStyle=""]
  
  /*append*/
   
}
  </textarea>
 
  <input type="text" id="responsecontainer" value="" style="display: none" />
  

 
</form>
 
<div  class="jumbotron text-center" >

</div>
<div id="svgcont" class="container">
<svg width="1200" height="700">
  <g/>
</svg>
</div> 



<?php include('GraphFunctions.php'); include_once 'footer.php'; ?>
