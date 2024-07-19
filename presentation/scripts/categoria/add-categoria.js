console.log("Hola");

const categoriaForm = document.getElementById('categoriaform'); // Asegúrate de que el ID coincida con el formulario HTML
categoriaForm.addEventListener('submit', (event) => {
    event.preventDefault();
    addCategoria(event);
});

async function addCategoria(event) {
    const nombreCategoria = document.getElementById('nombreCategoria').value;
    const descripcionCategoria = document.getElementById('descripcionCategoria').value;
    const imagenCategoria = document.getElementById('imagenCategoria').value;

    const formData = new FormData();
    formData.append('nombre_categoria', nombreCategoria); // Asegúrate de que los nombres coincidan con los campos de la base de datos
    formData.append('descripcion_categoria', descripcionCategoria);
    formData.append('imagen_categoria', imagenCategoria);

    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swcategorias.php', {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            console.log('Categoría agregada exitosamente');
            getCategorias(); // Actualiza la lista de categorías después de agregar una nueva
        } else {
            console.error('Error al agregar categoría:', response.statusText);
        }
    } catch (error) {
        console.error('Error al agregar categoría:', error);
    }
}
