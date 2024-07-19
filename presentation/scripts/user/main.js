
async function getUsers() {

    try {
      const response = await fetch('http://localhost/BASICOS/businessLogic/swusuarios.php');
      const data = await response.json();
  
      const users = data;
  
      const tableBody = document.querySelector('#table-user tbody');
      tableBody.innerHTML = '';
      let cont=1
  
      users.forEach(user => {
       
        // Create table row
        const row = document.createElement('tr');
  
        // Create cells for each user property
        const id = document.createElement('td');
        id.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
        id.textContent = cont;
        cont++;
  
        const name = document.createElement('td');
        name.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
        name.textContent = user.nombre;
  
        const lastname = document.createElement('td');
        lastname.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
        lastname.textContent = user.apellido;

        const email = document.createElement('td');
        email.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
        email.textContent = user.correo;



        const accountType = document.createElement('td');
        accountType.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
        accountType.textContent = user.tipo_cuenta;
  
        // Create action cell with icons
        const actionsCell = document.createElement('td');
  
        // edit icon
        const editIcon = document.createElement('i');
        editIcon.classList.add('fas', 'fa-edit', 'text-blue-500', 'cursor-pointer', 'mr-2');
        editIcon.setAttribute('title', 'Editar');
        editIcon.addEventListener('click', () => openEditForm(user));
  
        // delete icon
        const deleteIcon = document.createElement('i');
        deleteIcon.classList.add('fas', 'fa-trash-alt', 'text-red-500', 'cursor-pointer', 'mr-2');
        deleteIcon.setAttribute('title', 'Eliminar');
        deleteIcon.addEventListener('click', () => deleteUser(user.id));
  

  
        // Add icons to the action cell
        actionsCell.appendChild(editIcon);
        actionsCell.appendChild(deleteIcon);
       
  
        // Add cells to row
        row.appendChild(id);
        row.appendChild(name);
        row.appendChild(lastname);
        row.appendChild(email);
        row.appendChild(accountType);
        row.appendChild(actionsCell);
  
        // Add row to table
        tableBody.appendChild(row);
      });
  
    } catch (error) {
      console.error('Error al obtener usuarios:', error);
    }
  }
  
  // user delete function
  async function deleteUser(userId) {
    const confirmDelete = confirm('¿Estás seguro de que deseas eliminar este usuario?');
    if (confirmDelete) {
      try {
        const response = await fetch(`http://localhost/BASICOS/businessLogic/swusuarios.php?id=${userId}`, {
          method: 'DELETE'
        });
        getUsers();
      } catch (error) {
        console.error('Error al eliminar el usuario:', error);
      }
    }
  }
  
  //Open Update form
  
  function openEditForm(user) {
    const newWindow = window.open('../user/updateUser.php', '_blank', 'width=600,height=600');
  
    newWindow.onload = function() {
      newWindow.postMessage(user, '*');
    };
  
    newWindow.onbeforeunload = function() {
      getUsers();
    };
  }
  

  

  
  document.addEventListener('DOMContentLoaded', getUsers);