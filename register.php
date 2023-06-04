<!doctype html>
<html>
    <head>
        <link rel ="stylesheet" type = "text/css" href="common.css">
		<link rel ="stylesheet" type = "text/css" href="register.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
        
</head>
<body>

    <div class = "parent">
        <div class = "main">
            <div class = "blank"></div>
            <div class = "home_key">
                <a href = "index.php">Home</a>
            </div>
            <div class = "blank"></div>
            <div class = "register">
                <form name = "member_form" id = "register_confirm" method = "post" action = "register_confirm.php">  
                    <h3>회원가입</h3>
                    <div class = "form_id">
                        <div class = "col1">아이디</div>
                        <div class = "col2">
                            <input type = "text" name = "id"placeholder="아이디">
                        </div>
                        <div class = "check_btn">
                        <a href="#"><img src="./img/check_id.gif" 
				        		onclick="check_id()"></a>
                        </div>
                    </div>
                    <div class = "clear"></div>
                    <div class = "form">
                        <div class = "col1">비밀번호</div>
                        <div class = "col2">
                            <input type = "text" name = "pass"placeholder="비밀번호">
                        </div>
                    </div>
                    <div class = "clear"></div>
                    <div class = "form">
                        <div class = "col1">비밀번호 확인</div>
                        <div class = "col2">
                            <input type = "text" name = "pass_confirm"placeholder="비밀번호 확인">
                        </div>
                    </div>
                    <div class = "clear"></div>
                    <div class = "form">
                        <div class = "col1">이름</div>
                        <div class = "col2">
                            <input type = "text" name = "name"placeholder="이름">
                        </div>
                    </div>
                    <div class = "clear"></div>
                    <div class = "clear"></div>
                    <div class = "form">
                        <div class = "col1">휴대폰</div>
                        <div class = "col2">
                            <input type = "text" name = "phone1"> - <input type = "text" name = "phone2"> - <input type = "text" name = "phone3">
                        </div>
                    </div>
                    <div class = "clear"></div>
                    <div class = "form_email">
                        <div class = "col1">이메일</div>
                        <div class = "col2">
                            <input type = "text" name = "email1"placeholder="이메일"> @ <input type = "text" name = "email2">
                            <select name = "email3">
                                <option value ="edit_email" selected>직접입력</option>
                                <option value = "gmail.com">gmail.com</option>
                                <option value = "naver.com">naver.com</option>
                                <option vlaue = "hanmail.com">hanmail.com</option>
                            </select>
                        </div>
                    </div>
                    <div class = "clear"></div>
                    
                    <div class = "form">
                        <div class = "col1">학과</div>
                        <div class = "col2">
                            <select name = "department">
                                <option value ="컴퓨터공학부" selected>컴퓨터공학부</option>
                                <option value ="전기전자통신공학부" >전기전자통신공학부</option>
                                <option value ="에너지신소재화학공학부" >에너지신소재화학공학부</option>
                                <option value ="메카트로닉스공학부" >메카트로닉스공학부</option>
                                <option value ="기계공학부" >기계공학부</option>
                                <option value ="디자인공학부" >디자인공학부</option>
                                <option value ="건축공학부" >건축공학부</option>
                                <option value ="산업경영학부" >산업경영학부</option>
                                <option value ="고용서비스정책학과" >고용서비스정책학과</option>
                            </select>
                        </div>
                    </div>
                    <div class = "clear"></div>
                    <div class = "form">
                        <div class = "col1">학년</div>
                        <div class = "col2">
                            <select name = "grade">
                                <option value = "1학년" selected>1학년</option>
                                <option value = "2학년" >2학년</option>
                                <option value = "3학년" >3학년</option>
                                <option value = "4학년" >4학년</option>
                                <option value = "기타" >기타</option>
                            </select>
                        </div>
                    </div>
                    <div class = "clear"></div>
                    
                    <div class="buttons">
	                	<img style="cursor:pointer" src="./img/button_save.gif" onclick="check_input()">&nbsp;
                  		<img id="reset_button" style="cursor:pointer" src="./img/button_reset.gif"
                  			onclick="reset_form()">
	           		</div>
                </form>
            </div>
        </div>
            
    </div>
    <script>
        function check_input(){
            if(!document.member_form.id.value){
                alert("아이디를 입력하세요!");
                document.member_form.id.focus();
                return;
            }
            if(!document.member_form.pass.value){
                alert("비밀번호를 입력하세요!");
                document.member_form.pass.focus();
                return;
            }
            if(!document.member_form.pass_confirm.value){
                alert("비밀번호 확인을 입력하세요!");
                document.member_form.pass_confirm.focus();
                return;
            }
            if(!document.member_form.name.value){
                alert("이름을 입력하세요!");
                document.member_form.name.focus();
                return;
            }
            if(!document.member_form.phone1.value){
                alert("전화번호를 입력하세요!");
                document.member_form.phone1.focus();
                return;
            }
            if(!document.member_form.phone2.value){
                alert("전화번호를 입력하세요!");
                document.member_form.phone2.focus();
                return;
            }
            if(!document.member_form.phone3.value){
                alert("전화번호를 입력하세요!");
                document.member_form.phone3.focus();
                return;
            }
            if(!document.member_form.email1.value){
                alert("이메일을 입력하세요!");
                document.member_form.email1.focus();
                return;
            }
            if(!document.member_form.email2.value && document.member_form.email3.value == "edit_email"){
                alert("이메일을 입력하세요!");
                document.member_form.email2.focus();
                return;
            }
            
            document.member_form.submit();
        }
        function reset_form() {
            document.member_form.id.value = "";  
            document.member_form.pass.value = "";
            document.member_form.pass_confirm.value = "";
            document.member_form.name.value = "";
            document.member_form.phone1.value = "";
            document.member_form.phone2.value = "";
            document.member_form.phone3.value = "";
            document.member_form.email1.value = "";
            document.member_form.email2.value = "";
            document.member_form.id.focus();
            return;
        }
        function check_id() {
        window.open("register_id_check.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
   }
    </script>
</body>
</html>