<?php
 
    if (isset($_REQUEST['signIn']))
    {
        $username = $_GET['username'];
        $password = $_GET['password'];
        $link = mysqli_connect("localhost", "root", "", "dulieu");
        $query = "select * from admin where username='$username' and password='$password'";
        $sql = mysqli_query($link,$query);
        $num = mysqli_num_rows($sql);
        if($num != 0)
        {
            header("Location:../admin.html");
        }
        else{
            $query = "select * from user where username='$username' and password='$password'";
            $sql = mysqli_query($link,$query);
            $num = mysqli_num_rows($sql);
            if($num!=0)
            {
                header("Location:../user.html");
            }
            else
            {
                header("Location:../index.html");
            }
        }
        mysqli_free_result($sql);
        mysqli_close($link);
    }
    else
    {
        header("Location:./dangky.php");
    }
?>