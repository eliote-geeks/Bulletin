@extends('layout.app')

@section('content')
						<h3 class="title">Create Note</h3>
						@if(session()->has('message'))
							<h2 class="alert alert-success">{{ session()->get('message') }}</h2>
						@endif
    						<form method="post" action="{{ route('note.store') }}">
                            @csrf
								<!-- Username -->
							
							<div class="mb-3">
								<label for="student_id" class="form-label">Students</label>
								<select id="student_id" class="form-control" name="student_id"
									required >
									<option disabled>--Choose Student--</option>
									@foreach ($students as $student)
									<option value="{{ $student->id }}">{{ $student->name }}</option>										
									@endforeach

								</select>										
								@error('student_id')														
								<p style="color:red;">{{ $message }}</p>
								@enderror
							</div>			

							<div class="mb-3">
								<label for="ue_id" class="form-label">Ue</label>
								<select id="ue_id" class="form-control" name="ue_id"
									required >
									<option disabled>--Choose Ue--</option>
									@foreach ($ues as $ue)
									<option value="{{ $ue->id }}">{{ $ue->name }}</option>										
									@endforeach

								</select>										
								@error('ue_id')														
								<p style="color:red;">{{ $message }}</p>
								@enderror
							</div>			

			<div class="mb-3">
								<label for="username" class="form-label">Note CC</label>
								<input type="number" id="username" class="form-control" name="cc" placeholder="Content"
									required />
					 @error('cc')
                    {{-- The SetAttribute value field is not validated --}}
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
							</div>
							
							
				<div class="mb-3">
								<label for="username" class="form-label">Note SN</label>
								<input type="number" id="username" class="form-control" name="sn" placeholder="Content"
									required />
					 @error('sn')
                    {{-- The SetAttribute value field is not validated --}}
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
							</div>

							<div>
									<!-- Button -->
									<div class="d-grid">
								<button type="submit" class="btn btn-primary">
									Create note
								</button>
								</div>
							</div>
							<hr class="my-4" />

						</form>

						<a class = "btn-sm btn-info" href="{{ route('notes.view') }}">View All notes</a>


@endsection

