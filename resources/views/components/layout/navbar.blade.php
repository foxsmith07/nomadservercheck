<div class="navbar bg-base-100 shadow-2xl">
    <div class="flex-1 flex items-center ms-2">
        {{-- <a class="btn btn-ghost text-xl">Nomad Server status</a> --}}
        {{-- <img src="asset/logosmall.png" alt="" class="h-[50px] me-3">
        <span>Nola Service Desk</span> --}}
        <a href="{{route('welcome')}}">
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
                            <form action="{{route('logout')}}" method="POST" style="display: inline;">
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
