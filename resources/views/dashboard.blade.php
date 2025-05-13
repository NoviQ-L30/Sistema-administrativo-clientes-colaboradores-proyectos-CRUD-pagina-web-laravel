<x-app-layout>
    
    <div style="margin-top: 20px;"></div> <!-- Espacio entre los conjuntos de imágenes -->
    <div style="margin-top: 20px;"></div> <!-- Espacio entre los conjuntos de imágenes -->
    <div style="margin-top: 20px;"></div> <!-- Espacio entre los conjuntos de imágenes -->

    @if (auth()->user()->usertype == 'admin')
    <div style="display: flex;">
        <div style="flex: 1; margin-right: 10px;">
            <p class="font-bold text-lg mb-2">Tablas de estadistica:</p>
            <a href="{{ route('Dash') }}">
                <img src="images/persona2.png" alt="Imagen 2" style="max-width: 100%; max-height: 200px;">
            </a>
        </div>
    @endif
    
</x-app-layout>
