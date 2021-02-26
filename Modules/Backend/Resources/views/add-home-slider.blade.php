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
            <h4 class="mt-4">Home Slider</h4>
            
            <form action="{{url('backend/add-home-slider')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="@if(isset($slider) && !empty($slider)) {{$slider->id}}@endif">
                <div class="form-group">
                    <label for="formGroupExampleInput">Banner Image</label><br>
                    <input type="file" name="banner_image">
                    @error('banner_image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Main Title</label>
                    <textarea class="form-control" name="main_title" id="editor1" placeholder="Main Title" >@if(isset($slider) && !empty($slider)) {{$slider->main_title}} @else {{old('main_title')}} @endif</textarea>
                    @error('main_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Title</label>
                    <textarea class="form-control" name="title" id="editor2" placeholder="Title" >@if(isset($slider) && !empty($slider)) {{$slider->title}} @else {{old('main_title')}} @endif</textarea>
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Sub Title</label>
                    <textarea class="form-control" name="sub_title" id="editor3" placeholder="Sub Title" >@if(isset($slider) && !empty($slider)) {{$slider->sub_title}} @else {{old('main_title')}} @endif</textarea>
                    @error('sub_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Content</label>
                    <table>
                        <tr>
                            <th>Title</th>
                        </tr>
                        @if(isset($slider) && !empty($slider))

                            @php $content = explode(",",$slider->content); @endphp

                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="content[]" id="formGroupExampleInput" value="@if($content[0]) {{$content[0]}} @endif" placeholder="Title">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="content[]"  id="formGroupExampleInput" value="@if($content[1]) {{$content[1]}} @endif" placeholder="Title">
                                </td>
                               
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="content[]" id="formGroupExampleInput" value="@if($content[2]) {{$content[2]}} @endif" placeholder="Title">
                                </td>
                                
                            </tr>



                        @else
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="content[]" id="formGroupExampleInput" placeholder="Title">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="content[]"  id="formGroupExampleInput" placeholder="Title">
                                </td>
                               
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" name="content[]" id="formGroupExampleInput" placeholder="Title">
                                </td>
                                
                            </tr>
                        @endif
                    </table>
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
    CKEDITOR.replace( 'editor2' );
    CKEDITOR.replace( 'editor3' );
</script>
        
