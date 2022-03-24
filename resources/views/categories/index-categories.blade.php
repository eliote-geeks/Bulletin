<!DOCTYPE html>
<html lang="en">


<base href="/public">
@include('user.css')
<body>
	<!-- Page content -->
	<div class="bg-white">
		<!-- navbar login -->
@include('user.navbar')



  <div class="py-lg-16 py-10">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-right-md-6 col-12 mb-6">
          <!-- caption -->
          <h2 class="display-4 mb-3 fw-bold">Categories List</h2>
        </div>
      </div>
            <div align="center"><a href="{{route('categories.create')}}" class="btn-sm btn-primary">Create category</a></div><br>
            @if(session()->has('message'))
              <p class="alert alert-success">{{ session()->get('message') }}</p>
            @endif
      <div class="row">
    @forelse ($categories as $categorie)
        <div class="col-md-4 col-12">
           <!-- card -->
          <div class="card mb-4 mb-lg-0">
             <!-- card body -->
            <div class="card-body p-5">
               <!-- icon -->
              <div class="mb-3"><i class="mdi mdi-account-group mdi-48px text-primary lh-1 "></i></div>
              <h3 class="mb-2">{{$categorie->name}}</h3>
                <a href="{{ route('categories.edit',$categorie) }}" class="btn-sm btn-info">Edit</a>
                <a href="{{route('categories.destroy',$categorie)}}" class="btn-sm btn-danger" onclick="return(confirm('Are you sure to delete this category ? This action destroy all your blog post of this category '))">Delete</a>
            </div>
          </div>
        </div>
@empty
<p>No category yet!!</p>
        @endforelse 
    {{-- {{$categories->links() }} --}}

      </div>
    </div>
  </div>

  </div>

@include('user.script')
</body>

</html>