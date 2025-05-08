<x-layout>
    <a href="{{route('obn.index')}}" class="btn btn-sm text-white bg-slate-400 hover:bg-slate-700 border-none mb-5">
        <i class="fa-solid fa-arrow-left"></i>
        Torna indetro
    </a>
    <h1 class="text-3xl font-bold mb-8">Train {{$train->name}}</h1>


    <pre class="overflow-x-scroll bg-white shadow-xl rounded-md p-5">{{$output}}</pre>
</x-layout>