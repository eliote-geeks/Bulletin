@extends('layout.app')

@section('content')

<table class="table">
    <tr>
        <td>ID</td>
        <td>Name</td>     
        <td>Update</td>
        <td>Delete</td>
    </tr>
    @forelse($semestries as $semestry)
    <tr>
        <td>{{$semestry->id}}</td>
        <td>{{$semestry->name}}</td>
        <td><a class="btn-sm btn-primary" href="{{ route('semestry.edit',$semestry) }}">Update</a></td>
        <td><a class="btn-sm btn-danger" href="{{ route('semestry.delete',$semestry) }}">Delete</a></td>
        @empty
        <span>No Semestries yet!!</span>
    </tr>
    @endforelse
</table>

@endsection