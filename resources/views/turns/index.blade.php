@extends('layouts/header')

@section('content')
<h1>Testing Turns Index View</h1>


<dvi class = "row">
    <h3>turnos test</h3>
    @foreach ($turns as $key => $turn)
    <div class="col-sm-3">
        {{ $key }}
        <ol>
            @foreach ($turn as $day)
            <li>{{ $day }}</li>
            @endforeach
        </ol>
    </div>
    @endforeach
</dvi>



<div class="row">
    <div id="calendar"></div>
</div>

</div>
<script>
    $(document).ready(function() {

        // page is now ready, initialize the calendar...

        $('#calendar').fullCalendar({
            // put your options and callbacks here
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                    title: 'All Day Event',
                    start: '2015-02-01'
                },
                {
                    title: 'Long Event',
                    start: '2015-02-07',
                    end: '2015-02-10'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2015-02-09T16:00:00'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2015-02-16T16:00:00'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2015-02-15T16:00:00'
                },
                {
                    title: 'Conference',
                    start: '2015-02-11',
                    end: '2015-02-13'
                },
                {
                    title: 'Meeting',
                    start: '2015-02-12T10:30:00',
                    end: '2015-02-12T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2015-02-12T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2015-02-12T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2015-02-12T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2015-02-12T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2015-02-13T07:00:00'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2015-02-28'
                }
            ]

        });

    });

</script>

@stop
