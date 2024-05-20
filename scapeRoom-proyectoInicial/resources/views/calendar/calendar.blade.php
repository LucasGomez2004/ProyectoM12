@extends('adminlte::page')

@section('title', 'Calendario')

@section('content_header')
{{ Breadcrumbs::render('calendario') }}
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

        @media (max-width: 1000px) {
            .fc-event-title.fc-sticky {
                font-size: 11px !important;
            }
        }

        @media (max-width: 736px) {
            .fc .fc-toolbar.fc-header-toolbar  {
                display: flex;
                flex-wrap: wrap;
                justify-content: flex-start;
            }

            .fc-toolbar-title#fc-dom-1 {
                font-size: 15px;
                padding-left:10px;
                padding-right:10px;
            }
        }

         @media (max-width: 670px) {
            .fc-button-group .fc-button {
                font-size: 12px;
                padding: 5px 10px;
            }
        }

        

        @media (max-width: 500px) {
            .fc-event-title.fc-sticky {
                font-size: 7px !important;
            }

            .fc-header-toolbar.fc-toolbar .fc-toolbar-chunk {
                padding:10px;
            }
        }

    </style>
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                handleWindowResize: true,
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
                },
                eventClick: function(info) {
                    Swal.fire({
                        title: info.event.title,
                        html: '<b>Fecha:</b> ' + info.event.start.toLocaleDateString() + '<br>' +
                            '<b>Hora de inicio:</b> ' + info.event.start.toLocaleTimeString() + '<br>' +
                            '<b>Hora de fin:</b> ' + info.event.end.toLocaleTimeString(),
                        icon: 'info'
                    });
                }
            });
            
            calendar.render();
            calendar.updateSize();
        });
    </script>
@stop
