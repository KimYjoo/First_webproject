<?php
  session_start();
  unset($_SESSION["login_id"]);
  unset($_SESSION["user_name"]);
  unset($_SESSION["department"]);
  unset($_SESSION["grade"]);
  unset($_SESSION["trade_location"]);
  
  echo("
       <script>
       history.go(-1)
         </script>
       ");
?>
