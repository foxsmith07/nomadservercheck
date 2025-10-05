<div class="flex flex-col justify-between h-full bg-slate-900">

    <div>
        <a href="{{ route('welcome') }}" class="h-[80px] flex justify-center items-center text-slate-200 mb-10">
            <img src="{{ asset('asset/logosmall2.png') }}" alt="" class="h-[60px] me-3">
            {{-- <span class=" text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-b from-slate-100 to-red-300">Nola Service Desk</span> --}}
            <span class="text-xl font-bold text-rose-500 me-2">Nola</span>
            <span class="text-xl font-bold text-zinc-300 me-2"> Service Desk</span>
        </a>
        
        <div class="flex flex-col items-start my-2 px-5 text-start text-slate-200 text-[15px]">
            <a href="{{route('welcome')}}"  class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
                <i class="fa-solid fa-house me-3"></i>
                <span>Dashboard</span>
                {{-- <span>Overview</span> --}}
            </a>
            
            <p class="px-3 m-0 w-full text-transparent bg-clip-text bg-gradient-to-b from-slate-100 to-blue-300 mt-3 mb-1">Serivce Desk</p>

            <a href="{{ route('siv.index') }}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
                {{-- <i class="fa-solid fa-screwdriver-wrench me-2"></i> --}}
                {{-- <i class="fa-solid fa-sheet-plastic me-2"></i> --}}
                <i class="fa-solid fa-download me-3"></i>
                SIV Request
            </a>

            <a href="{{ route('cov.index') }}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
                {{-- <i class="fa-solid fa-screwdriver-wrench me-2"></i> --}}
                <i class="fa-solid fa-phone-volume me-3"></i>
                COV Report
            </a>

            <a href="{{ route('servizio.index') }}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
                {{-- <i class="fa-solid fa-screwdriver-wrench me-2"></i> --}}
                <i class="fa-solid fa-table-list me-3"></i>
                Chiusure servizio
            </a>
            
            <a href="{{route('italoupgrade.index')}}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
                {{-- <i class="fa-solid fa-screwdriver-wrench me-2"></i> --}}
                <i class="fa-solid fa-train-subway me-3"></i>
                Italo Upgrade Roadmap
            </a>
            
            <p class="px-3 m-0 w-full text-transparent bg-clip-text bg-gradient-to-b from-slate-100 to-blue-300 mt-3 mb-1">Train Actions</p>

            <a href="{{ route('movie.index') }}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
                {{-- <i class="fa-solid fa-screwdriver-wrench me-2"></i> --}}
                <i class="fa-solid fa-clapperboard me-3"></i>
                Movie to send
            </a>

            {{-- <a href="{{ route('obn.index') }}" class="hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full"> --}}
            {{-- <a href="javascript:void(0)" class="pointer-events-none px-3 py-2 m-0 rounded-md w-full text-slate-500">
                <i class="fa-solid fa-train-subway  me-3"></i>
                OBN Train check
                <i class="fa-solid fa-triangle-exclamation ms-3 text-2xl text-yellow-400"></i>
            </a> --}}
            
            <a href="{{ route('cmd.index') }}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
                <i class="fa-solid fa-terminal me-3"></i>
                CMD on Trains
            </a>

            <p class="px-3 m-0 w-full text-transparent bg-clip-text bg-gradient-to-b from-slate-100 to-blue-300 mt-3 mb-1">Stock management</p>

            <a href="{{ route('stock.index') }}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
                {{-- <i class="fa-solid fa-screwdriver-wrench me-2"></i> --}}
                <i class="fa-solid fa-gear me-3"></i>
                Inventory
            </a>

            <p class="px-3 m-0 w-full text-transparent bg-clip-text bg-gradient-to-b from-slate-100 to-blue-300 mt-3 mb-1">Settings</p>

            <a href="{{ route('train.index') }}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
                {{-- <i class="fa-solid fa-screwdriver-wrench me-2"></i> --}}
                <i class="fa-solid fa-gear me-3"></i>
                Configuration
            </a>
        </div>
    </div>

    <div class="flex justify-center text-white h-[40px] items-center">
        {{-- <img src="{{asset('asset/logobig.png')}}" alt="" class="w-[200px]"> --}}
        <span class="text-[13px]">© 2025 (v1.2) Copyright: Nomad Digital</span>
    </div>

</div>
