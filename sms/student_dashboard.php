<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>student_dashboard</title>
    <?php 
     session_start();
     $conn = mysqli_connect("localhost","Hashim","Hashim@123","sms");
    ?>
  </head>
  <body>
  <nav class="navbar navbar-dark bg-dark">
      <h4 class="navbar-brand">&nbsp&nbsp Loged in :<?php  echo $_SESSION['email'];?></h4>
      <h4 class="navbar-brand">Name :<?php  echo $_SESSION['name'];?></h4>
      <a href="logout.php" class="navbar-brand">Log out</a>
  </nav>
  <div class="container">
  <h1>STUDENT INFORMATION SYSTEM STUDENT DASHBOARD</h1>
  <table class="table table-borderless">
   <form action="" method="post">
    
      <tr>
            <td> <input class="btn btn-primary" type="submit" name="show_details" value="Student Profile"></td>
      </tr>
      <tr>
            <td> <input class="btn btn-primary" type="submit" name="edit_details" value="Edit Details &nbsp&nbsp&nbsp&nbsp&nbsp"></td>
      </tr>
     
    
   </form>
   </table>

<!-- Stdent profile -->
<div>
<br>
<br>
<table class="table">

 <?php
   if(isset($_POST['show_details'])){
    $selectquery="select * from students where email='$_SESSION[email]'";
    $students=mysqli_query($conn,$selectquery);
    foreach($students as $student) {
    ?>
    <h1>STUDENT PROFILE</h1>
      <tr>
        <td>Roll_No</td>
        <td><?php echo $student['roll_no']; ?></td>
      </tr>
      <tr> 
        <td>Name</td> 
        <td><?php echo $student['name']; ?></td>
      </tr>  
      <tr> 
        <td>Class</td>
        <td><?php echo $student['class']; ?></td>
      </tr>  
      <tr> 
        <td>Teacher_Name</td>  
        <td><?php echo $student['teacher_name']; ?></td>
      </tr>  
      <tr> 
        <td>Mobail Number</td>
        <td><?php echo $student['mobail_no']; ?></td>
      </tr>  
      <tr> 
        <td>Email</td>
        <td><?php echo $student['email']; ?></td>
      </tr>
     
    <?php
    }
}
   ?> 
</table>   
</div>

 <div>
 <!-- edit details -->
     <?php 
      
       if(isset($_POST['edit_details']))
       {
        $query= "select * from students where email='$_SESSION[email]'";
        $students=mysqli_query($conn,$query);
        
          foreach($students as $student) {
            ?>
            <h1>EDIT DETAILS</h1>
            <form action="edit_details.php" method="post">
            <table>
             <tr>
              <td>Roll Number:</td>
              <td><input type="text" name="roll_no" value="<?php echo $student['roll_no']; ?>" disabled></td>
             </tr>
             <tr>
              <td>Name:</td>
              <td><input type="text" name="name" value="<?php echo $student['name']; ?>"></td>
             </tr>
             <tr>
              <td>Class:</td>
              <td><input type="text" name="class" value="<?php echo $student['class']; ?>"></td>
             </tr>
             <tr>
              <td>Teacher:</td>
              <td><input type="text" name="teacher_name" value="<?php echo $student['teacher_name']; ?>" disabled></td>
             </tr>
             <tr>
              <td>Mobail Number:</td>
              <td><input type="text" name="mobail_no" value="<?php echo $student['mobail_no']; ?>"></td>
             </tr>
             <tr>
              <td>Email:</td>
              <td><input type="text" name="email" value="<?php echo $student['email']; ?>"></td>
             </tr>
             <tr>
              <td>Password:</td>
              <td><input type="text" name="password" value="<?php echo $student['password']; ?>"></td>
             </tr>
             <tr>
             <td></td>
             <td><input type="submit" name="edit" value="save" ></td>
             </tr>
            </table>
            </form>
            <?php
          }
       }
     ?>
   </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 </div>
  </body>
</html>