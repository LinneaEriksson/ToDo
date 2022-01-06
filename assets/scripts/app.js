console.log('Hello World');

function addClassToEditField() {
  const element = document.querySelector('mb-3"');
  element.classList.add('.hidden');
}

const btnEditLists = document.querySelector('.btnEditLists');

btnEditLists.addEventListener('click', function (e) {
  addClassToEditField();
});
