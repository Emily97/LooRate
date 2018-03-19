@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Bathroom: {{ $bathroom->title }}
				</div>

				<div class="panel-body">
					<table class="table table-hover">
						<tbody>
							<tr>
								<td>Title</td>
								<td>{{ $bathroom->title }}</td>
							</tr>
							<tr>
								<td>Address</td>
								<td>{{ $bathroom->address }}</td>
							</tr>
							<tr>
								<td>Longitude</td>
								<td>{{ $bathroom->longitude }}</td>
							</tr>
							<tr>
								<td>Latitude</td>
								<td>{{ $bathroom->latitude }}</td>
							</tr>
							<tr>
								<td>Price</td>
								<td>{{ $bathroom->price }}</td>
							</tr>
							<tr>
								<td>Rating</td>
								<td>{{ $bathroom->rating }}</td>
							</tr>
						</tbody>
					</table>
					<a href="{{ route('admin.bathrooms.index') }}" class="btn btn-default">Back</a>
					<a href="{{ route('admin.bathrooms.edit', array('bathroom' => $bathroom)) }}" class="btn btn-warning">Edit</a>
				<form style="display:inline-block" method="POST" action="{{ route('admin.bathrooms.destroy', array('bathroom' => $bathroom)) }}">
					<input type="hidden" name="_method" value="DELETE">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="form-control btn btn-danger">Delete</button>
				</form>

										<h2>
                        Comments
                    </h2>
                    @if (count($bathroom->comments()->get()) == 0)
                    <p>There are no comments for this bathroom.</p>
                    @else
                    <table class="table">
                        <thead>
                            <th><strong>Title</strong></th>
                            <th>Body</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($bathroom->comments()->get() as $comment)
                            <tr>
                                <th>{{ $comment->title }}</th>
                                <th>{{ $comment->body }}</th>
                                <th>
                                    <form style="display:inline-block" method="POST" action="{{ route('admin.comments.destroy', array('id' => $bathroom->id, 'cid' => $comment->id)) }}">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                                    </form>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
 									@endif
					</div>
			</div>
		</div>
	</div>
</div>
@endsection
