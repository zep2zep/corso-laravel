@extends('layouts.app')

@section('content')
<div class="relative h-screen w-screen">
    <img id="background" class="absolute top-0 left-0 w-full h-full object-cover"
        src="{{ Storage::disk('s3')->url('img/my-bg.jpg') }}" alt="My background" />
    <!-- Success message -->
    <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

        @if (session('success'))
            <div class="d-flex justify-content-center">
                <div class="mt-4 alert alert-success d-flex justify-content-between align-items-center"
                    style="width:400px; border: 2px solid red;">
                    {!! session('success') !!}
                    <!-- Bottone per rimuovere il messaggio -->
                    <button id="close-message" class="btn btn-danger btn-sm ml-5">Clear</button>
                </div>
            </div>
        @endif

    </div>


    <div
        class="relative min-h-screen flex flex-col items-center justify-between selection:bg-[#FF2D20] selection:text-white">

        <!-- Testo sovrapposto centrato -->
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center w-full h-full">
            <h1 class="text-white text-4xl mb-4">Ciao mondo!</h1>
            <p class="text-white text-lg">
                Benvenuti nel mio angolo virtuale di caos creativo, <br>
                dove il buon senso fa spesso una pausa caffè e l'arguzia è l'unica moneta accettata.<br>
                <span class="text-sm text-gray-400 mt-2">[V0.1.0.2 del 2025-02-26]</span>
            </p>
        </div>
        <!-- Footer in basso -->
        <footer class="py-1 text-center text-smtext-white w-full mt-auto ">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            <br>
            <p>By @sestapertica</p>
        </footer>
    </div>
</div>

<script>
    document.getElementById('close-message').addEventListener('click', function () {
        // Nasconde il messaggio di successo
        this.parentElement.remove();
        // Ricarica la pagina
        location.reload();
    });
</script>
@endsection
