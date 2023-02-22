@extends('home')
@section('title', 'Homepage')
@section('content')

<style type="text/css">
  .tp-top-text {
    font-size: 38px !important;
  }
</style>

<div class="slider-one">
  <div class="tp-banner-container">
    <div class="tp-banner">
      <ul>
        <!-- SLIDE  1-->
        <li data-transition="slotfade-horizontal" data-slotamount="1" data-masterspeed="500"
          data-title="Tandoori Chicken">
          <!-- MAIN IMAGE -->
          <img src="/images/home/slider3.jpg" alt="slidebg1" data-lazyload="/images/home/slider3.jpg"
            data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
          <!-- LAYER NR. 2 -->
          <div class="tp-caption tp-resizeme sft" data-x="220" data-y="50" data-speed="1000" data-start="2400"
            data-endspeed="300" data-captionhidden="off"
            style="z-index: 7; max-width: auto; max-height: auto; font-family : 'Playball', sans-serif;color: #fff;font-size:91px; line-height:50px; text-align:center">
            <span class="slider-text-1" style="font-size: 33px;font-family: 'Merriweather', sans-serif;">We take
              our</span><br>
            Responsibilities<br>
            <span class="slider-text-2"
              style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;  font-family: 'Roboto', sans-serif;text-transform: uppercase; font-size: 18px;letter-spacing: 4px; color: #fff;text-shadow:5px 5px 5px #000">your
              satisfaction is our main priority<br>
              <a target="_blank" href='https://www.thaiemperor.uk/order.aspx' class="slider-text-3 tr-slider-btn"
                style="z-index: 12; max-width: auto; max-height: auto; white-space: nowrap;font-size:22px;font-family: 'Roboto';"><span
                  class="glf-button" data-glf-cuid="f562f605-7cf3-438b-ac2c-a3e4f242586b"
                  data-glf-ruid="aabf9573-29e2-4ba8-9f31-12a08b2090ca"> Online Order</span></a>
          </div>
        </li>

        <!-- SLIDE  2-->
        <li data-transition="slotfade-horizontal" data-slotamount="1" data-masterspeed="500"
          data-title="Lamb Tikka Special">
          <!-- MAIN IMAGE -->
          <img src="/images/home/slider.jpg" alt="slidebg1" data-lazyload="/images/home/slider.jpg"
            data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
          <!-- LAYER NR. 2 -->
          <div class="tp-caption tp-resizeme sft" data-x="220" data-y="50" data-speed="1000" data-start="2400"
            data-endspeed="300" data-captionhidden="off"
            style="z-index: 7; max-width: auto; max-height: auto; font-family : 'Playball', sans-serif;color: #fff;font-size:91px; line-height:50px; text-align:center">
            <span class="slider-text-1" style="font-size: 33px;font-family: 'Merriweather', sans-serif;">welcome
              to</span><br>Thai Emperor!<br>
            <span class="slider-text-2"
              style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;  font-family: 'Roboto', sans-serif;text-transform: uppercase; font-size: 18px;letter-spacing: 4px; color: #fff;text-shadow:5px 5px 5px #000">best
              quality food</span><br>
            <a target="_blank" href='https://www.thaiemperor.uk/order.aspx' class="slider-text-3 tr-slider-btn"
              style="z-index: 12; max-width: auto; max-height: auto; white-space: nowrap;font-size:22px;font-family: 'Roboto';"><span
                class="glf-button" data-glf-cuid="f562f605-7cf3-438b-ac2c-a3e4f242586b"
                data-glf-ruid="aabf9573-29e2-4ba8-9f31-12a08b2090ca"> Online Order</span></a>
          </div>
        </li>

        <!-- SLIDE 3 -->
        <li data-transition="slotfade-horizontal" data-slotamount="1" data-masterspeed="500"
          data-title="Chef's finishing touch">
          <!-- MAIN IMAGE -->
          <img src="/images/home/slider2.jpg" alt="slidebg1" data-lazyload="/images/home/slider2.jpg"
            data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
          <!-- LAYER NR. 2 -->
          <div class="tp-caption tp-resizeme sft" data-x="220" data-y="50" data-speed="1000" data-start="2400"
            data-endspeed="300" data-captionhidden="off"
            style="z-index: 7; max-width: auto; max-height: auto; font-family : 'Playball', sans-serif;color: #fff;font-size:91px; line-height:50px; text-align:center">
            <span class="slider-text-1"
              style="font-size: 33px;font-family: 'Merriweather', sans-serif;">Memorable</span><br>
            Experience<br>
            <span class="slider-text-2"
              style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;  font-family: 'Roboto', sans-serif;text-transform: uppercase; font-size: 18px;letter-spacing: 4px; color: #fff;text-shadow:5px 5px 5px #000">With
              fantastic service and great food</span><br>
            <a target="_blank" href='https://www.thaiemperor.uk/order.aspx' class="slider-text-3 tr-slider-btn"
              style="z-index: 12; max-width: auto; max-height: auto; white-space: nowrap;font-size:22px;font-family: 'Roboto';"><span
                class="glf-button" data-glf-cuid="f562f605-7cf3-438b-ac2c-a3e4f242586b"
                data-glf-ruid="aabf9573-29e2-4ba8-9f31-12a08b2090ca"> Online Order</span></a>
          </div>
        </li>
      </ul>
      <div class="tp-bannertimer"></div>
    </div>
  </div>
</div>
<!--====| slider One |====-->

<!--===| Welcome Area Start===|-->
<section class="welcome-area">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-4">
        <div id="about-us" class="welcome-note text-center">
          <h1>welcome</h1>
          <h2> to Thai Emperor!</h2>
          <p class="note">An authentic and equally contemporary restaurant not only serving Thai food but a Thai culture
            rich in hospitality and warmth! A hidden gem of Swanley and surrounding areas, joy and pride of the locals!
            Very reasonably priced, excellent wine selection and award winning duo-managers always ensure that you are
            not just a customer but a royal guest in the house.
            {{-- A Fine Dining Indian Restaurant & Cocktail Bar with DJ/Karaoke parties on Weekends.. “Thai Emperor!” has a private function room in the basement too! It offers Sunday Buffet and Banqueting Night on Tuesdays & Wednesdays!</p><br>
          <p class="note">‘Thai Emperor!’ is fully rebranded to deliver an impeccable customer service and 5-star rated quality food and drinks. Cocktail Bar, dance-floor, private sound-proof function room and a touch of elegance makes “Thai Emperor!” a true attraction. We are also keeping a sharp eye on the 'value for your money'. Our Promise and Target is simple – “To provide you with a memorable experience at Thai Emperor! Go Team Swanley!”</p> --}}
        </div>
      </div>
      <div class="col-xs-12 col-md-8">
        <div class="row">
          <div class="col-xs-12 col-sm-6  col-md-6 first-column">
            <div class="grid">
              <figure class="effect-cheff">
                <img src="/images/home/Lamb Shank Massaman.jpg" alt="" />
                {{-- <img src="/images/home/about1.jpg" alt=""/>/ --}}
                <figcaption>
                  <!-- <h2>MEET OUR TEAM</h2>
                    <p>Meet Our Super Team</p>  -->
                </figcaption>
              </figure>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 ">
            <div class="grid">
              <figure class="effect-cheff">
                <img class="/images/home-responsive" src="/images/home/Thai Green Curry.jpg" alt="" />
                <figcaption>
                  <!-- <h2>Monthly Special</h2>
                    <p>2 courses for $10.95 <br>or 3 courses for $12.95</p> -->
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 col-sm-6  col-md-6 column-margin clear-left">
            <div class="grid">
              <figure class="effect-cheff">
                <img src="/images/home/about3.jpg" alt="" />
                <figcaption>
                  <!-- <h2>MEET OUR TEAM</h2>
                    <p>Meet Our Super Team</p>  -->
                </figcaption>
              </figure>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 column-margin">
            <div class="grid">
              <figure class="effect-cheff">
                <img src="/images/home/Goong Paow.jpg" alt="" />
                <figcaption>
                  <!-- <h2>MEET OUR TEAM</h2>
                    <p>Meet Our Super Team</p>  -->
                </figcaption>
              </figure>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--===| Welcome Area End===|-->


<!--===| Service Start ===|-->
{{-- <section id="service" class="services">
    <style type="text/css">.top-noch-bg{background:#8b4513;padding: 0 5px;}</style>
    <div class="services-overlay">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-12 text-center">
            <h1>TOP NOTCH CUSTOMER SERVICE</h1>
            <p class="slogan">We have come to rescue the old and tired ‘Thai Emperor Restaurant’, on Swanley High Street. Once upon a time a thriving well-reputed restaurant consistently remaining on No.1 on TripAdvisor, started to struggle due to lack of passion and not keeping up with time.. So we waved the tired management team a nice ‘good bye’ and took over the business, fully re-branded it with a grand opening ceremony, a new name, a new menu with better wine list, a new chef with a new kitchen along with all new staff members..Back & front! Oh yes! And have we mentioned the new Interior decor? And the private function room in the basement where DJ/Karaoke & Dance will be a regular thing on weekends after 10pm? Try our ‘Sunday Day Buffet’ with more than 12 items and our Tuesday & Wednesday Banqueting Night is a must do! Try us and we guarantee you a better experience! We promise you won’t be disappointed!</p>
            <ul id="myTab" class="nav nav-tabs">
              <li><a href="#tab-features" data-toggle="tab" aria-expanded="true"><i class="fa fa-wifi"></i><br>Free Wifi</a></li>
              <li class="active"><a href="#extra" data-toggle="tab" aria-expanded="false"><i class="fa fa-taxi"></i><br>Free Parking</a></li>
              <li><a href="#home-delivery" data-toggle="tab" aria-expanded="false"><i class="fa fa-bicycle"></i><br>Home Delivery</a></li>
              <li><a href="#custom" data-toggle="tab" aria-expanded="false"><i class="fa fa-cubes"></i><br>PRIVATE FUNCTION ROOM</a></li>
            </ul><div class="panel-group visible-xs" id="myTab-accordion"></div>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade" id="tab-features">
                <div class="row">
                  <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <h2><a href="#">Thai Emperor! offers free wifi </a></h2>
                    <p>Enjoy free high-speed wifi. Simply click on NamasteSwanley wifi and ask any of our staff for login details. Now you can enjoy uninterrupted video streaming and downloads as much as you want...</p>
                    <a class="top-noch-bg" href="#" role="button">Good For Groups, Good For Kids, Takes Reservations, Take Out, Waiter Service, Walk-Ins Welcome</a>
                  </div>
                </div>
              </div>
              
              <div class="tab-pane fade" id="custom">
                <div class="row">
                  <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <h2><a href="#">PRIVATE FUNCTION ROOM FOR DINING & PARTIES</a></h2>
                    <p> Enjoy your dining in our Private Function Room for a quality dining time...</p>
                    <a class="top-noch-bg" href="#" role="button">Good For Groups, Good For Kids, Takes Reservations, Take Out, Waiter Service, Walk-Ins Welcome</a>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade active in" id="extra">
                <div class="row">
                  <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <h2><a href="#">WE HAVE FREE PARKING FACILITIES</a></h2>
                    <p>Thai Emperor! provides its customers with FREE parking facilities that contribute to a positive overall dining experience. This way you don't have to waste time looking for a parking space..</p>
                    <a class="top-noch-bg" href="#" role="button">Good For Groups, Good For Kids, Takes Reservations, Take Out, Waiter Service, Walk-Ins Welcome</a>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="home-delivery">
                <div class="row">
                  <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <h2><a href="#">Thai Emperor! also provides home deliveries</a></h2>
                    <p>Our home delivery service allows you to order your favorite foods so that you can enjoy it from the comfort of your home, best for beating the traffic.</p>
                    <p style="font-size:18px">Minimum order for free home delivery will be £14 (upto 3 miles rad)</p>
                    <a class="top-noch-bg" href="#" role="button">Good For Groups, Good For Kids, Takes Reservations, Take Out, Waiter Service, Walk-Ins Welcome</a>
                  </div>
                </div>
              </div>
            </div><!--/.tan-content-->
          </div>
        </div>
      </div>
    </div>
  </section> --}}
<!--===| Service End ===|-->


<!--====| Shuffle Menu Style Sta rt|====-->
<style type="text/css">
  .sub-cats li {
    padding-left: 15px;
    border-left: 1px solid #eee
  }

  .sub-cats li .active {
    color: #d00;
  }

  .sub-cats li a:hover {
    color: #d00;
  }

  .quantity {
    margin-bottom: 10px;
  }

  .quantity input[type="button"] {
    padding: 0;
    font-size: 12px;
    font-weight: bold;
    width: 20px
  }

  .ItemCat {
    display: block
  }

  .ItemCat a {
    color: #f00;
    font-size: 18px;
    font-weight: bold;
  }

  .ItemSubCat a {
    color: #d00;
    font-size: 16px;
    font-weight: bold;
    padding-left: 15px
  }

  .gallery-items {
    overflow-x: auto
  }
</style>


<section id="food-menu" class="galleri-wrapper food-menu-wrapper section-padding" style="background:#fff;">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1 style="font-size:45px">Food Menu</h1>
        <p class="slogan">All our food are made freshly to be healthy.<br><br>
          <a style="border:1px solid; padding:10px;color:#f00;" target="_blank"
            href="/uploads/Thai-Food-Menu.pdf">Download Food Menu</a>
        </p>
      </div>
    </div>

    <div class="row">
      {{-- <div class="responsive-menu" style="border:1px solid #800">Food Menu</div> --}}
      <div class="col-md-3 col-sm-3 sidebar-menu">
        <div class="gallery-trigger">
          <ul id="_filter">
            @foreach($cats as $cat)
            <li><a name="{{'cat'.$cat->id}}" onclick="showCat(this)">{{$cat->cat_name}}</a>
              @if(count(App\FoodSubCat::where('cat_id', $cat->id)->get()) > 0)
              <ul style="display:none" class="subCat sub-cats">
                @foreach(App\FoodSubCat::where('cat_id', $cat->id)->get() as $subcat)
                <li><a onClick="showSubCat(this);"
                    name="{{$cat->id.'subcat'.$subcat->id}}">{{$subcat->sub_cat_name}}</a></li>
                @endforeach
              </ul>
              @endif
              @endforeach
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-7">

        <div class="gallery-items">
          @foreach($cats as $cat)
          {{-- <div id="grid"> --}}
          <div class="ItemCat" id="{{'cat'.$cat->id}}">
            @if($cat->image)
            <img class="img-responsive" src="{{$cat->image}}">
            @else
            <a href="#" class="cat_name">{{$cat->cat_name}}</a>
            <!-- portfolio-item -->
            <?php $subcats = DB::table('food_sub_cats')->where('cat_id', $cat->id)->get(); ?>
            @if(count($subcats) > 0)

            @foreach($subcats as $subcat)
            <div class="clearfix"></div>
            <div class="ItemSubCat" id="{{$cat->id.'subcat'.$subcat->id}}">
              <!--sub-cat-block-->
              <a href="#">{{$subcat->sub_cat_name}}</a>
              <hr class="clearfix">
              @foreach(DB::table('food_items')->orderBy('for_web', 'DESC')->where('sub_cat_id', $subcat->id)->get() as
              $item)
              <div class="portfolio-item col-xs-12" data-groups='["total", "{{$item->cat_id}}"]'>
                <div class="portfolio">
                  <div class="media menu-media order_item">
                    <div class="media-left media-top">
                      <input type="hidden" name="item_id" value="{{$item->id}}">
                      <div class="item_name">{{$item->food_name}} </div>
                      @if($item->details)
                      <br>
                      <div>{{$item->details}}</div>
                      @endif
                    </div><!-- media left-->
                    <div class="item-media-body">
                      -
                    </div>
                    <!--/.media body-->
                    <div class="media-left media-top media-item-price">
                      <div class="food_price"><span>&pound;</span><span class="item_price">{{$item->price}}</span></div>
                    </div>
                  </div>
                </div>
              </div><!-- col-xs-12 -->
              @endforeach
            </div> {{-- sub-cats block --}}
            @endforeach
            <!-- subcats -->
            @else
            @foreach(DB::table('food_items')->orderBy('for_web', 'DESC')->where('cat_id', $cat->id)->get() as $item)
            <div class="portfolio-item col-xs-12" data-groups='["total", "{{$item->cat_id}}"]'>
              <div class="portfolio">
                <div class="media menu-media order_item">
                  <div class="media-left media-top">
                    <input type="hidden" name="item_id" value="{{$item->id}}">
                    <div class="item_name">{{$item->food_name}} </div>
                    @if($item->details)
                    <br>
                    <small>{{$item->details}}</small>
                    @endif
                  </div><!-- media left-->
                  <div class="item-media-body">
                    -
                  </div>
                  <!--/.media body-->
                  <div class="media-left media-top media-item-price">
                    <div class="food_price"><span>&pound;</span><span class="item_price">{{$item->price}}</span></div>
                  </div>
                </div>
              </div>
            </div><!-- col-xs-12 -->
            @endforeach
            @endif
            @endif

          </div> <!-- grid -->
          @endforeach {{-- $cats as $cat --}}
          <div class="clearfix"></div><br>
          {{-- <a class="label label-info" target="_blank" href="/images/Sunday Monday Exclusive.pdf" style="color: #F00; border:1px solid #ddd; padding: 5px 15px; background: #fff; font-size:22px">Sunday - Monday Exclusive Offer</a> --}}
          <hr>
          <a class="btn" style="padding:5px 15px;font-size: 15px" href="/#food-menu">Back to Food Menu</a>
          <!-- <div class="load-button text-center">
        <button class="btn" name="submit" type="submit">load more</button>
      </div> -->
        </div>
        <!--gallery items-->
      </div>
      <!--middle /.col-->
      <script type="text/javascript">
        // show cats
      function showCat(sitems){

        var ItemCat = document.getElementsByClassName('ItemCat');
        var subCats = document.getElementsByClassName('subCat');
        //show sub cat items
        if(sitems.nextElementSibling)
        {
          if(sitems.nextElementSibling.style.display == 'none')
          {
            sitems.nextElementSibling.style.display = 'block';
          }
          else
          {
            sitems.nextElementSibling.style.display = 'none';
          }

          for(var x = 0; subCats.length > x; x++)
          {
            if(sitems.nextElementSibling != subCats[x]){              
              if(subCats[x].style.display = 'block'){
                subCats[x].style.display = 'none';
              }
            }
          }
        }
        else
        {
          for(var x = 0; subCats.length > x; x++)
          {
            if(subCats[x].style.display = 'block'){
              subCats[x].style.display = 'none';
            }
          }
        }

        for(var i = 0; i < ItemCat.length; i++){
          if(sitems.name == ItemCat[i].id){
            ItemCat[i].style.display = 'block';
            // document.getElementById('noitems_alert').style.display = 'none';
          } else {
            ItemCat[i].style.display = 'none';
          }
        }
      }
      // show sub cats
      function showSubCat(subcat){
        var ItemSubCat = document.getElementsByClassName('ItemSubCat');
        var subcatkey = document.getElementsByClassName('subcatkey');
        //sub category item display function
        for(var i = 0; i < ItemSubCat.length; i++){
          if(subcat.name == ItemSubCat[i].id){
            ItemSubCat[i].style.display = 'block';
            ItemSubCat[i].addClass('active') = 'block';
            // document.getElementsByClassName('nosubitems')[1].style.display = 'none';
          } else {
            ItemSubCat[i].style.display = 'none';
          }
        }        
      }

      //call showCat() function onload the document.
      showCat(document.getElementById('CatItem'));
      </script>
    </div><!-- row -->
  </div><!-- container -->
</section>
<!--====| Shuffle Menu Style End |====-->

<!--==| Book A table Start |==-->
<section id="reservation" class="book-table-wrapper" hidden>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="booking-back">
          <div class="booking-form">
            <h1>book a table</h1>
            <p class="slogan">best of dining experience<br><span style="font-size:18px">*Please check our business hours
                before making a reservation.</span></p>
            {!! Form::open(['route' => 'reservation.store', 'method' => 'POST', 'files' => true, 'name' =>
            'bookingForm', 'id' => 'booking_form', 'style' => 'display:none']) !!}
            <div class="row">
              <div class="col-xs-12 col-sm-6">
                <input class="form-control" type="text" name="name" placeholder="name" required>
              </div>
              <div class="col-xs-12 col-sm-6">
                <input class="form-control" type="tel" name="phone" placeholder="phone" required>
              </div>
              <div class="col-xs-12 col-sm-6">
                <input id="email-reservation" class="form-control" type="email" name="email" placeholder="e-mail"
                  required>
              </div>
              <div class="col-xs-12 col-sm-6">
                <input class="form-control" type="text" name="person" placeholder="number of persons" required>
              </div>
              <div class="col-xs-12 col-sm-6">
                <input id="datepicker" class="form-control" type="text" name="date" placeholder="date" required>
              </div>
              <div class="col-xs-12 col-sm-6">
                <input class="form-control" type="text" name="time" placeholder="Time: 00:00 AM/PM" required>
              </div>
              <div class="col-xs-12 col-sm-12">
                <textarea class="form-control" rows="3" name="details" placeholder="message &amp; special request"
                  required></textarea>
              </div>
              <!-- <div class="form-group col-xs-12 reply">
                  <div id="reservation_mail_success" class="success" style="display:none;">Your message has been sent successfully. </div>
                  <div id="reservation_mail_fail" class="error" style="display:none;"> Sorry, error occured this time sending your message. </div>
                </div> -->
              <button type="submit" class="btn">make a reservation</button>
            </div>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
      <div class="wow slideInRight col-xs-12 col-sm-6">
        <div class="booking-image">
          <img src="/images/home/booking-chef.png" alt="Chef">
        </div>
      </div>
    </div>
  </div>
</section>
<!--==| Book A table End |==-->
<!--===| Our Team Start|===-->
<!--
<section id="cheff" class="section-padding our-team-section">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2>our team</h2>
        <p class="slogan">Meet Our Super Team</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-4">
        <div class="team-wrapper">
          <img src="/images/home/team-01.jpg" alt="Team-01">
          <ul class="social">
            <li><a href="#"><i class="flaticon-facebook55"></i></a></li>
            <li><a href="#"><i class="flaticon-linkedin11"></i></a></li>
            <li><a href="#"><i class="flaticon-google116"></i></a></li>
            <li><a href="#"><i class="flaticon-twitter1"></i></a></li>
          </ul>
          <div class="contents">
            <p><span>mark anthony - </span>founder & CEO</p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.Anennean
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4">
        <div class="team-wrapper">
          <img src="/images/home/team-02.jpg" alt="Team-02">
          <ul class="social">
            <li><a href="#"><i class="flaticon-facebook55"></i></a></li>
            <li><a href="#"><i class="flaticon-linkedin11"></i></a></li>
            <li><a href="#"><i class="flaticon-google116"></i></a></li>
            <li><a href="#"><i class="flaticon-twitter1"></i></a></li>
          </ul>
          <div class="contents">
            <p><span>jessica merry - </span>master chef</p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.Anennean
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-4">
        <div class="team-wrapper">
          <img src="/images/home/team-03.jpg" alt="Team-03">
          <ul class="social">
            <li><a href="#"><i class="flaticon-facebook55"></i></a></li>
            <li><a href="#"><i class="flaticon-linkedin11"></i></a></li>
            <li><a href="#"><i class="flaticon-google116"></i></a></li>
            <li><a href="#"><i class="flaticon-twitter1"></i></a></li>
          </ul>
          <div class="contents">
            <p><span>Madison Mccoist - </span>kitchen lead</p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit.Anennean
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
-->
<!--===| Our Team End|===-->
<!--====| Gallery Start |====-->
<section id="gallery" class="galleri-wrapper section-padding">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1>gallery</h1>
        <p class="slogan">our delectable food menu</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="row">
          <div class="col-xs-12 col-md-12">
            <div class="grid">
              <figure class="effect-cheff gallary-image">
                <img src="/images/home/gallery-01.jpg" alt="Gallery 01" />
                {{-- <figcaption>
                  <div class="gallary-hover-text">
                    <a class="yellow-bar fancybox" href="/images/home/gallery-01.jpg" data-fancybox-group="gallery"><i class="fa fa-plus"></i></a>
                    <p>chicken seasoned with herbs</p>
                  </div>
                </figcaption> --}}
              </figure>
            </div>
          </div>
          <div class="col-xs-12 col-md-6">
            <div class="grid">
              <figure class="effect-cheff gallary-image">
                <img src="/images/home/gallery-02.jpg" alt="Gallery 02">
                {{-- <figcaption>
                 <div class="gallary-hover-text">
                  <a class="yellow-bar fancybox" href="/images/home/gallery-02.jpg" data-fancybox-group="gallery"><i class="fa fa-plus"></i></a>
                  <p>chicken seasoned with herbs</p>
                </div>
              </figcaption> --}}
              </figure>
            </div>
            <div class="grid">
              <figure class="effect-cheff gallary-image">
                <img src="/images/home/gallery-03.jpg" alt="Gallery 03">
                {{-- <figcaption>
                <div class="gallary-hover-text">
                  <a class="yellow-bar fancybox" href="/images/home/gallery-03.jpg" data-fancybox-group="gallery"><i class="fa fa-plus"></i></a>
                  <p>chicken seasoned with herbs</p>
                </div>
              </figcaption> --}}
              </figure>
            </div>
          </div>
          <div class="col-xs-12 col-md-6">
            <div class="grid">
              <figure class="effect-cheff gallary-image">
                <img src="/images/home/gallery-04.jpg" alt="Gallery 04">
                {{-- <figcaption>
              <div class="gallary-hover-text">
                <a class="yellow-bar fancybox" href="/images/home/gallery-04.jpg" data-fancybox-group="gallery"><i class="fa fa-plus"></i></a>
                <p>chicken seasoned with herbs</p>
              </div>
            </figcaption> --}}
              </figure>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="row">
          <div class="col-xs-12 col-md-6">
            <div class="grid">
              <figure class="effect-cheff gallary-image">
                <img src="/images/home/gallery-05.jpg" alt="Gallery 05">
                {{-- <figcaption>
            <div class="gallary-hover-text">
              <a class="yellow-bar fancybox" href="/images/home/gallery-05.jpg" data-fancybox-group="gallery"><i class="fa fa-plus"></i></a>
              <p>chicken seasoned with herbs</p>
            </div>
          </figcaption> --}}
              </figure>
            </div>
            <div class="grid">
              <figure class="effect-cheff gallary-image">
                <img src="/images/home/gallery-06.jpg" alt="Gallery 06">
                {{-- <figcaption>
           <div class="gallary-hover-text">
            <a class="yellow-bar fancybox" href="/images/home/gallery-06.jpg" data-fancybox-group="gallery"><i class="fa fa-plus"></i></a>
            <p>chicken seasoned with herbs</p>
          </div>
        </figcaption> --}}
              </figure>
            </div>
          </div>
          <div class="col-xs-12 col-md-6">
            <div class="grid">
              <figure class="effect-cheff gallary-image">
                <img src="/images/home/gallery-07.jpg" alt="Gallery 07">
                {{-- <figcaption>
        <div class="gallary-hover-text">
          <a class="yellow-bar fancybox" href="/images/home/gallery-07.jpg" data-fancybox-group="gallery"><i class="fa fa-plus"></i></a>
          <p>chicken seasoned with herbs</p>
        </div>
      </figcaption> --}}
              </figure>
            </div>
          </div>
          <div class="col-xs-12 col-md-12">
            <div class="grid">
              <figure class="effect-cheff gallary-image">
                <img src="/images/home/gallery-08.jpg" alt="Gallery 08">
                {{-- <figcaption>
        <div class="gallary-hover-text">
          <a class="yellow-bar fancybox" href="/images/home/gallery-08.jpg" data-fancybox-group="gallery"><i class="fa fa-plus"></i></a>
          <p>chicken seasoned with herbs</p>
        </div>
      </figcaption> --}}
              </figure>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="load-button text-center">
      {{-- <button class="btn" name="submit" type="submit">load more</button> --}}
    </div>
  </div>
</section>
<!--====| Gallery End |====-->

<!-- new event -->
<section id="events" class="section-padding reservation" style="display:none">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 ">
        <h1>Special Events</h1>
        <p class="slogan">Enjoy Special Events at Thai Emperor!</p>
      </div>
      <div class="col-sm-12 col-xs-12">
        <div id="reservation-slider" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <?php $r = 0; ?>
            @foreach($events as $event)
            <li data-target="#reservation-slider" data-slide-to="{{$r}}" class="{{$r == 0? 'active':''}}"></li>
            <?php $r++; ?>
            @endforeach
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php $r = 1; ?>

            @foreach($events as $event)
            <div class="item {{$r == 1? 'active':''}}">
              <div class="left-images">
                <img src="/images/home/{{$event->image}}" alt="">
              </div>
              <div class="details-text" style="min-height:400px">
                <div class="content-holder">
                  <h2><a href="#">{{$event->title}}</a></h2>
                  <P>{{$event->details}}</P>
                  <address>
                    <strong>{{$event->footer_text}}</strong>
                    <!-- 1612 Collins Str, Victoria 8007
                <br>
                <strong>Time: </strong>
                07:30pm -->
                  </address>
                  <!-- <a class="btn btn-imfo btn-read-more" href="events-details.html">Read more</a> -->
                </div>
              </div>
            </div> <!-- item -->
            <?php $r++; ?>
            @endforeach

          </div> <!-- carousel-inner -->
        </div> <!-- carousel -->
      </div> <!-- col-sm-12 -->
    </div> <!-- row -->
  </div> <!-- container -->
</section>
<!-- new event -->

<!--===| Event End|===-->
<!--===| Signature menu Start|===-->
<section class="section-padding signature-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1>signature dishes</h1>
        <p class="slogan">fresh and healthy food available</p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="owl-wrap">
          <div id="owl-dishes" class="owl-carousel">
            <div class="feature-image">
              <img src="/images/home/Som Tam Thai ( Green Papaya Salad) (dish).jpg" alt="">
              <h2>Som Tam Thai (Green Papaya Salad)</h2>
            </div>
            <div class="feature-image">
              <img src="/images/home/Goong Paow (dish).jpg" alt="">
              <h2>Goong Paow</h2>
            </div>
            <div class="feature-image">
              <img src="/images/home/Lamb Shank Massaman (dish).jpg" alt="">
              <h2>Lamb Shank Massaman</h2>
            </div>
            <div class="feature-image">
              <img src="/images/home/Pad Thai.jpg" alt="Pad Thai">
              <h2>Pad Thai</h2>
            </div>

            <div class="feature-image">
              <img src="/images/home/Fried Rice.jpg" alt="Fried Rice">
              <h2>Fried Rice</h2>
            </div>
            <div class="feature-image">
              <img src="/images/home/Green Curry.jpg" alt="Green Curry">
              <h2>Thai Green Curry</h2>
            </div>
            <!--
          <div class="feature-image">
            <img src="/images/home/s-dish-01.jpg" alt="Signature Dishes 02">
            <h2>chicken for two roasted</h2>
            <p>There was a time when Chinese food in this country meant (Americanized) Cantonese food.</p>
            <p class="price">price: <span>$135</span></p>   
          </div>
        -->
          </div><!-- /.owl-carousel -->
          <div class="owl-controls">
            <a class="next"><i class="flaticon-arrow427"></i></a>
            <a class="prev"><i class="flaticon-arrow413"></i></a>
          </div>
        </div><!-- /.owl-wrap -->
      </div>
    </div>
  </div>
</section>
<!--===| Signature menu End|===-->


<!--===| blog section Start|===-->
<section class="section-padding signature-wrapper" id="blogs">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1>Blog Posts</h1>
      </div>
    </div>

    <div class="row">

      @foreach ($blogs as $blog)
      <div class="col-lg-3">


        <div class="blog-grid">
          <div class="blog-img">

            <a href="{{ route('blog.details',$blog->id) }}">
              <img src="/images/home/{{ $blog->image}}" title="" alt="">
            </a>
          </div>
          <div class="blog-info">
            <h5><a href="{{ route('blog.details',$blog->id) }}">{{ $blog->title}}</a></h5>
            <p>{{ $blog->sub_title}}</p>
            <div class="btn-bar">
              <a href="{{ route('blog.details',$blog->id) }}" class="px-btn-arrow">
                <span>Read More</span>
                <i class="arrow"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <div class="col-lg-12">
        <a class="btn" style="padding:5px 15px;font-size: 15px" href="/blogs">view All</a>
      </div>





    </div>



  </div>

  </div>
</section>
<!--===| blog section End|===-->


<!--===| Testimonial Start|===-->
{{-- <section class="section-padding testimonial-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
        <h1>Customer views</h1>
        <div id="testimonial" class="carousel slide carousel-fade" data-ride="carousel" data-interval="20000">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox" style="min-height:350px;">
            <div class="item active">
              <img src="/images/home/testimonials/Lauren.jpg" alt="Lauren">
              <p></p>
              <blockquote> customer name </blockquote>
            </div>

          </div>

          Indicators
          <ol class="carousel-indicators">
            <li data-target="#testimonial" data-slide-to="0" class="active"></li>
            <li data-target="#testimonial" data-slide-to="1"></li>
            <li data-target="#testimonial" data-slide-to="2"></li>
            <li data-target="#testimonial" data-slide-to="3"></li>
            <li data-target="#testimonial" data-slide-to="4"></li>
            <li data-target="#testimonial" data-slide-to="5"></li>
            <li data-target="#testimonial" data-slide-to="6"></li>
            <li data-target="#testimonial" data-slide-to="7"></li>
          </ol>
          
        </div>
      </div>
    </div>
  </div>
</section> --}}
<!--===| Testimonial End|===-->

<!--====| Contact Us Start |====-->
{{-- <section id="contact" class="section-padding contact-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 text-center">
        <h1>Place Order</h1>
        <p class="slogan">Please type Food Name in the message box and place the order and pay at the time of pick up or when you receive the food.</p>
      </div>
      <div class="col-xs-12 col-sm-12">
        <div class="form-wrapper">
          <form id='contact_form' name="enqueryForm" method="post" action="submit_order.php">
            <div class="row">
              <div class="col-xs-12 col-sm-4">
                <input type="text" class="form-control" name="name" placeholder="name" required>
              </div>
              <div class="col-xs-12 col-sm-4">
                <input type="text" class="form-control" name="phone" placeholder="phone number" required>
              </div>
              <div class="col-xs-12 col-sm-4">
                <input type="email" class="form-control" name="email" placeholder="e-mail(optional)" required>
              </div>
              <div class="col-xs-12 col-sm-12">
                <input type="text" class="form-control" name="address" placeholder="address: property number, Town name, post code" required>
              </div>
              <div class="col-xs-12 col-sm-12">
                <textarea id="message" class="form-control" rows="8" name="details" placeholder="Type your message here ..." required></textarea>
              </div>
              <!-- <div class="form-group col-xs-12">
                <div id="mail_success" class="success" style="display:none;">Your message has been sent successfully. </div>
                <div id="mail_fail" class="error" style="display:none;"> Sorry, error occured this time sending your message. </div>
              </div> -->
              <div class="send-button text-center">
                <button class="btn" name="submit" type="submit">submit order</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      </div>     
    </div>
  </section> --}}
<!--====| Contact Us End |====-->

<!-- <div id="map-canvas1"></div> -->
<style type="text/css">
  .gmap img {
    width: 100%;
  }
</style>
<div class="gmap">
  <img src="/images/home/map.png">
</div>


<!--===| Right Fixed Booking Form Start|===-->
<div class="book-now-wrapper">
  <p class="toggle" style="display:none">book a table now</p>
  <div class="book-now ">
    <div class="book-form">
      <p>free &amp; instant online restaurant reservations</p>
      {!! Form::open(['route' => 'reservation.store', 'method' => 'POST', 'files' => true, 'name' => 'sidebarForm', 'id'
      => 'sidebar_form']) !!}
      <div class="col-xs-12 col-sm-12">
        <input class="form-control" type="text" name="name" placeholder="name" required>
      </div>
      <div class="col-xs-12 col-sm-12">
        <input class="form-control" type="tel" name="phone" placeholder="phone" required>
      </div>
      <div class="col-xs-12 col-sm-12">
        <input id="email-sidebar" class="form-control" type="email" name="email" placeholder="E-mail" required>
      </div>
      <div class="col-xs-12 col-sm-12">
        <input id="datepicker-sidebar" class="form-control" type="text" name="date" placeholder="date" required>
      </div>
      <div class="col-xs-12 col-sm-12">
        <input id="datepicker-sidebar" class="form-control" type="text" name="time" placeholder="Time: 00:00 AM/PM"
          required>
      </div>
      <div class="col-xs-12 col-sm-12">
        <input class="form-control" type="text" name="person" placeholder="number of person" required>
      </div>
      <div class="col-xs-12 col-sm-12">
        <textarea class="form-control" rows="3" name="details" placeholder="message &amp; special request"
          required></textarea>
      </div>
      <!-- <div class="form-group col-xs-12">
                <div id="sidebar_mail_success" class="success" style="display:none;">Your message has been sent successfully. </div>
                <div id="sidebar_mail_fail" class="error" style="display:none;"> Sorry, error occured this time sending your message. </div>
          </div> -->
      <div class="col-xs-12 col-sm-12">
        <button class="btn" type="submit">make a reservation</button>
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
<!--===| Right Fixed Booking Form End|===-->

<script src="https://www.fbgcdn.com/embedder/js/ewm2.js" defer async></script></a></li>

<!-- pop-up notice -->
<!--<div class="pop-up-notice" style="position:fixed; top:10%; left:0; right:0; max-width:400px; margin:10% auto;z-index:9999999;background:#7321AD;padding:25px">-->
<!--  <div style="font-size:18px;color:#fff;text-align:right;margin-top:-35px; margin-right:-35px;"><a href="#" style="border:1px solid;border-radius:50%;padding:5px 10px;background:#7321AD;" onclick="this.parentNode.parentNode.remove()"><i class="fa fa-times"></i></a></div>-->
<!--  <div class="content" style="padding:15px 10px;margin-top:10px">-->
<!--    <p style="font-size:22px;line-height:1.5;text-align:center;color:#fff">-->
<!--      <a target="_blank" href="https://pay.vivawallet.com/thai-emperor" style="border:1px solid; border-radius:10px;padding:5px 10px;background:#7300AD">Payment For Telephone Orders</a>-->
<!--    </p>-->
<!--   We very much regret to inform you all that due to covid related isolation reason, we must remain closed until the 3rd of January, 2022.<br>See you all next year! -->
<!--  </div>-->
<!--</div>-->

@endsection