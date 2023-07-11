<?php  
$connection=mysqli_connect("localhost","root","");
$db=mysqli_select_db($connection,"cms");
$query="UPDATE students2 SET name='$_POST[name]',father_name='$_POST[father_name]',class=$_POST[class],email='$_POST[email]',mobile=$_POST[mobile] WHERE roll_no=$_POST[roll_no]";
$query_run=mysqli_query($connection,$query);
?>
<script>
    alert("DETAILS entered Successfully!");
   window.location.href="student_dashboard.php";
</script>