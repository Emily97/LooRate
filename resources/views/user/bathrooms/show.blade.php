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
					<a href="{{ route('user.bathrooms.index') }}" class="btn btn-default">Back</a>
			</div>
		</div>
	</div>
</div>
@endsection
