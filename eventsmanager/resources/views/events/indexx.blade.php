<!-- Herda o layout padrão definido no template "main" -->
@extends('templates.main', ['titulo' => "Eventos", 'rota' => "events.create"])
<!-- Preenche o conteúdo da seção "titulo" -->
@section('titulo') Eventos @endsection
<!-- Preenche o conteúdo da seção "conteudo" -->
@section('conteudo')

    <div class="row">
        <div class="col">

            <!-- Utiliza o componente "datalist" criado -->
            <x-datalist
                :title="'Eventos'"
                :crud="'events'"
                :header="['NOME', 'DATA', 'AÇÕES']"
                :fields="['name', 'eventdate']"
                :data="$data"
                :hide="[true, false, true, false]"
                :info="['id', 'name']"
                :remove="'name'"
            />
        </div>
    </div>
@endsection
