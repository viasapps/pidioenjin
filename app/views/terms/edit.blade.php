@extends('layouts.scaffold')

@section('main')

<h1>Edit Term</h1>
{{ Form::model($term, array('method' => 'PATCH', 'route' => array('terms.update', $term->id))) }}
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
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
            {{ link_to_route('terms.show', 'Cancel', $term->id, array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop