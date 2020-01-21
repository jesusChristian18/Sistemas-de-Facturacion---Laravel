
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif

<a href="{{url ('ropa/create')}}">Agregar Producto</a>

<table class="table">
  <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Foto</th>
            <th scope="col">Nombre</th>
            <th scope="col">Color</th>
            <th scope="col">Talla</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ropa as $ropa)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>
                <img src=" {{ asset('storage').'/'.$ropa->Foto}}" alt="" width="200" height="150">
              
            </td>
            <td>{{$ropa->Nombre}}</td>
            <td>{{$ropa->Color}}</td>
            <td>{{$ropa->Talla}}</td>
            <td>
            <a href="{{ url('/ropa/'.$ropa->id.'/edit') }}" class="btn btn-success">Editar</a>    
            
            
            | 
                <form method="post" action="{{ url('/ropa/'.$ropa->id) }}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit" onclick="return confirm('¿Borrar?');">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>