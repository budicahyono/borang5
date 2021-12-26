@include('html.head')

@include('html.preloader')

<body>
<!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="md-preloader pl-size-md" style="width:50px;margin:auto 0;position:relative;">
                <svg viewbox="0 0 75 75">
                    <circle cx="37.5" cy="37.5" r="33.5" class="pl-unipa" stroke-width="7" />
                </svg>
            </div>
			
            <p class="unipa">Loading...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
           @include('template.header')
           @include('template.sidebar')
            
        </nav>

        <div id="page-wrapper" >

            <div class="container-fluid">

               @yield('content')

            </div>
            <!-- /.container-fluid -->

        </div>
		<div class="navbar-login navbar-static-bottom ">
			<p class="text-center" style="margin:5px">Borang Akademik Ver.2.0.0. Developed & Designed by Budizen, Powered by UNIPA. Copyright &copy; {{ date('Y') }} Manokwari, Papua Barat.</p>
		</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

      @include('html.script') 
</body>

</html>
