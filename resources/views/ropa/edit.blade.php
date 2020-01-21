<form action="{{ url('/ropa/' . $ropa->id) }}" method="post" enctype="multipart/form-data">


{{ csrf_field()}}
{{ method_field('PATCH')}}

@include('ropa.form',['Modo'=>'editar'])
<br/>


</form>
