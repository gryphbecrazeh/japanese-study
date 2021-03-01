<x-wrapper>
    <x-layout.container class="w-full">
        <x-layout.row>
            <x-layout.col class="h-screen w-full flex justify-center items-center">
                <x-layout.card>
                    <x-layout.container>
                        <x-layout.row>
                            <x-layout.col>
                                @if (session('status'))
                                    <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </x-layout.col>
                        </x-layout.row>

                        <x-layout.row>
                            <x-layout.col>
                                <x-form.login />
                            </x-layout.col>
                        </x-layout.row>
                    </x-layout.container>
                </x-layout.card>
            </x-layout.col>
        </x-layout.row>
    </x-layout.container>
</x-wrapper>
