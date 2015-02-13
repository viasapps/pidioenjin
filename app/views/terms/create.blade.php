@extends('layouts.scaffold')

@section('main')

<h1>Create Term</h1>

{{ Form::open(array('route' => 'terms.store')) }}
    <ul>
        <li>
            {{ Form::label('term', 'Term:') }}
            {{ Form::text('term') }}
        </li>

        <li>
            {{ Form::label('slug', 'Slug:') }}
            {{ Form::text('slug') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


