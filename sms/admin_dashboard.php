<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>admin_dashboard</title>
    <?php 
     session_start();
     $conn = mysqli_connect("localhost","Hashim","Hashim@123","sms");
    ?>
  </head>
  <body>
  <h1>STUDENT INFORMATION SYSTEM ADMIN DASHBOARD</h1>
  <div>
      <h4>Loged in :<?php  echo $_SESSION['email'];?></h4>
      <h4>Name :<?php  echo $_SESSION['name'];?></h4>
      <a href="logout.php">Log out</a>
  </div>
 <div id="left_side">
   <form action="" method="post">
    <table class="table">
      <tr>
            <td> <input type="submit" name="search_student" value="Search Student"></td>
      </tr>
      <tr>
            <td> <input type="submit" name="edit_student" value="Edit Student"></td>
      </tr>
      <tr>
            <td> <input type="submit" name="add_student" value="Add Student"></td>
      </tr>
      <tr>
            <td> <input type="submit" name="delete_student" value="Delete Student"></td>
      </tr>
     
    </table>
   </form>

 </div>
 <!-- search student -->
  <div>
     <?php 
       if(isset($_POST['search_student'])){
         ?>
         <form action="" method="post">
           Enter the roll number:
           <input type="text" name="roll_no">
           <input type="submit" name="search_by_roll_no_search">
         </form>
         <?php
       }
       if(isset($_POST['search_by_roll_no_search']))
       {
        $query= "select * from students where roll_no='$_POST[roll_no]'";
        $students=mysqli_query($conn,$query);
        
          foreach($students as $student) {
            ?>
            <form action="edit_student.php" method="post">
            <table>
             <tr>
              <td>Roll Number:</td>
              <td><input type="text" name="" value="<?php echo $student['roll_no']; ?>"disabled></td>
             </tr>
             <tr>
              <td>Name:</td>
              <td><input type="text" name="name" value="<?php echo $student['name']; ?>"disabled></td>
             </tr>
             <tr>
              <td>Class:</td>
              <td><input type="text" name="class" value="<?php echo $student['class']; ?>"disabled></td>
             </tr>
             <tr>
              <td>Mobail Number:</td>
              <td><input type="text" name="mobail_no" value="<?php echo $student['mobail_no'];?>"disabled></td>
             </tr>
             <tr>
              <td>Email:</td>
              <td><input type="text" name="email" value="<?php echo $student['email']; ?>"disabled></td>
             </tr>
             <tr>
              <td>Password:</td>
              <td><input type="text" name="password" value="<?php echo $student['password']; ?>" disabled></td>
             </tr>
            </table>
            </form>
            <?php
          }
       }
     ?>
   </div> 



  <!-- //edit student -->
  <div>
     <?php 
       if(isset($_POST['edit_student'])){
         ?>
         <form action="" method="post">
           Enter the roll number:
           <input type="text" name="roll_no">
           <input type="submit" name="search_by_roll_no_edit">
         </form>
         <?php
       }
       if(isset($_POST['search_by_roll_no_edit']))
       {
        $query= "select * from students where roll_no='$_POST[roll_no]'";
        $students=mysqli_query($conn,$query);
        
          foreach($students as $student) {
            ?>
            <form action="edit_student.php" method="post">
            <table>
             <tr>
              <td>Roll Number:</td>
              <td><input type="text" name="roll_no" value="<?php echo $student['roll_no']; ?>"></td>
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
   <!-- add_student -->
   <div>
     <?php
       if(isset($_POST['add_student'])){

       
     ?>
     <form action="add_student.php" method="post">
       <table>
       <tr>
         <td>Roll Number:</td>
         <td><input type="text" name="roll_no" requred ></td>
       </tr>
       <tr>
         <td>Name:</td>
         <td><input type="text" name="name" requred ></td>
       </tr>
       <tr>
         <td>Class:</td>
         <td><input type="text" name="class" requred ></td>
       </tr>
       <tr>
         <td>Teacher:</td>
         <td><input type="text" name="teacher" requred ></td>
       </tr>
       <tr>
         <td>Mobail:</td>
         <td><input type="text" name="mobail_no" requred ></td>
       </tr>
       <tr>
         <td>Email:</td>
         <td><input type="text" name="email" requred ></td>
       </tr>
       <tr>
         <td>Password:</td>
         <td><input type="text" name="password" requred ></td>
       </tr>
       <tr>
         <td></td>
         <td><input type="submit" name="add" value="Add student"></td>
       </tr>
       </table>
     </form>
     <?php
       }
     ?>
   </div>
   <!-- delete student -->
   <div>
   <?php
   if(isset($_POST['delete_student'])){
     ?>
       <form action="delete_student.php" method="post">
           Enter the roll number:
           <input type="text" name="roll_no">
           <input type="submit" name="search_by_roll_no_delete" value="Delete Student">
       </form>
     <?php
     }
    ?>  
 
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>