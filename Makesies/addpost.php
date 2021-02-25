<!DOCTYPE html>
<html>
<?php
session_start();
 ?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="MAKESIES" Description="Makesies is a website made to gather folks who appreciate handmade stuff!, Come join us in sharing and discussing all things about handmade stuff!.">
    <title>MAKESIES</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arbutus+Slab">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo-1.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

    <section>
        <header>
            <div id="navbar">
                <nav class="navbar navbar-light navbar-expand-md" id="nav-style" style="box-shadow: 0px 0.1px;">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index.php" style="font-size: 20px;">
                            <picture><img src="assets/img/popop.jpeg" height="30px"></picture>Makesies</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div
                            class="collapse navbar-collapse" id="navcol-1">
                            <ul class="nav navbar-nav mx-auto">
                                <li class="nav-item"><input class="border rounded shadow-sm" type="search" placeholder=" Search..." style="height: 33px;" id="search"><a href="#Search" onclick="this.href='search.php?posttitle='+document.getElementById('search').value" class="fa fa-search id="></a></li>
                            </ul>
                            <ul class="nav navbar-nav">
                                <li class="nav-item" style="margin-right: 5px;"><a class="nav-link active" href="index.php">Home</a></li>
                                <li class="nav-item" style="margin-right: 5px;"><a class="nav-link active" href="about.php">About</a></li>
                                <li class="nav-item" style="margin-right: 5px;"><a class="nav-link active" href="contact.php">Contact</a></li>
                                <?php
                                if (isset($_SESSION["username"])){
                                      echo  '<li class="nav-item" style="margin-right: 5px;"><a class="nav-link active" href="addpost.php">Post</a></li>';
                                      echo  '<li class="nav-item" style="margin-left: 5px;"><a class="btn btn-primary" role="button" href="assets/php/logout.php">Logout</a></li>';
                                } else echo '<li class="nav-item" style="margin-left: 5px;"><a class="btn btn-primary" role="button" href="login.php">Login</a></li>';

                                 ?>

                            </ul>
                    </div>
            </div>
            </nav>
            </div>
        </header>
<body>

<?php
if(isset($_SESSION["username"])){
  echo '<div class="register-photo">
        <div class="form-container">
        <div class="image-holder">
        </div>
              <form action ="assets/php/formactions.php" method="post" enctype="multipart/form-data">
                  <h2 class="text-center"><strong>Make</strong> a Post.</h2>
                  <div class="form-group"><input class="form-control" type="text" name="Title" placeholder="Title"></div>
                  <div class="form-group"><input class="form-control" type="text" name="Tags" placeholder="Tags"></div>
                  <div class="form-group"><input class="form-control" type="text" name="Penjelasan" placeholder="Jelaskan....."></div>
                  <div class="form-group"><input class="form-control" type="file" name="file" placeholder="Jelaskan....."></div>
                  <div class="form-group"><button name="submit-post" class="btn btn-primary btn-block" type="submit">Submit</button>
              </form>
      </div>
  </div>';
}
  else{
    echo'<div class="register-photo">
    <div class="form-container">
         <form method="post">
        <h2 class="text-center"><strong>You Haven&#39;t Logged in yet.</strong></h2>
        <h5 class="text-center"><strong>Please Log In First.</strong></h5>
        <div class="form-group"><a class="btn btn-primary btn-block" role="button" href="login.php">Redirect to Login Page</a></div>
        </form>
        </div>
        </div>';}
?>

</body>


<div class="footer-basic margin-top:100px">
  <footer >
      <ul class="list-inline">
          <li class="list-inline-item"><a href="index.php">Home</a></li>
          <li class="list-inline-item"><a href="addpost.php">Post</a></li>
          <li class="list-inline-item"><a href="about.php">About</a></li>
          <li class="list-inline-item"><a href="contact.php">Contact</a></li>
          <li class="list-inline-item"><a href="assets/php/logout.php?suksesLogout">Logout</a></li>
      </ul>
      <p class="copyright">Henry Lianto © 2021</p>
  </footer>
</div>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>

</html>
