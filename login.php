<!doctype html>
<html>
    <head>
        <link rel ="stylesheet" type = "text/css" href="common.css">
		<link rel ="stylesheet" type = "text/css" href="login.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
        
</head>
<body>
    <div class = "parent">
        <div class = "main">
            <div class="blank"></div>

            <div class = "home_key">
                <a href = "index.php">Home</a>
            </div>
            <div class="blank"></div>
            <div class = "login">
          		<form  name="login_form" method="post" action="login_confirm.php">		       	
                    <div id="login_title">
		    		    <span>로그인</span>
	    		    </div>
                    <div id="login_form">
                  	
                        <input type="text" name="id" placeholder="아이디" >
                        <input type="password" id="pass" name="pass" placeholder="비밀번호" >
                  	    
                  	    <div id="login_btn">
                            <a href="#" title="Button fade purple" class="button btnFade btnPurple" onclick="check_input()">로그인</a>
                        </div>
                      	<!-- <a href="#"><img src="./img/login.png" onclick="check_input()"></a> -->
                  	</div>		    	
           		</form>
            </div>
        </div>
    </div>
    <!-- <section>
		<div id="main_img_bar">
            <img src="./img/main_img.png">
        </div>
        <div id="main_content">
      		<div id="login_box">
	    		<div id="login_title">
		    		<span>로그인</span>
	    		</div>
	    		<div id="login_form">
          		<form  name="login_form" method="post" action="login.php">		       	
                  	<ul>
                    <li><input type="text" name="id" placeholder="아이디" ></li>
                    <li><input type="password" id="pass" name="pass" placeholder="비밀번호" ></li> 
                  	</ul>
                  	<div id="login_btn">
                      	<a href="#"><img src="./img/login.png" onclick="check_input()"></a>
                  	</div>		    	
           		</form>
        		</div>
    		</div> 
        </div>
	</section>  -->
    <script>
        function check_input(){
            if(!document.login_form.id.value){
                alert("아이디를 입력하세요");
                document.login_form.id.focus();
                return;
            }
            if(!document.login_form.pass.value){
                alert("비밀번호를 입력하세요");
                document.login_form.pass.focus();
                return;
            }
            document.login_form.submit();
        }
        </script>
</body>
</html>




