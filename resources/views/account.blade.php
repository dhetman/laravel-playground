@extends('layouts.master')

@section('title')
	Account
@endsection

@section('content')
	<section class="row new-post">
		<div class="col-md-6 col-md-offset-3">
			<header><h3>Your account</h3></header>
			<form action="{{route('accountsave')}}" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="first_name">First name</label>
					<input type="text" name="first_name" id="first_name" class="form-control" value="{{$user->first_name}}" />
				</div>
				<div class="form-group">
					<label for="image">Image (only .jpg)</label>
					<input type="file" name="image" id="image" class="form-control" />
				</div>
				<button type="submit" class="btn btn-primary">Save Account</button>
				<input type="hidden" name="_token" value="{{Session::token()}}" />
			</form>
		</div>
	</section>
	@if(Storage::disk('local')->has($user->first_name . '-' . $user->id . '.jpg'))
		<section class="row new-post">
			<div class="col-md-6 col-md-offset-3">
				<img src="{{route('accountimage', ['filename' => $user->first_name . '-' . $user->id . '.jpg'])}}" alt="" class="img-responsive">
			</div>
		</section>

	@endif
@endsection