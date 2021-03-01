<nav class="bg-white p-6 flex flex-col justify-between h-screen fixed left-0 top-0 w-50 z-50">
    <x-nav.nav-section class="flex flex-col">
        <x-nav.nav-link href="{{ route('home') }}" label="Home" class="" />
        @guest
            <x-nav.nav-link href="{{ route('auth.login') }}" label="Login / Register" class="" />
        @endguest
        @auth
            <x-nav.nav-link href="{{ route('dashboard') }}" label="Dashboard" class="" />

        @endauth
    </x-nav.nav-section>

    @auth
        <x-nav.nav-section class="flex flex-col">
            <label for="">Learn</label>
            <x-nav.nav-link href="{{ route('game.kana') }}" label="Hiragana & Katakana" class="" />
            <x-nav.nav-link href="{{ route('game.verb') }}" label="Verbs" class="" />
            <x-nav.nav-link href="{{ route('game.adjective') }}" label="Adjectives" class="" />
            <x-nav.nav-link href="{{ route('game.noun') }}" label="Nouns" class="" />
            <x-nav.nav-link href="{{ route('game.kanji') }}" label="Kanji Challenge" class="" />

        </x-nav.nav-section>

        <x-nav.nav-section class="flex flex-col">
            <label for="">Admin</label>
            <x-nav.nav-link href="{{ route('admin.manager.word') }}" label="Word Manager" class="" />
            <x-nav.nav-link href="{{ route('admin.manager.user') }}" label="User Manager" class="" />
        </x-nav.nav-section>
        <x-nav.nav-section class="flex flex-col">
            <label class="uppercase">{{ auth()->user()->username }}</label>
            <x-nav.nav-link href="{{ route('user.profile') }}" label="Profile" class="" />
            <x-nav.nav-link href="{{ route('user.account') }}" label="Account" class="" />
            <x-nav.nav-link href="{{ route('user.support') }}" label="Support" class="" />
            <x-nav.nav-item>
                <form class="inline" action="{{ route('user.logout') }}" method="post">
                    @csrf
                    <x-element.button class="pl-3" type="submit" label="Logout" />
                </form>
            </x-nav.nav-item>
        </x-nav.nav-section>
    @endauth
</nav>
