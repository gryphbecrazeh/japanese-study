<form class="flex flex-col justify-evenly items-center gap-4" action="{{ route('auth.register') }}" method="post">
    @csrf
    <div>
        <x-element.input id="username" name="username" type="text" placeholder="Username..." class="
            @error('username')
                                                                    border-red-500
            @enderror
            " value="{{ old('username') }}" />
        @error('username')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <x-element.input id="email" name="email" type="email" placeholder="User Email..." class="
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
        <x-element.input id="password" name="password" type="password" placeholder="User Password..." class="
            @error('password')
                                                                    border-red-500
            @enderror
            " />
        @error('password')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div>
        <x-element.input id="password_confirmation" name="password_confirmation" type="password"
            placeholder="User Password..." class="
            @error('password_confirmation')
                                                                    border-red-500
            @enderror
            " />
        @error('password_confirmation')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror
    </div>

    <x-element.submit-button label="Register" />

    <div>
        <x-element.link href="{{ route('auth.login') }}" label="Already a user?" />
    </div>
</form>
