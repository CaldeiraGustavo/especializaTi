{{-- @extends('admin.layouts.app')

@section('title', 'Detalhes do produto') --}}

{{-- @section('content') --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Detalhes do produto: $product->name ") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h1>Produto: {{ $product->name }} <a href="{{ route('products.index') }}">
                    << </a>
            </h1>


            <ul>
                <li><strong>Nome: </strong> {{ $product->name }}</li>
                <li><strong>Descrição: </strong> {{ $product->description }}</li>
                <li><strong>Preço: </strong> {{ $product->price }}</li>
            </ul>

            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Apagar</button>
            </form>
            {{-- @endsection --}}
        </div>
    </div>
</x-app-layout>
