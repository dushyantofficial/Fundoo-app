<html>
<head>
    <title>Create Notification</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Notification
        </div>
        <center>
            <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()"
                    class="btn btn-danger btn-xs btn-flat">Allow for Notification
            </button>
        </center>
        <div class="card-body">
            <form name="add-blog-post-form" id="add-blog-post-form" method="post"
                  action="{{route('send-notification')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter The Title">
                    <span style="color: red">{{$errors->first('title')}}</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="body" class="form-control" placeholder="Enter The Description"></textarea>
                    <span style="color: red">{{$errors->first('body')}}</span>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
<script src="https://www.gstatic.com/firebasejs/8.3.0/firebase.js"></script>
<script>

    var firebaseConfig = {
        apiKey: "AIzaSyC_b6INHlZZRwN15pzNFj7lCHgyiA5greI",
        authDomain: "fundo-drive.firebaseapp.com",
        projectId: "fundo-drive",
        storageBucket: "fundo-drive.appspot.com",
        messagingSenderId: "116087918129",
        appId: "1:116087918129:web:35b349bd0f48ae61bdcf10",
        measurementId: "G-CJ1HNKZ1P7"
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    function initFirebaseMessagingRegistration() {
        messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function (token) {
                console.log(token);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '{{ route("save-token") }}',
                    type: 'POST',
                    data: {
                        token: token
                    },
                    dataType: 'JSON',
                    success: function (response) {
                        alert('Token saved successfully.');
                    },
                    error: function (err) {
                        console.log('User Chat Token Error' + err);
                    },
                });

            }).catch(function (err) {
            console.log('User Chat Token Error' + err);
        });
    }

    messaging.onMessage(function (payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });

</script>
