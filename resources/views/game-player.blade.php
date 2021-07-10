<x-wrapper>
    @isset($message)
        <x-MessageContainer :message="$message ?? ''" />

    @endisset
    <x-layout.container>
        <x-layout.row class="h-full">
            <x-layout.col
                class="gap-2 w-full h-full relative flex  flex-col items-top justify-center sm:items-center sm:pt-0">
                <x-layout.card class="bg-smoke-300 ">
                    <div class="container w-full flex flex-col justify-center items-center"
                        data-controller="autokana game">
                        <div class="flex flex-col mb-8">
                            <div class="top flex w-full flex-col items-center justify-center">
                                <div class="notification" id="notification-container"></div>
                                <div class="flex gap-2 text-gray-100 bold">
                                    <p>Level: {{ $level }}</p>
                                    <p>Score: {{ $score }}</p>
                                    <p>Top Score: {{ $topScore }}</p>
                                    <p>Best Streak: {{ $topStreak }}</p>
                                    <p>Word Count:{{ count($dictionary) }}</p>
                                </div>
                                <div class=" flex flex-col justify-center text-center text-gray-100 bold">
                                    <p>
                                        {{ $inputMode === 'kana' ? 'Enter the following' : 'Translate the following' }}
                                    </p>
                                    <p class="text-6xl" data-controller="meaning">{{ $targetWord['kanji']['word'] }}
                                    </p>
                                    <p class="text-3xl">
                                        {{ $targetWord['shouldKnow'] ? 'You should know this...' : $targetWord['politeForm'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('game.verb.post', ['game_type' => $game_type, 'game_id' => $id]) }}"
                            method="POST">
                            @csrf
                            <div class="w-full flex justify-center items-center">
                                <div class="flex gap-2 justify-around bg-fog-100 rounded">
                                    <x-element.input name="{{ $inputMode }}" type="text"
                                        id="{{ $inputMode === 'kana' ? 'autokana' : 'standard' }}"
                                        class="text-white text-center placeholder-center rounded-l game-input bg-transparent p-2 input w-60 h-full placeholder-white"
                                        placeholder="{{ $inputMode === 'kana' ? 'Enter the verb...' : 'Translate Below' }}" />
                                    <button
                                        class="btn submit bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r"
                                        id="submit-button" type="submit">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </x-layout.card>
            </x-layout.col>
        </x-layout.row>
    </x-layout.container>
</x-wrapper>
