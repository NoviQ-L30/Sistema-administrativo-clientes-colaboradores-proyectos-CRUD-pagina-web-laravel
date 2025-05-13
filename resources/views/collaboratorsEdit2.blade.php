@vite('resources/css/app.css')
@vite('resources/js/app.js')
@vite("resources/js/dropzone.js")

<x-app-layout>

<div class="flex justify-center items-center h-screen">
    <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6" id="nombreColaboradorEditar">Editar Colaborador</h1>
        <form action="{{ route('collaborators.update', $collaborator->id) }}" method="POST" id="formEditarColaborador" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-bold mb-2">Nombre</label>
                        <input type="text" name="name" id="name" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('name') border-red-500 @enderror" value="{{ $collaborator->name }}" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="apellido" class="block text-gray-700 font-bold mb-2">Apellido</label>
                        <input type="text" name="apellido" id="apellido" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('apellido') border-red-500 @enderror" value="{{ $collaborator->apellido }}" required>
                        @error('apellido')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="username" class="block text-gray-700 font-bold mb-2">Nombre de Usuario</label>
                        <input type="text" name="username" id="username" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('username') border-red-500 @enderror" value="{{ $collaborator->username }}" required>
                        @error('username')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Correo Electrónico</label>
                        <input type="text" name="email" id="email" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('email') border-red-500 @enderror" value="{{ $collaborator->email }}" required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="fecha_ingreso" class="block text-gray-700 font-bold mb-2">Fecha de Ingreso</label>
                        <input type="date" name="fecha_ingreso" id="fecha_ingreso" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('fecha_ingreso') border-red-500 @enderror" value="{{ $collaborator->fecha_ingreso }}" required>
                        @error('fecha_ingreso')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="telefono" class="block text-gray-700 font-bold mb-2">Teléfono</label>
                        <input type="text" name="telefono" id="telefono" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('telefono') border-red-500 @enderror" value="{{ $collaborator->telefono }}" required>
                        @error('telefono')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="company" class="block text-gray-700 font-bold mb-2">Compañía</label>
                        <input type="text" name="company" id="company" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('company') border-red-500 @enderror" value="{{ $collaborator->company }}" required>
                        @error('company')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div>
                    <div class="mb-4">
                        <label for="departamento" class="block text-gray-700 font-bold mb-2">Departamento</label>
                        <input type="text" name="departamento" id="departamento" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('departamento') border-red-500 @enderror" value="{{ $collaborator->departamento }}" required>
                        @error('departamento')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="designacion" class="block text-gray-700 font-bold mb-2">Designación</label>
                        <input type="text" name="designacion" id="designacion" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('designacion') border-red-500 @enderror" value="{{ $collaborator->designacion }}" required>
                        @error('designacion')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
            </div>

            <div class="mt-4">
                <a href="{{ route('CollaboratorsVista') }}" class="text-blue-500 hover:underline">Regresar</a>
            </div>
        </form>

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
    </div>
</div>

</x-app-layout>
