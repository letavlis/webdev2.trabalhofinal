@extends('templates/main', ['titulo'=>"Eventos"])

@section('conteudo')

<div class="row">
    <div class="col">

        @forelse ($data as $item)
            <div class="list-group">
                <a href="{{ route('attendees.show', $item->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between">
                    <h5>{{$item->name}}</h5>
                </a>
            </div>
        @empty
            <div class="alert alert-warning">
                Nenhum evento encontrado
            </div>

        @endforelse

    </div>
</div>

@endsection
