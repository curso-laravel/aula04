@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Usuários</div>

                <div class="card-body">                    
                     <table>
                         <tr>
                             <th>id</th> 
                             <th>nome</th>
                         </tr>
                        @foreach ($usuarios as $usuario)
                        <tr> 
                            <td>{{$usuario->id}}</td> 
                            <td>{{$usuario->name}}</td> 
                        </tr>
                        @endforeach
                     </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
