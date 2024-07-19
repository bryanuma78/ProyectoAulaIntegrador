console.log("Hola");

async function getCategorias() {
    try {
        const response = await fetch('http://localhost/BASICOS/businessLogic/swcategorias.php');
        const data = await response.json();

        const categorias = data;

        const tableBody = document.querySelector('#table-categoria tbody');
        tableBody.innerHTML = '';
        let cont = 1;

        categorias.forEach(categoria => {
            const row = document.createElement('tr');

            const id = document.createElement('td');
            id.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            id.textContent = cont;
            cont++;

            const nombre = document.createElement('td');
            nombre.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            nombre.textContent = categoria.nombre_categoria;

            const descripcion = document.createElement('td');
            descripcion.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            descripcion.textContent = categoria.descripcion_categoria;

            const imagen = document.createElement('td');
            imagen.classList.add('py-3', 'px-6', 'text-left', 'whitespace-nowrap');
            imagen.textContent = categoria.imagen_categoria;

            const actionsCell = document.createElement('td');

            const editIcon = document.createElement('i');
            editIcon.classList.add('fas', 'fa-edit', 'text-blue-500', 'cursor-pointer', 'mr-2');
            editIcon.setAttribute('title', 'Editar');
            editIcon.addEventListener('click', () => openEditForm(categoria));

            const deleteIcon = document.createElement('i');
            deleteIcon.classList.add('fas', 'fa-trash-alt', 'text-red-500', 'cursor-pointer', 'mr-2');
            deleteIcon.setAttribute('title', 'Eliminar');
            deleteIcon.addEventListener('click', () => deleteCategoria(categoria.id));

            const photoIcon = document.createElement('i');
            photoIcon.classList.add('fa-regular', 'fa-file-image', 'text-green-500', 'cursor-pointer');
            photoIcon.setAttribute('title', 'Ver Imagen');
            photoIcon.addEventListener('click', () => showCategoriaImage(categoria.imagen_categoria));

            actionsCell.appendChild(editIcon);
            actionsCell.appendChild(deleteIcon);
            actionsCell.appendChild(photoIcon);

            row.appendChild(id);
            row.appendChild(nombre);
            row.appendChild(descripcion);
            row.appendChild(imagen);
            row.appendChild(actionsCell);

            tableBody.appendChild(row);
        });

    } catch (error) {
        console.error('Error al obtener categorías:', error);
    }
}

async function deleteCategoria(categoriaId) {
    const confirmDelete = confirm('¿Estás seguro de que deseas eliminar esta categoría?');
    if (confirmDelete) {
        try {
            const formData = new URLSearchParams();
            formData.append('id', categoriaId);

            const response = await fetch(`http://localhost/BASICOS/businessLogic/swcategorias.php`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: formData.toString()
            });
            getCategorias();
        } catch (error) {
            console.error('Error al eliminar la categoría:', error);
        }
    }
}

function openEditForm(categoria) {
    
    const newWindow = window.open('../categoria/updateCategorias.php', '_blank', 'width=600,height=600');

    newWindow.onload = function() {
        newWindow.postMessage(categoria, '*');
    };

    newWindow.onbeforeunload = function() {
        getCategorias();
    };
}

async function showCategoriaImage(imagenCategoria) {
    const imageUrl = "../../../businessLogic/" + imagenCategoria;

    const newWindow = window.open('', '_blank', 'width=600,height=600');
    newWindow.document.write(`
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Imagen de Categoría</title>
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
            <img src="${imageUrl}" alt="Imagen de Categoría">
        </body>
        </html>
    `);
    newWindow.document.close();
}

document.addEventListener('DOMContentLoaded', getCategorias);
