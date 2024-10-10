@extends('website.layout')

@section('content')
    <div class="max-w-[1920px] px-5 lg:px-0">



        <!-- Bagian Content -->
        <div class="max-w-[1296px] mx-auto mb-[120px] px-5 xl:px-0">
            <div class="flex items-center mt-8">
                <h2 class="text-[40px] font-bold md:ml-16 lg:ml-0 dark:text-white">List View</h2>

            </div>

            <div class="mt-10">

                @foreach ($models as $key => $data)
                    @if ($key % 2 == 0)
                        <div class="flex gap-[96px] flex-wrap  lg:flex-nowrap lg:justify-normal justify-center mb-[96px]">
                            <img src="{{ asset($data->showImage()) }}"
                                class="md:min-w-[600px] w-full max-w-[600px] h-[400px] object-cover rounded-lg" alt="">
                            <div class="text-center lg:text-left">
                                <h2 class="text-gray-600 text-sm dark:text-white">
                                    Oct 18, 2021
                                </h2>
                                <h2 class="text-[28px] font-bold mt-1 dark:text-white">
                                    {{ $data->title }}
                                </h2>
                                <p class="text-gray-700 mt-4 desk dark:text-white">
                                    {{ $data->description }}
                                </p>

                                <h2></h2>
                            </div>

                        </div>
                    @else
                        <div
                            class="flex gap-[96px] flex-wrap flex-row-reverse lg:flex-nowrap lg:justify-normal justify-center mb-[96px]">
                            <img src="{{ asset($data->showImage()) }}"
                                class="md:min-w-[600px] w-full max-w-[600px] h-[400px] object-cover rounded-lg" alt="">
                            <div class="text-center lg:text-left">
                                <h2 class="text-gray-600 text-sm dark:text-white">
                                    Oct 18, 2021
                                </h2>
                                <h2 class="text-[28px] font-bold mt-1 dark:text-white">
                                    {{ $data->title }}
                                </h2>
                                <p class="text-gray-700 mt-4 desk dark:text-white">
                                    {{ $data->description }}
                                </p>

                                <h2></h2>
                            </div>

                        </div>
                    @endif
                @endforeach
            </div>
        </div>
        <!-- Akhir Bagian Content -->
    </div>
@endsection
