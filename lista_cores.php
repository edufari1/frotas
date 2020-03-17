<!DOCTYPE html>
<html>
<head>
  <title>lista cores</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
</head>
<body>
  <div class="container">
    <span id="conteudo"></span>
     <a class="btn btn-warning" href="cadcores.php" role="button">Retorna</a>
  </div>
  <script >
    
      $(document).ready(function(){
        $.post('lista_cores_proc.php',{
          codigo:"4"
        },function(retorna){
          $("#conteudo").html(retorna);
        });
      });
  </script>


 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>