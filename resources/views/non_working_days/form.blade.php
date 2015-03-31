<div class="row">
    <div class="col-sm-12">
        <div class="row">

            <div class="col-sm-6">
                {!! Form::label('date', 'Fecha: ') !!}
                {!! Form::input('date', 'date', date('Y-m-d'), ['class' => 'form-control']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('holiday', 'Feriado: ') !!}
                {!! Form::select('holiday', [ '0' => 'No', '1' => 'Si' ], null) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('ateneo', 'Ateneo:') !!}
                {!! Form::select('ateneo', [ '0' => 'No', '1' => 'Si' ], null) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('course', 'Curso: ') !!}
                {!! Form::text('course', null, ['class' => 'validate']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('note', 'Aclaraciones: ') !!}
                {!! Form::text('note', null, ['class' => 'validate']) !!}
            </div>
        </div>
        <div class="col-sm-6">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-sm-3 btn-success form-control']) !!}
        </div>
        <div class="col-sm-6">
            <a class="btn btn-block btn-danger" href="/dias_no_laborales" role="button">Cancelar</a>
        </div>
    </div>
</div>