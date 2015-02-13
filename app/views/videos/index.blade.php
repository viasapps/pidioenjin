@extends('layouts.scaffold')

@section('main')

<h1>All Videos</h1>

<p>{{ link_to_route('videos.create', 'Add new video') }}</p>

@if ($videos->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Youtube_id</th>
				<th>Author</th>
				<th>Title</th>
				<th>Excerpt</th>
				<th>Views</th>
				<th>Likes</th>
				<th>Aspect_ratio</th>
				<th>Duration</th>
				<th>Thumbnail</th>
				<th>Thumbnail_mq</th>
				<th>Thumbnail_hq</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($videos as $video)
                <tr>
                    <td>{{{ $video->youtubeid }}}</td>
					<td>{{{ $video->author }}}</td>
					<td>{{{ $video->title }}}</td>
					<td>{{{ $video->excerpt }}}</td>
					<td>{{{ $video->views }}}</td>
					<td>{{{ $video->likes }}}</td>
					<td>{{{ $video->aspect_ratio }}}</td>
					<td>{{{ $video->duration }}}</td>
					<td>{{{ $video->thumbnail }}}</td>
					<td>{{{ $video->thumbnail_mq }}}</td>
					<td>{{{ $video->thumbnail_hq }}}</td>
                    <td>{{ link_to_route('videos.edit', 'Edit', array($video->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('videos.destroy', $video->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no videos
@endif

@stop