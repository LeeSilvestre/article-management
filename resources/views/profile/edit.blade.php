<x-app-layout>

    <div
        style="
            min-height:100vh;
            background:linear-gradient(135deg,#0D1321 0%,#1B2438 100%);
            padding:40px 20px;
        "
    >

        <div
            style="
                max-width:1100px;
                margin:auto;
            "
        >

            <!-- PAGE HEADER -->

            <div
                style="
                    text-align:center;
                    margin-bottom:30px;
                "
            >

                <h1
                    style="
                        color:white;
                        font-size:32px;
                        font-weight:800;
                        margin-bottom:8px;
                    "
                >
                    Profile Settings
                </h1>

                <p
                    style="
                        color:#94A3B8;
                        font-size:14px;
                    "
                >
                    Manage your account information and security preferences.
                </p>

            </div>

            <!-- PROFILE INFORMATION CARD -->

            <div
                style="
                    background:white;
                    border-radius:16px;
                    padding:30px;
                    box-shadow:0 15px 40px rgba(0,0,0,.25);
                    margin-bottom:25px;
                    border-top:4px solid #38BDF8;
                "
            >

                <div
                    style="
                        margin-bottom:20px;
                    "
                >

                    <h2
                        style="
                            font-size:22px;
                            font-weight:700;
                            color:#0D1321;
                            margin-bottom:5px;
                        "
                    >
                        Profile Information
                    </h2>

                    <p
                        style="
                            color:#64748B;
                            font-size:14px;
                        "
                    >
                        Update your personal information and email address.
                    </p>

                </div>

                @include('profile.partials.update-profile-information-form')

            </div>

            <!-- PASSWORD CARD -->

            <div
                style="
                    background:white;
                    border-radius:16px;
                    padding:30px;
                    box-shadow:0 15px 40px rgba(0,0,0,.25);
                    border-top:4px solid #38BDF8;
                "
            >

                <div
                    style="
                        margin-bottom:20px;
                    "
                >

                    <h2
                        style="
                            font-size:22px;
                            font-weight:700;
                            color:#0D1321;
                            margin-bottom:5px;
                        "
                    >
                        Security Settings
                    </h2>

                    <p
                        style="
                            color:#64748B;
                            font-size:14px;
                        "
                    >
                        Change your password and keep your account secure.
                    </p>

                </div>

                @include('profile.partials.update-password-form')

            </div>

        </div>

    </div>

</x-app-layout>