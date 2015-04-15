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
            eventLimit: false,
            events: <?php echo $completa; ?>
        });

    });

</script>

@stop
