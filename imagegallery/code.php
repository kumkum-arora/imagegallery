<?php
session_start();
class image
{

  // connect with database
  private $localhost = "localhost";
  private $user = "root";
  private $password = "";
  private $dbname = "mydb3";
  public $connection;

  public function __construct()
  {
    $this->connection = new mysqli($this->localhost, $this->user, $this->password, $this->dbname);
    if (mysqli_connect_error()) {
      echo "not connected";
    } else {
      return $this->connection;
    }
  }
  //For Insert Data in backend
  public function insertdata($post)
  {
    $name = $this->connection->real_escape_string($_POST['name']);
    $email = $this->connection->real_escape_string($_POST['email']);
    $username = $this->connection->real_escape_string($_POST['uname']);
    $password = $this->connection->real_escape_string($_POST['password']);
    $query = "SELECT * FROM login where email='$email'";
    $result = $this->connection->query($query);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
      echo "<script>
                alert(' already Registered your Account');
                window.location.href='login.php';
                </script>";
    } else {
      $query = "insert into login(name,email,username,password) values('$name','$email','$username','$password')";
      $sql = $this->connection->query($query);
      echo "<script>
                alert('Registered Successfully');
                window.location.href='login.php';
                </script>";
    }
  }
  //login function
  public function Login($post)
  {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM login WHERE email='$email' AND password = '$password'";
    $result = $this->connection->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      // $_SESSION['login'] = true;.
      $_SESSION['uid'] = $row['id'];
      $_SESSION['uname'] = $row['email'];
      $_SESSION['pass'] = $row['password'];
      $_SESSION['name'] = $row['name'];
      return TRUE;
    } else {
      return FALSE;
    }
  }
  // logout function
  public function logout($post)
  {
    if (isset($_SESSION['uname'])) {

      session_unset();
      session_destroy();
      header('location:login.php');
      // if (session_destroy()) {
      //   echo "<script>
      //     alert('are you sure to logout');
      //     window.location.href='login.php';
      //     </script>";
      // } else {
      //   echo "<script>alert(Failed to logout)</script>";
      // }
    }
  }

  //images upload
  public function upload($post)
  {
    $title = $this->connection->real_escape_string($_POST['title']);
    $privacy = $this->connection->real_escape_string($_POST['privacy']);
    $view = 0;
    $uid = $_SESSION['uid'];
    $filename = $_FILES['image']['name'];
    $filepath = $_FILES['image']['tmp_name'];
    $imagename = explode(".", $filename);
    $ext = $imagename[1];
    $query = "show table status like 'upload'";
    $result = $this->connection->query($query);
    $row = $result->fetch_assoc();
    $id = $row['Auto_increment'];
    $newfilename = $id . "." . $ext;
    $query = "insert into upload(image,title,uid,privacy,view) values('$newfilename','$title',$uid,'$privacy',$view)";
    $sql = $this->connection->query($query);
    if ($sql == true) {
      echo "<script>
                alert('Successfully image uploaded');
                window.location.href='add.php';
                </script>";
      move_uploaded_file($filepath, "photos/" . $newfilename);
      // header('location.upload.php');
    } else {
      echo "failed to upload";
    }
  }
  // Display private image
  public function privatepost($id)
  {
    $query = "select * from upload where uid =$id";
    $result = $this->connection->query($query);
    if ($result) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    } else {
      echo "no record found";
    }
  }

  // function for view count
  public function view($id)
  {
    $query = "update upload set view= view + 1 where id = $id";
    // $result = $this->connection->query($query);
    $sql = $this->connection->query($query);
    if ($sql == true) {
      echo "yess";
    } else {
      echo "Record not update";
    }
  }


  //function for show public images
  public function publicpost($id)
  {
    $query = "select * from upload where privacy='public'";
    $result = $this->connection->query($query);
    if ($result) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    } else {
      echo "no record found";
    }
  }
  // delete post 
  public function delete($id)
  {
    $query = "delete from upload where id='$id'";
    $sql = $this->connection->query($query);
    $row = $sql->fetch_assoc();

    if ($row) {
      header("location:add.php");
      unlink("photos/" . $row['image']);
    } else {
      echo "Record not deleted";
    }
  }

  // favourite funtion
  public function addToFavourite()
  {
    $image = $this->connection->real_escape_string($_POST['image']);
    $title = $this->connection->real_escape_string($_POST['tit']);
    $uid = $_SESSION['uid'];
    $query = "insert into fav(image,title,uid) values('$image','$title',$uid)";
    $sql = $this->connection->query($query);
    if ($sql == true) {
      echo "Record Inserted";
      header("location:fav.php");
    } else {
      echo "Record not Inserted";
    }
  }

  // function for displaying full image
  public function big($bid)
  {
    $query = "select * from upload where id='$bid'";
    $result = $this->connection->query($query);
    if ($result) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    } else {
      echo "no record found";
    }
  }

  public function fullimagedisplay($bid)
  {
    $query = "select * from upload where id='$bid'";
    $result = $this->connection->query($query);
    if ($result) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    } else {
      echo "no record found";
    }
  }

  //function for displaying fav photos
  public function favdisplay($fid)
  {
    $query = "select * from fav where uid=$fid";
    $result = $this->connection->query($query);
    if ($result) {
      $data = array();
      while ($row = $result->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    } else {
      echo "no record found";
    }
  }

  //function for remove photos from favourites
  public function removefav($fid)
  {
    $query = "delete from fav where fid='$fid'";
    $sql = $this->connection->query($query);
    $row = $sql->fetch_assoc();

    if ($row) {
      header("location:add.php");
      unlink("photos/" . $row['image']);
    } else {
      echo "Record not deleted";
    }
  }
}
