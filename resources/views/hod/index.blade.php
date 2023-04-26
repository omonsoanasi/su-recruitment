<x-hod-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class = "content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
                        <nav class = "flex px-5 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-[#1E293B] " aria-label="Breadcrumb">
                            <ol class = "inline-flex items-center space-x-1 md:space-x-3">
                                <li class = "inline-flex items-center">
                                    <a href="{{ route('hod.index') }}" class = "inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                        <svg class = "w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <div class = "flex items-center">
                                        <svg class = "w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd"></path></svg>
                                        <a href="#" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Dashboard</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <div class = "flex flex-wrap my-5 -mx-2">
                            <div class = "w-full lg:w-1/3 p-2">
                                <div class = "flex items-center flex-row w-full bg-gradient-to-r dark:from-cyan-500 dark:to-orange-500 from-orange-500 via-blue-500 to-blue-500 rounded-md p-3">
                                    <div class = "flex text-indigo-500 dark:text-white items-center bg-white dark:bg-[#0F172A] p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="object-scale-down transition duration-500">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 8h14M5 16h14M5 12h14M3 3v18M21 3v18"/>
                                        </svg>
                                    </div>
                                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                                        <a href="{{ route('hod.staffrequistionform.index') }}">
                                        <div class = "text-xs whitespace-nowrap">
                                            Pending Requisition Requests
                                        </div>
                                        <div class = "">
                                            {{ $staffrequistions->count() }}
                                        </div>
                                        </a>
                                    </div>
                                    <div class = " flex items-center flex-none text-white">
                                        <a href="{{ route('hod.staffrequistionform.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class = "w-6 h-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class = "w-full md:w-1/2 lg:w-1/3 p-2 ">
                                <div class = "flex items-center flex-row w-full bg-gradient-to-r dark:from-cyan-500 dark:to-blue-500 from-indigo-500 via-cyan-500 to-green-500 rounded-md p-3">
                                    <div class = "flex text-indigo-500 dark:text-white items-center bg-white dark:bg-[#0F172A] p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="green" class="object-scale-down transition duration-500">
                                            <path d="M12 22a10 10 0 110-20 10 10 0 010 20zM18 7l-9 9-3-3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                                        <a href="{{ route('hod.approvedrequistion.index') }}">
                                        <div class = "text-xs whitespace-nowrap">
                                            Approved Requisition Requests
                                        </div>
                                        <div class = "">
                                            {{ $approvedrequistions->count() }}
                                        </div>
                                        </a>
                                    </div>
                                    <div class = " flex items-center flex-none text-white">
                                        <a href="{{ route('hod.approvedrequistion.index') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class = "w-6 h-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class = "w-full md:w-1/2 lg:w-1/3 p-2">
                                <div class = "flex items-center flex-row w-full bg-gradient-to-r dark:from-cyan-500 dark:to-blue-500 from-indigo-500 via-purple-500 to-pink-500 rounded-md p-3">
                                    <div class = "flex text-indigo-500 dark:text-white items-center bg-white dark:bg-[#0F172A] p-2 rounded-md flex-none w-8 h-8 md:w-12 md:h-12 ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class = "object-scale-down transition duration-500">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605" />
                                        </svg>
                                    </div>
                                    <div class = "flex flex-col justify-around flex-grow ml-5 text-white">
                                        <a href="{{ route('hod.staffrequistionform.create') }}">
                                        <div class = "text-xs whitespace-nowrap">
                                            New Employee Requisition
                                        </div>
                                        <div class = "">
                                            Create new requisition
                                        </div>
                                        </a>
                                    </div>
                                    <div class = " flex items-center flex-none text-white">
                                        <a href="{{ route('hod.staffrequistionform.create') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor" class = "w-6 h-6">
                                            <path strokeLinecap="round" strokeLinejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                        </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-lg mx-auto">
                            <canvas id="myChart"></canvas>
                        </div>

                        <script>
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'pie',
                                data: {
                                    labels: ['Requisitions', 'Approved Requisitions', 'Completed Requisitions'],
                                    datasets: [{
                                        label: 'Requests',
                                        data: [ {{ $staffrequistions->count() }}, {{ $approvedrequistions->count() }}, 3],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>

                        <div class = "p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                            <span class = "font-medium">Info!</span> FAQs.
                        </div>
                        <div class = "p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                            <span class = "font-medium">Rejected Requisitions!</span> Find returned requisitions here.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-hod-layout>
