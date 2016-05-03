<html>
 <head>
      <meta charset=utf-8>
      <title>Orgtree | Search</title>
      <meta name=viewport content="width=device-width">
      <link rel="stylesheet" href="styles/fonts.css"  type="text/css">
        <link rel="stylesheet" href="styles/vendor.css">
      <link rel="stylesheet" href="styles/main.css">
      <script src="scripts/vendor.js"></script>
      <style type="text/css"></style>
      <link rel="stylesheet" href="styles/headerstyles.css">

<body>


        <div class="navbar navbar-inverse navbar-fixed-top " >
  <div class="container">
    <div class="navbar-header">
      <button id='btnNav' type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
          <h3  class="text-center text-lowercase fw-thkr m-b-lg ls-xs" >orgTree</h3>

    </div>
    <div id='listNav' class="collapse navbar-collapse">
      <ul class="nav navbar-nav">

      </ul>
      <ul class="nav navbar-nav navbar-right " style="margin-top: 10px;">
        <li class=""><a href="index.php">Home</a></li>
        <?php if (isset( $_SESSION['role']) )  {
          if (( $_SESSION['role'] != "passcode") )  {
        ?>
        <li><a href="profile.php">Profile</a></li>
        <?php } }?>
        <?php if (isset( $_SESSION['role']) || isset( $_SESSION['passcode']) )  {
        ?>
        <li><a href="Search.php">Search</a></li>
        <li><a href="logout.php">logout</a></li>
		<li><a href="#" onclick="printing();">PrintTree</a></li>
        <?php }else { ?>
        <li><a href="login.php">Login</a></li>
		 
        <?php } ?>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
