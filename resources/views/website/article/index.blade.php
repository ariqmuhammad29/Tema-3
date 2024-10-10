@extends('website.layout')

@section('content')
    <div class="max-w-[1920px] overflow-hidden">

        <!-- Bagian Konten -->
        <div class="max-w-[1296px] mx-auto px-5 xl:px-0">
            <div class="flex flex-wrap items-center">
                <h2 class="text-[40px] mx-auto mb-2 lg:mb-0 lg:mx-0 font-bold w-full md:w-fit text-center dark:text-white">Blog Area</h2>

            </div>

            <div class="md:mt-11 mt-4 flex justify-center flex-wrap md:px-0">
                @foreach ($article as $key => $data)
                <a href="{{ route('article.show', $data->slug) }}">
                    <div class="flex items-center flex-wrap md:flex-nowrap justify-center w-full mb-20 last:mb-0">



                        <div class="w-fit">
                            <div class="relative">
                                <img src="{{ asset($data->image->sm) }}" class="rounded w-[416px] h-[284px]" alt="">
                                <div class="absolute top-[25px] right-[25px] w-fit">
                                    <a href="">
                                        <div class="p-[9px] rounded-full bg-white hover:bg-slate-200">
                                            <img src="{{ asset('static/website/images/element/bookmark.png') }}"
                                                class=" w-[18px] h-[18px] " alt="">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>



                        <div class="ml-6 md:w-[65%]">


                            <h2 class="text-2xl font-semibold my-4 dark:text-white">
                                {{ $data->category->name }}
                            </h2>

                            <p class="dark:text-white">
                                {{ $data->category->description }}
                            </p>



                        </div>



                    </div>
                </a>
                @endforeach







            </div>
        </div>
        <!-- Akhir Bagian Konten -->

        <!-- Bagian Sign Up -->
        <div class="bg-gray-100 dark:bg-slate-900 max-w-[1920px] md:mt-[196px] mt-24">
            <div class="max-w-[1296px] mx-auto xl:pl-[220px] md:pt-24 pt-10 md:px-20 xl:px-0 px-5 md;pb-[100px] pb-12">
                <div class="flex">
                    <h2 class="md:text-[40px] text-2xl font-bold leading-[130%] dark:text-white">
                        Don't Want to Miss Anything?
                    </h2>
                    <img src="{{ asset('static/website/images/element/arrows.png') }}" class="w-[65px] h-[68px] ml-[28px]" alt="">
                </div>

                <div class="flex mt-[27px] md:flex-nowrap flex-wrap">
                    <h2 class="lg:w-[196px] mb-4 md:mb-0 text-xl font-bold leading-[140%] dark:text-white">Sign up for Newsletters</h2>
                    <ul class="grid grid-cols-3 lg:w-[65%] md:w-[75%] w-full ml-6">
                        <li class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4" name="daily" id="daily"> <label for="daily"
                                class="text-sm text-gray-700 dark:text-white">Daily Newsletter</label>
                        </li>

                        <li class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4" name="daily" id="daily"> <label for="daily"
                                class="text-sm text-gray-700 dark:text-white">Advertising Updates</label>
                        </li>

                        <li class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4" name="daily" id="daily"> <label for="daily"
                                class="text-sm text-gray-700 dark:text-white">Week in Review</label>
                        </li>

                        <li class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4" name="daily" id="daily"> <label for="daily"
                                class="text-sm text-gray-700 dark:text-white">Event Updates</label>
                        </li>

                        <li class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4" name="daily" id="daily"> <label for="daily"
                                class="text-sm text-gray-700 dark:text-white">Podcasts</label>
                        </li>

                        <li class="flex items-center gap-2">
                            <input type="checkbox" class="w-4 h-4" name="daily" id="daily"> <label for="daily"
                                class="text-sm text-gray-700 dark:text-white">Startups Weekly</label>
                        </li>
                    </ul>
                </div>

                <form role="form" method="post" action="{{ route('subscribe.store') }}">
                    {{ csrf_field() }}
                    <div class="flex mt-16">
                        <div
                            class="flex items-center py-[13px] px-4 border-[1px] border-gray-300 w-[68%] bg-white rounded-lg">
                            <img src="assets/icon/bx-envelope.png" alt="">
                            <input type="email" name="email" value="{{ old('email') }}" class="w-[90%] outline-none " placeholder="Your Email">
                        </div>

                        <button id="submit" name="submit" type="submit" value="Send" class="md:px-12 px-4 md:ml-4 ml-1 md:py-[10px] py-2 rounded-lg text-white bg-[#6366F1]">Subscribe</button>
                    </div>

                </form>

                <h2 class="text-sm text-gray-600 mt-[28px] dark:text-white">
                    * Yes, I agree to the <a href="" class="text-[#6366F1]">terms</a> and <a href=""
                        class="text-[#6366F1]">privacy policy.</a>
                </h2>
            </div>
        </div>
        <!-- Akhir Bagian Sign up -->


    </div>
@endsection
