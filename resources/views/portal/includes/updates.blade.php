

<section class="search-properties section" style="margin: -30px 0 -50px 0;">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <h2 class="section-title center">Updates</h2>
         </div>
         <div class="col-md-9">
            <div class="inner-box contact-info">
               {{-- <h2 class="title-2">First Time Users</h2> --}}
               <div class="row">
                @foreach($updates as $update)
                <div class="col-md-12">
                    <span class="title-2" style="border: 0;">{{ $update->title }}</span>
                    @if(Auth::user())
                    @if(Auth::user()->user_group == 'Editor')
                    <a href="#" id="editPostBtn" data-image="{{ $update->featured_file }}" data-title="{{ $update->title }}" data-content="{{ $update->content }}" data-id="{{ $update->id }}"><i class="fa fa-pencil"></i> Edit</a> | <a href="#" id="deletePostBtn" data-title="{{ $update->title }}" data-id="{{ $update->id }}"><i class="fa fa-pencil"></i> Delete</a>
                     @endif
                     @endif
                     <br><br>
                        <span>{!! $update->content !!}</span>
                        <hr>
                </div>
                @endforeach
                  <div class="col-md-12" style="padding-top: 10px;">
                     <a href="/updates" class="btn btn-common">Read More</a>
                     <div class="clearfix"></div>
                  </div>
               </div>
            </div>
         </div>

         <aside id="sidebar" class="col-md-3 right-sidebar">
            
           <div class="widget widget-popular-posts">
               <h5 class="widget-title">Latest Updates</h5>
               <ul class="posts-list">
                @foreach($latest_news as $news)
                  <li>
                     <div class="widget-content">
                        <a href="#">{{ $news->title }}</a>
                        <span>{{ strip_tags(str_limit($news->content, 38)) }}<br>
                          <i class="icon-user"></i> {{ $news->employee_name }} 
                          <div class="pull-right">
                            <i class="icon-calendar"></i> {{ date('m-d-Y', strtotime($news->date_modified)) }}
                          </div>
                        </span>
                     </div>
                     <div class="clearfix"></div>
                  </li>
                @endforeach
               </ul>
            </div>
         </aside>

        </div>
    </div>
</section>