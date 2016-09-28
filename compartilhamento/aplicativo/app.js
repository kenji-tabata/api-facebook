var app = {};

app.facebook = {
    app_id: 'Replace {app-id} with your app id',
    btn_share: $("#share"),
    // Adiciona a tag script que carrega o SDK JavaScript do Facebook na página
    sdkJsLoad: function () {
        var me = this;
        $.ajaxSetup({cache: true});
        // Para ativar o modo debug utilize `connect.facebook.net/pt_BR/sdk/debug.js`
        $.getScript('//connect.facebook.net/pt_BR/sdk.js', function () {
            FB.init({
                appId: me.app_id,
                xfbml: true, // Iniciar plugins sociais que utilizam XFBML
                status: true,
                cookie: true, // This is important, it's not enabled by default
                version: 'v2.7'
            });
        });
    },
    init: function () {
        this.sdkJsLoad();
        this.share();
    },
    share: function () {
        var that = this;
        that.btn_share.click( function () {
            FB.ui({
                method: 'share_open_graph',
                action_type: 'og.likes',
                action_properties: JSON.stringify({
                        object:'http://www.ouse.net.br'
                })
            }, function (response) {
                console.log(response);
            });
        });
    }
};

