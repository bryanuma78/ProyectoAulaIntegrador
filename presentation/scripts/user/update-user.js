console.log("HOLA")
window.addEventListener('message', (event) => {
    const user = event.data;
    document.getElementById('nameUser').value = user.nombre;
    document.getElementById('lastnameUser').value = user.apellido;
    document.getElementById('emailUser').value = user.correo;
    document.getElementById('passwordUser').value = user.contrasenia;
    document.getElementById('accountType').value = user.tipo_cuenta;
});



async function updateUser(event) {
    event.preventDefault();
    const id = document.getElementById('idUser').value;
    const name = document.getElementById('nameUser').value;
    const lastName = document.getElementById('lastnameUser').value;
    const email = document.getElementById('emailUser').value;
    const password = document.getElementById('passwordUser').value;
    const accountType = document.getElementById('accountType').value;

    const user = {
        id: id,
        Nombre: name,
        Apellido: lastName,
        Correo: email,
        Contrasenia: password,
        Tipo_cuenta: accountType
    };

    console.log(user);

    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swusuarios.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(user)
        });
        if (response.ok) {
            alert('Usuario actualizado correctamente');
            window.close();
        } else {
            alert('Error al actualizar usuario');
        }
    } catch (error) {
        console.error('Error al actualizar usuario:', error);
    }
}

document.getElementById('updateUserForm').addEventListener('submit', updateUser);
