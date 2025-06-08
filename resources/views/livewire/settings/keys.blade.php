<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Manage API Keys')" :subheading="__('Add or delete API keys for the bots.')">

        @foreach($this->bots as $bot)
            <livewire:settings.key-component :bot="$bot" :wire:key="'bot-' . $bot->id" />
        @endforeach
    </x-settings.layout>
</section>

