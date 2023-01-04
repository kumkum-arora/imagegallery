<?php

include('code.php');
$obj = new image();

if (!empty($_POST['log'])) {
  $user = $obj->logout($_POST);
}

if (isset($_REQUEST['didd'])) {
  $id = $obj->delete($_REQUEST['didd']);
}
if (isset($_POST['add'])) {
  $obj->addToFavourite($_POST);
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
      $uid = $_SESSION['uid'];

      $row = $obj->publicpost($uid);
      if (isset($row)) {
        foreach ($row as $row1) { ?>
          <form method="post" action="" enctype="multipart/form-data">
            <!-- // inner small div for posts -->
            <div class="main4">
              <a href="big.php?big=<?php echo $row1['id'] ?>"> <img src="photos/<?php echo $row1['image'] ?>" style="width: 200px; height: 200px;" <?php echo $row1['image'] ?>></a>
              <input type="hidden" value="<?php echo $row1['image'] ?>" name="image">

              <!-- //div for add content -->
              <div class="main5"><input type="hidden" value="<?php echo $row1['title'] ?>" name="tit"><?php echo $row1['title'] ?></div>
              <input type="submit" name="add" class="bg-gray-800 text-white rounded-lg px-6  hover:text-white hover:bg-black, fav" value="add to favourites" />
              <!-- <a href="fav.php?fav=<?php echo $row1['id'] ?>" class="bg-gray-800 text-white rounded-lg px-6  hover:text-white hover:bg-black, fav" >ADD to</a> -->
          </form>
          <a href="add.php?didd=<?php echo $row1['id'] ?>"><i class="fa-solid fa-trash" style=" margin: 10px 10px;"></i></a>
    </div>
<?php }
      } ?>
  </div>
  </div>
</body>

</html>