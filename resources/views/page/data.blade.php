@foreach($postsShare as $post)
    <div class="col-md-6 col-lg-12 ftco-animate">
        <div class="blog-entry d-lg-flex">
            <div class="half">
                <a href="single.html" class="img d-flex align-items-end" style="background-image: url({{asset('storage/upload/images/'.$post->image)}});">
                    <div class="overlay"></div>
                </a>
            </div>
            <div class="text px-md-4 px-lg-5 half pt-3">
                <p class="meta d-flex"><span class="pr-3">Dessert</span><span class="ml-auto pl-3">March 01, 2018</span></p>
                <h3><a href="single.html">Tasty &amp; Delicious Foods</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.
                </p>
                <p class="mb-0"><a href="single.html" class="btn btn-primary">Read More <span class="icon-arrow_forward ml-4"></span></a></p>
            </div>
        </div>
    </div>
@endforeach

