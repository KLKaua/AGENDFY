// funcao para abrir e fechar formulario solitado {login}
//                                                {cadastro}
function showForm(formId){
document.querySelectorAll(".form-box").forEach(form =>form.classList.remove("active"));
document.getElementById(formId).classList.add("active");
}