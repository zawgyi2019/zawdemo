<?php 
include("header.php"); 
$cusname="";
$cusmail="";
$cuspw="";
$gender="";
$cusph="";
$cusaddress="";

$_SESSION["cusname"]="";
$_SESSION["cusmail"]="";
$_SESSION["cuspw"]="";
$_SESSION["gender"]=""; 
$_SESSION["cusph"]="";
$_SESSION["cusaddress"]="";

if (isset($_POST["cusreg"])) {
	$_SESSION["cusname"] =$_POST["cusname"];
	$_SESSION["cusmail"] =$_POST["cusmail"]; 
	$_SESSION["cuspw"] =$_POST["cuspw"];
	$_SESSION["gender"] =$_POST["gender"];
	$_SESSION["cusph"] =$_POST["cusph"]; 
	$_SESSION["cusaddress"] =$_POST["cusaddress"];
	

	$cusname= $_SESSION["cusname"];
	$cusmail= $_SESSION["cusmail"];
	$cuspw= $_SESSION["cuspw"];
	$gender= $_SESSION["gender"]; 
	$cusph= $_SESSION["cusph"];
	$cusaddress= $_SESSION["cusaddress"];
	
	$qry="INSERT INTO customer(cus_name,cus_mail,cus_pw,cus_gen,cus_ph,cus_address)VALUES('$cusname','$cusmail','$cuspw','$gender','$cusph','$cusaddress')";
	$result=mysql_query($qry) or die ("save items query fail.");
	$_SESSION['cstname']=$_POST["cusname"];
	header('location:login.php');
} 
elseif (isset($_POST["clear"])) {
 	unset($_SESSION["cusname"]); 
    unset($_SESSION["cusmail"]); 
    unset($_SESSION["cuspw"]); 
    unset($_SESSION["gender"]); 
    unset($_SESSION["cusph"]);
    unset($_SESSION["cusaddress"]); 


   header("Location: registration.php");
}

?>
<div id="container" class="registration">
	<div id="wrapper">
		<div class="regWrap">
			 <img src="img/login01.png" alt="login01">
			 <form method="post" class="regForm">
			 	<h1 class="title01">Login</h1>
			 	<div class="row">
			 		<label>Username*</label>
			 		<input type="text" name="cusname" value="<?php echo $_SESSION['cusname'];?>" required>
			 	</div>
			 	<div class="row">
			 		<label>Email*</label>
			 		<input type="email" name="cusmail" value="<?php echo $_SESSION['cusmail'];?>" required>
			 	</div>
			 	<div class="row">
			 		<label>Password*</label>
			 		<input type="Password" name="cuspw" value="<?php echo $_SESSION['cuspw'];?>" required>
			 	</div>
			 	<div class="row">
			 		<label>Gender</label>
			 		<ul class="radio">
			 			<li><input type="radio" name="gender" value="Male" <?php
								  if($_SESSION['gender']!=="Female" || $_SESSION['gender']!=="Other"){ echo "checked"; }  ?>>Male</li>
			 			<li><input type="radio" name="gender" value="Female" <?php
								 	if($_SESSION['gender']=="Female"){ echo "checked"; } 
								 ?>>Female</li>
			 			<li><input type="radio" name="gender" value="Other" <?php
								 	if($_SESSION['gender']=="Other"){ echo "checked"; } 
								 ?>>Other</li>
			 		</ul>
			 	</div>
			 	<div class="row">
			 		<label>Phone No*</label>
			 		<input type="text" name="cusph" value="<?php echo $_SESSION['cusph']; ?>" required>
			 	</div>
			 	<div class="row">
			 		<label>Address</label>
			 		<textarea  name="cusaddress" ><?php echo $_SESSION["cusaddress"]; ?></textarea>
			 	</div>
			 	<div class="rowBtn">
			 		<input type="submit" name="cusreg" value="Register" class="btn01">
			 		<input type="submit" name="clear" value="Clear" class="btn01">
			 	</div>
			 	
			 </form>
		</div>
	</div><!-- wrapper -->
</div><!-- content -->
<?php 
include("footer.php"); 
?>