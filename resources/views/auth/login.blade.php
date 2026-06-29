<x-guest-layout>
    <!-- Session Status Alerts -->
    <x-auth-session-status class="mb-3 text-emerald-400 text-sm font-medium" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address Field -->
        <div>
            <label for="email" class="block text-xs font-bold uppercase tracking-wider text-[#38BDF8] mb-1.5">{{ __('Email Address') }}</label>
            <input 
                id="email" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required 
                autofocus 
                autocomplete="username" 
                class="block w-full px-4 py-2.5 rounded-lg bg-white border border-gray-300 text-gray-900 text-sm transition duration-200 focus:outline-none focus:border-[#38BDF8] focus:ring-1 focus:ring-[#38BDF8]" 
            />
            <x-input-error :messages="$errors->get('email')" class="mt-1 text-rose-400 text-xs" />
        </div>

        <!-- Password Field (Reduced margin-top space to mt-3) -->
        <div class="mt-3">
            <label for="password" class="block text-xs font-bold uppercase tracking-wider text-[#38BDF8] mb-1.5">{{ __('Password') }}</label>
            <input 
                id="password" 
                type="password" 
                name="password" 
                required 
                autocomplete="current-password" 
                class="block w-full px-4 py-2.5 rounded-lg bg-white border border-gray-300 text-gray-900 text-sm transition duration-200 focus:outline-none focus:border-[#38BDF8] focus:ring-1 focus:ring-[#38BDF8]" 
            />
            <x-input-error :messages="$errors->get('password')" class="mt-1 text-rose-400 text-xs" />
        </div>

        <!-- Remember Me Checkbox (Fixed color visibility & compact spacing) -->
        <div class="block mt-3">
            <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                <input 
                    id="remember_me" 
                    type="checkbox" 
                    name="remember"
                    class="w-4 h-4 rounded bg-[#131A2C] border-white/10 text-[#38BDF8] focus:ring-offset-[#0D1321] focus:ring-[#38BDF8]"
                >
                <span class="ms-2 text-sm text-gray-400 hover:text-gray-300 transition-colors">{{ __('Remember me') }}</span>
            </label>
        </div>

        <button type="submit" style=" background:#0D1321 !important; color:white !important; height:55px !important; width:268px; margin-top:20px; margin-left:auto; margin-right:auto; display:block; border:none; border-radius:10px; font-weight:700; font-size:14px; cursor:pointer; transition:all .2s ease; box-shadow:0 8px 20px rgba(13,19,33,.25); " onmouseover="this.style.background='#151d30'" onmouseout="this.style.background='#0D1321'" > {{ __('Log In') }} </button>
    </form>
</x-guest-layout>