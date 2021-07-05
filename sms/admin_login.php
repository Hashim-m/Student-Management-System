<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
   <h1>Admin_Login</h1>
    <form action="" method="post" >
            <label for="exampleDropdownFormEmail2" class="form-label">Email address</label>
            <input type="email" name="email"  placeholder="email@example.com"><br><br>
            <label for="exampleDropdownFormPassword2" class="form-label">Password</label>
            <input type="password"  name="password" placeholder="Password"><br><br>
            <input type="submit" name="submit" class="btn btn-primary">
    </form><br>
    <?php
     session_start();
     if(isset($_POST['submit'])){
        $conn = mysqli_connect("localhost","Hashim","Hashim@123","sms");
        $query= "select * from login where email='$_POST[email]'";
        $query_run=mysqli_query($conn,$query);
        while($row=mysqli_fetch_assoc($query_run)){
            if($row['email']==$_POST['email']){
                if($row['password']==$_POST['password']){
                    $_SESSION['email']=$row['email'];
                    $_SESSION['name']=$row['name'];
                    header("Location:admin_dashboard.php");
                    // echo "sucessfully";
                }
                else{
                    echo "Wrong Password";
                }
            }
            else{
                echo "Wrong email ID";
            }
        }
     }
     
    ?>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html> 