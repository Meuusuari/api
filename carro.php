<?php
include('conexao.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>Banco de dados</title>
    </head>
    <body>
<form>
<input type="search" name="txtpesquisar" placeholder="pesquisar">
<button type="submit" name="buttonpesquisar">Pesquisar</button>
</form>

        <div class="todo">
        <h1>DANILO DE SOUSA NASCIMENTO BARBOSA</h1>
         </div>
      
         <div class="iniciar">
            <button id="iniciar" onclick="iniciar()">Iniciar novo</button>
         </div>
        <div class="todojs" id="form">
            <?php 
         if(isset($_GET['buttonpesquisar']) and $_GET['txtpesquisar'] != ''){
            $nome = $_GET['txtpesquisar'] . '%';
            $query = "select * from carros where nome LIKE '$nome' order by nome asc";
         }else{
            $query = "select * from carros order by nome asc";
         }
            ?>

        </div>
        <h3>Dados da Tabela</h3>
        <!-- INSERIR DADOS NA TABELA BUSCAR DADOS NO BANCO DE DADOS -->
        <?php 
      $query = "select * from carros order by nome asc";

      $result = mysqli_query($conexao, $query);
      $row = mysqli_num_rows($result);

      if($row == ''){
       echo "<h3>Não existe dados no banco de dados</h3>";
      }else{
      
        ?> 
    
        

      <table border="1">
        <thead>
      <th>Nome</th>
      <th>Placa</th>
      <th>Ano</th>
      <th>Ações</th>
      </thead>
      <tbody>
        <?php
while($res_1 = mysqli_fetch_array($result)){
    $nome = $res_1["nome"];
    $placa = $res_1["placa"];
    $ano = $res_1["ano"];
    $id = $res_1["id"];
    ?>
<tr>
<td> <?php echo $nome; ?></td>
<td> <?php echo $placa; ?></td>
<td> <?php echo $ano; ?></td>
<td>
    <a href="carro.php?func=deleta&id=<?php echo $id; ?>">DELETAR</a>
</td>


</tr>



<?php
}
?>


</tbody>
</table>
        
<?php
 }
 ?>


<!-- Cadastrar -->
<?php
if(isset($_POST['button'])){
$nome = $_POST['txtnome'];
$placa = $_POST['txtplaca'];
$ano = $_POST['txtano'];


$query = "INSERT into carros (nome, placa, ano) VALUES ('$nome', '$placa', '$ano')";

$result = mysqli_query($conexao, $query);

if($result == ''){
    echo "<script language='javascript'> window.alert('Ocorreu um erro ao cadastrar!!'); </script>";
}else{
    echo "<script language='javascript'> window.alert('Salvo com sucesso!!'); </script>";
}       
echo "<script language='javascript'> window.location='carro.php'; </script>";
}
?>
 <?php
if(@$_GET['func'] == 'deleta'){
    $id = $_GET['id'];
    $query = "DELETE FROM carros where id = '$id'";
    mysqli_query($conexao, $query);
    echo "<script language='javascript'> window.location='carro.php'('Excluido com sucesso!!'); </script>";
}
 ?>

<script src="index.js"></script>
</body>
</html>
