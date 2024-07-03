@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-2xl font-semibold mb-4 text-center">Crear Nueva Reserva para Sucursal {{ $branch_id }}</h2>

    <form id="reservaForm" action="{{ route('reservas.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <input type="hidden" name="branch_id" value="{{ $branch_id }}">
        <input type="hidden" id="horario_id" name="horario_id">
        <input type="hidden" id="num_personas" name="num_personas" required>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="fecha" class="block text-sm font-medium text-gray-700">Seleccionar Fecha</label>
                <select id="fecha" class="form-select mt-1 block w-full rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                    <option value="">Seleccionar Fecha</option>
                    @foreach ($fechas as $fecha)
                        <option value="{{ $fecha }}">{{ $fecha }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="capacidad" class="block text-sm font-medium text-gray-700">Capacidad de la Mesa</label>
                <select id="capacidad" class="form-select mt-1 block w-full rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required disabled>
                    <option value="">Seleccionar Capacidad</option>
                    <!-- Las opciones de capacidad se llenarán dinámicamente con JavaScript -->
                </select>
            </div>

            <div>
                <label for="hora" class="block text-sm font-medium text-gray-700">Seleccionar Hora</label>
                <select id="hora" name="hora" class="form-select mt-1 block w-full rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required disabled>
                    <option value="">Seleccionar Hora</option>
                    <!-- Las opciones de hora se llenarán dinámicamente con JavaScript -->
                </select>
            </div>

            <div>
                <label for="mesa_id" class="block text-sm font-medium text-gray-700">Seleccionar Mesa</label>
                <select id="mesa_id" name="mesa_id" class="form-select mt-1 block w-full rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required disabled>
                    <option value="">Seleccionar Mesa</option>
                    <!-- Las opciones de mesa se llenarán dinámicamente con JavaScript -->
                </select>
            </div>

            <div>
                <label for="cliente_nombre" class="block text-sm font-medium text-gray-700">Nombre del Cliente</label>
                <input type="text" id="cliente_nombre" name="cliente_nombre" value="{{ $user->name }}" class="form-input mt-1 block w-full rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required readonly>
            </div>

            <div>
                <label for="cliente_email" class="block text-sm font-medium text-gray-700">Email del Cliente</label>
                <input type="email" id="cliente_email" name="cliente_email" value="{{ $user->email }}" class="form-input mt-1 block w-full rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required readonly>
            </div>

            <div>
                <label for="cliente_telefono" class="block text-sm font-medium text-gray-700">Teléfono del Cliente</label>
                <input type="text" id="cliente_telefono" name="cliente_telefono" class="form-input mt-1 block w-full rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
        </div>

        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-4">
            Guardar Reserva
        </button>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const horarios = @json($horarios);
    const mesas = @json($mesas);
    const fechaSelect = document.getElementById('fecha');
    const capacidadSelect = document.getElementById('capacidad');
    const horaSelect = document.getElementById('hora');
    const mesaSelect = document.getElementById('mesa_id');
    const reservaForm = document.getElementById('reservaForm');
    const horarioIdInput = document.getElementById('horario_id');
    const numPersonasInput = document.getElementById('num_personas');

    fechaSelect.addEventListener('change', function() {
        const selectedFecha = this.value;

        capacidadSelect.innerHTML = '<option value="">Seleccionar Capacidad</option>';
        horaSelect.innerHTML = '<option value="">Seleccionar Hora</option>';
        mesaSelect.innerHTML = '<option value="">Seleccionar Mesa</option>';

        if (selectedFecha) {
            const capacidadesSet = new Set();

            horarios.forEach(function(horario) {
                if (horario.fecha === selectedFecha) {
                    const mesa = mesas.find(m => m.id === horario.mesa_id);
                    if (mesa) {
                        capacidadesSet.add(mesa.capacidad);
                    }
                }
            });

            capacidadesSet.forEach(function(capacidad) {
                const option = document.createElement('option');
                option.value = capacidad;
                option.textContent = capacidad;
                capacidadSelect.appendChild(option);
            });

            capacidadSelect.disabled = false;
        } else {
            capacidadSelect.disabled = true;
        }
    });

    capacidadSelect.addEventListener('change', function() {
        const selectedCapacidad = parseInt(this.value);

        horaSelect.innerHTML = '<option value="">Seleccionar Hora</option>';
        mesaSelect.innerHTML = '<option value="">Seleccionar Mesa</option>';

        const horasDisponibles = obtenerHorasDisponibles(selectedCapacidad);
        llenarHoras(horasDisponibles);

        horaSelect.disabled = false;
    });

    function obtenerHorasDisponibles(capacidad) {
        const horasSet = new Set();
        horarios.forEach(horario => {
            const mesa = mesas.find(m => m.id === horario.mesa_id);
            if (mesa && mesa.capacidad === capacidad && horario.fecha === fechaSelect.value) {
                horasSet.add(horario.hora);
            }
        });
        return Array.from(horasSet); // Convertir el Set a Array
    }

    function llenarHoras(horas) {
        horas.forEach(hora => {
            const option = document.createElement('option');
            option.value = hora;
            option.textContent = hora;
            horaSelect.appendChild(option);
        });
    }

    horaSelect.addEventListener('change', function() {
        const selectedHora = this.value;

        const mesasDisponibles = obtenerMesasDisponibles(selectedHora);
        llenarMesas(mesasDisponibles);

        mesaSelect.disabled = false;
    });

    function obtenerMesasDisponibles(horaSeleccionada) {
        const selectedCapacidad = parseInt(capacidadSelect.value);
        return horarios
            .filter(horario => horario.hora === horaSeleccionada && horario.fecha === fechaSelect.value)
            .map(horario => mesas.find(mesa => mesa.id === horario.mesa_id && mesa.capacidad === selectedCapacidad))
            .filter(mesa => mesa !== undefined); // Filtrar mesas no definidas
    }

    function llenarMesas(mesas) {
        mesaSelect.innerHTML = '<option value="">Seleccionar Mesa</option>';
        mesas.forEach(mesa => {
            const option = document.createElement('option');
            option.value = mesa.id;
            option.textContent = `Mesa: ${mesa.numero}`;
            mesaSelect.appendChild(option);
        });
    }

    mesaSelect.addEventListener('change', function() {
        const selectedMesaId = this.value;
        const selectedMesa = mesas.find(mesa => mesa.id == selectedMesaId);

        if (selectedMesa) {
            numPersonasInput.value = selectedMesa.capacidad;
        }
    });

    reservaForm.addEventListener('submit', function(event) {
        const selectedFecha = fechaSelect.value;
        const selectedHora = horaSelect.value;
        const selectedMesa = mesaSelect.value;

        const selectedHorario = horarios.find(horario => 
            horario.fecha === selectedFecha && 
            horario.hora === selectedHora && 
            horario.mesa_id == selectedMesa 
        );

        if (selectedHorario) {
            horarioIdInput.value = selectedHorario.id;

            // Mostrar alerta y permitir el envío del formulario
            alert('Reserva agregada. Puede ver su correo para más detalles.');
        } else {
            event.preventDefault();
            alert('Por favor, seleccione una combinación válida de fecha, hora y mesa.');
        }
    });
});
</script>

@endsection
