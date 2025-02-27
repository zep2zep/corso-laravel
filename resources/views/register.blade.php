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
    <title>Form Register</title>
    <style>
    <style>
     html, body {
         height: 100%;
         margin: 0;
         padding: 0;
         overflow: hidden; /* Evita lo scroll non voluto */
     }

     #background {
         position: fixed;
         top: 0;
         left: 0;
         width: 100vw;
         height: 100vh;
         object-fit: cover;
         z-index: -1; /* Manda l'immagine dietro i contenuti */
     }
    </style>

</head>

<body data-bs-theme="dark">

    <div class="relative h-screen w-screen">
        <img id="background" class="absolute top-0 left-0 w-full h-full object-cover"
        src="{{ Storage::disk('s3')->url('img/background.svg') }}" alt="SS3Laravel background" /
    <div class="container ">
        <div class="d-flex justify-content-center ">
            <h2 class="mt-5 text-white">Rgistrazione utente</h2>
        </div>

        @if (session('succes'))
            <div class="d-flex justify-content-center">
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
            <form action="{{route('registerUser')}}" method="POST"
                style="width:300px; border: 1px solid wheat; border-radius: 8px; padding: 20px;">
                @csrf
                <div class="mb-1">
                    <label class="text-white" for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
                </div>
                <div class="mb-1">
                    <label class="text-white" for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}">
                </div>
                <div class="mb-3">
                    <label class="text-white" for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label class="text-white" for="password_confirmation" class="form-label">Conferma Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="mb-3">
                    <input type="checkbox" id="remember" name="remember">
                    <label class="text-white" for="remember">Remember me</label>
                </div>
                <div class="text-white text-start mb-3"><a href="#">Password dimenticata</a>
                </div>

                <div class="mb-1 d-flex justify-content-between">
                    <button class="btn btn-primary" type="submit">Validate</button>
                    <a href="{{ url('/') }}" class="btn btn-secondary" role="button">Home</a>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>
