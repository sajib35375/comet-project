@extends('comet.layouts.app')

@section('title', $all_post->title)
@section('category','category' )


@section('content')

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
              @php
                $featured = json_decode($all_post->featured)
              @endphp
              @if($featured->post_type=='Image')
            <article class="post-single">
              <div class="post-info">
                <h2><a href="#">{{ $all_post->title }}</a></h2>
                <h6 class="upper"><span>By</span><a href="#">{{ $all_post->user->name }}</a><span class="dot"></span><span>{{ date('d F,Y',strtotime($all_post->created_at)) }}</span><span class="dot"></span>
                    @foreach($all_post->tag as $tag)
                    <a href="#" class="post-tag">{{ $tag->name }}</a>

                  @endforeach
                </h6>
              </div>
              <div class="post-media">
                <img src="{{ URL::to('') }}/admin/assets/img/{{ $featured->post_image }}" alt="">
              </div>
              <div class="post-body">
                {!! htmlspecialchars_decode($all_post->content) !!}
              </div>
            </article>

            @endif
              @if($featured->post_type=='Gallery')
                  <article class="post-single">
                      <div class="post-info">
                          <h2><a href="#">{{ $all_post->title }}</a></h2>
                          <h6 class="upper"><span>By</span><a href="#">{{ $all_post->user->name }}</a><span class="dot"></span><span>{{ date('d M,Y',strtotime($all_post->created_at)) }}</span><span class="dot"></span>
                              @foreach($all_post->tag as $tag)
                                  <a href="#" class="post-tag">{{ $tag->name }}</a>

                              @endforeach
                          </h6>
                      </div>
                      <div class="post-media">
                          <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true" class="flexslider nav-outside">
                              <ul class="slides">
                                  @foreach($featured->post_gallery as $gal)
                                      <li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;">
                                          <img src="{{ URL::to('') }}/admin/assets/img/{{ $gal }}" alt="" draggable="false">
                                      </li>
                                  @endforeach
                              </ul>
                          </div>
                      </div>
                      <div class="post-body">
                          {!! htmlspecialchars_decode($all_post->content) !!}

                      </div>
                  </article>
          @endif


              @if($featured->post_type=='Video')
                  <article class="post-single">
                      <div class="post-info">
                          <h2><a href="#">{{ $all_post->title }}</a></h2>
                          <h6 class="upper"><span>By</span><a href="#">{{ $all_post->user->name }}</a><span class="dot"></span><span>{{ date('d M,Y',strtotime($all_post->created_at)) }}</span><span class="dot"></span>
                              @foreach($all_post->tag as $tag)
                                  <a href="#" class="post-tag">{{ $tag->name }}</a>

                              @endforeach
                          </h6>
                      </div>
                      <div class="post-media">
                          <div class="media-video">
                              <iframe src="{{ $featured->post_video }}" frameborder="0"></iframe>
                          </div>
                      </div>
                      <div class="post-body">
                          {!! Str::of(htmlspecialchars_decode($all_post->content))->words(40) !!}

                      </div>
                  </article>
          @endif



          <!-- end of article-->
            <div id="comments">
              <h5 class="upper">3 Comments</h5>
              <ul class="comments-list">
                <li>
                  <div class="comment">
                    <div class="comment-pic">
                      <img src="images/team/1.jpg" alt="" class="img-circle">
                    </div>
                    <div class="comment-text">
                      <h5 class="upper">Jesse Pinkman</h5><span class="comment-date">Posted on 29 September at 10:41</span>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime distinctio et quam possimus velit dolor sunt nisi neque, harum, dolores rem incidunt, esse ipsa nam facilis eum doloremque numquam veniam.</p><a href="#" class="comment-reply">Reply</a>
                    </div>
                  </div>
                  <ul class="children">
                    <li>
                      <div class="comment">
                        <div class="comment-pic">
                          <img src="images/team/2.jpg" alt="" class="img-circle">
                        </div>
                        <div class="comment-text">
                          <h5 class="upper">Arya Stark</h5><span class="comment-date">Posted on 29 September at 10:41</span>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque porro quae harum dolorem exercitationem voluptas illum ipsa sed hic, cum corporis autem molestias suscipit, illo laborum, vitae, dicta ullam minus.</p><a href="#"
                          class="comment-reply">Reply</a>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
                <li>
                  <div class="comment">
                    <div class="comment-pic">
                      <img src="images/team/3.jpg" alt="" class="img-circle">
                    </div>
                    <div class="comment-text">
                      <h5 class="upper">Rust Cohle</h5><span class="comment-date">Posted on 29 September at 10:41</span>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deleniti sit beatae natus! Beatae velit labore, numquam excepturi, molestias reiciendis, ipsam quas iure distinctio quia, voluptate expedita autem explicabo illo.</p>
                      <a
                      href="#" class="comment-reply">Reply</a>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <!-- end of comments-->
            <div id="respond">
              <h5 class="upper">Leave a comment</h5>
              <div class="comment-respond">
                <form class="comment-form">
                  <div class="form-double">
                    <div class="form-group">
                      <input name="author" type="text" placeholder="Name" class="form-control">
                    </div>
                    <div class="form-group last">
                      <input name="email" type="text" placeholder="Email" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <textarea placeholder="Comment" class="form-control"></textarea>
                  </div>
                  <div class="form-submit text-right">
                    <button type="button" class="btn btn-color-out">Post Comment</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- end of comment form-->
          </div>
        @include('comet.layouts.parcial.sidebar')


        </div>
        <!-- end of row-->

      </div>
    </section>
@endsection
