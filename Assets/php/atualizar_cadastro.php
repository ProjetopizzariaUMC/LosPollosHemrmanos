
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Cadastro</title>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="shortcut icon" type="/img/mini_logo.png" href="../img/DC_Comics_logo.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    
<div class="container">
    
<div class="second-column">
                <h2 class="title title-second">DESEJA ATUALIZAR SUA CONTA?
                    <span class="logo-container">
                        <img src="../img/logo-com-fundo.jpg" alt="Logo" class="logo">
                    </span>
                </h2>

                <p class="description description-second">Atualize os Dados:</p>
                <form class="form" name="cadastro" action="cadastro_action.php" method="POST">
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" name="nome_antigo" id="nome_antigo" placeholder="Nome Antigo">
                    </label>

                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" name="nome_novo" id="nome_novo" placeholder="Nome Novo">
                    </label>

                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email_antigo" id="email_antigo" placeholder="Email Antigo">
                    </label>

                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" name="email_movo" id="email_novo" placeholder="Email Novo">
                    </label>

                    <label class="label-input" for="">
                    <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha_antiga" id="senha_antiga" placeholder="Senha Antiga">
                    </label>

                    <label class="label-input" for="">
                    <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="senha_nova" id="senha_nova" placeholder="Senha Nova">
                    </label>

                    <label class="label-input" for="">
                    <i class="fas fa-lock icon-modify"></i>
                        <input type="password" name="confirmar_senha" id="confirmar_senha" placeholder="Confirmar Senha">
                    </label>




                    <button class="btn btn-second">ATUALIZAR</button>
                </form>
            </div>
</div>

</body>
</html>