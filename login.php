<?php session_start();
if (isset( $_SESSION['userID']))  {
if ($_SESSION['role']==1) {
              echo "<script>window.location= 'admin/dashboard.php'</script>";
   }
              echo "<script>window.location= 'profile.php'</script>";
 }
if (isset($_SESSION['passcode']))  { echo "<script>window.location= 'search.php'</script>"; }

 include('header.php');  ?>


<?php $msg='';
if(isset($_POST["submit"]))
{
    include("admin/app_code/config.php");

    if (!mysqli_connect_errno())
         {

          if(isset($_POST["code"]))
          {
            $q = "SELECT * FROM `passcode` where code = '".$_POST["code"]."' ";
            if ($result = $con->query($q)) {
             if($row = mysqli_fetch_array($result))
               {
                 $_SESSION['role']='passcode';
                $_SESSION['passcode']='passcode';
               $msg= 'successfully Logged';
              echo "<script>window.location= 'index.php'</script>";
               }else {
              //  echo $q; die;
              echo "<script>window.location= 'login.php?msg=failed-pass'</script>";
               }
            }

          }
          else if(isset($_POST["login_password"]))
          {
             $email = mysqli_real_escape_string($con, $_POST['login_username']);
             $password = mysqli_real_escape_string($con, $_POST['login_password']);
             $q= "select * from login where email= '$email' and password = '$password' ";
           // die($q);
             $result = $con->query($q);
             //  echo "select * from login where email= '$email' and password = '$password'";
               if($row = mysqli_fetch_array($result))
               {
                  $q = "update `login` set `lastlogin` = '".date('l jS \of F Y h:i:s A')."'  where (`id`='".$row['id']."') ";
                  if($con->query($q))
                  {
                         $_SESSION['userID']=$row['id'];
                        $_SESSION['usename']=$row['username'];
                        $_SESSION['role']=$row["role"];
                        $_SESSION['lastlogin'] = $row["lastlogin"];
                        $msg= 'successfully Logged';
                        echo "<script>window.location= 'index.php'</script>";
                       } //echo var_dump($_SESSION);
                  }else
                  { $msg= "An Error occurred !".$con->error;   $invalidLogin=true;}

            }
         }
       }

 ?>

<div class="jumbotron text-center" style= 'padding-top:15%'>
      <h1>Enter Your PassCode</h1>
       <form method = 'POST'>
            <p></p>
         <div class="col-md-4 col-md-offset-4 ">

              <div class="form-group form-group-lg ">
                   <div class="input-md input-field">
                         <input id="password" type="password"  name='code'  class="validate input-lg">
                         <label for="password" class="">Password</label>
                   </div>
             </div>
             <button type='submit' name='submit' class="btn-pxl btn-fill btn-fill-down">login</button>
          <a data-toggle='modal' id="btn_emplogin" data-target='#myModal' class="btn-pxl btn-fill btn-fill-down" >Employee Login</a>  <!-- form-group -->


        </div>
      </form>
      <br><br>
      <br><br>
      <br><br>
    </div>

      <div class="container">
  <div class="row">
    <div id='txtHint' class="col-md-12">

  </div>
  </div>
</div>
 <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="news-letter-widget">
          <h5 class="text-uppercase fw-thkr lx-xs m-b-md">Employee Login</h5>
          <div class="container-fluid">
              <div class="form-container"  >
                        <h1 class="text-center text-lowercase fw-thkr m-b-lg ls-xs">OrgTree </h1>
                        <p class="fw-lght text-center m-t-lg m-b-lg text-lowercase ls-xs">Login to your account</p>
                        <!-- form -->
                        <form role="form" class="m-t-lg" method="POST">
                           <!-- form-group -->
                           <div class=form-group>
                              <!-- input-text --> <span class="input input--default" data-input-text> <input name="login_username"  id="login_username" type="email" class="input_field input_field--default">
                              <label for="login_username" class="input_label input_label--default"> <span class="input_label-content input_label-content--default">Email</span> </label> </span> <!-- input-text -->
                           </div>
                           <!-- form-group --> <!-- form-group -->
                           <div class=form-group>
                              <!-- input-text --> <span class="input input--default data-input-text"> <input type="password"  id="login_password"  name="login_password" class="input_field input_field--default">
                               <label for="login_password" class="input_label input_label--default"> <span class="input_label-content input_label-content--default">Password</span> </label> </span> <!-- input-text -->
                           </div>
                           <!-- form-group --> <!-- form-group -->
                           <div class=form-group>
                              <!-- checkbox -->
                              <div class=checkbox>
                                 <!-- checkbox-style-box -->
                                  <label for="checkbox-style-md1" class="checkbox-md primary m-t-lg"> <input type=checkbox name=checkbox1 id="checkbox-style-md1"> <span class=fw-lght>Dont forget me</span> </label> <!-- checkbox-style-box -->
                              </div>
                              <!-- checkbox -->
                           </div>
                           <!-- form-group --> <!-- form-group -->
                           <div class="form-group">
                           <button type="submit" name='submit' class="waves-effect waves-light md-btn-large" style="width: 200px;"><i class="mdi-file-cloud right"></i>LOGIN</button> </div>
                           <!-- form-group -->
                        </form>
                        <!-- form -->
                     </div>
          </div>
       </div>

    </div>

  </div>
</div>

<?php include_once 'footer.php'; ?>
