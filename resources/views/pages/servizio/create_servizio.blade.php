<x-layout>
    <h1 class="text-4xl mb-8">Chiusura Servizio</h1>
    <form action="{{route('servizio.store')}}" method="POST" x-data="{isLoading: false}" @submit="isLoading = true">
        @csrf
        @if ($errors->any())
            <div class="mb-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-500">* {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="overflow-x-auto w-[600px] shadow-xl">
            <table class="table">
                <tbody>
                    <tr class="bg-base-200 hover:bg-slate-200">
                        <th class="border">System: </th>
                        <td class="border">Telematica di bordo</td>
                    </tr>
                    <tr class="bg-base-200 hover:bg-slate-200">
                        <th class="border">Event: </th>
                        <td class="border p-0 flex @error('event') border-red-500 @enderror @error('train') border-red-500 @enderror">
                            <input type="text" name="event" class="w-full p-3" placeholder="es. Telematica assente AGV-04">
                            <select name="train" class="outline-0 focus:border-2 focus:border-blue-400">
                                <option selected disabled></option>
                                @forelse ($trains as $train)
                                    <option value="{{ $train->name }}">{{ $train->name }}</option>
                                @empty
                                    <option disabled>No train insered</option>
                                @endforelse
                            </select>
                        </td>
                    </tr>
                    <tr class="bg-base-200 hover:bg-slate-200"">
                        <th class="border">User Impact: </th>
                        <td class="border p-0 @error('impact') border-red-500 @enderror">
                            <input type="text" name="impact" class="w-full p-3" placeholder="es. Telematica assente" value="{{ old('impact') }}">
                        </td>
                    </tr>
                    <tr class="bg-base-200 hover:bg-slate-200"">
                        <th class="border">Impact to other systems (if known): </th>
                        <td class="border"></td>
                    </tr>
                    <tr class="bg-base-200 hover:bg-slate-200"">
                        <th class="border">Reported by: </th>
                        <td class="border">Nomad Digital</td>
                    </tr>
                    <tr class="bg-base-200 hover:bg-slate-200"">
                        <th class="border">Supplier available at: </th>
                        <td class="border">Nomad Digital</td>
                    </tr>
                    <tr class="bg-base-200 hover:bg-slate-200"">
                        <th class="border">Downtime start (expected): </th>
                        <td class="border p-0 @error('start_expected') border-red-500 @enderror">
                            <input type="text" name="start_expected" class="w-full p-3 datepicker" placeholder="18/03/2025 12.00.00" value="{{ old('start_expected')}}">
                        </td>
                    </tr>
                    <tr class="bg-base-200 hover:bg-slate-200"">
                        <th class="border">Downtime start (actual): </th>
                        <td class="border p-0 @error('start_actual') border-red-500 @enderror">
                            <input type="text" name="start_actual" class="w-full p-3 datepicker" placeholder="18/03/2025 12.00.00" value="{{ old('start_actual') }}">
                        </td>
                    </tr>
                    <tr class="bg-base-200 hover:bg-slate-200"">
                        <th class="border">Downtime end (expected): </th>
                        <td class="border p-0 @error('end_expected') border-red-500 @enderror">
                            <input type="text" name="end_expected" class="w-full p-3 datepicker" placeholder="18/03/2025 12.00.00" value="{{ old('end_expected') }}">
                        </td>
                    </tr>
                    <tr class="bg-base-200 hover:bg-slate-200"">
                        <th class="border">Downtime end (actual): </th>
                        <td class="border"></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button class="btn bg-red-500 hover:bg-red-700 text-white mt-5 w-[250px] shadow-xl" :disabled="isLoading">Chiudi Servizio</button>
    </form>
</x-layout>

<script type="text/javascript">
    flatpickr(".datepicker", {
        dateFormat: "d/m/Y H.i.S",
        enableTime: true,
        time_24hr: true,
        minDate: "today", //a partire da
        locale: {
            "firstDayOfWeek": 1 //inizia il lunedi
        }
    });
</script>
