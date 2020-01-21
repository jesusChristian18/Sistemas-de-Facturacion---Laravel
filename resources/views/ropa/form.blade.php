Formulario de datos de la ropa


<br/>
<label for="Nombre">{{'Nombre'}}</label>
    <input type="text" name="Nombre" id="Nombre" value="{{isset($ropa->Nombre)?$ropa->Nombre:''}}">
    <br/>

    <label for="Marca">{{'Marca'}}</label>
    <input type="text" name="Marca" id="Marca"value="{{isset($ropa->Marca)?$ropa->Marca:''}}">
    <br/>

    <label for="Color">{{'Color'}}</label>
    <input type="text" name="Color" id="Color" value="{{isset($ropa->Color)?$ropa->Color:''}}">
    <br/>

    <label for="Foto">{{'Foto'}}</label>
    @if(isset($ropa->Foto))
    <img src=" {{ asset('storage').'/'.$ropa->Foto}}" alt="" width="200" height="150">
    <br/>
    @endif
    <input type="file" name="Foto" id="Foto" value="">
    <br/>

    <input type="submit" value="{{$Modo=='crear' ? 'Agregar':'Modificar'}}r">



    <a href="{{url ('ropa')}}">Regresar Producto</a>