console.log("Hola");

const productoForm = document.getElementById('productoform');
productoForm.addEventListener('submit', (event) => {
    event.preventDefault();
    addProducto(event);
});

async function addProducto(event) {
    const nombreProducto = document.getElementById('nombreProducto').value;
    const precioProducto = document.getElementById('precioProducto').value;
    const descripcionProducto = document.getElementById('descripcionProducto').value;
    const imagenProducto = document.getElementById('imagenProducto').value;

    const formData = new FormData();
    formData.append('nombre_producto', nombreProducto);
    formData.append('precio_producto', precioProducto);
    formData.append('descripcion_producto', descripcionProducto);
    formData.append('imagen_producto', imagenProducto);

    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swproductos.php', {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            console.log('Producto agregado exitosamente');
            getProductos(); // Actualiza la lista de productos después de agregar uno nuevo
        } else {
            console.error('Error al agregar producto:', response.statusText);
        }
    } catch (error) {
        console.error('Error al agregar producto:', error);
    }
}
