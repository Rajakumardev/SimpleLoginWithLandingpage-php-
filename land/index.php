<?php
    $con = mysqli_connect("localhost","root","","Stockdb");
    if(!$con){
        die("DATABASE ERROR");
    }
    $error=0;
    $uname = $_POST['uname'];
    $password = $_POST['pass'];
    if(empty($uname)){
        $error = 1;
    }else if(empty($password)){
        $error = 2;
    }else{
        $query = "SELECT *FROM users WHERE uname='".$uname."' and upass='".$password."'";
        $result = mysqli_query($con,$query);
        if(!$result){
            echo "<div class='error'><h4><li>QUERY ERROR(".mysqli_error($con).").</li></h4></div>";
        }else{
            if(mysqli_num_rows($result) == 1){
                echo "<div class='success'><h4><li>LOGIN SUCCESSFULL.</li></h4></div>";
            }else{
                echo "<div class='error'><h4><li>LOGIN UNSUCCESSFULL(username/password incorrect).</li></h4></div>";
            }
        }
    }
?>
<!doctype html>
<html>
    <!--HEAD TAG-->
    <head>
        <title>TITLE</title> <!--TITLE OF THE PAGE-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/custom.css"/>
    </head>
    <body>
        <div class="bg-wrapper container-fluid">
        </div>
        <?php
                            if($error == 1){
                                echo "<div class='error'><h4><li>Email Must not empty.</li></h4></div>";
                            }else if($error == 2){
                                echo "<div class='error'><h4><li>Password Must not empty.</li></h4></div>";
                            }else if($error == 0){
                                echo "";
                            }
                        ?>
        <div class="container-fluid">
            <div class="row main-head">
                <div class="col-sm-12 text-center">
                    <h1>STOCK MAINTENANCE</h1>                
                </div>
                <div class="col-sm-12 text-center">
                    <a href="#" class="btn btn-success" style="margin-top:40px;"onclick="openNav()">LOGIN</a>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="col-sm-12 panel-opt">
                            <div class="col-sm-3">
                                <div class="glyphicon glyphicon glyphicon-list-alt icostyle">
                                    <i style="font-size:20px;">features</i>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="glyphicon glyphicon glyphicon glyphicon glyphicon-lock icostyle">
                                    <i style="font-size:20px;">Professional</i>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="glyphicon glyphicon glyphicon-road icostyle">
                                    <i style="font-size:20px;">Success</i>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="glyphicon glyphicon glyphicon glyphicon-flag icostyle">
                                    <i style="font-size:20px;">Goal</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid login-overlay"id="login-olay">
            <div class="closebtn" onclick="closeNav()">&times</div>
            <div class="login-content" id="login-content">
                <h4>Login</h4>
                <form action="" method="POST">
                    <table>
                        <tr><td><input type="text" placeholder="Username"name="uname"></td></tr>
                        <tr><td><input type="password" placeholder="password" name="pass"></td></tr>
                        <tr><td align="right"><input type="submit" value="Login" class="btn btn-success"></td></tr>
                    </table>
                </form>
            </div>
        </div>
        <!--scripts-->
        <script src="jquery/jquery.js"></script>
        <script src="bootstrap/bootstrap.min.js"></script>
         <script type="text/javascript">
        function openNav(){
           document.getElementById("login-olay").style.marginTop=0;
        }
        function closeNav(){
           document.getElementById("login-olay").style.marginTop="-200%";
        }
        </script>
    </body>
</html>
