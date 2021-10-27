{{-- @extends('admin.layouts.app')

@section('title', 'Produtos') --}}

{{-- @section('content') --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de produtos') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('products.create') }}">Cadastrar</a>
            <hr/>

            <form action="{{ route('products.search') }}" method="post">
                @csrf
                <input type="text" name="filter" id="filter" placeholder="Filtrar" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button class="btn btn-info" type="submit">Pesquisar</button>
            </form>
            <hr/>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                @if ($product->image)
                                    <img src="{{ url("storage/{$product->image}") }}" alt="{{$product->name}}">                            
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <a href="{{ route('products.show', $product->id) }}">Detalhes</a> 
                                <a href="{{ route('products.edit', $product->id) }}">Editar</a> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if (isset($filters))
                {!! $products->appends($filters)->links() !!}
            @else
                {!! $products->links() !!}
            @endif
        </div>
    </div>
{{-- @endsection --}}

</x-app-layout>