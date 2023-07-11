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
        <h3>STUDENT PAGE</h3>
        <form action="" method="post">  <!--when action tag is blank then it means same file-->
            
            Email <input type="email" name="email" required> <br>
             <!-- required sey button mein kv bhi empty nhi rahega kuch toh  dena hii hoga -->
            Password <input type="password" name="password" required><br><br>
            <input type="submit" name="submit">
               


        </form><br>
        <?php
            session_start();
            if(isset($_POST['submit']))
            {
                //login tabhi hoga jab login id or password database k login id password sey match hoga
                $connection=mysqli_connect("localhost","root",""); //to make connection with database
                $db=mysqli_select_db($connection,"cms"); //to select which database we want to use here i am using cms database
                $query="SELECT * from students2 where email='$_POST[email]'";
                //is query mein email hai database ka or postemail hai jo form se ara
                //toh uskey according hi humein password chahiye
                $query_run=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($query_run))//mysqlifetchassoc  data fetch karega from database or assosiative array ki form mei $row ko de dega
                {
                    if($row['email'] == $_POST['email'])
                    {
                        if($row['password'] == $_POST['password'])
                        {
                            $_SESSION['email']=$row['email'];   //to set the session variables to set email and password for the logged in user
                           $_SESSION['password']=$row['password'];
                           $_SESSION['name']=$row['name'];
                            header("Location: student_dashboard.php");
                        }
                        else
                        {
                            echo "wrong password";
                        }
                    }
                    else
                    {
                        echo "wrong email";
                    }
                }
            }
        ?>

        
    </center>
        
</body>
</html>