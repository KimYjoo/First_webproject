
<?php  
    session_start();
    $user = $_SESSION["user_id"];
    $id = $_POST["book_id"];
    $price = $_POST["want"];
    $stars = $_POST["stars"];
    $regist_day = date("Y-m-d");
    $con = mysqli_connect("localhost:3306", "user1", "12345", "test");
     $sql = "insert into sell_book(book_id, user_id, price, isneed, sell_start,condi)";
     $sql .= "values($id, '$user', $price, $stars,'$regist_day', 0)";
    //echo $sql;
    mysqli_query($con, $sql);
    $sql = "select * from sell_book where book_id = $id";
	$result = mysqli_query($con, $sql);
    $record = mysqli_num_rows($result);
    $nowsell = 0;
    for($i = 0; $i < $record; $i++){
        mysqli_data_seek($result, $i);
        $row = mysqli_fetch_array($result);
        echo $row["price"]."<br>";

        $nowsell += $row["price"];
    }
    $sql = "select nowSell from book where book_id = $id";
	$result = mysqli_query($con, $sql);
    
    $nowsell /= $record;
    $sql = "update book set nowSell = $nowsell where book_id = $id";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo("
              <script>
              alert('책판매가 등록되었습니다.')
              history.go(-3)
              </script>
           ");

?>
