<form class="flex flex-col justify-evenly items-start gap-2" action="{{ route('auth.login') }}" method="post">
    @csrf

    @php
        // $currentOrder = app('request')->input('order') ?? 'desc';
        
        // $currentKey = app('request')->input('key') ?? 'submitted_at';
        
        // $currentType = app('request')->input('type') ?? 'date';
        $meanings = '';
        $kanji = '';
        $meaning = '';
        $politeForm = '';
        $verbType = '';
        $stem = '';
        
        $word = App\Models\Verb::where('id', '=', app('request')->input('edit'))
            ->get()
            ->first();
        if ($word) {
            $meanings = join('ENDOFLINE', unserialize($word->meanings));
            $kanji = unserialize($word->kanji)['word'];
            $meaning = $word->meaning;
            $politeForm = $word->politeForm;
            $verbType = $word->verbType;
            $stem = $word->stem;
        }
        
    @endphp
    <div class="flex flex-col items-start justify-evenly gap-2 w-full">
        <label>Kanji</label>
        <div>
            <x-element.input name="word" id="word" class="
            w-full
            @error('word')
                                                                                                                                                                                                                                                                                                                                                                border-red-500
            @enderror
            " placeholder="Full word (containing kanji)" value="{{ $kanji }}" />
            @error('word')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <label>Publicly Viewable Meaning</label>

            <x-element.input name="meaning" id="meaning" class="
            @error('meaning')
                                                                                                                                                                                                                                                                                                                                                                border-red-500
            @enderror
            " placeholder="Publicly Viewable Meaning" value="{{ $meaning }}" />
            @error('meaning')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="flex flex-col gap-2">
        <label for="politeForm">Forms</label>
        <x-element.input name="politeForm" id="politeForm" class="
        @error('politeForm')
                                                                                                                                                                                                                                                                                                                                                                    border-red-500
        @enderror
        " placeholder="Word in it's polite form" value="{{ $politeForm }}" />
        @error('politeForm')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror

    </div>
    <div class="flex flex-col gap-2">
        <label for="stem">Stem</label>
        <x-element.input name="stem" id="stem" class="
        @error('stem')
                                                                                                                                                                                                                                                                                                                                                                border-red-500
        @enderror
        " placeholder="Word Stem" value="{{ $stem }}" />
        @error('stem')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <x-element.select name="verbType" id="verbType" class="
        @error('verbType')
                                                                                                                                                                                                                                                                                                                                                            border-red-500
        @enderror
        " value="{{ $verbType }}" />
        @error('verbType')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <x-element.flexible-input label="Meanings" name="meanings" id="meanings" class="
        @error('meanings')
                                                                                                                                                                                                                                                                                                                                                                    border-red-500
        @enderror
        ">
            {{ $meanings }}
        </x-element.flexible-input>
        @error('meanings')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror

    </div>
    <x-element.submit-button label="{{ $word ? 'Update Word' : 'Add Word' }}" />

    <a href="{{ route(Route::currentRouteName()) }}"
        class="bg-red-500 text-white px-4 py-3 rounded font-medium w-full flex justify-center items-center cursor-pointer">
        Clear</a>

</form>
