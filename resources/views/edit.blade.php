@extends('template')
@section('main')
<div class="container-fluid">
    <p>
        <b>Update profile of <?php echo $student->name ?></b>
    </p>
    {!! Form::open(['files' => true]) !!}
    <div class="form-group">
        {!! Form::label('nick', 'Nick name:', ['class' => 'control-label']) !!}
        @if ($errors->first('nick'))
            {!! $errors->first('nick', '<br /><small class="error">:message</small>') !!}
        @endif
        {!! Form::text('nick', $student->nick, ['class' => 'form-control']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('name', 'Full name:', ['class' => 'control-label']) !!}
        @if ($errors->first('name'))
            {!! $errors->first('name', '<br /><small class="error">:message</small>') !!}
        @endif
        {!! Form::text('name', $student->name, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('kattis', 'Kattis account:', ['class' => 'control-label']) !!}
        @if ($errors->first('kattis'))
            {!! $errors->first('kattis', '<br /><small class="error">:message</small>') !!}
        @endif
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon3">https://open.kattis.com/users/</span>
            {!! Form::text('kattis', $student->kattis, ['class' => 'form-control']) !!}
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
            $student->country_iso2,
            ['class' => 'form-control dropdown']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('mc', 'Mini Contests:', ['class' => 'control-label']) !!}
        @if ($errors->first('mc'))
            {!! $errors->first('mc', '<br /><small class="error">:message</small>') !!}
        @endif
        {!! Form::text('mc', $score["mc"], ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tc', 'Team Contests:', ['class' => 'control-label']) !!}
        @if ($errors->first('tc'))
            {!! $errors->first('tc', '<br /><small class="error">:message</small>') !!}
        @endif
        {!! Form::text('tc', $score["tc"], ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('hw', 'Homework:', ['class' => 'control-label']) !!}
        @if ($errors->first('hw'))
            {!! $errors->first('hw', '<br /><small class="error">:message</small>') !!}
        @endif
        {!! Form::text('hw', $score["hw"], ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('pb', 'Problem Bs:', ['class' => 'control-label']) !!}
        @if ($errors->first('pb'))
            {!! $errors->first('pb', '<br /><small class="error">:message</small>') !!}
        @endif
        {!! Form::text('pb', $score["pb"], ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('ks', 'Kattis Sets:', ['class' => 'control-label']) !!}
        @if ($errors->first('ks'))
            {!! $errors->first('ks', '<br /><small class="error">:message</small>') !!}
        @endif
        {!! Form::text('ks', $score["ks"], ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('ac', 'Achievements:', ['class' => 'control-label']) !!}
        @if ($errors->first('ac'))
            {!! $errors->first('ac', '<br /><small class="error">:message</small>') !!}
        @endif
        {!! Form::text('ac', $score["ac"], ['class' => 'form-control']) !!}
    </div>
    <div class="form-group col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
    {!! Form::close() !!}
</div>
</div>
@stop
