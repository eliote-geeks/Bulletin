@extends('layout.app')

@section('content')
						<h3 class="title">Create semestry</h3>
						@if(session()->has('message'))
							<h2 class="alert alert-success">{{ session()->get('message') }}</h2>
						@endif
    						<form method="post" action="{{ route('semestry.store') }}">
                            @csrf
								<!-- Username -->
							<div class="mb-3">
								<label for="username" class="form-label"> Name</label>
								<input type="text" id="username" class="form-control" name="name" placeholder="Name"
									required />
					 @error('name')
                    {{-- The SetAttribute value field is not validated --}}
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
							</div>

							<div>
									<!-- Button -->
									<div class="d-grid">
								<button type="submit" class="btn btn-primary">
									Create Semestry
								</button>
								</div>
							</div>
							<hr class="my-4" />

						</form>

						<a class = "btn-sm btn-info" href="{{ route('semestries.view') }}">View All semestry</a>


@endsection

