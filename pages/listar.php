<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de disciplinas</title>

  <link rel="stylesheet" href="./style/style.css">

  <!-- GOOGLE FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">

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

    input {
      outline: none;
      border: none;
      padding: .5rem;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead tr {
      background: rgb(124, 124, 124);
      color: #fff;
    }

    tbody tr {
      transition: .2s;
    }

    tbody tr:hover {
      background: #fff;
    }

    table td {
      border: 1px solid rgb(223, 223, 223);
    }

    td,
    th {
      padding: 1rem;
      text-align: center;
      width: 25%;
      /* font-size: 1rem; */
    }

    .remover {
      color: #f03434;
    }

    .editar {
      color: #22a7f0;
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
    header("Content-type: text/html; charset=utf-8");
    $servidor = "localhost"; //conexão local
    $usuario  = "root";      //o usuário administrador
    $senha    = "";      //a senha-padrão do XAMPP é vazio
    $banco    = "graduacao"; //nome do banco de dados

    // PASSO 1: Criar a conexão
    $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
    //para remover os problemas com a acentuação convertendo para UTF-8
    mysqli_set_charset($conexao, 'utf8');
    // Verificar se tudo está ok
    if (!$conexao) {
      //imprimir a mensagem de erro e abortar a execução do restante do código
      die("PROBLEMA COM A CONEXÃO:" . mysqli_connect_error());
    }
    //PASSO 2: Criar a consulta (desta vez, é dinâmica)
    $consulta = "SELECT cod_disciplina , nome_disciplina, curso_disciplina, semestre_disciplina, cargaHoraria_disciplina FROM disciplina ORDER BY nome_disciplina LIMIT 200";
    //PASSO 3: Executar a consulta
    $resultado =  mysqli_query($conexao, $consulta) or die("FALHA NA EXECUÇÃO DA CONSULTA:" . mysqli_connect_error());

    //PASSO 4: Formatar o resultado obtido

    echo "<h1>Lista de Disciplinas Cadastradas</h1>";

    $contador = 0;

    while (list($id_disciplina, $nome_disciplina, $curso_disciplina, $semestre_disciplina, $cargaHoraria_disciplina) = mysqli_fetch_row($resultado)) {
      echo "<table>
      <thead>
    <tr>
    <th>Número da disciplina</th>
    <th>Código</th>
    <th>Nome da Disciplina</th>
    <th>Nome do Curso</th>
    <th>Semestre</th>
    <th>Carga horária</th>
    <th></th>
    <th></th>
    </tr>
    </thead>
    <tbody>
    <tr>
    <td> ", ($contador = $contador + 1), "</td>
    <td> $id_disciplina </td>
    <td> $nome_disciplina </td>
    <td> $curso_disciplina </td>
    <td> $semestre_disciplina </td>
    <td> $cargaHoraria_disciplina </td>
    <td> <a class='editar' href='editar.php?id=$id_disciplina'>EDITAR</a> </td>
    <td> <a class='remover' href='remover.php?id=$id_disciplina'>REMOVER</a> </td>
    <tr>
    </tbody>
    </table>";
    }

    echo "<a href='./index.php' class='button'> Cadastrar mais Disciplinas + </a>"
    ?>

  </div>
</body>

</html>