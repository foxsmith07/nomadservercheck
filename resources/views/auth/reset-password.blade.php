<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('asset/favicon-3.png') }}" type="image/x-icon">
    <title>Nomad Service Desk</title>

    <style>
        
        .blocco {
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: red;
        }

        form {
            background-color: white;
            border-radius: 20px;
            /* box-shadow: black 20px 20px 20px */
        }

    </style>
</head>
<body>
    
    <h1>Benvenuto su Nomad Service Desk</h1>

    <div class="blocco flecol">
        <p>Imposta una password</p>
    
        <form action="{{ route('password.update')}}" action="post">
    
            @csrf
    
            <input type="hidden" name="token" value="{{$request->token}}">
            <input type="hidden" name="email" value="{{$request->email}}">
    
            <input type="password" name="password">
            <input type="password" name="password_confirmation">
    
            <button type="submit">Reimposta</button>
        </form>
    </div>

</body>
</html>