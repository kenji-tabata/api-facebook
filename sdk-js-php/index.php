<!DOCTYPE html>
<html>
    <head>
        <title>Facebook Login JS e PHP</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    </head>
    <body>
        <div id="navbar">
            <?php include __DIR__ . '/login.php'; ?>
        </div>
        <h1>Home</h1>
        <p>Página inicial</p>
        <p><a href="outra.php">Outra página</a></p>
        <script type="text/javascript" src="js/app.js"></script>
        <script type='text/javascript'>
            app.facebook.init();
            app.view_login.init();
        </script>
    </body>
</html>