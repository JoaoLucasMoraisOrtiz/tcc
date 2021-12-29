 /* trabalha com as respostas do google para nós */
 function handleCredentialResponse(response) {
    const data = jwt_decode(response.credential)
    console.log(data)

    var sub = data.sub

    $.ajax({
        type: "POST",
        url: 'http://localhost:8000',
        data: data,
        success: function (response){
            document.getElementById('msg').innerHTML = response
        },
        error: function (response){
            document.getElementById('msg').innerHTML = 'error!!'
        }
    });
}

/* quando a pagina for iniciada */
window.onload = function () {

    /* crias as configurações do login */
    google.accounts.id.initialize({
        client_id: "922634279824-ncm4mokct42505bmepbgut1tgherhdd2.apps.googleusercontent.com",
        callback: handleCredentialResponse
    });

    /* cria o botão */
    google.accounts.id.renderButton(
        document.getElementById("buttonDiv"),
        { theme: "outline", size: "large" }  // customization attributes
    );
    google.accounts.id.prompt(); // also display the One Tap dialog
}
