@extends('layout.app')
@section('content')
<base href="/public">
<table class="table">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Coef</td>        
        <td>Semestre</td>        
        <td>Update</td>
        <td>Delete</td>
    </tr>
    @forelse($ues as $ue)
    <tr>
        <td>{{$ue->id}}</td>
        <td>{{$ue->name}}</td>
        <td>{{$ue->coef}}</td>
        <td>{{$ue->semestry->name}}</td>
        <td><a class="btn-sm btn-primary" href="{{ route('ue.edit',$ue) }}">Update</a></td>
        <td><a class="btn-sm btn-danger" href="{{ route('ue.delete',$ue) }}">Delete</a></td>
        @empty
        <span>No Ues yet!!</span>
    </tr>
    @endforelse
</table>

@endsection