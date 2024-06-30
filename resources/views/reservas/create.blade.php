@extends('layouts.app')

@section('content')
<div class="container">

@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Crear Nueva Reserva para Sucursal {{ $branch_id }}</h2>
    <form id="reservaForm" action="{{ route('reservas.store') }}" method="POST">
        @csrf
        <input type="hidden" name="branch_id" value="{{ $branch_id }}">
        <input type="hidden" id="horario_id" name="horario_id">

        <div class="form-group">
            <label for="fecha">Seleccionar Fecha</label>
            <select class="form-control" id="fecha" required>
                <option value="">Seleccionar Fecha</option>
                @foreach ($fechas as $fecha)
                    <option value="{{ $fecha }}">{{ $fecha }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="capacidad">Capacidad de la Mesa</label>
            <select class="form-control" id="capacidad" required disabled>
                <option value="">Seleccionar Capacidad</option>
                <!-- Las opciones de capacidad se llenarán dinámicamente con JavaScript -->
            </select>
        </div>
        
        <div class="form-group">
            <label for="hora">Seleccionar Hora</label>
            <select class="form-control" id="hora" name="hora" required disabled>
                <option value="">Seleccionar Hora</option>
                <!-- Las opciones de hora se llenarán dinámicamente con JavaScript -->
            </select>
        </div>
        
        <div class="form-group">
            <label for="mesa_id">Seleccionar Mesa</label>
            <select class="form-control" id="mesa_id" name="mesa_id" required disabled>
                <option value="">Seleccionar Mesa</option>
                <!-- Las opciones de mesa se llenarán dinámicamente con JavaScript -->
            </select>
        </div>

        <div class="form-group">
            <label for="cliente_nombre">Nombre del Cliente</label>
            <input type="text" class="form-control" id="cliente_nombre" name="cliente_nombre" value="{{ $user->name }}" required readonly>
        </div>
        <div class="form-group">
            <label for="cliente_email">Email del Cliente</label>
            <input type="email" class="form-control" id="cliente_email" name="cliente_email" value="{{ $user->email }}" required readonly>
        </div>
        <div class="form-group">
            <label for="cliente_telefono">Teléfono del Cliente</label>
            <input type="text" class="form-control" id="cliente_telefono" name="cliente_telefono" required>
        </div>

        <div class="form-group">
    <label for="num_personas"></label>
    <input type="hidden" class="form-control" id="num_personas" name="num_personas" required>
</div>

        
        <button type="submit" class="btn btn-primary">Guardar Reserva</button>
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
