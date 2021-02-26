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
            <h4 class="mt-4">Manage Home Slider</h4>
            <a href="{{url('backend/add-home-slider')}}">
                <input type="button" class="btn btn-primary" value="Add Home Slider">
            </a>
            
            <br>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Main Title</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($slider)>0)
                        @foreach($slider as $val)
                            <tr>
                                <td>{!!$val->main_title!!}</td>
                                <td>{!!$val->title!!}</td>
                                <td>
                                    <a href="{{url('backend/edit-home-slider/'.$val->id)}}">Edit</a>
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

        
