let token = document.querySelector('#user-token').value;
let message = document.querySelector('#message');

function buscarLista() {
    $.ajax({
        type: 'POST',
        dataType: 'text json',
        url: '/toDoList/public/buscarLista',
        async: true,
        data: {
            token: token,
        },
        success: (response) => {
            if( !!response.success ) {
                if(response.dados && response.dados.length > 0) {
                    document.querySelector('#show-todo-section').classList.remove('hide');
                    document.querySelector('#empty-todo-list').classList.add('hide');
                    montarTabelaListas(response.dados);
                }else {
                    document.querySelector('#show-todo-section').classList.add('hide');
                    document.querySelector('#empty-todo-list').classList.remove('hide');
                }
                
            }
        }
    });
};

function montarTabelaListas(dados = []) {
    let tBody = document.querySelector('#tbody-todo-list');
    tBody.innerHTML = '';

    dados.forEach((dado) => {
        const check = dado.checked == 1 ? true : false;
        const classDescription = check ? 'text-decoration-line-through' : '';
        const attrChecked = check ? 'checked' : '';
        
        tBody.innerHTML += "<tr>"+
            "<td style='width: 17px;'>" +
                "<input " + 
                    "class='form-check-input cursor-pointer' " +
                    "type='checkbox' " +
                    "title='Marcar/Desmarcar' " +
                    "value='"+ check +"' "+ attrChecked +
                    " onchange='selecionar(" + dado.id + ", event)' " +
                " /> " +
            "</td>" +
            "<td style='width: 17px;'> " +
                "<i "+
                    "class='bi bi-trash3 cursor-pointer' "+
                    "title='Excluir' "+ 
                    "onclick='excluir("+ dado.id +","+ dado.idUser +")'>" + 
                "</i> " +
            "</td>" +
            "<td>" +
                "<span id='description"+ dado.id +"' class='"+ classDescription +"'>" + dado.description + "</span>" +
            "</td>" +
        "</tr>";
    });
}

buscarLista();

function validarForm() {
    const inputDescricao = document.querySelector('#description').value;
    if(inputDescricao.trim() && inputDescricao.length > 3){
        return true;
    }
    return false;
}

document.querySelector('#btn-add').addEventListener('click', () => {

    if(validarForm()){
        message.classList.add('hide');
        message.innerHTML = '';
        $.ajax({
            type: 'POST',
            dataType: 'text json',
            url: '/toDoList/public/addTodo',
            async: true,
            data: {
                id: 0,
                description: document.querySelector('#description').value,
                checked: false,
                token: token
            },
            success: (response) => {
                if( !!response.success ) {
                    if(response.dados && response.dados.length > 0) {
                        document.querySelector('#show-todo-section').classList.remove('hide');
                        document.querySelector('#empty-todo-list').classList.add('hide');
                        montarTabelaListas(response.dados);
                    }else {
                        document.querySelector('#show-todo-section').classList.add('hide');
                        document.querySelector('#empty-todo-list').classList.remove('hide');
                    }
                    
                }
            }
        });
    }else {
        message.classList.remove('hide');
        message.innerHTML = 'O campo <strong>Descrição tarefa</strong> é obrigatório!';
        document.querySelector('#description').focus();
    }
});

function excluir(id, idUser){
    if (id && idUser) {
        $.ajax({
            type: 'POST',
            dataType: 'text json',
            url: '/toDoList/public/excluirTodo',
            async: true,
            data: {
                id,
                idUser
            },
            success: (response) => {
                if( !!response.success ) {
                    if(response.dados && response.dados.length > 0) {
                        document.querySelector('#show-todo-section').classList.remove('hide');
                        document.querySelector('#empty-todo-list').classList.add('hide');
                        montarTabelaListas(response.dados);
                    }else {
                        document.querySelector('#show-todo-section').classList.add('hide');
                        document.querySelector('#empty-todo-list').classList.remove('hide');
                    }
                    
                }
            }
        });
    }
}

function selecionar(id, e){
    let span = document.querySelector('#description'+id);
    const selecionado = e.target.checked;
    
    $.ajax({
        type: 'POST',
        dataType: 'text json',
        url: '/toDoList/public/selecionarTodo',
        async: true,
        data: {
            id,
            checked: selecionado,
        },
        success: (response) => {
            if (selecionado && !!response.success) {
                span.classList = 'text-decoration-line-through';
            } else {
                span.classList = '';
            }
        }
    });

}