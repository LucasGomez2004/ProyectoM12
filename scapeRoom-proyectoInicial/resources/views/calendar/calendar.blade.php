@extends('adminlte::page')

@section('title', 'Calendario')

@section('content_header')
    <h1 class='text-center'><b>ESCAPE OR DIE</b></h1>
@stop

@section('content')
    <h5 class="text-center text-dark">Calendario</h5>
    <div class="card">
      <div id='calendar'></div>
    </div>
    
@stop

@section('css')
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/locales/es.js"></script>

<script>
      document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar')
        const calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'timeGridWeek',
          events: @json($reservations),
          locale: 'es',
          slotMinTime: '09:00:00',
          slotMaxTime: '22:00:00',
          height: 'auto',
          hiddenDays: [0],
          allDaySlot: false,
          slotLabelFormat: {
              hour: 'numeric',
              minute: '2-digit',
              omitZeroMinute: false,
              meridiem: false
          },
          handleWindowResize: true,

        })
        calendar.render()
      })
</script>
@stop
