<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nomad Service Desk</title>

    <style>
        body {
            background-color: #E2E8F0;
            margin: 0;
            padding: 0;
            font-family: "Roboto", sans-serif;
            display: flex;
            justify-content: center;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 350px;
            margin-top: 100px;
            gap: 20px;
            
        }

        h1 {
            font-weight: normal;
            margin-top: 30px;
        }

        input {
            padding: 10px;
            width: 250px;
            border-radius: 5px;
            border: none;
            /* margin: 20px 0; */
            font-size: 16px;
            background-color: #F1F5F9;
        }

        input:focus {
            outline: cornflowerblue solid 2px;
        }

        button {
            padding: 10px;
            width: 270px;
            border-radius: 5px;
            border: none;
            background-color: royalblue;
            font-size: 16px;
            color: white;

        }

        button:hover {
            background-color: #1447E6;
        }

        .status_message {
            position: absolute;
            top: 10px;
            /* width: 200px; */
            padding: 15px;
            text-align: center;
            background-color: greenyellow;
            color: green;
        }


    </style>
</head>

<body>

    @if (session('status'))
        <div class="status_message">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <img src="/asset/logo2.png" alt="nomad_logo" class="mb-10">

        <h1>Reset password</h1>
        {{-- <div> --}}
            <input type="email" name="email" placeholder="Inserisci la tua mail..">
            @error('email')
            <span style="color: red">{{$message}}</span>
            @enderror
        {{-- </div> --}}
        <button type="submit">Invia il link di Reset password</button>
    </form>
</body>

</html>
