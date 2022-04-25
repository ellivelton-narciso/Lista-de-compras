const formCad = document.querySelector('.form-cad');
const formList = document.querySelector('.form-list');
const mostrarCad = formCad.style.display = 'none';
const mostrarList = formList.style.display = 'none';


//Funções
function abrirCadastro() {
    formCad.style.display = 'block';
    formList.style.display = 'none';

}
function abrirListar() {
    formList.style.display = 'block';
    formCad.style.display = 'none';
}