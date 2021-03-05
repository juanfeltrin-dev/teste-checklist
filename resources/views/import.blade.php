@extends('layout')
@section('content')
    <form action="{{ route('import.store') }}" method="POST" enctype="multipart/form-data">
        <div class="input-group mb-3">
            <input class="form-control" type="file" name="data">
        </div>
        <div class="input-group mb-3">
            <button type="submit" class="btn btn-success">Ler dados</button>
        </div>
    </form>
@endsection
