{{-- @extends('admin.layouts.app')

@section('title', 'Editar produto')

@section('content') --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Editar produto $product->name ") }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @include('admin.includes.alert')

            <form action="{{ route('products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @include('admin.pages.products._partials.form')
            </form>
        </div>
    </div>
</x-app-layout>
{{-- @endsection --}}
