@include('backend::layout.header')
@include('backend::layout.sidebar')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Contact Us</h1>
            
            <form action="{{url('backend/add-pages')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="contact-us">
                <div class="form-group">
                    <label for="formGroupExampleInput">Banner Image</label><br>
                    <input type="file" name="banner_image" required>
                    @error('banner_image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Title First</label>
                    <input type="text" class="form-control" name="title" value="{{get_page_detail('title','contact-us')}}" id="formGroupExampleInput" placeholder="Title" required>
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Title Second</label>
                    <input type="text" class="form-control" name="title_second" value="{{get_page_detail('title_second','contact-us')}}" id="formGroupExampleInput" placeholder="Title Second" required>
                    @error('title_second')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Sub Title</label>
                    <input type="text" class="form-control" name="sub_title" value="{{get_page_detail('sub_title','contact-us')}}" id="formGroupExampleInput2" placeholder="Sub Title" required>
                    @error('sub_title')
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
        
