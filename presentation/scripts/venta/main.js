console.log("Hola");

async function getVentas() {
    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swventas.php');
        const data = await response.json();

        const ventas = data;

        const tableBody = document.querySelector('#table-venta tbody');
        tableBody.innerHTML = '';
        let cont = 1;

        ventas.forEach(venta => {
            const row = document.createElement('tr');

            const id = document.createElement('td');
            id.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            id.textContent = cont;
            cont++;

            const clienteid = document.createElement('td');
            clienteid.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            clienteId.textContent = venta.cliente_id;

            const productoid = document.createElement('td');
            productoid.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            productoid.textContent = venta.producto_id;

            const cantidad = document.createElement('td');
            cantidad.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            cantidad.textContent = venta.cantidad;

            const fecha = document.createElement('td');
            fecha.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            fecha.textContent = venta.fecha;

            const actionsCell = document.createElement('td');

            const editIcon = document.createElement('i');
            editIcon.classList.add('fas', 'fa-edit', 'text-blue-500', 'cursor-pointer', 'mr-2');
            editIcon.setAttribute('title', 'Editar');
            editIcon.addEventListener('click', () => openEditForm(venta));

            const deleteIcon = document.createElement('i');
            deleteIcon.classList.add('fas', 'fa-trash-alt', 'text-red-500', 'cursor-pointer', 'mr-2');
            deleteIcon.setAttribute('title', 'Eliminar');
            deleteIcon.addEventListener('click', () => deleteVenta(venta.id));

            actionsCell.appendChild(editIcon);
            actionsCell.appendChild(deleteIcon);

            row.appendChild(id);
            row.appendChild(clienteid);
            row.appendChild(productoid);
            row.appendChild(cantidad);
            row.appendChild(fecha);
            row.appendChild(actionsCell);

            tableBody.appendChild(row);
        });

    } catch (error) {
        console.error('Error al obtener ventas:', error);
    }
}

async function deleteVenta(ventaId) {
    const confirmDelete = confirm('¿Estás seguro de que deseas eliminar esta venta?');
    if (confirmDelete) {
        try {
            const formData = new URLSearchParams();
            formData.append('id', ventaId);

            const response = await fetch(`http://localhost/BASICOS/businessLogic/swventas.php`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: formData.toString()
            });
            getVentas();
        } catch (error) {
            console.error('Error al eliminar la venta:', error);
        }
    }
}

function openEditForm(venta) {
    const newWindow = window.open('../venta/updateVenta.php', '_blank', 'width=600,height=600');

    newWindow.onload = function() {
        newWindow.postMessage(venta, '*');
    };

    newWindow.onbeforeunload = function() {
        getVentas();
    };
}

document.addEventListener('DOMContentLoaded', getVentas);
