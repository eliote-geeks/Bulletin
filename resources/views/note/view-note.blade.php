@extends('layout.app')

@section('content')

<table class="table">
    <tr>
        <td>ID</td>
        <td>Student</td>
        <td>Ue</td>
        <td>Note CC</td>  
        <td>Note SN</td>  
        <td>Update</td>
        <td>Delete</td>
    </tr>
    @forelse($notes as $note)
    <tr>
        <td>{{$note->id}}</td>
        <td>{{$note->student->name}}</td>
        <td>{{$note->ue->name}}</td>
        <td>{{$note->cc}}</td>
        <td>{{$note->sn}}</td>
        <td><a class="btn-sm btn-primary" href="{{ route('note.edit',$note) }}">Update</a></td>
        <td><a class="btn-sm btn-danger" href="{{ route('note.delete',$note) }}">Delete</a></td>
        @empty
        <span>No Notes yet!!</span>
    </tr>
    @endforelse
</table>

@endsection