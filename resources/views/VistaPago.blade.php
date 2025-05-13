<x-app-layout>

    <h1> Agregar un colaborador y un pago</h1>

    <form action="{{ route('ProyectosVista') }}" method="POST" novalidate>
                @csrf
                <div class="mb-4">
                    <label for="pago" class="block text-gray-700 font-bold mb-2">Nombre del proyecto</label>
                    <input id="pago" name="pago" type="text" placeholder="Ingrese el nombre del proyecto" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('pago') border-red-500 @enderror">
                    @error('pago')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="id_colaboradorE" class="block text-gray-700 font-bold mb-2">Trabajador del proyecto:</label>
                    <select id="id_colaboradorE" name="id_colaboradorE" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('id_colaboradorE') border-red-500 @enderror">
                        <option value="">-- Seleccione al colaborador de trabajo --</option>
                        @foreach ($collaborators as $collaborator)
                            <option value="{{ $collaborator->id }}">{{ $collaborator->name }}</option>
                        @endforeach
                    </select>
                        @error('id_colaboradorE')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                </div>

                @foreach ($proyects as $proyect)
                <div class="mb-4">
                        <label for="id_proyecto" class="block text-gray-700 font-bold mb-2">Nombre del Proyecto</label>
                        <input type="text" name="id_proyecto" id="id_proyecto" class="w-full border-gray-300 rounded-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('id_proyecto') border-red-500 @enderror" value="{{ $proyect->id }}">{{ $proyect->id_proyecto }}>
                        @error('id_proyecto')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endforeach
                
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full">
                    Agregar colaborador
                </button>
        </form>


</x-app-layout>
