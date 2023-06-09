<link rel ="stylesheet" type = "text/css" href="header.css">

        <?php
            session_start();
            if (isset($_SESSION["login_id"])) $user_id = $_SESSION["login_id"];
            else $user_id = "";
            if (isset($_SESSION["user_name"])) $user_name = $_SESSION["user_name"];
            else $user_name = "";
            if (isset($_SESSION["department"])) $user_name = $_SESSION["department"];
            else $user_name = "";
            if (isset($_SESSION["grade"])) $grade = $_SESSION["grade"];
            else $grade = "";
            if (isset($_SESSION["trade_location"])) $trade_location = $_SESSION["trade_location"];
            else $trade_location = "";
        ?>	
        <div class = "wrap">
            <div class = "intro_bg">
                <div class = "header">
                    <div class = "home_key_area">
                        <a href = "index.php">HOME</a>
                    </div>
                    <ul class = "nav">
<?php 
    if(!$user_id) { 
?>                      
                        <li><a href = "register.php">REGISTER =]</a></li>
                        <li><a href = "login.php">LOGIN =]</a></li>
<?php 
    }
    else{
?>
                        <li><a href = "logout.php">LOGOUT =]</a></li>
<?php
    }
?>
                        <li><a href = "board_list.php">BOARD</a></li>
                        <li><a href = "book_unset.php">BOOKS</a></li>
                        <li><a href = "#">CONTACT</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </body>
