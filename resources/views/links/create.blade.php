@extends('app')

@section('title', 'Encurtar URL')
@section('content')
<h1>Encurtar URL</h1>
<form action="{{ route('links.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="original_link" class="form-label">URL</label>
        <input required type="text" class="form-control" id="original_link" name="original_link" placeholder="Insira a URL que deseja encurtar...">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Descrição</label>
        <input required type="text" class="form-control" id="description" name="description" placeholder="Digite a descrição...">
    </div>

    <button class="btn btn-success" type="submit">Encurtar</button>
</form>
@endsection