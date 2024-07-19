<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista categorias</title>
    <!-- Incluye Tailwind CSS -->
    <link href="../../styles/tailwind.css" rel="stylesheet">
    <!-- Enlace a Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Barra de navegación -->

    <div class="container mx-auto max-w-4xl py-8">
        <!-- Encabezado -->
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Gestión de Categorías</h1>
            <a href="addCategoria.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Crear Categoría</a>
        </div>

        <!-- Tabla de Categorías -->
        <div class="bg-white shadow-md rounded my-6">
            <table class="min-w-full bg-white" id="table-categoria">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-2 px-6 text-left">ID</th>
                        <th class="py-2 px-6 text-left">Nombre de la Categoría</th>
                        <th class="py-2 px-6 text-left">Descripción</th>
                        <th class="py-2 px-6 text-left">Imagen</th>
                        <th class="py-2 px-6 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <!-- Aquí se llenarán dinámicamente los datos de las categorías -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="../../scripts/categoria/main.js"></script>
</body>
</html>
