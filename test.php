<?php
            session_start();
            if (isset($_SESSION["login_id"])) $user_id = $_SESSION["login_id"];
            else $user_id = "";
            if (isset($_SESSION["user_name"])) $user_name = $_SESSION["user_name"];
            else $user_name = "";
            if (isset($_SESSION["grade"])) $grade = $_SESSION["grade"];
            else $grade = "";
            if (isset($_SESSION["trade_location"])) $trade_location = $_SESSION["trade_location"];
            else $trade_location = "";
            echo $user_id;
?>	