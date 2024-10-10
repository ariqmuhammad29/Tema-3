<div class="max-w-[1296px] mx-auto pt-[110px] flex flex-wrap pb-16 px-5 xl:px-0 justify-center lg:justify-normal">
    <div class="lg:w-[33%] mb-10 lg:mb-0">
        <div class="flex items-center gap-[7.5px]">
            <img src="{{ asset('storage/' . @$setting->firstWhere('key', 'logo')->value) }}" alt=""
                class="max-w-[47px] max-h-[47px]">
            <h2 class="font-bold text-[20px] dark:text-white">{!! @$setting->firstWhere('key', 'name')->value !!}</h2>
        </div>
        <p class="mt-6 text-sm leading-[160%] text-slate-500 dark:text-white">
            Proin ipsum pharetra, senectus eget scelerisque varius pretium platea velit. Lacus, eget eu vitae
            nullam proin turpis etiam mi sit. Non feugiat feugiat egestas nulla nec. Arcu tempus, eget elementum
            dolor ullamcorper sodales ultrices eros.
        </p>
        <h2 class="mt-10 text-sm font-bold leading-[160%] dark:text-white">Subscribe to our newsletter</h2>
        <form role="form" method="post" action="{{ route('footer.store') }}" class="flex items-center mt-2 w-full">
            {{ csrf_field() }}
            <div class="flex items-center pl-4 py-[11px] border-[1px] border-gray-300 w-[70%] rounded-l-md gap-2">
                <img src="{{ asset('static/website/images/element/bx-envelope.png') }}" alt="" class="w-5 h-5 ">
                <input type="email" name="email" value="{{ old('email') }}" placeholder="Your Email"
                    class="outline-none p-0 text-sm border-none w-[80%] bg-transparent dark:placeholder:text-slate-300">
            </div>
            <button id="submit" name="submit" type="submit" value="send"
                class="bg-[#6366F1] w-[33%] py-[11px] -ml-1
                     rounded-r-md text-sm font-semibold leading-[160%] text-white">Subscribe</button>
        </form>
    </div>
    <div class="lg:w-[40%] lg:ml-[220px] w-full flex flex-wrap ">
        <div class=" flex w-full">
            <div class="flex flex-col space-y-2 w-[30%]">
                <a href="{{ route('landing.index') }}"
                    class="text-sm leading-[160%] hover:text-blue-600 font-semibold dark:text-white">Home</a>
                <a href="{{ route('about.index') }}"
                    class="text-sm leading-[160%] hover:text-blue-600 font-semibold dark:text-white">About Us</a>
                <a href="{{ route('course.index') }}"
                    class="text-sm leading-[160%] hover:text-blue-600 font-semibold dark:text-white">Courses</a>
                <a href="{{ route('gallery.photo') }}"
                    class="text-sm leading-[160%] hover:text-blue-600 font-semibold dark:text-white">Gallery</a>
                <a href="{{ route('article.index') }}"
                    class="text-sm leading-[160%] hover:text-blue-600 font-semibold dark:text-white">Blog</a>
                <a href="{{ route('contact.index') }}"
                    class="text-sm leading-[160%] hover:text-blue-600 font-semibold dark:text-white">Contact Us</a>
            </div>

            <div class="flex flex-col space-y-2 w-[30%]">
                @foreach ($SocialMedia as $data)
                    <a href="{{ $data->url }}"
                        class="text-sm leading-[160%] hover:text-blue-600 font-semibold capitalize dark:text-white">{{ $data->type }}</a>
                @endforeach
            </div>

            <div class="w-[30%] ">
                <h2 class="text-sm font-semibold dark:text-white">Contact Us</h2>
                <a href="mailto:{!! @$setting->firstWhere('key', 'email')->value !!}" class="text-blue-700 underline dark:text-white">{!! @$setting->firstWhere('key', 'email')->value !!}</a>
            </div>
        </div>
        <div class="flex flex-col lg:mt-10 mt-2 lg:text-left lg:mx-0 space-y-2 mx-auto text-center">
            <a href="" class="text-sm leading-[160%] hover:text-blue-600 font-semibold dark:text-white">Terms & Conditions</a>
            <a href="" class="text-sm leading-[160%] hover:text-blue-600 font-semibold dark:text-white">Privacy Policy</a>
        </div>
    </div>
    <h2 class="mt-[72px] text-xs leading-[160%] text-slate-400 dark:text-white">2021. All rihgts reserved. Silicon Template</h2>
</div>
