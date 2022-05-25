<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" crossorigin="anonymous">
		<script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
		<script type="text/javascript">
			function posts(valor)
			{
				var id = valor;

				window.open("posts.php?id="+valor);
				//window.location="datos.php?id="+valor;
			}
			function todos(valor)
			{
				var id = valor;

				window.open("todos.php?id="+valor);
				//window.location="datos.php?id="+valor;
			}
		</script>
		
		<title>Test Brenda</title>
	</head>
	<body>
		<?php
			$idUser= $_GET['id'];
			$json = file_get_contents("https://jsonplaceholder.typicode.com/users/".$idUser);
			$list = json_decode($json,"false");

			$address = $list["address"]["street"].'&nbsp;'.$list["address"]["suite"].'&nbsp;'.$list["address"]["city"].'&nbsp;'.$list["address"]["zipcode"].'&nbsp;'.$list["address"]["geo"]["lat"].'&nbsp;'.$list["address"]["geo"]["lng"].'&nbsp;';

			$company =  $list["company"]["name"].'&nbsp;'.$list["company"]["catchPhrase"].'&nbsp;'.$list["company"]["bs"].'&nbsp;';
			echo '	<h2>Datos del usuario</h2>
					<div>
					<table class="table table-striped table-dark" style="white-space: nowrap; overflow-x: auto;cursor: default;">
						<thead>
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Email</th>
								<th scope="col"> Address</th>
								<th>Phone</th>
								<th>Website</th>
								<th>Company</th>
							</tr>
						</thead>
						<tbody>';

						echo '<tr>
    									<td>'.$list["id"].'</td>
    									<td>'.$list["name"].'</td>
    									<td>'.$list["email"].'</td>
    									<td scope="col">'.$address.'</td>
    									<td>'.$list["phone"].'</td>
    									<td>'.$list["website"].'</td>
    									<td>'.$company.'</td>
    					</tbody>
    				</table>
					<button onclick="posts('.$list["id"].')"; type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
 					 	POSTS
					</button>

					<button onclick="todos('.$list["id"].')"; type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
 					 	TODOS
					</button>
				</div>';


		?>
	
	</body>
</html>