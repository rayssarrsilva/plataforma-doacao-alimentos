<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Plataforma de Doações</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #4a90e2, #145ea8);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background: white;
            color: #333;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            width: 90%;
            max-width: 500px;
        }

        .container h1 {
            margin-bottom: 20px;
            color: #145ea8;
        }

        .container p {
            margin-bottom: 30px;
            font-size: 1rem;
        }

        .options, .logins {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin-bottom: 20px;
        }

        .options a, .logins a {
            text-decoration: none;
            background-color: #4a90e2;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .options a:hover, .logins a:hover {
            background-color: #145ea8;
        }

        @media (min-width: 500px) {
            .options, .logins {
                flex-direction: row;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Bem-vindo à Plataforma de Doações</h1>
    <p>Escolha como deseja se registrar:</p>

    <div class="options">
        <a href="forms/registrar_doador.php">Quero Ser Doador</a>
        <a href="forms/registrar_instituicao.php">Sou Instituição</a>
    </div>

    <p>Já tem cadastro?</p>
    <div class="logins">
        <a href="forms/login_doador.php">Já sou Doador</a>
        <a href="forms/login_instituicao.php">Já sou Instituição</a>
    </div>
</div>

</body>
</html>
