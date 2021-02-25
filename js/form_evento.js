$(document).ready(function(){
		
  $('#inicio').mask('00/00/0000 às 00:00',{placeholder: '__/__/____ às __:__'});
  $('#fim').mask('00/00/0000 às 00:00',{placeholder: '__/__/____ às __:__'});

  $("#form").submit(function(){
		var nome= $("#nome").val().trim();	
		var local= $("#local").val().trim();	
		var descricao= $("#descricao").val();	
	
    if(nome==""){
      Swal.fire("Erro","O campo nome é obrigatório","danger");
			return false;
		}
		if(nome.length<3){
      Swal.fire("Erro","O campo nome tem que ter no mínimo 3 letras","danger");
			return false;
		}
		if(local==""){
      Swal.fire("Erro","O campo local  é obrigatório","danger");
			return false;
		}
    if(local.length<3){
      Swal.fire("Erro","O campo local deve ter no mínimo 3 letras","danger");
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