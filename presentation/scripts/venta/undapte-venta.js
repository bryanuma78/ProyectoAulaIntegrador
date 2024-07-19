window.addEventListener('message', (event) => {
    const venta = event.data;
    document.getElementById('idVenta').value = venta.id;
    document.getElementById('clienteId').value = venta.cliente_id;
    document.getElementById('productoId').value = venta.producto_id;
    document.getElementById('cantidad').value = venta.cantidad;
    document.getElementById('fecha').value = venta.fecha;
});

const updateVentaForm = document.getElementById('updateVentaForm');
updateVentaForm.addEventListener('submit', (event) => {
    event.preventDefault();
    updateVenta(event);
});

async function updateVenta(event) {
    const idVenta = document.getElementById('idVenta').value;
    const clienteId = document.getElementById('clienteId').value;
    const productoId = document.getElementById('productoId').value;
    const cantidad = document.getElementById('cantidad').value;
    const fecha = document.getElementById('fecha').value;

    const formData = new URLSearchParams();
    formData.append('id', idVenta);
    formData.append('cliente_id', clienteId);
    formData.append('producto_id', productoId);
    formData.append('cantidad', cantidad);
    formData.append('fecha', fecha);

    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swventas.php', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: formData.toString()
        });

        if (response.ok) {
            console.log('Venta actualizada exitosamente');
            window.close(); // Cierra la ventana después de actualizar la venta
        } else {
            console.error('Error al actualizar la venta:', response.statusText);
        }
    } catch (error) {
        console.error('Error al actualizar la venta:', error);
    }
}
