<div class="h-[250px] flex flex-col justify-center items-center px-5 text-slate-200">
    <img src="asset/logobig.png" alt="">
    <h1 class="text-center text-2xl my-5">Nola Service Desk</h1>
</div>

<div class="flex flex-col gap-5 items-center my-[50px] px-5 text-center text-slate-200">
    <a href="{{route('obn.check')}}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
        <i class="fa-solid fa-house me-2"></i>
        OBN validate check
    </a>
    <a href="" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
        <i class="fa-solid fa-train-subway me-2"></i>
        AGV / EVO check
    </a>
    <a href="" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
        {{-- <i class="fa-solid fa-screwdriver-wrench me-2"></i> --}}
        <i class="fa-solid fa-gear me-2"></i>
        Aggiungi Treno IOB
    </a>
    <a href="{{route('pdf')}}" class=" hover:bg-[#4D65D9] px-3 py-2 m-0 rounded-md w-full">
        {{-- <i class="fa-solid fa-screwdriver-wrench me-2"></i> --}}
        <i class="fa-solid fa-gear me-2"></i>
        PDF Reader
    </a>
</div>