$(document).ready(function () {
    $('#cpf').inputmask('999.999.999-99')
    $('#telefone').inputmask('(99)99999-9999')
    $('#cep').inputmask('99999-999')

    // executa a função listaTipo()
    listaTipo()
});



const consultaCEP = () => {
    let cep = $("#cep").val();

    // replace para tirar o _ e - da mascara
    cep = cep.replaceAll("_", "").replaceAll("_", "")

    // verifica se o CEP foi preenchido com todos os numeros
    if (cep.length < 8) {
        Swal.fire({
            icon: 'error',
            title: 'Atenção...',
            text: 'Cep inválido!',
        })
        $('#cep').focus();
        return
    }

    // realiza requisição para API VIA CEP
    const result = fetch(`http://viacep.com.br/ws/${cep}/json/`)
        .then((response) => response.json())
        .then((result) => {
            // retorno da requisição

            if (result.erro) {
                Swal.fire({
                    icon: 'error',
                    title: 'Atenção.',
                    text: 'Cep não encontrado!',
                })
            } else {


                $('#rua').val(result.logradouro)
                $('#bairro').val(result.bairro)
                $('#cidade').val(result.localidade)
                $('#estado').val(result.result.uf)

                // coloca o focus do usuário no campo numero
                $('#numero').focus()
            }
        })
}

const listaTipo = () =>{
    // função que lista os tipos para cadastro
    // dados da tabela tb_tipos
    const result = fetch('../backend/listaTipo.php')
    .then((response)=>response.json())
    .then((result)=>{
        // aqui sera o retorno dos dados do backend
        // monta no select os options com os tipo da da tabela

        result.map((tipo)=>{
            $('#tipo').append(
                `
            <option value="${tipo.id}">${tipo.tipo}</option>
            `
            )
        })
    })
}

const addUsuarios = () => {

    let dados = new FormData($('#form-professores')[0])

    const result = fetch('../backend/addUsuarios.php',{
        method: 'POST',
        body:dados
    })
    .then((response)=>response.json())
    .then((result)=>{
        // aqui tratamos o retorno do backend
        if(result.retorno == 'ok'){
            Swal.fire({
                icon: "sucess",
                title: "Sucesso!",
                text: result.mensagem,
            });

            result.retorno == 'ok' ? $('#form-professores')[0].reset(): ''
        }else{
            Swal.fire({
                icon: "error",
                title: "Atenção!",
                text: result.mensagem,
            });

        }
    })

};