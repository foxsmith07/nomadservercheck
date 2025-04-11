<div class="navbar bg-base-100 shadow-2xl flex justify-between">

    <div class="dropdown dropdown-start lg:hidden">
        <div tabindex="0" role="button" class="btn m-1"><i class="fa-solid fa-bars text-2xl"></i></div>
        <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-1 w-screen p-2 shadow-sm">
            <li><a href="{{route('siv.index')}}" class="text-2xl">Siv Request</a></li>
            <li><a href="{{route('cov.index')}}" class="text-2xl">COV Report</a></li>
            <li><a href="{{route('servizio.index')}}" class="text-2xl">Chiusure servizio</a></li>
            <li><a href="{{route('obn.index')}}" class="text-2xl">OBN Trains Check</a></li>
            <li><a>Mar3 trains check</a></li>
            <li><a href="{{route('train.index')}}" class="text-2xl">Siv Request</a></li>
        </ul>
    </div>

    <div class="flex-1 lg:flex items-center ms-2 hidden">
        <a href="{{ route('welcome') }}">
            <img src="asset/logobig.png" alt="" class="w-[200px]">
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
                                    <img src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                                </div>
                            </div>
                            {{ ucfirst(Auth::user()->name) }}
                        </summary>
                        <ul class="bg-base-100 shadow-xl rounded-t-none w-full p-2">
                            <li><a>
                                    <i class="fa-regular fa-circle-user me-2 text-[20px]"></i>
                                    Profile
                                </a></li>

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
