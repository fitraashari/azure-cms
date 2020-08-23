<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

<title>AzuRyu Blog - {{empty($post)?'Diamond Is Unbreakable':$post->title}}</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('blog/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{asset('blog/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{asset('blog/css/clean-blog.min.css')}}" rel="stylesheet">
{{-- share button --}}
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f40cd130c92c50012fc237c&product=inline-share-buttons" async="async"></script>
<style>
  .bg-gradient-purple{background: rgb(226,0,255);
background: linear-gradient(274deg, rgba(226,0,255,0.7595413165266106) 32%, rgba(0,123,255,0.6502976190476191) 100%);
  }
</style>
</head>

<body>

  <!-- Navigation -->
  @include('blog.layouts.nav')

  <!-- Page Header -->
  {{-- @include('blog.layouts.header') --}}

  <!-- Main Content -->
 
    @yield('content')
  

  <hr>

  <!-- Footer -->
  @include('blog.layouts.footer')

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('blog/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('blog/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('blog/js/clean-blog.min.js')}}"></script>
  <!--Start of Tawk.to Script-->
<script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/5f40f4dacc6a6a5947ade0c6/default';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->
    {{-- particle --}}
<script src="{{asset('vendor/particles/particles.js')}}"></script>
<script>
  /* particlesJS.load(@dom-id, @path-json, @callback (optional)); */
particlesJS.load('particles-js', 'assets/particles.json', function() {
  console.log('callback - particles.js config loaded');
});

</script>
  @stack('script-body')
  @include('sweetalert::alert')
</body>

</html>
