<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" crossorigin="anonymous">
		<script src="js/bootstrap.min.js" crossorigin="anonymous"></script>

		<title>Test Brenda</title>
		<script>
    		
   			function ventana(valor)
			{
				var id = valor;

				window.open("datos.php?id="+valor);
				//window.location="datos.php?id="+valor;
			}
		</script>
	</head>
	<body>
		<?php
			$json = file_get_contents("https://jsonplaceholder.typicode.com/users");
			$list = json_decode($json,"false");

			echo '
					<h2>Usuarios</h2>
					<div class="container-fluid">
   						 <div class="row">
       						 <div class="col-xs-12">

								<table width: 10%; class="table table-striped table-dark" class="row h-25 w-10" style="white-space: nowrap; overflow-x: auto;">

									<thead>
										<tr >
											<th scope="col-1";>Id</th>
											<th scope="col-1";>User Name</th>
										</tr>
									</thead>
									<tbody>';
										foreach($list as $post){
			    							echo '<tr onclick="ventana('.$post["id"].')";>
			    									<td scope="col-1"; style="cursor: pointer";>'.$post["id"].'</td>
			    									<td scope="col-1"; style="cursor: pointer";>'.$post["username"].'</td></tr>';
										}
									echo '</tbody></table></div></div></div>';
		?>
	</body>
</html>