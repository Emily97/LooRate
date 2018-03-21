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
					<a href="{{ route('user.bathrooms.index') }}" class="btn btn-default">Back</a>

					<h3>
                        Comments
                        <a href="{{ route('user.comments.create', $bathroom->id) }}" class="btn btn-link btn-bathroom-add">Add</a>
                    </h3>
                    @if (count($bathroom->comments()->get()) == 0)
                    <p>There are no comments for this bathroom.</p>
                    @else
                    <table class="table">
                        <thead>
                            <th>Title</th>
                            <th>Body</th>
                        </thead>
                        <tbody>
                            @foreach ($bathroom->comments()->get() as $comment)
                            <tr>
                                <th>{{ $comment->title }}</th>
                                <th>{{ $comment->body }}</th>
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
