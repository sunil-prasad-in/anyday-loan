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
            <h1 class="mt-4">About Us</h1>
            
            <form action="{{url('backend/add-pages')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="about-us">
                <div class="form-group">
                    <label for="formGroupExampleInput">Banner Image</label><br>
                    <input type="file" name="banner_image" required>
                    @error('banner_image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Title</label>
                    <input type="text" class="form-control" name="title" value="{{get_page_detail('title','about-us')}}" id="formGroupExampleInput" placeholder="Title" required>
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Sub Title</label>
                    <input type="text" class="form-control" name="sub_title" value="{{get_page_detail('sub_title','about-us')}}" id="formGroupExampleInput2" placeholder="Sub Title" required>
                    @error('sub_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Main Content</label>
                    <textarea class="form-control" id="editor1" name="main_content" placeholder="Main Content" required>{{get_page_detail('main_content','about-us')}}</textarea>
                    @error('main_content')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <h5 class="mt-4">AnyDay Money - Offering Hassle Free Loans</h5>
                <div class="form-group">
                    <label for="formGroupExampleInput">Title</label>
                    <input type="text" class="form-control" name="anyday_money_title" value="{{get_page_detail('anyday_money_title','about-us')}}" id="formGroupExampleInput" placeholder="Title" required>
                    @error('anyday_money_title')
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
                                <input type="text" class="form-control" name="content_tile_1" value="{{get_page_detail('content_tile_1','about-us')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="content_sub_title_1" value="{{get_page_detail('content_sub_title_1','about-us')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_2" value="{{get_page_detail('content_tile_2','about-us')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="content_sub_title_2" value="{{get_page_detail('content_sub_title_2','about-us')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_3" value="{{get_page_detail('content_tile_3','about-us')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="content_sub_title_3" value="{{get_page_detail('content_sub_title_3','about-us')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_4" value="{{get_page_detail('content_tile_4','about-us')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="content_sub_title_4" value="{{get_page_detail('content_sub_title_4','about-us')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_5" value="{{get_page_detail('content_tile_5','about-us')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="content_sub_title_5" value="{{get_page_detail('content_sub_title_5','about-us')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_6" value="{{get_page_detail('content_tile_6','about-us')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="content_sub_title_6" value="{{get_page_detail('content_sub_title_6','about-us')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
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
        
