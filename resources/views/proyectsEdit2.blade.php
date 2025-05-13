@vite('resources/css/app.css')
@vite('resources/js/app.js')
@vite("resources/js/dropzone.js")

<x-app-layout>

<div class="flex justify-center items-center h-screen">
    <div class="w-full max-w-3xl bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-6" id="nombreProyectoEditar">Editar Proyecto</h1>
        <form action="{{ route('proyects.update', $proyect->id) }}" method="POST" id="formEditarProyecto" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <div class="mb-4">
                        <label for="nombre_proyecto" class="block text-gray-700 font-bold mb-2">Nombre del Proyecto</label>
                        <input type="text" name="nombre_proyecto" id="nombre_proyecto" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('nombre_proyecto') border-red-500 @enderror" value="{{ $proyect->nombre_proyecto }}" required>
                        @error('nombre_proyecto')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="fecha_inicio" class="block text-gray-700 font-bold mb-2">Fecha de Inicio</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('fecha_inicio') border-red-500 @enderror" value="{{ $proyect->fecha_inicio }}" required>
                        @error('fecha_inicio')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="fecha_finalizacion" class="block text-gray-700 font-bold mb-2">Fecha de Finalización</label>
                        <input type="date" name="fecha_finalizacion" id="fecha_finalizacion" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('fecha_finalizacion') border-red-500 @enderror" value="{{ $proyect->fecha_finalizacion }}" required>
                        @error('fecha_finalizacion')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="prioridad" class="block text-gray-700 font-bold mb-2">Prioridad</label>
                        <select name="prioridad" id="prioridad" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('prioridad') border-red-500 @enderror" required>
                            <option value="alta" {{ $proyect->prioridad === 'alta' ? 'selected' : '' }}>Alta</option>
                            <option value="media" {{ $proyect->prioridad === 'media' ? 'selected' : '' }}>Media</option>
                            <option value="baja" {{ $proyect->prioridad === 'baja' ? 'selected' : '' }}>Baja</option>
                        </select>
                        @error('prioridad')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="4" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('descripcion') border-red-500 @enderror" required>{{ $proyect->descripcion }}</textarea>
                        @error('descripcion')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
            </div>

            <div class="mt-4">
                <a href="{{ route('ProyectosVista') }}" class="text-blue-500 hover:underline">Regresar</a>
            </div>
        </form>

        <script>
            // Código de configuración de Dropzone

            // Evento para eliminar el archivo actual
            const eliminarArchivoButton = document.getElementById('eliminarArchivo');
            const eliminarArchivoInput = document.getElementById('eliminar_archivo');

            eliminarArchivoButton.addEventListener('click', function () {
                if (confirm('¿Estás seguro de que deseas eliminar el archivo?')) {
                    eliminarArchivoInput.value = '1';
                    // Ocultar el botón de eliminar archivo
                    eliminarArchivoButton.style.display = 'none';
                    // Eliminar el archivo previamente mostrado
                    // ... tu lógica para eliminar el archivo mostrado ...
                }
            });
        </script>
    </div>
</div>

</x-app-layout>
