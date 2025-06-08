<div>
    @if($this->keySet)
        <form wire:key="empty" wire:submit="removeKey" class="mt-6 space-y-6">
            <flux:input
                :label="__($bot->provider . ' - ' . $bot->description)"
                type="password"
                icon="key"
                value="waow, it's a fake key!"
                readonly
                disabled
            />

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="danger" type="submit" class="w-full">{{ __('Delete') }}</flux:button>
                </div>
                <flux:text>This bot is setup with a key! {{ $bot->provider }}</flux:text>
            </div>
        </form>
    @else
        <form wire:submit="addKey" class="mt-6 space-y-6">
            <flux:input
                wire:model="key"
                :label="__($bot->provider . ' - ' . $bot->description)"
                type="password"
                icon="key"
                viewable
            />

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('Add') }}</flux:button>
                </div>
            </div>
        </form>
    @endif
</div>
