@include('backend::layout.header')
@include('backend::layout.sidebar')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h4 class="mt-4">Email Detail</h4>
            
            <form action="{{url('backend/add-pages')}}" method="POST">
                @csrf
                <input type="hidden" name="type" value="theme-settings">
                <div class="form-group">
                    <label for="formGroupExampleInput">Title</label>
                    <input type="text" class="form-control" name="email_title" value="{{get_page_detail('email_title','theme-settings')}}" id="formGroupExampleInput" placeholder="Title" required>
                    @error('email_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Sub Title</label>
                    <input type="text" class="form-control" name="email_sub_title" value="{{get_page_detail('email_sub_title','theme-settings')}}" id="formGroupExampleInput2" placeholder="Sub Title" required>
                    @error('email_sub_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Email Address</label>
                    <input type="text" class="form-control" name="email_address" value="{{get_page_detail('email_address','theme-settings')}}" id="formGroupExampleInput2" placeholder="Email Address" required>
                    @error('email_address')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <h4 class="mt-4">Contact Detail</h4>
                <div class="form-group">
                    <label for="formGroupExampleInput">Title</label>
                    <input type="text" class="form-control" name="contact_title" value="{{get_page_detail('contact_title','theme-settings')}}" id="formGroupExampleInput" placeholder="Title" required>
                    @error('contact_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Sub Title</label>
                    <input type="text" class="form-control" name="contact_sub_title" value="{{get_page_detail('contact_sub_title','theme-settings')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                    @error('contact_sub_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Phone Number</label>
                    <input type="text" class="form-control" name="phone_number" value="{{get_page_detail('phone_number','theme-settings')}}" id="formGroupExampleInput" placeholder="Phone Number" required>
                    @error('phone_number')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <h4 class="mt-4">Address Detail</h4>
                <div class="form-group">
                    <label for="formGroupExampleInput">Title</label>
                    <input type="text" class="form-control" name="address_title" value="{{get_page_detail('address_title','theme-settings')}}" id="formGroupExampleInput" placeholder="Title" required>
                    @error('address_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Sub Title</label>
                    <input type="text" class="form-control" name="address_sub_title" value="{{get_page_detail('address_sub_title','theme-settings')}}" id="formGroupExampleInput" placeholder="Sub Title" required>
                    @error('address_sub_title')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Address</label>
                    <input type="text" class="form-control" name="address" value="{{get_page_detail('address','theme-settings')}}" id="formGroupExampleInput" placeholder="Address" required>
                    @error('address')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <h4 class="mt-4">Copyright Text</h4>
                <div class="form-group">
                    <input type="text" class="form-control" name="copyright_text" value="{{get_page_detail('copyright_text','theme-settings')}}" id="formGroupExampleInput" placeholder="Copyright Text" required>
                    @error('copyright_text')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <h4 class="mt-4">Social Links</h4>
                <div class="form-group">
                    <label for="formGroupExampleInput">Twitter Link</label>
                    <input type="text" class="form-control" name="twitter_link" value="{{get_page_detail('twitter_link','theme-settings')}}" id="formGroupExampleInput" placeholder="Twitter Link" required>
                    @error('twitter_link')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Facebook Link</label>
                    <input type="text" class="form-control" name="facebook_link" value="{{get_page_detail('facebook_link','theme-settings')}}" id="formGroupExampleInput" placeholder="Facebook Link" required>
                    @error('facebook_link')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Pinterest Link</label>
                    <input type="text" class="form-control" name="pinterest_link" value="{{get_page_detail('pinterest_link','theme-settings')}}" id="formGroupExampleInput" placeholder="Pinterest Link" required>
                    @error('pinterest_link')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Linkdin Link</label>
                    <input type="text" class="form-control" name="linkdin_link" value="{{get_page_detail('linkdin_link','theme-settings')}}" id="formGroupExampleInput" placeholder="Linkdin Link" required>
                    @error('linkdin_link')
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
        
