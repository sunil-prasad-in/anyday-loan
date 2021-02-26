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
            <h4 class="mt-4">Manage Apply Now</h4>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Loan Type</th>
                        <th>State</th>
                        <th>City</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($applyNow)>0)
                        @foreach($applyNow as $val)
                            <tr>
                                <td>{{$val->full_name}}</td>
                                <td>{{$val->email}}</td>
                                <td>{{$val->phone}}</td>
                                <td>{{$val->loan_type}}</td>
                                <td>{{$val->state}}</td>
                                <td>{{$val->city}}</td>
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
        
