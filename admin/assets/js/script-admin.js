/// scripts executados ao carregar a pagina
$(document).ready(function () {
  $("#cpf").inputmask("999.999.999-99");
  $("#telefone").inputmask("(99) 99999-9999");
  $("#cep").inputmask("99999-999");

  // executa a funcao listaTipo()
  listaTipo();

});

const consultaCEP = () => {
  // captura o valor do cep via JQUERY
  let cep = $("#cep").val();

 //replace para tirar o _ e - da mascara   
  cep = cep.replaceAll("_", "").replaceAll("-", "")

//verifica se o CEP foi preenchido com todos os numeros   
  if (cep.length < 8) {
    Swal.fire({
      icon: "error",
      title: "Atenção...",
      text: "CEP inválido!",
    });
    $("#cep").focus();
    return
  }

  //   realiza requisicao para API VIA CEP
  const result = fetch(`http://viacep.com.br/ws/${cep}/json/`)
    .then((response) => response.json())
    .then((result) => {
      // retorno da requisicao

      if (result.erro) {
        Swal.fire({
          icon: "error",
          title: "Atenção...",
          text: "CEP não encontrado!",
        });
      } else {
        $("#rua").val(result.logradouro).prop('disabled', false);
        $("#bairro").val(result.bairro).prop('disabled', false);
        $("#cidade").val(result.localidade).prop('disabled', false);
        $("#estado").val(result.uf).prop('disabled', false);


        // coloca o focus do usuário no campo numero
        $("#numero").prop('disabled',false).focus();
      }
    });
};

const listaTipo = () =>{
  // funcao que lista os tipos para o cadastro
  // dados da tabela tb_tipos
  const result = fetch('../backend/listaTipo.php')
  .then((response)=>response.json())
  .then((result)=>{
    // aqui sera o retorno dos dados do backend
    // monta no select os options com os tipos da tabela

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
  })

};

// Função que exibe a aba cadastro e ocluta a aba listagem
const abaCadastro=()=>{
  // Oculta a div de listagem
  $('#div-listagem').hide()

  // Mostra a div de cadastro
  $('#form-professores').show()
}

// Função que exibe a aba listagem e oculta a aba cadastro
const abaListagem=()=>{
  // esconde form professores
  $('#form-professores').hide()

  // Exibe a div de listagem
  $('#div-listagem').show()
}

const pesquisarUsuario = () =>{

  // validação de campo pesquisar vazio
  let pesquisar = $('#pesquisar').val()

  if(pesquisar == ''){
    Swal.fire({
      icon: 'error',
      title: 'Atenção!',
      text: 'Digite um nome ou CPF para pesquisar!',
    })
    return
  }

  dados = new FormData($('#form-listagem')[0])

  result = fetch('../backend/pesquisarUsuario.php',{
    method: 'POST',
    body: dados
  })
  .then((response)=>response.json())
  .then((result)=>{
    // aqui iremos exibir os dados encontrados na pesquisa na tela

  })

}