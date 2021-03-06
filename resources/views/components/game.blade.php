<div class="container w-full flex flex-col justify-center items-center" data-controller="autokana game">
    <div class="flex flex-col mb-8">
        <div class="top flex w-full flex-col items-center justify-center">
            <div class="notification" id="notification-container"></div>
            <div class="flex gap-2 text-gray-100 bold">
                <p>Level: {{ $level + 1 }}</p>
                <p>Score: {{ $score }}</p>
                <p>Streak: {{ $streak }}</p>
                <p>Word Count:{{ count($dictionary) }}</p>
            </div>
            <div class=" flex flex-col justify-center text-center text-gray-100 bold">
                <p>
                    {{ $inputMode === 'kana' ? 'Enter the following' : 'Translate the following' }}</p>
                <p class="text-6xl">{{ $targetWord->kanji['word'] }}</p>
                <p class="text-3xl">
                    {{ $targetWord->shouldKnow ? 'You should know this...' : $targetWord->politeForm }}
                </p>
            </div>
        </div>
    </div>
    <form action="{{ route('game.verb.post', ['game_id' => $id]) }}" method="POST">
        @csrf
        <div class="w-full flex justify-center items-center">
            <x-element.input name="{{ $inputMode }}" type="text"
                id="{{ $inputMode === 'kana' ? 'autokana' : 'standard' }}"
                class="text-white text-center placeholder-center rounded bg-transparent text-white-100 game-input bg-transparent p-2 input w-60 h-full focus:border-green-600 focus:border-2 placeholder-white"
                placeholder="{{ $inputMode === 'kana' ? 'Enter the verb...' : 'Translate Below' }}" />
        </div>
        <div class="py-4">
            <div class="flex flex-row gap-2 justify-evenly">
                <button class="btn submit bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full"
                    id="submit-button" type="submit">
                    Submit
                </button>
            </div>
            <div class="hint">Type '?' to take a loss and learn the word</div>
            <div class="hint">Press 'Enter' to submit</div>
            <div class="hint">
                Get the same word right more than the number of times you've
                gotten it wrong + 3 will allow you to get more words
            </div>
        </div>
    </form>
</div>
