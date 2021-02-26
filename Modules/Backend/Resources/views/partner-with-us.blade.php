@include('backend::layout.header')
@include('backend::layout.sidebar')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Partner With Us</h1>
            
            <form action="{{url('backend/add-pages')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="partner-with-us">
                <div class="form-group">
                    <label for="formGroupExampleInput">Banner Image</label><br>
                    <input type="file" name="banner_image" required>
                    @error('banner_image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Title</label>
                    <input type="text" class="form-control" name="title" value="{{get_page_detail('title','partner-with-us')}}" id="formGroupExampleInput" placeholder="Title" required>
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Main Content</label>
                    <textarea class="form-control" id="editor1" name="main_content" placeholder="Main Content" required>{{get_page_detail('main_content','partner-with-us')}}</textarea>
                    @error('main_content')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Form Title First</label>
                    <input type="text" class="form-control" name="form_title_first" value="{{get_page_detail('form_title_first','partner-with-us')}}" id="formGroupExampleInput" placeholder="Form Title First" required>
                    @error('form_title_first')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Form Title Second</label>
                    <input type="text" class="form-control" name="form_title_second" value="{{get_page_detail('form_title_second','partner-with-us')}}" id="formGroupExampleInput" placeholder="Form Title Second" required>
                    @error('form_title_second')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
            
        </div>
    </main>
@include('backend::layout.footer')
<script>
    CKEDITOR.replace( 'editor1' );
</script>
        
