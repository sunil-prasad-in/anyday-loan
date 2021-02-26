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
            <h4 class="mt-4">Manage Products</h4>
            <a href="{{url('backend/add-product')}}">
                <input type="button" class="btn btn-primary" value="Add Products">
            </a>
            
            <br>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($product)>0)
                        @foreach($product as $val)
                            <tr>
                                <td>{{$val->product_name}}</td>
                                <td>
                                    <a href="{{url('backend/edit-product/'.$val->id)}}">Edit</a>
                                    <a href="{{url('backend/product-detail/'.$val->id)}}">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td colspan="4">No record found...</td></tr>
                    @endif
                </tbody>
            </table>
        </div>
    </main>
@include('backend::layout.footer')
<script>
    CKEDITOR.replace( 'editor1' );
    CKEDITOR.replace( 'editor2' );
    CKEDITOR.replace( 'editor3' );
    CKEDITOR.replace( 'editor4' );
</script>
        
