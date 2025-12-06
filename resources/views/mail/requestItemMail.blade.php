<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Buongiorno,</h1>
    <p>di seguito i dettagli della richiesta fatta da <span style="color: cornflowerblue; font-size: 17px">{{strtoupper($userData['user_name'])}} ({{$userData['user_mail']}})</span></p>
    {{-- <p>{{$userData['name']}} ha richiesto un oggetto per lo stock:</p> --}}
    <p><span style="font-weight: bold">Oggetto: </span>{{strtoupper($userData['name'])}}</p>
    <label style="font-weight: bold">Descrizione:</label>
    <p>{{$userData['description']}}</p>
    <p><span style="font-weight: bold">NMID: </span> {{$userData['nmid'] ?? 'no nmid'}}</p>
    <p><span style="font-weight: bold; margin-right: 10px">Quantità richiesta: </span> <span style="font-size: 25px; color: cornflowerblue">{{$userData['quantity']}}</span></p>
</body>
</html>