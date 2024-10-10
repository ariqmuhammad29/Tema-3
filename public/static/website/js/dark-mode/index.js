const checkbox = document.querySelector('#toggle-dark');
const html = document.querySelector('html');

checkbox.addEventListener('click', function(){
    checkbox.checked ? html.classList.add('dark') : html.classList.remove('dark');
})



    tailwind.config = {
        darkMode: 'class',
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  