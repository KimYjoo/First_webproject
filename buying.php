<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>고책</title>
<link rel="stylesheet" type="text/css" href="common.css">
<link rel="stylesheet" type="text/css" href="buying.css">
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
                <div class = "wrap">
					<?php
						if (isset($_GET["page"]))
							$page = $_GET["page"];
						else
							$page = 1;
                        $book_id = $_GET["book"];
						$con = mysqli_connect("localhost:3306", "user1", "12345", "test");
						$sql = "select * from sell_book where book_id = $book_id order by price";
						$result = mysqli_query($con, $sql);
						$total_record = mysqli_num_rows($result); // 전체 글 수

						$scale = 10;

						// 전체 페이지 수($total_page) 계산 
						if ($total_record % $scale == 0)     
							$total_page = floor($total_record/$scale);      
						else
							$total_page = floor($total_record/$scale) + 1; 

						// 표시할 페이지($page)에 따라 $start 계산  
						$start = ($page - 1) * $scale;      

						$number = $total_record - $start;

					   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
					   {
					      mysqli_data_seek($result, $i);
					      // 가져올 레코드로 위치(포인터) 이동
					      $row = mysqli_fetch_array($result);
					      // 하나의 레코드 가져오기
						  $bookid         = $row["book_id"];
					      $user          = $row["user_Id"];
					      $price        = $row["price"];
					      $isneed     = $row["isneed"];
					      $sell_start  = $row["sell_start"];
					      $sell_id  = $row["sell_id"];
                          $condition = $row["condi"];
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
						  $sql = "select * from book where book_id = $bookid";
						  $result1 = mysqli_query($con, $sql);
					      $row1 = mysqli_fetch_array($result1);

						  $book_name = $row1["name"];
						  $category = $row1["category"];
						  $book_url = "buying_ing.php?book=".$bookid."&sell_id=".$sell_id ;
					?>
					<li>
						<span class="col1"><a href = <?=$book_url?>><?=$book_name?></a></span>
						<span class="col2"><?=$user?></span>
						<span class="col3"><?=$price?></span>
						<span class="col4"><?=$isneed?></span>
						<span class="col5"><?=$category?></span>
						<span class="col6"><?=$sell_start?></span>
						<span class="col7"><?=$condi?></span>
					</li>	
					<?php
						$number--;
					   }
					   mysqli_close($con);
				   
					?>
					</ul>
					<ul id="page_num"> 	
						<?php
						if ($total_page>=2 && $page >= 2)	
						{
							$new_page = $page-1;
							echo "<li><a href='board_list.php?page=$new_page'>◀ 이전</a> </li>";
						}		
						else 
							echo "<li>&nbsp;</li>";
					
					   	// 게시판 목록 하단에 페이지 링크 번호 출력
					   	for ($i=1; $i<=$total_page; $i++)
					   	{
							if ($page == $i)     // 현재 페이지 번호 링크 안함
							{
								echo "<li><b> $i </b></li>";
							}
							else
							{
								echo "<li><a href='board_list.php?page=$i'> $i </a><li>";
							}
					   	}
					   	if ($total_page>=2 && $page != $total_page)		
					   	{
							$new_page = $page+1;	
							echo "<li> <a href='board_list.php?page=$new_page'>다음 ▶</a> </li>";
						}
						else 
							echo "<li>&nbsp;</li>";
						?>
					</ul> <!-- page -->	    	
					<ul class="buttons">
				        <li><button type="button" onclick="location.href='book_list.php'">목록</button></li>

					</ul>
					</div>
                    </div>
        <div class = "footer">
			<?php include "footer.php";?>
		</div>
	</div>
</div>
</body>
</html>

