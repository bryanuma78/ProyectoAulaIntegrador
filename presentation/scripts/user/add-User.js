
console.log ("Hola")

    const userForm = document.getElementById('userform'); // Asegúrate de que el ID coincida con el formulario HTML
    userForm.addEventListener('submit', (event) => {
        event.preventDefault();
        addUser(event);
    });


async function addUser(event) {
    const nameUser = document.getElementById('nameUser').value;
    const lastnameUser = document.getElementById('lastnameUser').value;
    const emailUser = document.getElementById('emailUser').value;
    const passwordUser = document.getElementById('passwordUser').value;
    const accountType = document.getElementById('accountType').value;

    const formData = new FormData();
    formData.append('nameUser', nameUser);
    formData.append('lastnameUser', lastnameUser);
    formData.append('emailUser', emailUser);
    formData.append('passwordUser', passwordUser);
    formData.append('accountType', accountType);

    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swusuarios.php', { // Asegúrate de corregir la URL
            method: 'POST',
            body: formData
        });

    } catch (error) {
        console.error('Error al agregar usuario:', error);
    }
}
