console.log("Hola");

const ventaForm = document.getElementById('ventaform');
ventaForm.addEventListener('submit', (event) => {
    event.preventDefault();
    addVenta(event);
});

async function addVenta(event) {
    const clienteId = document.getElementById('clienteId').value;
    const productoId = document.getElementById('productoId').value;
    const cantidad = document.getElementById('cantidad').value;
    const fecha = document.getElementById('fecha').value;

    const formData = new FormData();
    formData.append('cliente_id', clienteId);
    formData.append('producto_id', productoId);
    formData.append('cantidad', cantidad);
    formData.append('fecha', fecha);

    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swventas.php', {
            method: 'POST',
            body: formData
        });

        if (response.ok) {
            console.log('Venta agregada exitosamente');
            getVentas(); // Actualiza la lista de ventas después de agregar una nueva
        } else {
            console.error('Error al agregar venta:', response.statusText);
        }
    } catch (error) {
        console.error('Error al agregar venta:', error);
    }
}
