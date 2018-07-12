var AMBIENTES = [
    {ip: '200.137.132.113', url: 'http://www.avanead.ufma.br', nome: 'Graduação', url_img: 'http://200.137.132.113/gentelella/production/images/picture.jpg', descricao: 'Ambiente Virtual de Apredizagem com os cursos de Graduação'},
    {ip: '200.137.132.164', url: 'http://www.avaneadpos.ufma.br', nome: 'Pós-Graduação', url_img: 'http://200.137.132.113/gentelella/production/images/inbox.png', descricao: 'Ambiente Virtual de Apredizagem com os cursos de Pós-Graduação'},
    {ip: '200.137.132.165', url: 'http://www.avaneadprh.ufma.br', nome: 'PRH', url_img: 'http://200.137.132.113/gentelella/production/images/img.jpg', descricao: 'Ambiente Virtual de Apredizagem com os cursos de para PRH'},
    {ip: '200.137.132.173', url: 'http://www.avaneadprojetos.ufma.br', nome: 'Projetos', url_img: 'http://200.137.132.113/gentelella/production/images/img.jpg', descricao: 'Ambiente Virtual de Apredizagem com os cursos de para projetos entre NEAD e Orgãos Públicos.'}
];

var config_ambiente = function(index){

    localStorage.setItem('ambiente', index);
}

var config_curso = function(nome){

    localStorage.setItem('curso', nome);
}

var config_disciplina = function(nome){

    localStorage.setItem('disciplina', nome);
}

var aux_info;
if(localStorage.getItem('ambiente') != null){
    aux_info = AMBIENTES[parseInt(localStorage.getItem('ambiente'))];
    var URL_API =  aux_info.url + '/api-monit/funcoes_api.php'
}else{
    var URL_API = "http://www.avanead.ufma.br/api-monit/funcoes_api.php";
    aux_info = AMBIENTES[0];    
}


function getUrlParameters(parameter, staticURL, decode){
    
    var currLocation = (staticURL.length)? staticURL : window.location.search;
    if(currLocation.search("=") < 0){
        return false;
    }
    parArr = currLocation.split("?")[1].split("&");
    returnBool = true;

    

    for(var i = 0; i < parArr.length; i++){
        parr = parArr[i].split("=");
        if(parr[0] == parameter){
            return (decode) ? decodeURIComponent(parr[1]) : parr[1];
            returnBool = true;
        }else{
            returnBool = false;            
        }
    }

    if(!returnBool) return false;  
}
//
// var perfil = function(){
//
//     var userdata = JSON.parse(sessionStorage.getItem('userdata'));
//     if(userdata == null){
//         // location.href = 'login.html';
//     }else{
//         $('.nome_user').html(userdata.usu_str_nome);
//         if(userdata.usu_str_foto != null){
//             $('.profile_pic_set').html('<img src="images/'+ userdata.usu_str_foto +'" alt="..." class="img-circle profile_img">');
//             $('.user-profile').html('<img src="images/'+ userdata.usu_str_foto +'" alt="">'+ userdata.usu_str_nome +'<span class=" fa fa-angle-down"></span>');
//         }else{
//             $('.user-profile').html('<img src="images/user.png" alt="">'+ userdata.usu_str_nome +'<span class=" fa fa-angle-down"></span>');
//         }
//     }
// }

var logout = function(){
    sessionStorage.removeItem("userdata");
}

var buttonCommon = {
    exportOptions: {
        format: {
            body: function ( data, row, column, node ) {
                // Strip $ from salary column to make it numeric
                return column === 5 ?
                    data.replace( /[$,]/g, '' ) :
                    data;
            }
        }
    }
};