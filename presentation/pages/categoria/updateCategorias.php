<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Categoría</title>
    <!-- Incluye Tailwind CSS -->
    <link href="../../styles/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="w-full max-w-xs mx-auto mt-10">
        <form id="updateCategoriaForm" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <input type="hidden" id="idCategoria">
            <div class="mb-4">
                <label for="nombreCategoria" class="block text-gray-700 text-sm font-bold mb-2">Nombre de la categoría:</label>
                <input type="text" id="nombreCategoria" name="nombreCategoria" placeholder="Ingrese el nombre de la categoría" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="descripcionCategoria" class="block text-gray-700 text-sm font-bold mb-2">Descripción de la categoría:</label>
                <input type="text" id="descripcionCategoria" name="descripcionCategoria" placeholder="Ingrese la descripción de la categoría" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="imagenCategoria" class="block text-gray-700 text-sm font-bold mb-2">Imagen de la categoría:</label>
                <input type="text" id="imagenCategoria" name="imagenCategoria" placeholder="Ingrese la URL de la imagen de la categoría" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Actualizar
                </button>
            </div>
        </form>
    </div>

    <script src="../../scripts/categoria/update-categorias.js"></script>
</body>
</html>
