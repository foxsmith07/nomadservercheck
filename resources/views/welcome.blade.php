<x-layout>
    <H1 class="text-3xl mb-8">Main Overview</H1>

    <header class="grid lg:grid-cols-4 gap-10 text-slate-600">

        {{-- ? WIDGET 1 Cov --}}
        <a href="{{ route('cov.index') }}"
            {{-- class="h-[180px] bg-linear-to-tl from-cyan-500 to-blue-500 text-white rounded-md shadow-xl p-5 grid grid-cols-2 hover:scale-110 transition-transform"> --}}
            class="h-[180px] bg-white text-blue-700 rounded-md shadow-xl p-5 grid grid-cols-2 hover:scale-110 transition-transform">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl font-bold">Cov Report</h3>
                <p><span class="font-bold text-3xl"> {{ $covCount }} </span> call this month</p>
            </div>
            <div class="col-span-1 flex justify-center items-center rounded-full bg-blue-700 text-white">
                <i class="fa-solid fa-phone-volume text-7xl"></i>
            </div>
        </a>

        {{-- ? WIDGET 2 Chiusure Servizio --}}
        <a href="{{ route('servizio.index') }}"
            {{-- class="h-[180px] bg-linear-to-tl from-red from-amber-400 to-orange-500 rounded-md shadow-xl p-5 grid grid-cols-2 text-white hover:scale-110 transition-transform"> --}}
            class="h-[180px] bg-white rounded-md shadow-xl p-5 grid grid-cols-2 text-rose-500 hover:scale-110 transition-transform">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl font-bold">Chiusure Servizio</h3>
                <p><span class="font-bold text-3xl">{{ $servicesCount }}</span> servizi chiusi</p>
            </div>
            <div class="col-span-1 flex justify-center items-center rounded-full bg-rose-400 text-white p-3">
                <i class="fa-solid fa-table-list text-7xl"></i>
            </div>
        </a>

        {{-- ? WIDGET 3 Siv --}}
        <a href="{{ route('siv.index') }}"
            {{-- class="h-[180px] bg-green-700 rounded-md shadow-xl p-5 grid grid-cols-2 text-white hover:scale-110 transition-transform"> --}}
            class="h-[180px] bg-white rounded-md shadow-xl p-5 grid grid-cols-2 text-green-700 hover:scale-110 transition-transform">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl font-bold">Siv Request</h3>
                <p><span class="font-bold text-3xl">{{ $sivCount }}</span> requests intervention</p>
            </div>
            <div class="col-span-1 flex justify-center items-center rounded-full bg-green-700 text-white">
                <i class="fa-solid fa-download text-7xl"></i>
            </div>
        </a>

        {{-- ? WIDGET 4 Users --}}
        {{-- <a
            class="h-[180px] bg-linear-to-tl from-rose-400 to-red-500 rounded-md shadow-xl p-5 grid grid-cols-2 text-white hover:scale-110 transition-transform">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl font-bold">Users</h3>
                <p><span class="font-bold text-3xl">{{ $usersCount }}</span> users created</p>
            </div>
            <div class="col-span-1 flex justify-center items-center">
                <i class="fa-regular fa-id-card text-7xl"></i>
            </div>
        </a> --}}
        
        {{-- ? WIDGET 4 IOB Upgrade --}}
        {{-- <a href="{{route('train.index')}}" class="h-[180px] bg-linear-to-tl from-rose-400 to-red-500 rounded-md shadow-xl p-5 grid grid-cols-2 text-white hover:scale-110 transition-transform"> --}}
        {{-- <a href="{{route('train.index')}}" class="h-[180px] bg-rose-400  rounded-md shadow-xl p-5 grid grid-cols-2 text-white hover:scale-110 transition-transform"> --}}
        <a href="{{route('train.index')}}" class="h-[180px] bg-white  rounded-md shadow-xl p-5 grid grid-cols-2 text-amber-600 hover:scale-110 transition-transform">
            <div class="flex flex-col justify-between col-span-1 h-full">
                <h3 class="text-2xl font-bold">IOB Trains done</h3>
                <p><span class="font-bold text-4xl">{{ $iobTrains }}</span> <span class="text-xl">/ 51 </span> <span class="text-amber-800">({{$percentuale}}%)</span></p>
            </div>
            <div class="col-span-1 flex justify-center items-center text-white rounded-full bg-amber-400">
                <i class="fa-solid fa-server text-7xl"></i>
            </div>
        </a>

    </header>


    <div class="p-3 bg-slate-400 rounded-xl mt-8">
        {{-- <h1 class="text-center text-4xl font-bold text-transparent! bg-clip-text! bg-gradient-to-b! from-slate-100! to-blue-300! mb-3">Lavagna</h1> --}}
        <h1 class="text-center text-4xl font-bold text-slate-700! mb-3">Lavagna</h1>
        <form action="{{route('welcome.save',compact('lavagna'))}}" method="POST">
            @csrf
            @method('put')
            <textarea name="content" id="lavagna" cols="30" rows="30" class="w-full h-full">{{$lavagna->content ?? ''}}</textarea>
            <button name="submitbtn"></button>
        </form>
    </div>


</x-layout>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.0.1/tinymce.min.js" referrerpolicy="origin"></script> --}}
<script src="https://cdn.tiny.cloud/1/p2qn55zpsfbcrh7083xx18c1tufrb85xz58c2oeknodqte8t/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
{{-- <script src="{{ asset('tinymce/tinymce.min.js') }}"></script> --}}
<script>
    tinymce.init({
        // apiKey: 'p2qn55zpsfbcrh7083xx18c1tufrb85xz58c2oeknodqte8t',
        // apiKey: 'gpl',
        // license_key: 'gpl',
        selector: 'textarea#lavagna', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'code table lists advlist link image autosave save',
        // autosave_interval: '20s',
        toolbar: 'undo redo | blocks | bold italic backcolor forecolor | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table | save',
        onboarding: false,

        // MENU BAR - Menu dive sta File, ecc..
        // menubar: false,

        //? STATUS BAR - barra sottostante
        // statusbar: false,
        branding: false,
        elementpath: false,
        resize: false,
    });
</script>

@session('success')
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endsession

@session('error')
    <script>
        Swal.fire({
            position: "center",
            icon: "error",
            title: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 3000
        });
    </script>
@endsession

<script>
    function confirmDelete(event, formElement) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn text-[18px] bg-green-500 text-slate-100 border-none mx-[6px] rounded-[4px] hover:bg-green-700",
                cancelButton: "btn text-[18px] bg-red-500 text-slate-100 border-none mx-[6px] rounded-[4px] hover:bg-red-700"
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: "Sei sicuro di cancellare l\' utente?",
            text: "Non puoi tornare indietro!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, cancellalo!",
            cancelButtonText: "No, annulla!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // Invia il form se l'utente conferma
                formElement.submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Annullato",
                    text: "l\' utente è salvo :)",
                    icon: "error"
                });
            }
        });
    }
</script>
