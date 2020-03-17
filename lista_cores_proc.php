<?php 
require_once ('config.php');
$cor = Cores::getList();
?>
<h1 style="text-align: center;">Listagem da tabela Cores</h1>
 <table class="table table-sm table-bordered table-striped table-hover">
 	<thead>
	    <tr>
	      <th >idcores</th>
	      <th >Descrição</th>
	    </tr>
	</thead>
	<tbody>
<?php 
	foreach ($cor as $row) {
 ?>

    <tr>
      <th><?php echo $row['idcores']; ?></th>
      <td><?php echo $row['descores']; ?></td>
    </tr>
    
<?php 
}
 ?>

	</tbody>
</table>