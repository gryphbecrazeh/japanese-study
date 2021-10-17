<x-wrapper>
    @isset($message)
        <x-MessageContainer>
            <x-Message message="{!! json_encode($message) !!}" />

        </x-MessageContainer>

    @endisset
    <x-layout.container>
        <x-layout.row class="h-full">
            <x-layout.col
                class="gap-2 w-full h-full relative flex  flex-col items-top justify-center sm:items-center sm:pt-0">
                <x-layout.card class="bg-smoke-300 ">
                    <div class="container w-full flex flex-col justify-center items-center"
                        data-controller="autokana game report" {{-- data-report-path-value="{{ route('report', ['kanji_id' => $targetWord['id']]) }}"> --}}
                        data-report-path-value="http://test.local">

                        <div class="flex flex-col mb-8">
                            <div class="top flex w-full flex-col items-center justify-center">
                                <div class="notification" id="notification-container"></div>
                                <div class="flex gap-2 text-gray-100 bold">
                                    <p>Level: {{ $level }}</p>
                                    <p>Score: {{ $score }}</p>
                                    <p>Top Score: {{ $topScore }}</p>
                                    <p>Best Streak: {{ $topStreak }}</p>
                                    <p>Word Count:{{ count($dictionary) }}</p>
                                    <p>Mode: {{ $inputMode }}</p>
                                    @if ($targetWord['shouldKnow'] && isset($remaining_tries) && $remaining_tries > -1)
                                        <p>Remaining Tries: {{ $remaining_tries }}</p>
                                    @endif
                                </div>
                                <div class=" flex flex-col justify-center text-center text-gray-100 bold">
                                    <p>

                                        {{ $inputMode === 'onyomi' || $inputMode === 'kunyomi' ? 'Enter the following' : 'Translate the following' }}

                                    </p>
                                    <p class="text-6xl" data-controller="meaning">
                                        {{-- @php
                                            dd($targetWord);
                                        @endphp --}}
                                        {{ $targetWord['character'] }}
                                    </p>
                                    @if ($targetWord['shouldKnow'])
                                        <p class="text-3xl">

                                            You should know this...
                                        </p>

                                    @else

                                        <p class="text-3xl">
                                            {{ implode(', ', $targetWord[$inputMode]) }}
                                        </p>

                                    @endif

                                </div>
                            </div>
                        </div>
                        <form action="{{ route('game.kanji.post') }}" method="POST">
                            @csrf
                            <div class="w-full flex justify-center items-center">
                                <div class="flex gap-2 justify-around bg-fog-100 rounded">
                                    <x-element.input name="{{ $inputMode }}" type="text"
                                        id="{{ $inputMode === 'onyomi' || $inputMode === 'kunyomi' ? 'autokana' : 'standard' }}"
                                        class="text-white text-center placeholder-center rounded-l game-input bg-transparent p-2 input w-60 h-full placeholder-white"
                                        placeholder="{{ $inputMode === 'onyomi' || $inputMode === 'kunyomi' ? 'Enter the verb...' : 'Translate Below' }}" />
                                    <button
                                        class="btn submit bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r"
                                        id="submit-button" type="submit">
                                        Submit
                                    </button>
                                    <button
                                        class="btn submit bg-yellow-500 hover:bg-yellow-700 text-black font-bold py-2 px-4 rounded-r"
                                        id="report-button" type="button" data-report-target="trigger"
                                        data-action='report#handleReport'>
                                        Report
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
