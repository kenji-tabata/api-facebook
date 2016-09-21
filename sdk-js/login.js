var app = {};

app.usuario = {
    id:      "",
    name:    "",
    picture: "",
    gender:  ""
};

app.view = {
    logout: function () {
        var html = '<input type="image" src="imagens/facebook.png" id="btn-login"/><p>Entre com o seu login!</p>';
        document.getElementById('status').innerHTML = html;
        document.getElementById('btn-login').addEventListener('click', function() {app.login();});
    },
    login: function () {
        var html = '<p>Seja bem vindo <span id="nome"></span>! Clique em <a href="#" id="btn-encerrar">encerrar</a> para sair!</p>';
        document.getElementById('status').innerHTML = html;
        document.getElementById('btn-encerrar').addEventListener('click', function() {app.logout();});
    }
};

app.logout = function () {
    FB.logout(function (response) {
        console.log(response);
        app.view.logout();
    });
};

app.login = function () {
    FB.login(function (response) {
        console.log(response);
        app.view.login();
    },
    // No parâmetro scope definimos quais são as permissões que precisamos carregar do Facebook.
    // As permissões public_profile, email e user_friends não precisam passar pela análise 
    // do Facebook.
    // Lista de permissões: https://developers.facebook.com/docs/facebook-login/permissions
    {scope: 'public_profile, email'});
};

app.getDados = function () {
    // O parâmetro fields define quais dados do usuário precisamos
    FB.api('/me', {fields: 'name, email, picture, gender'}, function (response) {
        // Salva na memória os dados do usuario
        app.usuario = response;
        console.log(app.usuario);
        document.getElementById('nome').innerHTML = app.usuario.name;
    });
};

app.status = function (response) {
    console.log(response);
    if (response.status === 'connected') {
        app.view.login();
        app.getDados();
    } else {
        app.view.logout();
    }
};

// O appId é quem identifica qual app está utilizando, no caso está configurado para a versão de teste
window.fbAsyncInit = function () {
    FB.init({
        appId: '1760820287509416',
        xfbml: true,
        status: true, 
        cookie: true,
        version: 'v2.7'
    });

    FB.getLoginStatus(function (response) {
        app.status(response);
    });
};


// Carrega modulo SDK do Facebook
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

