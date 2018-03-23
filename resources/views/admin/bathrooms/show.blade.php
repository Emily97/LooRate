@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Bathroom: {{ $bathroom->title }}</h3>
				</div>

				<div class="panel-body">
					<table class="table table-hover">
						<tbody>
							<tr>
								<th>Title</th>
								<td>{{ $bathroom->title }}</td>
							</tr>
							<tr>
								<th>Address</th>
								<td>{{ $bathroom->address }}</td>
							</tr>
							<tr>
								<th>Longitude</th>
								<td>{{ $bathroom->longitude }}</td>
							</tr>
							<tr>
								<th>Latitude</th>
								<td>{{ $bathroom->latitude }}</td>
							</tr>
							<tr>
								<th>Price</th>
								<td>{{ $bathroom->price }}</td>
							</tr>
							<tr>
								<th>Rating</th>
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
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>
                        Comments
                    </h2>
				</div>
				<div class="panel-body">
                    @if (count($bathroom->comments()->get()) == 0)
                    <p>There are no comments for this bathroom.</p>
                    @else
                    <table class="table table-hover">
                        <thead>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach ($bathroom->comments()->get() as $comment)
                            <tr>
                                <td>{{ $comment->title }}</td>
                                <td>{{ $comment->body }}</td>
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
