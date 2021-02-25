$(document).ready(function(){
		
    $("#form").submit(function(){
          var nome= $("#nome").val().trim();	
          var ingredientes= $("#ingredientes").val().trim();	
          var descricao= $("#descricao").val();	
      
        if(nome==""){
            Swal.fire("Erro","O campo nome é obrigatório","danger");
            return false;
          }
        if(nome.length<3){
            Swal.fire("Erro","O campo nome tem que ter no mínimo 3 letras","danger");
            return false;
          }
        if(ingredientes==""){
            Swal.fire("Erro","O campo ingredientes  é obrigatório","danger");
            return false;
          }
        if(ingredientes.length<3){
            Swal.fire("Erro","O campo ingredientes deve ter no mínimo 3 letras","danger");
            return false;
          }
        if(descricao==""){
            Swal.fire("Erro","O campo descricao é obrigatório","danger");
            return false;
        }
        if(descricao.length<3){
            Swal.fire("Erro","O campo descricao deve ter no mínimo 3 letras","danger");
            return false;
          }
    });
  });