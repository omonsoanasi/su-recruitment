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
                                        <a href="#" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Cover Letter and Candidate Profile</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <div class="bg-gray-100 p-4 rounded-md mt-4">
                            <h2 class="text-2xl font-bold mb-4">Cover Letter</h2>
                            {!! $applicationlonglist->coverletter !!}
                        </div>

                        <div class="bg-gray-100 p-4 rounded-md mt-4">
                            <div class="bg-cyan-50 p-4 rounded-md">
                                <h1 class="text-2xl font-bold mb-4">Personal Information</h1>
                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                                    <div>
                                        <p class="font-bold">Name:</p>
                                        <p>{{ $applicationlonglist->basicinfo->title }} {{ $applicationlonglist->basicinfo->firstname }} {{ $applicationlonglist->basicinfo->middlename }} {{ $applicationlonglist->basicinfo->lastname }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Gender:</p>
                                        <p>{{ $applicationlonglist->basicinfo->gender }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Age:</p>
                                        @php
                                            $dob = new DateTime($applicationlonglist->basicinfo->dateofbirth);
                                            $now = new DateTime();
                                            $age = $dob->diff($now)->y;
                                        @endphp
                                        <p>{{ $age }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Nationality:</p>
                                        <p>{{ $applicationlonglist->basicinfo->nationality }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Country of Residence:</p>
                                        <p>{{ $applicationlonglist->basicinfo->countryofresidence }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Phone Number:</p>
                                        <p>{{ $applicationlonglist->basicinfo->phonenumber }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Email:</p>
                                        <p>{{ $applicationlonglist->basicinfo->email }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Address:</p>
                                        <p>{{ $applicationlonglist->basicinfo->postaladdress }} - {{ $applicationlonglist->basicinfo->postalcode }}, {{ $applicationlonglist->basicinfo->city }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Marital Status:</p>
                                        <p>
                                            @if($applicationlonglist->basicinfo->maritalstatus == 0)
                                                Single
                                            @elseif($applicationlonglist->basicinfo->maritalstatus == 1)
                                                Married
                                            @elseif($applicationlonglist->basicinfo->maritalstatus == 2)
                                                Divorced
                                            @elseif($applicationlonglist->basicinfo->maritalstatus == 3)
                                                Separated
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Applicant Type:</p>
                                        <p>
                                            @if($applicationlonglist->basicinfo->applicanttype == 1)
                                                External
                                            @else
                                                Internal
                                            @endif
                                        </p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Related to Strathmore Staff:</p>
                                        <p>
                                            @if($applicationlonglist->basicinfo->relatedtostaff == 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </p>
                                    </div>
                                    @if($applicationlonglist->basicinfo->relatedtostaff == 1)
                                        <div>
                                            <p class="font-bold">Relationship Type:</p>
                                            <p>{{ $applicationlonglist->basicinfo->relationshiptype }}</p>
                                        </div>
                                        <div>
                                            <p class="font-bold">Name of Staff:</p>
                                            <p>{{ $applicationlonglist->basicinfo->nameofstaff }}</p>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-bold">Current Salary:</p>
                                        <p>{{ $applicationlonglist->basicinfo->currsalary }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Expected Salary:</p>
                                        <p>{{ $applicationlonglist->basicinfo->expsalary }}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Physical Disability:</p>
                                        <p>@if($applicationlonglist->basicinfo->disability == 1)
                                                Yes
                                            @else
                                                No
                                            @endif</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Expected Salary:</p>
                                        <p>{{ $applicationlonglist->basicinfo->expsalary }}</p>
                                    </div>
                                    <div class="col-span-2">
                                        <p class="font-bold">Skills/Competence:</p>
                                        <p>{!! $applicationlonglist->basicinfo->skillscompetence !!}</p>
                                    </div>
                                    <div class="col-span-2">
                                        <p class="font-bold">Strengths:</p>
                                        <p>{!! $applicationlonglist->basicinfo->strengths !!}</p>
                                    </div>
                                    <div>
                                        <p class="font-bold">Ever Arrested:</p>
                                        <p>
                                            @if($applicationlonglist->basicinfo->lawviolation == 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </p>
                                    </div>
                                    @if($applicationlonglist->basicinfo->lawviolation == 1)
                                        <div>
                                            <p class="font-bold">Violation Description:</p>
                                            <p>{!! $applicationlonglist->basicinfo->violationdesc !!} </p>
                                        </div>
                                    @endif
                                    <div>
                                        <p class="font-bold">Involved in Exploitation/Abuse:</p>
                                        <p>
                                            @if($applicationlonglist->basicinfo->exploitation == 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </p>
                                    </div>
                                    @if($applicationlonglist->basicinfo->exploitation == 1)
                                        <div>
                                            <p class="font-bold">Violation Description:</p>
                                            <p>{!! $applicationlonglist->basicinfo->exploitationdesc !!} </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-100 p-4 rounded-md mt-4" >
                            @if($applicationlonglist->academicinfo)
                                <div class="bg-gray-100 p-4 rounded-md w-full">
                                    <h2 class="text-2xl font-bold mb-4">Academic Information</h2>
                                    <!-- component -->
                                    <div class="flex flex-col">
                                        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                                <div class="overflow-hidden">
                                                    <table class="min-w-full justify-items-center">
                                                        <thead class="bg-white border-b">
                                                        <tr>
                                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                                Qualification Type
                                                            </th>
                                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                                Institution Name
                                                            </th>
                                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                                Qualification Title
                                                            </th>
                                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                                Specialization Area
                                                            </th>
                                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                                Completion Date
                                                            </th>
                                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                                View Uploaded File
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($applicationlonglist->academicinfo as $aceinfo)
                                                            <tr class="bg-gray-100 border-b">
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $aceinfo->qualificationtype->name }}</td>
                                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                    {{ $aceinfo->institutionname }}
                                                                </td>
                                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                    {{ $aceinfo->qualificationtitle }}
                                                                </td>
                                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                    {{ $aceinfo->specializationarea }}
                                                                </td>
                                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                    {{ $aceinfo->todate }}
                                                                </td>
                                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                    <a href="{{ asset($aceinfo->academiccert) }}" target="_blank" class="px-4 py-2 bg-cyan-500 hover:bg-gray-800 text-white rounded-md">Uploaded File</a>                                                            </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <h2 class="text-2xl font-bold mb-4 text-red-800">Academic Information Not Added</h2
                            @endif
                        </div>

                        <div class="bg-gray-100 p-4 rounded-md mt-4" >
                            @if($applicationlonglist->workexperience)
                                <div class="bg-cyan-50 p-4 rounded-md w-full">
                                    <h2 class="text-2xl font-bold mb-4">Work Experience</h2>
                                    <!-- component -->
                                    <div class="flex flex-col">
                                        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                                <div class="overflow-hidden">
                                                    <table class="min-w-full justify-items-center">
                                                        <thead class="bg-white border-b">
                                                        <tr>
                                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                                Job Title
                                                            </th>
                                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                                Department
                                                            </th>
                                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                                Company Name - Location
                                                            </th>
                                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                                Key Responsibilities
                                                            </th>
                                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                                Period of Employment
                                                            </th>
                                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                                Reasons for Leaving
                                                            </th>
                                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                                Key Achievements
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($applicationlonglist->workexperience as $workexperience)
                                                            <tr class="bg-gray-100 border-b">
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $workexperience->jobtitle }}</td>
                                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                    {{ $workexperience->department }}
                                                                </td>
                                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                    {{ $workexperience->companyname }} - {{ $workexperience->country }}
                                                                </td>
                                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                    {{ $workexperience->specialization }}
                                                                </td>
                                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                    @if($workexperience->currentemployer == 1)
                                                                        {{ $workexperience->fromdate }} -Current Employer<br>
                                                                        @php
                                                                            // Convert the fromdate and todate strings to Carbon instances
                                                                            $fromDate = \Carbon\Carbon::parse($workexperience->fromdate);
                                                                            $toDate = \Carbon\Carbon::now();

                                                                            // Calculate the difference between the dates
                                                                            $diffInYears = $toDate->diffInYears($fromDate);
                                                                            $diffInMonths = $toDate->diffInMonths($fromDate);

                                                                            // Output the result
                                                                            echo "Years: " . $diffInYears . ", Months: " . $diffInMonths;
                                                                        @endphp
                                                                    @else
                                                                        {{ $workexperience->fromdate }} - {{ $workexperience->todate }}<br>
                                                                        @php
                                                                            // Convert the fromdate and todate strings to Carbon instances
                                                                            $fromDate = \Carbon\Carbon::parse($workexperience->fromdate);
                                                                            $toDate = \Carbon\Carbon::parse($workexperience->todate);

                                                                            // Calculate the difference between the dates
                                                                            $diffInYears = $toDate->diffInYears($fromDate);
                                                                            $diffInMonths = $toDate->diffInMonths($fromDate);

                                                                            // Output the result
                                                                            echo "Years: " . $diffInYears . ", Months: " . $diffInMonths;
                                                                        @endphp
                                                                    @endif
                                                                </td>
                                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                    {{ $workexperience->leavingreason }}
                                                                </td>
                                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                    {{ $workexperience->achievement }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <h2 class="text-2xl font-bold mb-4 text-red-800">Work Experience Not Added</h2
                            @endif
                        </div>

                        <div class="bg-gray-100 p-4 rounded-md mt-4" >
                            @if($applicationlonglist->attachments)
                                <div class="bg-gray-100 p-4 rounded-md w-full">
                                    <h2 class="text-2xl font-bold mb-4">Attachments</h2>
                                    <!-- component -->
                                    <div class="flex flex-col">
                                        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                                <div class="overflow-hidden">
                                                    <table class="min-w-full justify-items-center">
                                                        <thead class="bg-white border-b">
                                                        <tr>
                                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                                Attachment Name
                                                            </th>
                                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                                Description
                                                            </th>
                                                            <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                                                View Uploaded File
                                                            </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($applicationlonglist->attachments as $attachment)
                                                            <tr class="bg-gray-100 border-b">
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $attachment->applicationattachment->name }}</td>
                                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                    {{ $attachment->applicationattachment->description }}
                                                                </td>
                                                                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                                    <a href="{{ asset($attachment->attachmentdoc) }}" target="_blank" class="px-4 py-2 bg-cyan-500 hover:bg-gray-800 text-white rounded-md">Uploaded File</a>                                                            </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <h2 class="text-2xl font-bold mb-4 text-red-800">Attachments Not Uploaded</h2
                            @endif
                        </div>

                        <div class="bg-gray-100 p-4 rounded-md mt-4" >
                            @if($applicationlonglist->declaration)
                                <div class="bg-cyan-50 p-4 rounded-md w-full">
                                    <h2 class="text-2xl font-bold mb-4">Declaration</h2>
                                    <!-- component -->
                                    <div class="flex flex-col">
                                        <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5">
                                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                                <div class="overflow-hidden">
                                                    @if($applicationlonglist->declaration->agree == 1)
                                                        <span class="text-emerald-700 font-bold">Agreed to the Terms and Conditions</span>
                                                    @else
                                                        <span class="text-red-800 font-bold">Did not agree to the terms and conditions</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <h2 class="text-2xl font-bold mb-4 text-red-800">Declaration Not Signed</h2
                            @endif
                        </div>

                    </div>

                    <div class="bg-gray-100 p-4 rounded-md mt-4">
                        <h2 class="text-2xl font-bold mb-4">Longlisting Comments </h2>
                        @foreach($longlistcomments as $comment)
                            {!! $comment->comment !!}
                        @endforeach
                    </div>
                    @if(count($shortlisted)>0)
                        <div class="bg-cyan-20 shadow-lg rounded-lg overflow-hidden mt-4">
                            <div class="bg-orange-300 p-4 rounded-md mt-4">
                                <h2 class="text-2xl font-bold mb-4">Your Feedback</h2>
                                @foreach($shortlisted as $comment)
                                    {!! $comment->comment !!}
                                @endforeach
                            </div>
                            @foreach($shortlisted as $comment)
                                <span> - Approved by: {{ $comment->user->name }} </span><span> <strong> On: {{ \Carbon\Carbon::parse($comment->updated_at)->format('Y-m-d') }}</strong> </span>
                            @endforeach
                        </div>
                    @else
                    @role(['HoD','Business Partner'])
                    <form method="POST" action="{{ route('bpartner.applicationshortlist.store') }}">
                        @csrf
                        <fieldset>
                            <legend>Forwarding Comments</legend>
                            <div class="bg-gray-300 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mt-9">
                                <div class="flex">
{{--                                    <h6 class="w-full font-semibold flex-col">Previous Comments.</h6>--}}
                                </div>
                            </div>
                            <div class="bg-gray-300 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mt-9">
                                <div class="flex">
                                    <h6 class="w-full font-semibold flex-col">Enter your comments below.</h6>
                                </div>
                                <div class="-mx-3 md:flex mb-6">
                                    <div class="md:w-full px-3">
                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                            <span class="text-red-500">*</span>
                                        </label>
                                        <textarea id="editor" name="comment" rows="4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 disabled:opacity-70" placeholder="maximum 250 characters">
                                            @foreach($shortlisted as $comment)
                                                {!! $comment->comment !!}
                                            @endforeach
                                        </textarea>
                                        @error('comment') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <input name="user_id" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="user_id" type="hidden" value="{{ Auth::id() }}">
                        <input name="applicant_id" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="applicant_id" type="hidden" value="{{ $applicationlonglist->user_id }}">
                        <input name="application_id" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="application_id" type="hidden" value="{{ $applicationlonglist->id }}">
                        <input name="staff_requistion_form_id" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="staff_requistion_form_id" type="hidden" value="{{ $applicationlonglist->staff_requistion_form_id }}">
                        <button type="submit" class="text-white bg-green-800 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Candidate to Short List</button>
                    </form>
                    @endrole
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-bpartner-layout>


