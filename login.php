<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
<!-- BOOTSTRAP FILES


 -->

</head>
<body>
    <center>
        <h3>COACHING MANAGEMENT SYSTEM</h3>
        <form action="" method="post">  <!--when action tag is blank then it means same file-->
            <input type="submit" name="admin_login" value="Admin Login">
             <!-- value sey button k andar jo text likha hai wo aaega -->
            <input type="submit" name="student_login" value="Student Login">

        </form>

        <?php
            if(isset($_POST['admin_login']))    
            {
                // if the admin button is pressed then post request is send then isset function checks ki button press hua hai ya nahi
                header("Location: admin_login.php");  //redirects file to admin_login waley page pe

            }
            if(isset($_POST['student_login']))    
            {
                // if the student button is pressed then post request is send then isset function checks ki button press hua hai ya nahi
                header("Location: student_login.php");  //redirects file to student_login waley page pe
                
            }
        ?>
    </center>
        
</body>
</html>