<x-app.template>

        <h1 class="text-center text-4xl py-14"> Home </h1>

    <div class="grid grid-cols-6 gap-2">

    <a href="{{ Route('home') }}" class="block w-max col-start-1 col-span-2">
        <div class="p-2 px-4 h-[200px] w-[200px] bg-gray-200 rounded-lg dark:bg-gray-800 flex flex-col gap-6 relative">
            <h2 class="text-gray-50 text-center"> Fully-paid budgets </h2>

            <p class="text-center text-gray-50 text-5xl absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"> {{ $totallyPaid }} </p>

        </div>
    </a>

    <a href="{{ Route('home') }}" class="block w-max col-start-3 col-span-2">
        <div class="p-2 px-4 h-[200px] w-[200px] bg-gray-200 rounded-lg dark:bg-gray-800 flex flex-col gap-6 relative">
            <h2 class="text-gray-50 text-center"> Partially Paid Budgets </h2>

            <p class="text-center text-gray-50 text-5xl absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"> {{ $partiallyPaid  }} </p>

        </div>
    </a>

    <a href="{{ Route('home') }}" class="block w-max col-start-5 col-span-2">
        <div class="p-2 px-4 h-[200px] w-[200px] bg-gray-200 rounded-lg dark:bg-gray-800 flex flex-col gap-6 relative">
            <h2 class="text-gray-50 text-center"> Unpaid budgets </h2>

            <p class="text-center text-gray-50 text-5xl absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 "> {{ $notTotallyPaid  }} </p>

        </div>
    </a>

        <a href="{{ Route('home') }}" class="block w-max col-start-5 col-span-2">
            <div class="p-2 px-4 h-[200px] w-[200px] bg-gray-200 rounded-lg dark:bg-gray-800 flex flex-col gap-6 relative">
                <h2 class="text-gray-50 text-center"> Last budget </h2>

                <p class="text-center text-gray-50 text-2xl absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 "> {{  $lastDate  }} </p>

            </div>
        </a>

    </div>


</x-app.template>


