<!DOCTYPE html>
<html lang="pt-br">
	<head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>CORES - TABELA</title>

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

	    <link rel="stylesheet" type="text/css" href="stilo.css">
	</head>

	<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: DarkCyan;">
    	<a class="navbar-brand" href="index.html"></a>
      	<img src="imagens adicionais/logo.png" width="150" height="40" class="d-inline-block align-top" alt="">
		<nav class="navbar navbar-expand-lg navbar-light" 	style="background-color: DarkCyan;"	>
  			<a class="navbar-brand" href="#">Spoiler</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 	aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon" ></span>
  			</button>

  			<div class="collapse navbar-collapse" id="navbarSupportedContent">
    			<ul class="navbar-nav mr-auto">
      				<li class="nav-item active">
        				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      				</li>
      				<li class="nav-item">
        				<a class="nav-link" href="#">Link</a>
      				</li>
      				<li class="nav-item dropdown">
        				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
          		Tabelas Básicas
        				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          					<a class="dropdown-item" href="#">Marcas</a>
          					<a class="dropdown-item" href="#">Modelos</a>
          					<a class="dropdown-item" href="#">Combust</a>
          					<a class="dropdown-item" href="#">Lubrificantes</a>
          					<div class="dropdown-divider"></div>
          					<a class="dropdown-item" href="#">Something else here</a>
        				</div>
      				</li>
    			</ul>
  			</div>
		</nav>
	</nav>


    <h4>Tabela de cores</h4>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>

  <br><br><br><br><br>
	<body>
	  	<div class="container" style="background-color: #5F9EA0" bordered>
	    	<h1 class="titulo">Cadastro de Cores</h1><br>

	    	<form method="POST" action="cadastro_cores.php">

	        	<div>
	          		<input type="hidden" id="action" name="acao" >
	        	</div>


	      		<div class="form-row">
	        		<div class="col-md-3">
	          			<label for="validaCodigo"><strong>Codigo da Cor</strong></label>
	          			<input type="number" class="form-control is-valid" id="validaCodigo" placeholder="Código da cor" name="codigo">
	        		</div>

	        		<div class="col-md-9">
		          		<label for="validaDescricao"><strong>Descrição da Cor</strong></label>
		          		<input type="text" class="form-control is-valid" id="validaDescricao" placeholder="Entre com a descrição" name="desc">
	        		</div>

	      		</div>

	      	<br><br>
		    	<div align="rigth">
			 		<button type="submit" name="btn1" class="btn btn-primary">Cadastrar</button><!-- Vai para cadadtrar_cores-->
			 		<button type="submit" name="btn2" class="btn btn-secondary">Alterar</button><!-- Vai para cadadtrar_cores-->
			 		<button type="submit" name="btn3" class="btn btn-danger">Deletar</button><!-- Vai para cadadtrar_cores-->
			 		<a class="btn btn-warning" name="btn6" href="lista_cor.php?codigo=8" role="button">Consulta C</a>
					
			 		<button type="button" id="btn5" name="codigo" class="btn btn-warning">Consulta D</button><!-- Vai para cadadtrar_cores-->
			 		<!--<a class="btn btn-info" name="btn6" href="lista_cores.php" role="button">Listar</a>-->
			 		<button type="button" id="btn6" name="btn6" class="btn btn-info">Listar</button>
		    	</div>
			</form> 
	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
		    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>


	  <!-- Modal *************************************************  -->

	    	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    		<div class="modal-dialog" role="document">
	        		<div class="modal-content">
	            		<div class="modal-header">
	                		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                	</div>

	                	<div class="modal-body">

	  						<div class="container">
	    						<span id="conteudo"></span>
	     						<a class="btn btn-warning" href="cadcores.php" role="button">Retorna</a>
	  						</div>
	  						<script >
                            $(document).ready(function(){
                                $.post('lista_cores_proc.php',function(retorna){
                                            $("#conteudo").html(retorna);
                                });
                            });
	  						</script>	
	      				</div>
	    			</div>
	  			</div>
			</div>
		</div>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#btn6').click(function(){
  					$('#myModal').modal('show')
				});
			});
			$(document).ready(function(){
				$('#btn5').click(function(){
  					$('#myModal').modal('show')
				});
			});
		</script>
	
	</body>
</html>

