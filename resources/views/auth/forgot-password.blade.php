<x-guest-layout>
    <div class="mb-4 text-sm text-gray-400 leading-relaxed">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a reset link.') }}
    </div>

    <x-auth-session-status class="mb-3 text-emerald-400 text-sm font-medium" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-[#38BDF8] mb-1.5">{{ __('Email Address') }}</label>
            <input id="email" class="block w-full px-4 py-2.5 rounded-lg bg-[#131A2C] border border-white/10 text-white text-sm transition duration-200 focus:outline-none focus:border-[#38BDF8] focus:ring-1 focus:ring-[#38BDF8]" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-1.5 text-rose-400 text-xs" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <button class="w-full px-5 py-2.5 bg-white text-[#090D16] font-semibold text-sm rounded-lg shadow-md transition duration-200 hover:bg-[#F1F5F9] hover:scale-[1.01] active:scale-[0.99] text-center">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>
    </form>
</x-guest-layout>