@extends('portal.app')

@section('content')
@include('portal.modals.add_post_modal')
@include('portal.modals.edit_post_modal')
@include('portal.modals.delete_post_modal')
<div class="main-container">
    <div class="section">
        <div class="container">
            <h1 class="title-2 center" style="margin-top: -40px; border: 0;">Manuals & Coding Instructions</h1>
@if(Auth::user())
            @if(Auth::user()->user_group == 'Editor')
                <div class="col-md-12">
                    <div class="pull-right">
                        <div class="form-group">
                            <button type="button" data-category="manuals" class="btn btn-success" id="addManualBtn">
                                <i class="fa fa-plus"></i><span>Add Manual</span>
                            </button>
                        </div>
                    </div>
                </div>
                @endif
                @endif
            <div class="row">
                <hr>
                @foreach($manuals as $manual)
                <div class="col-md-12 col-md-9 col-md-offset-2">
                    <div class="pull-right center">
                         <a href="{{ asset('storage/uploads/files/'.$manual->featured_file) }}" target="_blank">
                            <span style="font-size: 30pt;"><i class="fa fa-file-text"></i></span>
                           <br> View File
                        </a>
                    </div>
                    <a href="{{ asset('storage/uploads/files/'.$manual->featured_file) }}" target="_blank"><span class="section-title">{{ $manual->title }}</span></a>
                    @if(Auth::user())
                    @if(Auth::user()->user_group == 'Editor')
                    <a href="#" id="editPostBtn" data-image="{{ $manual->featured_file }}" data-title="{{ $manual->title }}" data-content="{{ $manual->content }}" data-id="{{ $manual->id }}"><i class="fa fa-pencil"></i> Edit</a> |
                    <a href="#" id="deletePostBtn" data-title="{{ $manual->title }}" data-id="{{ $manual->id }}"><i class="fa fa-trash"></i> Delete</a>
                     @endif
                     @endif
                    <div class="typography-wrap">
                        <p>{{ strip_tags($manual->content) }}</p>
                        <hr>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

<script>
    $(document).on('click', '#editPostBtn', function(event){
        event.preventDefault();
        $('#editPostModal .post_id').val($(this).data('id'));
        $('#editPostModal .post_title').val($(this).data('title'));
        // $('#editPostModal .post_content').val($(this).data('content'));
        $('#editPostModal .original_post_image').val($(this).data('image'));
        $('#editPostModal .original_post_title').val($(this).data('title'));
        $('#editPostModal .original_post_content').val($(this).data('content'));
        CKEDITOR.instances['post_content'].setData($(this).data('content'));

        $('#editPostModal').modal('show');
    });

    $(document).on('click', '#addManualBtn', function(event){
        event.preventDefault();
        // console.log($(this).data('category'));
        $('#addPostModal .post_category').val($(this).data('category'));
        $('#addPostModal').modal('show');
    });

    $(document).on('click', '#deletePostBtn', function(event){
        event.preventDefault();
        $('#deletePostModal .post_id').val($(this).data('id'));
        $('#deletePostModal .post_title').text($(this).data('title'));
        $('#deletePostModal').modal('show');
    });

    // CKEDITOR.config.height = 450;
</script>
@endsection