<div class="py-12">

    <div class="border border-gray-700 p-8 rounded-xl mb-8">
        <form wire:submit.prevent="addNewProduct">
            <div class="mb-4">
                <label for="new_title" class="block mb-3">New product name</label>
                <input type="text" wire:model="newName" class="bg-transparent w-full text-3xl p-4" placeholder="New product name, e.g. Income Reconciliation Tool">
            </div>
            <x-jet-button type="submit">Suggest new product</x-jet-button>
        </form>
    </div>

    <div class="bg-cp-panel-blue p-6 rounded-md text-white font-semibold">
        <h2 class="text-2xl font-bold mb-4">🎉 Thanks for joining our little community</h2>
        <p>We're pleased you're interested in getting involved in shaping the technology available at your disposal.
        <p class="mt-4">Simply click one of the products below to start exploring the features that have been suggested and to join in with the discussions.</p>
    </div>

    @if($products)
        @foreach($products as $product)
            <section class="py-6 items-center flex flex-row justify-between" wire:click="redirectTo({{ $product->getKey() }})">
                <h1 class="cursor-pointer text-6xl tracking-wide font-bold text-gradient bg-gradient-to-r from-cp-pink to-cp-purple">{{ $product->name }}</h1>
                <div>
                    <x-jet-button>Explore {{ count($product->ideas) }} ideas</x-jet-button>
                </div>
            </section>
        @endforeach
    @endif
</div>
