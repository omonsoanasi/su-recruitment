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

                <form method="POST" action="{{ route('candidate.academicinfo.update', $academicinfo) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="mb-6">
                            <label for="qualification_type_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qualification Type</label>
                                <select name="qualification_type_id" id="qualification_type_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder=" " >
                                        <option value="">Select qualification type</option>
                                        @foreach($qualificationtypes as $qualificationtype)
                                            <option value="{{ $qualificationtype->id }}" {{ $academicinfo->qualificationtype->id == $qualificationtype->id ? 'selected' : '' }}>
                                                {{ $qualificationtype->name }}
                                            </option>
                                        @endforeach
                                </select>
                            @error('qualification_type_id') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                        <div class="mb-6">
                            <label for="qualificationtitle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qualification Title</label>
                            <input type="text" name="qualificationtitle"  id="qualificationtitle" value = "{{ $academicinfo->qualificationtitle }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="  " required>
                            @error('qualificationtitle') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="mb-6">
                            <label for="specializationarea" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Specialization Area</label>
                            <input type="text" name="specializationarea"  id="specializationarea" value = "{{ $academicinfo->specializationarea }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="  " required>
                            @error('specializationarea') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                        <div class="mb-6">
                            <label for="institutionname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institution Name</label>
                            <input type="text" name="institutionname"  id="institutionname" value = "{{ $academicinfo->institutionname }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="  " required>
                            @error('institutionname') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="mb-6">
                            <label for="fromdate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">From Date</label>
                            <input type="date" name="fromdate"  id="fromdate" value = "{{ $academicinfo->fromdate }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="  " required>
                            @error('fromdate') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                        <div class="mb-6">
                            <label for="todate" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">To Date</label>
                            <input type="date" name="todate"  id="todate" value = "{{ $academicinfo->todate }}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="  " required>
                            @error('todate') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <embed class="w-full h-screen mb-4" src="{{ asset($academicinfo->academiccert) }}" type="application/pdf" width="100%" height="600px"/>
                    <div class="mb-6">
                        <label for="academiccert" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Change Certificate</label>
                        <input type="file" name="academiccert" id="academiccert" accept=".pdf,.jpg,.png" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        @if($academicinfo->academiccert)
                            <div class="mt-2">
{{--                                <span class="text-gray-500 text-sm">{{ $academicinfo->academiccert }}</span>--}}
                            </div>
                        @endif
                        @error('academiccert') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="text-white bg-green-800 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Record</button>
                </form>
            </div>

        </div>
    </div>
</x-candidate-layout>
