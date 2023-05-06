<x-welcome-layout>
<!-- component -->
    <div class="font-sans bg-white flex flex-col min-h-screen w-full">
    <div>
        <div class="bg-gray-200 px-4 py-4">
            <div class="w-full md:max-w-6xl md:mx-auto md:flex md:items-center md:justify-between">
                <div>
                    <a href="/">
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                    <span class="">Strathmore University People and Culture Department.</span>
                </div>
{{--                <div>--}}
{{--                    <a href="#" class="inline-block py-2 text-gray-800 text-2xl font-bold">Strathmore University People and Culture Department.</a>--}}
{{--                </div>--}}

                <div>
                    <div class="hidden md:block">
                        <a
                            href="#"
                            class="inline-block py-1 md:py-4 text-gray-600 mr-6 font-bold"
                        >How it Works</a
                        >
{{--                        <a--}}
{{--                            href="#"--}}
{{--                            class="inline-block py-1 md:py-4 text-gray-500 hover:text-gray-600 mr-6"--}}
{{--                        >Solutions</a--}}
{{--                        >--}}

{{--                        <a--}}
{{--                            href="#"--}}
{{--                            class="inline-block py-1 md:py-4 text-gray-500 hover:text-gray-600 mr-6"--}}
{{--                        >Pricing</a--}}
{{--                        >--}}
{{--                        <a--}}
{{--                            href="#"--}}
{{--                            class="inline-block py-1 md:py-4 text-gray-500 hover:text-gray-600 mr-6"--}}
{{--                        >Desktop</a--}}
{{--                        >--}}
                    </div>
                </div>
                <div class="hidden md:block">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-block py-2 px-4 text-gray-700 bg-white hover:bg-gray-100 rounded-lg">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="inline-block py-1 md:py-4 text-gray-500 hover:text-gray-600 mr-6">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-block py-2 px-4 text-gray-700 bg-white hover:bg-gray-100 rounded-lg">Get Started</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>

        <div class="bg-gray-200 md:overflow-hidden">
            <svg class="fill-current bg-gray-200 text-white hidden md:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill-opacity="1" d="M0,64L120,85.3C240,107,480,149,720,149.3C960,149,1200,107,1320,85.3L1440,64L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
            </svg>
        </div>

        <div class="max-w-4xl mx-auto bg-white shadow-lg relative z-20 md:block" style="margin-top: -320px; border-radius: 20px;">
            <div class="h-20 w-20 rounded-full bg-yellow-500 absolute top-0 left-0 -ml-10 -mt-10" style="z-index: -1;"></div>

            <div class="h-5 w-5 rounded-full bg-blue-500 absolute top-0 left-0 -ml-32 mt-12" style="z-index: -1;"></div>
            <!-- component -->
            @php
                $slug = request()->route('slug');
                $particulars = \App\Models\StaffRequistionForm::where('slug',$slug)->get();
            @endphp
            <section class="mx-auto max-w-6xl py-12">
                <div class="flex flex-col">
                    <div class="flex flex-col md:flex-row justify-center items-center">
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center"></div>
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center"></div>
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center"></div>
                    </div>
                    @foreach($particulars as $index => $vacancy)
                    <div class="flex flex-col md:flex-row justify-center items-center">
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center">
                            <div slot="middle-left" class="max-w-2xl">
                                <div class="flex flex-row">
                                    <div class="w-2/3 bg-orange-600 p-5 text-teal-100 flex justify-center items-center h-48 text-3xl font-black uppercase">
                                        {{ $vacancy->jobtitle }}</div>
                                    <div class="w-1/3 bg-teal-600 text-orange-100 p-5 flex flex-col justify-center items-center gap-2">
                                        <p><strong>Type:</strong> {{ $vacancy->jobtype->name }}</p>
                                        <hr>
                                        <p><strong>Location:</strong> {{ $vacancy->campuslocation->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center">
                            <div slot="middle-right" class="max-w-xs">
                                <div class="flex flex-col justify-center h-48 p-3">
                                    <div class="flex flex-col justify-center h-48 p-3">
                                        <div class="text-xl font-black text-teal-700">Discover More Opportunities</div>
                                        <div class="text-sm my-3 font-bold rounded-md shadow-lg">
                                            Find Jobs By Keyword
                                        </div>
                                        <div class="text-sm text-teal-700 cursor-pointer">
                                            <form method="GET" action="{{ route('search') }}">
                                                <input type="text" name="query" placeholder="Search..." class="rounded-md backdrop-filter">
                                                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-4">Search</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="flex w-full md:flex-row justify-center items-center">
                        @foreach($particulars as $index => $vacancy)
                            <div class="transition-all ease-in-out duration-1000 flex justify-center md:mr-2 w-full bg-gray-400 rounded-md mt-4">
                                <div slot="bottom-left" class="w-full mr-3 bg-white rounded-md">
                                    <div class="p-5 shadow-md m-2 mt-4 bg-gray-200">
                                        <div class="flex items-center justify-between text-xs font-bold text-gray-600">
                                            <div class="flex-1">Faculty/School/Department: <strong>{!! $vacancy->department->name !!}</strong></div>
                                            <div class="ml-auto {{ Carbon\Carbon::parse($vacancy->applicationdeadline)->diffInHours(now()) < 48 ? 'text-red-500 font-bold' : '' }}">Application Deadline: <strong>{!! $vacancy->applicationdeadline !!}</strong></div>
                                        </div>
                                        <div class="text-xl font-bold text-gray-800 my-2 text-center"> </div>
                                        <div class="bg-cyan-50 text-black font-bold">Job Purpose</div>
                                            <div class="text-sm text-gray-700 leading-snug mb-2 ml-4 rounded-md shadow">{!! $vacancy->jobpurpose !!}</div>
                                        <div class="bg-cyan-50 text-black font-bold">Job Responsibilities</div>
                                            <div class="text-sm text-gray-700 leading-snug mt-2 mb-2 ml-4 rounded-md shadow">{!! $vacancy->accountability !!}</div>
                                        <div class="bg-cyan-50 text-black font-bold">Educational Qualifications</div>
                                            <div class="text-sm text-gray-700 leading-snug mt-2 mb-2 ml-4 rounded-md shadow">{!! $vacancy->educationalqualifications !!}</div>
                                        <div class="bg-cyan-50 text-black font-bold">Experience</div>
                                            <div class="text-sm text-gray-700 leading-snug mt-2 mb-2 ml-4 rounded-md shadow">{!! $vacancy->experience !!}</div>
                                        <div class="bg-cyan-50 text-black font-bold">Personal Qualities</div>
                                            <div class="text-sm text-gray-700 leading-snug mt-2 mb-2 ml-4 rounded-md shadow">{!! $vacancy->personalqualities !!}</div>
                                        <div class="bg-cyan-50 text-black font-bold">Other Qualities</div>
                                            <div class="text-sm text-gray-700 leading-snug mt-2 mb-2 ml-4 rounded-md shadow">{!! $vacancy->other !!}</div>
                                        <div class="bg-cyan-50 text-black font-bold">Knowledge and Skills</div>
                                            <div class="text-sm text-gray-700 leading-snug mt-2 mb-2 ml-4 rounded-md shadow">{!! $vacancy->skill !!}</div>
                                        <div class="text-xl font-bold text-green-600 mt-4"><a href="{{ route('candidate.availablejobs.edit', $vacancy->id) }}">Apply Now</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <div class="h-10 bg-white rounded-t-lg border-b border-gray-100"></div>


        <p class="text-center p-4 text-gray-600 mt-10">
            Created by Strathmore University ICTS-EAS Department
        </p>
    </div>
</div>
</x-welcome-layout>
