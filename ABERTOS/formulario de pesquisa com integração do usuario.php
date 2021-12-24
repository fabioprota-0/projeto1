<?php
// definições de host, database, usuário e senha
//$host = "localhost";
//$db   = "devmedia";
//$user = "root";
//$pass = "";
include("123.php");
// conecta ao banco de dados
$con = mysqli_connect($hostname, $usuario, $senha,$bancodedados)or trigger_error(mysqli_error(),E_USER_ERROR);;
// seleciona a base de dados em que vamos trabalhar
//mysqli_select_db( $bancodedados, $con);
mysqli_query($con, "SET NAMES utf8");
// cria a instrução SQL que vai selecionar os dados
$query = sprintf("SELECT * FROM cadastro");
// executa a query
$dados = mysqli_query($con, $query)or die(mysqli_error());
// transforma os dados em um array
$linha = mysqli_fetch_assoc($dados);
// calcula quantos dados retornaram
$total = mysqli_num_rows($dados);
?>

<html>
	<head>
	<title>Exemplo</title>
</head>
<body>
    <h1>Dados do clientes:</h1>
<?php
      
	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {
?>           
			<p><?=$linha['nome']?> / <?=$linha['cpf/cnpj']?></p>
<?php
		// finaliza o loop que vai mostrar os dados
		}while($linha = mysqli_fetch_assoc($dados));
	// fim do if
	}
?>
<form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Endereço de email</label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nome@exemplo.com">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Select de exemplo</label>
    <select class="form-control" id="exampleFormControlSelect1">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect2">Exemplo de select múltiplo</label>
    <select multiple class="form-control" id="exampleFormControlSelect2">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Exemplo de textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
</form>
</body>
</html>
<?php
// tira o resultado da busca da memória
mysqli_free_result($dados);
?>