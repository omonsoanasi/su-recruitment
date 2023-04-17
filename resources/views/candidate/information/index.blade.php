<x-candidate-layout xmlns="http://www.w3.org/1999/html">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- component -->
                    <div class="w-full mx-auto mt-4  rounded">
                        <!-- Tabs -->
                        <ul id="tabs" class="inline-flex w-full px-1 pt-2 ">
                            <li class="px-4 py-2 -mb-px font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t opacity-50"><a id="default-tab" href="#first">Basic Info</a></li>
                            <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#second">Academic Info</a></li>
                            <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#third">Work Experience</a></li>
                            <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#fourth">Attachments</a></li>
                            <li class="px-4 py-2 font-semibold text-gray-800 rounded-t opacity-50"><a href="#fifth">Declaration</a></li>
                        </ul>

                        <!-- Tab Contents -->
                        <div id="tab-contents" class="w-full">
                            <div id="first" class="p-4 w-full">
                                <form method="POST" action="{{ route('candidate.basicinfo.store') }}">
                                    @csrf
                                    <fieldset class="bg-blue-50 rounded-md">
                                        <legend class="mb-4 text-xl font-bold text-emerald-700">General Information</legend>
                                        <div class="grid md:grid-cols-4 md:gap-6">
                                            <div class="relative z-0 w-full mb-6 group">
                                                <select name="title" id="title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                                                    <option value="Mr." {{ (old('title') == 'Mr.' || (isset($candidateInfo) && $candidateInfo->title == 'Mr.')) ? 'selected' : '' }}>Mr</option>
                                                    <option value="Mrs." {{ (old('title') == 'Mrs.' || (isset($candidateInfo) && $candidateInfo->title == 'Mrs.')) ? 'selected' : '' }}>Mrs</option>
                                                    <option value="Ms." {{ (old('title') == 'Ms.' || (isset($candidateInfo) && $candidateInfo->title == 'Ms.')) ? 'selected' : '' }}>Ms</option>
                                                    <option value="Dr." {{ (old('title') == 'Dr.' || (isset($candidateInfo) && $candidateInfo->title == 'Dr.')) ? 'selected' : '' }}>Dr</option>
                                                    <option value="Prof." {{ (old('title') == 'Prof.' || (isset($candidateInfo) && $candidateInfo->title == 'Prof.')) ? 'selected' : '' }}>Prof</option>
                                                </select>

                                                <label for="title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Title <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('title') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="text" name="lastname" id="lastname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ isset($candidateInfo) ? $candidateInfo->lastname : old('lastname') }}" />
                                                <label for="lastname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last Name <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('lastname') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="text" name="firstname" id="firstname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="{{ isset($candidateInfo) ? $candidateInfo->firstname : old('firstname') }}"/>
                                                <label for="firstname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First Name <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('firstname') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="text" name="middlename" id="middlename" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="{{ isset($candidateInfo) ? $candidateInfo->middlename : old('middlename') }}"/>
                                                <label for="middlename" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Middle Name <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('middlename') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                        </div>
                                        <div class="grid md:grid-cols-4 md:gap-6">
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="text" name="idnumber" id="idnumber" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ isset($candidateInfo) ? $candidateInfo->idnumber : old('idnumber') }}" />
                                                <label for="idnumber" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ID/Passport Number <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('idnumber') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="text" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  readonly value="{{ auth()->user()->email }}" />
                                                <label for="surname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('email') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <select name="gender" id="gender" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                                                    <option value="Male" {{ (old('gender') == 'Male' || (isset($candidateInfo) && $candidateInfo->gender == 'Male')) ? 'selected' : '' }}>Male</option>
                                                    <option value="Female" {{ (old('gender') == 'Female' || (isset($candidateInfo) && $candidateInfo->gender == 'Female')) ? 'selected' : '' }}>Female</option>
                                                    <option value="Other" {{ (old('gender') == 'Other' || (isset($candidateInfo) && $candidateInfo->gender == 'Other')) ? 'selected' : '' }}>Other</option>
                                                </select>
                                                <label for="gender" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Gender <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('gender') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="date" name="dateofbirth" id="dateofbirth" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="{{ isset($candidateInfo) ? $candidateInfo->dateofbirth : old('dateofbirth') }}" />
                                                <label for="dateofbirth" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date of Birth <span class="text-red-800 font-semibold">*</span></label>
                                                @error('dateofbirth') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="grid md:grid-cols-4 md:gap-6">
                                            <div class="relative z-0 w-full mb-6 group">
                                                <select name="disability" id="disability" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                                                    <option value="0" {{ (old('disability') == '0' || (isset($candidateInfo) && $candidateInfo->disability == '0')) ? 'selected' : '' }}>No</option>
                                                    <option value="1" {{ (old('disability') == '1' || (isset($candidateInfo) && $candidateInfo->disability == '1')) ? 'selected' : '' }}>Yes</option>
                                                </select>
                                                <label for="disability" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Physically Challenged? <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('disability') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <select name="nationality" id="nationality" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                                                    <option value="Kenyan" {{ (old('nationality') == 'Kenyan' || (isset($candidateInfo) && $candidateInfo->nationality == 'Kenyan')) ? 'selected' : '' }}>Kenyan</option>
                                                    <option value="Other" {{ (old('nationality') == 'Other' || (isset($candidateInfo) && $candidateInfo->nationality == 'Other')) ? 'selected' : '' }}>Other</option>
                                                </select>
                                                <label for="nationality" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nationality <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('nationality') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="text" name="countryofresidence" id="countryofresidence" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="{{ isset($candidateInfo) ? $candidateInfo->countryofresidence : old('countryofresidence') }}" />
                                                <label for="countryofresidence" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Country of Residence <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('residency') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <select name="applicanttype" id="applicanttype" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                                                    <option value="0" {{ (old('applicanttype') == '0' || (isset($candidateInfo) && $candidateInfo->applicanttype == '0')) ? 'selected' : '' }}>External</option>
                                                    <option value="1" {{ (old('applicanttype') == '1' || (isset($candidateInfo) && $candidateInfo->applicanttype == '1')) ? 'selected' : '' }}>Internal</option>
                                                </select>
                                                <label for="titlapplicanttype" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Applicant Type <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('applicanttype') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                        </div>
                                        <div class="grid md:grid-cols-4 md:gap-6">
                                            <div class="relative z-0 w-full mb-6 group">
                                                <select name="maritalstatus" id="maritalstatus" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                                                    <option value="0" {{ (old('maritalstatus') == '0' || (isset($candidateInfo) && $candidateInfo->maritalstatus == '0')) ? 'selected' : '' }}>Single</option>
                                                    <option value="1" {{ (old('maritalstatus') == '1' || (isset($candidateInfo) && $candidateInfo->maritalstatus == '1')) ? 'selected' : '' }}>Married</option>
                                                    <option value="2" {{ (old('maritalstatus') == '2' || (isset($candidateInfo) && $candidateInfo->maritalstatus == '0')) ? 'selected' : '' }}>Divorced</option>
                                                    <option value="3" {{ (old('maritalstatus') == '3' || (isset($candidateInfo) && $candidateInfo->maritalstatus == '1')) ? 'selected' : '' }}>Separated</option>
                                                </select>
                                                <label for="maritalstatus" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Marital Status <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('nationality') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <select name="relatedtostaff" id="relatedtostaff" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                                                    <option value="0" {{ (old('relatedtostaff') == '0' || (isset($candidateInfo) && $candidateInfo->relatedtostaff == '0')) ? 'selected' : '' }}>No</option>
                                                    <option value="1" {{ (old('relatedtostaff') == '1' || (isset($candidateInfo) && $candidateInfo->relatedtostaff == '1')) ? 'selected' : '' }}>Yes</option>
                                                </select>
                                                <label for="relatedtostaff" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Related to Any Strathmore Staff? <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('relatedtostaff') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="text" name="relationshiptype" id="relationshiptype" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="{{ isset($candidateInfo) ? $candidateInfo->relationshiptype : old('relationshiptype') }}" />
                                                <label for="relationshiptype" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">How are you related </label>
                                            </div>
                                            @error('relationshiptype') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="text" name="nameofstaff" id="nameofstaff" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="{{ isset($candidateInfo) ? $candidateInfo->nameofstaff : old('nameofstaff') }}" />
                                                <label for="nameofstaff" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name of Staff </label>
                                            </div>
                                            @error('nameofstaff') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                        </div>
                                    </fieldset>

                                    <fieldset class="bg-cyan-50 rounded-md">
                                        <legend class="mb-4 text-xl font-bold text-emerald-700">Contact Information</legend>
                                        <div class="grid md:grid-cols-4 md:gap-6">
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="phonenumber" id="phonenumber" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ isset($candidateInfo) ? $candidateInfo->phonenumber : old('phonenumber') }}" />
                                                <label for="phonenumber" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number (123-456-7890)</label>
                                            </div>
                                            @error('phonenumber') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="text" name="townofresidence" id="townofresidence" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ isset($candidateInfo) ? $candidateInfo->townofresidence : old('townofresidence') }}" />
                                                <label for="townofresidence" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">County/Town of Residence <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('townofresidence') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="text" name="postaladdress" id="postaladdress" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ isset($candidateInfo) ? $candidateInfo->postaladdress : old('postaladdress') }}" />
                                                <label for="postaladdress" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Postal Address <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('postaladdress') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="text" name="city" id="city" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="{{ isset($candidateInfo) ? $candidateInfo->city : old('city') }}"/>
                                                <label for="city" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">City/Town <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('city') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                        </div>
                                        <div class="grid md:grid-cols-3 md:gap-6">
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="text" name="postalcode" id="postalcode" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ isset($candidateInfo) ? $candidateInfo->postalcode : old('postalcode') }}" />
                                                <label for="postalcode" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Postal Code <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('postalcode') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="number" name="currsalary" id="currsalary" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ isset($candidateInfo) ? $candidateInfo->currsalary : old('currsalary') }}" />
                                                <label for="currsalary" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Current Monthly Salary <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('currsalary') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="number" name="expsalary" id="expsalary" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ isset($candidateInfo) ? $candidateInfo->expsalary : old('expsalary') }}" />
                                                <label for="expsalary" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Expected Monthly Salary <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('expsalary') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                        </div>
                                        <div class="grid md:grid-cols-3 md:gap-6">
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="text" name="currentbenefits" id="currentbenefits" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="{{ isset($candidateInfo) ? $candidateInfo->currentbenefits : old('currentbenefits') }}" />
                                                <label for="currentbenefits" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Current Benefits <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('currentbenefits') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <select name="referralsource" id="referralsource" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                                                    @foreach( $referralsources as $referralsource )
                                                        <option value="{{ $referralsource->id }}" {{ (old('referralsource') == $referralsource->id || (isset($candidateInfo) && $candidateInfo->referralsource == $referralsource->id )) ? 'selected' : '' }}>
                                                            {{ $referralsource->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <label for="referralsource" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">How did you hear about us <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('referralsource') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <input type="text" name="othersource" id="othersource" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  value="{{ isset($candidateInfo) ? $candidateInfo->othersource : old('othersource') }}" />
                                                <label for="othersource" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Other Source <span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('othersource') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                        </div>
                                        <div class="grid md:grid-cols-2 md:gap-6">
                                            <div class="relative z-0 w-full mb-6 group">
                                                <textarea id="editor_6" name="skillscompetence" rows="4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" A summary of your Skills and Compentencies"  >{!! isset($candidateInfo) ? $candidateInfo->skillscompetence : old('skillscompetence') !!}</textarea>
                                                <label for="skillscompetence" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"><span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('skillscompetence') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            <div class="relative z-0 w-full mb-6 group">
                                                <textarea id="editor_7" name="strengths" rows="4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="A summary About Your strengths, motivations etc *"  >{!! isset($candidateInfo) ? $candidateInfo->strengths : old('strengths') !!}</textarea>
                                                <label for="strengths" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"><span class="text-red-800 font-semibold">*</span></label>
                                            </div>
                                            @error('strengths') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                        </div>
                                    </fieldset>

                                    <fieldset class="bg-blue-50 rounded-md">
                                        <legend class="mb-4 text-xl font-bold text-emerald-700">Other Information</legend>
                                        <div>
                                            <p>Have you ever been arrested, indicted or summoned in court as a defendant in a criminal proceeding or convicted, tried or imprisoned for the violation of any law(Excluding minor traffic violations)</p>
                                            <div class="grid md:grid-cols-2 md:gap-6">
                                                <div class="relative z-0 w-full mb-6 group">
                                                    <select name="lawviolation" id="lawviolation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                                                        <option value="0" {{ (old('lawviolation') == '0' || (isset($candidateInfo) && $candidateInfo->lawviolation == '0')) ? 'selected' : '' }}>No</option>
                                                        <option value="1" {{ (old('lawviolation') == '1' || (isset($candidateInfo) && $candidateInfo->lawviolation == '1')) ? 'selected' : '' }}>Yes</option>
                                                    </select>
                                                    <label for="lawviolation" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"> <span class="text-red-800 font-semibold">*</span></label>
                                                </div>
                                                @error('lawviolation') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                <div class="relative z-0 w-full mb-6 group">
                                                    <textarea id="editor_5" name="violationdesc" rows="4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Describe the Law Violation"  >{!! isset($candidateInfo) ? $candidateInfo->violationdesc : old('violationdesc') !!}</textarea>
                                                    <label for="violationdesc" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"><span class="text-red-800 font-semibold">*</span></label>
                                                </div>
                                                @error('violationdesc') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <p>Have you ever been involved in any exploitation or abuse? E.g. Sexual abuse etc</p>
                                            <div class="grid md:grid-cols-2 md:gap-6">
                                                <div class="relative z-0 w-full mb-6 group">
                                                    <select name="exploitation" id="exploitation" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                                                        <option value="0" {{ (old('exploitation') == '0' || (isset($candidateInfo) && $candidateInfo->exploitation == '0')) ? 'selected' : '' }}>No</option>
                                                        <option value="1" {{ (old('exploitation') == '1' || (isset($candidateInfo) && $candidateInfo->exploitation == '1')) ? 'selected' : '' }}>Yes</option>
                                                    </select>
                                                    <label for="exploitation" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"> <span class="text-red-800 font-semibold">*</span></label>
                                                </div>
                                                @error('exploitation') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                <div class="relative z-0 w-full mb-6 group">
                                                    <textarea id="editor_4" name="exploitationdesc" rows="4" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="Describe the Exploitation or abuse"  >{!! isset($candidateInfo) ? $candidateInfo->exploitationdesc : old('exploitationdesc') !!}</textarea>
                                                    <label for="othersource" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"><span class="text-red-800 font-semibold">*</span></label>
                                                </div>
                                                @error('exploitationdesc') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </fieldset>
                                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                    <a href="#second">
                                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-4">Save and Proceed</button>
                                    </a>
                                </form>
                            </div>
                            <div id="second" class="hidden p-4">
                                @if(count($candidateacademicinfos) > 0)
                                <div class="p-6 text-gray-900">
                                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                    Qualification Type
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Qualification Title
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                   Institution Name
                                                </th>
                                                <th scope="col" class="px-6 py-3">
                                                    Completion Date
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                    Actions
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($candidateacademicinfos as $academicinfo)
                                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                        {{ $academicinfo->qualificationtype->name }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ $academicinfo->qualificationtitle }}
                                                    </td>
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                        {{ $academicinfo->institutionname }}
                                                    </th>
                                                    <td class="px-6 py-4">
                                                        {{ $academicinfo->todate }}
                                                    </td>
                                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                        <div class="flex justify-end">
                                                            <div class="flex space-x-2">
                                                                <a href="{{ asset($academicinfo->academiccert) }}" target="_blank" class="px-4 py-2 bg-cyan-500 hover:bg-gray-800 text-white rounded-md">Uploaded File</a>

                                                                <a href="{{ route('candidate.academicinfo.edit', $academicinfo) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-800 text-white rounded-md">Edit</a>

                                                                <form class="px-4 py-2 bg-red-500 hover:bg-red-800 text-white rounded-md" method="POST" action="{{ route('candidate.academicinfo.destroy', $academicinfo->id) }}" onsubmit="return confirm('You are about to remove academic details...')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit">Remove</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                                @else
                                    <p>You have not added academic details yet</p>
                                @endif
                                <section class=" flex h-screen w-screen p-10 justify-center items-start">
                                    <button onclick="document.getElementById('myModal').showModal()" id="btn" class="py-3 px-10 bg-green-800 text-white rounded text shadow-xl">Add Academic Background</button>
                                </section>

                                <dialog id="myModal" class="h-auto w-full md:w-1/2 p-5  bg-white rounded-md ">

                                    <div class="flex flex-col w-full h-auto ">
                                        <!-- Header -->
                                        <div class="flex w-full h-auto justify-center items-center">
                                            <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                                                Academic Background
                                            </div>
                                            <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </div>
                                            <!--Header End-->
                                        </div>
                                        <!-- Modal Content-->
                                        <div class="flex w-full h-auto py-10 px-2 justify-center items-center bg-gray-200 rounded text-center text-gray-500">
                                            <form method="POST" action="{{ route('candidate.academicinfo.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="grid md:grid-cols-2 md:gap-6">
                                                    <div class="relative z-0 w-full mb-6 group">
                                                        <select name="qualification_type_id" id="qualification_type_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                                                            @foreach( $qualificationtypes as $qualificationtype )
                                                                <option value="{{ $qualificationtype->id }}" {{ old('qualificationtype') == $qualificationtype->id ? 'selected' : '' }}>
                                                                    {{ $qualificationtype->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <label for="qualification_type_id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Qualification Type <span class="text-red-800 font-semibold">*</span></label>
                                                    </div>
                                                    <div class="relative z-0 w-full mb-6 group">
                                                        <input type="text" name="qualificationtitle" id="qualificationtitle" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                                        <label for="qualificationtitle" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Qualification Full Title</label>
                                                    </div>
                                                </div>
                                                <div class="relative z-0 w-full mb-6 group">
                                                    <input type="text" name="specializationarea" id="specializationarea" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                                    <label for="specializationarea" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Area of Specialization</label>
                                                </div>
                                                <div class="relative z-0 w-full mb-6 group">
                                                    <input type="text" name="institutionname" id="institutionname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                                    <label for="institutionname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Institution Name</label>
                                                </div>
                                                <div class="grid md:grid-cols-2 md:gap-6">
                                                    <div class="relative z-0 w-full mb-6 group">
                                                        <input type="date" name="fromdate" id="fromdate" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                                        <label for="fromdate" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">From Date</label>
                                                    </div>
                                                    <div class="relative z-0 w-full mb-6 group">
                                                        <input type="date" name="todate" id="todate" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                                        <label for="todate" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">To Date</label>
                                                    </div>
                                                </div>
                                                <div class="relative z-0 w-full mb-6 group">
                                                    <input type="file" name="academiccert" id="academiccert" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " accept=".pdf,.png,.jpg" />
                                                    <label for="academiccert" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Upload Certificate</label>
                                                </div>
                                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save/Next</button>
                                            </form>
                                        </div>
                                        <!-- End of Modal Content-->
                                    </div>
                                </dialog>
                            </div>
                            <div id="third" class="hidden p-4">
                                @if(count($workexperiences) > 0)
                                    <div class="p-6 text-gray-900">
                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                        Company Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Job Title
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                        From
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        To
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                        Actions
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($workexperiences as $workexperience)
                                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                            {{ $workexperience->companyname }}
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            {{ $workexperience->jobtitle }}
                                                        </td>
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                            {{ $workexperience->fromdate }}
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            {{ $academicinfo->todate }}
                                                        </td>
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                            <div class="flex justify-end">
                                                                <div class="flex space-x-2">
                                                                    <a href="{{ route('candidate.workexperience.edit', $workexperience) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-800 text-white rounded-md">Edit</a>

                                                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-800 text-white rounded-md" method="POST" action="{{ route('candidate.workexperience.destroy', $workexperience->id) }}" onsubmit="return confirm('You are about to remove work experience details...')">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit">Remove</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                @else
                                    <p>You have not added work experience details yet</p>
                                @endif
                                <section class=" flex h-screen w-screen p-10 justify-center items-start">
                                    <button onclick="document.getElementById('myModal1').showModal()" id="btn" class="py-3 px-10 bg-green-800 text-white rounded text shadow-xl">Add Work Experience</button>
                                </section>

                                <dialog id="myModal1" class="h-auto w-full md:w-1/2 p-5  bg-white rounded-md ">

                                    <div class="flex flex-col w-full h-auto ">
                                        <!-- Header -->
                                        <div class="flex w-full h-auto justify-center items-center">
                                            <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                                                Work Experience
                                            </div>
                                            <div onclick="document.getElementById('myModal1').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </div>
                                            <!--Header End-->
                                        </div>
                                        <!-- Modal Content-->
                                        <div class="flex w-full h-auto py-10 px-2 justify-center items-center bg-gray-200 rounded text-center text-gray-500">
                                            <form method="POST" action="{{ route('candidate.workexperience.store') }}">
                                                @csrf
                                                <div class="grid md:grid-cols-2 md:gap-6">
                                                    <div class="relative z-0 w-full mb-6 group">
                                                        <input type="text" name="jobtitle" id="jobtitle" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                                        <label for="jobtitle" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Job Title</label>
                                                    </div>
                                                    <div class="relative z-0 w-full mb-6 group">
                                                        <input type="text" name="department" id="department" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                                        <label for="department" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Department</label>
                                                    </div>
                                                </div>
                                                <div class="grid md:grid-cols-2 md:gap-6">
                                                    <div class="relative z-0 w-full mb-6 group">
                                                        <input type="text" name="companyname" id="companyname" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                                        <label for="companyname" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Company Name</label>
                                                    </div>
                                                    <div class="relative z-0 w-full mb-6 group">
                                                        <input type="text" name="country" id="country" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                                        <label for="country" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Country</label>
                                                    </div>
                                                </div>
                                                <div class="relative z-0 w-full mb-6 group">
                                                    <textarea rows="5" name="specialization" id="specialization" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600" placeholder="Brief Description of Key Responsibilities (Max. 250 Characters)"></textarea>
                                                    <label for="specialization" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"> </label>
                                                </div>
                                                <div class="grid md:grid-cols-3 md:gap-6">
                                                    <div class="relative z-0 w-full mb-6 group">
                                                        <input type="hidden" name="currentemployer" value="0" />
                                                        <input type="checkbox" name="currentemployer" id="currentemployer" value="1" class="block peer h-5 w-5 text-blue-600 border-gray-300 dark:text-blue-500 focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500 rounded" />
                                                        <label for="currentemployer" class="ml-2 text-sm text-gray-700 dark:text-gray-400">Current Employer</label>
                                                    </div>

                                                    <div class="relative z-0 w-full mb-6 group">
                                                        <input type="date" name="fromdate" id="fromdate" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                                        <label for="fromdate" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">From Date</label>
                                                    </div>
                                                    <div class="relative z-0 w-full mb-6 group">
                                                        <input type="date" name="todate" id="todate" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                                        <label for="todate" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">To Date</label>
                                                    </div>
                                                </div>
                                                <div class="grid md:grid-cols-2 md:gap-6">
                                                    <div class="relative z-0 w-full mb-6 group">
                                                        <input type="number" name="currsalary" id="currsalary" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "  />
                                                        <label for="currsalary" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Current Salary (USD)</label>
                                                    </div>
                                                    <textarea rows="5" name="leavingreason" id="leavingreason" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600" placeholder="Reason for leaving (Max. 250 Characters)"></textarea>
                                                </div>
                                                <div class="relative z-0 w-full mb-6 group">
                                                    <textarea rows="5" name="achievement" id="achievement" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600" placeholder="Key achievements (Max. 250 Characters)"></textarea>
                                                    <label for="achievement" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"> </label>
                                                </div>
                                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save/Next</button>
                                            </form>
                                        </div>
                                        <!-- End of Modal Content-->



                                    </div>
                                </dialog>

                            </div>
                            <div id="fourth" class="hidden p-4">
                                @if(count($candidateattachments) > 0)
                                    <div class="p-6 text-gray-900">
                                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                        Attachment Name
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Description
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">
                                                        Actions
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($candidateattachments as $candidateattachment)
                                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                            {{ $candidateattachment->applicationattachment->name }}
                                                        </th>
                                                        <td class="px-6 py-4">
                                                            {{ $candidateattachment->applicationattachment->description }}
                                                        </td>
                                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">
                                                            <div class="flex justify-end">
                                                                <div class="flex space-x-2">
                                                                    <a href="{{ asset($candidateattachment->attachmentdoc) }}" target="_blank" class="px-4 py-2 bg-cyan-500 hover:bg-gray-800 text-white rounded-md">Uploaded File</a>

                                                                    <a href="{{ route('candidate.applicationattachment.edit', $candidateattachment) }}" class="px-4 py-2 bg-blue-500 hover:bg-blue-800 text-white rounded-md">Edit</a>

                                                                    <form class="px-4 py-2 bg-red-500 hover:bg-red-800 text-white rounded-md" method="POST" action="{{ route('candidate.applicationattachment.destroy', $candidateattachment->id) }}" onsubmit="return confirm('You are about to remove academic details...')">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit">Remove</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                @else
                                    <p>You have not added any attachments yet</p>
                                @endif
                                <section class=" flex h-screen w-screen p-10 justify-center items-start">
                                    <button onclick="document.getElementById('myModal2').showModal()" id="btn" class="py-3 px-10 bg-green-800 text-white rounded text shadow-xl">Add Attachment</button>
                                </section>

                                <dialog id="myModal2" class="h-auto w-full md:w-1/2 p-5  bg-white rounded-md ">

                                    <div class="flex flex-col w-full h-auto ">
                                        <!-- Header -->
                                        <div class="flex w-full h-auto justify-center items-center">
                                            <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                                                Add Attachment
                                            </div>
                                            <div onclick="document.getElementById('myModal2').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </div>
                                            <!--Header End-->
                                        </div>
                                        <!-- Modal Content-->
                                        <div class="flex w-full h-auto py-10 px-2 justify-center items-center bg-gray-200 rounded text-center text-gray-500">
                                            <form method="POST" action="{{ route('candidate.applicationattachment.store') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="grid md:grid-cols-2 md:gap-6">
                                                    <div class="relative z-0 w-full mb-6 group">
                                                        <select name="application_attachment_id" id="application_attachment_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " >
                                                            @foreach( $applicationattachments as $applicationattachment )
                                                                <option value="{{ $applicationattachment->id }}" {{ old('applicationattachment') == $applicationattachment->id ? 'selected' : '' }}>
                                                                    {{ $applicationattachment->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <label for="application_attachment_id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Attachment <span class="text-red-800 font-semibold">*</span></label>
                                                    </div>
                                                    <div class="relative z-0 w-full mb-6 group">
                                                        <input type="file" name="attachmentdoc" id="attachmentdoc" accept=".pdf,.png,.jpg" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                                        <label for="attachmentdoc" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Upload</label>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save/Next</button>
                                            </form>
                                        </div>
                                        <!-- End of Modal Content-->
                                    </div>
                                </dialog>
                            </div>
                            <div id="fifth" class="hidden p-4">
                                <div class="bg-cyan-50 rounded-md">
                                    I hereby declare that the information provided in this form is true to the best of my knowledge, and I understand that any false information given could render me liable to immediate disqualification.<br><hr>

                                    <strong>ACCURACY OF CONTENT:</strong> The content of this application is accurate and contains no false information.<br><hr>

                                    <strong>EDUCATION INFORMATION:</strong> I give my full consent and authorize Strathmore University to contact each of my education institutions listed in this application for the purpose of conducting required reference checks with regard to my educational background, and confirm the diploma or degree I have received from each education institution. I also authorize the mentioned educational institutions to provide requested information directly to Strathmore University. Any information received will be treated with due regard to confidentiality.<br><hr>

                                    <strong>WORK EXPERIENCE:</strong> I am aware that Strathmore University will contact former and current employers, if applicable, regarding work experience as well as check my three professional references. Finally, I understand that submission of false information or misrepresentation and/or submission of falsified documentation constitutes serious misconduct for which severe disciplinary sanctions can be imposed. I consent to all of the foregoing as part of the process of evaluation of my application.<br><hr>
                                    <form method="POST" action="{{ route('candidate.candidatedeclaration.store') }}">
                                        @csrf
                                        <p class="font-bold">I agree with the Terms and Conditions.</p>
                                        <div class="relative z-0 w-full mb-6 group">
                                            <input type="hidden" name="agree" value="0" />
                                            <input type="checkbox" name="agree" id="agree" value="1"
                                                   class="block peer h-5 w-5 text-blue-600 border-gray-300 dark:text-blue-500 focus:ring-blue-500 dark:focus:ring-blue-500 focus:border-blue-500 dark:focus:border-blue-500 rounded"
                                                {{ isset($candidatedeclaration) && $candidatedeclaration->agree == 1 ? 'checked' : '' }} />
                                        </div>
                                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save Details</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        let tabsContainer = document.querySelector("#tabs");

                        let tabTogglers = tabsContainer.querySelectorAll("a");
                        console.log(tabTogglers);

                        tabTogglers.forEach(function(toggler) {
                            toggler.addEventListener("click", function(e) {
                                e.preventDefault();

                                let tabName = this.getAttribute("href");

                                let tabContents = document.querySelector("#tab-contents");

                                for (let i = 0; i < tabContents.children.length; i++) {

                                    tabTogglers[i].parentElement.classList.remove("border-blue-400", "border-b",  "-mb-px", "opacity-100");  tabContents.children[i].classList.remove("hidden");
                                    if ("#" + tabContents.children[i].id === tabName) {
                                        continue;
                                    }
                                    tabContents.children[i].classList.add("hidden");

                                }
                                e.target.parentElement.classList.add("border-blue-400", "border-b-4", "-mb-px", "opacity-100");
                            });
                        });

                        document.getElementById("default-tab").click();

                    </script>
                </div>
            </div>
        </div>
    </div>
</x-candidate-layout>
