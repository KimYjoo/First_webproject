
<?php
    $name = $_POST["bookname"];
    $name = "%".$name."%";
   $con = mysqli_connect("localhost:3306", "user1", "12345", "test");
   $sql = 'select book_id from book where name like "'.$name.'"';
   $result = mysqli_query($con, $sql);

   $num_match = mysqli_num_rows($result);

   if(!$num_match) 
   {
     echo("
           <script>
             window.alert('없는 책입니다! 관리자에게 책 추가 신청을 해주세요')
             history.go(-1)
           </script>
         ");
    }
    else
    {
	    $total_record = mysqli_num_rows($result);
        for($i = 0; $i < $total_record; $i++){
            mysqli_data_seek($result, $i);
            $row = mysqli_fetch_array($result);
            $gonext[$i] = $row["book_id"];
        }
        mysqli_close($con);
        session_start();
        $_SESSION["books"] = $gonext;
        echo("
          <script>
          location.href = 'book_list.php';
          </script>
           ");

        
     }        
?>
