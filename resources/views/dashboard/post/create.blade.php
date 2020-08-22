@extends('dashboard.sbadmin.master')
@push('script-head')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

@endpush
@section('content')
    <h1 clas="h3 mb-4 text-gray-800">New Post</h1>
    <div class="row">
        <div class="col-lg-8">
            
    <div class="card border-0 mb-4 ">
        {{-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Please Complete Form Below</h6>
        </div> --}}
        <div class="card-body">
            <form action="/dashboard/posts" method="POST">
                @csrf
                
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" aria-describedby="title">
                <small class="form-text text-danger">{{$errors->first('title')}}</small>
                </div>
                <div class="form-group">
                  <label for="content">Content</label>
                <textarea name="content" class="form-control my-editor" rows="12" id="content">{{old('content')}}</textarea>
                <small class="form-text text-danger">{{$errors->first('content')}}</small>
                </div>
                <div class="form-group">
                    <label for="tags">Tags</label>
                    <input type="text" name="tags" value="{{ old('tags') }}" class="form-control" id="tags" aria-describedby="tags">
                    <small class="form-text text-muted">Separate with coma (,).</small>
                    <small class="form-text text-danger">{{$errors->first('tags')}}</small>
                  </div>
                  <div class="form-group">
                    <label for="title">Featured Image</label>
                    <div class="input-group">
                        <span class="input-group-btn">
                          <a id="lfm" data-input="featured" data-preview="holder" class="btn btn-primary text-light">
                            <i class="fa fa-picture-o"></i> Choose
                          </a>
                        </span>
                        <input id="featured" class="form-control" type="text" name="featured" value="{{old('featured')}}">
                      </div>
                      <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                      <small class="form-text text-danger">{{$errors->first('featured')}}</small>
                  </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" id="status" name="status">
                    <option disabled selected>--Status Post--</option>
                    <option value="publish">Publish</option>
                    <option value="draft">Draft</option>
                  </select>
                  <small class="form-text text-danger">{{$errors->first('status')}}</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
 
</div>
<div class="col-lg">
<img src="{{asset('sbadmin2/img/publish_post.png')}}" width="100%" height-min="150px" alt="">
</div>
</div>
@endsection
@push('script-body')
<script src="{{asset('vendor/laravel-filemanager/js/stand-alone-button.js')}}"></script>
<script>
    
     $('#lfm').filemanager('image');

    var editor_config = {
      path_absolute : "/",
      selector: "textarea.my-editor",
      plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
      relative_urls: false,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
  
        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }
  
        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };
  
    tinymce.init(editor_config);
  </script>
@endpush