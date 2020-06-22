import '../sass/main.scss';

const menuItems = document.querySelectorAll('ul.topics li.isParent > a');

function toggleIcon(icon) {
  if (icon.classList.contains('fa-angle-up')) {
    icon.classList.remove('fa-angle-up')
    icon.classList.add('fa-angle-down')
  } else {
    icon.classList.add('fa-angle-up')
    icon.classList.remove('fa-angle-down')
  }
}

menuItems.forEach(e => {
  e.addEventListener('click', event => {
    event.preventDefault();
    const icon = e.querySelector('i.fa');

    if (e.parentElement.classList.contains('parent') && !e.parentElement.classList.contains('active')) {
      e.parentElement.classList.remove('parent');
    } else {
      e.parentElement.classList.toggle('parent');
      e.parentElement.classList.toggle('visited');
    }

    toggleIcon(icon);
  });
});
