<?php
session_start();


function emptyInputSignup($name,$pwd,$pwdRepeat,$nama,$email){
$result;
if(empty($name||$pwd||$pwdRepeat||$nama||$email)){
  $result=true;
} else{
  $result=false;
}
return $result;
}


function invalidUsername($name){
$result;
if(!preg_match("/^[a-zA-Z0-9]*$/",$name)){
  $result=true;
} else{
  $result=false;
}
return $result;
}

function invalidEmail($email){
$result;
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
  $result=true;
} else{
  $result=false;
}
return $result;
}

function pwdMatch($pwd,$pwdRepeat){
  $result;
  if($pwd !== $pwdRepeat){
    $result=true;
  } else{
    $result=false;
  }
  return $result;
}

function userExists($conn,$name,$email){
  $sql = "SELECT * FROM users WHERE userName = ? OR userEmail = ? ;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    // code...
      header("location: ../../signup.html?error=gagalQuery");
      exit();
    }

    mysqli_stmt_bind_param($stmt,"ss",$name,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
      return $row;
    } else { $result=false;
    }
              return $result;
    mysqli_stmt_close($stmt);
}

function createUser($conn,$name,$pwd,$email,$nama){
  $sql = " INSERT INTO users (userName,userPass,userReal,userEmail) VALUES(?, ? ,? ,?) ;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    // code...
      header("location: ../../signup.html");
      exit();
    }

    $hashedPwd=password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssss",$name,$hashedPwd,$nama,$email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../../index.html?signupSukses");
    exit();
}



   function CheckPassword($conn,$username,$password){
       $sql = "SELECT userPass,userID FROM users WHERE userName ='$username'";
       $stmt = mysqli_stmt_init($conn);
       if (!mysqli_stmt_prepare($stmt,$sql)) {
         // code...
           header("location: ../../login.html?Error=PasswordDoesntMatch");
           exit();
         }
     }



   function emptyInputLogin($name,$password){
     $result;
     if(empty($name||$passwordwd)){
       $result=true;
     } else{
       $result=false;
     }
     return $result;
     }


    function loginUser($conn,$username,$pwd){
      $userExists = userExists($conn,$username,$userID);

      if($userExists === false){
        header("location:../../index.html?error=falseLogin");
      }
       $pwdHashed =$userExists["userPass"];
       $checkPwd = password_verify($pwd, $pwdHashed);

       if($checkPwd === false){
         header("location:../../loginform.html?salahpassword");
         exit();
       }
       else if ($checkPwd === true){
         session_start();
         $_SESSION['idUser']=$userExists['userID'];
         $_SESSION['username']=$userExists['userName'];
         $_SESSION['loggedin']=true;
         header("location:../../index.html?LoginSuccess");
       }

  }



    function emptyInputAdd($title,$tags,$caption,$file){
    $result;
    if(empty($title||$tags||$caption||$file)){
      $result=true;
    } else{
      $result=false;
    }
    return $result;
    }

    function addPost($conn,$userid,$title,$togs,$caption,$file,$fileName,$fileTmpName,$fileSize,$fileError,$fileType){
          $likecount = 0;
          $fileExt = explode(".",$fileName);
          $fileActualExt = strtolower(end($fileExt));

          $allowed = array('jpg','jpeg','png','pdf');

          if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
              if($fileSize < 9000000){
                $fileNameNew = uniqid('',true).".". $fileActualExt;
                  $fileDestination = "../img/".$fileNameNew;
                 move_uploaded_file($fileTmpName,$fileDestination);

           //SQL MULAI UNTUK INSERT
           $sql = " INSERT INTO posts (userID,imgpath,tags,paragraph,title) VALUES(?, ? ,? ,?,?) ;";
           $stmt = mysqli_stmt_init($conn);
           if (!mysqli_stmt_prepare($stmt,$sql)) {
             // code...
               header("location: ../../signup.html");
               exit();
             }


             mysqli_stmt_bind_param($stmt,"sssss",$userid,$fileNameNew,$togs,$caption,$title);
             mysqli_stmt_execute($stmt);
             mysqli_stmt_close($stmt);
             header("location: ../../index.html?UploadSukses");
             exit();


              } else {
              header("location:../../addpost.html?=File terlalu besar");
              }
            }else {
              header("location:../../addpost.html?=JNE lagi Down");
            }
          } else {
            header("location:../../addpost.html?=File jenis ini tidak diterima$");
          }



    }

    function addMessage($conn,$name,$email,$message){
      $sql = " INSERT INTO mail (name,email,message) VALUES(?, ? ,?) ;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        // code...
          header("location: ../../signup.html");
          exit();
        }

        mysqli_stmt_bind_param($stmt,"sss",$name,$email,$message);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../../index.html?ContactSukses");
        exit();
    }

    function addLike($conn,$postid){
      $sql = "UPDATE posts SET LikeCount=LikeCount+1 WHERE post_id=$postid;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        // code...
          header("location:../../index.html");
          exit();
        }

        mysqli_stmt_bind_param($stmt,"s",$postid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location:../../post.html?post_id=$postid");
        exit();
    }

    function addDislike($conn,$postid){
      $sql = "UPDATE posts SET UnlikeCount=UnlikeCount+1 WHERE post_id=$postid;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        // code...
          header("location:../../index.html");
          exit();
        }

        mysqli_stmt_bind_param($stmt,"s",$postid);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location:../../post.html?post_id=$postid");
        exit();
}
 ?>
