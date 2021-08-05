<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar disciplinas</title>

    <!-- LINK PARA CSS -->
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
        }

        .button:hover {
            background: #1f1f1f;
        }

        .button:focus {
            background: #fff;
            color: #111;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Cadastro de Disciplina</h1>
        <form action="inserir.php" name="formulario" method="POST">
            <label>Nome da Disciplina</label>
            <input type="text" name="nome_disciplina" value="" required><br>

            <label>Curso</label><br>
            <input type="text" name="curso" value="Sistemas de Informação" required><br>

            <label>Semestre</label><br>
            <input type="number" name="semestre" value="" required><br>

            <label>Carga Horária</label><br>
            <input type="number" name="carga_horaria" value="" required><br>
            <input type="submit" class="button" value="Cadastrar" name="botao">
        </form>
    </div>
</body>

</html>