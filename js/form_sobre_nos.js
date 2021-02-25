$(document).ready(function(){
		
    $("#form").submit(function(){
        var lema= $("#lema").val().trim();	
        var localidade= $("#localidade").val().trim();	
        var colaboradores= $("#colaboradores").val().trim();	
        var resumo= $("#resumo").val().trim();	
        var historia= $("#historia").val().trim();	
        var email= $("#email").val().trim();	
        var insta= $("#insta").val().trim();	
        var youtube= $("#youtube").val().trim();	
        
        if(lema==""){
            Swal.fire("Erro","O campo lema é obrigatório","danger");
            return false;
        }
        if(lema.length<3){
            Swal.fire("Erro","O campo lema tem que ter no mínimo 3 letras","danger");
            return false;
        }
        if(localidade==""){
            Swal.fire("Erro","O campo localidade  é obrigatório","danger");
            return false;
        }
        if(localidade.length<3){
            Swal.fire("Erro","O campo localidade deve ter no mínimo 3 letras","danger");
            return false;
        }
        if(colaboradores==""){
            Swal.fire("Erro","O campo colaboradores é obrigatório","danger");
            return false;
        }
        if(colaboradores.length<3){
            Swal.fire("Erro","O campo colaboradores deve ter no mínimo 3 letras","danger");
            return false;
        }
        if(resumo==""){
            Swal.fire("Erro","O campo resumo é obrigatório","danger");
            return false;
        }
        if(resumo.length<3){
            Swal.fire("Erro","O campo resumo tem que ter no mínimo 3 letras","danger");
            return false;
        }
        if(historia==""){
            Swal.fire("Erro","O campo historia  é obrigatório","danger");
            return false;
        }
        if(historia.length<3){
            Swal.fire("Erro","O campo historia deve ter no mínimo 3 letras","danger");
            return false;
        }
        if(email==""){
            Swal.fire("Erro","O campo email é obrigatório","danger");
            return false;
        }
        if(email.length<3){
            Swal.fire("Erro","O campo email deve ter no mínimo 3 letras","danger");
            return false;
        }
        if(insta==""){
            Swal.fire("Erro","O campo insta é obrigatório","danger");
            return false;
        }
        if(insta.length<3){
            Swal.fire("Erro","O campo insta tem que ter no mínimo 3 letras","danger");
            return false;
        }
        if(youtube==""){
            Swal.fire("Erro","O campo youtube  é obrigatório","danger");
            return false;
        }
        if(youtube.length<3){
            Swal.fire("Erro","O campo youtube deve ter no mínimo 3 letras","danger");
            return false;
        }
    });
});