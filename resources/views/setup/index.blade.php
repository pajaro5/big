<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Setup</title>
</head>
<body>
    <div class="container">
        <h1>Periodo lectivo actual</h1>
        @foreach ($periodoLectivo as $periodo)
            <div class="panel panel-default">
                <div class="panel-body">
                    {{ $periodo->nombre }}
                    <br>                    
                <a href="importarData/{{ $periodo->id }}/{{ $periodo->nombre }}" class="btn btn-info" role="button">Importar datos</a>
                </div>
            </div>    
        @endforeach
        

    </div>
    
</body>
</html>