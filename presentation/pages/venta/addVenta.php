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
        <form id="ventaform" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label for="clienteId" class="block text-gray-700 text-sm font-bold mb-2">Cliente ID:</label>
                <input type="number" id="clienteId" name="clienteId" placeholder="Ingrese el ID del cliente" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="productoId" class="block text-gray-700 text-sm font-bold mb-2">Producto ID:</label>
                <input type="number" id="productoId" name="productoId" placeholder="Ingrese el ID del producto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="cantidad" class="block text-gray-700 text-sm font-bold mb-2">Cantidad:</label>
                <input type="number" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="fecha" class="block text-gray-700 text-sm font-bold mb-2">Fecha:</label>
                <input type="date" id="fecha" name="fecha" placeholder="Ingrese la fecha" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Enviar
                </button>
            </div>
        </form>
    </div>

    <script src="../../scripts/venta/add-venta.js"></script>
</body>
</html>
