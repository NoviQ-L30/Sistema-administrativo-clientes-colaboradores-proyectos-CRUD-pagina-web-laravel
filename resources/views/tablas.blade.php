<x-app-layout>
    <x-slot name="header">
        {{ __('Tablas de Información ') }}
    </x-slot>

    <div style="margin-top: 20px;"></div> <!-- Espacio entre los conjuntos de imágenes -->
    <div style="margin-top: 20px;"></div> <!-- Espacio entre los conjuntos de imágenes -->

    <div class="card-body" style="background-color: #f2f2f2; border-radius: 10px; padding: 10px;">
        <div style="display: flex; align-items: center;">
            <img src="images/clientes.png" alt="Imagen" style="max-width: 100px; height: auto; border-radius: 10px; margin-right: 10px;">
            <div>
                <h3 style="font-weight: bold; margin-bottom: 5px; font-size: 20px;">{{ $clientesn }}</h3>
                <span style="display: block; font-size: 18px;">Clientes</span>
            </div>
        </div>
    </div>

    <div style="margin-top: 20px;"></div>

    <div class="card-body" style="background-color: #f2f2f2; border-radius: 10px; padding: 10px;">
        <div style="display: flex; align-items: center;">
            <img src="images/proyectos.png" alt="Imagen" style="max-width: 100px; height: auto; border-radius: 10px; margin-right: 10px;">
            <div>
            <h3 style="font-weight: bold; margin-bottom: 5px; font-size: 20px;">{{ $proyectsn }}</h3>
                <span style="display: block; font-size: 18px;">Proyectos</span>
            </div>
        </div>
    </div>

    <div style="margin-top: 20px;"></div>

    <div class="card-body" style="background-color: #f2f2f2; border-radius: 10px; padding: 10px;">
        <div style="display: flex; align-items: center;">
            <img src="images/colaboradores.png" alt="Imagen" style="max-width: 100px; height: auto; border-radius: 10px; margin-right: 10px;">
            <div>
            <h3 style="font-weight: bold; margin-bottom: 5px; font-size: 20px;">{{ $collaboratorsn }}</h3>
                <span style="display: block; font-size: 18px;">Colaboradores</span>
            </div>
        </div>
    </div>

    <div style="margin-top: 20px;"></div>

    <div class="card-body" style="background-color: #f2f2f2; border-radius: 10px; padding: 10px;">
        <div style="display: flex; align-items: center;">
            <img src="images/admin.png" alt="Imagen" style="max-width: 100px; height: auto; border-radius: 10px; margin-right: 10px;">
            <div>
                <h3 style="font-weight: bold; margin-bottom: 5px; font-size: 20px;"> {{ $usersn }}</h3>
                <span style="display: block; font-size: 18px;">Administradores</span>
            </div>
        </div>
    </div>

</x-app-layout>
