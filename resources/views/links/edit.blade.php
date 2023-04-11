@extends('app')

@section('title', 'Edição de Links')
@section('content')
<h1>Novo produto</h1>
<form action="{{ route('links.update', $link) }}" method="POST">
    @method("PUT")
    @csrf

    <div class="mb-3">
        <label for="original_link" class="form-label">URL</label>
        <input 
            required 
            type="text" 
            class="form-control" 
            id="original_link" 
            name="original_link" 
            placeholder="Insira a URL..."
            value="{{ $link->original_link }}"
        >
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <input 
            required 
            type="text" 
            class="form-control" 
            id="description" 
            name="description" 
            placeholder="Digite a Descrição..."
            value="{{ $link->description }}"
        >
    </div>

    <button class="btn btn-success" type="submit">Salvar</button>
</form>
@endsection