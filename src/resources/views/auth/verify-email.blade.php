<x-app>
    <section class="section">
        <div class="container">
            <h2 class="section-header">{{ __("Verify email") }}</h2>
            <div class="section-content">
                <form class="form-block" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div class="form-icon-wrapper">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="100.000000pt" height="100.000000pt"
                            viewBox="0 0 100.000000 100.000000" preserveAspectRatio="xMidYMid meet">

                            <g transform="translate(0.000000,100.000000) scale(0.100000,-0.100000)" fill="#000000"
                                stroke="none">
                                <path d="M445 928 c-11 -6 -33 -22 -48 -37 -24 -22 -39 -27 -110 -31 l-82 -5
                       -3 -67 -3 -67 -70 -62 -69 -62 2 -266 3 -266 435 0 435 0 3 266 2 266 -69 62
                       -70 62 -3 67 -3 67 -82 5 c-71 4 -86 9 -110 31 -15 15 -38 32 -50 38 -27 14
                       -82 14 -108 -1z m106 -48 l24 -19 -75 0 -75 0 24 19 c13 11 36 20 51 20 15 0
                       38 -9 51 -20z m209 -234 l0 -175 -56 -45 -56 -46 -46 35 c-25 20 -56 38 -69
                       41 -39 10 -89 -5 -136 -41 l-45 -35 -56 46 -56 45 0 175 0 174 260 0 260 0 0
                       -174z m-562 -105 l-3 -40 -45 40 -45 39 45 41 45 41 3 -41 c2 -22 2 -59 0 -80z
                       m652 83 c22 -20 40 -40 40 -44 0 -4 -20 -24 -45 -44 l-45 -37 0 80 c0 45 2 81
                       5 81 3 0 23 -16 45 -36z m-634 -186 c57 -45 101 -85 97 -89 -32 -27 -203 -159
                       -207 -159 -3 0 -6 74 -6 165 0 91 3 165 6 165 3 0 52 -37 110 -82z m684 -83
                       c0 -91 -2 -165 -5 -165 -7 0 -205 156 -208 163 -2 6 195 165 206 166 4 1 7
                       -73 7 -164z m-303 13 c232 -177 302 -235 302 -250 1 -17 -25 -18 -399 -18
                       -374 0 -400 1 -399 18 0 15 70 73 302 250 45 34 78 52 97 52 19 0 52 -18 97
                       -52z" />
                                <path d="M305 709 c-16 -25 18 -29 201 -27 160 3 189 5 189 18 0 13 -29 15
                       -192 18 -132 2 -194 -1 -198 -9z" />
                                <path d="M305 609 c-15 -23 16 -30 131 -27 98 2 119 6 119 18 0 12 -21 15
                       -122 18 -81 2 -124 -1 -128 -9z" />
                            </g>
                        </svg>
                    </div>
                    <h2 class="form-title">
                        {{ __("You must verify your email address, please check your email for a vericfication link.") }}
                    </h2>
                    <div class="form-submit"><button class="btn flare-effect">{{ __("Resend email") }}</button></div>
                    @if (session('status'))
                    <div class="alert alert-success">{{ session("status") }}</div>
                    @endif
                </form>
            </div>
        </div>
    </section>
</x-app>