//    Funções utilizadas na pagina home  //
//    O js foi utilizado nesse caso porque é uma tag <button>
//    no momento da criação não foi encontrado um modo próprio do CODEIGNITER para fazer esse redirecionamento com um botão  

const buttonLogout = document.querySelector("#bLogout");
const buttonCrud = document.querySelector("#bCRUD");
const buttonVoltar = document.querySelector("#bVoltar");

buttonLogout.addEventListener("click", function () {
   window.location.href = "/logout";
});
buttonCrud.addEventListener("click", function () {
   window.location.href = "/books";
});

