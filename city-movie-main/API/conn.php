<?php
function conn(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "user";

    // Create connection
    
    return new mysqli($servername, $username, $password, $dbname);

   
}
function show_genres(){
    $conn = conn();
    $sql = "SELECT * FROM genres";
    $re = mysqli_query($conn, $sql);

    if(mysqli_num_rows($re) >0){
        $item = [];
        while ($row = mysqli_fetch_assoc($re)){
            $item [] = $row;
        }
        $conn->close();
        return $item;
    }else {
        $conn->close();
        return false;
    }
}
function show_film(){
    $conn = conn();
    $sql = "SELECT * FROM films";
    $re = mysqli_query($conn, $sql);

    if(mysqli_num_rows($re) >0){
        $item = [];
        while ($row = mysqli_fetch_assoc($re)){
            $item [] = $row;
        }
        $conn->close();
        return $item;
    }else {
        $conn->close();
        return false;
    }
}
function genres($genre){
    $conn = conn();
    $hihi = "%$genre%";
    $sql = "SELECT * FROM films Where genre Like '$hihi'";
    $re = mysqli_query($conn, $sql);

    if(mysqli_num_rows($re) >0){
        $item = [];
        while ($row = mysqli_fetch_assoc($re)){
            $item [] = $row;
        }
        $conn->close();
        return $item;
    }else {
        $conn->close();
        return false;
    }
}

function film($id){
    $conn = conn();
    $sql = "SELECT * FROM films where id = $id";
    $re = mysqli_query($conn, $sql);

    if(mysqli_num_rows($re) >0){
        $item = [];
        while ($row = mysqli_fetch_assoc($re)){
            $item [] = $row;
        }
        $conn->close();
        return $item;
    }else {
        $conn->close();
        return false;
    }
}


function findName($name){
    $conn = conn();
    $hihi = "%$name%";
    $sql = "SELECT * FROM films Where Name Like '$hihi'";
    $re = mysqli_query($conn, $sql);

    if(mysqli_num_rows($re) >0){
        $item = [];
        while ($row = mysqli_fetch_assoc($re)){
            $item [] = $row;
        }
        $conn->close();
        return $item;
    }else {
        $conn->close();
        return false;
    }
}

function login($username, $password){
    $conn = conn();
    // Chỉ lấy thông tin người dùng dựa trên tên người dùng
    $stmt = mysqli_prepare($conn, "SELECT password FROM users WHERE username = ?");
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($result)) {
        // So sánh mật khẩu trực tiếp
        if ($password === $row['password']) {
            mysqli_stmt_close($stmt);
            $conn->close();
            return true;
        }
    }
    mysqli_stmt_close($stmt);
    $conn->close();
    return false;
}

function signup($username, $email, $password, $password1){
    $conn = conn();
    $sql = "SELECT * FROM users WHERE username = ?";
    $sql1 = "SELECT * FROM users WHERE email = ?";
    
    // Prepare statement for username check
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // Prepare statement for email check
    $stmt1 = mysqli_prepare($conn, $sql1);
    mysqli_stmt_bind_param($stmt1, "s", $email);
    mysqli_stmt_execute($stmt1);
    $result1 = mysqli_stmt_get_result($stmt1);
    
    if ($result->num_rows > 0) {
      return false;
    } else if ($result1->num_rows > 0) {
      return false;
    } else {
       // Chuẩn bị truy vấn SQL để chèn bản ghi mới vào bảng "users"
      $stmt = mysqli_prepare($conn, "INSERT INTO users (username, password, email) VALUES (?, ?, ?)");

      // Gán giá trị cho các tham số
      mysqli_stmt_bind_param($stmt, "sss", $username, $password, $email);

      // Thực thi truy vấn SQL
      mysqli_stmt_execute($stmt);

      // Đóng prepared statement và kết nối
      mysqli_stmt_close($stmt);
      mysqli_close($conn);
      return true;
    }
}

   
?>
