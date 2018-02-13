@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			@if (Session::has('message'))
			<p class="alert alert-success">{{ Session::get('message') }}</p>
			@endif
			<div class="panel panel-default">
				<div class="panel-heading">
					Bathrooms
				</div>

				<div class="panel-body">
				@if (count($bathrooms) === 0)
					<p>There are no bathrooms!</p>
				@else
					<table class="table table-hover">
						<thead>
							<th>Title</th>
							<th>Address</th>
							<th>Longitude</th>
							<th>Latitude</th>
							<th>Price</th>
							<th>Rating</th>
							<th>Actions</th>
						</thead>
						<tbody>
					@foreach ($bathrooms as $bathroom)
							<tr>
								<td>{{ $bathroom->title}}</td>
								<td>{{ $bathroom->address}}</td>
								<td>{{ $bathroom->longitude}}</td>
								<td>{{ $bathroom->latitude}}</td>
								<td>{{ $bathroom->price}}</td>
								<td>{{ $bathroom->rating}}</td>
								<td>
									<a href="{{route('user.bathrooms.show', array('bathroom' => $bathroom))}}" class="btn btn-default">View</a>
									<!-- <a href="{{route('user.bathrooms.edit', array('bathroom' => $bathroom))}}" class="btn btn-default">Edit</a>
									<form style="display:inline-block" method="POST" action="{{ route('user.bathrooms.destroy', array('bathroom' => $bathroom)) }}">
										<input type="hidden" name="_method" value="DELETE">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<button type="submit" class="form-control btn btn-danger">Delete</button>
										</form> -->
								</td>
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