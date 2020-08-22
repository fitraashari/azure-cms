@extends('blog.master')
@section('content')
<header class="masthead" style="background-image: url('{{$post->featured}}')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
          <h1>{{$post->title}}</h1>
          
            <span class="meta">Posted by
                <a href="#">{{$post->user->name}}</a><br>
                on {{\Carbon\Carbon::parse($post->created_at)->format('l d, Y')}} </span>
            {{-- <span class="subheading">Diamond Is Unbreakable</span> --}}
          </div>
        </div>
      </div>
    </div>
  </header>
<article>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 mx-auto">
          <div class="card border-0">
          
              <div class="card-body">
                {!!$post->content!!}
                <p class="post-meta"><hr><small>
                    @foreach ($post->tag as $tag)
                    #{{$tag->name}}
                    @endforeach
                    <span style="float:right">
                        <i class="far fa-clock"></i> {{$post->created_at->diffforHumans()}}
                    </span></small></p>
              </div>
              <div class="card-footer">
                <div class="sharethis-inline-share-buttons"></div>
              </div>
            
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-12  mt-2">
              <div class="card">
                  <div class="card-header">Comment</div>
                  <div class="card-body">
                    <div id="disqus_thread"></div>
                    <script>
                    
                    /**
                    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                    /*
                    var disqus_config = function () {
                    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                    };
                    */
                    (function() { // DON'T EDIT BELOW THIS LINE
                    var d = document, s = d.createElement('script');
                    s.src = 'https://azure-4.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                    })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                                
                  </div>
              </div>
          </div>
      </div>
    </div>
  </article>
  
@endsection
@push('script-body')
<script id="dsq-count-scr" src="//azure-4.disqus.com/count.js" async></script>
@endpush