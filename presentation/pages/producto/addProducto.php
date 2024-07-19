<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con Tailwind CSS</title>
    <!-- Incluye Tailwind CSS -->
    <link href="../../styles/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="w-full max-w-xs mx-auto mt-10">
        <form id="productoform" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label for="nombreProducto" class="block text-gray-700 text-sm font-bold mb-2">Nombre del producto:</label>
                <input type="text" id="nombreProducto" name="nombreProducto" placeholder="Ingrese el nombre del producto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="precioProducto" class="block text-gray-700 text-sm font-bold mb-2">Precio del producto:</label>
                <input type="number" id="precioProducto" name="precioProducto" placeholder="Ingrese el precio del producto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="descripcionProducto" class="block text-gray-700 text-sm font-bold mb-2">Descripción del producto:</label>
                <input type="text" id="descripcionProducto" name="descripcionProducto" placeholder="Ingrese la descripción del producto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
    <label for="imagenProducto" class="block text-gray-700 text-sm font-bold mb-2">Imagen del Producto:</label>
    <input type="file" id="imagenProducto" name="imagenProducto"
        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
</div>

<div class="flex items-center justify-between">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Enviar
    </button>
</div>


    <script src="../../scripts/producto/add-producto.js"></script>
</body>
</html>
