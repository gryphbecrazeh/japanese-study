<x-wrapper>
    <x-layout.container class="h-full p-6">
        <x-layout.row class="pb-6">
            <div class="w-full bg-blue-gray-100 rounded p-6 shadow-md">
                Word Manager
            </div>
        </x-layout.row>
        <x-layout.row>
            <div class="grid grid-cols-12 gap-4 rounded ">

                <div
                    class="component col-span-8  shadow-md p-10 flex flex-col justify-center items-center bg-blue-gray-200 rounded">

                    <table>
                        <thead>
                            @foreach ($keys as $key)
                                <th>{{ $key }}</th>
                            @endforeach
                        </thead>
                        @foreach ($verbs as $word)
                            <tr key="{{ $word->getId() }}"
                                class="hover:bg-blue-gray-500 hover:text-white hover:rounded w-full">
                                @foreach ($keys as $key)
                                    <td class=" overflow-ellipsis overflow-hidden truncate max-w-64">
                                        <a href="{{ route(Route::currentRouteName(), ['edit' => $word->getId()]) }}">
                                            {{ $word[$key] }}
                                        </a>
                                    </td>
                                @endforeach
                            </tr>

                        @endforeach

                    </table>
                </div>
                <div class="component col-span-4  shadow-md p-10 flex flex-col items-center bg-blue-gray-200 rounded">
                    <x-layout.card>
                        <x-form.word />
                    </x-layout.card>

                </div>
            </div>
        </x-layout.row>
    </x-layout.container>
</x-wrapper>
