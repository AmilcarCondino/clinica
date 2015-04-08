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
                {!! Form::label('birth_date', 'Nacimiento: ') !!}
                {!! Form::input('birth_date', date('Y-m-d'), ['class' => 'form-control']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('address', 'Domicilio: ') !!}
                {!! Form::text('address', null, ['class' => 'validate']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('send_for', 'Enviado Por: ') !!}
                {!! Form::text('send_for', null, ['class' => 'validate']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('occupation', 'Ocupacion: ') !!}
                {!! Form::text('occupation', null, ['class' => 'validate']) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('retired', 'Jubilado: ') !!}
                {!! Form::select('retired', [ '0' => 'No', '1' => 'Si' ], null) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('student', 'Estudiante: ') !!}
                {!! Form::select('student', [ '0' => 'No', '1' => 'Si' ], null) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('masc_atten', 'Atencion Masculina: ') !!}
                {!! Form::select('masc_atten', [ '0' => 'No', '1' => 'Si' ], null) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('fem_atten', 'Atencion Femenina: ') !!}
                {!! Form::select('fem_atten', [ '0' => 'No', '1' => 'Si' ], null) !!}
            </div>
            <div class="col-sm-6">
                {!! Form::label('pb_atten', 'Atencion Pb: ') !!}
                {!! Form::select('pb_atten', [ '0' => 'No', '1' => 'Si' ], null) !!}
            </div>
        </div>
        <div class="col-sm-6">
            {!! Form::submit($submitButtonText, ['class' => 'btn btn-sm-3 btn-success form-control']) !!}
        </div>
        <div class="col-sm-6">
            <a class="btn btn-block btn-danger" href="/pacientes" role="button">Cancelar</a>
        </div>
    </div>
</div>