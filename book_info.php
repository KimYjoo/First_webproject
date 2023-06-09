<!doctype html>
<html>
	<head>
		<meta charset ="utf-8">
		<title>고책</title>
		<link rel ="stylesheet" type = "text/css" href ="book_info.css">
		<link rel ="stylesheet" type = "text/css" href="common.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
        <?php
			$book_id = $_GET["book"];
			$con = mysqli_connect("localhost:3306", "user1", "12345", "test");
			$sql = "select * from book where book_id = $book_id";
			$sql1 = "select * from sell_book where book_id = $book_id";

			$result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            $id            = $row["book_id"];
			$name          = $row["name"];
			$author        = $row["author"];
			$publisher     = $row["publisher"];
			$price         = $row["price"];
			$category      = $row["category"];
			$now_sell      = $row["nowSell"];
			$department    = $row["department"];
            $img_src = "img/".$id.".jpeg";
		?>
    </head>
	<body>
		<div class = "parent">
			<div class = "back_img">
				<div class = "header">
					<?php include "header.php";?>
				</div>
				<div class ="community_table">
                    
                <div class = "blank"></div>

					<div class="community">
                    <?php
					           mysqli_close($con);
                               $buy = "check_id_buy.php?book=".$id;
                               $sell = "check_id_sell.php?book=".$id;
					        ?>
                        <div class="book_info">
                            <div class="wrap">
                                    <div class="bookimg"><img src = <?=$img_src?>></div>
					        	    <div class="col">책 이름 : <?=$name?></div>
					        	    <div class="col">저자 : <?=$author?></div>
					        	    <div class="col">출판사 : <?=$publisher?></div>
					        	    <div class="col">원가 : <?=$price."원"?></div>
					        	    <div class="col">편균가 : <?=$now_sell."원"?></div>
					        	    <div class="col">분류 : <?=$category?></div>
					        	    <div class="col">주요학과 : <?=$department?></div>
					        <div class="btns">
                            <a href= <?=$buy?> title="Button fade red" class="button btnFade btnRed" onclick = "check_login()">구매</a>

                            <a href=<?=$sell?> title="Button fade blue" class="button btnFade btnBlue" onclick = "check_login()">판매</a>
</div>
                        </div>
</div>
				    </div><!-- community -->
				</div>
				<div claa = "footer">
					<?php include "footer.php";?>
				</div>
			</div><!-- backimg -->
		</div><!-- parent -->
        <script>
            function check_login(){
                session_start();
                if(!isset($_SESSION["login_id"])){
                    alert('로그이 필요합니다!');
                    location.href = "login.php";  
                }
                else{
                    alert('구매하세요!');

                    location.href = "selling.php?book=".$id;  
                }
            }
        </script>
	</body>
</html>