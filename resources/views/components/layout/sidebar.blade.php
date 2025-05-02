<div class="flex flex-col justify-between h-full">

    <div>
        <a href="{{ route('welcome') }}" class="h-[100px] flex justify-center items-center text-slate-200">
            <img src="{{ asset('asset/logosmall2.png') }}" alt="" class="h-[70px] me-3">
            <span class=" text-2xl font-bold text-transparent bg-clip-text bg-gradient-to-b from-slate-100 to-red-300">Nola Service Desk</span>
        </a>

        <div class="flex flex-col gap-2 items-start my-[20px] px-5 text-start text-slate-200 text-[15px]">
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
            <a href="{{ route('movie.index') }}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
                {{-- <i class="fa-solid fa-screwdriver-wrench me-2"></i> --}}
                <i class="fa-solid fa-clapperboard me-3"></i>
                Movie to send
            </a>

            <a href="{{ route('obn.index') }}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
                <i class="fa-solid fa-train-subway  me-3"></i>
                OBN Train check
                <i class="fa-solid fa-triangle-exclamation ms-3 text-2xl text-yellow-400"></i>
            </a>

            <p class="px-3 py-2 m-0 text-slate-500">
                <i class="fa-solid fa-server me-3"></i>
                AGV / EVO check
            </p>
            <a href="{{ route('train.index') }}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
                {{-- <i class="fa-solid fa-screwdriver-wrench me-2"></i> --}}
                <i class="fa-solid fa-gear me-3"></i>
                Configuration
            </a>
        </div>
    </div>

    <div class="flex justify-center text-white h-[40px] items-center">
        {{-- <img src="{{asset('asset/logobig.png')}}" alt="" class="w-[200px]"> --}}
        <span class="text-[13px]">© 2025 (v.2) Copyright: Nomad Digital</span>
    </div>

</div>
