var app = {};

app.facebook = {
    app_id: 'Replace {app-id} with your app id',
    // Adiciona a tag script que carrega o SDK JavaScript do Facebook na página
    sdkJsLoad: function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        //js.src = "//connect.facebook.net/pt_BR/sdk/debug.js"; // Versão debug do SDK
        js.src = "//connect.facebook.net/pt_BR/sdk.js"; // Versão minimizada do SDK
        fjs.parentNode.insertBefore(js, fjs);
    },
    // Inicia a classe FB
    fbAsyncInit: function () {
        var me = this;
        window.fbAsyncInit = function () {
            FB.init({
                appId: me.app_id,
                xfbml: false, // Iniciar plugins sociais que utilizam XFBML
                status: true,
                cookie: true, // This is important, it's not enabled by default
                version: 'v2.7'
            });
        };
    },
    init: function () {
        this.sdkJsLoad(document, 'script', 'facebook-jssdk');
        this.fbAsyncInit();
    }
};

app.view_login = {
    ctrl_login: $("#btn-login"),
    ctrl_logout: $("#btn-logout"),
    display: $("#notificacao"),
    init: function () {
        this.events();
    },
    events: function () {
        this.login();
        this.logout();
    },
    login: function () {
        var that = this;
        this.ctrl_login.click(function () {
            FB.login(function (response) {
                if (response.authResponse) {
                    $.get("login-callback.php", function (resp) {
                        if (resp) {
                            console.log(resp);
                            window.location.href = resp;
                        } else {
                            console.log(resp);
                            that.display.find('p').remove();
                            that.display.append('<p>Login não foi autorizado!</p>');
                        }
                    });
                } else {
                    that.display.find('p').remove();
                    that.display.append('<p>Login foi cancelado!</p>');
                }
            });
            return false;
        });
    },
    logout: function () {
        var that = this;
        that.ctrl_logout.click(function () {
            // Verifica se o usuário está conectado no Facebook
            FB.getLoginStatus(function (response) {
                // Se estiver conectado...
                if (response.status === 'connected') {
                    // Efetua o logout no Facebook
                    FB.logout(function (response) {
                        console.log(response);
                        // Efetua o logout no site
                        $.get("logout-callback.php", function (resp) {
                            if (resp) {
                                console.log(resp);
                                window.location.href = resp;
                            } else {
                                console.log(resp);
                                that.display.find('p').remove();
                                that.display.append('<p>Ocorreu um erro ao sair do sistema!</p>');
                            }
                        });
                    });
                } else {
                    console.log(response);
                    $.get("logout-callback.php", function (resp) {
                        if (resp) {
                            console.log(resp);
                            window.location.href = resp;
                        }
                    });
                }
            });
        });
    }
};