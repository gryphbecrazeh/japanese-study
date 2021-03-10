<x-wrapper>
    <x-MessageContainer :message="$message ?? ''" />
    <x-layout.container>
        <x-layout.row class="h-full">
            <x-layout.col
                class="gap-2 w-full h-full relative flex  flex-col items-top justify-center sm:items-center sm:pt-0">
                <x-layout.card class="bg-smoke-300 ">
                    <x-Game />
                </x-layout.card>
            </x-layout.col>
        </x-layout.row>
    </x-layout.container>
</x-wrapper>
