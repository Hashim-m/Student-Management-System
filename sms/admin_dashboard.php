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
  <nav class="navbar navbar-dark bg-dark">
      <h4 class="navbar-brand">&nbsp&nbsp&nbsp&nbspLoged in :<?php  echo $_SESSION['email'];?></h4>
      <h4 class="navbar-brand">Name :<?php  echo $_SESSION['name'];?></h4>
      <a class="navbar-brand" href="logout.php">Log out&nbsp&nbsp&nbsp&nbsp</a>
  </nav> 
  <div class="container"> 
  <br>
  <h1>STUDENT INFORMATION SYSTEM ADMIN DASHBOARD</h1>
  <br>
 <div id="left_side">
   <form action="" method="post">
    <table class="table table-borderless">
      <tr>
            <td> <input type="submit" class="btn btn-primary" name="search_student" value="Search Student"></td>
      </tr>
      <tr>
            <td> <input type="submit" class="btn btn-primary" name="edit_student" value="Edit Student&nbsp&nbsp&nbsp&nbsp"></td>
      </tr>
      <tr>
            <td> <input type="submit" class="btn btn-primary" name="add_student" value="Add Student&nbsp&nbsp&nbsp&nbsp"></td>
      </tr>
      <tr>
            <td> <input type="submit" class="btn btn-primary" name="delete_student" value="Delete Student"></td>
      </tr>
      <tr>
            <td> <input type="submit" class="btn btn-primary" name="show_teachers" value="View Teacher&nbsp&nbsp&nbsp"></td>
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
           <input type="submit" class="btn btn-primary" name="search_by_roll_no_search">
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
              <td>Teacher_name:</td>
              <td><input type="text" name="" value="<?php echo $student['teacher_name']; ?>"disabled></td>
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
           <input type="submit" class="btn btn-primary" name="search_by_roll_no_edit">
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
              <label for="teacher_name" name="teacher">Teacher:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
              <select name="teacher" id="">
                <?php 
                $conn = mysqli_connect("localhost","Hashim","Hashim@123","sms");
                $selectquery="select teacher_name from teachers";
                $teachers=mysqli_query($conn,$selectquery);
                foreach($teachers as $teacher) {
                ?>
                <option value="<?php echo $teacher['teacher_name']; ?>" name="teacher"><?php echo $teacher['teacher_name']; ?></option>
          <?php
           }
          ?>
          </select>
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
             <td><input type="submit" class="btn btn-primary" name="edit" value="save" ></td>
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
       <!-- <tr>
         <td>Teacher:</td>
         <td><input type="text" name="teacher" requred ></td>
       </tr> -->
       <div>
       <tr>
       <label for="teacher_name" name="teach">Teacher:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
       
           <select name="teacher" id="">
        <?php 
         $conn = mysqli_connect("localhost","Hashim","Hashim@123","sms");
         $selectquery="select teacher_name from teachers";
         $teachers=mysqli_query($conn,$selectquery);
         foreach($teachers as $teacher) {
        ?>
          <option value="<?php echo $teacher['teacher_name']; ?>" name="teacher"><?php echo $teacher['teacher_name']; ?></option>
          <?php
           }
          ?>
          </select>
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
         <td><input type="submit" class="btn btn-primary" name="add" value="Add student"></td>
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
           <input type="submit" name="search_by_roll_no_delete" class="btn btn-primary" value="Delete Student">
       </form>
     <?php
     }
    ?>  
 
   </div>
   <div>
   <table class="table">
   
<?php
  if(isset($_POST['show_teachers'])){
    ?>
    <tr>
       <td>Teacher Name</td>
       <td>Contact No</td> 
   </tr>
    <?php
   $conn = mysqli_connect("localhost","Hashim","Hashim@123","sms"); 
   $selectquery="select * from teachers";
   $teachers=mysqli_query($conn,$selectquery);
   foreach($teachers as $teacher) {
   ?>
     
     <tr> 
       <td><?php echo $teacher['teacher_name']; ?></td>
       <td><?php echo $teacher['mobail_no']; ?></td>
       
     </tr>   
   <?php
   }
}
  ?> 
</table>  
   </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </div>
  </body>
</html>