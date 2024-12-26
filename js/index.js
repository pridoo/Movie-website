const movie_btn = document.querySelector('.selection_movie');
const package_btn = document.querySelector('.selection_package');
const movie_section = document.querySelector('.movies_sec');
const package_section = document.querySelector('.packages_sec');

movie_btn.addEventListener('click', () =>{
    package_section.classList.remove('isActive');
    package_section.classList.add('isNotActive');
    movie_section.classList.remove('isNotActive');
    movie_section.classList.add('isActive');

})

package_btn.addEventListener('click', () =>{
    movie_section.classList.remove('isActive');
    movie_section.classList.add('isNotActive');
    package_section.classList.remove('isNotActive');
    package_section.classList.add('isActive');

})