<!DOCTYPE html>
<html lang="en">
<base href="/public">
@include('user.css')
<body>
  <!-- Page content -->
  <div class="bg-white">
  @include('user.navbar')

        <div class="container">
            <div class="row">
                <h1 class="text-center" style="margin-top:15px; text-transform:uppercase;">Edit Tag {{ $tag->name }}</h1>
                       <form class="row" method="post" enctype="multipart/form-data" action="{{route('tags.update',$tag) }}">
                       @method('put')
                       @csrf
            @if(session()->has('message'))
              <span class="alert alert-success">{{ session()->get('message') }}</span>
            @endif
                   <!-- form group -->
                <div class="mb-3 col-12 col-md-6">
                  <label
                    class="form-label"for="fname">Name:<span
                      class="text-danger">*</span></label>
                  <input class="form-control" type="text" name="name" value="{{ $tag->name }}"
                    id="fname" placeholder="name"/>
                    @error('name')
                    {{-- The SetAttribute value field is not validated --}}
                    <p style="color:red;">{{ $message }}</p>
                    @enderror
                </div>

                  <!-- button -->
                <div class=" col-12">
                  <button type="submit" class="btn btn-primary btn-block">
                    Submit
                  </button>
                </div>
                 <div class="text-center mb-12 col-12 col-md-12">
                  <a href="{{route('tags.index')}}" class="btn-sm btn-primary btn-block">
                    tag List
                  </a>
              </form>
            </div>
        </div>

  </div>
@include('user.script')
</body>

</html>