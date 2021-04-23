<?php
?>
<html>
<head>
    <title>Erajaya</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="User administration" />
    <meta name="author" content="Taufan Septa" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/css/bootstrap.css') }}">
    <script type="text/javascript" src="{{asset('/public/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('/public/libjs/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/public/js/func.bundle.js')}}"></script>
</head>
<body>
<div class="container">
  <div class="row align-items-center">
    <div class="col">
	  <div class="mb-3">
		<label class="form-label">User ID</label>
		<input type="text" class="form-control" id="userid">
	  </div>
	  <div class="mb-3">
		<label class="form-label">Password</label>
		<input type="password" class="form-control" id="pwd">
	  </div>
	  <button type="submit" class="btn btn-primary" id="signin">Submit</button>
	</div>
   </div>
   <div id="notify"></div>
</div>
</body>
</html>