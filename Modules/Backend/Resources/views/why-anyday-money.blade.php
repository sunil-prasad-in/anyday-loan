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
            <h1 class="mt-4">Why Anyday Money</h1>
            
            <form action="{{url('backend/add-pages')}}" method="POST">
                @csrf
                <input type="hidden" name="type" value="why-any-day-money">
                <div class="form-group">
                    <label for="formGroupExampleInput">Title</label>
                    <input type="text" class="form-control" name="title" value="{{get_page_detail('title','why-any-day-money')}}" id="formGroupExampleInput" placeholder="Title" required>
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Sub Title</label>
                    <input type="text" class="form-control" name="sub_title" value="{{get_page_detail('sub_title','why-any-day-money')}}" id="formGroupExampleInput2" placeholder="Sub Title" required>
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
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_1" value="{{get_page_detail('content_tile_1','why-any-day-money')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_2" value="{{get_page_detail('content_tile_2','why-any-day-money')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_3" value="{{get_page_detail('content_tile_3','why-any-day-money')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_4" value="{{get_page_detail('content_tile_4','why-any-day-money')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_5" value="{{get_page_detail('content_tile_5','why-any-day-money')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_6" value="{{get_page_detail('content_tile_6','why-any-day-money')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_7" value="{{get_page_detail('content_tile_7','why-any-day-money')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_8" value="{{get_page_detail('content_tile_8','why-any-day-money')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_9" value="{{get_page_detail('content_tile_9','why-any-day-money')}}" id="formGroupExampleInput" placeholder="Title" required>
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
        
