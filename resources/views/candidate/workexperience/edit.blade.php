<x-candidate-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Academic Background Details</h2>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('candidate.information.index') }}" class="px-4 py-2 bg-green-800 hover:bg-green-300 rounded-md p-2 text-slate-100">Go Back</a>
                </div>

                <form method="POST" action="{{ route('candidate.workexperience.update', $workexperience) }}">
                    @csrf
                    @method('PUT')
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="mb-6">
                            <label for="jobtitle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job Title</label>
                            <input type="text" name="jobtitle"  id="jobtitle" value = "{{ $workexperience->jobtitle }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder=" " required>
                            @error('jobtitle') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                        <div class="mb-6">
                            <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
                            <input type="text" name="department"  id="department" value = "{{ $workexperience->department }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder=" " required>
                            @error('department') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="grid md:grid-cols-3 md:gap-6">
                        <div class="mb-6">
                            <label for="companyname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company Name</label>
                            <input type="text" name="companyname"  id="specializationarea" value = "{{ $workexperience->companyname }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder=" " required>
                            @error('companyname') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                        <div class="mb-6">
                            <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country</label>
                            <input type="text" name="country"  id="country" value = "{{ $workexperience->country }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder=" " required>
                            @error('country') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                        <div class="mb-6">
                            <label for="currsalary" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Salary</label>
                            <input type="number" name="currsalary"  id="currsalary" value = "{{ $workexperience->currsalary }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder=" " required>
                            @error('currsalary') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="specialization" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Key Responsibilities</label>
                        <textarea name="specialization" id="specialization" rows="4" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder=" " required>{{ $workexperience->specialization }}</textarea>
                        @error('specialization') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                    </div>
                    <div class="grid md:grid-cols-3 md:gap-6">
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="hidden" name="currentemployer" value="0" />
                            <input type="checkbox" name="currentemployer" id="currentemployer" value="1"
                                   class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                {{ $workexperience->currentemployer == 1 ? 'checked' : '' }} />
                            <label for="currentemployer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Employer</label>
                        </div>
                        <div class="mb-6">
                            <label for="fromdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">From Date</label>
                            <input type="date" name="fromdate"  id="fromdate" value = "{{ $workexperience->fromdate }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder=" " required>
                            @error('fromdate') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                        <div class="mb-6">
                            <label for="todate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">To Date</label>
                            <input type="date" name="todate"  id="todate" value = "{{ $workexperience->todate }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder=" " required>
                            @error('todate') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="mb-6">
                            <label for="leavingreason" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reason for Leaving</label>
                            <textarea name="leavingreason" id="leavingreason" rows="4" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder=" " required>{{ $workexperience->leavingreason }}</textarea>
                            @error('leavingreason') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                        <div class="mb-6">
                            <label for="achievement" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Key Achievements</label>
                            <textarea name="achievement" id="achievement" rows="4" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder=" " required>{{ $workexperience->achievement }}</textarea>
                            @error('achievement') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <button type="submit" class="text-white bg-green-800 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Record</button>
                </form>
            </div>

        </div>
    </div>
</x-candidate-layout>
