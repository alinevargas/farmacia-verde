$(document).ready(function(){
    
    $('#cpf').mask('000.000.000-00',{placeholder: '___.___.___-__'});

    $("#form").submit(function(){
		var nome= $("#nome").val().trim();	
		var sobrenome= $("#sobrenme").val().trim();	
		var tipo= $("#tipo").val();	
		var email= $("#email").val().trim();
		var senha= $("#senha").val().trim();	

        if(nome==""){
            Swal.fire("Erro","O campo nome é obrigatório","danger");
			return false;
		}
		if(nome.length<3){
            Swal.fire("Erro","O campo nome tem que ter no mínimo 3 letras","danger");
			return false;
		}
		if(sobrenome==""){
            Swal.fire("Erro","O campo sobrenome  é obrigatório","danger");
			return false;
		}
        if(sobrenome.length<3){
            Swal.fire("Erro","O campo sobrenome deve ter no mínimo 3 letras","danger");
			return false;
		}
		if(tipo=""){
            Swal.fire("Erro","O campo tipo é obrigatório","danger");
			return false;
		}
		if(email==""){
            Swal.fire("Erro","O campo email é obrigatório","danger");
			return false;
		}
        if(senha==""){
            Swal.fire("Erro","O campo senha é obrigatório","danger");
            return false;
        }
        if(senha.length<3){
            Swal.fire("Erro","O campo senha deve ter no mínimo 3 letras","danger");
			return false;
		}
    });
});