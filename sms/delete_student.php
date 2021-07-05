<script type="text/javascript">
    if(confirm("Are sure want to delete?")){
        document.write("<?php
             $conn = mysqli_connect("localhost","Hashim","Hashim@123","sms");
             $query= "delete  from  students where roll_no=$_POST[roll_no]";   
             $query_run=mysqli_query($conn,$query);
            ?>");
            window.location.href="admin_dashboard.php"; 
    }
    else{
        window.location.href="admin_dashboard.php"; 
    }

</script>