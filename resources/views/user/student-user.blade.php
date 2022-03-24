@extends('layout.app')
@section('content')
    <h4>Etudiant: {{ $student->name }}</h4>
    <table class="table">
        <tr>
        
                <tr>
                <th>Informations personelles</th>
                </tr>
            <tr>
                
                <td>Name:</td>
                <td>{{$student->name}}</td>
            </tr>

            <tr>
            <td>Specialty</td>
            <td>{{$student->specialty}}</td>
            </tr> 
            
            <tr>
                <td>Level</td>
                <td>{{$student->level}}</td>
            </tr>

            <tr>
            <td></td>
            </tr>
        </tr>
        
        
        
       <tr>
       @foreach ($semestries as $semestry)
    
    <tr>
    <td><span>{{ $semestry->name }}</span> </td>
    </tr>


    <tr>
        <th> Ue</th>
        <th> Coef</th>
        <th> Note CC</th>        
        <th> Note SN</th>        
        <th> Note SEMESTRIEL</th>        
    </tr>
    @foreach ($notes as $note)
    
    <tr>
        <th> {{ $note->ue->name }}</th>       
        <th> {{ $note->ue->coef }}</th>       
        <th> {{ $note->cc }}</th>        
        <th> {{ $note->sn }}</th>        
        <th> {{ $note->semestriel }} </th>        
    </tr>
    @endforeach
<tr>
    <td>Moyenne</td>
    <td>{{ $moyenne }} / 20 </td>
</tr>
    <tr>
        <td><a id="print"  class="btn-sm btn-danger">Print</a></td>
    </tr>
            <tr>        
        @endforeach        
        </tr>

        
    </table>


@endsection