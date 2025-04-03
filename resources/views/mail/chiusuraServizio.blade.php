<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <table>
        <tbody>
            <tr>
                <th class="border">System: </th>
                <td class="border">Telematica di bordo</td>
            </tr>
            <tr>
                <th class="border">Event: </th>
                <td class="border">{{$mail['event']}} {{$mail['train']}}</td>
            </tr>
            <tr>
                <th class="border">User Impact: </th>
                <td class="border">{{$mail['impact']}}</td>
            </tr>
            <tr>
                <th class="border">Impact to other systems (if known): </th>
                <td class="border"></td>
            </tr>
            <tr>
                <th class="border">Reported by: </th>
                <td class="border">Nomad Digital</td>
            </tr>
            <tr>
                <th class="border">Supplier available at: </th>
                <td class="border">Nomad Digital</td>
            </tr>
            <tr>
                <th class="border">Downtime start (expected): </th>
                <td class="border">{{$mail['start_expected']}}</td>
            </tr>
            <tr>
                <th class="border">Downtime start (actual): </th>
                <td class="border">{{$mail['start_actual']}}
                </td>
            </tr>
            <tr>
                <th class="border">Downtime end (expected): </th>
                <td class="border">{{$mail['end_expected']}}</td>
            </tr>
            <tr>
                <th class="border">Downtime end (actual): </th>
                <td class="border"></td>
            </tr>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>