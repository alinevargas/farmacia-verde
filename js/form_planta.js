$(document).ready(function(){
		
    $("#form").submit(function(){
        var comum= $("#comum").val().trim();	
        var cientifico= $("#cientifico").val().trim();	
        var descricao= $("#descricao").val();	
    
      if(comum==""){
          Swal.fire("Erro","O campo comum é obrigatório","danger");
          return false;
        }
      if(comum.length<3){
          Swal.fire("Erro","O campo comum tem que ter no mínimo 3 letras","danger");
          return false;
        }
      if(cientifico==""){
          Swal.fire("Erro","O campo cientifico  é obrigatório","danger");
          return false;
        }
      if(cientifico.length<3){
          Swal.fire("Erro","O campo cientifico deve ter no mínimo 3 letras","danger");
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