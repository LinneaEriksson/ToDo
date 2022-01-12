// Add class hidden to edit list form.

function addClassToEditFieldLists() {
  const editListForm = document.querySelector('.editListForm');
  editListForm.classList.toggle('hidden');
}

const btnEditLists = document.querySelector('.btnEditLists');
btnEditLists.addEventListener('click', addClassToEditFieldLists);

// Add class hidden to edit task form.

function addClassToEditFieldTasks() {
  const editTaskForm = document.querySelector('.editTaskForm');
  editTaskForm.classList.toggle('hidden');
}

const btnEditTasks = document.querySelector('.btnEditTasks');
btnEditTasks.addEventListener('click', addClassToEditFieldTasks);

// Add class hidden to add task form

function addClassToAddFieldTask() {
  const addTaskForm = document.querySelector('.newTaskDiv');
  addTaskForm.classList.toggle('hidden');
}

const btnAddTask = document.querySelector('.btnAddTask');
btnAddTask.addEventListener('click', addClassToAddFieldTask);
