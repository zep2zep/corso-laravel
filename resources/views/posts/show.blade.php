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
    <title>{{ $post->tile }}</title>
</head>

<body data-bs-theme="dark">
    <div class="container mt-5">
        <h1>{{ $post->tile }}</h1>
        <p class="text-muted">
            Creato il: {{ $post->created_at ? $post->created_at->format('d-m-Y H:i') : 'Data non disponibile' }}
        </p>
        <p class="text-muted">
            Creato da: {{ $post->id  }}
        </p>
        <div class="mt-4">
            <p>{{ $post->content }}</p>

        </div>
        <a href="{{ route('posts.index') }}" id="" class="btn btn-primary">Torna lista dei post</a>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
</body>

</html>