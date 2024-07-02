<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Time Catcher') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebars.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
    
    <!-- @vite(['resources/css/sidebars.css', 'resources/js/sidebars.js']) -->
    <!-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) -->

    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js" integrity="sha256-J8ay84czFazJ9wcTuSDLpPmwpMXOm573OUtZHPQqpEU=" crossorigin="anonymous"></script>
		
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">

    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/core/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css" rel="stylesheet" />

	 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.30.1/moment.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
     <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>


</head>
<body>
    <div id="app">

        <livewire:navbar/>
        <div class="container-fluid mt-1" style="padding-left:0px; height:55rem">
            <div class="row" style="height:55rem" >
                <div class="h-100 col-2 col-sm-auto p-0">
                    <livewire:ndt-side-bar/>
                </div>
                <div class="col p-0" style="height:55rem">
                    {{$slot}}
                </div>
            </div>
        </div>
        <div class="sticky-bottom w-100" style="position: fixed">
            <livewire:footer/>
        </div>
    </div>
    @if(Session::has('message'))
    <script>

        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true,
            "positionClass": "toast-bottom-right"
        }
                toastr.success("{{ session('message') }}");
    </script>
    @endif
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sidebars.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
<livewire:scripts>

    <script>
        
        window.addEventListener('show-form', event =>{
            $('#form').modal('show');
        })

        window.addEventListener('hide-form', event =>{
            $('#form').modal('hide');
        })

        window.addEventListener('show-update-modal', event =>{
            $('#update').modal('show');
        })

        window.addEventListener('hide-update-modal', event =>{
            $('#update').modal('hide');
        })
        window.addEventListener('show-delete-modal', event =>{
            $('#delete').modal('show');
        })

        window.addEventListener('hide-delete-modal', event =>{
            $('#delete').modal('hide');
        })
        $(document).ready(function(){

            $('.modal-dialog').draggable({
                handle: ".modal-header"
            });

            
        });
        $.fn.datepicker.dates['pl'] = {
            days: ["Niedziela", "Poniedziałek", "Wtorek", "Środa", "Czwartek", "Piątek", "Sobota"],
            daysShort: ["Niedz.", "Pon.", "Wt.", "Śr", "Czw.", "Pt.", "Sob."],
            daysMin: ["N", "P", "W", "Ś", "C", "P", "S"],
            months: ["Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"],
            monthsShort: ["Sty.", "Lut.", "Mar.", "Kwi.", "Maj", "Cze.", "Lip.", "Sie.", "Wrz.", "Paź", "Lis.", "Gru."],
            today: "Dzisiaj",
            clear: "Wyczyść",
            format: "dd/mm/yyyy",
            titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
            weekStart: 0
        };
        $(function(){
            $('.datepicker').datepicker({
                language:'pl',
                autoclose: true,
                todayBtn: 'linked',
                container: '.date',
                todayHighlight:true
                
            });
        });


        $(document).ready(function () {

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                buttonText: { today: "Dzisiaj",
                          month: "Miesiąc",
                          week: "Tydzień",
                          day: "Dzień",
                          listWeek: "Lista zadań",
                          
                         },         
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                height: 850,
                //initialView: 'dayGridMonth',
                events:"/events",
                timeZone: 'UTC',
                slotDuration: {
                    "hours": 1
                    },
                minTime: "07:00",
                maxTime: "23:00",
                initialView: "timeGridDay",
                selectConstraint: "businessHours",
                businessHours: { // Mon - Fri, 9-5
                daysOfWeek: [1, 2, 3, 4, 5,6],
                startTime: '07:00',
                endTime: '23:00',
                },
                eventClick:  function(info) {
                    $('#modalTitle').html(info.event.title);
                    $('#modalBody').html(info.event.description);
                    $('#eventUrl').attr('href',info.event.url);
                    $('#eventUrl').html(info.event.url);
                    $('#calendarModal').modal('show');
                    info.jsEvent.preventDefault();
                },

            });
            
            calendar.setOption('locale', 'pl');
            calendar.render();
      });
    
      $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#ToDoTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>
</html>
