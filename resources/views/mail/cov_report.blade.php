<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <img src="{{ $message->embed('public/asset/logo2.png') }}" alt="nomad logo" style="margin-top: 20px; margin-bottom: 50px; width: 200px">

    <h1 style="font-size: 25px; margin-bottom: 40px">Report Chiamate Cov del mese di <span style="color:dodgerblue; font-size:30px">{{$data['nomeMesePrecedente']}}</span></h1>
    
    <p style="font-size: 20px">Sono state processate un totale di  <span style="font-size: 25px; color: dodgerblue">{{$data['countCov']}}</span>  chiamate </p>
    
    

</body>
</html>