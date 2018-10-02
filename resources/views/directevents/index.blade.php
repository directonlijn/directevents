@extends('layouts.app-mine')

@section('title', 'Home')

@section('bodyClass', 'main home')

@section ('page', 'home')

@section('content')
    <img src="{{ URL::asset('images/home.jpg') }}" class="img-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 mt-2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla, dolor quis iaculis fermentum, massa orci fermentum ligula, eu feugiat ligula diam a nibh. Proin at lorem a ligula malesuada dapibus non nec est. Integer eget tempor tortor. Nunc semper lectus nulla, in vestibulum nibh egestas sit amet. Vivamus non aliquam leo. Aliquam quis varius lorem, at dictum velit. Cras commodo, odio vitae dapibus consequat, mi risus cursus metus, sed suscipit ex tortor ut felis. Etiam tincidunt nec tellus in viverra. Sed pretium semper leo, suscipit venenatis leo dignissim semper. Nullam mattis nulla nec quam tincidunt, vitae ullamcorper risus blandit. Nunc egestas turpis vel consequat faucibus. Quisque tincidunt dui at sem volutpat accumsan eget a erat. Aliquam ornare ex eget ante maximus tincidunt finibus nec dui.
            </div>
        </div>
    </div>

@endsection