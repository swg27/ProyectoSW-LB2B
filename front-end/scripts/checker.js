function alertRegex() {
    console.log("empiezo");
    if(!regex()){
        console.log("sali");
        window.alert("Incorrecto");
        return false;
    }
    return true;
}

function regex() {
    console.log("entro");
    var result = true;
    if(!checkEmail($('#e-mail').val())){
        console.log("checking email");
        window.alert("Validacion incorrecta del e-mail");
        return false;
    }
    console.log("checked email");
    if(!checkLevel($('#lvl').val())){
        window.alert("Validacion incorrecta del nivel de la pregunta");
        return false;
    }
    if(
        checkEmpty($('#tm').val())){
        window.alert("El tema está vacio");
        return false;
    }
    if(!checkQuest($('#Qst').val())){
        window.alert("La pregunte debe tener minimo 10 caracteres");
        return false;
    }
    if(checkEmpty($('#ans').val())){
        window.alert("respuesta correcta vacia");
        return false;
    }
    console.log("checked Qst");
    if(checkEmpty($('#noAns1').val())){
        window.alert("respuesta incorrecta 1 vacia");
        return false;
    }
    console.log("checked no ans1");
    if(checkEmpty($('#noAns2').val())){
        window.alert("respuesta incorrecta 2 vacia");
        return false;
    }
    console.log("checked no ans2");
    if(checkEmpty($('#noAns3').val())){
        window.alert("respuesta incorrecta 3 vacia");
        return false;
    }
    console.log("checked no ans3");
    return result;

}

function checkEmail(email) {
    var re = /^(([a-zA-Z]{1,})+[0-9]{3})+@ikasle\.ehu\.+(eus|es)$/;
    console.log("voy a verificar si está vacio.");
    if(!checkEmpty(email)) {
        console.log("verificando vacio.");
        return re.test(email);
    }else{
        return false;
    }
}

function checkLevel(level) {
    var r = /^[1-5]{1}$/
    return r.test(level)
}

function checkQuest(quest) {
    var r;
    quest = quest.trim();
    (quest.length>10 ? r = true : r = false);
    return r;
}

function checkEmpty(box) {
    return box === "";
}