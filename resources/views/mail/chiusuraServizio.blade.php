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
        table {
            min-width: 380px;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid gray;
            text-align: start

        }
        span {
            font-weight: normal;
        }
    </style>
</head>

<body>
    <table>
        <tbody>
            <tr>
                <th>SYSTEM: <span>Telematica di bordo</span></th>
            </tr>
            <tr>
                <th>Event: <span> {{ $mail['event'] }} {{ $mail['train'] }}</span> </th>
            </tr>
            <tr>
                <th>User Impact: <span>{{ $mail['impact'] }}</span></th>
            </tr>
            <tr>
                <th>Impact to other systems (if known): </th>
            </tr>
            <tr>
                <th>Reported by: <span>Nomad Digital</span></th>
            </tr>
            <tr>
                <th>Supplier available at: <span>Nomad Digital</span></th>
                
            </tr>
            <tr>
                <th>Downtime start (expected): <span>{{ $mail['start_expected'] }}</span></th>
                
            </tr>
            <tr>
                <th>Downtime start (actual): <span>{{ $mail['start_actual'] }}</span></th>
                
            </tr>
            <tr>
                <th>Downtime end (expected): <span>{{ $mail['end_expected'] }}</span></th>
                
            </tr>
            <tr>
                <th>Downtime end (actual): </th>
            </tr>
        </tbody>
    </table>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script> --}}
</body>

</html>
