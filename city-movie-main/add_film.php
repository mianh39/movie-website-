<?php 
	//kết nối với phpadmin
    $host = "localhost:3306";
    $user = "root";
    $passwd = "";
    $db = "user";
    $conn = new mysqli($host, $user, $passwd, $db);

// Kiểm tra kết nối
    session_start();
	if(!isset($_SESSION['username_add'])){
        header('Location: login_add.php');
    }
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    include('API/conn.php');
    $films = show_film();
    $film = end($films);
    
    
//lấy thông tin của phim
if(isset($_POST['add_film'])) {
    $name_id = $film['id'] +1;
    $name_film = $_POST['name_film'];
    $poster = $_POST['poster'];
    $poster1 = $_POST['poster1'];
    $trailer = $_POST['trailer'];
    $des = $_POST['des'];
    $year = $_POST['year'];
    $genre = $_POST['genre'];
    $imdb = $_POST['imdb'];
    $director = $_POST['director'];
    $time = $_POST['time'];

    $result = mysqli_query($conn, "SELECT COUNT(*) as count FROM films");
    $row = mysqli_fetch_assoc($result);
    $id = $row['count'] + 1;

    $query = "INSERT INTO films (id, Name, poster, poster1, trailer, description, year, genre, IMDB, director, hours) 
              VALUES ('$name_id', '$name_film', '$poster', '$poster1', '$trailer', '$des', $year, '$genre', $imdb, '$director', '$time')";
    if(mysqli_query($conn, $query)) {
        echo "Film added successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thêm phim</title>
	<link rel="stylesheet" href="add_film.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
	<div class="container">
		<h2>Add new film</h2>
		<form method="POST" action="add_film.php" enctype="multipart/form-data">
			<!-- <div class="form-group">
				<label for="name_id">ID film:</label>
				<input type="text" class="form-control" id="name_id" name="name_id" required>
			</div> -->
			<div class="form-group">
				<label for="name_film">Name:</label>
				<input type="text" class="form-control" id="name_film" name="name_film" required>
			</div>
			<div class="form-group">
				<label for="poster">Poster:</label>
				<input type="text" class="form-control" id="poster" name="poster" required>
			</div>
			<div class="form-group">
				<label for="poster1">Poster1:</label>
				<input type="text" class="form-control" id="poster1" name="poster1" required>
			</div>
			<div class="form-group">
				<label for="trailer">Trailer:</label>
				<input type="text" class="form-control" id="trailer" name="trailer" required>
			</div>
			<div class="form-group">
				<label for="des">Description:</label>
				<input type="text" class="form-control" id="des" name="des" required>
			</div>
			<div class="form-group">
				<label for="year">Year:</label>
				<input type="text" class="form-control" id="year" name="year" required>
			</div>
			<div class="form-group">
				<label for="genre">Genre:</label>
				<input type="text" class="form-control" id="genre" name="genre" required>
			</div>
			<div class="form-group">
				<label for="imdb">IMDB:</label>
				<input type="text" class="form-control" id="imdb" name="imdb" min="0" required>
			</div>
			<div class="form-group">
				<label for="director">Director:</label>
				<input type="text" class="form-control" id="director" name="director" required>
			</div>
			
			<div class="form-group">
				<label for="time">Time:</label>
				<input type="text" class="form-control" id="time" name="time" min="1" required>
			</div>
			
            <button type="submit" class="btn btn-primary" name = "add_film">Submit</button>
        </form>
    </div>
</body>
</html>

				
