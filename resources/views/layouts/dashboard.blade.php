<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Inventory App, Stock App, Expired product management system, Product Mnagement system, stock management system" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{Auth::user()->company->name ?? 'E-Ventory'}} | {{Auth::user()->company->tagline ?? ''}}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.png" type="image/png">

    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="css/morris.css" type="text/css"/>
    <!-- Graph CSS -->
    <link href="css/font-awesome.css" rel="stylesheet"> 
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- lined-icons -->
    <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
</head>
<body>
    <div class="page-container">
        <!--/content-inner-->
     <div class="left-content">
            <div class="mother-grid-inner">
                  <!--header start here-->
                     <div class="header-main">
                         <div class="logo-w3-agile">
                                     <h1 style="overflow:visible;"><a href="{{route('home')}}">{{\Illuminate\Support\Str::limit(Auth::user()->company->name, 7) }}</a></h1>
                                 </div>
						<div class="profile_details w3l pull-right">		
								<ul>
									<li class="dropdown profile_details_drop">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
												<div class="user-name">
													<p> {{ Auth::user()->username }}</p>
													<span>Administrator</span>
												</div>
												<i class="fa fa-angle-down"></i>
												<i class="fa fa-angle-up"></i>
												<div class="clearfix"></div>	
										</a>
										<ul class="dropdown-menu drp-mnu">
											<li> <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out">  
                                   {{ __('Logout') }}</i></a> 
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                  </li>
										</ul>
									</li>
								</ul>
							</div>
							
				     <div class="clearfix"> </div>	
				</div>

        <main class="py-4">
          @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> {{session('success')}}
            </div>
            @endif
    
            @if ($message = Session::get('info'))
            <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info!</strong> {{session('info')}}
            </div>
            @endif
    
            @if ($message = Session::get('warning'))
            <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Warning!</strong> {{session('warning')}}
            </div>
            @endif
    
            @if ($errors->any())
            <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Whoops!</strong> {{session('danger')}}<br><br>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
            </div>
            @endif
            @yield('content')
        </main>

     <!--//w3-agileits-pane-->	
<!-- script-for sticky-nav -->
		<script>
            $(document).ready(function() {
                 var navoffeset=$(".header-main").offset().top;
                 $(window).scroll(function(){
                    var scrollpos=$(window).scrollTop(); 
                    if(scrollpos >=navoffeset){
                        $(".header-main").addClass("fixed");
                    }else{
                        $(".header-main").removeClass("fixed");
                    }
                 });
                 
            });
            </script>
            <!-- /script-for sticky-nav -->
    <!--inner block start here-->
    <div class="inner-block">
    
    </div>
    <!--inner block end here-->
    <!--copy rights start here-->
    <div class="copyrights">
         <p>© 2020 MiniVentory. All Rights Reserved | Designed and Developed By   <a href="https://mbh.ng" target="_blank">MybudgetHosting</a> </p>
    </div>	
    <!--COPY rights end here-->
    </div>
    </div>
      <!--//content-inner-->
      
    	<!--/sidebar-menu-->
        <div class="sidebar-menu">
            <header class="logo1">
                <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
            </header>
                <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                   <div class="menu">
                            <ul id="menu" >
                                <li><a href="{{route('home')}}"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
                                
                                 <li id="menu-academico" ><i class="fa fa-list" aria-hidden="true"></i><a href="{{route('category.index')}}"><span>Category</span><div class="clearfix"></div></a></li>
                            <li id="menu-academico"><i class="fa fa-user" aria-hidden="true"></i><a href="{{route('brand.index')}}"><span>Brand</span><div class="clearfix"></div></a></li>
                             <li><i class="fa fa-box" aria-hidden="true"></i><a href="{{route('products.index')}}"> <span>Product</span><div class="clearfix"></div></a></li>
                            <li><i class="fa fa-icon" aria-hidden="true"></i><a href="{{route('checkout.index')}}"><span>Checkout</span><div class="clearfix"></div></a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="clearfix"></div>		
                    </div>
                    <script>
                      var toggle = true;
                            
                      $(".sidebar-icon").click(function() {                
                        if (toggle)
                        {
                        $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
                        $("#menu span").css({"position":"absolute"});
                        }
                        else
                        {
                        $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
                        setTimeout(function() {
                          $("#menu span").css({"position":"relative"});
                        }, 400);
                        }
                              
                              toggle = !toggle;
                            });
                      </script>
<!--js -->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/app.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
<!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script>
$(document).ready(function() {
//BOX BUTTON SHOW AND CLOSE
jQuery('.small-graph-box').hover(function() {
jQuery(this).find('.box-button').fadeIn('fast');
}, function() {
jQuery(this).find('.box-button').fadeOut('fast');
});
jQuery('.small-graph-box .box-close').click(function() {
jQuery(this).closest('.small-graph-box').fadeOut(200);
return false;
});

});
</script>
@yield('extra-js')
</body>
</html>
