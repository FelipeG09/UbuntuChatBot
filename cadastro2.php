<?php
require_once('conn.php');

# Usuario = 1
# Admin = 2

$nome_cliente = $_POST['nome'];
$senha_cliente = $_POST['senha'];
$email_cliente = $_POST['email'];
$tipo_cliente = $_POST['tipo'];

# Busca emails
$busca_email = "SELECT * FROM login WHERE email = '$email_cliente'";
$resultado_busca = mysqli_query($conn, $busca_email);
$total_clientes = mysqli_num_rows($resultado_busca);

# Verificação de emails cadastrados
if ($total_clientes > 0) {
    echo "<meta http-equiv='refresh' content='0;url=email_ja_cadastrado.php'>";
} else {
    # Insere novo usuário
    $inserir_usuario = "INSERT INTO login (nome, senha, email, tipo) VALUES ('$nome_cliente', '$senha_cliente', '$email_cliente', '1')";
    $resultado_insercao = mysqli_query($conn, $inserir_usuario);

    if ($resultado_insercao) {
        echo "<meta http-equiv='refresh' content='0;url=sucesso.php'>";
    } else {
        echo "<meta http-equiv='refresh' content='0;url=erro_cadastro.php'>";
    }
}
?>
