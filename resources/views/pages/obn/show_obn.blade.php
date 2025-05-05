<x-layout>
    {{-- @dd($train->train()) --}}
    <a href="{{ route('obn.index') }}" class="btn border-none bg-slate-400 rounded-md btn-sm hover:bg-slate-500 mb-4 text-white">
        <i class="fa-regular fa-circle-left text-lg"></i>
        Back
    </a>
    <h1 class="text-4xl mb-5">TRAIN <span class=" text-blue-500">{{ $train->name }}</span> </h1>

    <h2 class="mb-4">Devices on board</h2>
    <div class="overflow-x-auto rounded-box border border-base-content/5 bg-base-100 shadow-xl">
        <table class="table">
            <!-- head -->
            <thead>
                <tr class="bg-slate-200">
                    <th class="w-[50px]">Type</th>
                    <th class="w-[50px]">Coach</th>
                    <th class="w-[50px]">Device</th>
                    <th class="text-center">IP</th>
                    <th class="text-center">Firmware</th>
                    <th class="text-center">Configuration</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($train->switches as $sw)
                    @php
                        $ip = preg_replace("/\x1b\[[0-9;]*m/", '', $sw->ip);
                        $fw = preg_replace("/\x1b\[[0-9;]*m/", '', $sw->firmware);
                        $cf = preg_replace("/\x1b\[[0-9;]*m/", '', $sw->config);
                    @endphp
                    <tr class="hover:bg-slate-100">
                        <th class="w-[30px] text-blue-500">SW</th>
                        <td>{{ $sw->coach }}</td>
                        <td>{{ $sw->device }}</td>
                        <td class="text-center">{{ $ip }}</td>
                        <td class="text-center">{{ $fw }}</td>
                        <td class="text-center">{{ $cf }}</td>
                    </tr>
                @endforeach
                @foreach ($train->accessPoints as $ap)
                    @php
                        $ip = preg_replace("/\x1b\[[0-9;]*m/", '', $ap->ip);
                        $fw = preg_replace("/\x1b\[[0-9;]*m/", '', $ap->firmware);
                        $cf = preg_replace("/\x1b\[[0-9;]*m/", '', $ap->config);
                    @endphp
                    <tr class="hover:bg-slate-100">
                        <th class="w-[30px] text-orange-500">AP</th>
                        <td>{{ $ap->coach }}</td>
                        <td class=" text-center">{{ $ap->device }}</td>
                        <td class=" text-center">{{ $ip }}</td>
                        <td class=" text-center">{{ $fw }}</td>
                        <td class=" text-center">{{ $cf }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <h2 class="mt-10 mb-4">Modem infos</h2>
    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr class="bg-slate-200">
                    <th class="w-1/12">Modem</th>
                    <th class="w-1/12">Status</th>
                    <th class="w-1/12">Slot</th>
                    <th class="w-1/12">Tech</th>
                    <th class="w-3/12">Provider</th>
                    <th class="w-3/12">ICCID</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <tr>
                    <th>ce0p0</th>
                    <td class="text-green-500">Connected</td>
                    <td>7</td>
                    <td>LTE</td>
                    <td>VodaIT</td>
                    <td>8939105656568584</td>
                </tr>
                <!-- row 2 -->
                <tr>
                    <th>ce1p0</th>
                    <td class="text-red-500">Missing</td>
                    <td>11</td>
                    <td>LTE</td>
                    <td>VodaIT</td>
                    <td>8939105656568584</td>
                </tr>
                <!-- row 3 -->
                <tr>
                    <th>ce2p0</th>
                    <td class="text-green-500">Connected</td>
                    <td>10</td>
                    <td>LTE</td>
                    <td>TIM</td>
                    <td>8939105656568584</td>
                </tr>
                <tr>
                    <th>ce3p0</th>
                    <td class="text-red-500">Not active</td>
                    <td>12</td>
                    <td>LTE</td>
                    <td>WindTre</td>
                    <td>8939105656568584</td>
                </tr>
            </tbody>
        </table>
    </div>


</x-layout>
