<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">
                {!! Form::label('therapist_id', 'Terapeuta: ') !!}
                {!! Form::select('therapist_id', $therapists_id, null, ['class' => 'form-control']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('turn', 'Turno: ') !!}
                {!! Form::select('turn', [ '0' => 'Mañana', '1' => 'Tarde' ], null) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('start_date', 'Fecha de Inicio: ') !!}
                {!! Form::input('date', 'start_date', date('Y-m-d'), ['class' => 'form-control']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('end_date', 'Fecha de Finlazacion: ') !!}
                {!! Form::input('date', 'end_date', date('Y-m-d'), ['class' => 'form-control']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('monday', 'Lunes: ') !!}
                {!! Form::select('monday', [ '0' => 'No', '1' => 'Si' ], null) !!}
                {!! Form::label('tuesday', 'Martes: ') !!}
                {!! Form::select('tuesday', [ '0' => 'No', '2' => 'Si' ], null) !!}
                {!! Form::label('wednesday', 'Miercoles: ') !!}
                {!! Form::select('wednesday', [ '0' => 'No', '3' => 'Si' ], null) !!}
                {!! Form::label('thursday', 'Jueves: ') !!}
                {!! Form::select('thursday', [ '0' => 'No', '4' => 'Si' ], null) !!}
                {!! Form::label('friday', 'Viernes: ') !!}
                {!! Form::select('friday', [ '0' => 'No', '5' => 'Si' ], null) !!}
            </div>
        </div>
        <div class="col-sm-6">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-sm-3 btn-success form-control']) !!}
        </div>
        <div class="col-sm-6">
            <a class="btn btn-block btn-danger" href="/turnos_terapeutas" role="button">Cancelar</a>
        </div>
    </div>
</div>