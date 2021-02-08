<div class="py-12">

    <p class="text-2xl mb-3 text-blue-200 opacity-50 hover:opacity-100">Oooh, wouldn't it be fab if a <a
            href="{{ route('product.show', [$idea->product]) }}" class="text-cp-pink">{{ $idea->product->name }}</a>
        had...</p>
    <h2 class="text-7xl font-bold tracking-wide text-gradient bg-gradient-to-r from-cp-pink mb-12 to-cp-purple">{{ $idea->title }}</h2>

    @if( $idea->description )
        <div class="text-3xl">
            <p class="uppercase text-sm tracking-wide mb-4 opacity-50">Description</p>
            {{ $idea->description }}
        </div>
    @endif


    <div class="flex flex-row justify-between items-center">
        <div
            class="mt-6 flex rounded-md inline-flex pr-4 flex-row bg-cp-purple items-center uppercase text-xs tracking-wide font-semibold">
            <x-jet-button wire:click="likeThis({{ $idea->getKey() }}, 'idea')" class="{{ $idea->liked ? 'bg-cp-blue text-cp-dark-blue' : null }}">
                @if( $idea->liked )
                    Unlike this idea
                @else
                    I like this idea
                    @endif
                <svg class="ml-3 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                </svg>
            </x-jet-button>
            <span class="pl-4">{{ count($idea->votes) }} votes so far</span>
        </div>
        <x-jet-button>Subscribe</x-jet-button>
    </div>


    @livewire('comment-thread', [$idea])

</div>
