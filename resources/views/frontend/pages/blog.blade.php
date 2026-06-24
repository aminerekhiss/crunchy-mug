@extends('frontend.layouts.master')
@section('title', __('messages.crunchy_mug'))
@section('main-content')

<!-- Blog Section avec Breadcrumb intégré -->
<section class="blog-single shop-blog grid section blog-background">
    <div class="container">
        <!-- Breadcrumb intégré -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="bread-inner text-white">
                    <ul class="bread-list d-flex gap-2 flex-wrap align-items-center">
                        <li><a href="{{route('home')}}" class="text-white">{{ __('messages.home') }} <i class="ti-arrow-right text-white"></i></a></li>
                        <li class="active text-white">{{ __('messages.blog_grid_with_sidebar') }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Main Blog Content -->
            <div class="col-lg-8 col-12">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="shop-single-blog">
                                <img src="{{$post->photo}}" alt="{{$post->title}}">
                                <div class="content">
                                    <p class="date">
                                        <i class="fa fa-calendar"></i> {{$post->created_at->format('d M, Y. D')}}
                                        <span class="float-right">
                                            <i class="fa fa-user"></i> {{$post->author_info->name ?? __('messages.anonymous')}}
                                        </span>
                                    </p>
                                    <a href="{{route('blog.detail',$post->slug)}}" class="title">{{$post->title}}</a>
                                    <p>{!! html_entity_decode($post->summary) !!}</p>
                                    <a href="{{route('blog.detail',$post->slug)}}" class="more-btn">{{ __('messages.read_more') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12 text-center mt-4">
                        {{-- Pagination --}}
                        {{-- {{$posts->appends($_GET)->links()}} --}}
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-12">
                <div class="main-sidebar">
                    <!-- Search -->
                    <div class="single-widget search">
                        <form class="form" method="GET" action="{{route('blog.search')}}">
                            <input type="text" placeholder="{{ __('messages.search_here') }}" name="search">
                            <button class="button" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>

                    <!-- Categories -->
                    <div class="single-widget category">
                        <h3 class="title">{{ __('messages.blog_categories') }}</h3>
                        <ul class="categor-list">
                            @foreach(Helper::postCategoryList('posts') as $cat)
                                <li><a href="{{route('blog.category',$cat->slug)}}">{{$cat->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Recent Posts -->
                    <div class="single-widget recent-post">
                        <h3 class="title">{{ __('messages.recent_articles') }}</h3>
                        @foreach($recent_posts as $post)
                            <div class="single-post">
                                <div class="image">
                                    <img src="{{$post->photo}}" alt="{{$post->title}}">
                                </div>
                                <div class="content">
                                    <h5><a href="{{route('blog.detail', $post->slug)}}">{{$post->title}}</a></h5>
                                    <ul class="comment">
                                        <li><i class="fa fa-calendar"></i> {{$post->created_at->format('d M, y')}}</li>
                                        <li><i class="fa fa-user"></i> {{$post->author_info->name ?? __('messages.anonymous')}}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Tags -->
                    <div class="single-widget side-tags">
                        <h3 class="title">{{ __('messages.tags') }}</h3>
                        <ul class="tag">
                            @foreach(Helper::postTagList('posts') as $tag)
                                <li><a href="{{route('blog.tag',$tag->title)}}">{{$tag->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</section>
@endsection
@push('styles')
<style>
    .newsletter-transparent * {
            background: transparent !important;
            box-shadow: none !important;
        }
        /* Footer styling */
        body.page-about-us footer p {
            color: #fff !important;
        }
        footer, .footer, .site-footer {
            background: linear-gradient(
                112deg,
                #fdf6c3 0%,
                #b3ecff 11%,
                #fde6c4 27%,
                #b9e3be 47%,
                #fab8e8 67%,
                #fffbea 81%,
                #ffe0f5 100%
            );
            color: #131313 !important;
            font-size: 1.13rem;
            font-weight: 500;
            padding: 2.3rem 0 1.7rem 0;
            text-align: center;
            border-top: 3px solid #f5ae41;
            box-shadow: 0 -2px 24px 0 rgba(60, 60, 60, 0.09);
            border-radius: 2.5rem 2.5rem 0 0;
            letter-spacing: 0.01em;
        }
        .footer a, .site-footer a {
            color: #b9217b;
            text-decoration: underline dotted;
            background: linear-gradient(90deg,#ffe0f5 0%,#fab8e8 100%);
            border-radius: .8rem;
            padding: 0.22em 0.7em;
            transition: color 0.18s, background 0.22s;
            font-weight: 600;
            margin: 0 0.17em;
        }
        .footer a:hover, .site-footer a:hover {
            color: #127fbf;
            background: linear-gradient(90deg,#fffbea 0%,#b3ecff 100%);
            text-decoration: underline wavy;
        }
        .footer-social {
            margin-top: 1.1rem;
        }
        .footer-social a {
            display: inline-block;
            margin: 0 0.5rem;
            color: #27ae60;
            font-size: 1.45rem;
            border-radius: 100%;
            background: linear-gradient(135deg,#ffe0f5 0%,#b9e3be 100%);
            padding: 0.25rem;
            box-shadow: 0 2px 12px 0 rgba(186, 35, 123, 0.10);
            transition: color 0.15s, background 0.18s, box-shadow 0.18s;
        }
        .footer-social a:hover {
            color: #b9217b;
            background: linear-gradient(135deg,#b9e3be 0%,#fab8e8 100%);
            box-shadow: 0 4px 20px 0 rgba(111,72,170,0.15);
        }
     .w-56 {
    width: 14rem;
}
.gap-4 {
    gap: 1rem;
}

.justify-between {
    justify-content: space-between;
}

.items-center {
    align-items: center;
}
.flex-wrap {
    flex-wrap: wrap;
}
.flex {
    display: flex
;
}
.h-56 {
    height: 14rem;
}

.mr-4 {
    margin-right: 1rem;
}
.mr-4, .mx-4 {
    margin-right: 1.5rem !important;
}
.bread-inner ul {
    background: transparent;
    padding: 0;
    margin: 0;
    font-weight: 500;
    font-size: 1.1rem;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.4);
}

.bread-inner ul li,
.bread-inner ul li a {
    color: #fff !important;
}

    .blog-background {
        background: linear-gradient(to bottom, rgba(0,0,0,0.4), rgba(0,0,0,0.2)), url('{{ asset('images/image7.jpg') }}') center center/cover no-repeat;
        padding: 60px 0;
    }

    .shop-single-blog {
        background: rgba(255, 255, 255, 0.96);
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        margin-bottom: 30px;
        transition: 0.3s;
    }

    .shop-single-blog:hover {
        transform: translateY(-6px);
    }

    .shop-single-blog img {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .shop-single-blog .content {
        padding: 20px;
        color: #333;
    }

    .shop-single-blog .title {
        font-size: 20px;
        font-weight: bold;
        color: #b9217b;
    }

    .shop-single-blog .more-btn {
        margin-top: 10px;
        padding: 8px 15px;
        border-radius: 8px;
        background: linear-gradient(135deg, #ffe0f5, #fab8e8);
        color: #b9217b;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .shop-single-blog .more-btn:hover {
        background: linear-gradient(135deg, #fab8e8, #b9e3be);
        color: #127fbf;
    }

    .main-sidebar .single-widget {
        background: rgba(255, 255, 255, 0.96);
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 25px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.08);
    }

    .main-sidebar .title {
        font-size: 18px;
        font-weight: bold;
        color: #222;
        border-bottom: 2px dotted #fab8e8;
        padding-bottom: 6px;
        margin-bottom: 15px;
    }

    .main-sidebar .single-post {
        display: flex;
        gap: 12px;
        margin-bottom: 15px;
    }

    .main-sidebar .single-post .image img {
        width: 70px;
        height: 70px;
        object-fit: cover;
        border-radius: 6px;
    }

    .main-sidebar input[type="text"],
    .main-sidebar input[type="email"] {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        margin-top: 10px;
    }

    .main-sidebar button.btn {
        background: linear-gradient(135deg, #b9e3be, #ffe0f5);
        color: #127fbf;
        font-weight: 600;
        padding: 10px;
        border: none;
        border-radius: 8px;
        margin-top: 10px;
        transition: 0.3s;
        width: 100%;
    }

    .main-sidebar button.btn:hover {
        background: linear-gradient(135deg, #ffe0f5, #fab8e8);
        color: #b9217b;
    }
</style>
@endpush

