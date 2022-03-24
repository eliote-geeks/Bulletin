@extends('layout.app')

@section('content')

<table class="table">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Level</td>        
        <td>Specialty</td>        
        <td>Details</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>
    @forelse($students as $student)
    <tr>
        <td>{{$student->id}}</td>
        <td>{{$student->name}}</td>
        <td>{{$student->level}}</td>
        <td>{{$student->specialty}}</td>
        <td><a class="btn-sm btn-info" href="{{ route('students.detail',$student) }}">Details</a></td>
        <td><a class="btn-sm btn-primary" href="{{ route('student.edit',$student) }}">Update</a></td>
        <td><a class="btn-sm btn-danger" href="{{ route('student.delete',$student) }}">Delete</a></td>
        @empty
        <span>No students yet!!</span>
    </tr>
    @endforelse
</table>

@endsection