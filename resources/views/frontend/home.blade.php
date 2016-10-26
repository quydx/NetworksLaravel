<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <!-- Bootstrap -->
    <link href="{{url('frontend/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- for fontawesome icon css file -->
    <link href="{{url('frontend/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- for content animate css file -->
    <link rel="stylesheet" href="{{url('frontend/css/animate.css') }}"> 
    <!-- main site css file -->
    <link href="{{url('frontend/structure.css') }}" rel="stylesheet">

    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px&amp;subset=latin-ext" rel="stylesheet">
    {{-- <style type="text/css">*{font-family: 'Slabo 27px', serif !important;}</style> --}}
    @yield('css')
  </head>
  <body>
     <!-- Preloader -->
    <div id="preloader">
      <div id="status">&nbsp;</div>
    </div>
    <!-- End Preloader -->

    <!-- start top add banner -->
      <div class="topadd_place">
        <a href="#"><img src="{{ url('frontend/img/addbanner_728x90_V1.jpg') }}" alt="img"></a>
      </div>
      <!-- End top add banner -->
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <!-- ==================start header=============== -->
    <header id="header">
      <div class="container">
         <!-- Static navbar -->
      <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=""><span>NETWORKS and</span> DEVERLOPE</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav custom_nav">
              <li class=""><a href="{{ route('home')}}">Home</a></li>              
               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Networks</a>
                <ul class="dropdown-menu" role="menu">
                  <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#">Jobs Home</a>
                    {{--   <ul class="dropdown-menu" role="menu">
                        <li>Two Columns</li>
                        <li>Three Columns</li>
                        <li>Four Columns</li>
                      </ul>  --}} 
                  </li>
                  <li><a href="#">bla bla</a></li>
                  <li><a href="#">bla bla</a></li>
                  <li><a href="#">bla bla</a></li>
                
                </ul>
              </li>            
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">DEVERLOPE</a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Standard Blog Layout</a></li>
                  <li><a href="#">Post With Comments</a></li>
                  <li><a href="#">Page:Right Sidebar</a></li>                
                </ul>
              </li>
              <li><a href="#">TIPS</a></li>
              <li><a href="#">2TEK</a></li>
              <li><a href="#">CONTACT</a></li>
              <li><a href="#">OTHER</a></li>
            </ul>           
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
      <form id="searchForm">
        <input type="text" placeholder="Search...">
        <input type="submit" value="">
      </form>
      </div>
    </header>    
    <!-- ==================End header=============== -->

    <!-- ==================start content body section=============== -->
    <section id="contentbody">
      <div class="container">
        <div class="row">
        @yield('content')

          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="row">
              <div class="rightbar_content">
              <!-- start featured post -->
                <div class="single_blog_sidebar wow fadeInUp">
                <h2>The Featured Stuff</h2>  
                <ul class="featured_nav">
                  <li>
                    <a class="featured_img" href="#"><img src="{{ url('frontend/img/featured_img1.jpg') }}" alt="img"></a>
                    <div class="featured_title">
                      <a class="" href="#">Sed luctus semper odio aliquam rhoncus</a>
                    </div>
                  </li>
                  <li>
                    <a class="featured_img" href="#"><img src="{{ url('frontend/img/featured_img1.jpg') }}" alt="img"></a>
                    <div class="featured_title">
                      <a class="" href="#">Sed luctus semper odio aliquam rhoncus</a>
                    </div>
                  </li>
                  <li>
                    <a class="featured_img" href="#"><img src="{{ url('frontend/img/featured_img1.jpg') }}" alt="img"></a>
                    <div class="featured_title">
                      <a class="" href="#">Sed luctus semper odio aliquam rhoncus</a>
                    </div>
                  </li>
                </ul>
                </div>
                <!-- End featured post -->

                <!-- start Popular Posts -->
                <div class="single_blog_sidebar wow fadeInUp">
                <h2>Popular Posts</h2>  
                <ul class="middlebar_nav wow">
                  <li>
                    <a href="#" class="mbar_thubnail"><img alt="img" src="{{ url('frontend/img/hot_img1.jpg') }}"></a>
                    <a href="#" class="mbar_title">Sed luctus semper odio aliquam rhoncus</a>
                  </li>
                   <li>
                    <a href="#" class="mbar_thubnail"><img alt="img" src="{{ url('frontend/img/hot_img2.jpg') }}"></a>
                    <a href="#" class="mbar_title">Sed luctus semper odio aliquam rhoncus</a>
                  </li>
                   <li>
                    <a href="#" class="mbar_thubnail"><img alt="img" src="{{ url('frontend/img/hot_img1.jpg') }}"></a>
                    <a href="#" class="mbar_title">Sed luctus semper odio aliquam rhoncus</a>
                  </li>
                   <li>
                    <a href="#" class="mbar_thubnail"><img alt="img" src="{{ url('frontend/img/hot_img1.jpg') }}"></a>
                    <a href="#" class="mbar_title">Sed luctus semper odio aliquam rhoncus</a>
                  </li>
                </ul>
                </div>
                <!-- End Popular Posts -->  

                <!-- start Popular Posts -->
                <div class="single_blog_sidebar wow fadeInUp">
                <h2>Popular Tags</h2>  
                <ul class="poplr_tagnav">
                  @foreach($all_tags as $tag)
                  <li><a href="#">{{ $tag->name}}</a></li>
                  @endforeach
                </ul>
                </div>
                <!-- End Popular Posts -->              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer id="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="footer_inner">
              <p class="pull-left">Copyright &copy; 2016 <a href="#">Inc.</a></p>
              <p class="pull-right">Developed By <a href="#">Quydx</a></p>
              <?php
                // $str = "12";
                // // var_dump($str);
                // $num = (int)$str ;
                // echo $num +1;
               if (Storage::exists('file.txt')){
                $hits = Storage::get('file.txt');
                // echo var_dump($hits);
                $newHits= (int)$hits + 1;
                echo '<p style="color:white;">'.$newHits." Lượt truy cập</p> ";
                Storage::put('file.txt', $newHits);
               }

               ?>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- ==================End content body section=============== -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{url('frontend/js/bootstrap.min.js') }}"></script> 
    <!-- For content animatin  -->
    <script src="{{url('frontend/js/wow.min.js') }}"></script> 
    <!-- custom js file include -->
     <script src="{{url('frontend/js/custom.js') }}"></script>     
    @yield('script')
  </body>
</html>