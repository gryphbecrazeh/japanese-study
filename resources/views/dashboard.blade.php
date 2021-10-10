<x-wrapper>
    <x-layout.container class="h-full p-6">
        <x-layout.row class="pb-6">
            <div class="w-full bg-blue-gray-100 rounded p-6 shadow-md">
                Dashboard
            </div>
        </x-layout.row>
        <x-layout.row>
            <div class="grid grid-cols-3 gap-4 rounded ">
                <div
                    class="component col-span-1  shadow-md p-10 flex flex-col justify-center items-center bg-blue-gray-200 rounded">
                    <div class="pb-2">
                        <strong class="component-title text-lg">
                            Top 5 Most Struggling Words
                        </strong>
                    </div>
                    <div class="component-contents w-full">
                        <ul class="w-full flex flex-col gap-2">
                            @foreach ($strugglingWords as $word)

                                <li
                                    class="flex justify-between w-full bg-white rounded pl-3 pr-3 pt-1 pb-1 hover:shadow-md">
                                    <div>{{ $word['kanji']['word'] }}</div>
                                    <div>{{ $word['timesWrong'] }} out of
                                        {{ $word['timesWrong'] + $word['timesRight'] }}
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                </div>
            </div>
        </x-layout.row>
    </x-layout.container>
</x-wrapper>
