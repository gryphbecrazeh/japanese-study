<form class="flex flex-col justify-evenly items-start gap-2" action="{{ route('auth.login') }}" method="post">
    @csrf
    <div class="flex flex-col items-start justify-evenly gap-2">
        <label>Kanji</label>
        <div>
            <x-element.input name="word" id="word" class="
            @error('word')
                                                                                                                                                                    border-red-500
            @enderror
            " placeholder="Full word (containing kanji)" />
            @error('word')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div>
            <x-element.input name="meaning" id="meaning" class="
            @error('meaning')
                                                                                                                                                                    border-red-500
            @enderror
            " placeholder="Publicly Viewable Meaning" />
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
        " placeholder="Word in it's polite form" />
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
        " placeholder="Word Stem" />
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
        " />
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
        " />
        @error('meanings')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror

    </div>

    <x-element.submit-button label="Add Word" />
</form>
