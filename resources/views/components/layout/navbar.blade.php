<div class="navbar bg-[#282D3E] lg:bg-base-100 shadow-2xl flex justify-between">

    <div class="dropdown dropdown-start lg:hidden">
        <div tabindex="0" role="button" class="btn m-1 bg-slate-500 border-none"><i class="fa-solid fa-bars text-2xl"></i></div>
        <ul tabindex="0" class="dropdown-content menu bg-[#282D3E] rounded-box z-1 w-screen p-2 shadow-sm">
            <li>
                <a href="{{route('siv.index')}}" class="text-2xl text-slate-100">
                    <i class="fa-solid fa-download me-3"></i> Siv Request
                </a>
            </li>
            <li>
                <a href="{{route('cov.index')}}" class="text-2xl text-slate-100">
                    <i class="fa-solid fa-phone-volume me-3"></i> COV Report
                </a>
            </li>
            <li>
                <a href="{{route('servizio.index')}}" class="text-2xl text-slate-100">
                    <i class="fa-solid fa-table-list me-2"></i> Chiusure servizio
                </a>
            </li>
            <li>
                <a href="{{route('obn.index')}}" class="text-2xl text-slate-100">
                    <i class="fa-solid fa-train-subway  me-3"></i> OBN Trains Check
                </a>
            </li>
            <li>
                <a class="text-2xl text-slate-100">
                    <i class="fa-solid fa-server me-2"></i> Mar3 trains check
                </a>
            </li>
            <li>
                <a href="{{route('train.index')}}" class="text-2xl text-slate-100">
                    <i class="fa-solid fa-gear me-2"></i>
                    Siv Request
                </a>
            </li>
        </ul>
    </div>

    <div class="flex-1 lg:flex items-center ms-2 hidden">
        <a href="{{ route('welcome') }}">
            <img src="{{asset('asset/logobig.png')}}" alt="" class="w-[200px]">
        </a>
    </div>
    <div class="flex-none">
        <ul class="menu menu-horizontal px-1">
            {{-- <li><a>Link</a></li> --}}
            <li>
                @auth

                    <details>
                        <summary>
                            <div class="avatar">
                                <div class="w-[50px] rounded-full">
                                    <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp"/>
                                </div>
                            </div>
                            <span class="text-slate-100 lg:text-gray-700">{{ ucfirst(Auth::user()->name) }}</span>
                        </summary>
                        <ul class="bg-[#282D3E] lg:bg-base-100 shadow-xl rounded-t-none w-full p-2">
                            <li>
                                <a class="text-slate-100 lg:text-gray-700">
                                    <i class="fa-regular fa-circle-user me-2 text-[20px]"></i>
                                    Profile
                                </a>
                            </li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
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
</div>
