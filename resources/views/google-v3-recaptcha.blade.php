<!DOCTYPE html>
<html>
<head>
<title>How to Use Google V3 Recaptcha Validation In Laravel 9 Form</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
@if(session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
<div class="card">
<div class="card-header text-center font-weight-bold">
<h2>Laravel 9 Contact Us Form Adding Google V3 Recaptcha</h2>
</div>
<div class="card-body">
<form name="g-v3-recaptcha-contact-us" id="g-v3-recaptcha-contact-us" method="post" action="{{url('validate-g-recaptcha')}}">
@csrf
<div class="form-group">
<label for="exampleInputEmail1">Name</label>
<input type="text" id="name" name="name" class="@error('name') is-invalid @enderror form-control">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>          
<div class="form-group">
<label for="exampleInputEmail1">Email</label>
<input type="email" id="email" name="email" class="@error('email') is-invalid @enderror form-control">
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>           
<div class="form-group">
<label for="exampleInputEmail1">Subject</label>
<input type="text" id="subject" name="subject" class="@error('subject') is-invalid @enderror form-control">
@error('subject')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>      
<div class="form-group">
<label for="exampleInputEmail1">Description</label>
<textarea name="message" class="@error('message') is-invalid @enderror form-control"></textarea>
@error('message')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
<div class="form-group">
{!! RecaptchaV3::initJs() !!}
{!! RecaptchaV3::field('contact_us') !!}
@error('g-recaptcha-response')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>    
</body>
</html>