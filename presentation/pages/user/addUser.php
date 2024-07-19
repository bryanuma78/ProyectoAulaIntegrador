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
        <form id="userform" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label for="nameUser" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                <input type="text" id="nameUser" name="nameUser" placeholder="Ingrese su nombre" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="lastnameUser" class="block text-gray-700 text-sm font-bold mb-2">Apellido:</label>
                <input type="text" id="lastnameUser" name="lastnameUser" placeholder="Ingrese su apellido" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="emailUser" class="block text-gray-700 text-sm font-bold mb-2">Correo electrónico:</label>
                <input type="email" id="emailUser" name="emailUser" placeholder="Ingrese su correo electrónico" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-4">
                <label for="passwordUser" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
                <input type="password" id="passwordUser" name="passwordUser" placeholder="Ingrese su contraseña" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="accountType" class="block text-gray-700 text-sm font-bold mb-2">Tipo de cuenta:</label>
                <select id="accountType" name="accountType" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Seleccione un tipo de cuenta</option>
                    <option value="admin">Administrador</option>
                    <option value="user">Usuario</option>
                </select>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Enviar
                </button>
            </div>
        </form>
    </div>

    <script src="../../scripts/user/add-User.js"></script>
</body>
</html>

