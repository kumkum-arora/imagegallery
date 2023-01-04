<?php

include('code.php');
$obj = new image();



if (isset($_REQUEST['big'])) {
  // $bid=$_REQUEST['big'];
  $view = $obj->view($_REQUEST['big']);
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>image display</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
  <link rel="stylesheet" type="text/css" href="st1.css">
</head>

<body>
  <!-- header div -->
  <div class="bar">
    <!--  // header inner div -->
    <div class="bar1">
      <ul>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="fav.php">Favourites</a></li>

        <button class="button"><a href="login.php?log=1">Logout</a></button>
        <a href="upload.php" class="button2">Upload_image</a>
      </ul>
    </div>
  </div>
  <!--   main div for display images -->
  <div class="main2">
    <!-- // center div -->
    <div class="main3">

      <?php
      $bid = $_REQUEST['big'];
      $row = $obj->big($bid);
      if (isset($row)) {
        foreach ($row as $row1) { ?>

          <!-- // inner small div for posts -->
          <div class="mainbig">
            <img src="photos/<?php echo $row1['image'] ?>" style="width: 500px; height: 500px;" <?php echo $row1['image'] ?>>


            <!-- //div for add content -->
            <div class="mainbig2"><?php echo $row1['title'] ?><p>views :<?php echo $row1['view']
                                                                        ?></p>
            </div>
          </div>
      <?php }
      } ?>
    </div>
  </div>
</body>

</html>