@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $erro)
                <p>{{$erro}}</p>
                @endforeach                
            </div>
            @endif
            <div class="card">
                <div class="card-header">Heróis</div>

                <div class="card-body">                    
                     <table>
                         <tr>
                             <th>id</th> 
                             <th>nome</th>
                         </tr>
                        @foreach ($herois as $heroi)
                        <tr> 
                            <td>{{$heroi->id}}</td> 
                            <td>{{$heroi->nome}}</td> 
                        </tr>
                        @endforeach
                     </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
