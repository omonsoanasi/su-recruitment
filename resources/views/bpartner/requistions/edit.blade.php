<x-bpartner-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @role('Admin')
                    <div class="text-center mt-4">
                        <span class="text-gray-500">You are viewing this as a Business Partner, Please switch to <a href="{{ route('admin.index') }}" class="text-blue-500 hover:text-blue-700">Administrator's profile here.</a></span>
                    </div>
                    @endrole
                    <div class = "content ml-12 transform ease-in-out duration-500 pt-20 px-2 md:px-5 pb-4 ">
                        <nav class = "flex px-5 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-[#1E293B] " aria-label="Breadcrumb">
                            <ol class = "inline-flex items-center space-x-1 md:space-x-3">
                                <li class = "inline-flex items-center">
                                    <a href="{{ route('bpartner.index') }}" class = "inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                        <svg class = "w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <div class = "flex items-center">
                                        <svg class = "w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fillRule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clipRule="evenodd"></path></svg>
                                        <a href="#" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Requisition Requests</a>
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
                                            <span>{{ $requistion->jobtitle }}</span>
                                        </div>
                                        <span class="bg-green-500 rounded-full uppercase text-white text-sm px-4 py-1 font-bold shadow-xl">...</span>
                                    </div>
                                    <div class="text-sm text-gray-500 flex space-x-1 items-center mb-2">
                                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fillRule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clipRule="evenodd" />
                                        </svg>
                                        <span>{{ $requistion->campuslocation ? $requistion->campuslocation->name : 'No location set' }}</span>
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
                                                <p class="text-gray-600">{{ $requistion->jobtype->name }}</p>
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
                                                <p class="text-gray-600">{{ number_format($requistion->approvedsalary, 2, '.', ',') }}</p>
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
                                                <p class="text-gray-600">{{ $requistion->department->name }}</p>
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
                                                    <p class="text-gray-800 text-base">{{ $requistion->numberofvacancies }}</p>
                                                </div>
                                                <hr>
                                                <div class="flex justify-between">
                                                    <p class="text-gray-600 text-base font-bold">Number of Current Job Holders:</p>
                                                    <p class="text-gray-800 text-base">{{ $requistion->noofcurrentholders }}</p>
                                                </div>
                                                <hr>
                                                <div class="flex justify-between">
                                                    <p class="text-gray-600 text-base font-bold">Start Date:</p>
                                                    <p class="text-gray-800 text-base">{{ $requistion->startdate }}</p>
                                                </div>
                                                <hr>
                                                <div class="flex justify-between">
                                                    <p class="text-gray-600 text-base font-bold">Job Type:</p>
                                                    <p class="text-gray-800 text-base">{{ $requistion->statusofemployment }}</p>
                                                </div>
                                                <hr>
                                                <div class="flex justify-between">
                                                    <p class="text-gray-600 text-base font-bold">Reporting To:</p>
                                                    <p class="text-gray-800 text-base">{{ $requistion->reportingto }}</p>
                                                </div>
                                                <hr>
                                                <div class="flex justify-between">
                                                    <p class="text-gray-600 text-base font-bold">Advertise?
                                                        @if($requistion->advertise == 1)
                                                            <span class="text-emerald-600 font-semibold">Yes</span>
                                                        @else
                                                            <span class="text-red-800 font-semibold">No</span>
                                                        @endif
                                                    </p>
                                                    <p class="text-gray-800 text-base">{{ $requistion->advertjustification }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white shadow-lg rounded-lg overflow-hidden p-2 mt-4">
                                        <div class="flex w-full justify-center">
                                            <div class="p-4">
                                                <p class="mb-2"><strong>Job Purpose:</strong></p>
                                                <p class="mb-2">{!! $requistion->jobpurpose !!}</p>
                                                <p class="mb-2"><strong>Main Accountability and Output:</strong></p>
                                                <p class="mb-2">{!! $requistion->accountability !!}</p>
                                                <p class="mb-2"><strong>Educational Requirements:</strong></p>
                                                {!! $requistion->educationalrequirements !!}
                                                <p class="mb-2"><strong>Experience:</strong></p>
                                                {!! $requistion->experience !!}
                                                <p class="mb-2"><strong>Personal Qualities:</strong></p>
                                                {!! $requistion->personalqualities !!}
                                                <p class="mb-2"><strong>Other:</strong></p>
                                                {!! $requistion->other !!}
                                                <p class="mb-2"><strong>Knowledge and Skills:</strong></p>
                                                {!! $requistion->skill !!}
                                            </div>
                                        </div>
                                    </div>
                                    @if($requistion->status == -2)
                                        <fieldset>
                                            <legend>Comments From the Finance Officer</legend>
                                            <div class="bg-red-300 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mt-9">
                                                @foreach($focomments as $focomment)
                                                    <span>{!! $focomment->comment !!}</span>
                                                    <span>
                                                        - Comments by: <strong>{{ $focomment->user->name }}</strong> On: <strong>{{ $focomment->updated_at }}</strong></span>
                                                @endforeach
                                            </div>
                                        </fieldset>
                                    @elseif($requistion->status == -3)
                                            <fieldset>
                                                <legend>Comments From the Executive Director</legend>
                                                <div class="bg-red-300 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mt-9">
                                                    @foreach($edComments as $edComment)
                                                        <span>{!! $edComment->comment !!}</span>
                                                        <span>
                                                        - Comments by: <strong>{{ $edComment->user->name }}</strong> On: <strong>{{ $edComment->updated_at }}</strong></span>
                                                    @endforeach
                                                </div>
                                            </fieldset>
                                    @endif
                                    <div class="bg-white shadow-lg rounded-lg overflow-hidden mt-4">
                                        <div class="flex w-full justify-center">
                                            <div class="p-4">
                                                <h2 class="font-bold text-xl mb-2">Approve/Forward</h2>
                                                @if($requistion->status >= 2)
                                                    <div class="bg-cyan-50 shadow-lg rounded-lg overflow-hidden mt-4">
                                                        <p class="mb-2"><strong>Business Partner Forwarding Comments</strong></p>
                                                        <div class="flex w-full">
                                                            @foreach($comments as $comment)
                                                                {!! $comment->comment !!}
                                                            @endforeach
                                                        </div>
                                                        @foreach($comments as $comment)
                                                            <span> - Approved by: {{ $comment->user->name }} </span><span> <strong> On: {{ \Carbon\Carbon::parse($comment->updated_at)->format('Y-m-d') }}</strong> </span>
                                                        @endforeach
                                                    </div>
                                                    <div class="bg-cyan-20 shadow-lg rounded-lg overflow-hidden mt-4">
                                                        <p class="mb-2"><strong>Finance Officer Forwarding Comments</strong></p>
                                                        <div class="flex w-full">
                                                            @foreach($focomments as $focomment)
                                                                {!! $focomment->comment !!}
                                                            @endforeach
                                                        </div>
                                                        @foreach($focomments as $focomment)
                                                            <span> - Approved by: {{ $focomment->user->name }} </span><span> <strong> On: {{ \Carbon\Carbon::parse($focomment->updated_at)->format('Y-m-d') }}</strong> </span>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    @if($requistion->status == 0 && count($comments)>0)
                                                        <fieldset>
                                                            <legend>Previous Comments From the Business Partner</legend>
                                                            <div class="bg-red-300 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mt-9">
                                                                @foreach($comments as $bpreject)
                                                                    <span>
                                                                        {!! $bpreject->comment !!}
                                                                    </span>
                                                                    <span>
                                                                        - Comments by: <strong>{{ $bpreject->user->name }}</strong> On: <strong>{{ $bpreject->updated_at }}</strong>
                                                                    </span>
                                                                @endforeach
                                                            </div>
                                                        </fieldset>
                                                    @endif
                                                @role('Business Partner')
                                                <form method="POST" action="{{ route('bpartner.comments.store', $requistion) }}">
                                                    @csrf
                                                    <fieldset>
                                                        <legend>Approval Comments</legend>
                                                        <div class="shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mt-3">
                                                            <div class="flex">
                                                                <h6 class="w-full font-semibold flex-col">The comments will be visible to the next approver.</h6>
                                                            </div>
                                                            <div class="-mx-3 md:flex mb-6">
                                                                <div class="md:w-full px-3">
                                                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                                                        <span class="text-red-500">*</span>
                                                                    </label>
                                                                    <textarea id="editor" name="comment" rows="4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 disabled:opacity-70" id="comment" @if($requistion->status >= 2) readonly @endif >
                                                                        @foreach($comments as $comment)
                                                                            {!! $comment->comment !!}
                                                                        @endforeach
                                                                    </textarea>
                                                                    @error('comment') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <input name="user_id" class="appearance-none block w-full bg-grey-l0ighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="user_id" type="hidden" value="{{ Auth::id() }}">
                                                    <input name="staff_requistion_forms_id" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="staff_requistion_forms_id" type="hidden" value="{{ $requistion->id }}">
                                                    @if($requistion->status == -3)
                                                        <button type="submit" name="status" value="2" class="text-white bg-green-800 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" @if($requistion->status >= 2) disabled @endif>Forward for Approval</button>
                                                    @else
                                                        <button type="submit" name="status" value="1" class="text-white bg-green-800 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" @if($requistion->status >= 2) disabled @endif>Forward to Finance Office (for approval)</button>
                                                    @endif
                                                    <button type="submit" name="status" value="-1" class="text-white bg-red-900 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" @if($requistion->status >= 2) disabled @endif>Reject</button>
                                                </form>
                                                @endrole
                                                @endif
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
    </div>
</x-bpartner-layout>


