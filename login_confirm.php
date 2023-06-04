<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];

   $con = mysqli_connect("localhost:3306", "user1", "12345", "test");
   $sql = "select * from sell_user where login_id='$id'";
   $result = mysqli_query($con, $sql);

   $num_match = mysqli_num_rows($result);

   if(!$num_match) 
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다!')
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $row = mysqli_fetch_array($result);
        $db_pass = $row["login_pass"];

        mysqli_close($con);

        if($pass != $db_pass)
        {

           echo("
              <script>
                window.alert('비밀번호가 틀립니다!')
                history.go(-1)
              </script>
           ");
           exit;
        }
        else
        {
            session_start();
            $_SESSION["login_id"] = $row["login_id"];
            $_SESSION["user_name"] = $row["user_name"];
            $_SESSION["department"] = $row["department"];
            $_SESSION["grade"] = $row["grade"];
            $_SESSION["trade_location"] = $row["trade_location"];

            echo("
              <script>
              history.go(-3)
              </script>
           ");

        }
     }        
?>
