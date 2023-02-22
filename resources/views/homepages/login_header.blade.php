    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--a class="navbar-brand" href="/"></a-->
                <img class="" src="/images/logo.png" alt="" style="width:100px;background:#fff;margin-bottom:-30px;text-align:center;padding: 0 10px">
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/">Home</a></li>
                    <li><a href="/admin/login">Login</a></li>
                    <li><a href="#">Help ?</a></li>
                    <!--
                    <li class=" active ">

                        @if(Request::is('login'))

                        <a href="/admin">
                            <i class="material-icons">fingerprint</i> Admin Login
                        </a>

                        @else

                        <a href="/login">
                            <i class="material-icons">fingerprint</i> User Login
                        </a>                        

                        @endif
                    </li>
                -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">

@include('partials.messages')