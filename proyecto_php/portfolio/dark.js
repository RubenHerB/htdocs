//Esta primera parte define el "boton" que se usa para seleccionar el modo oscuro como una cariable chckbox
try {      
var checkBox = document.getElementById('darkmode-toggle');
}catch(e) {}
var theme = window.localStorage.getItem('data-bs-theme');
if(theme) {document.getElementById('bd').setAttribute('dat-bs-theme', theme);}
else{
  if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
    window.localStorage.setItem('data-bs-theme', 'dark');
    theme="dark";
}}
try{
checkBox.checked = (theme == 'dark' )? true : false;}catch(e) {}
if (theme == 'dark') document.getElementById('bd').setAttribute('data-bs-theme', 'dark');




checkBox.addEventListener('change', function () {
  if(this.checked){
    document.getElementById('bd').setAttribute('data-bs-theme', 'dark');
    window.localStorage.setItem('data-bs-theme', 'dark');
  } else {
    document.getElementById('bd').setAttribute('data-bs-theme', 'light');
    window.localStorage.setItem('data-bs-theme', 'light');
  }
});