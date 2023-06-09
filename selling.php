<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>고책</title>
<link rel="stylesheet" type="text/css" href="common.css">
<link rel="stylesheet" type="text/css" href="selling.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
	
<script>
  function check_input() {
      if (!document.board_form.want.value)
      {
          alert("희망가격을 입력하세요!");
          document.board_form.want.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
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
            <section>
   	            <div id="board_box">
	                <h3 id="board_title">
	    		        책 > 구매하기
		            </h3>
	                <form  name="board_form" method="post" action="selling_confirm.php" enctype="multipart/form-data">
                        <?php
                            $id = $_GET["book"];
			                $con = mysqli_connect("localhost:3306", "user1", "12345", "test");
                            $sql = "select * from sell_book where book_id = $id order by price";
			                $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);

                            $min = $row["price"];
                            $sql = "select * from book where book_id = $id";
			                $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            $img = "img/".$id.".jpeg";
                        ?>
                        <input type = "hidden" id = "book_id" name = "book_id" value = <?=$id?>>
                        
	    	            <ul id="board_form">
				            <li>
				    	        <span class="col1">책 이름 : </span>
				    	        <span class="col2"><?=$row["name"]?></span>
				            </li>		
	    		            <li>
	    		    	        <span class="col2"><img src = <?=$img?>></span>
	    		            </li>	    	
	    		            <li id="text_area">	
	    		    	        <span class="col1">원가 : </span>
	    		    	        <span class="col2">
	    		    		        <?=$row["price"]?>
	    		    	        </span>
	    		            </li>
                            <li id="text_area">	
	    		    	        <span class="col1">평균가 : </span>
	    		    	        <span class="col2">
                                    <?php if($row["nowSell"] == 0) echo "책정 안됨";
                                            else{ echo $row["nowSell"];}
                                    ?>
	    		    	        </span>
	    		            </li>
                            <li id="text_area">	
	    		    	        <span class="col1">최저가 : </span>
	    		    	        <span class="col2">
                                    <?php if($min == null) echo "책정 안됨";
                                        else{ echo $min;}
                                    ?>
	    		    	        </span>
	    		            </li>
	    		            <li>
			                    <span class="col1"> 희망 가격 : </span>
			                    <span class="col2"><input type="text" name="want"></span>
			                </li>
                            <li>
			                    <span class="col1"> 책 중요도 : </span>
			                    <span class="col1"> 

                                <select name = "stars">
                                    <option value = "1" selected>1점</option>
                                    <option value = "2" >2점</option>
                                    <option value = "3" >3점</option>
                                    <option value = "4" >4점</option>
                                    <option value = "5" >5점</option>
                                </select>
                                </span>
                            </li>
	    	            </ul>
	    	            <ul class="buttons">
				            <li><button type="button" onclick="check_input()">완료</button></li>
				            <li><button type="button" onclick="history.go(-1)">취소</button></li>
			            </ul>
	                </form>
	            </div> <!-- board_box -->
            </section> 
			</div>
	    </div>
        <div class = "footer">
			<?php include "footer.php";?>
		</div>
	</div>
</div>
</body>
</html>
