@extends('website.layout')

@section('content')
    <div class="max-w-[1296px] mx-auto pt-[94px] px-5 xl:px-0">
        <h2 class="text-[40px] font-bold leading-[130%] text-gray-900 dark:text-white">
            {{ $model->category->name }}
        </h2>

        <p class="leading-[160%] text-gray-700 mt-16 dark:text-white">{{ $model->category->description }}</p>

        <img src="{{ asset($model->image->sm) }}" class=" w-full h-fit mt-8" alt="">

        <p class=" leading-[160%] text-gray-700 mt-16 dark:text-white">{{ $model->description }}</p>

    </div>

    <div class=" bg-gray-100 dark:bg-slate-900">
        <div class="max-w-[1296px] mx-auto pt-[52px] mt-[68px] pb-[124px] px-5 xl:px-0">
            <div class="flex items-center">
                <h2 class="md:text-[40px] text-2xl font-bold dark:text-white">More News</h2>
                <a href="{{ route('article.index') }}"
                    class="text-[#6366F1] ml-auto md:px-8 px-6 md:py-[13px] py-2 border-[1px] text-sm md:text-base  border-gray-300 rounded-lg font-semibold">
                    All blog ->
                </a>
            </div>

            <div class="grid lg:grid-cols-3 grid-cols-1 md:grid-cols-2  gap-6 mt-10">
                @foreach ($article as $key => $data)
                    <div class=" overflow-hidden rounded-lg bg-white dark:bg-slate-700 shadow-md">
                        <a href="{{ route('article.show', $data->slug) }}">
                            <div class="w-fit">
                                <div class="relative">
                                    <img src="{{ asset($data->image->sm) }}" class="w-full h-[300px] object-cover"
                                        alt="">
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

                            <h2 class="text-xl font-bold leading-[140%] h-[90px] px-6 mt-10 dark:text-white">
                                {{ str_limit(strip_tags($data->category->name), 100, '...') }}</h2>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection


{{-- @section('title')
    {{ @$model->title }}
@stop

@section('meta')
    <meta name="keywords" content="{{ @$model->category->name }}" />
    <meta name="description" content="{!! $model->description !!}" />
    <meta name="author" content="{{ @$model->user->name }}" />
    <meta property="og:image" content="{{ asset($model->image->lg) }}">
@stop

@section('styles')
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
    <link type="text/css" rel="stylesheet"
        href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
@stop

@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>

    <script>
        $("#share").jsSocials({
            showLabel: false,
            showCount: false,
            shares: ["twitter", "facebook", "pinterest"]
        });
    </script>
@stop

@section('content')

    <section class="blog white-bg page-section-ptb">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="section-title text-center">
                        <h6>{{ @$about->title }}</h6>
                        <h2 class="title-effect">Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 sm-mb-30">
                    <div class="sidebar-widget">
                        <h6 class="mb-20">Search</h6>
                        <div class="widget-search">
                            <form action="{{ route('article.search') }}" method="get">
                                <i class="fa fa-search"></i>
                                <input type="search" name="slug" class="form-control" placeholder="Search...." />
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget">
                        <h6 class="mt-40 mb-20">Recent Posts </h6>
                        @foreach ($recentPosts as $recentPost)
                            <div class="recent-post clearfix">
                                <div class="recent-post-image">
                                    <img class="img-fluid" src="{{ asset($recentPost->image->sm) }}"
                                        alt="{{ $recentPost->title }}" title="{{ $recentPost->title }}">
                                </div>
                                <div class="recent-post-info">
                                    <a href="{{ route('article.show', $recentPost->slug) }}">{{ $recentPost->title }}</a>
                                    <span><i class="fa fa-calendar-o"></i>
                                        {{ $recentPost->created_at->format('d F Y') }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="sidebar-widget clearfix">
                        <h6 class="mt-40 mb-20">Category</h6>
                        <ul class="widget-categories">
                            @foreach ($categoryArticles as $categoryArticle)
                                <li><a href="{{ route('article.index', $categoryArticle->slug) }}"><i
                                            class="fa fa-angle-double-right"></i> {{ $categoryArticle->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- ========================== -->
                <div class="col-lg-9">
                    <div class="blog-entry mb-50">
                        <div class="entry-image clearfix">
                            <img class="img-fluid" src="{{ asset($model->image->lg) }}" alt="{{ $model->title }}"
                                title="{{ $model->title }}">
                        </div>
                        <div class="blog-detail">
                            <div class="entry-title mb-10">
                                <a href="javascript:void(0);">{{ $model->title }}</a>
                            </div>
                            <div class="entry-meta mb-10">
                                <ul>
                                    <li><i class="fa fa-folder-open-o"></i> <a
                                            href="{{ route('article.index', $model->category->slug) }}">
                                            {{ $model->category->name }} </a> </li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-user-o"></i> by
                                            {{ @$model->user_id != null ? @$model->user->name : 'admin' }}</a></li>
                                    <li><a href="javascript:void(0);"><i class="fa fa-calendar-o"></i>
                                            {{ $model->published_at->format('l, d F Y H:i') }}</a></li>
                                </ul>
                            </div>
                            <div class="entry-content text-justify">
                                {!! $model->description !!}
                            </div>
                            <div class="entry-share clearfix">
                                <div class="social list-style-none float-right">
                                    <strong>Share to your friends </strong>
                                    <div id="share"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop --}}
