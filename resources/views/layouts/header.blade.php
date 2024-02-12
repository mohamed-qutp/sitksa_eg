<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title', __('messages.title'))</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        
        <meta name="author" content="SIT">
        <meta name="description" content="@yield('metadesc')">
        
        <meta name="keywords" content="@foreach ($metaKeywords as $metaKeywords){{ $metaKeywords->text }}, @endforeach">
        @foreach ($metaDescription as $metaDescription)<meta name="description" content="{{ $metaDescription->text }}">@endforeach
        <link rel="canonical" href="{{url()->current()}}">
        <!-- Favicon -->
        <link href="{{ asset('img/logos/logo-2.png') }}" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
         <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.min.css')}}" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        @if (session()->get('locale') == "en")
            <link href="{{ asset('lib/slick/slick.css')}}" rel="stylesheet">
            <link href="{{ asset('lib/slick/slick-theme.css')}}" rel="stylesheet">
            <link href="{{ asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

            <!-- Template Stylesheet -->
            <link href="{{ asset('css/style.css')}}" rel="stylesheet">
        @else
            <link href="{{ asset('lib/rtlslick/slick.css')}}" rel="stylesheet">
            <link href="{{ asset('lib/rtlslick/slick-theme.css')}}" rel="stylesheet">
            <link href="{{ asset('lib/rtllightbox/css/lightbox.min.css')}}" rel="stylesheet">

            <!-- Template Stylesheet -->
            <link href="{{ asset('css/rtlstyle.css')}}" rel="stylesheet">
        @endif
    </head>

    <body>
        <div class="wrapper">
            {{-- style="background-image: url('{{ asset('img/bg.jpg') }}');
            background-size: cover;" --}}
            @include('layouts.navbar')

            {{-- errors message --}}
            @if (session()->has('errors'))
            @php $msg = session()->get('errors'); @endphp
             <!-- Modal -->
  <div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!--<h4 class="modal-title">Modal Header</h4>-->
        </div>
        <div class="modal-body">
          <p><strong>{{ session()->get('errors') }}</strong></p>
        </div>
        <div class="modal-footer">
            @if (session()->get('locale') == "en")
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          @else
          <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
          @endif
        </div>
      </div>
      
    </div>
  </div>
  
</div>
                
                @php
                    Session::forget('errors');
                @endphp
            @endif

            {{-- success message --}}
            @if (session()->has('msg'))
            @php $msg = session()->get('msg'); @endphp
                    <!-- Modal -->
  <div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!--<h4 class="modal-title">Modal Header</h4>-->
        </div>
        <div class="modal-body">
            @if (session()->get('locale') == "en")
          <p><strong>{{ session()->get('msg') }}</strong><i class="fa-solid fa-check" style="color: #98b9f0;"></i></p>
          @else
          <p style="text-align:right;"><strong>{{ session()->get('msg') }}</strong><i class="fa-solid fa-check" style="color: #98b9f0;"></i></p>
          @endif
        </div>
        <div class="modal-footer">
            @if (session()->get('locale') == "en")
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          @else
          <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
          @endif
        </div>
      </div>
      
    </div>
  </div>
  
</div>
                @php
                    Session::forget('msg');
                @endphp
            @endif

            @yield('body','Home Page')

        </div>
       
@include('layouts.footer')

<!-- Start of LiveChat (www.livechatinc.com) code -->
    <script>
        window.__lc = window.__lc || {};
        window.__lc.license = 13465794;
        ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
    </script>
    <noscript><a href="https://www.livechatinc.com/chat-with/13465794/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechatinc.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
    <!-- End of LiveChat code -->
<script type="text/javascript">
        var msg = "{{ $msg ?? null }}";
        if(msg)
         {
         $("#myModal").modal();
         }
       </script>
    </body>
</html>
