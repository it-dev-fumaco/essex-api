<section class="latest-property">
  <div class="container" style="margin-top: -50px;">
    <div class="row">
      <div class="col-md-12 wow fadeIn" data-wow-delay="0.8s">
        <h3 class="section-title center">Company Events</h3>
        <div id="latest-property" class="owl-carousel">
          @foreach($albums as $album)
          <div class="item">
            <div class="property-main">
              <div class="property-wrap">
                <div class="property-item">
                  <figure class="item-thumb">
                    <a class="hover-effect" href="/gallery/album/{{ $album->id }}">
                      @if($album->featured_image)
                      <img src="{{ asset('storage/'.$album->featured_image) }}" alt="" width="340" height="210">
                      @else
                      <img src="{{ asset('storage/img/notfound.png') }}" alt="" width="340" height="210">
                      @endif
                    </a>
                  </figure>
                  <div class="item-body">
                    <h3 class="property-title">
                      <a href="/gallery/album/{{ $album->id }}">{{ $album->name }}</a>
                    </h3>
                  </div>
                </div>
              </div>
              <div class="item-foot date hide-on-list">
                <div class="pull-left">
                  <p class="prop-user-agent">
                    <i class="icon-user"></i> <a href="/gallery/album/{{ $album->id }}">{{ $album->created_by }}</a>
                  </p>
                </div>
                <div class="pull-right">
                  <p class="prop-date">
                    <i class="icon-calendar"></i>{{ date('m-d-Y', strtotime($album->created_at)) }}
                  </p>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>