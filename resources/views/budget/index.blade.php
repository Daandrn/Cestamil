<x-app.template>

    <h1 class="text-center text-4xl py-14"> Budget  </h1>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="px-6 py-3">
                    Budget ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Client Name
                </th>

                <th scope="col" class="px-6 py-3">
                    Action
                </th>

                <th scope="col" class="px-6 py-3">
                    Status
                </th>
            </tr>
            </thead>
            <tbody>

        @foreach($budgets as $budget)

            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">

                <td class="px-6 py-4">
                    {{$budget->id}}
                </td>

                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <a href="{{ route('budget.show', $budget->id) }}">{{ $budget->client }}</a>
                </td>


                <td class="px-6 py-4 flex gap-4">
                    <a href="{{ route('budget.edit', $budget->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

                    <form action="{{ route('budget.destroy', $budget->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="font-medium text-red-600 dark:text-red-500 hover:underline" type="submit"> Delete </button>
                    </form>

                    <a class="font-medium text-green-600 dark:text-green-500 hover:underline" href={{route('payCreate', $budget->id)}}> <button> Pay </button> </a>
                </td>


                <td class="px-6 py-4">
                    @if($budget->remnant == $budget->total_value)
                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-red-400 border border-red-400">Unpaid</span>
                    @endif

                    @if($budget->remnant == 0)
                            <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">Paid out</span>
                    @endif

                    @if($budget->remnant > 0 && $budget->remnant < $budget->total_value)
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">Partially Paid out </span>
                    @endif

                </td>



            </tr>

        @endforeach


            </tbody>
        </table>

    </div>

    <a class=" inline-block mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" href="{{route('budget.create')}}"> Store </a>

    <a href="{{route('dashboard')}}" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Home</a>

</x-app.template>
