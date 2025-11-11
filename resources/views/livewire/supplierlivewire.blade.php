<div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100 my-8">
    <table class="table">
        <!-- head -->
        <thead>
            <tr class="bg-slate-700 text-white">
                <th class="w-8/12">Services</th>
                <th class="w-1/12 text-center">Links</th>
                <th class="w-2/12 text-center">last check</th>
                <th class="w-1/12 text-center">Status</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($suppliers as $supplier)
                <tr>
                    <th>
                        {{-- <i class="fa-brands fa-pied-piper-hat me-3 text-lg"></i> --}}
                        <span>{{ucfirst($supplier->service)}}</span>
                    </th>
                    <td class="text-center">
                        <a href="{{$supplier->link}}#:~:text=NTV" target="_blank"
                            class="btn btn-sm bg-blue-500 text-white hover:bg-blue-700">redirect</a>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm bg-rose-500 text-white rounded-lg">{{$supplier->updated_at->format('d M Y - H:i')}}</button>
                    </td>
                    <td>
                        <button class="btn btn-wide rounded-md bg-{{$supplier->status == 'notreach' ? 'yellow' : ($supplier->status == 'up' ? 'emerald' : 'rose')}}-500 text-white">
                            {{$supplier->status == 'notreach' ? 'unchecked' : $supplier->status}}
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <th colspan="100%" class="font-bold text-red-500">No Services added...</th>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>
