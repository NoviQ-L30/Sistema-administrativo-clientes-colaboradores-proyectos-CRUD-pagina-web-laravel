
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba 5</title>
    @vite("resources/js/dropzone.js")
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<x-app-layout>
        <div class="container">
        <h1 class="text-center text-4xl font-bold my-8">LISTA DE COLABORADORES</h1>
    </div>

    <div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4"> <!-- Cambiamos a una cuadrícula con 1, 2 o 3 columnas dependiendo del ancho de la pantalla -->
        @foreach ($collaborators as $collaborator)
            <div class="bg-white shadow-md rounded-lg p-6"> <!-- Estilos para las tarjetas -->
            <img src="{{ asset ('uploads2') . '/' .$collaborator->imagen }}" class="w-32 h-32 rounded-full mx-auto">
                <h2 class="text-xl font-semibold mb-2">{{ $collaborator->name }} {{ $collaborator->apellido }}</h2>
                <p class="text-gray-600 mb-2">{{ $collaborator->telefono }}</p>
                <p class="text-gray-600 mb-2">{{ $collaborator->email }}</p>
                <p class="text-gray-600 mb-2">{{ $collaborator->password }}</p>
                <p class="text-gray-600 mb-2">{{ $collaborator->fecha_ingreso }}</p>
                <p class="text-gray-600 mb-2">{{ $collaborator->departamento }}</p>
                <p class="text-gray-600">{{ $collaborator->company }}</p>
            </div>
        @endforeach
    </div>
</div>

    <div class="container">
        <h1 class="text-center text-4xl font-bold my-8">Opciones de las tarjetas de colaboradores</h1>
    </div>

    <!-- Botón "Añadir +" para abrir el modal -->
    <button onclick="openModal()" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full mb-4">
        Añadir un colaborador
    </button>

    <a href="{{ route('CollaboratorsB') }}" >
    <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full mb-4">
        Editar un colaborador
    </button>
    </a>


    <!-- Modal -->
    <div id="myModal" class="modal hidden fixed inset-0 bg-opacity-50 bg-gray-500 flex items-center justify-center">
    <div class="bg-white rounded-lg p-8 max-w-md overflow-y-auto modal-content" style="max-height: 80vh;">
            
             <!--Este es el campo donde podrás poner las imagenes del dropzone-->
             <form action="{{route('imagenes2.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
    
            <form action="{{ route('CollaboratorsVista') }}" method="POST" novalidate>
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Nombre</label>
                    <input id="name" name="name" type="text" placeholder="Ingrese el nombre" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('name') border-red-500 @enderror">
                    @error('name')
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
                    <label for="email" class="block text-gray-700 font-bold mb-2">email</label>
                    <input id="email" name="email" type="text" placeholder="Ingrese el email" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-bold mb-2">contraseña</label>
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


                <div class="mb-6">
                    <label for="fecha_ingreso" class="block text-gray-700 font-bold mb-2">Fecha de ingreso:</label>
                    <input id="fecha_ingreso" name="fecha_ingreso" type="date" placeholder="Ingrese la fecha de finalización del proyecto" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('fecha_ingreso') border-red-500 @enderror">
                    @error('fecha_ingreso')
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
                    <label for="company" class="block text-gray-700 font-bold mb-2">company</label>
                    <input id="company" name="company" type="text" placeholder="Ingrese la compañia" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('company') border-red-500 @enderror">
                    @error('company')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="departamento" class="block text-gray-700 font-bold mb-2">Departamento:</label>
                    <select id="departamento" name="departamento" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('departamento') border-red-500 @enderror">
                        <option value="">-- Seleccione el departamento del colaborador --</option>
                        <option value="Web Development">Web Development</option>
                        <option value="IT Managment">IT Managment</option>
                        <option value="Marketing">Marketing</option>
                    </select>
                    @error('departamento')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="designacion" class="block text-gray-700 font-bold mb-2">Designacion:</label>
                    <select id="designacion" name="designacion" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('designacion') border-red-500 @enderror">
                        <option value="">-- Seleccione la designacion del colaborador --</option>
                        <option value="Web Designer">Web Designer</option>
                        <option value="Web Developer">Web Developer</option>
                        <option value="Android Developer">Android Developer</option>
                    </select>
                    @error('designacion')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Y con este otro guardamos los valores de la imagen -->
                <div class="mb-5">
                    <input type="hidden" name="imagen" value="{{old('imagen')}}"/>
                </div>

                <button id="btnRegistrarColaborador" type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full">
                    Registrar Colaborador
                </button>

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

    <!-- JavaScript para controlar el modal -->
    <script>
        function openModal() {
            document.getElementById("myModal").classList.remove("hidden");
        }

        function closeModal() {
            document.getElementById("myModal").classList.add("hidden");
        }
    </script>
</x-app-layout>
