@extends('shop_layout')
@section('content')

<!--Page Banner Start-->
<div class="page-banner" style="background-image: url(public/kidolshop/images/banner/banner_blog.png);">
    <div class="container">
        <div class="page-banner-content text-center">
            <h2 class="title">Tin Tức</h2>
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{URL::to('/home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
            </ol>
        </div>
    </div>
</div>
<!--Page Banner End-->

<!--Empty Cart Start-->
<div class="empty-cart-page section-padding-5">
    <div class="container">
        <div class="row">
            @foreach($list_blog as $key => $blog)
            <div class="col-lg-4 col-md-6 mb-30">
                <div class="single-blog">
                    <div class="blog-image">
                        <a href="{{URL::to('/blog/'.$blog->BlogSlug)}}"><img src="{{asset('public/storage/kidoldash/images/blog/'.$blog->BlogImage)}}" alt=""></a>
                    </div>
                    <div class="blog-content">
                        <h5 class="title"><a href="{{URL::to('/blog/'.$blog->BlogSlug)}}" class="new-block">{{$blog->BlogTitle}}</a></h5>
                        <div class="articles-date">
                            <p><span>{{$blog->created_at}}</span></p>
                        </div>
                        <div class="four-line mb-4">{!!$blog->BlogDesc!!}</div>

                        <div class="blog-footer">
                            <a class="more" href="{{URL::to('/blog/'.$blog->BlogSlug)}}">Tìm hiểu thêm</a>
                            <!-- <p class="comment-count"><i class="icon-message-circle"></i> 0</p> -->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            <!--Pagination Start-->
            <div class="page-pagination">
                {{$list_blog->appends(request()->input())->links()}}
            </div>
            <!--Pagination End-->
        </div>
    </div>
</div>
<!--Empty Cart End-->

@endsection