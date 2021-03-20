<x-wrapper>
    <x-MessageContainer :message="$message ?? ''" />
    <x-layout.container>
        <x-layout.row class="h-full">
            <x-layout.col
                class="gap-2 w-full h-full relative flex  flex-col items-top justify-center sm:items-center sm:pt-0">
                <x-layout.card class="bg-smoke-300 ">

                    <div class="flex w-full space-evenly">
                        <div class="w-full md:w-1/2">
                            <p>
                                <strong>Select a game</strong>
                            </p>
                            <table class="text-center">
                                <tr>
                                    <th>Updated At</th>
                                    @php
                                        $table_keys = [
                                            'level' => 'Level',
                                            'topStreak' => 'Highest Streak',
                                            'score' => 'Score',
                                            'topScore' => 'Top Score',
                                        ];
                                    @endphp
                                    @foreach ($table_keys as $label)
                                        <th>
                                            {{ $label }}
                                        </th>
                                    @endforeach
                                </tr>
                                @foreach ($games as $game)
                                    <tr>
                                        <td>
                                            <a
                                                href="{{ route('game.verb.continue', ['game_id' => $game->game_id]) }}">
                                                Last Played:
                                                {{ Carbon\Carbon::parse($game->updated_at)->diffForHumans() }}
                                            </a>
                                        </td>
                                        @foreach ($table_keys as $key => $value)
                                            <td>
                                                <a
                                                    href="{{ route('game.verb.continue', ['game_id' => $game->game_id]) }}">
                                                    {{ $game[$key] }}
                                                </a>

                                            </td>
                                        @endforeach

                                    </tr>
                                @endforeach
                            </table>

                        </div>
                        <div class="w-full md:w-1/2 justify-center items-center text-center">
                            <p>
                                <strong>New Game</strong>
                            </p>
                        </div>
                    </div>
                </x-layout.card>
            </x-layout.col>
        </x-layout.row>
    </x-layout.container>
</x-wrapper>
