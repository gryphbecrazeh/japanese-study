@include('header')

<div class="overflow-hidden max-h-screen h-screen flex flex-row">
    <x-navbar class="h-screen md:w-80 z-50" />
    <div class="overflow-auto h-full w-full from-blue-600 bg-gradient-to-r border-green-600 bg-green-600 relative z-10">
        {{ $slot }}
    </div>

</div>
@include('footer')
