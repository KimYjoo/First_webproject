<!doctype html>
<html>
	<head>
		<meta charset ="utf-8">
		<title>고책</title>
		<link rel ="stylesheet" type = "text/css" href ="buying_ing.css">
		<link rel ="stylesheet" type = "text/css" href="common.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
        <?php
			$book_id = $_GET["book"];
			$con = mysqli_connect("localhost:3306", "user1", "12345", "test");
			$sql = "select * from sell_book where book_id = $book_id";

			$result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            $id            = $row["book_id"];
			$price         = $row["price"];
			$condition          = $row["condi"];
			$sell_start      = $row["sell_start"];
            $img_src = "img/".$id.".jpeg";
            session_start();
            $user = $_SESSION["user_id"];
            $sql = "select * from sell_user where user_id = $user";
            $result2 = mysqli_query($con, $sql);
            $row2 = mysqli_fetch_array($result2);
            $name = $row2["user_name"];
            $phone = $row2["phone"];
            switch($condition){
                case 0:
                    $condi = "판매중";
                    break;
                case 1:
                    $condi = "거래중";
                    break;
                case 2:
                    $condi = "판매완료";
                    break;
              }
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
                        
                        <div class="book_info">
					        
                            <ul id="view_content">
                	        	<li>
                                    <img src = <?=$img_src?>></div>
					        	    <span class="col1">판매자 : <?=$name?></span>
					        	    <span class="col4">판매 가격 : <?=$price."원"?></span>
					        	    <span class="col5">판매 상태 : <?=$condi?></span>
					        	    <span class="col7">전화번호 : <?=$phone?></span>
					            </li>	
                            </ul>
					        <?php
					           mysqli_close($con);
                               $buy = "check_id_buy.php?book=".$id;
                               $sell = "check_id_sell.php?book=".$id;
					        ?>
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