<?php
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
session_start();
$userid=$_SESSION['idUser'];


if(isset($_GET["submitLike"])) {
$id_post=$_GET["submitLike"];
header("location:../../post.html?post_id=$postid");
addLike($conn,$id_post);
}else{
  header("location:../../post.html?post_id=$postid");
}


if(isset($_GET["submitDislike"])) {
$id_post=$_GET["submitDislike"];
header("location:../../post.html?post_id=$postid");
addDislike($conn,$id_post);
}else{
  header("location:../../post.html?post_id=$postid");
}

//---------------------------------------------
//          SUBMIT CONTACT
if(isset($_POST["submit-contact"])){
  //code..
$name =$_POST["name"];
$email=$_POST["email"];
$message =$_POST["message"];
;


addMessage($conn,$name,$email,$message);

}
else{
  header("location: ../../signup.html?error=idunnothat");
}


//---------------------------------------------
//          LOGIN
if(isset($_POST["submit-login"])){
$username =$_POST["username"];
$pwd =$_POST["password"];

if(emptyInputLogin($username,$pwd)!== false){
  header("location:../../loginform.html?error=adayangkosongtapibukanhati");
  exit();
}
loginUser($conn,$username,$pwd);
}


//---------------------------------------------
//          ADD POST
if(isset($_POST["submit-post"])){
   $title =$_POST["Title"];
   $togs =$_POST["Tags"];
   $caption =$_POST["Penjelasan"];
   $file =$_FILES["file"];
   $fileName = $_FILES['file']['name'];
   $fileTmpName = $_FILES['file']['tmp_name'];
   $fileSize = $_FILES['file']['size'];
   $fileError = $_FILES['file']['error'];
   $fileType = $_FILES['file']['type'];


   if(emptyInputAdd($conn,$title,$togs,$caption,$file,$fileName,$fileTmpName,$fileSize,$fileError,$fileType)!== false){
     header("location:../../addpost.html?error=adayangkosongtapibukanhati");
     exit();
   }
  addPost($conn,$userid,$title,$togs,$caption,$file,$fileName,$fileTmpName,$fileSize,$fileError,$fileType);
}

//---------------------------------------------
//          SIGNUP
if(isset($_POST["signup"])){
  //code..
$nama =$_POST["userReal"];
$name =$_POST["userName"];
$email=$_POST["userEmail"];
$pwd=$_POST["password"];
$pwdRepeat=$_POST["password-repeat"];

if(emptyInputSignup($name,$pwd,$pwdRepeat,$nama,$email)!== false){
  header("location: ../../signup.html?error=emptyinput");
  exit();
}

if(invalidUsername($name)!== false){
  header("location: ../../signup.html?error=invalidUsername");
  exit();
}

if(invalidEmail($email)!== false){
  header("location: ../../signup.html?error=invalidUsername");
  exit();
}

if(pwdMatch($pwd,$pwdRepeat)!== false){
  header("location: ../../signup.html?error=passwordMismatch");
  exit();
}

if(userExists($conn,$name,$email)!== false){
  header("location: ../../signup.html?error=usernameTaken");
  exit();
}

createUser($conn,$name,$pwd,$email,$nama);

}



//---------------------------------------------
//          LIKE BUTTON
	// connect to the database







 ?>
