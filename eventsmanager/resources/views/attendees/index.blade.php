@extends('templates/main', ['titulo'=>"Inscrições"])

@section('conteudo')

<div class="row">
    <div class="col">
    @php $flag = 0; @endphp
        @forelse ($data as $item)
            <div class="list-group">

                @forelse ($attendees as $key)
                    @if ($item->id == $key->event_id)
                        <a href="{{ route('attendees.show', $item->id) }}" class="list-group-item list-group-item-action d-flex justify-content-between">
                            <h5>{{$item->name}}</h5>
                        </a>
                    @endif
                @empty
                    @php $flag=1; @endphp
                @endforelse
            </div>
        @empty
            <div class="alert alert-warning">
                Nenhum inscrição encontrada
            </div>
        @endforelse
        @if ($flag == 1)
                <div class="alert alert-warning">
                    Nenhum inscrição encontrada
                </div>
        @endif
    </div>
</div>

@endsection
