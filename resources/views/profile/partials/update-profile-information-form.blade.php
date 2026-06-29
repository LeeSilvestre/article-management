<section>

    <header>
        <h2
            style="
                color:#0D1321;
                font-size:24px;
                font-weight:700;
            "
        >
            {{ __('Profile Information') }}
        </h2>

        <p
            style="
                margin-top:8px;
                color:#64748B;
                font-size:14px;
            "
        >
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6">
        @csrf
        @method('patch')

        <div style="margin-top:20px;">

            <label
                for="name"
                class="block text-xs font-bold uppercase tracking-wider text-[#38BDF8] mb-1.5"
            >
                Name
            </label>

            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
                class="block w-full px-4 py-2.5 rounded-lg bg-white border border-gray-300 text-gray-900 text-sm focus:border-[#38BDF8] focus:ring-1 focus:ring-[#38BDF8]"
            >

            <x-input-error
                class="mt-2 text-rose-400 text-xs"
                :messages="$errors->get('name')"
            />

        </div>

        <div style="margin-top:20px;">

            <label
                for="email"
                class="block text-xs font-bold uppercase tracking-wider text-[#38BDF8] mb-1.5"
            >
                Email Address
            </label>

            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
                class="block w-full px-4 py-2.5 rounded-lg bg-white border border-gray-300 text-gray-900 text-sm focus:border-[#38BDF8] focus:ring-1 focus:ring-[#38BDF8]"
            >

            <x-input-error
                class="mt-2 text-rose-400 text-xs"
                :messages="$errors->get('email')"
            />

        </div>

        <div style="margin-top:25px;">

            <button
                type="submit"
                style="
                    background:#0D1321;
                    color:white;
                    height:55px;
                    width:268px;
                    display:block;
                    border:none;
                    border-radius:10px;
                    font-weight:700;
                    font-size:14px;
                    cursor:pointer;
                    box-shadow:0 8px 20px rgba(13,19,33,.25);
                "
            >
                Save Changes
            </button>

        </div>

        @if (session('status') === 'profile-updated')

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
                Saved.
            </p>

        @endif

    </form>

</section>