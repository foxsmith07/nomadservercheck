<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <img src="{{ asset('asset/logo2.png') }}" alt="">
    <h1 style="font-size: 25px">Report Chiamate Cov mese corrente</h1>
    
    <p>Questo mese abbiamo processato un totale di <span style="font-size: 20px;">{{$data['countCov']}}</span> chiamate </p>
    

</body>
</html>