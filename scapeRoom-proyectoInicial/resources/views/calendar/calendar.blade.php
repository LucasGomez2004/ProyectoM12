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
    <style>
        .fc .fc-button-group .fc-button {
            background-color: white  !important;
            border-color: #dc3545 !important;
            color: #dc3545 !important;
        }

        .fc-col-header-cell a {
          color: #dc3545 !important;
        }

        .fc-daygrid-day-number {
          color: black !important;
        }

        .fc-dayGridMonth-view .fc-event-title {
          color: #dc3545 !important;
        }

        .fc-dayGridMonth-view .fc-event-time{
          color:black !important;
        }

        .fc-addReservationButton-button {
        background-color: #007bff !important;
        color: white !important;
        border-color:#007bff !important;
        }

    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/locales/es.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const calendarEl = document.getElementById('calendar');
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
                eventColor: '#dc3545',
                nowIndicator: true,
                headerToolbar: {
                    start: 'dayGridMonth,timeGridWeek,timeGridDay addReservationButton',
                    center: 'title',
                    end: 'today prev,next'
                },
                buttonText: {
                    today: 'Hoy',
                    month: 'Mes',
                    week: 'Semana',
                    day: 'Día',
                    list: 'Lista',
                },
                customButtons: {
                    addReservationButton: {
                        text: 'Reservar',
                        click: function() {
                            window.location.href = "{{ route('reservation.new') }}";
                        }
                    }
                }
            });
            
            calendar.render();
        });
    </script>
@stop
