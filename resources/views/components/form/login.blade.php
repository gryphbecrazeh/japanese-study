<form class="flex flex-col justify-evenly items-center gap-2" action="{{ route('auth.login') }}" method="post">
    @csrf
    <div>
        <x-element.input id="email" name="email" type="email" placeholder="Email..." class="
            @error('email')
                                                                                                            border-red-500
            @enderror
            " value="{{ old('email') }}" />
        @error('email')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <x-element.input id="password" name="password" type="password" placeholder="Password..." class="
            @error('password')
                                                                                                            border-red-500
            @enderror
            " value="{{ old('password') }}" />
        @error('password')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="flex items-center">
        <x-element.input class="mr-2" type="checkbox" name="remember" id="remember" />
        <label for="remember">Remember me</label>
    </div>
    <x-element.submit-button label="Login" />
    <div>
        <x-element.link href="{{ route('auth.register') }}" label="Not a user?" />
    </div>
</form>
