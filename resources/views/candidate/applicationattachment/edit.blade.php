<x-candidate-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Application Attachments</h2>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{ route('candidate.information.index') }}" class="px-4 py-2 bg-green-800 hover:bg-green-300 rounded-md p-2 text-slate-100">Go Back</a>
                </div>

                <form method="POST" action="{{ route('candidate.applicationattachment.update', $applicationattachment) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="mb-6">
                            <label for="application_attachment_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qualification Type</label>
                                <select name="application_attachment_id" id="application_attachment_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder=" " >
                                        <option value="">Select qualification type</option>
                                        @foreach($attachments as $attachment)
                                            <option value="{{ $attachment->id }}" {{ $applicationattachment->applicationattachment->id == $attachment->id ? 'selected' : '' }}>
                                                {{ $attachment->name }}
                                            </option>
                                        @endforeach
                                </select>
                            @error('application_attachment_id') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                    <embed class="w-full h-screen mb-4" src="{{ asset($applicationattachment->attachmentdoc) }}" type="application/pdf" width="100%" height="600px"/>
                    <div class="mb-6">
                        <label for="attachmentdoc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Change File</label>
                        <input type="file" name="attachmentdoc" id="attachmentdoc" accept=".pdf,.jpg,.png" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        @if($applicationattachment->attachmentdoc)
                            <div class="mt-2">
{{--                                <span class="text-gray-500 text-sm">{{ $academicinfo->academiccert }}</span>--}}
                            </div>
                        @endif
                        @error('attachmentdoc') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="text-white bg-green-800 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Record</button>
                </form>
            </div>

        </div>
    </div>
</x-candidate-layout>
