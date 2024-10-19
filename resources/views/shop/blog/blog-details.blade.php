@extends('shop_layout')
@section('content')

<!--Page Banner Start-->
<div class="page-banner" style="background-image: url(../public/kidolshop/images/banner/banner_blog.png);">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Chi Tiết Bài Viết</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{URL::to('/blog')}}">Tin tức</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$Blog->BlogTitle}}</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->

<!--Empty Cart Start-->
<div class="empty-cart-page section-padding-5">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-lg-9">
                <div class="blog-single">
                    <h2 class="title text-primary">{{$Blog->BlogTitle}}</h2>
                    <div class="articles-date">{{$Blog->created_at}}</div>
                    <div class="blogDesc mb-30">{!!$Blog->BlogDesc!!}</div>
                    {!!$Blog->BlogContent!!}
                </div>
            </div>
            <div class="col-lg-3">
                <div class="sidebar-post">
                    <h3 class="widget-title">Bài viết gần đây</h3>
                    <ul class="post-items">
                        @foreach($list_new_blog as $key => $new_blog)
                        <li>
                            <div class="single-post">
                                <div class="post-thumb">
                                    <a href="{{URL::to('/blog/'.$new_blog->BlogSlug)}}"><img src="{{asset('public/storage/kidoldash/images/blog/'.$new_blog->BlogImage)}}" alt=""></a>
                                </div>
                                <div class="post-content">
                                    <div class="post-title"><a class="two-line" href="{{URL::to('/blog/'.$new_blog->BlogSlug)}}">{{$new_blog->BlogTitle}}</a></div>
                                    <span class="date">{{$new_blog->created_at}}</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Empty Cart End-->

@endsection