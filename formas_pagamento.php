<?php
session_start();
require_once('conn.php');
error_reporting(0);
ini_set("display_errors", 0);

if($_SESSION['email'] == True){
  $email_cliente= $_SESSION['email'];
  $busca_email = "SELECT * FROM login WHERE email = '$email_cliente'";
  $resultado_busca = mysqli_query($conn, $busca_email);
  $total_clientes = mysqli_num_rows($resultado_busca);

  while($dados_usuario = mysqli_fetch_array($resultado_busca)){
    $email_cliente = $dados_usuario['email'];
    $senha_cliente = $dados_usuario['senha'];
    $nome_cliente = $dados_usuario['nome'];
    $tipo_cliente = $dados_usuario['tipo'];


    # Formas de pagamento
    $dinheiro = $dados_usuario['dinheiro'];
    $pix = $dados_usuario['pix'];
    $cartao = $dados_usuario['cartao'];
    $boleto = $dados_usuario['boleto'];

  }
}else{
  // echo "<meta http-equiv='refresh' content='0;url=login.php'>";
?>

<script type="text/javascript">
  window.location="login.php";
  </script>

<?php
}

?>

<?php
$dinheiro_post = $_POST['dinheiro'];
$pix_post = $_POST['pix'];
$cartao_post = $_POST['cartao'];
$boleto_post = $_POST['boleto'];


$sql = "UPDATE login SET senha = '$senha_nova' WHERE email = '$email_cliente'";
$query = mysqli_query($conn, $sql);

if(!$query){
    echo "Erro ao alterar a senha. Tente novamente.";
}else{
    echo "<meta http-equiv='refresh' content='0;url=config.php?senha=ok'>";
}

?>