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