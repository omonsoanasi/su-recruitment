<x-candidate-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="min-w-0 flex-1">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Interview Confirmation</h2>
            </div>
            @if($interviewinvitation->responded == 0)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <form method="POST" action="{{ route('candidate.interviewresponse.update', $interviewresponse) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="mb-6">
                            <label for="candidateresponse" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Will you be able to attend the interview</label>
                                <select name="candidateresponse" id="candidateresponse" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder=" " >
                                    <option value="">Select an option</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            @error('candidateresponse') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                        <div class="mb-6">
                            <label for="candidatecomment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Comment</label>
                            <input type="text" name="candidatecomment"  id="candidatecomment" value = "" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="  " required>
                            @error('candidatecomment') <span class="text-red-500 text-sm"> {{ $message }}</span> @enderror
                        </div>
                    </div>
                    <input type="hidden" name="responded" value="1">
                    <button type="submit" class="text-white bg-green-800 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Record</button>
                </form>
            </div>
            @else
                <h2 class="text-sm font-bold leading-7 text-blue-700 sm:truncate sm:text-3xl sm:tracking-tight">Response has already been sent</h2>
            @endif
        </div>
    </div>
</x-candidate-layout>
