//    botão de logout da view HOME //
const buttonLogout = document.querySelector("#bLogout");
buttonLogout.addEventListener("click", function() {
   //    O js foi utilizado nesse caso porque é uma tag <button>
   //    no momento da criação não foi encontrado um modo próprio do CODEIGNITER para fazer esse redirecionamento com um botão  
   window.location.href = "/logout";
});