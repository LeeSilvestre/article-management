<x-guest-layout>
    <div class="mb-4 text-sm text-gray-400 leading-relaxed">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div>
            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-[#38BDF8] mb-1.5">{{ __('Password') }}</label>
            <input id="password" class="block w-full px-4 py-2.5 rounded-lg bg-[#131A2C] border border-white/10 text-white text-sm transition duration-200 focus:outline-none focus:border-[#38BDF8] focus:ring-1 focus:ring-[#38BDF8]"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-1.5 text-rose-400 text-xs" />
        </div>

        <div class="flex justify-end mt-4">
            <button class="w-full px-6 py-2.5 bg-white text-[#090D16] font-semibold text-sm rounded-lg shadow-md transition duration-200 hover:bg-[#F1F5F9] hover:scale-[1.01] active:scale-[0.99]">
                {{ __('Confirm') }}
            </button>
        </div>
    </form>
</x-guest-layout>