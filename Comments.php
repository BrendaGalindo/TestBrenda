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
			$idPosts= $_GET['id'];
			$json = file_get_contents("https://jsonplaceholder.typicode.com/post/".$idPosts."/comments");
			$list = json_decode($json,"false");

			echo '<div>
					<table class="table table-striped table-dark" style="white-space: nowrap; overflow-x: auto; cursor: default;" >
						<thead>
							<tr >
								<th scope="col-1";>Nombre</th>
								<th scope="col-1";>Email</th>
								<th scope="col-1";>Cuerpo</th>
							</tr>
						</thead>
						<tbody>';
							foreach($list as $post){
								echo '<tr >
    									<td scope="col-1";>'.$post["name"].'</td>
    									<td scope="col-1";>'.$post["email"].'</td>
    									<td scope="col-1";>'.$post["body"].'</td></tr>';

				    			
							}

			
		?>
	</body>
</html>