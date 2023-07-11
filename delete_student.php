<script>
    if(confirm("Are you sure to delete the student data?"))
    {
        document.write("<?php  
        $connection=mysqli_connect("localhost","root","");
        $db=mysqli_select_db($connection,"cms");
        $query="DELETE FROM `students2` WHERE `students2`.`roll_no` = $_POST[roll_no]";
        $query_run=mysqli_query($connection,$query);
        ?>")
        window.location.href="admin_dashboard.php";
    }
    else
    {
        window.location.href="admin_dashboard.php";
    }
</script>

<!-- document .write() function ki help sey hum php execute karengey -->