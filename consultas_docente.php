<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Docentes</title>
</head>
<body>

    <h3>Crear o Editar Docente</h3>

    <form id="formDocente">
        <input type="hidden" name="accion" value="crear" id="accion">
        <input type="hidden" name="id_docente" id="id_docente">

        <table>
            <tr>
                <td><label>Tipo de Documento:</label></td>
                <td><input type="text" name="tipo_documento" id="tipo_documento"></td>
            </tr>
            <tr>
                <td><label>Número de Documento:</label></td>
                <td><input type="text" name="numero_documento" id="numero_documento"></td>
            </tr>
            <tr>
                <td><label>Nombres:</label></td>
                <td><input type="text" name="nombres" id="nombres"></td>
            </tr>
            <tr>
                <td><label>Apellidos:</label></td>
                <td><input type="text" name="apellidos" id="apellidos"></td>
            </tr>
            <tr>
                <td><label>Especialidad:</label></td>
                <td><input type="text" name="especialidad" id="especialidad"></td>
            </tr>
            <tr>
                <td><label>Descripción Especialidad:</label></td>
                <td><input type="text" name="descripcion_especialidad" id="descripcion_especialidad"></td>
            </tr>
            <tr>
                <td><label>Teléfono:</label></td>
                <td><input type="text" name="telefono" id="telefono"></td>
            </tr>
            <tr>
                <td><label>Dirección:</label></td>
                <td><input type="text" name="direccion" id="direccion"></td>
            </tr>
            <tr>
                <td><label>Email:</label></td>
                <td><input type="email" name="email" id="email"></td>
            </tr>
            <tr>
                <td><label>Declara Renta:</label></td>
                <td><input type="checkbox" name="declara_renta" id="declara_renta"></td>
            </tr>
            <tr>
                <td><label>Retenedor IVA:</label></td>
                <td><input type="checkbox" name="retenedor_iva" id="retenedor_iva"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="button" onclick="crearEditarDocente()">Guardar</button>
                </td>
            </tr>
        </table>
    </form>

    <h3>Consultar Docentes</h3>
    <button onclick="consultarDocentes()">Consultar</button>
    <div id="resultados"></div>

    <h3>Eliminar o Activar Docente</h3>
    <form id="formCambiarEstado">
        <table>
            <tr>
                <td><label>ID Docente:</label></td>
                <td><input type="text" name="id_docente" id="id_docente_eliminar"></td> <!-- Asegúrate de que este ID es correcto -->
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <button type="button" onclick="eliminarDocente()">Eliminar</button>
                </td>
                <td colspan="2" style="text-align: center;">
                    <button type="button" onclick="activarDocente()">Activar</button>
                </td>
            </tr>
        </table>
    </form>


    <script src="js_consultas/docente.js"></script>

</body>
</html>
