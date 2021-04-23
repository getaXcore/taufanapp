<?php
?>
<html>
<head>
    <title>Erajaya - Master User</title>
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
	<link rel="stylesheet" type="text/css" href="{{asset('/public/js/datatables/datatables.min.css')}}"/>
	<script type="text/javascript" src="{{asset('/public/js/datatables/datatables.min.js')}}"></script>
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
		  <button type="button" class="list-group-item list-group-item-action  active" aria-current="true" id="cp">Master User</button>
		  @endif
		  <button type="button" class="list-group-item list-group-item-action" id="so">Signout</button>
		</div>
	</div>
    <div class="col-6">
		<div class="card">
		  <div class="card-header">
			Add New User
		  </div>
		  <div class="card-body">
			  <div class="mb-3">
				<label class="form-label">Userid</label>
				<input type="text" class="form-control" id="userid">
			  </div>
			  <div class="mb-3">
				<label class="form-label">New Password</label>
				<input type="password" class="form-control" id="newpass">
			  </div>
			  <div class="mb-3">
				<label class="form-label">Confirm Password</label>
				<input type="password" class="form-control" id="confpass">
			  </div>
			  <div class="mb-3">
				<label class="form-label">Level</label>
				<select id="lvl" class="btn btn-secondary dropdown-toggle">
					<option value="0">Admin</option>
					<option value="1">Staff</option>
					<option value="2">Supervisor</option>
				</select>
			  </div>
			  <button type="submit" class="btn btn-primary" id="chadd">Submit</button>
			  <input type="hidden" id="userid" value="{{$sid}}">
			  <div id="notify"></div>
		  </div>
		</div>
  </div>
</div>
</body>
</html>