@extends('website.layout')

@section('content')
    {{-- Welcome --}}
    <div class="max-w-[1920px] overflow-hidden">
        <div class="lg:h-[801px] bg-gray-200 dark:bg-slate-900 px-5 xl:px-0 flex flex-wrap">
            <div class="max-w-[1296px] mx-auto flex ">
                <div class="xl:w-[591px] lg:w-1/3 w-full lg:text-left text-center flex flex-col ">
                    <h2 class="text-xl font-extrabold lg:mt-32 mt-10 dark:text-white" data-aos="fade-right"
                        data-aos-duration="700">
                        Welcome!</h2>
                    <h2
                        class="magang xl:text-[64px] text-[38px] font-bold leading-[130%] mt-2l lg:h-[167px] lg:mb-8 dark:text-white">
                        Magang
                        <span class="text-[#6366F1] magangspan">IT Hybrid</span> Bareng Aksamedia
                    </h2>
                    <h2 class="text-slate-500 text-lg lg:mt-6 mt-4 lg:w-[526px] w-[80%] mx-auto lg:mx-0 dark:text-white"
                        data-aos="fade-right" data-aos-duration="700" data-aos-delay="300">Enjoy our great
                        selection of IT courses. Choose
                        from more than
                        25K online video courses and become an IT expert now!</h2>

                    <div class="items-center flex mt-12 lg:mx-0 mx-auto  w-fit" data-aos="fade-right"
                        data-aos-duration="700" data-aos-delay="600">
                        <div class=" bg-white md:py-[14px] py-[12px] rounded-lg px-4 md:w-[458px]">
                            <input type="text" placeholder="Search courses..."
                                class="w-1/2 p-0 outline-none border-none">
                            <select name="" id=""
                                class="w-[48%] text-slate-400 outline-none p-0 border-none">
                                <option value="">Categories</option>
                                <option value="">Design</option>
                                <option value="">Web Developer</option>
                            </select>
                        </div>
                        <button class="md:p-[14px] p-[12px] bg-[#6366F1] rounded-md ml-4 mt-0 hover:opacity-80">
                            <img src="{{ asset('static/website/images/element/search.png') }}" alt=""
                                class="md:w-6 md:h-6 h-5 w-5">
                        </button>
                    </div>

                    <div class="flex lg:mt-32 mt-20 items-center lg:mb-0 mb-12 mx-auto lg:mx-0" data-aos="fade-up"
                        data-aos-duration="700" data-aos-offset="-200">
                        <img src="{{ asset('static/website/images/blog/image5.png') }}" alt=""
                            class="w-12 h-12 rounded-full">
                        <img src="{{ asset('static/website/images/blog/image6.png') }}" alt=""
                            class="w-12 h-12 -ml-4 rounded-full">
                        <img src="{{ asset('static/website/images/blog/image7.png') }}" alt=""
                            class="w-12 h-12 -ml-4 rounded-full">
                        <h2 class="text-slate-500 ml-4 dark:text-white"><span class="text-[#6366F1] font-bold ">10K+</span>
                            students are
                            already with us</h2>
                    </div>
                </div>
                <div class=" ml-auto lg:block mt-20 hidden h-[657px] xl:w-[636px] w-2/4">
                    <img src="{{ asset('static/website/images/blog/image1.png') }}" alt=""
                        class="xl:w-[410px] xl:h-[410px] w-[310px] h-[310px] absolute ml-[110px] mt-[150px] z-20 rounded-full" data-aos="zoom-in">
                    <img src="{{ asset('static/website/images/blog/image2.png') }}" alt=""
                        class="xl:w-[300px] xl:h-[300px] w-[250px] h-[250px] ml-auto relative z-10 rounded-full" data-aos="zoom-in"
                        data-aos-duration="700" data-aos-delay="200">
                    <img src="{{ asset('static/website/images/blog/image3.png') }}" alt=""
                        class="w-[250px] h-[250px] ml-auto mt-[75px] rounded-full" data-aos="zoom-in" data-aos-delay="400">
                    <img src="{{ asset('static/website/images/blog/image4.png') }}" alt=""
                        class="-mt-[570px] w-[180px] h-[180px] rounded-full" data-aos="zoom-in" data-aos-delay="500">
                    <div class="w-[200px] h-[200px] bg-gray-300 rounded-full ml-14 mt-20" data-aos="zoom-in"
                        data-aos-duration="700" data-aos-delay="200"></div>
                    <div class="w-[120px] h-[120px] rounded-full bg-gray-300 -mt-[490px] ml-[310px]" data-aos="zoom-in"
                        data-aos-duration="700" data-aos-delay="100"></div>
                </div>

            </div>
        </div>
    </div>

    {{-- Step --}}
    <div class="dark:bg-slate-800 ">
        <div class=" max-w-[1296px] mx-auto justify-center flex flex-wrap lg:mt-[84px] pt-12 flex-col px-5 xl:px-0 ">
            <h2 class=" text-center lg:text-[40px] font-bold text-[30px] w-full dark:text-white" data-aos="fade-down"
                data-aos-duration="700">
                Bagaimana Kami Bisa Memulai?</h2>

            @foreach ($step as $key => $data)
                <div
                    class="flex lg:mt-16 mt-6 items-center md:flex-nowrap flex-wrap max-w-[800px] mx-auto lg:max-w-none w-full">
                    <div class="flex relative justify-center w-full md:w-fit md:mr-10" data-aos="flip-up"
                        data-aos-duration="700">
                        <div class="p-2 lg:p-4 md:p-2 rounded-full bg-gray-100 mb-4">
                            <div class="p-1.5 lg:p-6 md:p-3 rounded-full bg-white shadow-lg">
                                <h2
                                    class="lg:text-[32px] font-bold leading-[160%] lg:h-[42px] lg:w-[42px] w-5 h-5 flex items-center justify-center ">
                                    {{ $key + 1 }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center ">
                        <img src="{{ $data->image->sm }}" alt=""
                            class=" xl:w-[306px] xl:h-[300px]
                                    w-1/3 xl:ml-[98px] rounded-md"
                            data-aos="fade-right" data-aos-duration="700">
                        <div class="xl:ml-[134px] ml-[20px]" data-aos="fade-left" data-aos-duration="700">
                            <h2 class="lg:text-2xl text-lg mb-4 font-bold leading-[110%] lg:leading-[140%] dark:text-white">
                                {{ $data->title }}
                            </h2>
                            <p class="text-slate-600 lg:leading-[160%] lg:text-base text-sm leading-[120%] dark:text-white">
                                {{ $data->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



    {{-- Benefit --}}
    <div class="mt-[99px] max-w-[1296px] mx-auto px-5 lg:px-0">
        <h2 class="text-center lg:text-[40px] font-bold text-[30px] dark:text-white" data-aos="fade-down"
            data-aos-duration="700">
            Apa yang Anda Dapatkan</h2>

        <div class="flex-wrap flex justify-center mt-12 md:px-3 lg:px-0 gap-6">
            @foreach ($benefit as $key => $data)
                <div class="p-6 border-2 rounded-lg w-full sm:w-[48%] lg:w-[32%] h-[254px] dark:bg-slate-600"
                    data-aos="fade-up" data-aos-duration="700" data-aos-delay="150">
                    <div class="p-4 bg-gray-100 w-fit rounded-full mx-auto lg:mx-0"><img src="{{ $data->image->sm }}"
                            alt="" class="w-8 h-8"></div>
                    <h2 class="text-xl font-bold mt-6 text-center lg:text-left dark:text-white">{{ $data->title }}</h2>
                    <p
                        class="text-slate-600 mt-3 leading-[160%] text-center lg:text-left dark:text-white max-w-[300px] mx-auto lg:mx-0">
                        {{ str_limit(strip_tags($data->description), 110, '...') }}</p>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Testimonies --}}
    <div class="max-w-[1296px] mx-auto mt-[122px] gap-6 flex lg:flex-nowrap flex-wrap justify-center px-5 xl:px-0">
        <div class="relative w-full" data-aos="fade-right" data-aos-duration="700">
            <div class=" my-auto lg:px-14 w-full bg-gray-200 dark:bg-slate-900 md:h-[441px] items-center flex">
                <h2
                    class="md:text-[40px] text-[30px] text-center font-bold leading-[130%]  px-5 lg:px-0 md:text-left py-5 md:py-0 mx-auto dark:text-white">
                    "kata mereka Alumni Magang Aksamedia"</h2>
            </div>
        </div>

        <div id="" class=" relative xl:px-12 pt-12 box-shadow-magang" data-aos="fade-left"
            data-aos-duration="700" data-aos-delay="150">
            <div class="flex">
                <img src="{{ asset('static/website/images/element/iconpetik.png') }}" alt=""
                    class="p-[14px] bg-[#6366F1] rounded-lg ">
                <div class="ml-auto gap-4 flex items-center">
                    <div class=" dark:bg-slate-300 rounded-full h-fit">
                        <button class="owl-prev" class="p-2 shadow-xl rounded-full"><img
                                src="{{ asset('static/website/images/element/chevron.png') }}" alt=""
                                class="w-5 h-5"></button>
                    </div>
                    <div class=" dark:bg-slate-300 rounded-full h-fit">
                        <button class="owl-next" type="button" class="p-2 shadow-xl rounded-full "><img
                                src="{{ asset('static/website/images/element/chevron.png') }}" alt=""
                                class="w-5 h-5 rotate-[180deg]"></button>
                    </div>
                </div>
            </div>
            <!-- Carousel wrapper -->
            <div id="slider" class="relative  rounded-lg h-72 overflow-hidden w-full">
                <div class="slider">
                    <div class="owl-carousel owl-theme overflow-hidden">

                        @foreach ($testimoni as $key => $data)
                            <!-- Item 1 -->
                            <div class="slider-card">
                                <div>

                                    <div>
                                        <p class="text-lg leading-[160%] text-slate-600 mt-8  h-[116px] overflow-hidden dark:text-white">
                                            {{ str_limit(strip_tags($data->description), 215, '...') }}
                                        </p>
                                        <div class="mt-8 flex items-center">
                                            <div>
                                                <img src="{{ asset(@$data->image->sm) }}" alt=""
                                                    class="rounded-full lg:w-[60px] lg:h-[60px] w-10 h-10 object-contain">
                                            </div>
                                            <ul class="ml-4">
                                                <li class="leading-[160%] font-bold text-slate-900 text-sm lg:text-base dark:text-white">
                                                    {{ $data->title }}
                                                </li>
                                                <li class="lg:text-sm font-light text-slate-500 text-xs dark:text-slate-300">
                                                    {{ $data->status }}
                                                </li>
                                            </ul>
                                            {{-- <ul class="ml-auto flex gap-2">
                                                <li><button
                                                        class="lg:p-[9px] p-[9px] md:p-0 bg-[#EFF2FC] rounded hover:bg-gray-200"><img
                                                            src="assets/icon/fb.svg" alt=""
                                                            class="lg:w-[15px] lg:h-[15px] w-5 h-5"></button>
                                                </li>
                                                <li><button
                                                        class="lg:p-[9px] p-[9px] md:p-0 bg-[#EFF2FC] rounded hover:bg-gray-200"><img
                                                            src="assets/icon/ig.svg" alt=""
                                                            class="lg:w-[15px] lg:h-[15px] w-5 h-5"></button>
                                                </li>
                                                <li><button
                                                        class="lg:p-[9px] p-[9px] md:p-0 bg-[#EFF2FC] rounded hover:bg-gray-200"><img
                                                            src="assets/icon/x.svg" alt=""
                                                            class="lg:w-[15px] lg:h-[15px] w-5 h-5"></button></li>
                                            </ul> --}}
                                        </div>
                                    </div>


                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>






            </div>
        </div>
    </div>

    {{-- Partner --}}
    <div class="max-w-[1296px] mx-auto mt-[121px] px-5 lg:px-0">
        <h2 class="text-center lg:text-[32px] text-[28px] font-bold text-slate-900 dark:text-white" data-aos="zoom-in"
            data-aos-duration="700" data-aos-offset="100">Dipercaya dan Kerjasama Kampus
            dan SMK</h2>
        <div class="mt-8 flex gap-6 justify-center flex-wrap">

            @foreach ($partner as $key => $data)
                <div class="border-[1px] lg:w-[196px] lg:h-[100px] md:w-[166px] w-[140px] h-[80px] justify-center items-center rounded-lg flex border-gray-300 dark:bg-white"
                    data-aos="zoom-in" data-aos-duration="700">
                    <img src="{{ $data->image->sm }}" alt="" class="lg:max-w-[160px] max-w-[130px] h-fit">
                </div>
            @endforeach

        </div>
    </div>

    {{-- FAQ --}}
    <div class="max-w-[1296px] mx-auto bg-[#6366F1] dark:bg-slate-600 mt-24 rounded-lg">
        <div class="relative"><img src="{{ asset('static/website/images/element/shapes.png') }}" alt=""
                class="absolute right-0 top-0"></div>
        <div class="relative"><img src="{{ asset('static/website/images/element/shapes (1).png') }}" alt=""
                class="absolute left-0  top-[220px]"></div>
        <!-- <div class="relative h-full"><img src="assets/image/shapes3.svg" alt="" class="absolute left-96 top-96"></div> -->
        <div class="relative md:pt-20 pt-10 lg:px-[220px] md:px-28 px-5 pb-[112px]">
            <h2 class="text-center lg:text-[40px] text-[30px] font-bold text-white" data-aos="zoom-in"
                data-aos-duration="700" data-aos-offset="100">Frequently Asked Question</h2>

            <div class="mt-12 space-y-4 ">

                @foreach ($faq as $key => $data)
                    <div class=" bg-white cursor-pointer px-6 py-4 dropdown flex flex-wrap items-center rounded-lg hover:bg-gray-200"
                        data-aos="flip-down" data-aos-duration="400" data-aos-delay="150">
                        <div class="ask w-full cursor-pointer flex items-center flex-wrap">
                            <label
                                class="font-semibold text-slate-900 leading-[160%] cursor-pointer w-[80%]">{{ $data->question }}</label>
                            <div class="ml-auto items-center flex p-2 pencet bg-gray-100 rounded-full">
                                <img src="{{ asset('static/website/images/element/buttonnormal.png') }}" alt=""
                                    class="button-normal ">
                                <img src="{{ asset('static/website/images/element/buttonwhite.png') }}" alt=""
                                    class="button-white hidden">
                            </div>
                        </div>
                        <p class="hidden asklist mt-4 text-sm text-slate-500 leading-[160%] ">{{ $data->answer }}</p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    {{-- Join Us --}}
    <div class="bg-gray-100 dark:bg-slate-900 mt-[82px] px-5 xl:px-0">
        <div class="max-w-[1296px] mx-auto md:pt-[86px] md:pb-[112px] pt-[46px] pb-[60px]">
            <h2 class="lg:text-[40px] text-[28px]  font-bold text-center leading-[130%] md:w-[748px] mx-auto dark:text-white"
                data-aos="zoom-in" data-aos-duration="700">Siap bergabung magang
                Aksamedia? Ayo mulai dari sekarang</h2>
            <div class="md:mt-[59px] mt-12 flex flex-wrap xl:flex-nowrap justify-center gap-6">
                <img src="{{ asset('static/website/images/bg/imagejoin.png') }}" alt=""
                    class="lg:w-[746px] lg:max-h-[618px]  rounded-lg" data-aos="fade-right" data-aos-duration="700">
                <div class="bg-white w-full md:px-12 px-1 pt-12 rounded-lg dark:bg-slate-600" data-aos="fade-left" data-aos-duration="700"
                    data-aos-delay="150">
                    <h2 class="text-[28px] font-bold dark:text-white">Kuota Terbatas <span class="text-[#EF4444]">20 orang</span> di
                        setiap angkatan!</h2>
                    <form role="form" method="post" action="{{ route('landing.store') }}">
                        {{ csrf_field() }}
                        <div class="mt-10">
                            <label for="name" class="font-semibold leading-[160%] dark:text-white">Nama Lengkap</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="outline-none border-[1px] border-gray-300 w-full rounded-lg h-[52px] px-2 mt-1">
                        </div>
                        <div class="mt-6">
                            <label for="hp" class="font-semibold leading-[160%] dark:text-white">Nomer HP Aktif</label>
                            <input type="text" name="password" id="hp" value="{{ old('hp') }}"
                                class="outline-none border-[1px] border-gray-300 w-full rounded-lg h-[52px] px-2 mt-1">
                        </div>

                        <button type="submit"
                            class="px-8 py-[13px] bg-[#6366F1] text-white font-semibold mt-8 rounded-lg shadow-lg hover:opacity-90">Kirim
                            Permohonan Magang
                        </button>
                    </form>
                    <h2 class="mt-12 font-bold leading-[160%] dark:text-white">Or sign up using:</h2>
                    <div class="mt-6 flex flex-wrap gap-3 mb-10 ">
                        <a href="">
                            <button class="p-3 bg-gray-200 rounded-md hover:bg-gray-300"><img
                                    src="{{ asset('static/website/images/element/icon-google.png') }}" alt=""
                                    class="w-5 h-5"></button>
                        </a>
                        <a href="">
                            <button class="p-3 bg-gray-200 rounded-md hover:bg-gray-300"><img
                                    src="{{ asset('static/website/images/element/icon-fb.svg') }}" alt=""
                                    class="w-5 h-5"></button>
                        </a>
                        <a href="">
                            <button class="p-3 bg-gray-200 rounded-md hover:bg-gray-300"><img
                                    src="{{ asset('static/website/images/element/icon-linkedin.svg') }}" alt=""
                                    class="w-5 h-5"></button>
                        </a>
                        <a href="">
                            <button class="p-3 bg-gray-200 rounded-md hover:bg-gray-300"><img
                                    src="{{ asset('static/website/images/element/icon-github.png') }}" alt=""
                                    class="w-5 h-5"></button>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop
