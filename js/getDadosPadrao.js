function teste(){
     var nome = document.getElementById('userNome');
     var email = document.getElementById('userEmail');
     var senha = document.getElementById('userSenha');

    var usuario = [{"nome": nome.value, "email": email.value, "senha": senha.value}];
    $.ajax({
        url: "http://127.0.0.1:8080/v1/sign-up",
        type: "POST",
        data: JSON.stringify("{'nome': 'aaa'}"),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function(data){alert(data);},
        failure: function(errMsg) {
           alert(errMsg);
        }
    });
    alert('a');
}
