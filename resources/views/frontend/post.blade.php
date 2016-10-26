@extends('frontend.home')
@section('content')
         <div class=" col-sm-12 col-md-8 col-lg-8">
            <div class="row">
              <div class="leftbar_content">
                <h2>The New Stuff</h2>          

                <!-- start single stuff post -->
               <div class="singlepost_area">
                 <div class="singlepost_content">
                   <a href="#" class="stuff_category">Technology</a>
                   <span class="stuff_date">Nov <strong>17</strong></span>
                   <h2><a href="#">{{ $post_detail->title}}</a></h2>
                   <img class="img-center" src="{{ url('upload/'.$post_detail->thumbnail)}}" alt="img">
                   {!! $post_detail->content !!}
                  <a href="#" class="btn btn-primary">Primary</a>
                  <a href="#" class="btn btn-success">Success</a>
                  <a href="#" class="btn btn-info">Info</a>
                  <a href="#" class="btn btn-danger">Danger</a>
                  <a href="#" class="btn yellow_btn">Yellow</a>
                  <a href="#" class="btn blue_btn">Blue</a>
                  <a href="#">link</a>

                  <!-- single page pagination  -->
                  <div class="singlepage_pagination">
                    <a class="previous_btn" href="#">Previous</a>
                    <a class="next_btn" href="#">Next</a>
                  </div>

                <!-- start social link area -->
                  <div class="social_area wow fadeInLeft">
                  <ul>
                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
                    <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
                    <li><a href="#"><span class="fa fa-pinterest"></span></a></li>
                   </ul>
                  </div> 
                  <!-- author area-->
                  <div class="author">
                    <a href="#"><img src="" alt="img"></a>
                    <div class="author_details">
                      <h3><a href="#">Author Name</a></h3>
                      <p>About Author Content lobortis. Proin ut nibh quis felis auctor ornare. Cras ultricies, nibh at mollis faucibus, justo eros porttitor mi, quis auctor lectus arcu sit amet nunc. Vivamus gravida vehicula arcu, vitae vulputate augue lacinia faucibus</p>
                    </div>
                  </div>
                 </div>
               </div>
                <!-- End single stuff post -->               

             <!-- start similar post -->
             <div class="similar_post_area">
               <h2>Similar Post You May Like <i class="fa fa-thumbs-o-up"></i></h2>
               <ul class="featured_nav similarpost_nav wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;">
                  <li>
                    <a href="#" class="featured_img"><img alt="img" src="img/featured_img1.jpg"></a>
                    <div class="featured_title">
                      <a href="#" class="">Sed luctus semper odio aliquam rhoncus</a>
                    </div>
                  </li>
                  <li>
                    <a href="#" class="featured_img"><img alt="img" src="img/featured_img1.jpg"></a>
                    <div class="featured_title">
                      <a href="#" class="">Sed luctus semper odio aliquam rhoncus</a>
                    </div>
                  </li>
                  <li>
                    <a href="#" class="featured_img"><img alt="img" src="img/featured_img1.jpg"></a>
                    <div class="featured_title">
                      <a href="#" class="">Sed luctus semper odio aliquam rhoncus</a>
                    </div>
                  </li>
                </ul>
             </div>
              </div>
            </div>  
          </div>
          <!-- End left bar content -->
@endsection