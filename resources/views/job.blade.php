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
            <div class="px-4 py-16">
                <div class="relative w-full md:max-w-2xl md:mx-auto text-center">
                    <h1 class="font-bold text-gray-700 text-xl sm:text-2xl md:text-5xl leading-tight mb-6">
                        To join our team, explore the different openings below:
                    </h1>

                    <p class="text-gray-600 md:text-xl md:px-18">
                        Strathmore University is home to exceptional individuals who possess academic excellence, creativity, leadership skills, and commitment to ethical and moral values.
                    </p>

                    <div class="hidden md:block h-40 w-40 rounded-full bg-blue-800 absolute right-0 bottom-0 -mb-64 -mr-48"></div>

                    <div class="hidden md:block h-5 w-5 rounded-full bg-yellow-500 absolute top-0 right-0 -mr-40 mt-32"></div>
                </div>
            </div>

            <svg class="fill-current bg-gray-200 text-white hidden md:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill-opacity="1" d="M0,64L120,85.3C240,107,480,149,720,149.3C960,149,1200,107,1320,85.3L1440,64L1440,320L1320,320C1200,320,960,320,720,320C480,320,240,320,120,320L0,320Z"></path>
            </svg>
        </div>

        <div class="max-w-4xl mx-auto bg-white shadow-lg relative z-20 hidden md:block" style="margin-top: -320px; border-radius: 20px;">
            <div class="h-20 w-20 rounded-full bg-yellow-500 absolute top-0 left-0 -ml-10 -mt-10" style="z-index: -1;"></div>

            <div class="h-5 w-5 rounded-full bg-blue-500 absolute top-0 left-0 -ml-32 mt-12" style="z-index: -1;"></div>
            <!-- component -->
            <section class="mx-auto max-w-6xl py-12">
                <div class="flex flex-col">
                    <div class="flex flex-col md:flex-row justify-center items-center">
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center"></div>
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center"></div>
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center"></div>
                    </div>
                    <div class="flex flex-col md:flex-row justify-center items-center">
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center">
                            <div slot="middle-left" class="max-w-2xl">
                                <div class="flex flex-row">
                                    <div class="w-2/3 bg-orange-600 p-5 text-teal-100 flex justify-center items-center h-48 text-3xl font-black uppercase">Awesome Opportunities</div>
                                    <div class="w-1/3 bg-teal-600 text-orange-100 p-5 flex justify-center items-center">Great working environment</div>
                                </div>
                            </div>
                        </div>
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center"></div>
                        <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center">
                            <div slot="middle-right" class="max-w-xs">
                                <div class="flex flex-col justify-center h-48 p-3">
                                    <div class="text-xl font-black text-teal-700">Discover SU</div>
                                    <div class="text-sm my-3">strathmore.edu</div>
                                    <div class="text-sm text-teal-700 cursor-pointer">Read more</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex w-full md:flex-row justify-center items-center">
                        @php
                            $slug = request()->route('slug');
                        @endphp
                        @foreach(\App\Models\StaffRequistionForm::where('slug',$slug)->get() as $index => $vacancy)
                            <div class="transition-all ease-in-out duration-1000 flex justify-center mr-0 md:mr-2 w-full">
                                <div slot="bottom-left" class="w-full">
                                    <div class="p-5 shadow-md m-2 mt-4 bg-white">
                                        <img class="object-contain h-20 mx-auto mb-4" src="{{ asset('bg-logo/logo.png') }}" alt="logo image">
                                        <div class="text-xs font-bold text-gray-600">{!! $vacancy->department->name !!}</div>
                                        <div class="text-xl font-bold text-gray-800 my-2">{{ $vacancy->jobtitle }}</div>
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
