// ES6+
const validalogin = () =>{
    // cria var email
    // let email = $('#email').val()
    // let senha = $('#senha').val()

    // cria um novo formulario de dados, capturando chave e valor do form
    let dados = new FormData($('#form-login')[0])

    // exibe mensagem no console do navegador
    // usado para debug da aplicação
    // verificação de erros
    // console.log(`Email:`+email)
    // console.log(`Senha:`+senha)

    // request PHP
    const result = fetch('backend/validaLogin.php',{
        method: 'POST',
        body: dados
    })
}