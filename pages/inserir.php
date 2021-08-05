<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir disciplina</title>

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
        }

        .container {
            width: 90%;
            min-height: 90vh;
            margin: 2rem auto;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            box-shadow: 0px 0px 10px #e9e9e9;
            color: #111;
            font-family: sans-serif;
        }

        h1 {
            font-size: clamp(.5rem, 2rem, 3rem);
            margin-bottom: 2rem;
        }

        span {
            color: #4ca000;
        }

        p {
            margin-bottom: 1rem;
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
        }

        .button:hover {
            background: #1f1f1f;
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
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "graduacao";

        $nome_disciplina = $_POST['nome_disciplina'];
        $curso_disciplina = $_POST['curso'];
        $semestre_disciplina = $_POST['semestre'];
        $cargaHoraria_disciplina = $_POST['carga_horaria'];

        $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
        mysqli_set_charset($conexao, 'UTF-8');

        if (!$conexao) {
            die("Problema com a conexão: " . mysqli_connect_error());
        }

        echo "<h1>Os dados foram inseridos com <span>sucesso!</span></h1>";

        $consulta = "INSERT INTO disciplina(nome_disciplina, curso_disciplina, semestre_disciplina, cargaHoraria_disciplina)
        VALUES ('$nome_disciplina', '$curso_disciplina', '$semestre_disciplina', '$cargaHoraria_disciplina')";

        echo "<p> <strong>Nome da disciplina:</strong> $nome_disciplina <br></p>";
        echo "<p> <strong>Curso da disciplina:</strong> $curso_disciplina <br></p>";
        echo "<p> <strong>Quantidade de semestres:</strong> $semestre_disciplina <br></p>";
        echo "<p> <strong>Carga Horária:</strong> $cargaHoraria_disciplina <br></p>";

        $resultado = mysqli_query($conexao, $consulta) or die("FALHA NA EXECUÇÃO DA CONSULTA: " . mysqli_connect_error());

        echo "<br> <form action='./listar.php'> <input type='submit' class='button' value='Listagem das disciplinas'></form>";

        ?>

    </div>
</body>

</html>