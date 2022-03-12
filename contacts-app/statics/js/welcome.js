//Este js file ajusta la imagen de fondo del index
//Ajusta la imagen al tamañp de view width

//NOTA: este file debemos cargarlo solo cunado estamos en  el index de la pagina. para essodebemos indentificar la ruta en el header

const navbar = document.querySelector(".navbar");
const welcome = document.querySelector(".welcome");
const vavbarToggle = document.querySelector("#navbarNav");

const resizeBackgroundImg = () => {
    const height = window.innerHeight - navbar.clientHeight;
    welcome.style.height = `${height}px`;
};

vavbarToggle.ontransitionend = resizeBackgroundImg;
vavbarToggle.ontransitionstart = resizeBackgroundImg;
window.onresize = resizeBackgroundImg;
window.onload = resizeBackgroundImg;


