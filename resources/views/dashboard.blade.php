<x-layouts.app :title="__('Shopping List')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            @if($lists->budget)
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <h1>Budget</h1>
                <h2>{{$lists->budget}}</h2>
            </div>
            @endif
            @if($lists->listItems)
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <h1>Total Cost</h1>
                <h2>{{$lists->totalCost()}}</h2>
            </div>
            @endif
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            <livewire:shopping-list :list="$lists" />
        </div>
    </div>
</x-layouts.app>
