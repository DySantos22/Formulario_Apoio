function validar(){

    var erro = false;

     //validacao da senha
     senha = document.formulario.nova_senha.value;
     confirma_senha = document.formulario.confirmar_senha.value;
 
     if (confirma_senha != senha){ 
         alert("As senhas não são iguais!");
         erro=true;
         document.getElementById("formulario").reset();
     }
     if(confirma_senha =="" || senha==""){
         alert("Por favor, Preencha sua senha!")
         erro=true;
     }

     if(erro==false){
        document.formulario.submit();
    }
}

