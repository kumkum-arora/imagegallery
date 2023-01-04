<?php
include('code.php');
$obj = new image();

if (isset($_REQUEST['didd'])) {
  $fid = $obj->removefav($_REQUEST['didd']);
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>favourite page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="st1.css">
</head>

<body>
  <!-- header div -->
  <div class="bar">
    <!--  // header inner div -->
    <div class="bar1">
      <ul>
        <li><a href="add.php">Go Back</a></li>
      </ul>
    </div>
  </div>
  <!--   main div for display images -->
  <div class="main2">
    <!-- // center div -->
    <div class="main3">
      <?php
      $uid = $_SESSION['uid'];
      $row = $obj->favdisplay($uid);
      if (isset($row)) {
        foreach ($row as $row1) { ?>
          <!-- // inner small div for fav posts -->
          <div class="main4">
            <img src="photos/<?php echo $row1['image'] ?>" style="width: 200px; height: 200px;" <?php echo $row1['image'] ?>>
            <div class="main5"><?php echo $row1['title'] ?></div>
            <a href="fav.php?didd=<?php echo $row1['fid'] ?>">
              <p class="bg-gray-800 text-white rounded-lg px-6  hover:text-white hover:bg-black, fav">Remove from fav</p>
            </a>
          </div>
          <!-- inner small div end here -->
      <?php }
      } ?>
    </div>
</body>

</html>