// A $( document ).ready() block.
$(document).ready(function () {
    $('#cpf').inputmask('999.999.999-99')
    $('#telefone').inputmask('(99)99999-9999')
    $('#cep').inputmask('99999-999')
});



const consultaCEP = () => {
    let cep = $("#cep").val();

    // replace para tirar o _ e - da mascara
    cep = cep.replaceAll("_", "").replaceAll("_", "")

    // verifica se o CEP foi preenchido com todos os numeros
    if (cep.length < 9) {
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

const addProfessor = () => { }