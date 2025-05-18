<x-layout>
    <h1 class="text-3xl mb-5">Command on Trains</h1>
    <div class="bg-white rounded-md shadow-xl p-5">
        <p>{{$cmd == '' ? 'non inserito' : $cmd}}</p>
        <pre>{{$output}}</pre>
    </div>
</x-layout>