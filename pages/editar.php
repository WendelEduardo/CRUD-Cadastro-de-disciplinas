<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>

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
            margin-top: 1.5rem;
        }

        span {
            color: #4ca000;
        }

        p {
            margin-top: 2rem;
        }

        .label {
            margin-bottom: 1rem;
        }

        input {
            outline: none;
            border: none;
            padding: .5rem;
            width: 100%;
            margin-bottom: .6rem;
            margin-top: .6rem;
            text-align: center;
            border-radius: 4px;
            height: 2.5rem;
            font-size: 1rem;
            color: #4f4f4f;
            border: 1px solid #dbdbdb;
        }

        input:focus {
            border: 2px solid #111;
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
        $servidor = "localhost"; //conexão local
        $usuario  = "root";      //o usuário administrador
        $senha    = "";            //a senha-padrão do XAMPP é vazio
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

        //Se o botão não for pressionado, é porque é preciso preencher o form
        if (!isset($_POST['botao'])) {
            //Capturar o código da disciplina que está no URL
            $id_disciplina = $_GET['id'];

            //PASSO 2: Criar a consulta (desta vez, é uma única disciplina)
            $consulta = "SELECT cod_disciplina, nome_disciplina, curso_disciplina, semestre_disciplina, cargaHoraria_disciplina FROM disciplina WHERE cod_disciplina=$id_disciplina";
            //PASSO 3: Executar a consulta
            $resultado =  mysqli_query($conexao, $consulta) or die("FALHA NA EXECUÇÃO DA CONSULTA:" . mysqli_connect_error());
            //PASSO 4: Formatar o resultado obtido - não precisa de laço por ser uma só
            list($id_disciplina, $nome_disciplina, $curso, $semestre, $carga_horaria) = mysqli_fetch_row($resultado);
        }
        //Se o botão for pressionado, é preciso atualizar os dados no banco
        else {
            //Capturar os valores do formulário
            $id_disciplina   = $_POST['id_disciplina'];
            $nome_disciplina = $_POST['nome_disciplina'];
            $curso           = $_POST['curso'];
            $semestre        = $_POST['semestre'];
            $carga_horaria   = $_POST['carga_horaria'];
            //PASSO 2: Criar a consulta (uso do UPDATE)
            $consulta = "UPDATE disciplina SET nome_disciplina='$nome_disciplina', curso_disciplina='$curso', semestre_disciplina='$semestre', cargaHoraria_disciplina='$carga_horaria'  WHERE cod_disciplina=$id_disciplina";
            //PASSO 3: Executar a consulta
            $resultado =  mysqli_query($conexao, $consulta) or die("FALHA NA EXECUÇÃO DA CONSULTA:" . mysqli_connect_error());
            echo "<h2>DISCIPLINA <span> $nome_disciplina </span> ALTERADA COM <span>SUCESSO!</span></h2>";
        }

        ?>

        <body>
            <h1>ATUALIZAÇÃO DE DISCIPLINA</h1>
            <form name="formulario" action="editar.php" method="POST">
                Nome da disciplina:<br>
                <input type="text" name="nome_disciplina" value="<?php echo $nome_disciplina; ?>" size="50"><br>
                Curso:<br>
                <input type="text" name="curso" value="<?php echo $curso; ?>" size="50"><br>
                Semestre: <br>
                <input type="number" name="semestre" value="<?php echo $semestre; ?>"><br>
                Carga Horária:<br>
                <input type="number" name="carga_horaria" value="<?php echo $carga_horaria; ?>"><br>
                <input type="hidden" name="id_disciplina" value="<?php echo $id_disciplina; ?>">
                <input type="submit" name="botao" value="ATUALIZAR"><br>
            </form>
            <p><a href="listar.php" class="button">VOLTAR</a></p>
        </body>
    </div>
</body>

</html>