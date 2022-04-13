const dropdown = document.querySelector('.nav__dropdown');
const activeLink = document.querySelector('.nav__dropdown > .nav__link');

dropdown.addEventListener('mouseover', () => {
  activeLink.classList.add('active');
});

dropdown.addEventListener('mouseout', () => {
  const activeLinks = document.querySelectorAll('.header__nav .link.active');
  if (activeLinks.length > 1) activeLink.classList.remove('active');
});