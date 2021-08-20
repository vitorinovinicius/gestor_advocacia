function mascara_cpf(){
    var cpf = document.getElementById('cpf')
    if(cpf.value.length === 3 || cpf.value.length === 7){
        cpf.value += "."
    }else if(cpf.value.length === 11) {
        cpf.value += "-"
    }
}
function mascara_rg(){
    var rg = document.getElementById('rg')
    if(rg.value.length === 2 || rg.value.length === 6){
        rg.value += "."
    }else if(rg.value.length === 10) {
        rg.value += "-"
    }
}

function mascara_pis(){
    var pis = document.getElementById('pis')
    if(pis.value.length === 3 || pis.value.length === 9){
        pis.value += "."
    }else if(pis.value.length === 12) {
        pis.value += "-"
    }
}
function mascara_serie_ctps(){
    var serie_ctps = document.getElementById('serie_ctps')
    if(serie_ctps.value.length === 3){
        serie_ctps.value += "-"
    }
}

function mascara_titulo_eleitor(){
    var titulo_eleitor = document.getElementById('titulo_eleitor')
    if(titulo_eleitor.value.length === 4 || titulo_eleitor.value.length === 9 || titulo_eleitor.value.length === 14){
        titulo_eleitor.value += " "
    }
}

function mascara_cnpj(){
    var cnpj = document.getElementById('cnpj')
    if(cnpj.value.length === 2 || cnpj.value.length === 6){
        cnpj.value += "."
    }else if(cnpj.value.length === 10) {
        cnpj.value += "/"
    }else if(cnpj.value.length === 15) {
        cnpj.value += "-"
    }
}

function mascara_celular(){
    var celular = document.getElementById('celular')
    if(celular.value.length === 0){
        celular.value += "("
    }else if(celular.value.length === 3) {
        celular.value += ")"
    }else if(celular.value.length === 4) {
        celular.value += " "
    }else if(celular.value.length === 10) {
        celular.value += "-"
    }
}
