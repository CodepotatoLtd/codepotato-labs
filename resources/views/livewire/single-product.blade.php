<div class="py-12">

    <div class="border border-gray-200 p-8 rounded-xl mb-8">
        <form wire:submit.prevent="addNewIdea">
            <div class="mb-4">
                <label for="new_title" class="block mb-3">What feature would you like?</label>
                <input type="text" wire:model="featureName" class="bg-transparent w-full text-3xl p-4"
                       placeholder="New feature e.g. customisable fact-find">
            </div>
            <div class="mb-4">
                <label for="new_title" class="block mb-3">Would you like to provide any further information?</label>
                <textarea wire:model="featureDesc" class="bg-transparent w-full"></textarea>
            </div>
            <x-jet-button type="submit">Suggest new feature</x-jet-button>
        </form>
    </div>

    @if( $product->ideas)
        @foreach($product->ideas as $idea)
            <div class="mb-6">
                <div class="flex flex-row items-center justify-between p-4">
                    <div class="flex flex-col w-1/2">
                        <a wire:click="navigateTo({{ $idea->getKey() }})" class="cursor-pointer text-5xl font-bold tracking-wide text-gradient bg-gradient-to-r from-cp-pink to-cp-purple">{{ $idea->title }}</a>
                    </div>
                    <div>
                        <div class="flex mr-4 rounded-md inline-flex pr-4 flex-row bg-cp-purple items-center uppercase text-xs tracking-wide font-semibold">
                            <x-jet-button wire:click="likeThis({{ $idea->getKey() }}, 'idea')">I like this idea
                                <svg class="ml-3 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"/>
                                </svg>
                            </x-jet-button>
                            <span class="pl-4">{{ count($idea->votes) }} votes so far</span>
                        </div>
                        <div class="flex mr-4 rounded-md inline-flex pr-4 flex-row bg-cp-blue text-cp-dark-blue items-center uppercase text-xs tracking-wide font-semibold">
                        <x-jet-button wire:click="navigateTo({{ $idea->getKey() }})">Discuss
                            <svg class="w-4 ml-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                            </svg>
                        </x-jet-button>
                            <span class="pl-4">{{ count($idea->comments) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
