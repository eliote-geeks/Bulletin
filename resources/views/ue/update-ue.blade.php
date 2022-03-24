@extends('layout.app')

@section('content')
						<h3 class="title">Update ue:  {{ $ue->name }}</h3>
						@if(session()->has('message'))
							<h2 class="alert alert-success">{{ session()->get('message') }}</h2>
						@endif
    						<form method="post" action="{{ route('ue.update',$ue) }}">
                            @csrf
								<!-- Username -->
							<div class="mb-3">
								<label for="username" class="form-label"> Name</label>
								<input type="text" id="username" class="form-control" name="name" placeholder="Ue's Name"
								value="{{ $ue->name }}"	 required />
					 @error('name')
                    {{-- The SetAttribute value field is not validated --}}
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
							</div>

								<!-- level -->
							<div class="mb-3">
								<label for="level" class="form-label">coef</label>
								<input type="number" id="level" class="form-control" name="coef" placeholder="coef "
									value="{{ $ue->coef }}" required />
								@error('coef')														
								<p style="color:red;">{{ $message }}</p>
								@enderror
							</div>
							<div class="mb-3">
								<label for="semestry_id" class="form-label">semestry</label>
								<select id="semestry_id" class="form-control" name="semestry_id"
									required >
									@foreach ($semestries as $semestry)
									<option value="{{ $semestry->id }}">{{ $semestry->name }}</option>										
									@endforeach
								</select>		
								<input class="form-control" value="{{ $ue->semestry->name }}">								
								@error('semestry_id')														
								<p style="color:red;">{{ $message }}</p>
								@enderror
							</div>							
							
							<div>
									<!-- Button -->
									<div class="d-grid">
								<button type="submit" class="btn btn-primary">
									edit Ue
								</button>
								</div>
							</div>
							<hr class="my-4" />

						</form>

						<a class = "btn-sm btn-info" href="{{ route('ues.view') }}">View Ues</a>


@endsection