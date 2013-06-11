@layout('admin.administradores.main')

@section('menu_admin')
    @parent
@endsection

@section('contenido_admin')
    <h3>Nuevo Administrador</h3>
    <div style="padding: 10px; text-align: center; background-color: #f7f7f7; border: solid 1px #efefef; width: 300px; margin: 0 auto; margin-bottom: 20px;">Todos los campos con asterisco son requeridos</div>
    {{Form::open()}}
    <table align="center">
        <tr>
            <td>
                {{Form::label('txtNombre','Nombre *')}}
            </td>
            <td>
                {{Form::text('txtNombre', Input::old('txtNombre'))}}
            </td>
        </tr>
        <tr>
            <td>
                {{Form::label('txtApp','Apellido Paterno *')}}
            </td>
            <td>
                {{Form::text('txtApp', Input::old('txtApp'))}}
            </td>
        </tr>
        <tr>
            <td>
                {{Form::label('txtApm','Apellido Materno')}}
            </td>
            <td>
                {{Form::text('txtApm', Input::old('txtApm'))}}
            </td>
        </tr>
        <tr>
            <td>
                {{Form::label('txtDireccion','Direccion *')}}
            </td>
            <td>
                {{Form::text('txtDireccion', Input::old('txtDireccion'))}}
            </td>
        </tr>
        <tr>
            <td>
                {{Form::label('txtTelefono','Telefono * ')}}
            </td>
            <td>
                {{Form::telephone('txtTelefono', Input::old('txtTelefono'))}}
            </td>
        </tr>
        <tr>
            <td>
                {{Form::label('txtEmail','E-Mail')}}
            </td>
            <td>
                {{Form::email('txtEmail', Input::old('txtEmail'))}}
            </td>
        </tr>
        <tr>
            <td>
                {{Form::label('txtNombreAdmin', 'Nik Name *')}}
            </td>
            <td>
                {{Form::text('txtNombreAdmin', Input::old('txtNombreAdmin'))}}
            </td>
        </tr>
        <tr>
            <td>
                {{Form::label('txtPassword', 'Password *')}}
            </td>
            <td>
                {{Form::password('txtPassword')}}
            </td>
        </tr>
        <tr>
            <td>
                {{Form::label('txtCPassword', 'Confirmar Password *')}}
            </td>
            <td>
                {{Form::password('txtCPassword')}}
            </td>
        </tr>
        <tr>
            <td colspan="2" align="right">
                {{Form::submit('Crear')}}
            </td>
        </tr>
    </table>
    {{Form::close()}}
@endsection