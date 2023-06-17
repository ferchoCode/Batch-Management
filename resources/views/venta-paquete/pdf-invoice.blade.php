<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Aloha!</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
        .logo-header{background: url("img/tiluchinLogo.png");}
    </style>

</head>

<body>

    <table width="100%">
        <tr>
            <td valign="top"><div class="logo-header" alt="" width="150" /></div>
            <td align="right">
                <h3>BALNEARIO EL "TILUCHIN"</h3>
                <pre>
                Company representative name
                Company address
                Tax ID
                phone
                fax
            </pre>
            </td>
        </tr>

    </table>

    <table width="100%">
        <tr>
            <td><strong>Socio: </strong>{{$serviciopaquete[0]->socio}}</td>

        </tr>

    </table>

    <br />

    <table width="100%">
        <thead style="background-color: lightgray;">
            <tr>
                <th>#</th>
                <th>SERVICIO</th>
                <th>PRECIO</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($serviciopaquete as $serviciopaquetes)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$serviciopaquetes->servicio}}</td>
                    <td align="right">{{$serviciopaquetes->precio}}</td>
              
                </tr>
            @endforeach

        </tbody>

        <tfoot>
           
            <tr>
                <td colspan="1"></td>
                <td align="right">Total BS</td>
                <td align="right" class="gray">BS. {{$serviciopaquete[0]->monto}}</td>
            </tr>
        </tfoot>
    </table>

</body>

</html>
