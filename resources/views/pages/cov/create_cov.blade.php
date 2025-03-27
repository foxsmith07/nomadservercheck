<x-layout>
    <h1 class="text-3xl mb-5">COV create</h1>

    <form action="" class="bg-slate-200 p-5 rounded-md max-w-[600px]">

        {{--? RIGA 1 --}}
        <div class="flex justify-between gap-10">
            <div>
                <label for="" class=" block mb-2">Train</label>
                <input type="text" class="bg-slate-50 p-2 rounded-md">
            </div>
    
            <div>
                <Label class="block mb-2">Time</Label>
                <input type="time" class="bg-slate-50 p-2 rounded-md">
            </div>
    
            <div>
                <label for="" class="block mb-2">Worker</label>
                <select class="select select-ghost bg-slate-50">
                    <option disabled selected>Select worker</option>
                    <option value="Walter">Walter</option>
                    <option value="Felice">Felice</option>
                    <option value="Fortunato">Fortunato</option>
                    <option value="Vincenzo">Vincenzo</option>
                    <option value="Andrea">Andrea</option>
                    <option value="Carla">Carla</option>
                </select>
            </div>
        </div>

        {{--? RIGA 2 --}}
        <div class="mt-5 w-full">
            <Label class="block mb-2">Request</Label>
            <input type="text" class="bg-slate-50 rounded-md p-2 w-full">
        </div>


        {{--? RIGA 3  --}}
        <div class="flex justify-between gap-10 mt-5">
            <div class="w-1/3">
                <label for="" class="block mb-2">Resolved</label>
                <select name="resolved" id="" class="select select-ghost bg-slate-50">
                    <option disabled selected>Select state</option>
                    <option value="yes" class="bg-green-200 text-green-800">Yes</option>
                    <option value="slow" class="bg-yellow-200 text-yellow-800">Yes</option>
                    <option value="no" class="bg-red-200 text-red-800">No</option>
                </select>
            </div>

            <div class="w-2/3">
                <label for="" class="block mb-2">Ticket Number</label>
                <input type="text" class="bg-slate-50 p-2 rounded-md w-full">
            </div>
        </div>

        {{--? RIGA 4 --}}
        <div class="w-full mt-5">
            <label for="" class="block m-2">Note</label>
            <textarea name="" id="" cols="30" rows="10" placeholder="Note" class="w-full bg-slate-50 p-2 rounded-md"></textarea>
        </div>

        <div class="w-full flex justify-end">
            <button type="submit" class="btn w-[150px] bg-blue-500 text-white hover:bg-blue-700 mt-5 rounded-md">Submit</button>
        </div>
    </form>
</x-layout>