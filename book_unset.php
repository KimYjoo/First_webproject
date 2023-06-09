<?php
    session_start();
    if(isset($_SESSION["books"]))unset($_SESSION["books"]);
    echo("
          <script>
          location.href = 'book_list.php';
          </script>
           ");
?>