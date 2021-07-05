<?php
$conn = mysqli_connect("localhost","Hashim","Hashim@123","sms");
$query= "insert into students values ('','$_POST[roll_no]','$_POST[name]','$_POST[class]','$_POST[teacher]','$_POST[mobail_no]','$_POST[email]','$_POST[password]')";   
$query_run=mysqli_query($conn,$query);
?>        
<script type="text/javascript">
alert("Add_student sucessfully done!");
window.location.href="admin_dashboard.php"; 
</script>