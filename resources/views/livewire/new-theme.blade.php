<div class="container">
    <div class="card">
        <div id='calendar'></div>
    </div>
    <div class="modal fade" id="calendarModal" wire:ignore.self data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog draggable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalTitle"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <a href="" id="eventUrl"></a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuluj</button>
                        <button type="submit" class="btn btn-primary">Usuń</button>
                    </div>
                </div>
        </div>
    </div>
</div>

<script>
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