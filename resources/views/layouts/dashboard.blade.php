<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Inventory App, Stock App, Expired product management system, Product Mnagement system, stock management system" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MiniVentory') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{asset('css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="{{asset('css/morris.css')}}" type="text/css"/>
    <!-- Graph CSS -->
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet"> 
    <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- lined-icons -->
    <link rel="stylesheet" href="{{asset('css/icon-font.min.css')}}" type='text/css' />
</head>
<body>
    <div class="page-container">
        <!--/content-inner-->
     <div class="left-content">
            <div class="mother-grid-inner">
                  <!--header start here-->
                     <div class="header-main">
                         <div class="logo-w3-agile">
                                     <h1><a href="{{route('home')}}">MiniVent</a></h1>
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
            <strong>Whoops!</strong> {{session('warning')}}<br><br>
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
         <p>© 2020 MiniVentory. All Rights Reserved | Design and Developed By   <a href="https://mbh.ng" target="_blank">MybudgetHosting</a> </p>
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
                                
                                
                                 <li id="menu-academico" ><a href="inbox.html"><i class="fa fa-envelope nav_icon"></i><span>Inbox</span><div class="clearfix"></div></a></li>
                            <li><a href="gallery.html"><i class="fa fa-picture-o" aria-hidden="true"></i><span>Gallery</span><div class="clearfix"></div></a></li>
                            <li id="menu-academico" ><a href="charts.html"><i class="fa fa-bar-chart"></i><span>Charts</span><div class="clearfix"></div></a></li>
                             <li id="menu-academico" ><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Short Codes</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                                   <ul id="menu-academico-sub" >
                                   <li id="menu-academico-avaliacoes" ><a href="icons.html">Icons</a></li>
                                    <li id="menu-academico-avaliacoes" ><a href="typography.html">Typography</a></li>
                                    <li id="menu-academico-avaliacoes" ><a href="faq.html">Faq</a></li>
                                  </ul>
                                </li>
                            <li id="menu-academico" ><a href="errorpage.html"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i><span>Error Page</span><div class="clearfix"></div></a></li>
                              <li id="menu-academico" ><a href="#"><i class="fa fa-cogs" aria-hidden="true"></i><span> UI Components</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                                   <ul id="menu-academico-sub" >
                                   <li id="menu-academico-avaliacoes" ><a href="button.html">Buttons</a></li>
                                    <li id="menu-academico-avaliacoes" ><a href="grid.html">Grids</a></li>
                                  </ul>
                                </li>
                             <li><a href="tabels.html"><i class="fa fa-table"></i>  <span>Tables</span><div class="clearfix"></div></a></li>
                            <li><a href="maps.html"><i class="fa fa-map-marker" aria-hidden="true"></i>  <span>Maps</span><div class="clearfix"></div></a></li>
                            <li id="menu-academico" ><a href="#"><i class="fa fa-file-text-o"></i>  <span>Pages</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                                 <ul id="menu-academico-sub" >
                                    <li id="menu-academico-boletim" ><a href="calendar.html">Calendar</a></li>
                                    <li id="menu-academico-avaliacoes" ><a href="signin.html">Sign In</a></li>
                                    <li id="menu-academico-avaliacoes" ><a href="signup.html">Sign Up</a></li>
                                    

                                  </ul>
                             </li>
                            <li><a href="#"><i class="fa fa-check-square-o nav_icon"></i><span>Forms</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                              <ul>
                                <li><a href="input.html"> Input</a></li>
                                <li><a href="validation.html">Validation</a></li>
                            </ul>
                            </li>
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
<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{asset('js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- /Bootstrap Core JavaScript -->	   
<!-- morris JavaScript -->	
<script src="{{asset('js/raphael-min.js')}}"></script>
<script src="{{asset('js/morris.js')}}"></script>
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

//CHARTS
function gd(year, day, month) {
return new Date(year, month - 1, day).getTime();
}

graphArea2 = Morris.Area({
element: 'hero-area',
padding: 10,
behaveLikeLine: true,
gridEnabled: false,
gridLineColor: '#dddddd',
axes: true,
resize: true,
smooth:true,
pointSize: 0,
lineWidth: 0,
fillOpacity:0.85,
data: [
{period: '2014 Q1', iphone: 2668, ipad: null, itouch: 2649},
{period: '2014 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
{period: '2014 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
{period: '2014 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
{period: '2015 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
{period: '2015 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
{period: '2015 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
{period: '2015 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
{period: '2016 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
{period: '2016 Q2', iphone: 8442, ipad: 5723, itouch: 1801}
],
lineColors:['#ff4a43','#a2d200','#22beef'],
xkey: 'period',
redraw: true,
ykeys: ['iphone', 'ipad', 'itouch'],
labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
pointSize: 2,
hideHover: 'auto',
resize: true
});


});
</script>
</body>
</html>
