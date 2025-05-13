<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-app-layout>
    <div class="container">
        <h1 class="text-center text-4xl font-bold my-8">OPCIONES DE CLIENTES</h1>

        <ul>
        @foreach ($clientes as $cliente)
    <li class="flex justify-between items-center mb-4"> <!-- Agregamos margen inferior (mb-4) -->
        <div class="bg-gray-100 p-3 rounded shadow-md">
            
        <span class="text-2xl font-semibold text-gray-800">{{ $cliente->nombre }} {{ $cliente->apellido }}</span>
    </div>

        <form id="formEliminarCliente-{{ $cliente->id }}" action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
            @csrf
            @method('DELETE')
            
            <div class="mb-2">
            <a href="{{ route('clientes.edit', $cliente->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">Editar</a>
            </div>
 

            <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mt-2" style="width: 100px;"
            onclick="confirmDelete('{{ $cliente->id }}')">Eliminar</button>
        </form>
    </li>
@endforeach
        </ul>
    </div>
       

    <div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-8 rounded-md shadow-md max-h-screen overflow-y-auto">
 
        <h1 class="text-2xl font-bold mb-4" id="nombreEmpleadoEditar"></h1>
        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" id="formEditarCliente" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
        <label for="nombre" class="block">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-input" value="{{ $cliente->nombre }}" required>
    </div>

    <div class="mb-4">
        <label for="apellido" class="block">Apellido</label>
        <input type="text" name="apellido" id="apellido" class="form-input" value="{{ $cliente->apellido }}" required>
    </div>

    <div class="mb-4">
        <label for="username" class="block">Nombre de usuario</label>
        <input type="text" name="username" id="username" class="form-input" value="{{ $cliente->username }}" required>
    </div>

    <div class="mb-4">
        <label for="email" class="block">Correo electrónico</label>
        <input type="email" name="email" id="email" class="form-input" value="{{ $cliente->email }}" required>
    </div>

    <div class="mb-4">
        <label for="telefono" class="block">Teléfono</label>
        <input type="text" name="telefono" id="telefono" class="form-input" value="{{ $cliente->telefono }}" required>
    </div>

    <div class="mb-4">
        <label for="nombre_empresa" class="block">Nombre de la Empresa</label>
        <input type="text" name="nombre_empresa" id="nombre_empresa" class="form-input" value="{{ $cliente->nombre_empresa }}" required>
    </div>

            <div class="mb-4">
                <label for="imagen" class="block">Imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-input">
                <input type="hidden" name="imagen_actual" value="{{ $cliente->imagen }}">
            </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full">
            Actualizar Cliente
        </button>

        </form>
        <button onclick="closeModal()" class="mt-4 bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full">
                Cancelar
        </button>
</div>

<script>
        function confirmDelete(id) {
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
                    deleteClient(id);
                }
            });
        }


        function deleteClient(id) {
            const form = document.getElementById('formEliminarCliente-' + id);
            fetch(form.action, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Borrado con éxito',
                        text: 'El cliente ha sido eliminado exitosamente.',
                    }).then(() => {
                        window.location.reload(); // Recargar la página
                    });
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Borrado con éxito',
                        text: 'El cliente ha sido eliminado exitosamente.',
                    });
                    window.location.href = '/ClientesN';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
</script>

<!-- JavaScript para controlar el modal y mostrar la notificación -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
    function openModal(clienteId) {
        // Mostrar el modal
        document.getElementById("myModal").classList.remove("hidden");
        // Buscar el cliente en la lista de clientes por su id
        const cliente = {!! json_encode($clientes) !!}.find(c => c.id === clienteId);
        if (cliente) {
            // Configurar los campos del formulario con los datos del cliente
            document.getElementById("nombre").value = cliente.nombre;
            document.getElementById("apellido").value = cliente.apellido;
            document.getElementById("username").value = cliente.username;
            document.getElementById("email").value = cliente.email;
            document.getElementById("telefono").value = cliente.telefono;
            document.getElementById("nombre_empresa").value = cliente.nombre_empresa;
            document.getElementById("imagen_actual").innerText = "Imagen actual: " + cliente.imagen;
        }
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

</x-app-layout>
