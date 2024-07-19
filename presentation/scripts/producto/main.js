console.log("Hola");

async function getProductos() {
    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swproductos.php');
        const data = await response.json();

        const productos = data;

        const tableBody = document.querySelector('#table-producto tbody');
        tableBody.innerHTML = '';
        let cont = 1;

        productos.forEach(producto => {
            const row = document.createElement('tr');

            const id = document.createElement('td');
            id.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            id.textContent = cont;
            cont++;

            const nombre = document.createElement('td');
            nombre.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            nombre.textContent = producto.nombre_producto;

            const precio = document.createElement('td');
            precio.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            precio.textContent = producto.precio_producto;

            const descripcion = document.createElement('td');
            descripcion.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            descripcion.textContent = producto.descripcion_producto;

            const imagen = document.createElement('td');
            imagen.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            imagen.textContent = producto.imagen_producto;

            const actionsCell = document.createElement('td');

            const editIcon = document.createElement('i');
            editIcon.classList.add('fas', 'fa-edit', 'text-blue-500', 'cursor-pointer', 'mr-2');
            editIcon.setAttribute('title', 'Editar');
            editIcon.addEventListener('click', () => openEditForm(producto));

            const deleteIcon = document.createElement('i');
            deleteIcon.classList.add('fas', 'fa-trash-alt', 'text-red-500', 'cursor-pointer', 'mr-2');
            deleteIcon.setAttribute('title', 'Eliminar');
            deleteIcon.addEventListener('click', () => deleteProducto(producto.id_producto));

            const photoIcon = document.createElement('i');
            photoIcon.classList.add('fa-regular', 'fa-file-image', 'text-green-500', 'cursor-pointer');
            photoIcon.setAttribute('title', 'Foto de Producto');
            photoIcon.addEventListener('click', () => showProductoImage(producto.imagen_producto));

            actionsCell.appendChild(editIcon);
            actionsCell.appendChild(deleteIcon);
            actionsCell.appendChild(photoIcon);

            row.appendChild(id);
            row.appendChild(nombre);
            row.appendChild(precio);
            row.appendChild(descripcion);
            row.appendChild(imagen);
            row.appendChild(actionsCell);

            tableBody.appendChild(row);
        });

    } catch (error) {
        console.error('Error al obtener productos:', error);
    }
}

async function deleteProducto(productoId) {
    const confirmDelete = confirm('¿Estás seguro de que deseas eliminar este producto?');
    if (confirmDelete) {
        try {
            const formData = new URLSearchParams();
            formData.append('id', productoId);

            const response = await fetch(`http://localhost/BASICOS/businessLogic/swproductos.php`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: formData.toString()
            });

            if (response.ok) {
                console.log('Producto eliminado exitosamente');
                getProductos(); // Actualiza la lista de productos después de eliminar uno
            } else {
                console.error('Error al eliminar el producto:', response.statusText);
            }
        } catch (error) {
            console.error('Error al eliminar el producto:', error);
        }
    }
}

function openEditForm(producto) {
    const newWindow = window.open('../producto/updateProducto.php', '_blank', 'width=600,height=600');

    newWindow.onload = function() {
        newWindow.postMessage(producto, '*');
    };

    newWindow.onbeforeunload = function() {
        getProductos();
    };
}

async function showProductoImage(imagenProducto) {
    const imageUrl = "../../../businessLogic/" + imagenProducto;

    const newWindow = window.open('', '_blank', 'width=600,height=600');
    newWindow.document.write(`
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Foto de Producto</title>
            <style>
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    margin: 0;
                    background-color: #f0f0f0;
                }
                img {
                    max-width: 100%;
                    max-height: 100%;
                }
            </style>
        </head>
        <body>
            <img src="${imageUrl}" alt="Foto de Producto">
        </body>
        </html>
    `);
    newWindow.document.close();
}

document.addEventListener('DOMContentLoaded', getProductos);
