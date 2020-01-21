Seccion para crear productos

<form action="{{url('/ropa')}}" method="post" enctype="multipart/form-data">
{{ csrf_field()}}

    @include('ropa.form',['Modo'=>'crear'])

</form>