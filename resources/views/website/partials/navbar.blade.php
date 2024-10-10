<div class="dark:bg-slate-700">
    <div class="flex items-center gap-2 lg:py-2 py-0 max-w-[1296px] mx-auto px-5 xl:px-0 ">
        <style type="text/tailwindcss">
            #toggle-dark:checked~label div.toggle-circle {
                @apply translate-x-6
            }
        </style>

        <img src="{{ asset('storage/' . @$setting->firstWhere('key', 'logo')->value) }}" alt=""
            class="w-[47px] h-[44px]">

        <ul class="lg:flex items-center gap-6 ml-8 hidden">
            <li><a href="{{ route('landing.index') }}"
                    class="font-semibold text-slate-700 dark:text-white hover:text-slate-500">Home</a>
            </li>
            <li><a href="{{ route('about.index') }}"
                    class="font-semibold text-slate-700 dark:text-white hover:text-slate-500">About
                    Us</a>
            </li>
            <li><a href="{{ route('course.index') }}"
                    class="font-semibold text-slate-700 dark:text-white hover:text-slate-500">Courses</a>
            </li>
            <li><a href="{{ route('gallery.photo') }}"
                    class="font-semibold text-slate-700 dark:text-white hover:text-slate-500">Gallery</a>
            </li>
            <li><a href="{{ route('article.index') }}"
                    class="font-semibold text-slate-700 dark:text-white hover:text-slate-500">Blog</a>
            </li>
            <li><a href="{{ route('contact.index') }}"
                    class=" font-semibold text-slate-700 dark:text-white hover:text-slate-500">Contact
                    Us</a></li>
        </ul>
        <div class="flex items-center ml-auto gap-4">
            <div class="flex gap-4 items-center text-gray-600 font-semibold">
                <span class=" dark:text-white">Light</span>
                <input type="checkbox" name="" id="toggle-dark" class="hidden">
                <label for="toggle-dark" class="cursor-pointer">
                    <div class="w-[46px] h-6 rounded-full bg-[#6366F1] flex items-center px-0.5">
                        <div class="w-5 h-5 rounded-full bg-white toggle-circle"></div>
                    </div>
                </label>
                <span class=" dark:text-white">Dark</span>
            </div>

            <a href="">
                <button
                    class="items-center text-sm gap-2 font-semibold border-[1px] py-[9px] px-5 rounded text-[#6366F1] dark:text-white hidden lg:flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" 
                        fill="">
                        <path d="M9.75 12L13.5 9L9.75 6V8.25H3V9.75H9.75V12Z" fill="#6366F1" />
                        <path
                            d="M15 2.25H8.25C7.42275 2.25 6.75 2.92275 6.75 3.75V6.75H8.25V3.75H15V14.25H8.25V11.25H6.75V14.25C6.75 15.0773 7.42275 15.75 8.25 15.75H15C15.8273 15.75 16.5 15.0773 16.5 14.25V3.75C16.5 2.92275 15.8273 2.25 15 2.25Z"
                            fill="#6366F1" />
                    </svg>
                    Sign In
                </button>
            </a>
            <a href="">
                <button
                    class="lg:flex items-center text-sm gap-2 font-semibold py-[9px] px-5 rounded bg-[#6366F1] text-white hidden">
                    <img src="{{ asset('static/website/images/element/icon-signup.png') }}" alt="">
                    Sign Up
                </button>
            </a>
        </div>
        <button id="dropdownButton" class="p-4 lg:hidden text-black relative z-20">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                class="w-6 h-6 dark:text-black">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>


            <ul id="dropdownList" class="hidden bg-white shadow-xl mt-2 w-40 rounded-2xl absolute right-0">
                <div class="m-1 space-y-2">
                    <li>
                        <a class="text-slate-500 hover:text-[#007A98] hover:font-bold" href="">Courses</a>
                    </li>
                    <li>
                        <a class="text-slate-500 hover:text-[#007A98] hover:font-bold" href="/contact/index">How It
                            Works</a>
                    </li>
                    <li>
                        <a class="text-slate-500 hover:text-[#007A98] hover:font-bold" href="">What Students
                            Say</a>
                    </li>
                    <li>
                        <a class="text-slate-500 hover:text-[#007A98] hover:font-bold" href="">Contact</a>
                    </li>
                    <hr>
                    <li class="flex gap-2 w-full justify-center">
                        <a class="text-slate-500 font-semibold hover:text-[#007A98] hover:font-bold" href="">Sign
                            In</a>
                        <a class="text-slate-500 font-semibold hover:text-[#007A98] hover:font-bold" href="">Sign
                            Up</a>
                    </li>
                    <li>

                    </li>
                </div>
            </ul>
        </button>
    </div>
</div>
