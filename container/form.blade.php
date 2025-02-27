<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta name="description" content="Web site created using create-react-app" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-Y8qJuoLLdSgNYeTHySVIgbxCysMr3qC/5b3y7ZQSEwtW69rEz5o9owCO2o5FmgIt9zVAAy7Y6HHbhrxYhKZwJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Form</title>
</head>

<body data-bs-theme="dark">
    <div class="container mt-2">
        <div class="d-flex justify-content-center mt-2">
            <h1>Prova validazione dati</h1>
        </div>

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

        <div class="d-flex justify-content-center mt-1 mb-5">
            <form action="{{route('validateForm')}}" method="POST"
                style="width:400px; border: 2px solid red; border-radius: 8px; padding: 20px;">
                @csrf
                <div class="mb-1">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name')}}">
                </div>
                <div class="mb-1">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}">
                </div>
                <div class="mb-1">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age" value="{{ old('age')}}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Conferma Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <div class="mb-3">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <div class="text-start mb-3"><a href="#">Password dimenticata</a>
                </div>
                <div class="mb-1  text-center">
                    <button class="btn btn-primary" type="submit">Validate</button>
                </div>
            </form>
        </div>
    </div>





    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>