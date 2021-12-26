

<style>
.page-loader-wrapper {
  z-index: 99999999;
  position: fixed;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  background: #ffffff;
  overflow: hidden;
  text-align: center; }
  
  .page-loader-wrapper .loader {
    position: relative;
    top: calc(50% - 30px); }

/* Preloaders ================================== */
.md-preloader{
 margin:10px;	

}
.md-preloader .pl-unipa {
  stroke: #ffc000; 
  }

.md-preloader.pl-size-md {
  width: 50px; }

 
.md-preloader.pl-size-lg {
  width: 70px; } 
  
  
.md-preloader {
    font-size: 0;
    display: inline-block;
}

.md-preloader svg {
    -webkit-animation: inner 1320ms linear infinite;
    animation: inner 1320ms linear infinite
}

.md-preloader svg circle {
    fill: none;
    stroke: #448aff;
    stroke-linecap: square;
    -webkit-animation: arc 1320ms cubic-bezier(.8, 0, .4, .8) infinite;
    animation: arc 1320ms cubic-bezier(.8, 0, .4, .8) infinite
}

@-webkit-keyframes outer {
    0% {
        -webkit-transform: rotate(0);
        transform: rotate(0)
    }
    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg)
    }
}

@keyframes outer {
    0% {
        -webkit-transform: rotate(0);
        transform: rotate(0)
    }
    100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg)
    }
}

@-webkit-keyframes inner {
    0% {
        -webkit-transform: rotate(-100.8deg);
        transform: rotate(-100.8deg)
    }
    100% {
        -webkit-transform: rotate(0);
        transform: rotate(0)
    }
}

@keyframes inner {
    0% {
        -webkit-transform: rotate(-100.8deg);
        transform: rotate(-100.8deg)
    }
    100% {
        -webkit-transform: rotate(0);
        transform: rotate(0)
    }
}

@-webkit-keyframes arc {
    0% {
        stroke-dasharray: 1 210.48670779px;
        stroke-dashoffset: 0
    }
    40% {
        stroke-dasharray: 151.55042961px, 210.48670779px;
        stroke-dashoffset: 0
    }
    100% {
        stroke-dasharray: 1 210.48670779px;
        stroke-dashoffset: -151.55042961px
    }
}

@keyframes arc {
    0% {
        stroke-dasharray: 1 210.48670779px;
        stroke-dashoffset: 0
    }
    40% {
        stroke-dasharray: 151.55042961px, 210.48670779px;
        stroke-dashoffset: 0
    }
    100% {
        stroke-dasharray: 1 210.48670779px;
        stroke-dashoffset: -151.55042961px
    }
}

.unipa{
	color:#81007f;
	font-size:15px;	
	font-weight:bold;
}

.unipa-lg{
	color:#81007f;
	font-size:25px;	
	font-weight:bold;
}
</style>