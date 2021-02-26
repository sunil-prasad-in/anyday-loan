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
            <h4 class="mt-4">Personal Loan</h4>
            
            <form action="{{url('backend/add-pages')}}" method="POST">
                @csrf
                <input type="hidden" name="type" value="product-1">
                <div class="form-group">
                    <label for="formGroupExampleInput">Main Title</label>
                    <input type="text" class="form-control" name="main_title" value="{{get_page_detail('main_title','product-1')}}" id="formGroupExampleInput" placeholder="Main Title" required>
                    @error('main_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Title</label>
                    <textarea class="form-control" id="editor2" name="title" placeholder="Title" required>{{get_page_detail('title','product-1')}}</textarea>
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Sub Title</label>
                    <input type="text" class="form-control" name="sub_title" value="{{get_page_detail('sub_title','product-1')}}" id="formGroupExampleInput2" placeholder="Sub Title" required>
                    @error('sub_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Main Content Title</label>
                    <input type="text" class="form-control" name="main_content_title" value="{{get_page_detail('main_content_title','product-1')}}" id="formGroupExampleInput2" placeholder="Main Content Title" required>
                    @error('main_content_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Main Content</label>
                    <textarea class="form-control" id="editor1" name="main_content" placeholder="Main Content" required>{{get_page_detail('main_content','product-1')}}</textarea>
                    @error('main_content')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <h4 class="mt-4">Eligibility Criteria</h4>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title First</label>
                        <input type="text" class="form-control" name="e_title" value="{{get_page_detail('e_title','product-1')}}" id="formGroupExampleInput" placeholder="Title" required>
                        @error('e_title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title Second</label>
                        <input type="text" class="form-control" name="e_title_second" value="{{get_page_detail('e_title_second','product-1')}}" id="formGroupExampleInput" placeholder="Title Second" required>
                        @error('e_title_second')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Sub Title</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_1" value="{{get_page_detail('content_tile_1','product-1')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="content_sub_title_1" value="{{get_page_detail('content_sub_title_1','product-1')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_2" value="{{get_page_detail('content_tile_2','product-1')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="content_sub_title_2" value="{{get_page_detail('content_sub_title_2','product-1')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_3" value="{{get_page_detail('content_tile_3','product-1')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="content_sub_title_3" value="{{get_page_detail('content_sub_title_3','product-1')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_tile_4" value="{{get_page_detail('content_tile_4','product-1')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="content_sub_title_4" value="{{get_page_detail('content_sub_title_4','product-1')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="form-group">
                    <h4 class="mt-4">Features and Benefits</h4>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title First</label>
                        <input type="text" class="form-control" name="features_title" value="{{get_page_detail('features_title','product-1')}}" id="formGroupExampleInput" placeholder="Title" required>
                        @error('features_title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title Second</label>
                        <input type="text" class="form-control" name="features_title_second" value="{{get_page_detail('features_title_second','product-1')}}" id="formGroupExampleInput" placeholder="Title Second" required>
                        @error('features_title_second')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Sub Title</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="feature_tile_1" value="{{get_page_detail('feature_tile_1','product-1')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="feature_sub_title_1" value="{{get_page_detail('feature_sub_title_1','product-1')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="feature_tile_2" value="{{get_page_detail('feature_tile_2','product-1')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="feature_sub_title_2" value="{{get_page_detail('feature_sub_title_2','product-1')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="feature_tile_3" value="{{get_page_detail('feature_tile_3','product-1')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="feature_sub_title_3" value="{{get_page_detail('feature_sub_title_3','product-1')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="feature_tile_4" value="{{get_page_detail('feature_tile_4','product-1')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="feature_sub_title_4" value="{{get_page_detail('feature_sub_title_4','product-1')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="feature_tile_5" value="{{get_page_detail('feature_tile_5','product-1')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="feature_sub_title_5" value="{{get_page_detail('feature_sub_title_5','product-1')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="feature_tile_6" value="{{get_page_detail('feature_tile_6','product-1')}}" id="formGroupExampleInput" placeholder="Title" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="feature_sub_title_6" value="{{get_page_detail('feature_sub_title_6','product-1')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
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
    CKEDITOR.replace( 'editor2' );
</script>
        
