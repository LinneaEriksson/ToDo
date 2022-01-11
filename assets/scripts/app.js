function addClassToEditField() {
  const editListForm = document.querySelector('.editListForm');
  editListForm.classList.toggle('hidden');
}

const btnEditLists = document.querySelector('.btnEditLists');

btnEditLists.addEventListener('click', addClassToEditField);
