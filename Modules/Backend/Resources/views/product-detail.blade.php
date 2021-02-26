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
            <h4 class="mt-4">{{$productName->product_name}}</h4>
            
            <form action="{{url('backend/add-product-detail')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{$productName->id}}">
                <div class="form-group">
                    <label for="formGroupExampleInput">Banner Image</label><br>
                    <input type="file" name="banner_image">
                    @error('banner_image')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Main Title</label>
                    <input type="text" class="form-control" name="main_title" value="@if($productDetail != '') {{$productDetail->main_title}} @endif" id="formGroupExampleInput" placeholder="Main Title" required>
                    @error('main_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Title</label>
                    <textarea class="form-control" id="editor2" name="title" placeholder="Title" required>@if($productDetail != '') {{$productDetail->title}} @endif</textarea>
                    @error('title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Sub Title</label>
                    <input type="text" class="form-control" name="sub_title" value="@if($productDetail != '') {{$productDetail->sub_title}} @endif" id="formGroupExampleInput2" placeholder="Sub Title">
                    @error('sub_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Main Content Title</label>
                    <input type="text" class="form-control" name="main_content_title" value="@if($productDetail != '') {{$productDetail->main_content_title}} @endif" id="formGroupExampleInput2" placeholder="Main Content Title" required>
                    @error('main_content_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Main Content</label>
                    <textarea class="form-control" id="editor1" name="main_content" placeholder="Main Content" required>@if($productDetail != '') {{$productDetail->main_content}} @endif</textarea>
                    @error('main_content')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <h4 class="mt-4">Eligibility Criteria</h4>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title First</label>
                        <input type="text" class="form-control" name="e_title" value="@if($productDetail != '') {{$productDetail->e_title}} @endif" id="formGroupExampleInput" placeholder="Title">
                        @error('e_title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title Second</label>
                        <input type="text" class="form-control" name="e_title_second" value="@if($productDetail != '') {{$productDetail->e_title_second}} @endif" id="formGroupExampleInput" placeholder="Title Second">
                        @error('e_title_second')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    @if($productDetail != '')
                        @if($productDetail->content_title != '')
                            @php 
                                $eTitle = explode("=",$productDetail->content_title);
                            @endphp
                        @endif
                        @if($productDetail->content_sub_title != '')
                            @php 
                                $eSubTitle = explode("=",$productDetail->content_sub_title);
                            @endphp
                        @endif
                    @endif
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Sub Title</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_title[]" value="@if(isset($eTitle[0]) && $eTitle[0] != '') {{$eTitle[0]}} @endif" id="formGroupExampleInput" placeholder="Title">
                            </td>
                            <td>
                                <textarea class="form-control" name="content_sub_title[]" id="content1" placeholder="Sub Title">@if(isset($eSubTitle[0]) && $eSubTitle[0] != '') {{$eSubTitle[0]}} @endif</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_title[]" value="@if(isset($eTitle[1]) && $eTitle[1] != '') {{$eTitle[1]}} @endif" id="formGroupExampleInput" placeholder="Title">
                            </td>
                            <td>
                                <textarea class="form-control" name="content_sub_title[]" value="" id="content2" placeholder="Sub Title">@if(isset($eSubTitle[1]) && $eSubTitle[1] != '') {{$eSubTitle[1]}} @endif</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_title[]" value="@if(isset($eTitle[2]) && $eTitle[2] != '') {{$eTitle[2]}} @endif" id="formGroupExampleInput" placeholder="Title">
                            </td>
                            <td>
                                <textarea class="form-control" name="content_sub_title[]" value="" id="content3" placeholder="Sub Title">@if(isset($eSubTitle[2]) && $eSubTitle[2] != '') {{$eSubTitle[2]}} @endif</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="content_title[]" value="@if(isset($eTitle[3]) && $eTitle[3] != '') {{$eTitle[3]}} @endif" id="formGroupExampleInput" placeholder="Title">
                            </td>
                            <td>
                                <textarea class="form-control" name="content_sub_title[]" value="" id="content4" placeholder="Sub Title">@if(isset($eSubTitle[3]) && $eSubTitle[3] != '') {{$eSubTitle[3]}} @endif</textarea>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="form-group">
                    <h4 class="mt-4">Features and Benefits</h4>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title First</label>
                        <input type="text" class="form-control" name="features_title" value="@if($productDetail != '') {{$productDetail->features_title}} @endif" id="formGroupExampleInput" placeholder="Title">
                        @error('features_title')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Title Second</label>
                        <input type="text" class="form-control" name="features_title_second" value="@if($productDetail != '') {{$productDetail->features_title_second}} @endif" id="formGroupExampleInput" placeholder="Title Second">
                        @error('features_title_second')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    @if($productDetail != '')
                        @if($productDetail->feature_title != '')
                            @php 
                                $fTitle = explode("=",$productDetail->feature_title);
                            @endphp
                        @endif
                        @if($productDetail->feature_sub_title != '')
                            @php 
                                $fSubTitle = explode("=",$productDetail->feature_sub_title);
                            @endphp
                        @endif
                    @endif
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Sub Title</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="feature_title[]" value="@if(isset($fTitle[0]) && $fTitle[0] != '') {{$fTitle[0]}} @endif" id="formGroupExampleInput" placeholder="Title">
                            </td>
                            <td>
                                <textarea class="form-control" name="feature_sub_title[]" value="" id="content5" placeholder="Sub Title">@if(isset($fSubTitle[0]) && $fSubTitle[0] != '') {{$fSubTitle[0]}} @endif</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="feature_title[]" value="@if(isset($fTitle[1]) && $fTitle[1] != '') {{$fTitle[1]}} @endif" id="formGroupExampleInput" placeholder="Title">
                            </td>
                            <td>
                                <textarea class="form-control" name="feature_sub_title[]" value="" id="content6" placeholder="Sub Title">@if(isset($fSubTitle[1]) && $fSubTitle[1] != '') {{$fSubTitle[1]}} @endif</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="feature_title[]" value="@if(isset($fTitle[2]) && $fTitle[2] != '') {{$fTitle[2]}} @endif" id="formGroupExampleInput" placeholder="Title">
                            </td>
                            <td>
                                <textarea class="form-control" name="feature_sub_title[]" value="" id="content7" placeholder="Sub Title">@if(isset($fSubTitle[2]) && $fSubTitle[2] != '') {{$fSubTitle[2]}} @endif</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="feature_title[]" value="@if(isset($fTitle[3]) && $fTitle[3] != '') {{$fTitle[3]}} @endif" id="formGroupExampleInput" placeholder="Title">
                            </td>
                            <td>
                                <textarea class="form-control" name="feature_sub_title[]" value="" id="content8" placeholder="Sub Title">@if(isset($fSubTitle[3]) && $fSubTitle[3] != '') {{$fSubTitle[3]}} @endif</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="feature_title[]" value="@if(isset($fTitle[4]) && $fTitle[4] != '') {{$fTitle[4]}} @endif" id="formGroupExampleInput" placeholder="Title">
                            </td>
                            <td>
                                <textarea class="form-control" name="feature_sub_title[]" value="" id="content9" placeholder="Sub Title">@if(isset($fSubTitle[4]) && $fSubTitle[4] != '') {{$fSubTitle[4]}} @endif</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" name="feature_title[]" value="@if(isset($fTitle[5]) && $fTitle[5] != '') {{$fTitle[5]}} @endif" id="formGroupExampleInput" placeholder="Title">
                            </td>
                            <td>
                                <textarea class="form-control" name="feature_sub_title[]" value="" id="content10" placeholder="Sub Title">@if(isset($fSubTitle[5]) && $fSubTitle[5] != '') {{$fSubTitle[5]}} @endif</textarea>
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
    CKEDITOR.replace( 'content1' );
    CKEDITOR.replace( 'content2' );
    CKEDITOR.replace( 'content3' );
    CKEDITOR.replace( 'content4' );
    CKEDITOR.replace( 'content5' );
    CKEDITOR.replace( 'content6' );
    CKEDITOR.replace( 'content7' );
    CKEDITOR.replace( 'content8' );
    CKEDITOR.replace( 'content9' );
    CKEDITOR.replace( 'content10' );
</script>
        
