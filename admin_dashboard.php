<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN DASHBOARD</title>
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
                    <td><input type="submit" name="searchstudent" value="Search Student"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="editstudent" value="Edit Student"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="addnewstudent" value="Add Student"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="deletestudent" value="Delete Student"></td>
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
                if(isset($_POST['searchstudent'])) 
                {
                    ?>
                    <center>
                        <form action="" method="post">
                            Enter Roll No:
                            <input type="text" name="roll_no">
                            <input type="submit" name="search_by_roll_no_for_search" value="Search">
                        </form>
                    </center>
                 <?php
                }

                if(isset($_POST['search_by_roll_no_for_search']))
                {
                    $query="SELECT * from students2 where roll_no='$_POST[roll_no]'";
                    $query_run=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($query_run))
                    {
                        ?>
                     <table>
                        <tr>
                                <td><b>Roll No:</b></td>
                                <td>
                                        <input type="text" value="<?php echo $row['roll_no'];?>" disabled>
                                 </td>
                        </tr>
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
                if(isset($_POST['editstudent'])) 
                {
                    ?>
                    <center>
                        <form action="" method="post">
                            Enter Roll No:
                            <input type="text" name="roll_no">
                            <input type="submit" name="search_by_roll_no_for_edit" value="Search">
                        </form>
                    </center>
                 <?php
                }

                if(isset($_POST['search_by_roll_no_for_edit']))
                {
                    $query="SELECT * from students2 where roll_no='$_POST[roll_no]'";
                    $query_run=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($query_run))
                    {
                        ?>
                     <form action="admin_edit_student.php" method="post">
                     <table>
                        
                        <tr>
                                <td><b>Roll NO</b></td>
                                <td>
                                        <input type="text" name="roll_no" value="<?php echo $row['roll_no'];?>" >
                                 </td>
                          
                        </tr>
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
                                <td><b>Remark:</b></td>
                                <td>
                                        <textarea  cols="30" rows="3" name="remark"><?php echo $row['remark'];?></textarea>
                                 </td>
                        </tr>
                        <br><br>
                        <tr>
                                <td></td>
                                <td>
                                        <input type="submit" name="edit" value="Save">
                                 </td>
                        </tr>

                     </table>
                     </form>
                        <?php        
                    }
                }
            ?>


            
                <?php
                    if(isset($_POST['addnewstudent']))
                    {
                        ?>
                        
                                <center><h3 >ADD DETAILS</h3></center>
                                <form action="add_student.php" method="post">
                                    <table>
                                        <tr>
                                            <td>Roll No:</td>
                                            <td><input type="text" name="roll_no" required></td>
                                        </tr>
                                        <tr>
                                            <td>Name:</td>
                                            <td><input type="text" name="name" required></td>
                                        </tr>
                                        <tr>
                                            <td>Father Name:</td>
                                            <td><input type="text" name="father_name" required></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td>Class:</td>
                                            <td><input type="text" name="class" required></td>
                                        </tr>
                                            <td>Mobile:</td>
                                            <td><input type="text" name="mobile" required></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Email:</td>
                                            <td><input type="text" name="email" required></td>
                                        </tr>
                                        <tr>
                                            <td>Password:</td>
                                            <td><input type="text" name="password" required></td>
                                        </tr>
                                        <tr>
                                            <td>Remark:</td>
                                            <td><textarea name="remark"  cols="30" rows="3"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <td> <input type="submit" name="add" value="Add Student">
                                                </td>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                        
                    }
                ?>

                <?php
                    if(isset($_POST['deletestudent']))
                    {
                        ?>
                        <center>
                            <form action="delete_student.php" method="post">
                                Enter Roll No:<input type="text" name="roll_no">
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="search_by_roll_no_for_delete" value="Delete Student">

                            </form>
                    </center>
                    <?php
                    }
                ?>

                <?php
                    if(isset($_POST['showteacher']))
                    {
                        ?><center>
                            <h5>Teacher's Details</h5>
                            <table style="border-collapse: collapse;border:1px solid black ">
                                <tr>
                                    <td id="td"><b>ID</b></td>
                                    <td id="td"><b>Name</b></td>
                                    <td id="td"><b>Mobile</b></td>
                                    <td id="td"><b>Courses</b></td>

                                </tr>
                            </table>
                            </center>
                            <?php
                            $connection=mysqli_connect("localhost","root","");
                            $db=mysqli_select_db($connection,"cms");
                            $query="SELECT * FROM teachers2";
                            $query_run=mysqli_query($connection,$query);
                            while($row=mysqli_fetch_assoc($query_run))
                            {
                                ?>
                                <center>
                                   <table style="border-collapse: collapse;border:1px solid black ">
                                   <tr>
                                        <td id="td"><?php echo $row['t_id']?></td>
                                        <td id="td"><?php echo $row['name']?></td>
                                        <td id="td"><?php echo $row['mobile']?></td>
                                        <td id="td"><?php echo $row['courses']?></td>
                                    </tr>
                                   </table>
                                </center>
                                <?php
                            }

                    }

                ?>


        </div>
    </div>
</body>

</html>