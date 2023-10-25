$(document).ready(function () {
    var mensagem = $("#mensagem");
    var preloader = $("#preloader");
    var barra = $("#barra");
    $("#editarfoto").hide();
    mensagem.hide();
    preloader.hide();
    $("#btn-editar-foto").on('click', function () {
        $("#editarfoto").toggle();
    });
    $("#btn-enviar").on('click', function(event){
        event.preventDefault();
        $("#form-foto").ajaxForm({
            url:'./paginas/leituras/upload/executa-upload.php',
            uploadProgress:function(event, position, total, percentComplete) {
                preloader.show();
                barra.width(percentComplete + '%');
                barra.html(percentComplete + '%');
            },
            success: function (data) {
                var msg = data.substring(0, data.indexOf(';'));
                var tipoMsg = data.substring(0, data.indexOf(';')+1);

                if (tipoMsg == "concluido") {
                    var caminho_foto = msg;
                    msg = "Upload da imagem realizado com sucesso!";
                    $("#foto-leitura").attr("src", caminho_foto+"?timestamp="+ new Date().getTime());
                    mensagem.show().attr("class", "mb-3 alert alert-success").html(msg);
                } else if (tipoMsg == "aviso") {
                    mensagem.show().attr("class", "mb-3 alert alert-warning").html(msg);
                    preloader.hide();
                } else{
                    mensagem.show().attr("class", "mb-3 alert alert-danger").html(msg);
                    preloader.hide();
                }
            },
            error:function (data) {
                console.log(data);
            }
        }).submit();
    })
});