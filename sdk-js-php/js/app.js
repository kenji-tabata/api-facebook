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
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    },
    fbAsyncInit: function () {
        var me = this;
        window.fbAsyncInit = function () {
            FB.init({
                appId: me.app_id,
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
    init: function () {
        this.events();
    },
    events: function () {
        this.login();
    },
    login: function() {
        this.ctrl_login.click(function () {
            FB.login(function (response) {
                if (response.authResponse) {
                    alert('You are logged in &amp; cookie set!');
                    // Now you can redirect the user or do an AJAX request to
                    // a PHP script that grabs the signed request from the cookie.
                } else {
                    alert('User cancelled login or did not fully authorize.');
                }
            });
            return false;
        });
    }

};