<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Remover Disiciplina</title>

  <link rel="stylesheet" href="./style/style.css">

  <style>
    /* RESET */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    a {
      text-decoration: none;
      color: rgb(42, 42, 42);
    }

    a:hover {
      text-decoration: underline;
    }

    body {
      font-family: 'Noto Sans', sans-serif;
    }

    .container {
      width: 90%;
      margin: 2rem auto;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      background: rgb(245, 245, 245);
      color: rgb(42, 42, 42);
      font-size: clamp(12px, 16px, 20px);
      padding: clamp(2rem, 4rem, 4.5rem);
    }

    h1 {
      margin-top: 1rem;
      margin-bottom: 5rem;
    }

    span {
      color: #4ca000;
    }

    input {
      outline: none;
      border: none;
      padding: .5rem;
    }

    .button {
      height: 3rem;
      background: #111;
      color: #fff;
      cursor: pointer;
      font-size: 1.1rem;
      transition: .2s;
      outline: none;
      border: none;
      padding: .5rem;
      border-radius: 4px;
      margin-top: 2rem;
    }

    .button:hover {
      background: #1f1f1f;
      text-decoration: none;
    }

    .button:focus {
      background: #fff;
      color: #111;
      border: 2px solid #111;
    }
  </style>
</head>

<body>
  <div class="container">
    <?php
    header("Content-type: text/html; charset=ISO-8859-1");
    $servidor = "localhost"; //conexão local
    $usuario  = "root";   //o usuário administrador
    $senha    = "";  //a senha-padrão do XAMPP é vazio
    $banco    = "graduacao"; //nome do banco de dados
    //PASSO 0: Capturar o valor do código da disciplina
    $id_disciplina = $_GET['id'];
    // PASSO 1: Criar a conexão
    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
    //para remover os problemas com a acentuação 
    mysqli_set_charset($conexao, 'utf8');
    if (!$conexao) {
      //imprimir a mensagem de erro e abortar a execução do restante do código
      die("PROBLEMA COM A CONEXÃO:" . mysqli_connect_error());
    }
    //PASSO 2: Criar a consulta (desta vez, é dinâmica)
    $consulta = "DELETE FROM disciplina WHERE cod_disciplina=$id_disciplina";
    //PASSO 3: Executar a consulta
    $resultado =  mysqli_query($conexao, $consulta) or die("FALHA NA EXECUÇÃO DA CONSULTA:" . mysqli_connect_error());
    echo "<h1>A DISCIPLINA FOI REMOVIDA COM <span>SUCESSO!</h1><span>";

    echo "<a class='button' href='./listar.php'>Voltar para Listagem</a>"
    ?>
  </div>
</body>

</html>