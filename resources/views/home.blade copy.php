@extends('layouts.app')
@section('content')

</div>

<div class="container">
@if(session('message'))
<br><br>
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif

@if(session('error'))
<br><br>
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
  <div class="container">
    <div class="row">
      <div class="col-lg-6 text-center">
        <a href="{{ route('exams.index') }}"  class="btn-social-head btn-facebook">
          <i class="fa fa-line-chart"></i></a>
        <h2> Test your English </h2>
      </div>

      <div class="col-lg-2 text-center">
      </div>

      <div class="col-lg-2 text-center">
        <a href="{{ route('exercises.index') }}"  class="btn-social-head btn-email"><i class="fa fa-area-chart"></i></a>        
        <h2>Exercises</h2>
      </div>
    </div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
    <!-- START THE FEATURETTES -->

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It’ll blow your mind.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">   
          <img class="img-fluid d-block mx-auto logo" src="../img/london.jpg"></a> 
      </div>
    </div>
<br>
<br>
<br>
<br>
<br>
<hr>
<br>
<br>
<br>
<br>
<br>
    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-muted">See for yourself.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img class="img-fluid d-block mx-auto logo" src="../img/campus.jpg"></a>
      </div>
    </div>
<br>
<br>
<br>
<br>
<br>
<hr>
<br>
<br>
<br>
<br>
<br>

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
      </div>
      <div class="col-md-5">
        <img class="img-fluid d-block mx-auto logo" src="../img/uni.jpg"></a>
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <hr>
    <br>
    <br>
  </div>
</main>
</html>

@endsection