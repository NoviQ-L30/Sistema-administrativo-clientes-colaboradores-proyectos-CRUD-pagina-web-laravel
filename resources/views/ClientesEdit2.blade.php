@vite('resources/css/app.css')
@vite('resources/js/app.js')
@vite("resources/js/dropzone.js")

<x-app-layout>

<div class="flex justify-center items-center h-screen">
    <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6" id="nombreClienteEditar">Editar Cliente</h1>
        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" id="formEditarCliente" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-6">
                <div>
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('nombre') border-red-500 @enderror" value="{{ $cliente->nombre }}" required>
            @error('nombre')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="apellido" class="block text-gray-700 font-bold mb-2">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('apellido') border-red-500 @enderror" value="{{ $cliente->apellido }}" required>
            @error('apellido')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="username" class="block text-gray-700 font-bold mb-2">Nombre de usuario</label>
            <input type="text" name="username" id="username" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('username') border-red-500 @enderror" value="{{ $cliente->username }}" required>
            @error('username')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Correo electronico</label>
            <input type="text" name="email" id="email" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('email') border-red-500 @enderror" value="{{ $cliente->email }}" required>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="telefono" class="block text-gray-700 font-bold mb-2">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('telefono') border-red-500 @enderror" value="{{ $cliente->telefono }}" required>
            @error('telefono')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="nombre_empresa" class="block text-gray-700 font-bold mb-2">Empresa</label>
            <input type="text" name="nombre_empresa" id="nombre_empresa" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('nombre_empresa') border-red-500 @enderror" value="{{ $cliente->nombre_empresa }}" required>
            @error('nombre_empresa')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
        </div>

        <div class="mt-4">
            <a href="{{'/ClientesN'}}" class="text-blue-500 hover:underline">Regresar</a>
        </div>
    </div>
</div>


            <script>
                // Código de configuración de Dropzone
            
                // Evento para eliminar la imagen actual
                const eliminarImagenButton = document.getElementById('eliminarImagen');
                const eliminarImagenInput = document.getElementById('eliminar_imagen');
            
                eliminarImagenButton.addEventListener('click', function () {
                    if (confirm('¿Estás seguro de que deseas eliminar la imagen?')) {
                        eliminarImagenInput.value = '1';
                        // Ocultar el botón de eliminar imagen
                        eliminarImagenButton.style.display = 'none';
                        // Eliminar la imagen previamente mostrada
                        document.querySelector('.max-h-40').remove();
                    }
                });
            </script>
</x-app-layout>