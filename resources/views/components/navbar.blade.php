{{-- <nav class="bg-white p-6 flex flex-col justify-between h-screen fixed left-0 top-0 w-50 z-50"> --}}
<nav
    {{ $attributes->merge(['class' => ' border-blue-gray-800 p-6 flex flex-col justify-between h-screen z-1000 shadow-lg relative']) }}>

    <x-nav.nav-section class="flex flex-col">
        <x-nav.nav-link href="{{ route('home') }}" label="Home" class="">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                {{-- <path fill-rule="evenodd"
                    d="M7 2a1 1 0 011 1v1h3a1 1 0 110 2H9.578a18.87 18.87 0 01-1.724 4.78c.29.354.596.696.914 1.026a1 1 0 11-1.44 1.389c-.188-.196-.373-.396-.554-.6a19.098 19.098 0 01-3.107 3.567 1 1 0 01-1.334-1.49 17.087 17.087 0 003.13-3.733 18.992 18.992 0 01-1.487-2.494 1 1 0 111.79-.89c.234.47.489.928.764 1.372.417-.934.752-1.913.997-2.927H3a1 1 0 110-2h3V3a1 1 0 011-1zm6 6a1 1 0 01.894.553l2.991 5.982a.869.869 0 01.02.037l.99 1.98a1 1 0 11-1.79.895L15.383 16h-4.764l-.724 1.447a1 1 0 11-1.788-.894l.99-1.98.019-.038 2.99-5.982A1 1 0 0113 8zm-1.382 6h2.764L13 11.236 11.618 14z"
                    clip-rule="evenodd" /> --}}
            </svg>
        </x-nav.nav-link>
        @guest
            <x-nav.nav-link href="{{ route('auth.login') }}" label="Login / Register" class="" />
        @endguest
        @auth
            <x-nav.nav-link href="{{ route('dashboard') }}" label="Dashboard" class="" />

        @endauth
    </x-nav.nav-section>

    @auth
        <x-nav.nav-section class="flex flex-col">
            <div class="w-full flex justify-between"> <label class=" text-cyan-500 font-bold font-sans">Learn</label>
                <svg class="h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
            <x-nav.nav-link href="{{ route('game.kana') }}" label="Hiragana & Katakana" class="" />
            <x-nav.nav-link href="{{ route('game.verb') }}" label="Verbs" class="" />
            <x-nav.nav-link href="{{ route('game.adjective') }}" label="Adjectives" class="" />
            <x-nav.nav-link href="{{ route('game.noun') }}" label="Nouns" class="" />
            <x-nav.nav-link href="{{ route('game.kanji') }}" label="Kanji Challenge" class="" />

        </x-nav.nav-section>

        <x-nav.nav-section class="flex flex-col">
            <div class="w-full flex justify-between"> <label class=" text-cyan-500 font-bold font-sans">Admin</label>
                <svg class="h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
            <x-nav.nav-link href="{{ route('admin.manager.word') }}" label="Word Manager" class="" />
            <x-nav.nav-link href="{{ route('admin.manager.user') }}" label="User Manager" class="" />
        </x-nav.nav-section>
        <x-nav.nav-section class="flex flex-col">
            <div class="w-full flex justify-between"> <label
                    class=" text-cyan-500 font-bold font-sans">{{ auth()->user()->username }}</label>
                <svg class="h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </div>
            <x-nav.nav-link href="{{ route('user.profile') }}" label="Profile" class="" />
            <x-nav.nav-link href="{{ route('user.account') }}" label="Account" class="" />
            <x-nav.nav-link href="{{ route('user.support') }}" label="Support" class="" />
            <x-nav.nav-item>
                <form class="inline" action="{{ route('user.logout') }}" method="post">
                    @csrf
                    <x-element.button class="pl-3  text-blue-gray-100 hover:text-blue-700 font-bold" type="submit"
                        label="Logout" />
                </form>
            </x-nav.nav-item>
        </x-nav.nav-section>
    @endauth
</nav>
