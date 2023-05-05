<x-candidate-layout>
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
                                    <a href="{{ route('candidate.index') }}" class = "inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                        <svg class = "w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <div class = "flex items-center">
                                        <svg class = "w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd"></path></svg>
                                        <a href="#" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Apply</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <div class="bg-slate-200 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="rounded-md w-full bg-white px-4 py-4 shadow-md transition transform duration-500 cursor-pointer">
                                <div class="flex flex-col justify-start bg-gray-400 rounded-2xl">
                                    <div class="flex justify-between items-center w-full">
                                        <div class="text-lg font-semibold text-bookmark-blue flex space-x-1 items-center mb-2">
                                            <svg class="w-7 h-7 text-gray-700" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fillRule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clipRule="evenodd" />
                                                <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                            </svg>
                                            <span>{{ $availablejob->jobtitle }}</span>
                                        </div>
                                        @if(count($coverletters)>0)
                                        <span class="bg-green-500 rounded-full uppercase text-white text-sm px-4 py-1 font-bold shadow-xl">Applicatiion Submitted</span>
                                        @endif
                                    </div>
                                    <div class="text-sm text-gray-500 flex space-x-1 items-center mb-2">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fillRule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clipRule="evenodd" />
                                        </svg>
                                        <span class="text-white">{{ $availablejob->campuslocation ? $availablejob->campuslocation->name : 'No location set' }}</span>
                                    </div>
                                    @if($basicinfo)
                                    @else
                                        <div class="bg-cyan-50 shadow-lg p-4 mt-4 text-sm text-gray-500 flex space-x-1 items-center mb-2">
                                            <span class="text-gray-800">In order to be considered for this position, it is necessary to complete your Application Profile by filling out the required information. You can access the Application Profile by clicking on the following URL: <a href="{{ route('candidate.information.index') }}" class="underline"> Candidate Profile</a>.</span>
                                        </div>
                                    @endif
                                    <div class="grid grid-cols-3 gap-4">
                                        <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
                                            <div class="mr-4">
                                                <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-medium text-gray-900">Job Title</h3>
                                                <p class="text-gray-600">{{ $availablejob->jobtitle }}</p>
                                            </div>
                                        </div>
                                        <div class="bg-white p-6 rounded-lg shadow-md flex items-center">
                                            <div class="mr-4">
                                                <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17l6-6-6-6"/>
                                                </svg>
                                            </div>
                                            <div>
                                                <h3 class="text-lg font-medium text-gray-900">Department</h3>
                                                <p class="text-gray-600">{{ $availablejob->department->name }}</p>
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
                                                <h3 class="text-lg font-medium text-gray-900">Reporting To</h3>
                                                <p class="text-gray-600">{{ $availablejob->reportingto }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white shadow-lg rounded-lg overflow-hidden mt-4">
                                        <div class="grid grid-cols-2">
                                            <div class="p-4">
                                                <h2 class="font-bold text-xl mb-2">Job Details</h2>
                                                <p class="text-gray-700 text-base mb-4">-</p>
                                                <div class="flex justify-between">
                                                    <p class="text-gray-600 text-base font-bold">Number of Vacancies:</p>
                                                    <p class="text-gray-800 text-base">{{ $availablejob->numberofvacancies }}</p>
                                                </div>
                                                <hr>
                                                <div class="flex justify-between">
                                                    <p class="text-gray-600 text-base font-bold">Job Type:</p>
                                                    <p class="text-gray-800 text-base">{{ $availablejob->jobtype->name }}</p>
                                                </div>
                                                <hr>
                                                <div class="flex justify-between">
                                                    <p class="text-gray-600 text-base font-bold">Start Date:</p>
                                                    <p class="text-gray-800 text-base">{{ $availablejob->startdate }}</p>
                                                </div>
                                                <hr>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white shadow-lg rounded-lg overflow-hidden p-2 mt-4">
                                        <div class="flex w-full justify-center bg-gray-200 rounded-md">
                                            <div class="p-4">
                                                <p class="mb-2"><strong>Job Purpose:</strong></p>
                                                <div class="mb-2 ml-4 rounded-md shadow">{!! $availablejob->jobpurpose !!}</div>
                                                <p class="mb-2"><strong>Main Accountability and Output:</strong></p>
                                                <div class="mb-2 ml-4 rounded-md shadow">{!! $availablejob->accountability !!}</div>
                                                <p class="mb-2"><strong>Educational Requirements:</strong></p>
                                                <div class="mb-2 ml-4 rounded-md shadow">{!! $availablejob->educationalqualifications !!}</div>
                                                <p class="mb-2"><strong>Experience:</strong></p>
                                                <div class="mb-2 ml-4 rounded-md shadow">{!! $availablejob->experience !!}</div>
                                                <p class="mb-2"><strong>Personal Qualities:</strong></p>
                                                <div class="mb-2 ml-4 rounded-md shadow">{!! $availablejob->personalqualities !!}</div>
                                                <p class="mb-2"><strong>Other:</strong></p>
                                                <div class="mb-2 ml-4 rounded-md shadow">{!! $availablejob->other !!}</div>
                                                <p class="mb-2"><strong>Knowledge and Skills:</strong></p>
                                                <div class="mb-2 ml-4 rounded-md shadow">{!! $availablejob->skill !!}</div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(count($coverletters)>0)
                                        <div class="-mx-3 md:flex mb-6">
                                            <div class="md:w-full px-3">
                                                Application has been sent.
                                            </div>
                                        </div>
                                    @else
                                        @if($basicinfo)
                                        <div class="bg-white shadow-lg rounded-lg overflow-hidden mt-4">
                                            <div class="w-full">
                                                <div class="p-4">
                                                    <h2 class="font-bold text-xl mb-2">Apply</h2>
                                                        <form method="POST" action="{{ route('candidate.applications.store', $availablejob) }}">
                                                            @csrf
                                                            <fieldset>
                                                                <legend>Cover Letter</legend>
                                                                <div class="shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mt-3">
                                                                    <div class="flex">
                                                                        <h6 class="w-full font-semibold flex-col">Cover Letter (limit 500 words)</h6>
                                                                    </div>
                                                                    <div class="-mx-3 md:flex mb-6">
                                                                        <div class="md:w-full px-3">
                                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                                                                Write a Detailed Cover Letter <span class="text-red-500">*</span>
                                                                            </label>
                                                                            <textarea id="editor" name="coverletter" rows="4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 disabled:opacity-70" id="coverletter" >
                                                                            @foreach($coverletters as $coverletter)
                                                                                    {!! $coverletter->coverletter !!}
                                                                                @endforeach
                                                                        </textarea>
                                                                            @error('coverletter') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <input name="user_id" class="appearance-none block w-full bg-grey-l0ighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="user_id" type="hidden" value="{{ Auth::id() }}">
                                                            <input name="staff_requistion_form_id" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="staff_requistion_form_id" type="hidden" value="{{ $availablejob->id }}">
                                                            <button type="submit" class="text-white bg-green-800 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Apply</button>
                                                        </form>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                            <div class="bg-cyan-50 shadow-lg p-4 mt-4">
                                                <span class="text-gray-800">In order to be considered for this position, it is necessary to complete your Application Profile by filling out the required information. You can access the Application Profile by clicking on the following URL: <a href="{{ route('candidate.information.index') }}" class="underline"> Candidate Profile</a>.</span>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-candidate-layout>


