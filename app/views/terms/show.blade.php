@extends('layouts.scaffold')

@section('main')

<h1>Show Term</h1>

<p>{{ link_to_route('terms.index', 'Return to all terms') }}</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Term</th>
				<th>Slug</th>
        </tr>
    </thead>

    <tbody>
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
    </tbody>
</table>

@stop