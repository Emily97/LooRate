@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					Add new bathroom
				</div>

				<div class="panel-body">
					@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form method="POST" action="{{ route('admin.bathrooms.store')}} ">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label for="title">Title</label>
							<input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" />
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" />
						</div>
						<div class="form-group">
							<label for="longitude">Longitude</label>
							<input type="text" class="form-control" id="longitude" name="longitude" value="{{ old('longitude') }}" />
						</div>
						<div class="form-group">
							<label for="latitude">Latitude</label>
							<input type="text" class="form-control" id="latitude" name="latitude" value="{{ old('latitude') }}" />
						</div>
						<div class="form-group">
							<label for="price">Price</label>
							<input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" />
						</div>
						<div class="form-group">
							<label for="rating">Rating</label>
							<input type="text" class="form-control" id="rating" name="rating" value="{{ old('rating') }}" />
						</div>
						<a href="{{ route('admin.bathrooms.index') }}" class="btn btn-default">Cancel</a>
						<button type="submit" class="btn btn-primary pull-right">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection