@extends('layouts.dashboard')
@section('content')

@if(session('success'))
    <div id="flash-success-message"
         data-message="{{ session('success') }}"
         class="hidden"></div>
@endif

@if($errors->any())
    <div id="flash-error-messages" class="hidden">
        @foreach ($errors->all() as $error)
            <span class="error-item">{{ $error }}</span>
        @endforeach
    </div>
@endif

<div class="p-6 bg-gray-50 h-full overflow-x-hidden">
    
    <h1 class="text-2xl font-bold mb-6">Crear Proyecto</h1>

    <form action="{{ route('proyectos.store') }}" method="POST" 
    class="bg-white p-6 rounded-2xl shadow grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @csrf

        {{-- Nombre --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Nombre:</label>
            <div class="flex items-center border rounded overflow-hidden">
                <span class="px-3 bg-gray-100">
                    <i class="fas fa-tag text-gray-500"></i>
                </span>
                <input type="text" name="nombre" class="w-full p-2 focus:outline-none" required>
            </div>
        </div>

        {{-- Área --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Área:</label>
            <div class="flex items-center border rounded overflow-hidden">
                <span class="px-3 bg-gray-100">
                    <i class="fas fa-layer-group text-gray-500"></i>
                </span>
                <select name="area_id" class="w-full p-2 focus:outline-none" required>
                    <option value="">Seleccione un área</option>
                    @foreach($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Cliente --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Cliente:</label>
            <div class="flex items-center border rounded overflow-hidden">
                <span class="px-3 bg-gray-100">
                    <i class="fas fa-user text-gray-500"></i>
                </span>
                <select name="cliente_id" class="w-full p-2 focus:outline-none" required>
                    <option value="">Seleccione un cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Fecha Inicio --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Fecha Inicio:</label>
            <div class="flex items-center border rounded overflow-hidden">
                <span class="px-3 bg-gray-100">
                    <i class="fas fa-calendar-alt text-gray-500"></i>
                </span>
                <input type="date" name="fecha_inicio" class="w-full p-2 focus:outline-none" required>
            </div>
        </div>

        {{-- Fecha Fin --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Fecha Fin:</label>
            <div class="flex items-center border rounded overflow-hidden">
                <span class="px-3 bg-gray-100">
                    <i class="fas fa-calendar-check text-gray-500"></i>
                </span>
                <input type="date" name="fecha_fin" class="w-full p-2 focus:outline-none">
            </div>
        </div>

        {{-- Ubicación --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Ubicación:</label>
            <div class="flex items-center border rounded overflow-hidden">
                <span class="px-3 bg-gray-100">
                    <i class="fas fa-map-marker-alt text-gray-500"></i>
                </span>
                <input type="text" name="ubicacion" class="w-full p-2 focus:outline-none">
            </div>
        </div>

        {{-- Estado --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Estado:</label>
            <div class="flex items-center border rounded overflow-hidden">
                <span class="px-3 bg-gray-100">
                    <i class="fas fa-info-circle text-gray-500"></i>
                </span>
                <select name="estado" class="w-full p-2 focus:outline-none" required>
                    <option value="">Seleccione un estado</option>
                    <option value="En ejecución">En ejecución</option>
                    <option value="Planificado">Planificado</option>
                </select>
            </div>
        </div>

        {{-- Costo --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Costo (S/):</label>
            <div class="flex items-center border rounded overflow-hidden">
                <span class="px-3 bg-gray-100">
                    <i class="fas fa-coins text-gray-500"></i>
                </span>
                <input type="number" step="0.01" name="costo" class="w-full p-2 focus:outline-none" required>
            </div>
        </div>

        {{-- Avance --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Avance (%):</label>
            <div class="flex items-center border rounded overflow-hidden">
                <span class="px-3 bg-gray-100">
                    <i class="fas fa-chart-line text-gray-500"></i>
                </span>
                <input 
                    type="text"
                    name="avance"
                    maxlength="2"
                    pattern="^(10|[0-9])$"
                    class="w-full p-2 focus:outline-none"
                    placeholder="0-10"
                    required
                >
            </div>
        </div>

        {{-- Descripción (ANCHO COMPLETO) --}}
        <div class="flex flex-col lg:col-span-3">
            <label class="font-bold mb-1">Descripción:</label>
            <div class="flex border rounded overflow-hidden">
                <span class="px-3 bg-gray-100 pt-2">
                    <i class="fas fa-align-left text-gray-500"></i>
                </span>
                <textarea 
                    name="descripcion" 
                    maxlength="500"
                    class="w-full p-2 focus:outline-none"
                    placeholder="Máximo 500 caracteres"
                    required
                ></textarea>
            </div>
        </div>

        {{-- BOTONES --}}
        <div class="lg:col-span-3 flex justify-between items-center">
            <a href="{{ route('proyectos.index') }}" 
            class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded font-bold">
                <i class="fas fa-arrow-left mr-1"></i> Volver
            </a>

            <button type="submit" 
            class="bg-[#d4af37] hover:bg-[#c19b2e] text-white px-4 py-2 rounded font-bold">
                <i class="fas fa-save mr-1"></i> Crear
            </button>
        </div>

    </form>
</div>

@endsection