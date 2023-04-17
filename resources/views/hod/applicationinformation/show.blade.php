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
                                        <a href="#" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Cover Letter and Candidate Profile</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <div class="bg-gray-100 p-4 rounded-md mt-4">
                            <h2 class="text-2xl font-bold mb-4">Cover Letter</h2>
                            {!! $applicationinformation->coverletter !!}
                        </div>
                            <div class="bg-gray-100 p-4 rounded-md mt-4">
                            <div class="bg-gray-100 p-4 rounded-md">
                                <h1 class="text-2xl font-bold mb-4">Personal Information</h1>
                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                                    <div>
                                        <p class="font-bold">Name:</p>
                                        <p>{{ $applicationinformation->basicinfo->title }} {{ $applicationinformation->basicinfo->firstname }} {{ $applicationinformation->basicinfo->middlename }} {{ $applicationinformation->basicinfo->lastname }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Gender:</p>
                                        <p>{{ $applicationinformation->basicinfo->gender }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Age:</p>
                                        @php
                                            $dob = new DateTime($applicationinformation->basicinfo->dateofbirth);
                                            $now = new DateTime();
                                            $age = $dob->diff($now)->y;
                                        @endphp
                                        <p>{{ $age }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Nationality:</p>
                                        <p>{{ $applicationinformation->basicinfo->nationality }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Country of Residence:</p>
                                        <p>{{ $applicationinformation->basicinfo->countryofresidence }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Phone Number:</p>
                                        <p>{{ $applicationinformation->basicinfo->phonenumber }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Email:</p>
                                        <p>{{ $applicationinformation->basicinfo->email }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Address:</p>
                                        <p>{{ $applicationinformation->basicinfo->postaladdress }} - {{ $applicationinformation->basicinfo->postalcode }}, {{ $applicationinformation->basicinfo->city }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Marital Status:</p>
                                        <p>
                                            @if($applicationinformation->basicinfo->maritalstatus == 0)
                                                Single
                                            @elseif($applicationinformation->basicinfo->maritalstatus == 1)
                                                Married
                                            @elseif($applicationinformation->basicinfo->maritalstatus == 2)
                                                Divorced
                                            @elseif($applicationinformation->basicinfo->maritalstatus == 3)
                                                Separated
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Applicant Type:</p>
                                        <p>
                                            @if($applicationinformation->basicinfo->applicanttype == 1)
                                                External
                                            @else
                                                Internal
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Related to Strathmore Staff:</p>
                                        <p>
                                            @if($applicationinformation->basicinfo->relatedtostaff == 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </p>
                                    </div>
                                    @if($applicationinformation->basicinfo->relatedtostaff == 1)
                                        <div>
                                            <p class="font-bold">Relationship Type:</p>
                                            <p>{{ $applicationinformation->basicinfo->relationshiptype }}</p>
                                        </div>
                                        <div>
                                            <p class="font-bold">Name of Staff:</p>
                                            <p>{{ $applicationinformation->basicinfo->nameofstaff }}</p>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-bold">Current Salary:</p>
                                        <p>{{ $applicationinformation->basicinfo->currsalary }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Expected Salary:</p>
                                        <p>{{ $applicationinformation->basicinfo->expsalary }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Physical Disability:</p>
                                        <p>@if($applicationinformation->basicinfo->disability == 1)
                                                Yes
                                            @else
                                                No
                                            @endif</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Expected Salary:</p>
                                        <p>{{ $applicationinformation->basicinfo->expsalary }}</p>
                                    </div>
                                    <div class="col-span-2">
                                        <p class="font-bold">Skills/Competence:</p>
                                        <p>{!! $applicationinformation->basicinfo->skillscompetence !!}</p>
                                    </div>
                                    <div class="col-span-2">
                                        <p class="font-bold">Strengths:</p>
                                        <p>{!! $applicationinformation->basicinfo->strengths !!}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Ever Arrested:</p>
                                        <p>
                                            @if($applicationinformation->basicinfo->lawviolation == 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </p>
                                    </div>
                                    @if($applicationinformation->basicinfo->lawviolation == 1)
                                        <div>
                                            <p class="font-bold">Violation Description:</p>
                                            <p>{!! $applicationinformation->basicinfo->violationdesc !!} </p>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-bold">Involved in Exploitation/Abuse:</p>
                                        <p>
                                            @if($applicationinformation->basicinfo->exploitation == 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </p>
                                    </div>
                                    @if($applicationinformation->basicinfo->exploitation == 1)
                                        <div>
                                            <p class="font-bold">Violation Description:</p>
                                            <p>{!! $applicationinformation->basicinfo->exploitationdesc !!} </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                            <div class="bg-gray-100 p-4 rounded-md mt-4">
                                @if($applicationinformation->academicinfo)
                                <div class="bg-gray-100 p-4 rounded-md">
                                    <h2 class="text-2xl font-bold mb-4">Academic Information</h2>
                                    {{ $applicationinformation->academicinfo }}
                                </div>
                                @else
                                    <h2 class="text-2xl font-bold mb-4 text-red-800">Academic Information Not Added</h2
                                @endif
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-hod-layout>


