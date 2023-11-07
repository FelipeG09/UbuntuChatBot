<?php
require_once('conn.php');

?>

<?php
$nome_cliente= $_POST['nome'];
$senha_cliente= $_POST['senha'];
$email_cliente= $_POST['email'];

# Busca emails
$busca_email = "SELECT * FROM login WHERE email = '$email_cliente'";
$resultado_busca = mysqli_query($conn, $busca_email);
$total_clientes = mysqli_num_rows($resultado_busca);

#Verificação de emails cadastrados

if($total_clientes > 0){
    echo "Email já foi cadastrado anteriormente. Verifique e tente novamente";

}else{
    echo "Email cadastrado com sucesso!";

}

?>