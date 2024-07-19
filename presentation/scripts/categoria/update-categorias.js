window.addEventListener('message', (event) => {
    const categoria = event.data;
    document.getElementById('idCategoria').value = categoria.id;
    document.getElementById('nombreCategoria').value = categoria.nombre_categoria;
    document.getElementById('descripcionCategoria').value = categoria.descripcion_categoria;
    document.getElementById('imagenCategoria').value = categoria.imagen_categoria;
});

const updateCategoriaForm = document.getElementById('updateCategoriaForm');
updateCategoriaForm.addEventListener('submit', (event) => {
    event.preventDefault();
    updateCategoria(event);
});

async function updateCategoria(event) {
    const idCategoria = document.getElementById('idCategoria').value;
    const nombreCategoria = document.getElementById('nombreCategoria').value;
    const descripcionCategoria = document.getElementById('descripcionCategoria').value;
    const imagenCategoria = document.getElementById('imagenCategoria').value;

    const formData = new URLSearchParams();
    formData.append('id', idCategoria);
    formData.append('nombre_categoria', nombreCategoria);
    formData.append('descripcion_categoria', descripcionCategoria);
    formData.append('imagen_categoria', imagenCategoria);

    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swcategorias.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: formData.toString()
        });

        if (response.ok) {
            console.log('Categoría actualizada exitosamente');
            window.close(); // Cierra la ventana después de actualizar la categoría
        } else {
            console.error('Error al actualizar la categoría:', response.statusText);
        }
    } catch (error) {
        console.error('Error al actualizar la categoría:', error);
    }
}
