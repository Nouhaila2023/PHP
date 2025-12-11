<x-layout>
    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
        <div class="text-[13px] leading-[20px] flex-1 p-6 pb-2 lg:p-10 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">

            <div class="bg-gray-900 min-h-screen p-6 text-gray-100">
                <h2 class="text-2xl font-bold mb-4">Mis Fincas</h2>
                <ul class="space-y-3">
                    @foreach($fincas as $finca)
                        <li class="bg-gray-800 rounded-lg p-4 hover:bg-gray-700 transition-colors flex justify-between items-center">
                            <span>{{ $finca->nombre }}</span>
                            <a href="#" class="text-blue-400 hover:text-blue-500 font-semibold">Ver detalles</a>
                        </li>
                    @endforeach
                </ul>
            </div>


        </div>
    </main>
</x-layout>
