@extends('layouts.app')
@section('content')

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
      <div class="col-lg-4 text-center">
        <a href=""  class="btn-social-head btn-facebook"><i class="fa fa-briefcase"></i></a>
        <h2>Material</h2>
      </div><!-- /.col-lg-4 -->

      <div class="col-lg-4 text-center">
        <a href="{{ route('admin.results') }}" class="btn-social-head btn-instagram"><i class="fa fa-area-chart"></i></a>        
        <h2>Results</h2>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4 text-center">
        <a href="{{ route('admin.users') }}"  class="btn-social-head btn-email"><i class=" fa fa-users"></i></a>        
        <h2>Users</h2>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
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
            <img class="logo" src="../img/london.jpg"></a> 
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
        <img class="logo" src="../img/campus.jpg"></a>
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
        <img class="logo" src="../img/uni.jpg"></a>
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
  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2020 English Value School, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.4/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.4/dist/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script></body>
</html>

@endsection