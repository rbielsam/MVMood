let body = document.body;
//let modeButton = document.getElementsByClassName('mode-button');
let modeButton = document.getElementById('mode-icon');

body.classList.toggle('dark-mode', localStorage.getItem('mode') === 'dark');

modeButton.addEventListener('click', () => {
    const isDark = body.classList.toggle('dark-mode');
    localStorage.setItem('mode', isDark ? 'dark' : 'light');
});