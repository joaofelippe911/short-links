@extends('app')

@section('title', 'Lista de Links')
@section('content')
    <h1>Lista de Links</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Descrição</th>
                <th scope="col">Link</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($links as $link)
                <tr>
                    <th scope="col">{{ $link->id }}</th>
                    <th scope="col">
                        {{ $link->description }}
                    </th>
                    <th scope="col">
                        <a href="{{ $link->original_link }}" id="copy_{{ $link->id }}">
                            http://localhost:8000/{{ $link->short_link }}
                        </a>
                    </th>
                    <th scope="col" class="d-flex flex-row gap-2" >
                        <button
                            class="btn btn-secondary"
                            onclick="return copyToClipboard('copy_{{ $link->id }}')""
                        >
                            Copiar link
                        </button>
                        <a
                            class="btn btn-primary"
                            href="{{ route('links.edit', $link) }}"
                        >
                            Editar
                        </a>
                        <form action="{{ route('links.destroy', $link) }}" method="POST">
                            @method("DELETE")
                            @csrf
                            <button
                                class="btn btn-danger"
                                onclick="return confirm('Deseja realmente deletar?')"
                            >
                                Deletar
                            </button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('links.create') }}" class="btn btn-success">Novo Link</a>
    <script>
        async function copyToClipboard(id) {
            const link = document.getElementById(id).innerText;
            try {
                await navigator.clipboard.writeText(link);
            } catch (err) {
                console.error('Failed to copy: ', err);
            }
        }
    </script>
@endsection
