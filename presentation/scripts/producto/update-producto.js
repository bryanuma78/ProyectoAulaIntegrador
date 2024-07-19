window.addEventListener('message', (event) => {
    const producto = event.data;
    document.getElementById('idProducto').value = producto.id;
    document.getElementById('nombreProducto').value = producto.nombre_producto;
    document.getElementById('precioProducto').value = producto.precio_producto;
    document.getElementById('descripcionProducto').value = producto.descripcion_producto;
    document.getElementById('imagenProducto').value = producto.imagen_producto;
});

const updateProductoForm = document.getElementById('updateProductoForm');
updateProductoForm.addEventListener('submit', (event) => {
    event.preventDefault();
    updateProducto(event);
});

async function updateProducto(event) {
    const idProducto = document.getElementById('idProducto').value;
    const nombreProducto = document.getElementById('nombreProducto').value;
    const precioProducto = document.getElementById('precioProducto').value;
    const descripcionProducto = document.getElementById('descripcionProducto').value;
    const imagenProducto = document.getElementById('imagenProducto').value;

    const formData = new URLSearchParams();
    formData.append('id', idProducto);
    formData.append('nombre_producto', nombreProducto);
    formData.append('precio_producto', precioProducto);
    formData.append('descripcion_producto', descripcionProducto);
    formData.append('imagen_producto', imagenProducto);

    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swproductos.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: formData.toString()
        });

        if (response.ok) {
            console.log('Producto actualizado exitosamente');
            window.close(); // Cierra la ventana después de actualizar el producto
        } else {
            console.error('Error al actualizar el producto:', response.statusText);
        }
    } catch (error) {
        console.error('Error al actualizar el producto:', error);
    }
}
