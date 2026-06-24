@extends('frontend.layouts.master')

@section('title', __('messages.crunchy_mug'))

@section('main-content')
<style>
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
        .comment-form textarea {
    background-color: #f5f5f5;
    color: #333;
    border: 2px solid #ddd;
    border-radius: 10px;
    padding: 1rem;
    font-size: 1.1rem;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
    resize: vertical;
}
.comment-form textarea:focus {
    border-color: #f5ae41;
    box-shadow: 0 0 8px rgba(245, 174, 65, 0.3);
    outline: none;
}

.comment-form label {
    font-weight: bold;
    margin-bottom: 0.5rem;
    display: block;
    color: #444;
}

.comment-form button.btn {
    background-color: #f5ae41;
    color: white;
    padding: 0.8rem 1.8rem;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    transition: background 0.3s ease;
}
.comment-form button.btn:hover {
    background-color: #e29620;
}

/* Espacement entre les commentaires */
.comments .comment-list {
    margin-top: 2rem;
    border-top: 1px dashed #ccc;
    padding-top: 1.5rem;
}
        
</style>
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">{{ __('messages.home') }}<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">{{ __('messages.blog_article') }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Blog Single -->
    <section class="blog-single section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="blog-single-main">
                        <div class="row">
                            <div class="col-12">
                                <div class="image">
                                    <img src="{{$post->photo}}" alt="{{$post->photo}}">
                                </div>
                                <div class="blog-detail">
                                    <h2 class="blog-title">{{$post->title}}</h2>
                                    <div class="blog-meta">
                                        <span class="author">
                                            <a href="javascript:void(0);"><i class="fa fa-user"></i>{{ __('messages.by') }} {{$post->author_info['name'] ?? __('messages.anonymous') }}</a>
                                            <a href="javascript:void(0);"><i class="fa fa-calendar"></i>{{$post->created_at->format('d M, Y')}}</a>
                                            <a href="javascript:void(0);"><i class="fa fa-comments"></i>{{ __('messages.comments') }} ({{$post->allComments->count()}})</a>
                                        </span>
                                    </div>
                                    <div class="sharethis-inline-reaction-buttons"></div>
                                    <div class="content">
                                        @if($post->quote)
                                        <blockquote> <i class="fa fa-quote-left"></i> {!! ($post->quote) !!}</blockquote>
                                        @endif
                                        <p>{!! ($post->description) !!}</p>
                                    </div>
                                </div>
                                <div class="share-social">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="content-tags">
                                                <h4>{{ __('messages.tags') }} :</h4>
                                                <ul class="tag-inner">
                                                    @php
                                                        $tags=explode(',',$post->tags);
                                                    @endphp
                                                    @foreach($tags as $tag)
                                                    <li><a href="javascript:void(0);">{{$tag}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @auth
                            <div class="col-12 mt-4">
                                <div class="reply">
                                    <div class="reply-head comment-form" id="commentFormContainer">
                                        <h2 class="reply-title">{{ __('messages.leave_a_comment') }}</h2>
                                        <!-- Comment Form -->
                                        <form class="form comment_form" id="commentForm" action="{{route('post-comment.store',$post->slug)}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                {{-- Champs name/email commentés --}}
                                                <div class="col-12">
                                                    <div class="form-group  comment_form_body">
                                                        <label>{{ __('messages.your_message') }}<span>*</span></label>
                                                        <textarea name="comment" id="comment" rows="10" placeholder=""></textarea>
                                                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                                        <input type="hidden" name="parent_id" id="parent_id" value="" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group button">
                                                        <button type="submit" class="btn">
                                                            <span class="comment_btn comment">{{ __('messages.post_comment') }}</span>
                                                            <span class="comment_btn reply" style="display: none;">{{ __('messages.reply_to_comment') }}</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Comment Form -->
                                    </div>
                                </div>
                            </div>

                            @else
                            <p class="text-center p-5">
                                {{ __('messages.you_must') }} <a href="{{route('login.form')}}" style="color:rgb(54, 54, 204)">{{ __('messages.login') }}</a> {{ __('messages.or') }} <a style="color:blue" href="{{route('register.form')}}">{{ __('messages.register') }}</a> {{ __('messages.to_comment') }}
                            </p>
                            @endauth
                            <div class="col-12">
                                <div class="comments">
                                    <h3 class="comment-title">{{ __('messages.comments') }} ({{$post->allComments->count()}})</h3>
                                    <!-- Single Comment -->
                                    @include('frontend.pages.comment', ['comments' => $post->comments, 'post_id' => $post->id, 'depth' => 3])
                                    <!-- End Single Comment -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="main-sidebar">
                        <!-- Single Widget -->
                        <div class="single-widget search">
                            <form class="form" method="GET" action="{{route('blog.search')}}">
                                <input type="text" placeholder="{{ __('messages.search_here') }}" name="search">
                                <button class="button" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget category">
                            <h3 class="title">{{ __('messages.blog_categories') }}</h3>
                            <ul class="categor-list">
                                @foreach(Helper::postCategoryList('posts') as $cat)
                                <li><a href="#">{{$cat->title}} </a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget recent-post">
                            <h3 class="title">{{ __('messages.recent_articles') }}</h3>
                            @foreach($recent_posts as $post)
                                <!-- Single Post -->
                                <div class="single-post">
                                    <div class="image">
                                        <img src="{{$post->photo}}" alt="{{$post->photo}}">
                                    </div>
                                    <div class="content">
                                        <h5><a href="#">{{$post->title}}</a></h5>
                                        <ul class="comment">
                                            <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$post->created_at->format('d M, y')}}</li>
                                            <li><i class="fa fa-user" aria-hidden="true"></i>
                                                {{$post->author_info->name ?? 'Anonyme'}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Post -->
                            @endforeach
                        </div>
                        <!--/ End Single Widget -->
                        <!-- Single Widget -->
                        <div class="single-widget side-tags">
                            <h3 class="title">{{ __('messages.tags') }}</h3>
                            <ul class="tag">
                                @foreach(Helper::postTagList('posts') as $tag)
                                    <li><a href="">{{$tag->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!--/ End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Blog Single -->
@endsection

@push('styles')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
@endpush

@push('scripts')
<script>
$(document).ready(function(){

    (function($) {
        "use strict";

        $('.btn-reply.reply').click(function(e){
            e.preventDefault();
            $('.btn-reply.reply').show();

            $('.comment_btn.comment').hide();
            $('.comment_btn.reply').show();

            $(this).hide();
            $('.btn-reply.cancel').hide();
            $(this).siblings('.btn-reply.cancel').show();

            var parent_id = $(this).data('id');
            var html = $('#commentForm');
            $( html).find('#parent_id').val(parent_id);
            $('#commentFormContainer').hide();
            $(this).parents('.comment-list').append(html).fadeIn('slow').addClass('appended');
          });

        $('.comment-list').on('click','.btn-reply.cancel',function(e){
            e.preventDefault();
            $(this).hide();
            $('.btn-reply.reply').show();

            $('.comment_btn.reply').hide();
            $('.comment_btn.comment').show();

            $('#commentFormContainer').show();
            var html = $('#commentForm');
            $( html).find('#parent_id').val('');

            $('#commentFormContainer').append(html);
        });

 })(jQuery)
})
</script>
@endpush
