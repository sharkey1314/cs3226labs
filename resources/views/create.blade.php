@extends('template')

@section('link')
<link media="all" rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.3.6/css/fileinput.min.css">
@stop

@section('main')
<div class="container-fluid">
    <p>
        <b>Create New Student in CS3233 S2 AY 2016/17</b>
    </p>
    {!! Form::open(['files' => true]) !!}
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
    <div class="form-group">
        <label class="control-label">Upload a profile picture</label>
        <input name='image' id="input-1" type="file" class="file">
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    {!! Form::close() !!}
</div>
</div>
@stop

@section('script')
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/javascript-canvas-to-blob/3.6.0/js/canvas-to-blob.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.3.6/js/fileinput.min.js"></script>
@stop
