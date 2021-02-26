@include('backend::layout.header')
@include('backend::layout.sidebar')
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h4 class="mt-4">Add Testimonials</h4>
            
            <form action="{{url('backend/add-testimonials')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="@if(isset($getTes) && !empty($getTes)){{$getTes->id}}@endif">
                <div class="form-group">
                    <label for="formGroupExampleInput">Name</label>
                    <input type="text" class="form-control" name="name" value="@if(isset($getTes) && !empty($getTes)){{$getTes->name}}@else{{old('name')}}@endif" id="formGroupExampleInput" placeholder="Name" >
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Rating</label>
                    <input type="text" class="form-control" name="rating" value="@if(isset($getTes) && !empty($getTes)){{$getTes->rating}}@else{{old('rating')}}@endif" id="formGroupExampleInput" placeholder="Rating" >
                    @error('rating')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Content</label>
                    <textarea class="form-control" name="content" id="editor1" placeholder="Content" >@if(isset($getTes) && !empty($getTes)){{$getTes->content}}@else{{old('content')}}@endif</textarea>
                    @error('content')
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
        
