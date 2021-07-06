<?php
$conn = mysqli_connect("localhost","Hashim","Hashim@123","sms");
$query= "update students set name='$_POST[name]',class='$_POST[class]',teacher_name='$_POST[teacher]',mobail_no='$_POST[mobail_no]',email='$_POST[email]',password='$_POST[password]' where roll_no='$_POST[roll_no]'";
$query_run=mysqli_query($conn,$query);
?>        
<script type="text/javascript">
alert("Detail updated sucessfully");
window.location.href="admin_dashboard.php"; 
</script>