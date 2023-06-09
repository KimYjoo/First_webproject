<?php
$name = $_POST["bookname"];
$name = "%".$name."%";
$con = mysqli_connect("localhost:3306", "user1", "12345", "test");
$sql = 'select * from book where name like "'.$name.'"';

// $user = "pas4976";
// $con = mysqli_connect("localhost:3306", "user1", "12345", "test");
// $sql = 'select * from sell_user where login_id = "'.$user.'"';
// $result = mysqli_query($con, $sql);
// $row = mysqli_fetch_array($result);
// $name =  $row["user_name"];
// $img_src = "img/".$id.".jpeg";
// echo $name;
// $sql = "select * from book where name = '$book_name'";
// $result = mysqli_query($con, $sql);
// $id            = $row["book_id"];
// $name          = $row["name"];
// $author        = $row["author"];
// $publisher     = $row["publisher"];
// $price         = $row["price"];
// $category      = $row["category"];
// $now_sell      = $row["now_sell"];
// $department    = $row["department"];
// echo $id."<br>";
// echo "hi";
?>	
<!-- <img src = <?=$img_src?>></div> -->