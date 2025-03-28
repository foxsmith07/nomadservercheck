<div class="h-[150px] flex flex-col justify-center items-center px-5 text-slate-200">
    <img src="asset/logobig.png" alt="">
    <h1 class="text-center text-2xl my-5">Nola Service Desk</h1>
</div>

<div class="flex flex-col gap-5 items-start my-[30px] px-5 text-start text-slate-200">
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
    <a href="{{route('obn.check')}}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
        <i class="fa-solid fa-house me-3"></i>
        
        OBN validate check
    </a>
    <a href="" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
        <i class="fa-solid fa-train-subway me-2"></i>
        AGV / EVO check
    </a>
    <a href="{{route('pdf')}}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
        {{-- <i class="fa-solid fa-screwdriver-wrench me-2"></i> --}}
        <i class="fa-solid fa-gear me-2"></i>
        PDF Reader
    </a>
</div>