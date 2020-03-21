<?php 

	if(!empty($_POST['first']) && !empty($_POST['last'])){
		$input_first = $_POST['first'];
		$input_last = $_POST['last'];
		$user = "root";
		$password = "";
		$pdo = new PDO("mysql:host=localhost;dbname=imdb", $user, $password);
	
		$common_movies_query = "SELECT * FROM movies JOIN roles r1 ON r1.movie_id=movies.id JOIN actors a1 ON a1.id=r1.actor_id JOIN roles r2 ON r2.movie_id=movies.id JOIN actors a2 ON a2.id=r2.actor_id WHERE a1.first_name='Kevin' && a1.last_name='Bacon' && a2.first_name='$input_first' && a2.last_name='$input_last';";
		$common_movies = $pdo->query($common_movies_query);


		$query_2 = "SELECT * FROM movies JOIN roles ON roles.movie_id=movies.id JOIN actors ON actors.id=roles.actor_id WHERE actors.first_name='$input_first' && actors.last_name='$input_last'";
		
		$movies = $pdo->query($query_2);
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Search</title>

	<link rel="icon" type="image/x-icon" href="imdb-icon.ico">
	<link rel="stylesheet" type="text/css" href="bacon.css">
</head>
<body>
	
	<div class="main">
		<div class="top_heading">
			<div class="logo">
				<img src="imdb-logo.png">
			</div>

			<div class="validators">
				<a href="https://validator.w3.org/" target="_blank">
					<img src="validator-xhtml.png">
				</a>
				<a href="https://jigsaw.w3.org/css-validator/" target="_blank">
					<img src="validator-css.png">
				</a>
			</div>
		</div>


		<div class="form_part">
			<span>Actor's first/last name:</span>
			<form action="search.php" method="post" class="form-inputs">
				<input type="text" name="first">
				<input type="text" name="last">
				<button type='submit' id="go">GO</button>
			</form>
		</div>

		<div class="common_movies">
			<h1>The One Degree of Kevin Bacon</h1>
			<p><?=$input_first." ".$input_last?> and Kevin Bacon were together in:</p>
			<table class='table'>
				<thead>
					<th>
						No.
					</th>
					<th>
						Title
					</th>
					<th>
						Year
					</th>
				</thead>
				<tbody>
					<?php 

						$i = 1;
						foreach($common_movies as $movie){
							print("<tr>");
							// No.
							print("<td>");
							print($i);	
							print("</td>");

							// Title
							print("<td>");
							print($movie['name']);	
							print("</td>");

							// Year
							print("<td>");
							print($movie['year']);	
							print("</td>");
							print("</tr>");
							$i++;
						}

					 ?>
				</tbody>
			</table>
		</div>

		<div class="movies">
			<p>All of <?=$input_first." ".$input_last?>'s perfomances:</p>
			<table class='table'>
				<thead>
					<th>
						No.
					</th>
					<th>
						Title
					</th>
					<th>
						Year
					</th>
				</thead>
				<tbody>
					<?php 

						$i = 1;
						foreach($movies as $movie){
							print("<tr>");
							// No.
							print("<td>");
							print($i);	
							print("</td>");

							// Title
							print("<td>");
							print($movie['name']);	
							print("</td>");

							// Year
							print("<td>");
							print($movie['year']);	
							print("</td>");
							print("</tr>");
							$i++;
						}

					 ?>
				</tbody>
			</table>
		</div>
	</div>


	</div>	

	<!-- <script type="text/javascript" src="bacon.js"></script> -->
</body>
</html>