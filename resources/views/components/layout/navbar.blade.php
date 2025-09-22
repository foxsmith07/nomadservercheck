<nav class="navbar bg-[#282D3E] lg:bg-base-100 shadow-2xl flex justify-between h-[80px]">

    <div class="dropdown dropdown-start lg:hidden">
        <div tabindex="0" role="button" class="btn m-1 bg-slate-500 border-none shadow-none w-[70px]">
            <i class="fa-solid fa-bars text-2xl"></i>
        </div>
        
        <ul tabindex="0" class="dropdown-content menu bg-[#282D3E] rounded-box z-1 w-screen p-2 shadow-sm">

            <li>
                <a href="{{ route('welcome') }}" class="text-2xl text-slate-100">
                    <i class="fa-solid fa-house me-3"></i>
                    Dashboard
                </a>
            </li>

            <div class="divider divider-info w-4/5 text-center mx-auto"></div>

            <li>
                <a href="{{ route('siv.index') }}" class="text-2xl text-slate-100 mb-2">
                    <i class="fa-solid fa-download me-3"></i> Siv Request
                </a>
            </li>
            <li>
                <a href="{{ route('cov.index') }}" class="text-2xl text-slate-100 mb-2">
                    <i class="fa-solid fa-phone-volume me-3"></i> COV Report
                </a>
            </li>
            <li>
                <a href="{{ route('servizio.index') }}" class="text-2xl text-slate-100 mb-2">
                    <i class="fa-solid fa-table-list me-2"></i> Chiusure servizio
                </a>
            </li>

            <li>
                <a href="{{ route('italoupgrade.index') }}" class="text-2xl text-slate-100 mb-2">
                    <i class="fa-solid fa-train-subway me-2"></i> Italo Upgrade Roadmap
                </a>
            </li>

            <div class="divider divider-info w-4/5 text-center mx-auto"></div>

            <li>
                <a href="{{ route('movie.index') }}" class="text-2xl text-slate-100">
                    <i class="fa-solid fa-clapperboard me-3"></i>
                    Movie to send
                </a>
            </li>

            <li>
                <a href="javascript:void(0)" class="text-2xl pointer-events-none text-slate-500">
                    <i class="fa-solid fa-train-subway  me-3"></i>
                    OBN Train check
                    <i class="fa-solid fa-triangle-exclamation ms-3 text-2xl text-yellow-400"></i>
                </a>
            </li>

            <li>
                <a href="{{ route('cmd.index') }}" class="text-2xl text-slate-100">
                    <i class="fa-solid fa-terminal me-3"></i>
                    CMD on Trains
                </a>
            </li>

            <div class="divider divider-info w-4/5 text-center mx-auto"></div>


            <li>
                <a href="{{ route('train.index') }}" class="text-2xl text-slate-100">
                    <i class="fa-solid fa-gear me-3"></i>
                    Configuration
                </a>
            </li>
        </ul>
    </div>


    {{-- ? NAVBAR LG ------------------------------------------------------------------------------------------------------------- --}}

    <div class="lg:flex items-center ms-2 hidden">
        <a href="{{ route('welcome') }}">
            <img src="{{ asset('asset/logobig.png') }}" alt="" class="w-[200px]">
            {{-- <span>Service Desk Nola</span> --}}
        </a>
    </div>



    {{-- ! ADMIN SESSION --}}
    @if (Auth::user()->role == 'admin')
        <div class="hidden md:block">
            <a href="{{ route('user.index') }}" class="hover:bg-slate-200 p-3 w-full rounded-md">
                <i class="fa-solid fa-user me-2 text-[20px] text-slate-500"></i>
                <span class="text-slate-700">Team Management</span>
            </a>
        </div>
    @endif


    {{-- ! END ADMIN SESSION --}}



    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            {{-- <li><a>Link</a></li> --}}
            <li>
                @auth

                    <details class="w-[180px] z-10">
                        <summary class="rounded-md active:bg-slate-300!">
                            <div class="avatar">
                                <div class="w-[45px] rounded-full">
                                    @if (Auth::user()->email == 'vincenzo.gori@nomadrail.com')
                                        <img src="https://img.daisyui.com/images/profile/demo/yellingcat@192.webp" />
                                    @elseif (Auth::user()->email == 'carla.napolitano@nomadrail.com')
                                        <img src="{{ asset('asset/avatar_woman.png') }}" alt="avatar_woman">
                                    @else
                                        {{-- <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp"/> --}}
                                        <img src="{{ asset('asset/avatar_man.png') }}" alt="avatar_man" />
                                    @endif
                                </div>
                            </div>
                            <span class="text-slate-100 lg:text-gray-700">{{ ucfirst(Auth::user()->name) }}</span>
                        </summary>
                        <ul class="bg-[#282D3E] lg:bg-base-100 shadow-xl rounded-t-none w-full p-2">
                            <li>
                                <a href="{{ route('user.edit', ['user' => Auth::user()]) }}"
                                    class="text-slate-100 lg:text-gray-700 active:bg-slate-300! active:text-black!">
                                    <i class="fa-regular fa-circle-user me-2 text-[20px]"></i>
                                    Profile
                                </a>
                            </li>

                            @if (Auth::user()->role == 'admin')
                                <li>
                                    <a href="{{ route('user.index') }}" class="text-slate-100 lg:text-gray-700 active:bg-slate-300! active:text-black!">
                                        <i class="fa-solid fa-user me-2 text-[20px]"></i>
                                        Team management
                                    </a>
                                </li>
                            @endif

                            <li>
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;" class="active:bg-slate-300!">
                                    @csrf
                                    <button class="dropdown-item text-red-500">
                                        <i class="fa-solid fa-right-from-bracket me-2 text-[20px]"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </details>
                @endauth
                @guest
                    <h3>Non autenticato</h3>
                @endguest
            </li>
        </ul>
    </div>
</nav>
