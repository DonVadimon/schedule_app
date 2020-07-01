<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Schedule</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-3 d-flex-column justify-content-center">
		<h1>Schedule</h1>
		<form action="/add.php" method="post">
			<div class="d-flex justify-content-between">
				<input type="text" name="task" id="task" placeholder="I should do..." class="form-control col-6">
				<div class="form-group-row">
					<div class="col-11">
						<input type="date" name="date" class="form-control">
					</div>
				</div>
				<button type="submit" name="send_task" class="btn btn-success col-2">Send</button>
			</div>
		</form>
	</div>
	<div class="container">
		<ul>
		<?php
			require 'configDB.php';
			$query = $pdo->query('SELECT * FROM `tasks` ORDER BY `id` DESC');
			while ($row = $query->fetch(PDO::FETCH_OBJ)) {
				echo '
					<li>
						<div class="col-9 mx-auto d-flex justify-content-between">
							<div class="d-inline-block col-7 font-weight-bold mt-auto mb-auto">'
								. $row->task . '
							</div>
							<div class="d-inline-block col-3 font-weight-bold mt-auto mb-auto">
							<time>' . $row->date . '</time>
							</div>
							<div class="d-inline-block col-1 h-100">
								<a href="/delete.php?id=' . $row->id . '">
								<button type="button" class="btn-danger">Delete</button>
								</a>
							</div>
						</div>
					</li>
					';
			}
		?>
		</ul>
	</div>
</body>
</html>
