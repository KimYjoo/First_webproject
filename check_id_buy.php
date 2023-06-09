<?php   
    $id = $_GET["book"];
    session_start();
    if(!isset($_SESSION["login_id"])){
        echo ("<script>
            alert('로그이 필요합니다!');
            location.href = 'login.php';  
            </script>
            ");
    }
    else{
        echo ("<script>
            location.href = 'buying.php?book=$id';  
            </script>
            "); 
    }
    ?>