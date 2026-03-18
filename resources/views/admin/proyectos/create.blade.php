@extends('layouts.dashboard')
@section('content')
<div class="p-6 bg-gray-50 min-h-screen">
    <h1 class="text-2xl font-bold mb-6">Crear Proyecto</h1>

    <form action="{{ route('proyectos.store') }}" method="POST" class="bg-white p-6 rounded-2xl shadow grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf

        {{-- Nombre --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Nombre:</label>
            <input type="text" name="nombre" class="w-full border rounded p-2" required>
        </div>

        {{-- Área --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Área:</label>
            <select name="area_id" class="w-full border rounded p-2" required>
                <option value="">Seleccione un área</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                @endforeach
            </select>
        </div>

        {{-- Descripción --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Descripción:</label>
            <textarea name="descripcion" class="w-full border rounded p-2"></textarea>
        </div>

        {{-- Cliente --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Cliente:</label>
            <select name="cliente_id" class="w-full border rounded p-2" required>
                <option value="">Seleccione un cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
            </select>
        </div>

        {{-- Ubicación --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Ubicación:</label>
            <input type="text" name="ubicacion" class="w-full border rounded p-2">
        </div>

        {{-- Estado --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Estado:</label>
            <select name="estado" class="w-full border rounded p-2" required>
                <option value="">Seleccione un estado</option>
                <option value="En ejecución">En ejecución</option>
                <option value="Finalizado">Finalizado</option>
                <option value="Planificado">Planificado</option>
                <option value="Cancelado">Cancelado</option>
            </select>
        </div>

        {{-- Costo --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Costo (S/):</label>
            <input type="number" step="0.01" name="costo" class="w-full border rounded p-2" required>
        </div>

        {{-- Avance --}}
        <div class="flex flex-col">
            <label class="font-bold mb-1">Avance (%):</label>
            <input type="number" name="avance" min="0" max="100" class="w-full border rounded p-2" required>
        </div>

        {{-- Botones --}}
        <div class="md:col-span-2 flex justify-between items-center">
            {{-- Cancelar / Volver --}}
            <a href="{{ route('proyectos.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded font-bold transition-all duration-200">
                Volver
            </a>

            {{-- Crear Proyecto --}}
            <button type="submit" class="bg-[#d4af37] hover:bg-[#c19b2e] text-white px-4 py-2 rounded font-bold transition-all duration-200">
                Crear
            </button>
        </div>
    </form>
</div>
@endsection