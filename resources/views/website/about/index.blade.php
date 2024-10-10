@extends('website.layout')

@section('content')
    <div class="max-w-[1920px]">

        <!-- Bagian Header -->
        <div class="max-w-[1920px] bg-gray-50 dark:bg-slate-800  px-5 xl:px-0">
            <div class="max-w-[1296px] mx-auto lg:pt-[115px] pt-5 md:pt-[50px] flex items-center lg:flex-nowrap flex-wrap w-full gap-6 xl:gap-0">
                <div class="">
                    <h2 class="md:text-[40px] text-3xl font-bold dark:text-white">About Silicon</h2>
                    <p class="mt-6 xl:text-xl md:text-lg leading-[160%] text-gray-700 dark:text-white">
                        We are a dedicated team of passionate product managers, full stack developers, UX/UI designers,
                        QA engineers and marketing experts helping businesses of every size — from new startups
                        to public
                        companies — launch their projects using our software.
                    </p>

                    <p class="mt-6 xl:text-xl md:text-lg leading-[160%] text-gray-700 dark:text-white">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium vitae voluptatum, quas nam
                        natus saepe, ea incidunt iusto nobis officiis eligendi ab iste accusamus quam, libero ullam dolorem
                        nesciunt assumenda facere maiores veniam ratione blanditiis? Quidem a ad facilis ipsum.
                    </p>




                    <div class="xl:mt-[88px] mt-10">
                        <a href="" class="flex items-center  gap-4">
                            <div class="p-[10px] shadow-lg w-fit rounded-full dark:bg-white">
                                <img src="{{ asset('static/website/images/element/dropdown.svg') }}" alt="">
                            </div>

                            <h2 class="text-sm text-gray-700 dark:text-white">Discover more</h2>
                        </a>
                    </div>
                </div>

                <img src="{{ asset('static/website/images/blog/imageaboutus.png') }}" class="xl:ml-[134px] lg:w-1/2 w-full md:h-[650px] object-cover rounded-lg block"
                    alt="">
            </div>
        </div>
        <!-- Akhir Bagian Header -->

        <!-- Bagian Award -->
        <div class="max-w-[1296px] mx-auto md:mt-[120px] mt-10 flex flex-wrap px-5 xl:px-0">
            <h2 class="md:text-[32px] text-2xl leading-[130%] font-bold dark:text-white">
                Award-winning designs <br class="hidden lg:block"> featured by
            </h2>

            <div class="ml-auto flex gap-14 mt-3 md:mt-0">

                @foreach ($award as $key => $data)
                    <div class="w-[140px] flex flex-wrap justify-center     ">
                        <img src="{{ asset(@$data->image->sm) }}" class="h-12 w-[100px]" alt="">
                        <h2 class="text-center text-xs text-gray-700 mt-4 dark:text-white">{{ $data->name }}</h2>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Akhir Bagian Award -->

        <!-- Bagian Powerful -->
        <div class="max-w-[1296px] mx-auto mt-[122px] px-5 xl:px-0">
            <div class="flex items-center">
                <h2 class="md:text-[40px] text-[30px] font-bold dark:text-white">We are Powerful</h2>
            </div>

            <div class="w-full md:mt-10 mt-5 flex justify-between">
                <div class="w-[40%] relative hover:scale-105">
                    <div class="bg-gray-900 opacity-30 absolute h-full w-full rounded-lg"></div>
                    <div class="absolute text-white mt-6 md:ml-[33px] px-1 md:px-0">
                        <h2 class="md:text-2xl font-bold">Silicon Inc.</h2>
                        <h2 class="font-light text-xs md:text-base mt-1">Showreel by Marvin McKinney</h2>
                    </div>

                    @if (isset($gallery[0]))
                        <img src="{{ asset($gallery[0]->showImage()) }}" class="rounded-lg h-full object-cover" alt="">
                    @else
                        <img src="{{ asset('static/admin/img/default.png') }}" class="rounded-lg md:h-full h-1/2 object-cover" alt="">
                    @endif

                </div>

                <div class="w-[24%]">

                    @if (isset($gallery[1]))
                        <img src="{{ asset($gallery[1]->showImage()) }}" class="w-full md:h-[288px] h-[144px] rounded-lg hover:scale-105 object-cover"
                            alt="">
                    @else
                        <img src="{{ asset('static/admin/img/default.png') }}"
                            class="w-full md:h-[288px] h-[144px] rounded-lg hover:scale-105 object-cover" alt="">
                    @endif

                    @if (isset($gallery[2]))
                        <img src="{{ asset($gallery[2]->showImage()) }}"
                            class="w-full md:h-[288px] h-[144px] md:mt-6 mt-3 rounded-lg hover:scale-105 object-cover " alt="">
                    @else
                        <img src="{{ asset('static/admin/img/default.png') }}"
                            class="w-full md:h-[288px] h-[144px] md:mt-6 mt-3 rounded-lg hover:scale-105 object-cover " alt="">
                    @endif

                </div>

                <div class="w-[33%]">

                    @if (isset($gallery[3]))
                        <img src="{{ asset($gallery[3]->showImage()) }}" class="w-full md:h-[360px] h-[180px] md:mb-6 mb-3 hover:scale-105 object-cover rounded-lg"
                            alt="">
                    @else
                        <img src="{{ asset('static/admin/img/default.png') }}"
                            class="w-full md:h-[360px] h-[180px] md:mb-6 mb-3 hover:scale-105 object-cover rounded-lg" alt="">
                    @endif

                    @if (isset($gallery[4]))
                        <img src="{{ asset($gallery[4]->showImage()) }}" class="w-full md:h-[216px] h-[108px] hover:scale-105 object-cover rounded-lg"
                            alt="">
                    @else
                        <img src="{{ asset('static/admin/img/default.png') }}" class="w-full md:h-[216px] h-[108px] hover:scale-105 object-cover rounded-lg"
                            alt="">
                    @endif

                </div>
            </div>
        </div>
        <!-- Akhir Bagian Powerful -->


    </div>
@endsection

{{-- @section('title')
Tentang Kami - {{@$about->title}}
@stop

@section('styles')
<style type="text/css">
    @media (min-width: 1200px) {
        .col-lg-1-5 {
            width: 20%;
        }
    }

    @media (min-width: 992px) {
        .col-md-1-5 {
            width: 20%;
        }
    }

    @media (min-width: 768px) {
        .col-sm-1-5 {
            width: 20%;
        }
    }
</style>
@endsection
@section('content')
<section class="page-section-ptb gray-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="section-title text-center">
                    <h6>{{ @$about->title }}</h6>
                    <h2 class="title-effect">Tentang Kami</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="testimonial bottom_pos light section-title line lef mb-20">
                    <p class="mt-30">{!! @$about->description !!}</p>
                </div>
            </div>
            <div class="col-lg-6 sm-mt-50">
                <div class="clients-list clients-border column-3">
                    <img class="img-fluid" src="{{ @$setting->firstWhere('key','ogimage')->value }}" alt="{{ @$about->title }}" title="{{ @$about->title }}">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="white-bg page-section-ptb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="text-center">
                    <h2 class="mb-30">Klien Kami</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($client as $result)
            <div class="col-md-1-5 col-lg-1-5 col-sm-1-5 col-xs-6 sm-mb-30">
                <div class="team mb-30" style="padding: 0 5px;">
                    <img class="img-fluid mx-auto" src="{{asset($result->image->sm)}}" alt="{{$result->name}}" title="{{$result->name}}">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@stop --}}
