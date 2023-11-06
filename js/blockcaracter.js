const block = document.querySelector("#nome");

block.addEventListener("keypress", function(e){

    if(!checkChar(e)){
        e.preventDefault();
    }


});

function checkChar(e){

    const char = String.fromCharCode(e.keyCode);

    const pattern = '[a-zA-ZãÃ´`áàÁÀúõÂâôÔíÍÊêç ]';

    if(char.match(pattern)){
        return true;
    }

}

const block2 = document.querySelector("#apelido");

block2.addEventListener("keypress", function(f){

    if(!checkChar(f)){
        f.preventDefault();
    }


});

function checkChar(f){

    const char2 = String.fromCharCode(f.keyCode);

    const pattern2 = '[a-zA-ZãÃ´`áàÁÀúõÂâôÔíÍÊêç ]';

    if(char2.match(pattern2)){
        return true;
    }

}

const block3 = document.querySelector("#indicacao");

block3.addEventListener("keypress", function(g){

    if(!checkChar(g)){
        g.preventDefault();
    }


});

function checkChar(g){

    const char3 = String.fromCharCode(g.keyCode);

    const pattern3 = '[a-zA-ZãÃ´`áàÁÀúõÂâôÔíÍÊêç ]';

    if(char3.match(pattern3)){
        return true;
    }

}

