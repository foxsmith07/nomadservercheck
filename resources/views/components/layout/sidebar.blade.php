<a href="{{route('welcome')}}" class="h-[100px] flex justify-center items-center px-5 text-slate-200">
    <img src="asset/logosmall2.png" alt="" class="h-[70px] me-3">
    <span class=" text-2xl">Nola Service Desk</span>
</a>

<div class="flex flex-col gap-2 items-start my-[20px] px-5 text-start text-slate-200 text-[15px]">
    <a href="{{route('siv.index')}}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
        {{-- <i class="fa-solid fa-screwdriver-wrench me-2"></i> --}}
        {{-- <i class="fa-solid fa-sheet-plastic me-2"></i> --}}
        <i class="fa-solid fa-download me-3"></i>
        SIV Request
    </a>
    
    <a href="{{route('cov.index')}}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
        {{-- <i class="fa-solid fa-screwdriver-wrench me-2"></i> --}}
        <i class="fa-solid fa-phone-volume me-3"></i>
        COV Report
    </a>

    <a href="{{route('servizio.index')}}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
        {{-- <i class="fa-solid fa-screwdriver-wrench me-2"></i> --}}
        <i class="fa-solid fa-table-list me-2"></i>
        Chiusure servizio
    </a>
    <a href="{{route('obn.index')}}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
        <i class="fa-solid fa-train-subway  me-3"></i>
        
        OBN Train check
    </a>
    <a href="" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
        <i class="fa-solid fa-server me-2"></i>
        AGV / EVO check
    </a>
    <a href="{{route('train.index')}}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
        {{-- <i class="fa-solid fa-screwdriver-wrench me-2"></i> --}}
        <i class="fa-solid fa-gear me-2"></i>
        Configuration
    </a>
</div>