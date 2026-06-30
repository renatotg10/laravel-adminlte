<div class="flex justify-between md:col-span-1">
    <div class="px-4 sm:px-0">
        <h3 class="text-lg font-bold text-zinc-950">{{ $title }}</h3>

        <p class="mt-2 text-sm leading-6 text-zinc-600">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
