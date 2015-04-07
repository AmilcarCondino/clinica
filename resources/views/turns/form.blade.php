<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">
                {!! Form::label('therapist_id', 'Terapeuta: ') !!}
                {!! Form::select('therapist_id', $therapists, $therapist, ['class' => 'form-control']) !!}
            </div>
            @if (!is_null($patients))
                <div class="col-sm-6">
                    {!! Form::label('patient_id', 'Paciente: ') !!}
                    {!! Form::select('patient_id', $patients, null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('appointment', 'Turno: ') !!}
                    {!! Form::select('appointment', $appointment, null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('turn', 'Consultorio: ') !!}
                    {!! Form::select('turn', [ '0' => 'Mañana', '1' => 'Tarde' ], null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('office_id', 'Consultorio: ') !!}
                    {!! Form::select('office_id', $office_id, null, ['class' => 'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('observer_id', 'Observador: ') !!}
                    {!! Form::select('observer_id', $therapists, null, ['class' => 'form-control']) !!}
                </div>

            @endif
        </div>
        <div class="col-sm-6">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-sm-3 btn-success form-control']) !!}
        </div>
        <div class="col-sm-6">
            <a class="btn btn-block btn-danger" href="/turnos" role="button">Cancelar</a>
        </div>
    </div>
</div>