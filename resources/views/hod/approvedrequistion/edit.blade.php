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
                                        <a href="{{ route('hod.staffrequistionform.create') }}" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Create Requistion</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <div class="bg-slate-200 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="rounded-md w-full bg-white px-4 py-4 shadow-md transition transform duration-500 cursor-pointer">
                                <div class="flex flex-col justify-start">
                                    <div class="flex justify-between items-center w-full">
                                        <div class="text-lg font-semibold text-bookmark-blue flex space-x-1 items-center mb-2">
                                            <svg class="w-7 h-7 text-gray-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fillRule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clipRule="evenodd" />
                                                <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                            </svg>
                                            <span>{{ $approvedrequistion->jobtitle }}</span>
                                        </div>
                                        <span class="bg-green-500 rounded-full uppercase text-white text-sm px-4 py-1 font-bold shadow-xl">Vacancy Published</span>
                                    </div>
                                    <div class="text-sm text-gray-500 flex space-x-1 items-center mb-2">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fillRule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clipRule="evenodd" />
                                        </svg>
                                        <span>{{ $approvedrequistion->campuslocation ? $approvedrequistion->campuslocation->name : 'No location set' }}</span>
                                    </div>
                                    <div class="grid grid-cols-3 gap-4">
                                        <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
                                            <div class="mr-4">
                                                <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-medium text-gray-900">Job Type</h3>
                                                <p class="text-gray-600">{{ $approvedrequistion->jobtype->name }}</p>
                                            </div>
                                        </div>
                                        <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
                                            <div class="mr-4">
                                                <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17l6-6-6-6"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-medium text-gray-900">Approved Salary</h3>
                                                <p class="text-gray-600">{{ number_format($approvedrequistion->approvedsalary, 2, '.', ',') }}</p>
                                            </div>
                                        </div>
                                        <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
                                            <div class="mr-4">
                                                <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 11.08V12a10 10 0 11-5.93-9.14"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 4L12 14.01l-3-3"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-medium text-gray-900">Department/School/Faculty</h3>
                                                <p class="text-gray-600">{{ $approvedrequistion->department->name }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                        <div class="grid grid-cols-2">
                                            <div class="p-4">
                                                <h2 class="font-bold text-xl mb-2">Job Details</h2>
                                                <p class="text-gray-700 text-base mb-4">-</p>
                                                <div class="flex justify-between">
                                                    <p class="text-gray-600 text-base font-bold">Number of Vacancies:</p>
                                                    <p class="text-gray-800 text-base">{{ $approvedrequistion->numberofvacancies }}</p>
                                                </div>
                                                <hr>
                                                <div class="flex justify-between">
                                                    <p class="text-gray-600 text-base font-bold">Number of Current Job Holders:</p>
                                                    <p class="text-gray-800 text-base">{{ $approvedrequistion->noofcurrentholders }}</p>
                                                </div>
                                                <hr>
                                                <div class="flex justify-between">
                                                    <p class="text-gray-600 text-base font-bold">Start Date:</p>
                                                    <p class="text-gray-800 text-base">{{ $approvedrequistion->startdate }}</p>
                                                </div>
                                                <hr>
                                                <div class="flex justify-between">
                                                    <p class="text-gray-600 text-base font-bold">Job Type:</p>
                                                    <p class="text-gray-800 text-base">{{ $approvedrequistion->statusofemployment }}</p>
                                                </div>
                                                <hr>
                                                <div class="flex justify-between">
                                                    <p class="text-gray-600 text-base font-bold">Reporting To:</p>
                                                    <p class="text-gray-800 text-base">{{ $approvedrequistion->reportingto }}</p>
                                                </div>
                                                <hr>
                                                <div class="flex justify-between">
                                                    <p class="text-gray-600 text-base font-bold">Advertise?
                                                        @if($approvedrequistion->advertise == 1)
                                                            <span class="text-emerald-600 font-semibold">Yes</span>
                                                        @else
                                                            <span class="text-red-800 font-semibold">No</span>
                                                        @endif
                                                    </p>
                                                    <p class="text-gray-800 text-base">{{ $approvedrequistion->advertjustification }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-gray-700 text-base leading-relaxed mb-2">
                                        <p class="mb-2"><strong>Job Purpose:</strong></p>
                                        <p class="mb-2">{!! $approvedrequistion->jobpurpose !!}</p>
                                        <p class="mb-2"><strong>Main Accountability and Output:</strong></p>
                                        <p class="mb-2">{!! $approvedrequistion->accountability !!}</p>
                                        <p class="mb-2"><strong>Educational Requirements:</strong></p>
                                        {!! $approvedrequistion->educationalrequirements !!}
                                        <p class="mb-2"><strong>Experience:</strong></p>
                                        {!! $approvedrequistion->experience !!}
                                        <p class="mb-2"><strong>Personal Qualities:</strong></p>
                                        {!! $approvedrequistion->personalqualities !!}
                                        <p class="mb-2"><strong>Other:</strong></p>
                                        {!! $approvedrequistion->other !!}
                                        <p class="mb-2"><strong>Knowledge and Skills:</strong></p>
                                        {!! $approvedrequistion->skills !!}
                                    </div>
                                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                        <div class="flex w-full">
                                            <div class="p-4">
                                                <h2 class="font-bold text-xl mb-2">Approval/Forwarding Comments</h2>
                                                <p class="text-gray-700 text-base mb-4">Contains Comments from various approvers</p>
                                                <div class="flex justify-between bg-blue-200">
                                                    <p class="text-gray-600 text-base font-bold">PnC Business Partner Comments:</p>
                                                    @foreach($bpcomments as $bpcomment)
                                                        <p class="text-gray-800 text-base">{!! $bpcomment->comment !!}</p>
                                                    @endforeach
                                                </div>
                                                <hr>
                                                <div class="flex justify-between bg-blue-50">
                                                    <p class="text-gray-600 text-base font-bold">Finance Officer:</p>
                                                    @foreach($focomments as $focomment)
                                                        <p class="text-gray-800 text-base">{!! $focomment->comment !!}</p>
                                                    @endforeach
                                                </div>
                                                <hr>
                                                <div class="flex justify-between bg-blue-200">
                                                    <p class="text-gray-600 text-base font-bold">PnC Executive Director:</p>
                                                    @foreach($edcomments as $edcomment)
                                                        <p class="text-gray-800 text-base">{!! $edcomment->comment !!}</p>
                                                    @endforeach
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-hod-layout>


