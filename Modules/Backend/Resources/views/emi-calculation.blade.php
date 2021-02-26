@include('backend::layout.header')
@include('backend::layout.sidebar')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">EMI Calculation</h1>
            
            <form action="{{url('backend/add-pages')}}" method="POST">
                @csrf
                <input type="hidden" name="type" value="emi-calculation">
                <div class="form-group">
                    <label for="formGroupExampleInput">Title First</label>
                    <input type="text" class="form-control" name="title" value="{{get_page_detail('title','emi-calculation')}}" id="formGroupExampleInput" placeholder="Title" required>
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Title Second</label>
                    <input type="text" class="form-control" name="title_second" value="{{get_page_detail('title_second','emi-calculation')}}" id="formGroupExampleInput" placeholder="Title Second" required>
                    @error('title_second')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Sub Title</label>
                    <textarea class="form-control" name="sub_title" id="editor1" placeholder="Sub Title" required>{{get_page_detail('sub_title','emi-calculation')}}</textarea>
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
        
