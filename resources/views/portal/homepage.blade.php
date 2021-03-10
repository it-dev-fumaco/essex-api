@extends('portal.app')

@section('content')
@include('portal.modals.edit_post_modal')
@include('portal.modals.delete_post_modal')
	@include('portal.includes.slider')
 	@include('portal.includes.updates')
    @include('portal.includes.events')
    @include('portal.includes.milestones')
    {{-- @include('portal.includes.instructions') --}}
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
$(document).on('click', '#deletePostBtn', function(event){
        event.preventDefault();
        $('#deletePostModal .post_id').val($(this).data('id'));
        $('#deletePostModal .post_title').text($(this).data('title'));
        $('#deletePostModal').modal('show');
    });
        {{-- $('textarea').ckeditor(); --}}
        // $('.textarea').ckeditor(); // if class is prefered.

        CKEDITOR.config.height = 450;
    </script>

@endsection