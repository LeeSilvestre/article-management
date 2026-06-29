<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <form method="POST" action="{{ route('register') }}">
    @csrf


    <!-- Name -->
    <div>
        <label for="name" class="block text-xs font-bold uppercase tracking-wider text-[#38BDF8] mb-1.5">
            {{ __('Full Name') }}
        </label>

        <input
            id="name"
            type="text"
            name="name"
            value="{{ old('name') }}"
            required
            autofocus
            autocomplete="name"
            class="block w-full px-4 py-2.5 rounded-lg bg-white border border-gray-300 text-gray-900 text-sm transition duration-200 focus:outline-none focus:border-[#38BDF8] focus:ring-1 focus:ring-[#38BDF8]"
        />

        <x-input-error :messages="$errors->get('name')" class="mt-1 text-rose-400 text-xs" />
    </div>

    <!-- Email Address -->
    <div class="mt-3">
        <label for="email" class="block text-xs font-bold uppercase tracking-wider text-[#38BDF8] mb-1.5">
            {{ __('Email Address') }}
        </label>

        <input
            id="email"
            type="email"
            name="email"
            value="{{ old('email') }}"
            required
            autocomplete="username"
            class="block w-full px-4 py-2.5 rounded-lg bg-white border border-gray-300 text-gray-900 text-sm transition duration-200 focus:outline-none focus:border-[#38BDF8] focus:ring-1 focus:ring-[#38BDF8]"
        />

        <x-input-error :messages="$errors->get('email')" class="mt-1 text-rose-400 text-xs" />
    </div>

    <!-- Password -->
    <div class="mt-3">
        <label for="password" class="block text-xs font-bold uppercase tracking-wider text-[#38BDF8] mb-1.5">
            {{ __('Password') }}
        </label>

        <input
            id="password"
            type="password"
            name="password"
            required
            autocomplete="new-password"
            class="block w-full px-4 py-2.5 rounded-lg bg-white border border-gray-300 text-gray-900 text-sm transition duration-200 focus:outline-none focus:border-[#38BDF8] focus:ring-1 focus:ring-[#38BDF8]"
        />

        <x-input-error :messages="$errors->get('password')" class="mt-1 text-rose-400 text-xs" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-3">
        <label for="password_confirmation" class="block text-xs font-bold uppercase tracking-wider text-[#38BDF8] mb-1.5">
            {{ __('Confirm Password') }}
        </label>

        <input
            id="password_confirmation"
            type="password"
            name="password_confirmation"
            required
            autocomplete="new-password"
            class="block w-full px-4 py-2.5 rounded-lg bg-white border border-gray-300 text-gray-900 text-sm transition duration-200 focus:outline-none focus:border-[#38BDF8] focus:ring-1 focus:ring-[#38BDF8]"
        />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-rose-400 text-xs" />
    </div>

    <!-- Login Link -->
    <div class="text-center mt-4">
        <a
            href="{{ route('login') }}"
            style="
                color:#0D1321;
                font-weight:700;
                font-size:14px;
                text-decoration:none;
                transition:all .2s ease;
            "
            onmouseover="this.style.color='#38BDF8'"
            onmouseout="this.style.color='#0D1321'"
        >
            {{ __('Already registered?') }}
        </a>
    </div>

    <!-- Register Button -->
    <button
        type="submit"
        style="
            background:#0D1321 !important;
            color:white !important;
            height:55px !important;
            width:268px;
            margin-top:20px;
            margin-left:auto;
            margin-right:auto;
            display:block;
            border:none;
            border-radius:10px;
            font-weight:700;
            font-size:14px;
            cursor:pointer;
            transition:all .2s ease;
            box-shadow:0 8px 20px rgba(13,19,33,.25);
        "
        onmouseover="this.style.background='#151d30'"
        onmouseout="this.style.background='#0D1321'"
    >
        {{ __('Register') }}
    </button>

    </form>
</x-guest-layout>
