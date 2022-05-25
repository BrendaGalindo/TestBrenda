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

				window.open("comments.php?id="+valor);
				//window.location="datos.php?id="+valor;
			}
		</script>
	</head>
	<body>
		<?php
			$idUser= $_GET['id'];
			$json = file_get_contents("https://jsonplaceholder.typicode.com/users/".$idUser."/posts");
			$list = json_decode($json,"false");

			echo '<div>
					<table class="table table-striped table-dark" style="white-space: nowrap; overflow-x: auto;">
						<thead>
							<tr >
								<th scope="col-1";>Título</th>
								<th scope="col-1";>Cuerpo</th>
								
							</tr>
						</thead>
						<tbody>';
							foreach($list as $post){
								echo '<tr style="cursor: pointer";>
    									<td scope="col-1";><a style="color:#ffffff;text-decoration: none" href="#" title="Clic para ver comentarios" onclick="ventana('.$post["id"].')"; > '.$post["title"].'</a></td>
    									<td scope="col-1";><a style="color:#ffffff;text-decoration: none" href="#" title="Clic para ver comentarios" onclick="ventana('.$post["id"].')"; > '.$post["body"].'</a></td></tr></a>';
				    			
							}

			
		?>
	</body>
</html>