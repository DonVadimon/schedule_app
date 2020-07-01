<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Schedule</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>Schedule</h1>
		<form action="/add.php" method="post">
			<input type="text" name="task" id="task" placeholder="I should do..." class="form-control">
			<button type="submit" name="send_task" class="btn btn-success">Send</button>
		</form>

		<?php
			require 'configDB.php';

			echo '<ul>';
			$query = $pdo->query('SELECT * FROM `tasks` ORDER BY `id` DESC');
			while ($row = $query->fetch(PDO::FETCH_OBJ)) {
				echo '<li><b>' . $row->task . '</b><a href="/delete.php?id=' . $row->id . '"><button>Delete</button></a></li>';
			}
			echo '</ul>';
		?>

	</div>
</body>
</html>
