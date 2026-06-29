<section>

    <header>

        <h2
            style="
                color:#0D1321;
                font-size:24px;
                font-weight:700;
            "
        >
            {{ __('Update Password') }}
        </h2>

        <p
            style="
                margin-top:8px;
                color:#64748B;
                font-size:14px;
            "
        >
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>

    </header>

    <form
        method="post"
        action="{{ route('password.update') }}"
        class="mt-6"
    >

        @csrf
        @method('put')

        <!-- Current Password -->

        <div style="margin-top:20px;">

            <label
                for="update_password_current_password"
                class="block text-xs font-bold uppercase tracking-wider text-[#38BDF8] mb-1.5"
            >
                Current Password
            </label>

            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
                class="block w-full px-4 py-2.5 rounded-lg bg-white border border-gray-300 text-gray-900 text-sm focus:border-[#38BDF8] focus:ring-1 focus:ring-[#38BDF8]"
            >

            <x-input-error
                :messages="$errors->updatePassword->get('current_password')"
                class="mt-2 text-rose-400 text-xs"
            />

        </div>

        <!-- New Password -->

        <div style="margin-top:20px;">

            <label
                for="update_password_password"
                class="block text-xs font-bold uppercase tracking-wider text-[#38BDF8] mb-1.5"
            >
                New Password
            </label>

            <input
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"
                class="block w-full px-4 py-2.5 rounded-lg bg-white border border-gray-300 text-gray-900 text-sm focus:border-[#38BDF8] focus:ring-1 focus:ring-[#38BDF8]"
            >

            <x-input-error
                :messages="$errors->updatePassword->get('password')"
                class="mt-2 text-rose-400 text-xs"
            />

        </div>

        <!-- Confirm Password -->

        <div style="margin-top:20px;">

            <label
                for="update_password_password_confirmation"
                class="block text-xs font-bold uppercase tracking-wider text-[#38BDF8] mb-1.5"
            >
                Confirm Password
            </label>

            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
                class="block w-full px-4 py-2.5 rounded-lg bg-white border border-gray-300 text-gray-900 text-sm focus:border-[#38BDF8] focus:ring-1 focus:ring-[#38BDF8]"
            >

            <x-input-error
                :messages="$errors->updatePassword->get('password_confirmation')"
                class="mt-2 text-rose-400 text-xs"
            />

        </div>

        <!-- Save Button -->

        <div style="margin-top:25px;">

            <button
                type="submit"
                style="
                    background:#0D1321;
                    color:white;
                    height:55px;
                    width:268px;
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
                Update Password
            </button>

        </div>

        @if (session('status') === 'password-updated')

            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                style="
                    margin-top:10px;
                    color:#38BDF8;
                    font-size:14px;
                    font-weight:600;
                "
            >
                Password updated successfully.
            </p>

        @endif

    </form>

</section>