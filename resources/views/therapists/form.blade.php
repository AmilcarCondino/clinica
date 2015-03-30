<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-sm-6">
                {!! Form::label('name', 'Nombre: ') !!}
                {!! Form::text('name', null, ['class' => 'validate']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('last_name', 'Apellido: ') !!}
                {!! Form::text('last_name', null, ['class' => 'validate']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('dni', 'D.N.I.: ') !!}
                {!! Form::text('dni', null, ['class' => 'validate']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('phone', 'Telefono: ') !!}
                {!! Form::text('phone', null, ['class' => 'validate']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('cell_phone', 'Celular: ') !!}
                {!! Form::text('cell_phone', null, ['class' => 'validate']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('career_year', 'Año de curso: ') !!}
                {!! Form::text('career_year', null, ['class' => 'validate']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('email', 'Email: ') !!}
                {!! Form::text('email', null, ['class' => 'validate']) !!}
            </div>
        </div>
        <div class="col-sm-6">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-sm-3 btn-success form-control']) !!}
        </div>
        <div class="col-sm-6">
            <a class="btn btn-block btn-danger" href="/Therapists" role="button">Cancelar</a>
        </div>
    </div>
</div>