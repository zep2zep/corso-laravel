<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta name="description" content="Web site created using create-react-app" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Form Login</title>
    <style>
        body {
            position: relative;
            /* Assicurati che il body abbia una posizione relativa */
            overflow: hidden;
            /* Nasconde eventuali parti dell'immagine che escono dal body */
        }

        #background {
            position: absolute;
            /* Posiziona l'immagine in modo assoluto */
            top: 0;
            /* Posizionamento verticale */
            left: 50%;
            /* Centra orizzontalmente */
            transform: translateX(-50%);
            /* Regola il centro */
            z-index: -1;
            /* Porta l'immagine dietro altri contenuti */
            width: 100%;
            /* Rendi l'immagine larga il 100% */
            height: auto;
            /* Mantieni le proporzioni dell'immagine */
        }
    </style>
</head>

<body data-bs-theme="dark">
    <div class="relative h-screen w-screen">
    <img id="background" class="absolute top-0 left-0 w-full h-full object-cover"
    src="{{ Storage::disk('s3')->url('img/background.svg') }}" alt="SS3Laravel background" />

    <div class="container">
        <div class="d-flex justify-content-center mt-2">
            <h2 class="mt-5 text-white">Login utente</h2>
        </div>

        @if (session('succes'))
                <div class="d-flex justify-content-center"></div>
                <div class="alert alert-success d-flex" style="width:400px;  border: 2px solid red;">
                    {{ session('success') }}
                </div>
            </div>
        @endif

    @if ($errors->any())
        <div class="d-flex justify-content-center">
            <div class="alert alert-danger d-flex" style="width:400px;  border: 2px solid red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif


    <div class="d-flex justify-content-center mt-3">
        <form action="{{route('loginUser')}}" method="POST"
            style="width:300px; border: 1px solid wheat; border-radius: 8px; padding: 20px;">
            @csrf

            <div class="mb-1">
                <label class="text-white" for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}">
            </div>
            <div class="mb-3">
                <label class="text-white" for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-1 d-flex justify-content-between">
                <button class="btn btn-primary" type="submit">Login</button>
                <a href="{{ url('/') }}" class="btn btn-secondary" role="button">Home</a>
            </div>
        </form>


    </div>
    </div>

</div>
</body>

</html>
