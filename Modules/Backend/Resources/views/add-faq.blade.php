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
            <h4 class="mt-4">Add Faq</h4>
            
            <form action="{{url('backend/add-faq')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="@if(isset($faq) && !empty($faq)) {{$faq->id}}@endif">
                <div class="form-group">
                    <label for="formGroupExampleInput">Question</label>
                    <input type="text" class="form-control" placeholder="Question"  name="question" value="@if(isset($faq) && !empty($faq)) {{$faq->question}} @else {{old('question')}} @endif">
                    
                    @error('question')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput">Answer</label>
                    <textarea class="form-control" name="answer" id="editor2" placeholder="Answer" >@if(isset($faq) && !empty($faq)) {{$faq->answer}} @else {{old('answer')}} @endif</textarea>
                    @error('faq')
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
    CKEDITOR.replace( 'editor2' );
    CKEDITOR.replace( 'editor3' );
</script>
        
