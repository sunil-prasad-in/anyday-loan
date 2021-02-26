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
            <h1 class="mt-4">How To Apply</h1>
            
            <form action="{{url('backend/add-pages')}}" method="POST">
                @csrf
                <input type="hidden" name="type" value="how-to-apply">
                <div class="form-group">
                    <label for="formGroupExampleInput">Title</label>
                    <input type="text" class="form-control" name="title" value="{{get_page_detail('title','how-to-apply')}}" id="formGroupExampleInput" placeholder="Title" required>
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Sub Title</label>
                    <textarea class="form-control" name="sub_title" id="editor1" placeholder="Sub Title" required>{{get_page_detail('sub_title','how-to-apply')}}</textarea>
                    @error('sub_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Content</label>
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Sub Title</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_1" value="{{get_page_detail('content_tile_1','how-to-apply')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="content_sub_title_1" value="{{get_page_detail('content_sub_title_1','how-to-apply')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_2" value="{{get_page_detail('content_tile_2','how-to-apply')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="content_sub_title_2" value="{{get_page_detail('content_sub_title_2','how-to-apply')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_3" value="{{get_page_detail('content_tile_3','how-to-apply')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="content_sub_title_3" value="{{get_page_detail('content_sub_title_3','how-to-apply')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_4" value="{{get_page_detail('content_tile_4','how-to-apply')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="content_sub_title_4" value="{{get_page_detail('content_sub_title_4','how-to-apply')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
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
</script>
        
