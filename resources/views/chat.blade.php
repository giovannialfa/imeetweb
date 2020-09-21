@extends('layouts.app')

@section('content')
<style>
    .chat-container {
        display: flex;
        flex-direction: column;
    }

    .chat {
        border: 1px solid gray;
        border-radius: 3px;
        width: 50%;
        padding: 0.5em;

    }

    .chat-left {
        background-color: white;
        align-self: flex-start;
    }

    .chat-right {
        background-color: #A7E9AF;
        align-self: flex-end;
    }

    .message-input-container {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: white;
        border: 1px solid gray;
        padding: 1em;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" id="sidebar-wrapper" style="background-color: white;">
            <div class="sidebar-heading mb-5">LOGO </div>
            <div class="list-group">
                <div class="list-group">
                    <a href="http://127.0.0.1:8000/dashboard"><button class="button btn mt-5"><i class="fa fa-home"></i> Beranda</button></a>
                    <a href="http://127.0.0.1:8000/riwayat"><button class="button btn mt-5"><i class="fa fa-history"></i> Riwayat</button></a>
                    <a href="http://127.0.0.1:8000/home"><button class="button btn mt-5"><i class="fa fa-comment"></i> Chat</button></a>
                </div>
                <div class="list-group">
                    <button class="button btnexit" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"><i class="fa fa-close ">
                            <span> Log out</span></i>
                        <a href="{{ route('logout') }}">
                        </a>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-10 pt-3 pb-3 pl-5 pr-5" style="position: relative;">
        <h1 class="mt-4" style="color: #75B79E;">CHAT</h1>
            <div class="row">
                <div class="col-md-3" style="background-color: white;">
                    @foreach($users as $user)
                    <div class="row mt-2 mb-2" onclick="showGuestroom('{{ $user->staffId }}')" style="cursor: pointer;">
                        <div class="col-md-3 offset-md-1">
                            <img src="{{ $user->imageUrl }}" alt="" style="width: 100%;">
                        </div>
                        <div class="col-md-8">
                            {{ $user->fullname }}
                        </div>
                    </div>
                    @endforeach
                </div>
                <div id="guest_room" class="col-md-3" style="background-color: #abab;">
                    Memek
                </div>
                <div id="chat_room" class="col-md-6" style="background-color: #ababab;">
                    <div class="row" style="background-color: white;">
                        <div class="col-md-2 offset-md-1">
                            <img src="" alt="" style="width: 100%;">
                        </div>
                        <div class="col-md-9">
                            asdasdas
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')

<script src="https://www.gstatic.com/firebasejs/7.20/firebase-firestore.js"></script>
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    var firebaseConfig = {
        apiKey: "AIzaSyCksrux5suRi01RN_46Qb7-S0Ll4SJ6guo",
        authDomain: "ivisitor-95eb1.firebaseapp.com",
        databaseURL: "https://ivisitor-95eb1.firebaseio.com",
        projectId: "ivisitor-95eb1",
        storageBucket: "ivisitor-95eb1.appspot.com",
        messagingSenderId: "808931310777",
        appId: "1:808931310777:web:f7664863fa75d198726f68",
        measurementId: "G-Y2QH4JDRR6"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();

    var db = firebase.firestore();


    function sendMessage() {
        var messageContent = document.getElementById('message').value;
        db.collection("test").doc("test").collection("test").add({
                first: "Ada",
                last: "Lovelace",
                born: messageContent
            })
            .then(function(docRef) {
                console.log("Document written with ID: ", docRef.id);
            })
            .catch(function(error) {
                console.error("Error adding document: ", error);
            });
    }

    function showGuestroom(staffId) {
        // alert(staffId);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('guestroom') }}",
            type: 'GET',
            data: {
                _token: CSRF_TOKEN,
                staffId: staffId,
            },
            success: function(data) {
                console.log(data);
                $('#guest_room').html(data);
            },
            error: function(data, textStatus, errorThrown) {
                console.log(data);
                console.log(textStatus);
                console.log(errorThrown);
                console.log("ERROR");
            },
        })
    }

    function showChatroom(staffId) {
        // db.collection("test").get().then((querySnapshot) => {
        //     querySnapshot.forEach((doc) => {
        //         console.log(`${doc.id} => ${doc.data().born }`);
        //     });
        // });

    }
</script>

<script>
   
</script>

@endsection