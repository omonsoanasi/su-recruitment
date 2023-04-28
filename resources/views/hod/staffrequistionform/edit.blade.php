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
                                        <a href="#" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Edit Requisition</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <div class="bg-slate-200 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900 bg-center bg-cover bg-no-repeat" style="background-image: url({{ asset('bg-logo/logo.png') }});">
                                <form method="POST" action="{{ route('hod.staffrequistionform.update', $staffrequistionform) }}">
                                    @method('PUT')
                                    @csrf
                                    <!-- component -->
                                    <div>
                                        <fieldset>
                                            <legend>Position Details</legend>
                                            <div class="bg-gray-300 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mt-9">
                                                <div class="-mx-3 md:flex mb-6">
                                                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="jobtype">
                                                            Job Type
                                                        </label>
                                                        <select id="job_type_id" name="job_type_id" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" @if($staffrequistionform->status >= 1) disabled @endif>
                                                            @foreach( $jobTypes as $jobType )
                                                                <option value="{{ $jobType->id }}" {{ old('job_type_id', $staffrequistionform->job_type_id) == $jobType->id ? 'selected' : '' }}>
                                                                    {{ $jobType->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('job_type_id') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="md:w-1/2 px-3">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="jobtitle">
                                                            Job Title
                                                        </label>
                                                        <input name="jobtitle" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="jobtitle" type="text" value="{{ $staffrequistionform->jobtitle }}" @if($staffrequistionform->status >= 1) readonly @endif>
                                                        @error('jobtitle') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="-mx-3 md:flex mb-6">
                                                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="approvedsalary">
                                                            Approved Salary (KSHs)
                                                        </label>
                                                        <input name="approvedsalary" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="approvedsalary" type="number" value="{{ $staffrequistionform->approvedsalary }}" @if($staffrequistionform->status >= 1) readonly @endif>
                                                        @error('approvedsalary') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="md:w-1/2 px-3">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="jobtype">
                                                            Department/School/Faculty
                                                        </label>
                                                        <select id="department_id" name="department_id" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" @if($staffrequistionform->status >= 1) disabled @endif>
                                                            @foreach($departments as $department)
                                                                <option value="{{ $department->id }}" {{ old('department_id', $staffrequistionform->department_id) == $department->id ? 'selected' : '' }}>
                                                                    {{ $department->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('department_id') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="-mx-3 md:flex mb-2">
                                                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
                                                            Reporting To
                                                        </label>
                                                        <input name="reportingto" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="reportingto" type="text" value="{{ $staffrequistionform->reportingto }}" @if($staffrequistionform->status >= 1) readonly @endif>
                                                        @error('reportingto') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="md:w-1/2 px-3">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">
                                                            Number of Vacancies
                                                        </label>
                                                        <input name="numberofvacancies" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="numberofvacancies" type="number" value="{{ $staffrequistionform->numberofvacancies }}" @if($staffrequistionform->status >= 1) readonly @endif>
                                                        @error('numberofvacancies') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="md:w-1/2 px-3">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">
                                                            Number of Current Job Holders
                                                        </label>
                                                        <input name="noofcurrentholders" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="noofcurrentholders" type="number" value="{{ $staffrequistionform->noofcurrentholders }}" @if($staffrequistionform->status >= 1) readonly @endif>
                                                        @error('noofcurrentholders') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="-mx-3 md:flex mb-6">
                                                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="approvedsalary">
                                                            Status of Employment
                                                        </label>
                                                        <input name="statusofemployment" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="statusofemployment" type="text" value="{{ $staffrequistionform->statusofemployment }}" @if($staffrequistionform->status >= 1) readonly @endif>
                                                        <p class="text-grey-dark text-xs italic">(permanent/contract); specify the duration of the contract and the number of hours per week</p>
                                                        @error('statusofemployment') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="approvedsalary">
                                                            Start Date
                                                        </label>
                                                        <input name="startdate" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="startdate" type="date" value="{{ $staffrequistionform->startdate }}" @if($staffrequistionform->status >= 1) readonly @endif>
                                                        @error('startdate') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="md:w-1/2 px-3">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="campus_location_id">
                                                            Campus Location
                                                        </label>
                                                        <select id="campus_location_id" name="campus_location_id" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" @if($staffrequistionform->status >= 1) disabled @endif>
                                                            @foreach($campuslocations as $campuslocation)
                                                                <option value="{{ $campuslocation->id }}" {{ old('campus_locations_id', $staffrequistionform->campus_location_id) == $campuslocation->id ? 'selected' : '' }}>
                                                                    {{ $campuslocation->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('campus_location_id') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Advertisement Waiver</legend>
                                            <div class="bg-gray-300 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mt-9">
                                                <div class="flex">
                                                    <h6 class="w-full font-semibold flex-col">To ensure a competitive and fair recruitment, all vacancies need to be advertised. However, if an advertisement waiver is applicable, please give justification.</h6>
                                                </div>
                                                <div class="-mx-3 md:flex mb-6">
                                                    <div class="md:w-1/2 px-3">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="advertise">
                                                            Advertise for this post?
                                                        </label>
                                                        <div class="relative">
                                                            <select name="advertise" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state" @if($staffrequistionform->status >= 1) disabled @endif>
                                                                <option value="1" {{ $staffrequistionform->advertise == 1 ? 'selected' : '' }}>Yes</option>
                                                                <option value="0" {{ $staffrequistionform->advertise == 0 ? 'selected' : '' }}>No</option>
                                                            </select>
                                                        </div>
                                                        @error('advertise') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="md:w-1/2 px-3">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="advertjustification">
                                                            If NO, please give your justifications below
                                                        </label>
                                                        <textarea id="editor_7" name="advertjustification" rows="4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" @if($staffrequistionform->status >= 1) readonly @endif >{!! $staffrequistionform->advertjustification !!}</textarea>
                                                        @error('advertjustification') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Job Purpose</legend>
                                            <div class="bg-gray-300 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mt-9">
                                                <div class="flex">
                                                    <h6 class="w-full font-semibold flex-col">Please indicate the main reason why this position exists. For example, the Job Purpose of a PnC Business Partner
                                                        role would be: To provide interface between People and Culture Department and Directors/Managers/Deans through
                                                        the provision of guidance and support in the application of PnC policies in order to increase the perceived value of
                                                        PnC practices to all stakeholders in achieving their respective departmental/faculties’ objectives.</h6>
                                                </div>
                                                <div class="-mx-3 md:flex mb-6">
                                                    <div class="md:w-full px-3">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                                            <span class="text-red-500">*</span>
                                                        </label>
                                                        <textarea id="editor" name="jobpurpose" rows="4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" @if($staffrequistionform->status >= 1) readonly @endif>{!! $staffrequistionform->jobpurpose !!}</textarea>
                                                        @error('jobpurpose') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Main Accountability and Output</legend>
                                            <div class="bg-gray-300 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mt-9">
                                                <div class="-mx-3 md:flex mb-6">
                                                    <div class="md:w-full px-3">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                                            <span class="text-red-500">*</span>
                                                        </label>
                                                        <textarea id="editor_1" name="accountability" rows="4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="accountability" @if($staffrequistionform->status >= 1) readonly @endif>{!! $staffrequistionform->accountability !!}</textarea>
                                                        @error('accountability') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>PRE-REQUISITE</legend>
                                            <div class="bg-gray-300 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mt-9">
                                                <div class="-mx-3 md:flex mb-6">
                                                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="educationalqualification">
                                                            Educational Qualifications <span class="text-red-500">*</span>
                                                        </label>
                                                        <textarea id="editor_2" name="educationalqualifications" rows="4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" placeholder="Educational Qualifications">{!! $staffrequistionform->educationalqualifications  !!}</textarea>
                                                        <p class="text-grey-dark text-xs italic">(Include all academic, professional or other educational qualifications required to
                                                            undertake the role)</p>
                                                        @error('educationalqualifications') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="experience">
                                                            Experience <span class="text-red-500">*</span>
                                                        </label>
                                                        <textarea id="editor_3" name="experience" rows="4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="experience" placeholder="Experience">{!! $staffrequistionform->experience  !!}</textarea>
                                                        <p class="text-grey-dark text-xs italic">(Relevant and extensive experience, any experience; not necessarily related but transferable skills, no prior experience required)</p>
                                                        @error('experience') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                                <div class="-mx-3 md:flex mb-6">
                                                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="approvedsalary">
                                                            Personal Qualities <span class="text-red-500">*</span>
                                                        </label>
                                                        <textarea id="editor_4" name="personalqualities" rows="4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" placeholder="Personal Qualities">{!! $staffrequistionform->personalqualities !!}</textarea>
                                                        <p class="text-grey-dark text-xs italic">(Include all personal qualities required to undertake the role)</p>
                                                        @error('personalqualities') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="approvedsalary">
                                                            Other Skills <span class="text-red-500">*</span>
                                                        </label>
                                                        <textarea id="editor_5" name="other" rows="4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" @if($staffrequistionform->status >= 1) readonly @endif>{!! $staffrequistionform->other !!}</textarea>
                                                        <p class="text-grey-dark text-xs italic">(Other skills required required)</p>
                                                        @error('other') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Knowledge and Skill</legend>
                                            <div class="bg-gray-300 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mt-9">
                                                <div class="flex">
                                                    <h6 class="w-full font-semibold flex-col">This is meant to be in relation to specialist knowledge and expertise required to undertake the role e.g. specialised IT skills, supervisory, among others.</h6>
                                                </div>
                                                <div class="-mx-3 md:flex mb-6">
                                                    <div class="md:w-full px-3">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-password">
                                                            <span class="text-red-500">*</span>
                                                        </label>
                                                        <textarea id="editor_6" name="skill" rows="4" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" @if($staffrequistionform->status >= 1) readonly @endif>{!! $staffrequistionform->skill !!}</textarea>
                                                        @error('skill') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Technical Exam/Interview Details</legend>
                                            <div class="bg-gray-300 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mt-9">
                                                <div class="-mx-3 md:flex mb-6">
                                                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="technicalexam">
                                                            Technical Exam
                                                        </label>
                                                        <input type="hidden" name="technicalexam" value="0" />
                                                        <input name="technicalexam" type="checkbox" value="1" {{ $staffrequistionform->technicalexam == 1 ? 'checked' : '' }}>
                                                        @error('technicalexam') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                    <div class="md:w-1/2 px-3">
                                                        <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="onlineexam">
                                                            Online Exam
                                                        </label>
                                                        <input type="hidden" name="onlineexam" value="0" />
                                                        <input name="onlineexam" type="checkbox" value="1" {{ $staffrequistionform->onlineexam == 1 ? 'checked' : '' }}>
                                                        @error('onlineexam') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                        <fieldset>
                                            <legend>Comments From the Business Partner</legend>
                                            <div class="bg-red-300 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mt-9">
                                                @foreach($businesspartnerrejection as $bpreject)
                                                    <span>
                                                        {!! $bpreject->comment !!}
                                                    </span>
                                                    <span>
                                                        - Comments by: <strong>{{ $bpreject->user->name }}</strong> On: <strong>{{ $bpreject->updated_at }}</strong>
                                                    </span>
                                                @endforeach
                                            </div>
                                        </fieldset>
                                    <input name="user_id" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="user_id" type="hidden" value="{{ Auth::id() }}">
                                    @if($staffrequistionform->status >= 1)
                                    <button type="submit" class="text-white bg-green-800 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" disabled tabindex="-1">Request Forwarded for Approval/Can't be edited at this point</button>
                                    @else
                                        <button type="submit" name="status" value="0" class="text-white bg-green-800 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Request</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-hod-layout>


