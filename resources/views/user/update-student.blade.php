@extends('layout.app')

@section('content')
						<h3 class="title">Update Student  {{ $student->name }}</h3>
						@if(session()->has('message'))
							<h2 class="alert alert-success">{{ session()->get('message') }}</h2>
						@endif
    						<form method="post" action="{{ route('student.update',$student) }}">
                            @csrf
								<!-- Username -->
							<div class="mb-3">
								<label for="username" class="form-label">Student Name</label>
								<input type="text" id="username" class="form-control" name="name" placeholder="User Name"
								value="{{ $student->name }}"	 required />
					 @error('name')
                    {{-- The SetAttribute value field is not validated --}}
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
							</div>
								<!-- level -->
							<div class="mb-3">
								<label for="level" class="form-label">level</label>
								<input type="text" id="level" class="form-control" name="level" placeholder="level "
									value="{{ $student->level }}" required />
								@error('level')														
								<p style="color:red;">{{ $message }}</p>
								@enderror
							</div>
								<!-- specialty -->
							<div class="mb-3">
								<label for="specialty" class="form-label">specialty</label>
								<input type="text" id="specialty" class="form-control" name="specialty" placeholder="Specialty"
									value="{{ $student->specialty }}" required />
									@error('specialty')
									<p style="color:red;">{{ $message }}</p>
									@enderror
							</div>
							
							<div>
									<!-- Button -->
									<div class="d-grid">
								<button type="submit" class="btn btn-primary">
									edit student
								</button>
								</div>
							</div>
							<hr class="my-4" />

						</form>

						<a class = "btn-sm btn-info" href="{{ route('students.view') }}">View Students</a>


@endsection