<?php
$style = '';
$body = '';
$title = '';
$body_er = '';
//var_dump($errors);
if (isset($errors) && count($errors) > 0) {
    $style = ' alert alert-danger';
    $title = 'Erreur';
}
if (session()->has('success')) {
    $style = 'alert alert-success';
    $body = session()->get('success');
    $title = 'Succès';
}
if (session()->has('warning')) {
    $style = 'alert alert-warning';
    $body = session()->get('warning');
    $title = 'Attention';
}
?>
<style>
    .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;

    }

    .aaa {
        width: 1180px;
    }

    .closebtn:hover {
        color: black;
    }

    .zindex-0 {
        z-index: 0;
    }
</style>

@if (isset($errors) && count($errors) > 0 || (session()->has('success')) || (session()->has('warning')))
    <div role="alert" class="gritter-item-wrapper with-icon zindex-0 with-icon mb10 {{$style}} tome">
        <div class="gritter-item">
            <span class="closebtn">&times;</span>
            <div class="gritter-without-image">
                <span class="gritter-title">{{$title}}</span>
                @if(is_object ($errors))
                    @foreach($errors->all() as $error)
                        <li><strong>
                                {!! $error !!}
                            </strong></li>
                    @endforeach
                @else
                    @if(session()->has('errors'))
                        <p>
                        <li>{!! $errors !!} </li></p>
                    @endif
                @endif
                @if (session()->has('success'))
                    <p> {!! $body !!} </p>
                @endif
                @if (session()->has('warning'))
                    <p> {!! $body !!} </p>
                @endif
            </div>
            <div style="clear:both"></div>
        </div>
    </div>
@endif
<script type="text/javascript">
    var close = document.getElementsByClassName("closebtn");
    var i;
    for (i = 0; i < close.length; i++) {
        close[i].onclick = function () {
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function () {
                div.style.display = "none";
            }, 600);
        }
    }
    $(document).ready(function () {
        $('.tome').delay(10000).fadeOut();
        $('.closebtn').click(function () {
            $('.tome').fadeOut();
        })
    });
</script>
