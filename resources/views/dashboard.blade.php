<?php
?>
<html>
<head>
    <title>Erajaya - Dashboard</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="User administration" />
    <meta name="author" content="Taufan Septa" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/css/bootstrap.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('/public/css/other.css') }}">
    <script type="text/javascript" src="{{asset('/public/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('/public/libjs/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/public/js/func.bundle.js')}}"></script>
	<script type=text/javascript>
		$(document).ready(function () {
			$("#cp").click(function(){
				window.location.href = "{{url('changepass')}}?sid={{$sid}}";
			});
			$("#mu").click(function(){
				window.location.href = "{{url('masteruser')}}?sid={{$sid}}";
			});
		});
	</script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-10">Dashboard</div>
    <div class="col-4">
		<div class="list-group">
		  <button type="button" class="list-group-item list-group-item-action" id="cp">Change Password</button>
		  @if($sLevel == "0")
		  <button type="button" class="list-group-item list-group-item-action" id="mu">Master User</button>
		  @endif
		  <button type="button" class="list-group-item list-group-item-action" id="so">Signout</button>
		  <input type="hidden" id="userid" value="{{$sid}}">
		</div>
	</div>
    <div class="col-6">Welcome, {{$sid}}!</div>
  </div>
</div>
</body>
</html>