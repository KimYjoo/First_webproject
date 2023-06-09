<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="common.css">
<link rel="stylesheet" type="text/css" href="book_list.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
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
	    <h3>
	    	책 > 목록보기
		</h3>
	    <ul id="book_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">제목</span>
					<span class="col3">지은이</span>
					<span class="col4">출판사</span>
					<span class="col4">책종류</span>
				</li>
<?php
	if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;
    session_start();
	$con = mysqli_connect("localhost:3306", "user1", "12345", "test");
    if(isset($_SESSION["books"])){
        $books = $_SESSION["books"];
        for($i = 0 ; $i < count($books); $i++){
            if($books[$i] == "") break;
            if($i == 0) 
                $sql = "select * from book where ";
            else $sql .= " or ";
            $sql .= "book_id = ".$books[$i];
        }
    }
    else {
        $sql = "select * from book";
    }
    
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
	    $id         = $row["book_id"];
        $name        = $row["name"];
        $author        = $row["author"];
        $publisher     = $row["publisher"];
        $category      = $row["category"];
        $img = "img/".$id.".jpeg";
?>
				<li id = "book_tuple">
					<span class="col1"><?=$number?></span>
					<span class="col2"><a href="book_info.php?num=<?=$num?>&page=<?=$page?>&book=<?=$id?>"><?=$name?></a></span>
					<span class="col3"><?=$author?></span>
					<span class="col4"><?=$publisher?></span>
					<span class="col4"><?=$category?></span>
                    <img src = <?=$img?> href="book_info.php?num=<?=$num?>&page=<?=$page?>&book=<?=$id?>">
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
		echo "<li><a href='book_list.php?page=$new_page'>◀ 이전</a> </li>";
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
				<li><button onclick="location.href='book_list.php'">목록</button></li>
			</ul>
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
