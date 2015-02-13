@extends('layouts.scaffold')

@section('main')

<h1>All Terms</h1>

<p>{{ link_to_route('terms.create', 'Add new term') }}</p>

@if ($terms->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Term</th>
				<th>Slug</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($terms as $term)
                <tr>
                    <td>{{{ $term->term }}}</td>
					<td>{{{ $term->slug }}}</td>
                    <td>{{ link_to_route('terms.edit', 'Edit', array($term->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('terms.destroy', $term->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no terms
@endif

@stop