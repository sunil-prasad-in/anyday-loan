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
            <h4 class="mt-4">
                @if(isset($getProduct))
                    {{'Edit Product'}}
                @else
                    {{'Add Product'}}
                @endif
            </h4>
            
            <form action="{{url('backend/add-product')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="@if(isset($getProduct) && !empty($getProduct)){{$getProduct->id}}@endif">
                <div class="form-group">
                    <label for="formGroupExampleInput">Product Name</label>
                    <input type="text" class="form-control" name="product_name" value="@if(isset($getProduct) && !empty($getProduct)){{$getProduct->product_name}}@else{{old('name')}}@endif" id="formGroupExampleInput" placeholder="Product Name" >
                    @error('product_name')
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
        
