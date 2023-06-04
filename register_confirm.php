
<?php   
    $id = $_POST["id"];
    $pass = $_POST["pass"];
    $pass_confirm = $_POST["pass_confirm"];
    $name = $_POST["name"];
    $phone1 = $_POST["phone1"];
    $phone2 = $_POST["phone2"];
    $phone3 = $_POST["phone3"];
    $email1 = $_POST["email1"];
    $email2 = $_POST["email2"];
    $email3 = $_POST["email3"];
    $department = $_POST["department"];
    $grade = $_POST["grade"];
    $grade = (int)substr($grade,0,1);
    if(!strcmp($email,"edit_email")) $email2 = $email3;
    if($edit_email != "") $email2 = $edit_email;
    $email = $email1."@".$email2;

    
    $regist_day = date("Y-m-d");
    $phone = $phone1.'-'.$phone2.'-'.$phone3;
    echo $register_day;
    $con = mysqli_connect("localhost:3306", "user1", "12345", "test");
     $sql = "insert into sell_user(login_id, login_pass, user_name, department, grade, phone,trade_location, create_date)";
     $sql .= "values('$id', '$pass', '$name', '$department','$grade', '$phone','', '$regist_day')";
    //echo $sql;
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo("
              <script>
              alert('가입을 환영합니다.')
              location.href = 'index.php';
              </script>
           ");

?>
