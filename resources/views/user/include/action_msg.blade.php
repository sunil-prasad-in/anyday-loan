<!--@if (session()->has('success'))-->
<!--<div class="alert alert-success">-->
<!--		@if(is_array(session()->get('success')))-->
<!--    <ul>-->
<!--        @foreach (session()->get('success') as $message)-->
<!--            <li>{{ $message }}</li>-->
<!--        @endforeach-->
<!--    </ul>-->
<!--    @else-->
<!--        {{ session()->get('success') }}-->
<!--    @endif-->
<!--</div>-->
<!--@endif-->
@if(session()->has('error'))

    <div class="alert alert-danger" style="color:red; text-align: center;"> 
      @if(is_array(session()->get('error')))
      <ul>
          @foreach (session()->get('error') as $message)
              <li>{{ $message }}</li>
          @endforeach
      </ul>
      @else
          {{ session()->get('error') }}
      @endif
    </div>
@endif
@if(session()->has('$message'))
    <div class="alert alert-danger"> 
      @if(is_array(session()->get('$message')))
      <ul>
          @foreach (session()->get('$message') as $message)
              <li>{{ $message }}</li>
          @endforeach
      </ul>
      @else
          {{ session()->get('$message') }}
      @endif
    </div>
@endif
