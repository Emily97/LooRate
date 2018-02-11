@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Edit bathroom
				</div>

				<div class="panel-body">
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form method="POST" action="{{ route('bathrooms.update', array('bathroom' => $bathroom)) }}">
						<input type="hidden" name="_method" value="PUT">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" class="form-control" id="title" name="title" value="{{ old('title', $bathroom->title) }}"/>
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" id="address" name="address" value="{{ old('address', $bathroom->address) }}"/>
						</div>
						<div class="form-group">
							<label for="longitude">Longitude</label>
							<input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude', $bathroom->longitude) }}"/>
						</div>
						<div class="form-group">
							<label for="latitude">Latitude</label>
							<input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude', $bathroom->latitude) }}"/>
						</div>
						<div class="form-group">
							<label for="price">Price</label>
							<input type="text" class="form-control" id="price" name="price" value="{{ old('price', $bathroom->price) }}"/>
						</div>
						<div class="form-group">
							<label for="rating">Rating</label>
							<input type="text" class="form-control" id="rating" name="rating" value="{{ old('rating', $bathroom->rating) }}"/>
						</div>
						<a href="{{ route('bathrooms.index') }}" class="btn btn-default">Cancel</a>
						<button type="submit" class="btn btn-primary pull-right">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection