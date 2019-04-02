<!DOCTYPE html>
<!-- saved from url=(0024)http://pos.utamaweb.com/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="./pos.utamaweb.com_files/jquery.min.js.download"></script>
    <script src="./pos.utamaweb.com_files/jquery-ui.min.js.download"></script>
    <link rel="stylesheet" media="screen" href="./pos.utamaweb.com_files/css">
    <link rel="stylesheet" media="screen" href="./pos.utamaweb.com_files/font-awesome.min.css">


    <style>
     * {
         -moz-box-sizing:border-box;
         -webkit-box-sizing:border-box;
         box-sizing:border-box;
     }

     html, body, div, span, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre,
     abbr, address, cite, code, del, dfn, em, img, ins, kbd, q, samp,
     small, strong, sub, sup, var, b, i, dl, dt, dd, ol, ul, li,
     fieldset, form, label, legend, caption, article, aside, canvas, details, figcaption, figure,  footer, header, hgroup,
     menu, nav, section, summary, time, mark, audio, video {
         margin:0;
         padding:0;
         border:0;
         outline:0;
         vertical-align:baseline;
         background:transparent;
     }

     article, aside, details, figcaption, figure, footer, header, hgroup, nav, section {
         display: block;
     }

     html {
         font-size: 16px;
         line-height: 24px;
         width:100%;
         height:100%;
         -webkit-text-size-adjust: 100%;
         -ms-text-size-adjust: 100%;
         overflow-y:scroll;
         overflow-x:hidden;
     }

     img {
         vertical-align:middle;
         max-width: 100%;
         height: auto;
         border: 0;
         -ms-interpolation-mode: bicubic;
     }

     body {
         min-height:100%;
         -webkit-font-smoothing: subpixel-antialiased;
     }

     .clearfix {
	       clear:both;
	       zoom: 1;
     }
     .clearfix:before, .clearfix:after {
         content: "\0020";
         display: block;
         height: 0;
         visibility: hidden;
     } 
     .clearfix:after {
         clear: both;
     }
    </style>
    <style>
  .plain.error-page-wrapper {
    font-family: 'Source Sans Pro', sans-serif;
    background-color:#6355bc;
    padding:0 5%;
    position:relative;
  }

  .plain.error-page-wrapper .content-container {
    -webkit-transition: left .5s ease-out, opacity .5s ease-out;
    -moz-transition: left .5s ease-out, opacity .5s ease-out;
    -ms-transition: left .5s ease-out, opacity .5s ease-out;
    -o-transition: left .5s ease-out, opacity .5s ease-out;
    transition: left .5s ease-out, opacity .5s ease-out;
    max-width:400px;
    position:relative;
    left:-30px;
    opacity:0;
  }

  .plain.error-page-wrapper .content-container.in {
    left: 0px;
    opacity:1;
  }

  .plain.error-page-wrapper .head-line {
    transition: color .2s linear;
    font-size:48px;
    line-height:60px;
    color:rgba(255,255,255,.2);
    letter-spacing: -1px;
    margin-bottom: 5px;
  }
  .plain.error-page-wrapper .subheader {
    transition: color .2s linear;
    font-size:36px;
    line-height:46px;
    color:#fff;
  }
  .plain.error-page-wrapper hr {
    height:1px;
    background-color: rgba(255,255,255,.2);
    border:none;
    width:250px;
    margin:35px 0;
  }
  .plain.error-page-wrapper .context {
    transition: color .2s linear;
    font-size:18px;
    line-height:27px;
    color:#fff;
  }
  .plain.error-page-wrapper .context p {
    margin:0;
  }
  .plain.error-page-wrapper .context p:nth-child(n+2) {
    margin-top:12px;
  }
  .plain.error-page-wrapper .buttons-container {
    margin-top: 45px;
    overflow: hidden;
  }
  .plain.error-page-wrapper .buttons-container a {
    transition: color .2s linear, border-color .2s linear;
    font-size:14px;
    text-transform: uppercase;
    text-decoration: none;
    color:#fff;
    border:2px solid white;
    border-radius: 99px;
    padding:8px 30px 9px;
    display: inline-block;
    float:left;
  }
  .plain.error-page-wrapper .buttons-container a:hover {
    background-color:rgba(255,255,255,.05);
  }
  .plain.error-page-wrapper .buttons-container a:first-child {
    margin-right:25px;
  }

  @media screen and (max-width: 485px) {
    .plain.error-page-wrapper .header {
      font-size:36px;
     }
    .plain.error-page-wrapper .subheader {
      font-size:27px;
      line-height:38px;
     }
    .plain.error-page-wrapper hr {
      width:185px;
      margin:25px 0;
     }

    .plain.error-page-wrapper .context {
      font-size:16px;
      line-height: 24px;
     }
    .plain.error-page-wrapper .buttons-container {
      margin-top:35px;
    }

    .plain.error-page-wrapper .buttons-container a {
      font-size:13px;
      padding:8px 0 7px;
      width:45%;
      text-align: center;
    }
    .plain.error-page-wrapper .buttons-container a:first-child {
      margin-right:10%;
    }
  }
</style>

    <style>

    .background-color {
      background-color: rgba(0, 128, 128, 1) !important;
    }


    .primary-text-color {
      color: rgba(255, 204, 0, 1) !important;
    }

    .secondary-text-color {
      color: rgba(255, 255, 255, 1) !important;
    }

    .sign-text-color {
      color: #FFBA00 !important;
    }

    .sign-frame-color {
      color: #343C3F;
    }

    .pane {
      background-color: #FFFFFF !important;
    }

    .border-button {
      color: rgba(255, 255, 255, 1) !important;
      border-color: rgba(255, 255, 255, 1) !important;
    }
    .button {
      background-color: rgba(255, 255, 255, 1) !important;
      color: #FFFFFF !important;
    }

    .shadow {
      box-shadow: 0 0 60px #000000;
    }

</style>

  <link type="text/css" href="./pos.utamaweb.com_files/optanon.css" rel="stylesheet"><style>#optanon ul#optanon-menu li { background-color:  !important }#optanon ul#optanon-menu li.menu-item-selected { background-color:  !important }#optanon #optanon-popup-wrapper .optanon-white-button-middle { background-color: #FFAB00 !important }.optanon-alert-box-wrapper .optanon-alert-box-button-middle { background-color: #FFAB00 !important; border-color: #FFAB00 !important; }#optanon #optanon-popup-wrapper .optanon-white-button-middle button { color: #ffffff !important }.optanon-alert-box-wrapper .optanon-alert-box-button-middle button { color: #ffffff !important }#optanon #optanon-popup-bottom { background-color: #172B4D !important }#optanon.modern #optanon-popup-top, #optanon.modern #optanon-popup-body-left-shading { background-color: #172B4D !important }.optanon-alert-box-wrapper { background-color:#172B4D !important }.optanon-alert-box-wrapper .optanon-alert-box-bg p { color:#FFFFFF !important }#optanon, #optanon *, #optanon div, #optanon span, #optanon ul, #optanon li, #optanon a, #optanon p, .optanon-alert-box-wrapper * {
font-family: LLCircularWeb,"Helvetica Neue",Helvetica,sans-serif;
}


#optanon #optanon-popup-body h2 {
    position: absolute;
    top: -55px;
    font-size: 16px;
    font-weight: bold;
    color: rgb(255, 255, 255);
    margin: 5px 0px 0px 5px;
}
#optanon #optanon-popup-body .legacy-preference-banner-title {
    margin: 5px 0px 0px 5px;
    padding: 0px;
    color: #ffffff;
}
#optanon #optanon-popup-wrapper .optanon-white-button-middle a {
    color: #000000 !important; 
}
.optanon-alert-box-wrapper .optanon-alert-box-button-middle a {
    color: #000000 !important;
}
.optanon-alert-box-wrapper a {
    color: #ffffff !important; 
    text-indent: 1;
   font-weight: bold; 
  
}

.optanon-alert-box-button-middle, #optanon #optanon-popup-wrapper .optanon-white-button-middle {
   border-radius: 4px;
}
.optanon-alert-box-wrapper {
    margin: 4px;
    border-radius: 4px;
    width: 99.5%;
}

#optanon.modern #optanon-popup-top, #optanon.modern #optanon-popup-body-left-shading
{
    border-top-right-radius: 4px;
    border-top-left-radius: 4px;
}

#optanon #optanon-popup-bottom {
    border-bottom-left-radius: 4px;
    border-bottom-right-radius: 4px;
}
#optanon #optanon-popup-bottom-logo:after {
    content: 'OneTrust';
    color: #ffffff;
}
#optanon #optanon-popup-bottom-logo:before {
    content: 'Powered by';
    color: #ffffff;
}
.optanon-alert-box-wrapper .optanon-button-more .optanon-alert-box-button-middle a:before {
    content: '';
}
.optanon-alert-box-wrapper .optanon-button-allow .optanon-alert-box-button-middle a:before {
    content: '';
}
#optanon #optanon-popup-top .optanon-close, .optanon-alert-box-wrapper .optanon-alert-box-corner-close a {
    right: 10px;
}
 @media only screen and (max-width: 47em) {
 .optanon-alert-box-wrapper.hide-cookie-setting-button .optanon-alert-box-body {
    margin-right: auto;
    padding-right: 5px;
}
}</style><script type="text/javascript" src="./pos.utamaweb.com_files/jquery-3.3.1.min.js.download" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script><script type="text/javascript" async="" src="./pos.utamaweb.com_files/request"></script></head>
  <body class="plain error-page-wrapper background-color background-image">
    <div class="content-container in" style="top: 123px;">
	<div class="head-line secondary-text-color">
		503
	</div>
	<div class="subheader primary-text-color">
		Maaf Anda tidak bisa mengakses halaman ini <br>
		silahkan hubungi admin.
	</div>
	<hr>
	<div class="clearfix"></div>
	<div class="context primary-text-color">
		<!-- doesn't use context_content because it's ALWAYS the same thing -->
    <p>
      You may want to head back to the homepage.<br>
      If you think something is broken, report a problem.
    </p>
	</div>
	<div class="buttons-container">
		<a class="border-button" href="https://utamaweb/" target="_blank">Go to homepage</a>
		<a class="border-button" href="mailto:marketing@utamaweb.com" target="_blank">Report a problem</a>
	</div>
</div>


    <script>
     function ErrorPage(container, pageType, templateName) {
       this.$container = $(container);
       this.$contentContainer = this.$container.find(templateName == 'sign' ? '.sign-container' : '.content-container');
       this.pageType = pageType;
       this.templateName = templateName;
     }

     ErrorPage.prototype.centerContent = function () {
       var containerHeight = this.$container.outerHeight()
         , contentContainerHeight = this.$contentContainer.outerHeight()
         , top = (containerHeight - contentContainerHeight) / 2
         , offset = this.templateName == 'sign' ? -100 : 0;

       this.$contentContainer.css('top', top + offset);
     };

     ErrorPage.prototype.initialize = function () {
       var self = this;

       this.centerContent();
       this.$container.on('resize', function (e) {
         e.preventDefault();
         e.stopPropagation();
         self.centerContent();
       });

       // fades in content on the plain template
       if (this.templateName == 'plain') {
         window.setTimeout(function () {
           self.$contentContainer.addClass('in');
         }, 500);
       }

       // swings sign in on the sign template
       if (this.templateName == 'sign') {
         $('.sign-container').animate({textIndent : 0}, {
           step : function (now) {
             $(this).css({
               transform : 'rotate(' + now + 'deg)',
               'transform-origin' : 'top center'
             });
           },
           duration : 1000,
           easing : 'easeOutBounce'
         });
       }
     };


     ErrorPage.prototype.createTimeRangeTag = function(start, end) {
       return (
         '<time utime=' + start + ' simple_format="MMM DD, YYYY HH:mm">' + start + '</time> - <time utime=' + end + ' simple_format="MMM DD, YYYY HH:mm">' + end + '</time>.'
       )
     };


     ErrorPage.prototype.handleStatusFetchSuccess = function (pageType, data) {
       if (pageType == '503') {
         $('#replace-with-fetched-data').html(data.status.description);
       } else {
         if (!!data.scheduled_maintenances.length) {
           var maint = data.scheduled_maintenances[0];
           $('#replace-with-fetched-data').html(this.createTimeRangeTag(maint.scheduled_for, maint.scheduled_until));
           $.fn.localizeTime();
         }
         else {
           $('#replace-with-fetched-data').html('<em>(there are no active scheduled maintenances)</em>');
         }
       }
     };


     ErrorPage.prototype.handleStatusFetchFail = function (pageType) {
       $('#replace-with-fetched-data').html('<em>(enter a valid Statuspage url)</em>');
     };


     ErrorPage.prototype.fetchStatus = function (pageUrl, pageType) {
       //console.log('in app.js fetch');
       if (!pageUrl || !pageType || pageType == '404') return;

       var url = ''
         , self = this;

       if (pageType == '503') {
         url = pageUrl + '/api/v2/status.json';
       }
       else {
         url = pageUrl + '/api/v2/scheduled-maintenances/active.json';
       }

       $.ajax({
         type : "GET",
         url : url,
       }).success(function (data, status) {
         //console.log('success');
         self.handleStatusFetchSuccess(pageType, data);
       }).fail(function (xhr, msg) {
         //console.log('fail');
         self.handleStatusFetchFail(pageType);
       });

     };
     var ep = new ErrorPage('body', "404", "plain");
     ep.initialize();

     // hack to make sure content stays centered >_<
     $(window).on('resize', function() {
       $('body').trigger('resize')
     });

    </script>

    
      <!-- OneTrust Cookies Consent Notice (statuspage.io, en-GB) start -->
  <script src="./pos.utamaweb.com_files/0800f092-2124-46ec-b11d-b4f48b677302.js.download" type="text/javascript" charset="UTF-8"></script>
  <script type="text/javascript">
    function OptanonWrapper() { }
  </script>
  <!-- OneTrust Cookies Consent Notice (statuspage.io, en-GB) end -->

  <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH2Ofbbqzw157i2oLVxZIupLlfoNPuqdJgm1AhRaKVL8ZaVlrak6ITzik3qf%2f7PR2Gl%2fyAqvYwFZ%2bGkPZGmbN2sHipmlFbqJ9lsnbiSArs9i55HTdtDG4OxTK01ttAtH3CxORudfnMQ721a7jqgRXUq7LO0kx%2b8ApMHDG9oOMpgg5hWVPnJFiBxm0umZEEQvEoVa1dnevIDeMH6Cfcx2PV8y1fG%2fpxcWUZBXrToBiSfb%2bJyV6eHNMP3687QyQm7JilqYuriS0RAKsags%2bpUaZX67GI%2f6%2fsK21Ji5HKLs6cSnzUyDgOPRqVY2WhwBZNbn7%2fomO2yDBx3F28GnAQhXoStgzH5e33CZ6jQuEDP6ZWIO7SYhAyKK9cZIBXpctMz2XO74AnFt9YsiwlMz8E0P0zBVbY%2bO3LH8Qj%2b2NXjGScRBI1iWwintIaqZGoqtK31zDY2DCIrpc4H7PdUH%2bnP1DQ3tS%2bfS%2bZaeNzkkkqwRLJiF%2fh3afL2SxmdQRj6U5yUKBOuxpabbtLWKUohlW%2fLug5zV4lNvZ303eurrYhJktiO8r8%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script>

</body>
</html>