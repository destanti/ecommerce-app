<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/profile.css">

    <title>Profile</title>
</head>

<body>
    
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">  
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px"
                        
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                        class="font-weight-bold">{{Auth::user()->name}}</span><span
                        class="text-black-50">{{Auth::user()->email}}</span><span> </span>
                        <a href="/" class="btn btn-primary mt-3"> Home</a>
                    </div>
                        
            </div>
            <div class="col-md-9 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Account Settings</h4>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="/profile/update/{{ Auth::id() }}">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Name</label><input type="text"
                                    class="form-control" name="name" id="name" placeholder="Username"
                                    value="{{ Auth::user()->name }}"></div>
                            <div class="col-md-12"><label class="labels">Email ID</label><input type="email"
                                    class="form-control" name="email" id="email" placeholder="enter email id"
                                    value="{{ Auth::user()->email }}"></div>
                            <div class="col-md-12"><label class="labels">Password</label><input type="password"
                                    class="form-control" name="password" id="password" placeholder="password"></div>
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="tel"
                                    class="form-control" name="phone_number" id="phone_number"
                                    placeholder="enter phone number" value="{{ Auth::user()->phone_number }}"></div>
                            <div class="col-md-12"><label class="labels">Address</label>
                                <textarea name="address" id="address" rows="5" class="form-control" placeholder="address">{{ Auth::user()->address }}</textarea>
                            </div>

                        </div>

                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                type="submit">Save</button></div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
