@extends('website.layout')


@section('content')
    <div class="max-w-[1920px] ">

        <style>
            iframe{
                width: 100%;
                height: 300px;
            }

            @media (min-width:740px){
                iframe{
                    width: 65%;
                }
            }

            @media (min-width:1023px){
                iframe{
                    width: 536px;
                    height: 450px;
                }
            }

            @media (min-width: 10280px){
                iframe{
                    width: 636px;
                    height: 550px;
                }
            }
        </style>

        <!-- Bagian Contact -->
        <div class="bg-gray-100 max-w-[1920px] dark:bg-slate-900 px-5 xl:px-0">
            <div class="max-w-[1296px] mx-auto flex flex-wrap md:flex-nowrap lg:pt-[142px] pt-16 pb-[132px]">
                <div class="">
                    <h2 class="text-[28px] font-bold dark:text-white">Want to work with us?</h2>
                    <h2 class="mt-2 lg:text-[80px] text-[44px] font-bold text-blue-600">Let's Talk!</h2>
                    <a href="mailto:{!! @$setting->firstWhere('key', 'email')->value !!}" class="hover:text-blue-500">
                        <h2 class="lg:mt-20 mt-5 text-2xl underline dark:text-white">{!! @$setting->firstWhere('key', 'email')->value !!}</h2>
                    </a>
                    <h2 class="mt-6 text-2xl text-gray-800 dark:text-white">+{!! @$setting->firstWhere('key', 'phone')->value !!}</h2>
                </div>

                <div class="xl:ml-[244px] md:w-1/2 w-full mt-10 ml-auto md:mt-0">
                    <form class="" role="form" method="post" action="{{ route('contact.store') }}">
                        {{ csrf_field() }}
                        <div class="grid grid-cols-2 gap-6 mb-6">
                            <div class="">
                                <label for="name" class="font-semibold mb-1 dark:text-white">Full Name</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    class="w-full h-[52px] rounded-lg outline-none mt-1">
                            </div>
                            <div class="">
                                <label for="email" class="font-semibold mb-1 dark:text-white">Email</label>
                                <input type="text" id="email" name="email" value="{{ old('email') }}"
                                    class="w-full h-[52px] rounded-lg outline-none mt-1">
                            </div>
                        </div>

                        <label for="description" class="font-semibold mb-1 dark:text-white">Message</label>

                        <textarea name="description" id="description" class="w-full h-[90px] outline-none rounded-lg mt-1"></textarea>
                        <button id="submit" name="submit" type="submit" value="Send"
                            class="bg-[#6366F1] mt-10 text-white font-semibold px-8 py-[13px] rounded-lg hover:opacity-90">Contact
                            Us</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir Bagian Contact -->

        <!-- Bagian Map -->
        <div class="max-w-[1296px] mx-auto md:py-[120px] py-14 flex items-center flex-wrap px-5 lg:px-[55px] ">
            {!! @$setting->firstWhere('key', 'gmaps')->value !!}



            <div class="xl:ml-[134px] md:ml-20 ml-5 mt-5 md:mt-0">
                <h2 class="text-2xl font-bold dark:text-white">Medical Center</h2>
                <ul class="space-y-[18px] mt-6">
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('static/website/images/element/bx-map.png') }}" class="w-5 h-5" alt="">
                        <h2 class="text-gray-700 dark:text-slate-300">{!! @$setting->firstWhere('key', 'address')->value !!}</h2>
                    </li>

                    <li class="flex items-center gap-2">
                        <img src="{{ asset('static/website/images/element/bx-phone-call.png') }}" class="w-5 h-5"
                            alt="">
                        <h2 class="text-gray-700 dark:text-slate-300">+{!! @$setting->firstWhere('key', 'phone')->value !!}</h2>
                    </li>

                    <li class="flex items-center gap-2">
                        <img src="{{ asset('static/website/images/element/bx-envelope.png') }}" class="w-5 h-5 "
                            alt="">
                        <a href="mailto:{!! @$setting->firstWhere('key', 'email')->value !!}">
                            <h2 class="text-gray-800 underline dark:text-slate-400">{!! @$setting->firstWhere('key', 'email')->value !!}</h2>
                        </a>
                    </li>
                </ul>

                <ul class="ml-auto flex gap-4 mt-[72px]">
                    @foreach ($SocialMedia as $key => $data)
                        <li> <a href="{{ $data->url }}">
                                <button class="lg:p-[9px] p-[9px] md:p-0 bg-[#EFF2FC] rounded hover:bg-gray-200"><img
                                        src="assets/icon/fb.svg" alt="" class="lg:w-[15px] lg:h-[15px] w-5 h-5">
                                </button>
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
        <!-- Akhir Bagian Map -->



    </div>
@endsection
{{-- @section('title')
 Hubungi Kami - {{@$about->title}}
@stop

@section('scripts')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@stop

@section('content')
    <section class="page-section-pt">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title line center text-center">
                        <h6 class="subtitle">{{@$about->title}} </h6>
                        <h2 class="title">Hubungi Kami</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=================================
    page-title -->

    <section class="page-section-pt white-bg contact-3 o-hidden clearfix">
        <div class="container mb-50">
            <div class="row justify-content-end">
                <div class="col-lg-7">
                    {!! @$setting->firstWhere('key','gmaps')->value !!}
                </div>
                <div class="col-lg-5">
                    <div class="contact-3-info">
                        <div class="clearfix">
                            <div class="section-title mb-0">
                                <h6>{{@$about->title}}</h6>
                                <h2 class="title-effect">Hubungi Kami</h2>
                            </div>
                            <div id="formmessage">Success/Error Message Goes Here</div>
                            <form role="form" method="post" action="{{ route('contact.store') }}">
                                {{ csrf_field() }}
                                @if (Session::has('status'))
                                    <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
                                @endif
                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger" role="alert">{{ $error }}</div>
                                    @endforeach
                                @endif
                                <div class="contact-form clearfix">
                                    <div class="section-field">
                                        <input id="name" type="text" placeholder="Name*" class="form-control"  name="name" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="section-field">
                                        <input type="email" placeholder="Email*" class="form-control" name="email" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="section-field">
                                        <input type="text" placeholder="Phone*" class="form-control" name="phone" value="{{ old('phone') }}" required>
                                    </div>
                                    <div class="section-field textarea">
                                        <textarea class="input-message form-control" placeholder="Comment*"  rows="7" name="description" required>{{ old('description') }}</textarea>
                                    </div>
                                    <!-- Google reCaptch-->
                                    <!-- <div class="g-recaptcha section-field clearfix" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div> -->
                                    <div class="section-field submit-button">
                                        <input type="hidden" name="action" value="sendEmail"/>
                                        <button id="submit" name="submit" type="submit" value="Send" class="button"><span> Send message </span> <i class="fa fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop --}}
