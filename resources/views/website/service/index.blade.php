@extends('website.layout')

@section('content')
    <div class="max-w-[1920px]">



        <!-- Bagian Content -->
        <div class="max-w-[1296px] mx-auto">

            <div class="flex flex-wrap items-center mt-[30px]">
                <h2 class="text-[40px] mx-auto mb-2 lg:mb-0 lg:mx-0 font-bold w-full md:w-fit text-center dark:text-white">Courses</h2>

            </div>

            <div class="mt-10 flex flex-wrap justify-evenly mb-10 px-5 lg:px-0">

              @foreach ($course as $key => $data)
                  
                <div class="lg:w-[32%] md:w-[48%] w-full mb-10 shadow dark:shadow-slate-600 pb-6">
                    <div class="w-full">
                        <div class="relative">
                            <img src="{{ asset(@$data->image->sm) }}" class="rounded w-full object-cover h-[240px]"
                                alt="">
                            <div class="absolute top-[25px] right-[25px] w-fit">
                                <a href="">
                                    <div class="p-[9px] rounded-full bg-white hover:bg-slate-200">
                                        <img src="{{ asset('static/website/images/element/bookmark.png') }}" class=" w-[18px] h-[18px] " alt="">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="px-6 mt-6 mx-auto space-y-2">
                        <h2 class="text-xl font-bold leading-[140%] dark:text-white">{{ $data->title }}</h2>
                        <p class=" text-gray-600 w-full dark:text-white">{{ str_limit(strip_tags($data->description), 110, '...') }}</p>
                        
                    </div>
                </div>

                
              @endforeach

                

                
            </div>

        </div>
        <!-- Akhir Bagian Content -->

          {{-- <!-- Bagian Get Started -->
          <div class="max-w-[1920px] bg-gray-200">
              <div class="max-w-[1296px] mx-auto flex items-center px-[110px] py-8 flex-wrap md:flex-nowrap">
                  <div class="w-[526px] mr-6 flex flex-wrap justify-center mb-4 md:mb-0 md:justify-normal">
                      <h2 class="text-2xl text-gray-700 mb-4 text-center md:text-left">
                          Ready to get started?
                      </h2>
                      <h2 class="text-[40px] font-bold mb-10 leading-[130%] text-center md:text-left">
                          Take Your <span class="text-[#6366F1]">Skills</span> to the <br>Next Level
                      </h2>
                      <button class="text-white bg-[#6366F1] px-8 py-[13px] rounded-lg">Work with us</button>
                  </div>
                  <div class="lg:px-[76px] px-5 py-3 ml-auto">
                      <img src="assets/image/groupGetReady.png" alt="">
                  </div>
              </div>
          </div>
          <!-- Akhir Bagian Get Started --> --}}


    </div>
@endsection
