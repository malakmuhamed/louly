const ThemeToggler=document.querySelector(".theme-toggler")

ThemeToggler.addEventListener('click',() =>{
    document.body.classList.toggle('dark-theme-variables');
    ThemeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
    ThemeToggler.querySelector('span:nth-child(2)').classList.toggle('active');
})