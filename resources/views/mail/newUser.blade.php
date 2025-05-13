<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
    <style>

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: white;
            /* box-shadow: 0px 8px 27px 4px #474747; */
            padding: 20px;
        }

        img {
            width: 200px;
        }

    </style>
</head>

<body>
    <img src="{{asset('asset/nd_maxi.jpg')}}" alt="nomad_logo_big">
    <div class="container">
        <h1>Benvenuto in Nomad Service Desk</h1>
        <h2>Ciao {{ ucfirst($newUser['name']) }},</h2>

        <p style="font-size: 18px;">La tua mail di accesso è {{ $newUser['email']}}</p>
        <p style="font-size: 18px;">La tua password temporanea è 12345678</p>

        <small>Modifica la password nell'area profilo personale</small>
        
        {{-- <p>questo è il link per impostare la password <a href="https://localhost:8000">clicca qui!</a></p> --}}
    </div>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script> --}}
</body>

</html>
