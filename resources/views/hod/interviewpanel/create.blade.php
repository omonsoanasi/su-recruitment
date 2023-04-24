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
                                        <a href="{{ route('hod.interviewpanel.create') }}" class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Add Interview Panel</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <div class="bg-slate-200 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <form method="POST" action="{{ route('hod.interviewpanel.store') }}">
                                    @csrf
                                <!-- component -->
                                    <div>
                                        <fieldset>
                                            <legend>Panelist Details</legend>
                                                <div class="bg-gray-300 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2 mt-9">
                                                    <div class="-mx-3 md:flex mb-6">
                                                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="requistion">
                                                                Job Title
                                                            </label>
                                                            <select id="staff_requistion_form_id" name="staff_requistion_form_id" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3">
                                                                @foreach( $ownrequistions as $requistion )
                                                                    <option value="{{ $requistion->id }}" {{ old('staff_requistion_form_id') == $requistion->id ? 'selected' : '' }}>
                                                                        {{ $requistion->jobtitle }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            @error('staff_requistion_form_id') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                        </div>
                                                        <div class="md:w-1/2 px-3">
                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="jobtitle">
                                                                Full Name
                                                            </label>
                                                            <input name="panelistname" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="jobtitle" type="text" placeholder="John Doe " value="{{ old('panelistname') }}">
                                                            @error('panelistname') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                                    <div class="-mx-3 md:flex mb-2">
                                                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-city">
                                                                Email Address
                                                            </label>
                                                            <input name="panelistemail" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="panelistemail" type="email" placeholder="email@address.com" value="{{ old('panelistemail') }}">
                                                            @error('panelistemail') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                        </div>
                                                        <div class="md:w-1/2 px-3">
                                                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-zip">
                                                                Phone Number
                                                            </label>
                                                            <input name="panelistphonenumber" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="panelistphonenumber" type="text" placeholder="phone number" value="{{ old('panelistphonenumber') }}">
                                                            @error('panelistphonenumber') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                        </div>
                                                    </div>
                                            <div class="-mx-3 md:flex mb-6">
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="interviewnotes">
                                                        Interview Note
                                                    </label>
                                                    <input name="interviewnotes" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="interviewnotes" type="text" placeholder="short interview note " value="{{ old('interviewnotes') }}">
                                                    <p class="text-grey-dark text-xs italic">Short note to be attached on the email sent to the panelist</p>
                                                    @error('interviewnotes') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                </div>
                                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                    <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="approvedsalary">
                                                        Interview Date
                                                    </label>
                                                    <input name="interviewdate" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="interviewdate" type="date" placeholder="start date... " value="{{ old('interviewdate') }}">
                                                    @error('interviewdate') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                                                </div>
                                            </div>
                                        </div>
                                        </fieldset>
                                    </div>
                                    <input name="user_id" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="user_id" type="hidden" value="{{ Auth::id() }}">
                                    <button type="submit" class="text-white bg-green-800 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Panelist</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-hod-layout>


