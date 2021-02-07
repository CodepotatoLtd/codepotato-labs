<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            <a href="{{ route('product.show', [$idea->product_id]) }}">{{ $idea->product->name }}</a> / {{ $idea->title }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                @livewire('single-idea', [$idea])
            </div>
        </div>
    </div>
</x-app-layout>
