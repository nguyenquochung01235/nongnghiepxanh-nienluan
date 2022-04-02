/**
 * TOGGLE USER LIST
 * */
 const btnElement = document.querySelector('.avatar.btn');
 const listElement = document.querySelector('.header__list');
 const headerLinkElements = document.querySelectorAll('.header__link');
 const handleBtnClick = e => {
   e.stopPropagation();
   listElement.classList.toggle('show');
 };
 const handleLinkClick = e => {
   e.stopPropagation();
   listElement.classList.toggle('show');
 };
 const handleWindowClick = () => {
   listElement.className = 'header__list';
 };
 const handleListClick = e => {
   e.stopPropagation();
 };
 btnElement.addEventListener('click', handleBtnClick);
 headerLinkElements.forEach(headerLinkElement => {
   headerLinkElement.addEventListener('click', handleLinkClick);
 });
 window.addEventListener('click', handleWindowClick);
 listElement.addEventListener('click', handleListClick);
 