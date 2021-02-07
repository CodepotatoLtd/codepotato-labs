<div class="my-12">

    <p class="uppercase text-sm tracking-wide mb-4 opacity-50">Discussion</p>

    @if( count($idea->comments) > 0 )
        <div class="grid grid-cols-1 gap-6">
            @foreach( $idea->comments as $comment )
                <div class="bg-cp-panel-blue p-6 text-xl rounded-lg">
                    <span class="block mb-3 text-sm tracking-wide opacity-50">{{ $comment->user->name }} said:</span>
                    <span class="leading-normal">{{ $comment->comment }}</span>
                </div>
            @endforeach
        </div>
    @else
        <div class="font-bold">Why don't you start the conversation about this idea?</div>
        <img src="{{ asset('/img/Chat_Two Color.svg')  }}" class="w-1/4 my-12" alt="">
    @endif

    <div class="bg-cp-purple p-6 mt-12 rounded-lg">
        <textarea wire:model="newMessage" class="w-full bg-transparent text-white font-semibold text-2xl border-cp-blue rounded-lg"></textarea>
        <x-jet-button wire:click="saveNewMessage" class="mt-4">Add comment</x-jet-button>
    </div>

</div>
