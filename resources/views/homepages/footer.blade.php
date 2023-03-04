<!--| Footer section Start |-->
<footer id="contact">
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4">
          <h3 class="footer-title">opening hours</h3>
          <div class="open-time opening-time">
            <table style="width:100%; color:#cfa670;font-size:17px">
              {{-- <tr>
                    <td>Monday</td>
                    <td>Closed</td>
                  </tr> --}}
              <tr>
                <td>Tuesday</td>
                <td>05:00pm - 10:30pm</td>
              </tr>
              <tr>
                <td>Wednesday</td>
                <td>05:00pm - 10:30pm</td>
              </tr>
              <tr>
                <td>Thursday</td>
                <td>05:00pm - 10:30pm</td>
              </tr>
              <tr>
                <td>Friday</td>
                <td>05:00pm - 11:00pm</td>
              </tr>
              <tr>
                <td>Saturday</td>
                <td>05:00pm - 11:00pm</td>
              </tr>
              <tr>
                <td>Sunday</td>
                <td>04:00pm - 09:00pm</td>
              </tr>
              <tr>
                <td>Monday</td>
                <td>Closed</td>
              </tr>
            </table>
          </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-4">
          <h3 class="footer-title">contacts</h3>
          <div class="address">
            <p class="icon-map" style=""><i class="fa fa-map-marker"></i><strong>address :</strong> 7 High Street
              <br><span style="padding-left:35px">Swanley Kent BR8 8AE.</span>
            </p>
            <p><i class="fa fa-phone"></i><strong>phone :</strong> <a href="tel:+44 7375 1000 96">+44 7375 1000 96</a>
            </p>
            <p><i class="fa fa-whatsapp"></i><strong>WhatsApp :</strong> <a href="tel:+44 7510 5960 44">+44 7510 5960
                44</a></p>
            <p><i class="fa fa-envelope"></i><strong>email :</strong>
              <a class="tel-no" href="mailto:thai_emperor@hotmail.com"> thai_emperor@hotmail.com</a>
            </p>
          </div>
          <ul class="list-inline footer-social-list">
            <!-- <li><a href="#"><i class="flaticon-twitter1"></i></a></li> -->
            <li><a target="_blank"
                href="https://www.facebook.com/Thai-Emperor-Restaurant-Takeaway-112619794007991/"><img
                  src="/images/home/facebook.png" alt="Facebook" style="
    width: 32px;
"></a></li>
            <li><a target="_blank"
                href="https://www.tripadvisor.co.uk/Restaurant_Review-g1962041-d23161948-Reviews-Thai_Emperor-Swanley_Sevenoaks_District_Kent_England.html"><img
                  src="/images/home/tripadd.png" style="
    width: 32px;
" alt="Facebook"></a></li>
            <!--
            <li><a href="#"><i class="flaticon-linkedin11"></i></a></li>
            <li><a href="#"><i class="flaticon-google116"></i></a></li>
            <li><a href="#"><i class="flaticon-pinterest34"></i></a></li>
            -->
          </ul>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
          <h3 class="footer-title"><img src="/images/icons/intagram.png" width="auto" alt=""> Instagram </h3>
          <div class="images-gellary">
            <ul>
              <li><a target="_blank" href="https://www.instagram.com/thai.emperor.of.swanley/"><img
                    src="/images/home/footer-img-01.jpg" alt="Instagram 01"></a></li>
              <li><a target="_blank" href="https://www.instagram.com/thai.emperor.of.swanley/"><img
                    src="/images/home/footer-img-02.jpg" alt="Instagram 02"></a></li>
              <li><a target="_blank" href="https://www.instagram.com/thai.emperor.of.swanley/"><img
                    src="/images/home/footer-img-03.jpg" alt="Instagram 03"></a></li>
              <li><a target="_blank" href="https://www.instagram.com/thai.emperor.of.swanley/"><img
                    src="/images/home/footer-img-04.jpg" alt="Instagram 04"></a></li>
              <li><a target="_blank" href="https://www.instagram.com/thai.emperor.of.swanley/"><img
                    src="/images/home/footer-img-05.jpg" alt="Instagram 05"></a></li>
              <li><a target="_blank" href="https://www.instagram.com/thai.emperor.of.swanley/"><img
                    src="/images/home/footer-img-06.jpg" alt="Instagram 06"></a></li>
            </ul>
          </div>
          {{-- <p><img style="max-width:245px" class="img-responsive" src="/images/home/Cobra.jpg" alt="Cobra"></p> --}}
        </div>

      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="copy-right pull-left">
            <p>&copy;
              <?php echo date('Y'); ?> {{config('app.name')}}. All Rights Reserved.
            </p>
          </div>

          <div class="back-top pull-right">
            <i class="fa fa-angle-up "></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!--==| Footer section End|==-->

<!--==| offcanvas-menu |==-->
<nav id="menu" onclick="mmCtrl(this)">
  <ul>
    <li><a class="offcanvas-link" href="/#home">Home</a></li>
    <li><a class="offcanvas-link" href="/#about-us">About</a></li>
    {{-- <li><a class="offcanvas-link" href="/#service">service</a></li> --}}
    <li><a class="offcanvas-link" href="/#food-menu">Food Menu</a></li>
    <li><a class="offcanvas-link" href="https://www.thaiemperor.uk/order.aspx"> Online Order</a></li>
    <li><a class="offcanvas-link" href="/reservations">Reservations </a></li>
    <li><a class="offcanvas-link" href="/#gallery">Gallery </a></li>
    <li><a class="offcanvas-link" href="/#blogs">Blog </a></li>
    {{-- <li><a class="page-scroll" href="/#blogs">Blog </a></li> --}}
    <li><a class="offcanvas-link" href="{{ route('event.details',4) }}">Events</a></li>
  </ul>
</nav>

<script type="text/javascript">
  var mainhtml = document.getElementsByClassName('cssanimations');
      var viewmenu = document.getElementById('offcanvas-trigger-effects');
      var mobomenu = document.getElementById('menu');

      viewmenu.addEventListener('click', function(){
        mainhtml[0].classList.add('mm-opened', 'mm-background', 'mm-opening');
        mobomenu.classList.add('mm-current', 'mm-opened');
      });

      function mmCtrl(elm){
        // console.log(mainhtml[0].classList)
        mainhtml[0].classList.remove('mm-opened', 'mm-background', 'mm-opening');
        elm.classList.remove('mm-current', 'mm-opened');

      }
</script>

</div><!-- /wrapper