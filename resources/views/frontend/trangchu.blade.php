   @extends('frontend.home')
   @section('content')
   <!-- start left bar content -->
          <div class=" col-sm-12 col-md-6 col-lg-6">
            <div class="row">
              <div class="leftbar_content">
                <h2>The New Stuff</h2>
                <!-- start single stuff post -->
                @foreach($newests as $newest )
                <div class="single_stuff wow fadeInDown">
                  <div class="single_stuff_img">
                    <a href="{{ route('posts', [$newest->id , str_slug($newest->title)])}}"><img src="{{ url('upload/'.$newest->thumbnail) }}" alt="{{ $newest->seo_title}}"></a>
                  </div>
                  <div class="single_stuff_article">
                      <div class="single_sarticle_inner">
                          <a class="stuff_category" href="#"></a>
                        <div class="stuff_article_inner">
                          <?php 
                            $dateAndHours = explode(" ",$newest->created_at->toDateTimeString());
                            $date = $dateAndHours[0];
                            $arrayDate = explode("-", $date);
                            $month = $arrayDate[1];
                            $day = $arrayDate[2];
                           ?>
                          <span class="stuff_date">{{ $month }} <strong>{{$day}}</strong></span>
                          <h2><a href="{{ route('posts',[$newest->id , str_slug($newest->title)])}}">{{ $newest->title}}</a></h2>
                          <p>{{$newest->description}}</p>
                        </div>
                      </div>
                  </div>
                </div>
                @endforeach
                 @if ($newests->count() > 0)
                  <div class="stuffpost_paginatinonarea wow slideInLeft">                
                    <ul class="newstuff_pagnav">
                      <li><a href="{{ $newests->previousPageUrl() }}"><i class="fa fa-chevron-left"></i></a></li>
                      <li style="opacity:0.7;"><a href="{{ $newests->currentPage() }} ">{{ $newests->currentPage() }}</a></li>
                      <li><a href="?page={{ $newests->currentPage() + 1 }}">{{ $newests->currentPage() + 1 }}</a></li>
                      <li><a href="?page={{ $newests->currentPage() + 2 }}">{{ $newests->currentPage() + 2 }}</a></li>
                      <li><a href="{{ $newests->nextPageUrl() }}"><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                  </div>
                 @endif
              </div>
            </div>  
          </div>
          <!-- End left bar content -->

          <!-- start middle bar content -->
          <div class="col-sm-6 col-md-2 col-lg-2">
           <div class="row">
              <div class="middlebar_content">
              <h2 class="yellow_bg">What's Hot</h2>
              <div class="middlebar_content_inner wow fadeInUp">
                <ul class="middlebar_nav">
                  @foreach($mostviews as $mostview) 
                  <li>
                    <a class="mbar_thubnail" href="{{route('posts', [$mostview->id , str_slug('$mostview->title')])}}"><img src="{{ url('upload/'.$mostview->thumbnail) }}" alt="{{$mostview->seo_title}}" style="width:100%;height: 100%; "></a>
                    <a class="mbar_title" href="{{route('posts',[$mostview->id , str_slug($mostview->title)])}}">{{substr($mostview->title, 1, 56 )}}</a>
                  </li>
                   @endforeach
                </ul>
              </div>
              <div class="popular_categori  wow fadeInUp">
                <h2 class="limeblue_bg">Most Popular Categories</h2>
                <ul class="poplr_catgnva">
                  @foreach ($all_cates as $cate)
                    @if ($cate->parent_id == 0)
                    <li>
                      <a href="#"> {{ $cate->name}}</a>
                      <?php $childCate = App\Category::where('parent_id',$cate->id)->get(); ?>
                      <ul>
                        @foreach($childCate as $child)
                          <li><a href=""> &gt;{{$child->name}}</a></li>
                        @endforeach
                      </ul>
                    </li>
                    @endif
                  @endforeach
                </ul>  
              </div>        
            </div>
           </div>
          </div>
          <!-- End middle bar content -->
  @endsection
  @section('css')
    <style type="text/css">
      .mbar_title {
        font-size: 12px !important;
      }
      .poplr_catgnva >li >ul{
        padding-top:20px;
        padding-left: 20px;
      }
      .poplr_catgnva > li >ul {
        display: none;
        height: 0;
        transition: height 2s ease-in-out;
        -webkit-transition : height 2s ease-in-out;
      }
      .poplr_catgnva > li:hover > ul{
        display: block;
        height: auto;
      }
    </style>
  @endsection
  @section('script')

  @endsection