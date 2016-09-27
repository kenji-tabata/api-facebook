<?php require_once __DIR__ . "/controls/login.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Facebook Login Example</title>
        <meta charset="UTF-8">
        <style>#btn-login {width: 150px;}</style>
    </head>
    <body>
        <div id="navbar">
            <?php if (existeToken()) { ?>
                <img src="<?php echo $userNode->getPicture()['url']; ?>" alt="foto"><br/>
                <p>Nome do usuário: <?php echo $userNode->getName(); ?></p>
                <p><a href="controls/logout-action.php">Sair</a></p>
            <?php } else { ?>
                <a href="<?php echo $loginUrl; ?>"><img src="imagens/facebook.png" id="btn-login" alt="Acessar Facebook"/></a>
            <?php } ?>
        </div>
        <h1>Conteúdo 1</h1>
        <p><a href="index.php">Página inicial</a></p>
        <p>Conteúdo 1</p>
        <p><a href="conteudo2.php">Conteúdo 2</a></p>
        <p><a href="conteudo3.php">Conteúdo 3</a></p>
    </body>
</html>