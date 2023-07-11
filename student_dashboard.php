<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT DASHBOARD</title>
    <style>
    #header {
        height: 10%;
        width: 100%;
        top: 2%;
        background-color: black;
        position: fixed;
        color: white;

    }

    #leftside {
        height: 75%;
        width: 15%;
        top: 10%;

        position: fixed;

    }

    #rightside {
        height: 75%;
        width: 80%;
        top: 10%;
        background-color: whitesmoke;
        position: fixed;
        left: 17%;
        top: 21%;
        color: red;
        border: solid 1px black;

    }

    #top_span {
        top: 15%;
        width: 80%;
        left: 17%;
        position: fixed;
    }
    #td{
        border:solid 1px black;
        padding-left:2px;
        text-align: left;
        width: 200px;

    }
    </style>
    <?php
    session_start();
    $connection=mysqli_connect("localhost","root","");
    $db=mysqli_select_db($connection,"cms");
    ?>
</head>

<body>
    <div id="header">
        <center><strong><br><br><b>COACHING MANAGEMENT SYSTEM
                </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Email:
            <?php echo $_SESSION['email']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong>Welcome
            <?php echo $_SESSION['name']; ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="logout.php">Log-Out</a>
        </center>
    </div>
    <span id="top_span">
        <marquee><strong>COACHING MANAGEMENT SYSTEM</strong></marquee>
    </span>
    <div id="leftside">
        <br><br><br>
        <form action="" method="post">
            <table>
                <tr>
                    <td><input type="submit" name="show_details" value="Show Student"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="edit_details" value="Edit Details"></td>
                </tr>
                
                <tr>
                    <td><input type="submit" name="showteacher" value="Show Teachers"></td>
                </tr>
            </table>
        </form>
    </div>
    <div id="rightside"><br><br><br><br>
        <div id="demo">
            <?php

            if(isset($_POST['show_details']))
            {
                $query="SELECT * FROM students2 where email='$_SESSION[email]'";
                $query_run=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($query_run))
                {
                    ?>
                    <table>
                        <tr>
                            <td>
                                <b>Roll No:</>
                            </td>
                            <td><input type="text" value="<?php echo $row['roll_no'] ; ?>" disabled>
                        </td>
                        <tr>
                                <td><b>Name:</b></td>
                                <td>
                                        <input type="text" value="<?php echo $row['name'];?>" disabled>
                                 </td>
                        </tr>
                        <tr>
                                <td><b>Father's Name:</b></td>
                                <td>
                                        <input type="text" value="<?php echo $row['father_name'];?>" disabled>
                                 </td>
                        </tr>
                        <tr>
                                <td><b>Class:</b></td>
                                <td>
                                        <input type="text" value="<?php echo $row['class'];?>" disabled>
                                 </td>
                        </tr>
                        <tr>
                                <td><b>Contact No:</b></td>
                                <td>
                                        <input type="text" value="<?php echo $row['mobile'];?>" disabled>
                                 </td>
                        </tr>
                        <tr>
                                <td><b>Email:</b></td>
                                <td>
                                        <input type="text" value="<?php echo $row['email'];?>" disabled>
                                 </td>
                        </tr>
                        <tr>
                                <td><b>Remark:</b></td>
                                <td>
                                        <textarea  cols="30" rows="3" disabled><?php echo $row['remark'];?></textarea>
                                 </td>
                        

                        </tr>
                    </table>
                    <?php
                }
            }
            ?>
            <?php
                if(isset($_POST['edit_details']))
                {
                    $query="SELECT * FROM students2 where email='$_SESSION[email]'";
                    $query_run=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($query_run))
                    {
                        ?>
                        <form action="student_edit.php" method="post">
                        <table>
                            <tr>
                                <td>
                                    <b>Roll No:</>
                                </td>
                                <td><input type="text" name="roll_no" value="<?php echo $row['roll_no'] ; ?>" >
                            </td>
                            <tr>
                                    <td><b>Name:</b></td>
                                    <td>
                                            <input type="text" name="name" value="<?php echo $row['name'];?>" >
                                     </td>
                            </tr>
                            <tr>
                                    <td><b>Father's Name:</b></td>
                                    <td>
                                            <input type="text" name="father_name" value="<?php echo $row['father_name'];?>" >
                                     </td>
                            </tr>
                            <tr>
                                    <td><b>Class:</b></td>
                                    <td>
                                            <input type="text" name="class" value="<?php echo $row['class'];?>" >
                                     </td>
                            </tr>
                            <tr>
                                    <td><b>Contact No:</b></td>
                                    <td>
                                            <input type="text" name="mobile" value="<?php echo $row['mobile'];?>" >
                                     </td>
                            </tr>
                            <tr>
                                    <td><b>Email:</b></td>
                                    <td>
                                            <input type="text" name="email" value="<?php echo $row['email'];?>" >
                                     </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="save" value="save"></td>
                            </tr>
                        </table>
                        </form>
                        <?php
                    }
                }
            ?>


        </div>
    </div>
</body>

</html>