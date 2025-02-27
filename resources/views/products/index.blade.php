@extends('products.layout')

@section('content')



<div class="row">
    <div class="col-lg-12 ">
        <div class="mt-2 text-center">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
        </div>
    </div>
</div>
<style>
    .btn-primary {
        width: 50px;
        height: 25px;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .btn-danger {
        width: 50px;
        height: 25px;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    .btn-primary {
        background-color: blue;
        color: white;
    }

    .btn-primary:hover {
        background-color: darkblue;
        /* Cambia il colore al passaggio del mouse */
    }

    .btn-danger {
        background-color: red;
        color: white;
    }

    .btn-danger:hover {
        background-color: darkred !important;
        /* Cambia il colore al passaggio del mouse */
    }

    .details-column {
        padding-left: 20px;
        /* o un altro valore che preferisci */
    }
</style>


@if ($message = Session::get('success'))
    <div class="d-flex justify-content-center">
        <div class="mt-4 alert alert-success d-flex justify-content-between align-items-center"
            style="width:400px; border: 2px solid red;">
            <p>{{ $message }}</p>
            <!-- Bottone per rimuovere il messaggio -->
            <button id="close-message" class="btn btn-danger btn-sm ml-5">Clear</button>
        </div>
    </div>
@endif

<div class="container d-flex justify-content-center mt-2">
    <table class="w-100">
        <thead>
            <tr>
                <th scope="col" style="width: 5%;">ID</th>
                <th scope="col" style="width: 30%;">Name</th>
                <th scope="col" class="d-none d-md-table-cell" style="width: 55%;">Details</th>
                <th scope="col" style="width: 10%;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td class="d-none d-md-inline">{{ $product->detail }}</td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                            <div class="d-flex align-items-center">
                                <a class="btn btn-primary " href="{{ route('products.edit', $product->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ms-2">Del</button>
                            </div>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div class="d-flex justify-content-center fixed-bottom py-3 shadow">
    {{ $products->links() }}
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
