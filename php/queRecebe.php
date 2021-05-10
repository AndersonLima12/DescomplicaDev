<?php include_once"config.php";?>
<html>
<body>
<?php 
$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$mensagem = $_POST["mensagem"];
$servico = $_POST["servico"];

$preco_servico = 0;
$preco_servico_avista = 0;

$conn = mysqli_connect($localhost, $usuario, $senha, $bd);
mysqli_select_db($conn,'$db');
$sql = "INSERT INTO tbformulario (nome,email,telefone,mensagem,servico) VALUES ('$nome', '$email', '$telefone', '$mensagem', '$servico')";
if (mysqli_query($conn, $sql)) {

  if($servico === 'dev_site') {
    $preco_servico = 2000;
  } else if($servico === 'dev_mobile') {
    $preco_servico = 5000;
  } else if($servico === 'consultoria') {
    $preco_servico = 600;
  }

  $preco_servico_avista = $preco_servico - ($preco_servico * 0.2);

  //!\n O serviço selecionado possui o valor de $preco_servico. Para pagamentos a vista, oferecemos 20% de desconto(o serviço desejado sai por apenas R$$preco_servico_avista)

  echo "
    <script>
    alert('Sua mensagem foi enviada com sucesso'); 
    alert('O serviço selecionado possui o valor de R$$preco_servico. Para pagamentos a vista, oferecemos 20% de desconto(o serviço desejado sai por apenas R$$preco_servico_avista)'); 
    window.location = 'http://localhost/site/contato.html';
</script>";

}else{
 echo "Deu errro: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
</body>
</html>