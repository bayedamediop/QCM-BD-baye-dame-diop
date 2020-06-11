
function fileContentLoader(target, fileName, data={nom:0}){
    target.load(`../src/${fileName}`,data,function(response, status,detail){
         if(status === 'error'){
            $("#table").html(`<p class="text-center alert alert-danger col">Le contenu demandé est introuvable!</p>`);
            //ou bien
            // $("#table").html(`<p class="text-center alert alert-danger col">Code Erreur : ${detail.status}, ${detail.statusText}</p>`);
        }
    });
}
//Events
$(document).ready(function(){
    const form = $('#form');
    const tableQ = $('#tableQ');
    const table = $('#table');
    const reponse = $('#reponse');

    fileContentLoader(form,'creer_question.php');
    fileContentLoader(reponse,'reponse.php');
 //       alert('form oki');
    fileContentLoader(table,'table.php');
    fileContentLoader(tableQ,'tableQ.php');
})

//Link
// $('.nav-link').click(function(e){
//     const form = $('#form');
//     const table = $('#table');
//     if(e.target.id === 'accueil'){
//         fileContentLoader(form,'formAdd.php');
//         fileContentLoader(table,'table.php',{nom:1});
//     }else if(e.target.id === 'historique'){
//         fileContentLoader(form,'formSearch.php');
//         fileContentLoader(table,'table.php');
//     }
// });
