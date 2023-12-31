const btnProductsOpen = document.querySelector('.showProducts');
const modalWindowProducts = document.querySelector('#modalWindowProducts');

const modalWindowRegister = document.querySelector('#modalWindowRegistry');
const modalWindowAuth = document.querySelector('#modalWindowAuth');

const btnRegisterOpen = document.querySelector('.register');
const btnAuthOpen = document.querySelector('.auth');
const btnLogout = document.querySelector('.exit');

const inputLoginForRegister = document.querySelector('.registerLogin');
const inputEmailForRegister = document.querySelector('.registerEmail');
const passwordRegister1 = document.querySelector('#firstPass');
const passwordRegister2 = document.querySelector('#secondPass');
const checkboxRegister = document.querySelector('#forCheck');
const submitForRegister = document.querySelector('#submitForRegister');

const closeModalAuth = document.querySelector('#closeModalAuth');
const closeModalRegistry = document.querySelector('#closeModalRegistry');

const sliderPhotosDiv = document.querySelector('.sliderPhotos');

btnRegisterOpen.addEventListener('click', ()=>{
    modalWindowAuth.style.display = 'none';
    modalWindowProducts.style.display = 'none';
    modalWindowRegister.style.display = 'block';
});

btnAuthOpen.addEventListener('click', ()=>{
    modalWindowRegister.style.display = 'none';
    modalWindowProducts.style.display = 'none';
    modalWindowAuth.style.display = 'block';
});

closeModalAuth.addEventListener('click', ()=>{
    modalWindowAuth.style.display = 'none';
});
closeModalRegistry.addEventListener('click', ()=>{
    modalWindowRegister.style.display = 'none';
});

btnProductsOpen.addEventListener('click', ()=>{
    modalWindowAuth.style.display = 'none';
    modalWindowRegister.style.display = 'none';
    modalWindowProducts.style.display = 'block';
});