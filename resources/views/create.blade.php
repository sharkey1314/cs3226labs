@extends('template')
@section('main')
<div class="container-fluid">
    <p>
        <b>Create New Student in CS3233 S2 AY 2016/17</b>
    </p>
    {!! Form::open() !!}
    <div class="form-group">
        {!! Form::label('nick', 'Nick name:', ['class' => 'control-label']) !!}
        @if ($errors->first('nick'))
            {!! $errors->first('nick', '<br /><small class="error">:message</small>') !!}
        @endif
        {!! Form::text('nick', null, ['class' => 'form-control']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('name', 'Full name:', ['class' => 'control-label']) !!}
        @if ($errors->first('name'))
            {!! $errors->first('name', '<br /><small class="error">:message</small>') !!}
        @endif
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('kattis', 'Kattis account:', ['class' => 'control-label']) !!}
        @if ($errors->first('kattis'))
            {!! $errors->first('kattis', '<br /><small class="error">:message</small>') !!}
        @endif
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">https://open.kattis.com/users/</span>
            {!! Form::text('kattis', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('country', 'Nationality:', ['class' => 'control-label']) !!}
        @if ($errors->first('country'))
            {!! $errors->first('country', '<br /><small class="error">:message</small>') !!}
        @endif
        <br />
        {!! Form::select('country', [
            'SG' => 'SGP - Singaporean',
            'CN' => 'CHN - Chinese',
            'VN' => 'VNM - Vietnamese',
            'ID' => 'IDN - Indonesia',
            'OT' => 'Other Nationality'
            ],
            null,
            ['placeholder' => 'Select Nationality'],
            ['class' => 'form-control dropdown']) !!}
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    {!! Form::close() !!}
</div>
</div>
@stop
