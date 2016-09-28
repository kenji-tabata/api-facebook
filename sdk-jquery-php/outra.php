<!DOCTYPE html>
<html>
    <head>
        <title>Facebook Login Example</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    </head>
    <body>
        <div id="navbar">
            <?php include __DIR__ . '/login.php'; ?>
        </div>
        <h1>Home</h1>
        <p><a href="index.php">Página inicial</a></p>
        <p>Outra página</p>
        <script type="text/javascript" src="js/app.js"></script>
        <script type='text/javascript'>
            app.facebook.init();
            app.view_login.init();
        </script>
    </body>
</html>