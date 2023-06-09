<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="common.css">
<link rel="stylesheet" type="text/css" href="board.css">
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
	                <h3 class="title">
			            게시판 > 내용보기
		            </h3>
                    <?php
                    	$num  = $_GET["num"];
                    	$page  = $_GET["page"];

                    	$con = mysqli_connect("localhost:3306", "user1", "12345", "test");
                    	$sql = "select * from board where board_id=$num";
                    	$result = mysqli_query($con, $sql);

                    	$row = mysqli_fetch_array($result);
                    	$id      = $row["login_Id"];
                    	$name      = $row["user_name"];
                    	$regist_day = $row["regist_day"];
                    	$subject    = $row["Subject"];
                    	$content    = $row["Content"];
                    	$file_name    = $row["File_name"];
                    	$file_type    = $row["file_type"];
                    	$file_copied  = $row["file_copied"];
                    	$hit          = $row["Hit"];

                    	$content = str_replace(" ", "&nbsp;", $content);
                    	$content = str_replace("\n", "<br>", $content);

                    	$new_hit = $hit + 1;
                    	$sql = "update board set Hit=$new_hit where board_id=$num";   
                    	mysqli_query($con, $sql);
                    ?>		
                	<ul id="view_content">
                		<li>
                			<span class="col1"><b>제목 :</b> <?=$subject?></span>
                			<span class="col2"><?=$name?> | <?=$regist_day?></span>
                		</li>
                		<li>
                			<?=$content?>
                		</li>		
                	</ul>
                	<ul class="buttons">
                			<li><button onclick="location.href='board_list.php?page=<?=$page?>'">목록</button></li>
                        <?php if(isset($_SESSION["login_id"])&&$id == $_SESSION["login_id"]){ ?>
                			<li><button onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
                			<li><button onclick="location.href='board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
                        <?php }?>
                			<li><button onclick="location.href='board_form.php'">글쓰기</button></li>
                	</ul>
                </div> <!-- board_box -->
            </section> 
        </div>
    </div>
    <div class = "footer">
        <?php include "footer.php";?>
    </div>
</div>          
</body>
</html>
                            