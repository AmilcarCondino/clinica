@extends('layouts/header')

@section('content')
<h1>Testing Calendar Index View</h1>


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
            businessHours: false,
            editable: false,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {"title":"turno libre","start":"2015-04-13T09:00:00","end":"2015-04-13T10:00:00","backgroundColor":"green"},{"title":"turno libre","start":"2015-04-13T10:00:00","end":"2015-04-13T11:00:00","backgroundColor":"green"},{"title":"Perez","start":"2015-04-13T11:00:00","end":"2015-04-13T12:00:00","backgroundColor":"red"},{"title":"turno libre","start":"2015-04-13T15:00:00","end":"2015-04-13T16:00:00","backgroundColor":"red"},{"title":"Perez","start":"2015-04-13T16:00:00","end":"2015-04-13T17:00:00","backgroundColor":"red"},{"title":"turno libre","start":"2015-04-13T17:00:00","end":"2015-04-13T18:00:00","backgroundColor":"red"}            ]
        });

    });

</script>

@stop
