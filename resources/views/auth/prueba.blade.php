@vite('resources/js/app.js')



<x-app-layout>

@if (auth()->user()->usertype == 'admin')

<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />

<div class="container">
        <h1 class="text-center text-4xl font-bold my-8">PROYECTOS EN FUNCIÒN</h1>
    </div>

    <div class="container mx-auto">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="py-4 px-6 bg-gray-100 text-gray-600 font-bold uppercase border-b border-gray-300">Nombre del Proyecto</th>
                        <th class="py-4 px-6 bg-gray-100 text-gray-600 font-bold uppercase border-b border-gray-300">Prioridad</th>
                        <th class="py-4 px-6 bg-gray-100 text-gray-600 font-bold uppercase border-b border-gray-300">Lider del proyecto</th>
                        <th class="py-4 px-6 bg-gray-100 text-gray-600 font-bold uppercase border-b border-gray-300">Descripción</th>
                </thead>
                <tbody>
                @foreach ($proyects as $proyecto)
    <tr class="text-gray-700">

        <td class="py-4 px-6 border-b border-gray-300">{{ $proyecto->nombre_proyecto }}</td>
        <td class="py-4 px-6 border-b border-gray-300">{{ $proyecto->prioridad }}</td>
        <td class="py-4 px-6 border-b border-gray-300">
            @foreach ($collaborators as $collaborator)
                @if ($proyecto->id_colaborador == $collaborator->id)
                    {{ $collaborator->name }}
                @endif
            @endforeach
        </td>
        <td class="py-4 px-6 border-b border-gray-300">{{ $proyecto->descripcion }}</td>
    </tr>
    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <h1 class="text-center text-4xl font-bold my-8">Opciones de la lista de proyectos</h1>
    </div>

   <!-- Botón "Añadir +" para abrir el modal -->
    <button onclick="openModal()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full mb-4">
        Añadir un proyecto
    </button>

    <a href="{{ route('ProyectosB') }}" >
    <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full mb-4">
        Editar un proyecto
    </button>
    </a>

    <!-- Modal -->
    <div id="myModal" class="modal hidden fixed inset-0 bg-opacity-50 bg-gray-500 flex items-center justify-center">
    <div class="bg-white rounded-lg p-8 max-w-md overflow-y-auto modal-content" style="max-height: 80vh;">
            <form action="{{ route('ProyectosVista') }}" method="POST" novalidate>
                @csrf
                <div class="mb-4">
                    <label for="nombre_proyecto" class="block text-gray-700 font-bold mb-2">Nombre del proyecto</label>
                    <input id="nombre_proyecto" name="nombre_proyecto" type="text" placeholder="Ingrese el nombre del proyecto" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('nombre_proyecto') border-red-500 @enderror">
                    @error('nombre_proyecto')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="fecha_inicio" class="block text-gray-700 font-bold mb-2">Fecha de Inicio:</label>
                    <input id="fecha_inicio" name="fecha_inicio" type="date" placeholder="Ingrese la fecha de inicio del proyecto" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('fecha_inicio') border-red-500 @enderror" value="{{ old('fecha_inicio') }}">
                    @error('fecha_inicio')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="fecha_finalizacion" class="block text-gray-700 font-bold mb-2">Fecha de Finalización:</label>
                    <input id="fecha_finalizacion" name="fecha_finalizacion" type="date" placeholder="Ingrese la fecha de finalización del proyecto" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('fecha_finalizacion') border-red-500 @enderror" value="{{ old('fecha_finalizacion') }}">
                    @error('fecha_finalizacion')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="prioridad" class="block text-gray-700 font-bold mb-2">Prioridad:</label>
                    <select id="prioridad" name="prioridad" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('prioridad') border-red-500 @enderror">
                        <option value="">-- Seleccione la prioridad del proyecto --</option>
                        <option value="Alta">Alta</option>
                        <option value="Media">Media</option>
                        <option value="Baja">Baja</option>
                    </select>
                    @error('prioridad')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="id_colaborador" class="block text-gray-700 font-bold mb-2">Lider de Proyecto:</label>
                    <select id="id_colaborador" name="id_colaborador" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('id_colaborador') border-red-500 @enderror">
                        <option value="">-- Seleccione el lider del proyecto --</option>
                        @foreach ($collaborators as $collaborator)
                            <option value="{{ $collaborator->id }}">{{ $collaborator->name }}</option>
                        @endforeach
                    </select>
                        @error('id_colaborador')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <div class="mb-4">
                    <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripciòn del proyecto</label>
                    <input id="descripcion" name="descripcion" type="text" placeholder="Ingrese la descripcion del proyecto" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('descripcion') border-red-500 @enderror">
                    @error('descripcion')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="id_colaborador2" class="block text-gray-700 font-bold mb-2">Trabajador del proyecto:</label>
                    <select id="id_colaborador2" name="id_colaborador2" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('id_colaborador2') border-red-500 @enderror">
                        <option value="">-- Seleccione al colaborador de trabajo --</option>
                        @foreach ($collaborators as $collaborator)
                            <option value="{{ $collaborator->id }}">{{ $collaborator->name }}</option>
                        @endforeach
                    </select>
                        @error('id_colaborador2')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </div>

                
                <div class="mb-6">
                    <label for="id_cliente" class="block text-gray-700 font-bold mb-2">Cliente del proyecto:</label>
                    <select id="id_cliente" name="id_cliente" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('id_cliente') border-red-500 @enderror">
                        <option value="">-- Seleccione el cliente del proyecto --</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                        @endforeach
                    </select>
                        @error('id_cliente')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </div>

                <form action="{{ route('archivos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="archivo">Seleccionar archivo:</label>
                <input type="file" name="archivo" id="archivo" accept=".jpg, .jpeg, .png, .gif,.pdf, .xlsx, .docx, .pptx">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full">
                    Registrar Proyecto
                </button>
                </form>
                
            </form>
            <button onclick="closeModal()" class="mt-4 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full">
                Cancelar
            </button>
        </div>
    </div>

    <style>
    .modal-content {
        max-height: 80vh; /* Establece una altura máxima para el contenido del modal */
        overflow-y: auto; /* Habilita el desplazamiento vertical cuando el contenido supere la altura máxima */
    }
    </style>

    <!-- JavaScript para controlar el modal y mostrar la notificación -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function openModal() {
            document.getElementById("myModal").classList.remove("hidden");
        }

        function closeModal() {
            document.getElementById("myModal").classList.add("hidden");
        }

        function showSuccessAlert() {
            Swal.fire({
                icon: 'success',
                title: 'Registro exitoso',
                text: 'El cliente se ha registrado correctamente.',
            });
        }

        // Verificar si el registro se realizó correctamente y mostrar la notificación
        const urlParams = new URLSearchParams(window.location.search);
        const success = urlParams.get('success');

        if (success === 'true') {
            showSuccessAlert();
        }
    </script>

    <!-- Add a hidden modal for options -->
<div id="optionsModal" class="modal hidden fixed inset-0 bg-opacity-50 bg-gray-500 flex items-center justify-center">
    <div class="bg-white rounded-lg p-8 max-w-md overflow-y-auto modal-content" style="max-height: 80vh;">
        <h2 class="text-lg font-semibold mb-4">Opciones para el Proyecto</h2>
        

        @foreach ($proyects as $proyecto)
        <!-- "Eliminar" button inside the modal -->
        <form method="POST" action="{{ route('Datos1.destroy', $proyecto->$proyecto) }}">
            @endforeach
            @method('DELETE')
            @csrf
            <div class="flex justify-center mt-1">
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg mb-4 w-full" onclick="deleteProject()">Eliminar</button>            </div>
        </form>

         <!-- "Editar" button inside the modal -->
        @foreach ($proyects as $proyecto)
    <form action="{{ route('edit.update', $proyecto->id_colaborador) }}" method="POST">
        @endforeach    
        @csrf
        @method('PUT')
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded-lg mt-2 w-full" onclick="editProject()">Editar</button>
    </form>
        
        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-2 rounded-lg mt-2 w-full" onclick="finishProject()">Terminar proyecto</button>
        
        <button class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-1 px-2 rounded-lg mt-2 w-full" onclick="closeOptionsModal()">Cancelar</button>
    </div>
</div>
<!-- JavaScript code -->
<script>
    function openOptionsModal(projectId) {
        document.getElementById("optionsModal").classList.remove("hidden");
    }

    function deleteProject(projectId) {
        if (confirm('¿Estás seguro de que deseas eliminar este proyecto?')) {
            // Sending a DELETE request using AJAX
            fetch(`/Datos1${projectId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Optional: You can perform actions after successful deletion
                    // For example, close the modal or update the UI
                    alert('Proyecto eliminado exitosamente');
                    // Reload or update your project list
                    window.location.reload(); // Or update the list using JavaScript
                } else {
                    alert('Error al eliminar el proyecto');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }

    function editProject() {
        // Implement logic to edit the project here
        // You can open another modal or redirect to an edit page
        // After editing, you can close the modal or perform any other actions
    }

    function finishProject() {
        // Implement logic to mark the project as finished here
        // You can use AJAX or a form submission to update the project status
        // After finishing, you can close the modal or perform any other actions
    }

    function closeOptionsModal() {
        document.getElementById("optionsModal").classList.add("hidden");
    }
</script>

<!-- Dropzone -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>

    <script>
        Dropzone.options.myAwesomeDropzone = {
            headers:{
                'X-CSRF-TOKEN' : "{{csrf_token()}}"
            },

            dictDefaultMessage: "Arrastre una imagen al recuadro para subirlo",
            acceptedFiles: "image/*",
            maxFilesize: 2,
            maxFiles: 4,
        };
    </script>

@endif

@if (auth()->user()->usertype == 'collaborator')
    <div class="container mx-auto">
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr>
                        <th class="py-4 px-6 bg-gray-100 text-gray-600 font-bold uppercase border-b border-gray-300">Nombre del Proyecto</th>
                        <th class="py-4 px-6 bg-gray-100 text-gray-600 font-bold uppercase border-b border-gray-300">Prioridad</th>
                        <th class="py-4 px-6 bg-gray-100 text-gray-600 font-bold uppercase border-b border-gray-300">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($proyects as $proyect)
                        <tr class="text-gray-700">
                            <td class="py-4 px-6 border-b border-gray-300">{{ $proyect->nombre_proyecto }}</td>
                            <td class="py-4 px-6 border-b border-gray-300">{{ $proyect->prioridad }}</td>
                            <td class="py-4 px-6 border-b border-gray-300">{{ $proyect->descripcion }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif

    
</x-app-layout>
