
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba 5</title>
    @vite("resources/js/dropzone.js")
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<x-app-layout>
@if (auth()->user()->usertype == 'admin')
        <div class="container">
        <h1 class="text-center text-4xl font-bold my-8">TARJETAS DE CLIENTES</h1>
    </div>
    <div class="container mx-auto">
    <div class="flex flex-wrap -mx-4">
        @foreach ($clientes as $cliente)
            <div class="w-full md:w-1/2 lg:w-1/3 xl:w-1/4 px-4 mb-4">
                <div class="bg-white border rounded-lg overflow-hidden shadow-md">
                    <div class="p-4">
                    <img src="{{ asset ('uploads') . '/' .$cliente->imagen }}" class="w-32 h-32 rounded-full mx-auto">
                        <div class="mb-2 text-lg font-semibold">{{ $cliente->nombre }}</div>
                        <div class="text-gray-600">{{ $cliente->apellido }}</div>
                        <div class="text-gray-600">{{ $cliente->telefono }}</div>
                        <div class="text-gray-600">{{ $cliente->nombre_empresa }}</div>
                    </div>
                    <div class="p-4 bg-gray-100 border-t">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

    <div class="container">
        <h1 class="text-center text-4xl font-bold my-8">Opciones de las tarjetas de clientes</h1>
    </div>

    <!-- Botón "Añadir +" para abrir el modal -->
    <button onclick="openModal()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full mb-4">
        Añadir un cliente
    </button>
    
    <a href="{{ route('ClientesB') }}" >
    <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full mb-4">
        Editar un cliente
    </button>
    </a>




    <!-- Modal -->
    <div id="myModal" class="modal hidden fixed inset-0 bg-opacity-50 bg-gray-500 flex items-center justify-center">
    <div class="bg-white rounded-lg p-8 max-w-md overflow-y-auto modal-content" style="max-height: 80vh;">
            
             <!--Este es el campo donde podrás poner las imagenes del dropzone-->
             <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>

            @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-center">
                            {{$message}}
                        </p>
            @enderror
    
            <form action="{{ route('ClientesN') }}" method="POST" novalidate>
                @csrf
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre</label>
                    <input id="nombre" name="nombre" type="text" placeholder="Ingrese el nombre" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('nombre') border-red-500 @enderror">
                    @error('nombre')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="apellido" class="block text-gray-700 font-bold mb-2">Apellidos</label>
                    <input id="apellido" name="apellido" type="text" placeholder="Ingrese los apellidos" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('apellido') border-red-500 @enderror">
                    @error('apellido')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-bold mb-2">Username</label>
                    <input id="username" name="username" type="text" placeholder="Ingrese el username" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('username') border-red-500 @enderror">
                    @error('username')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input id="email" name="email" type="text" placeholder="Ingrese el email" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-bold mb-2">Contraseña</label>
                    <input id="password" name="password" type="password" placeholder="Ingrese la contraseña" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 font-bold mb-2">Confirmar contraseña</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Ingrese la confirmaciòn" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('password_confirmation') border-red-500 @enderror">
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-4">
                    <label for="telefono" class="block text-gray-700 font-bold mb-2">Telefono</label>
                    <input id="telefono" name="telefono" type="text" placeholder="Ingrese el telefono" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('telefono') border-red-500 @enderror">
                    @error('telefono')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="nombre_empresa" class="block text-gray-700 font-bold mb-2">Nombre de la empresa</label>
                    <input id="nombre_empresa" name="nombre_empresa" type="text" placeholder="Ingrese el nombre de la empresa" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('nombre_empresa') border-red-500 @enderror">
                    @error('nombre_empresa')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                 <!-- Y con este otro guardamos los valores de la imagen -->
                 <div class="mb-5">
                    <input type="hidden" name="imagen" value="{{old('imagen')}}"/>
                </div>

                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full">
                    Registrar Cliente
                </button>

            </form>
            <button onclick="closeModal()" class="mt-4 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full">
                Cancelar
            </button>
        </div>
    </div>

<!--Este script es para las opciones del modal-->
<script>
    function openOptionsModal(projectId) {
        document.getElementById("optionsModal").classList.remove("hidden");
    }

    function deleteProject(projectId) {
        if (confirm('¿Estás seguro de que deseas eliminar este cliente?')) {
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
                    alert('cliente eliminado exitosamente');
                    // Reload or update your project list
                    window.location.reload(); // Or update the list using JavaScript
                } else {
                    alert('Error al eliminar el cliente');
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }

    function closeOptionsModal() {
        document.getElementById("optionsModal").classList.add("hidden");
    }
</script>

<!-- Añadimos un modal para confirmar la eliminación -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const btnEliminarCliente = document.getElementById('btnEliminarCliente');
    const eliminarClienteModal = document.getElementById('eliminarClienteModal');

    btnEliminarCliente.addEventListener('click', function() {
        eliminarClienteModal.classList.remove('hidden');
    });
});

 const btnEliminarCliente = document.getElementById('btnEliminarCliente');
    const eliminarClienteModal = document.getElementById('eliminarClienteModal');
    const btnCerrarEliminarClienteModal = document.getElementById('btnCerrarEliminarClienteModal');
    const formEliminarCliente = document.getElementById('formEliminarCliente');

    btnEliminarCliente.addEventListener('click', function() {
        eliminarClienteModal.classList.remove('hidden');
    });

    btnCerrarEliminarClienteModal.addEventListener('click', function() {
        eliminarClienteModal.classList.add('hidden');
    });

    formEliminarCliente.addEventListener('submit', function(event) {
        event.preventDefault(); // Evitar el envío del formulario

        Swal.fire({
            title: '¿Estás seguro?',
            text: 'El cliente será eliminado permanentemente.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                formEliminarCliente.submit(); // Enviar el formulario si se confirma la eliminación
            }
        });
    });
</script>




<!-- Añadimos un estilo para el modal -->
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
@endif

@if (auth()->user()->usertype == 'collaborator')

@endif

</x-app-layout>
