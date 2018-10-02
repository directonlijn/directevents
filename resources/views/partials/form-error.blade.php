@if(count($errors) > 0)
    <div class="alert alert-danger text-center" style="position:relative; margin:20px auto; width: 100%;">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>
            <i class="fa fa-warning"></i> Waarschuwing
        </strong>

        <br /><br />

        @foreach($errors->all() as $msg)
            <span>{{$msg}}</span><br />
        @endforeach
    </div>
@endif