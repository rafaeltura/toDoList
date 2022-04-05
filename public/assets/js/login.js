window.onload = function () {

    let message = document.querySelector('#message');

    function validarLogar () {
        if( document.querySelector('#user-email').value.trim() && document.querySelector('#user-password').value.trim() ) {
            return true;
        }

        return false;
    }

    function limparForm () {
        document.querySelector('#user-email').value = '';
        document.querySelector('#user-password').value = '';
    }

    document.querySelector('#login-btn').addEventListener('click', function () {
        if(validarLogar()){
            message.classList.add(['hide']);
            message.innerHTML = '';

            $.ajax({
                type: 'POST',
                dataType: 'text json',
                url: '/toDoList/public/login',
                async: true,
                data: {
                    email: document.querySelector('#user-email').value.trim(),
                    senha: document.querySelector('#user-password').value.trim()
                },
                success: (response) => {
                    if( !!response.success ) {
                        window.location.href = "http://localhost/toDoList/public/";
                        location.pathname = "/toDoList/public/";
                        //location.reload();
                    }else {
                        limparForm();
                    }
                },
                error: () => {
                    limparForm();
                }
            });


        }else {
            message.innerHTML = 'Preencha os campos!';
            message.classList.remove(['hide']);
        }
    });

}