<html>
	<head>
		<link rel="stylesheet" href="css/bootstrap.min.css" crossorigin="anonymous">
		<link rel="stylesheet" href="css/bootstrap-theme.min.css" crossorigin="anonymous">
		<script src="js/bootstrap.min.js" crossorigin="anonymous"></script>

		<title>Test Brenda</title>
		<script>
    		
   			function guardar(valor)
			{
				var id = valor;

				window.open("datos.php?id="+valor);
				//window.location="datos.php?id="+valor;
			}
		</script>
	</head>
	<body>
		<?php
			$idUser= $_GET['id'];
			$completed="";
			$json = file_get_contents("https://jsonplaceholder.typicode.com/users/".$idUser."/todos");
			$list = json_decode($json,"false");
			arsort($list);
			echo '<div>
					<table class="table table-striped table-dark" style="white-space: nowrap; overflow-x: auto; cursor: default;">
						<thead>
							<tr >
								<th scope="col-1";>Id</th>
								<th scope="col-1";>Titulo</th>
								<th scope="col-1";>Completado</th>
								
							</tr>
						</thead>
						<tbody>';
							foreach($list as $post){

							    if($post["completed"]=='1'){
			    					$completed="true";
								}
								else
									$completed="false";
								echo '<tr style="cursor: pointer";>
										<td scope="col-1";>'.$post["id"].'</td>
    									<td scope="col-1";>'.$post["title"].'</td>
    									<td scope="col-1";>'.$completed.'</td>
    									</tr>';

				    			
							}
							echo '</tbody></table></div>'

		?>
		
		<h2 style="auto;cursor: default;"> Agregar nueva tarea</h2>
		<form method="POST">
			<div class="form-group row">
    			<label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Title</label>
    			<div class="col-sm-10">
     				 <input type="text" class="form-control form-control-lg" id="Title" name="Title" placeholder="Title">
   				</div>
  			</div>
			<div class="form-group row">
				<label for="colFormLabelLg" class="col-sm-2 col-form-label col-form-label-lg">Completed</label>
			   
			    <div class="col-sm-10">
			      <div class="form-check">
			        <input class="form-check-input" type="checkbox" id="checkCompleted" name="checkCompleted">
			       
			      </div>
			    </div>
			  </div>
			  <div class="form-group row">
			    <div class="col-sm-10">
			      <input type="submit" name="submit" value="Guardar" class="btn btn-primary"/>
			    </div>
			  </div>
			
		</form>
		<?php
				if (isset($_POST['submit'])) {
					$selected="";
					
				    if(isset($_POST['checkCompleted'])){
    					$selected="true";
					}
					else
						$selected="false";
				        
				    $ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "https://jsonplaceholder.typicode.com/users/".$idUser."/todos");
					curl_setopt($ch, CURLOPT_POST, 1);
					curl_setopt($ch, CURLOPT_POSTFIELDS, "userId=".$idUser."&title=".$_POST['Title']."&completed=".$selected);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$result = curl_exec($ch);

					print_r($result);
					curl_close($ch);

				}			
		?>
		
	</body>
</html>