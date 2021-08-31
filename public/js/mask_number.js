$(document).ready(function($){
    $("#cpf").mask("000.000.000-00")
    $("#pis").mask("000.00000.00-0")
    $("#cnpj").mask("00.000.000/0000-00")
    $("#titulo_eleitor").mask("0000 0000 0000 0000")
    $("#telefone").mask("(00) 0000-0000")
    $("#salario").mask("999.999.990,00", {reverse: true})
    $("#cep").mask("00000-000")
    $("#dataNascimento").mask("00/00/0000")

    $("#rg").mask("99.999.999-X", {
        translation: {
            'X': {
                pattern: /[X0-9]/
            }
        },
        reverse: true
    })
    $("#rg").blur(function(event){
        if ($(this).val().length == 15){
            $("#rg").mask("99.999.999-X")
        }else{
            $("#rg").mask("9.999.999-X")
        }
    })

    var options = {
        translation: {
            'A': {pattern: /[A-Z]/},
            'a': {pattern: /[a-zA-Z]/},
            'S': {pattern: /[a-zA-Z0-9]/},
            'L': {pattern: /[a-z]/},
        }
    }

    $("#placa").mask("AAA-0000", options)

    $("#codigo").mask("AA.LLL.0000", options)

    $("#celular").mask("(00) 0000-00009")

    $("#celular").blur(function(event){
        if ($(this).val().length == 15){
            $("#celular").mask("(00) 00000-0009")
        }else{
            $("#celular").mask("(00) 0000-00009")
        }
    })
})
