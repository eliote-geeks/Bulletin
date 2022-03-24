@extends('layout.app')

@section('content')
						<h3 class="title">Create Ue</h3>
						@if(session()->has('message'))
							<h2 class="alert alert-success">{{ session()->get('message') }}</h2>
						@endif
    						<form method="post" action="{{ route('ue.store') }}">
                            @csrf
								<!-- Username -->
							<div class="mb-3">
								<label for="username" class="form-label"> Name</label>
								<input type="text" id="username" class="form-control" name="name" placeholder="Ue's Name"
									required />
					 @error('name')
                    {{-- The SetAttribute value field is not validated --}}
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
							</div>
								<!-- coef -->
							<div class="mb-3">
								<label for="coef" class="form-label">coef</label>
								<input type="number" id="coef" class="form-control" name="coef" placeholder="coef "
									required />
								@error('coef')														
								<p style="color:red;">{{ $message }}</p>
								@enderror
							</div>

							<div class="mb-3">
								<label for="semestry_id" class="form-label">semestry</label>
								<select id="semestry_id" class="form-control" name="semestry_id"
									required >
									<option disabled>--Choose Semestry--</option>
									@foreach ($semestries as $semestry)
									<option value="{{ $semestry->id }}">{{ $semestry->name }}</option>										
									@endforeach

								</select>										
								@error('semestry_id')														
								<p style="color:red;">{{ $message }}</p>
								@enderror
							</div>							
							<div>
									<!-- Button -->
									<div class="d-grid">
								<button type="submit" class="btn btn-primary">
									Create Ue
								</button>
								</div>
							</div>
							<hr class="my-4" />

						</form>

						<a class = "btn-sm btn-info" href="{{ route('ues.view') }}">View All ues</a>


@endsection

