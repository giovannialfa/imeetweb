@extends('layouts.app')
@section('content')
<style>
    .input:focus {
        outline: none;
    }
</style>
<div class="cover-container d-flex justify-content-start mx-auto">
    <div class="" style="flex: 2;">
        @include('component.sidebar')
    </div>
    <div class="" style="flex: 10;">
        <div class="d-flex flex-column">
            @include('component.header', ['header_title' => 'Chat'])
            <div class="d-flex justify-content-between ml-4 mt-3">
                <div class="mr-3" style="flex: 3;border-radius: 1em; box-shadow: 1px 0px 4px #E9E9E9; border-radius:3em;">
                    <div class="contact-list d-flex flex-column white-bg" style="border-radius:1em;">
                        <div class="form">
                            <div class="form-group mx-sm-3 mb-2 d-flex justify-content-start">
                                <input type="text" class="form-control" placeholder="Cari">
                            </div>
                        </div>
                        <div class="overflow-auto list-user">
                            @foreach($guests as $guest)
                            <div class="d-flex justify-content-start mt-3 chat-list" onclick="showChatroom('{{ $guest->fullname}}', '{{ $guest->imageUrl}}', '{{ $guest->guestId }}', '{{ $guest->staffId }}', '{{ Auth::user()->building }}');" id="{{ $guest->guestId }}" style="margin-bottom: 1em; cursor:pointer;">
                                <div style="flex: 2;">
                                    <img class="chat-list-image" src="{{ $guest->imageUrl }}" alt="">
                                </div>
                                <div class="d-flex flex-column align-content-start" style="flex: 10;">
                                    <div class="chat-list-title">{{ $guest->fullname }}</div>
                                    <div class="chat-list-subtitle">{{ $guest->id }}</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="chat-room mr-3" style="flex: 6;box-shadow: 1px 0px 4px #E9E9E9; border-radius:1em;">
                    <div class="d-flex flex-column white-bg" style="border-radius:1em;">
                        <div class="d-flex justify-content-start p-3 chatting-header" style="height: 10vh;">
                            <div style="flex: 1;">
                                <img class="chat-list-image" id="chat_guest_image" src="" alt="">
                            </div>
                            <div class="" style="flex: 10;">
                                <div class="chat-list-title" id="chat_guest_fullname"></div>
                            </div>
                        </div>
                        <div></div>
                        <div id="chatting_room" class="chatting-room overflow-auto p-2">
                        </div>
                        <div class=" chatting-input" style="border-radius:1em;">
                            <!-- <form class="align-self-center form-group has-send send-message">
                                <input class="form-control form-control-lg pl-5 custom-input" type="text" name="host" id="host" placeholder="Tulis Pesan disini...">
                            </form> -->
                            <div class="d-flex justify-content-between  p-2">
                                <textarea type="text" class="" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="message" placeholder="Tulis Pesan disini..." maxlength="300" style="flex:11; border:none; outline:none; resize:none;" autocomplete="off"></textarea>
                                <div class="input-group-prepend justify-content-center" style="flex: 1; align-items:center;">
                                    <div class="" id="inputGroup-sizing-default " onclick="sendMessage('{{ Auth::user()->building }}');">
                                        <x-feathericon-send class="chatting-icon-send" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
<!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-app.js"></script>

<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.20/firebase-firestore.js"></script>
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var buildingCode;
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

    window.onload = function() {
        window.localStorage.clear();
    }

    function setBuildingCode($building) {
        switch ($building) {
            case "Graha Kemenpora":
                buildingCode = 200101;
                break;
            case 'Wisma Kemenpora':
                buildingCode = 200102;
                break;
            case 'PPITKON':
                buildingCode = 200103;
                break;
            case 'RSON':
                buildingCode = 200104;
                break;
            case 'SKO Bangunan':
                buildingCode = 200105;
                break;
            case 'Museum Olahraga':
                buildingCode = 200106;
                break;
            default:
                buildingCode = 'Error';
                break;
        }
        return buildingCode;
    }

    function showChatroom($guestFullname, $guestImageUrl, $guestId, $guestHostId, $building) {
        if (localStorage.getItem("prevChatroomGuestId") != null && localStorage.getItem("prevChatroomGuestHost") != null) {
            document.getElementById(localStorage.getItem("prevChatroomGuestId")).style.backgroundColor = "#FFFFFF";
        }
        document.getElementById('chat_guest_image').src = $guestImageUrl;
        document.getElementById('chat_guest_fullname').innerHTML = $guestFullname;
        document.getElementById($guestId).style.backgroundColor = "#A7E9AF1A";
        localStorage.setItem("prevChatroomGuestFullname", $guestFullname);
        localStorage.setItem("prevChatroomGuestImageUrl", $guestImageUrl);
        localStorage.setItem("prevChatroomGuestId", $guestId);
        localStorage.setItem("prevChatroomGuestHost", $guestHostId);
        setBuildingCode($building);
        // setInterval(buildChattingRoom(buildingCode, $guestHostId, $guestId), 5000);
        buildChattingRoom(buildingCode, $guestHostId, $guestId);
    }

    function buildChattingRoom(buildingCode, guestHost, guestId) {
        db.collection("messages").doc(buildingCode + '-' + guestHost + '-' + guestId).collection(buildingCode + '-' + guestHost + '-' + guestId)
            .get().then((querySnapshot) => {
                var output = '';
                querySnapshot.forEach((doc) => {
                    // console.log(`${doc.id} => ${doc.data().content }`);
                    console.log('test');
                    var time;
                    if (doc.data().idFrom == buildingCode) {
                        output += '<div class="d-flex justify-content-end align-items-end mt-1">';
                        output += '<div class="chatting-time mr-2">';
                        output += msToTime(parseInt(doc.data().timestamp));
                        output += '</div>';
                        output += '<div class="chatting-content-right pl-3 pr-3 pt-2 pb-2 mr-3">';
                        output += doc.data().content;
                        output += '</div>';
                        output += '</div>';
                    } else {
                        output += '<div class="d-flex justify-content-start align-items-end mt-1">';
                        output += '<div class="chatting-content-left pl-3 pr-3 pt-2 pb-2 ml-3">';
                        output += doc.data().content;
                        output += '</div>';
                        output += '<div class="chatting-time ml-2">';
                        output += '21:00';
                        output += '</div>';
                        output += '</div>';
                    }
                });

                $('#chatting_room').html(output);
            });
        return refresh(buildingCode, guestHost, guestId);
    }

    // function buildChattingRoom(buildingCode, guestHost, guestId) {
    //     db.collection("messages").doc(buildingCode + '-' + guestHost + '-' + guestId).collection(buildingCode + '-' + guestHost + '-' + guestId)
    //         .get().then((querySnapshot) => {
    //             var output = '';
    //             querySnapshot.forEach((doc) => {
    //                 // console.log(`${doc.id} => ${doc.data().content }`);
    //                 console.log('test');
    //                 var time;
    //                 if (doc.data().idFrom == buildingCode) {
    //                     output += '<div class="d-flex justify-content-end align-items-end mt-1">';
    //                     output += '<div class="chatting-time mr-2">';
    //                     output += msToTime(parseInt(doc.data().timestamp));
    //                     output += '</div>';
    //                     output += '<div class="chatting-content-right pl-3 pr-3 pt-2 pb-2 mr-3">';
    //                     output += doc.data().content;
    //                     output += '</div>';
    //                     output += '</div>';
    //                 } else {
    //                     output += '<div class="d-flex justify-content-start align-items-end mt-1">';
    //                     output += '<div class="chatting-content-left pl-3 pr-3 pt-2 pb-2 ml-3">';
    //                     output += doc.data().content;
    //                     output += '</div>';
    //                     output += '<div class="chatting-time ml-2">';
    //                     output += '21:00';
    //                     output += '</div>';
    //                     output += '</div>';
    //                 }
    //             });

    //             $('#chatting_room').html(output);
    //         });
    //     return refresh(buildingCode, guestHost, guestId);
    // }
    function buildChattingRoom(buildingCode, guestHost, guestId) {
        db.collection("messages").doc(buildingCode + '-' + guestHost + '-' + guestId).collection(buildingCode + '-' + guestHost + '-' + guestId)
            .onSnapshot(function(querySnapshot) {
                var output = '';
                querySnapshot.forEach((doc) => {
                    // console.log(`${doc.id} => ${doc.data().content }`);
                    console.log('test');
                    var time;
                    if (doc.data().idFrom == buildingCode) {
                        output += '<div class="d-flex justify-content-end align-items-end mt-1">';
                        output += '<div class="chatting-time mr-2">';
                        output += msToTime(parseInt(doc.data().timestamp));
                        output += '</div>';
                        output += '<div class="chatting-content-right pl-3 pr-3 pt-2 pb-2 mr-3">';
                        output += doc.data().content;
                        output += '</div>';
                        output += '</div>';
                    } else {
                        output += '<div class="d-flex justify-content-start align-items-end mt-1">';
                        output += '<div class="chatting-content-left pl-3 pr-3 pt-2 pb-2 ml-3">';
                        output += doc.data().content;
                        output += '</div>';
                        output += '<div class="chatting-time ml-2">';
                        output += '21:00';
                        output += '</div>';
                        output += '</div>';
                    }
                });

                $('#chatting_room').html(output);
                var objDiv = document.getElementById("chatting_room");
                objDiv.scrollTop = objDiv.scrollHeight;
                // console.log("Current messages in CA: ", messages.join(", "));
            });
    }

    // function refresh(buildingCode,guestHost,guestId) {
    //     setTimeout(buildChattingRoom(buildingCode,guestHost,guestId), 500000);
    // }

    function msToTime(duration) {
        var milliseconds = parseInt((duration % 1000) / 100),
            seconds = Math.floor((duration / 1000) % 60),
            minutes = Math.floor((duration / (1000 * 60)) % 60),
            hours = Math.floor((duration / (1000 * 60 * 60)) % 24);

        hours = (hours < 10) ? "0" + hours : hours;
        minutes = (minutes < 10) ? "0" + minutes : minutes;
        seconds = (seconds < 10) ? "0" + seconds : seconds;

        return hours + ":" + minutes;
    }

    function sendMessage($building) {
        const timestamp = Date.now().toString();
        var buildingCode;
        buildingCode = '200101';
        var guestId = localStorage.getItem('prevChatroomGuestId');
        var guestHostId = localStorage.getItem('prevChatroomGuestHostId');
        var building = localStorage.getItem('building');
        var messageContent = document.getElementById('message').value;
        if (messageContent != null) {
            db.collection("messages").doc(buildingCode + '-' + guestHostId + '-' + guestId).collection(buildingCode + '-' + guestHostId + '-' + guestId).doc(timestamp).set({
                    content: messageContent,
                    idFrom: buildingCode,
                    idTo: guestHostId,
                    timestamp: timestamp,
                    type: 0
                }).then(function() {
                    document.getElementById('message').value = '';
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{ route('sendNotification') }}",
                        type: 'POST',
                        data: {
                            _token: CSRF_TOKEN,
                            'staffId': guestHostId,
                            'message': messageContent,
                            'title': 'Admin ' + building,
                        },
                        success: function(data) {
                            console.log(data);
                        },
                        error: function(data, textStatus, errorThrown) {
                            console.log(data);
                            console.log(textStatus);
                            console.log(errorThrown);
                            console.log("ERROR");
                        },
                    })
                })
                .catch(function(error) {
                    console.error("Error adding document: ", error);
                });
        }
    }

    // function sendMessage($building) {
    //     const timestamp = Date.now().toString();
    //     var buildingCode;
    //     buildingCode = '200101';
    //     var guestId = localStorage.getItem('prevChatroomGuestId');
    //     var guestHost = localStorage.getItem('prevChatroomGuestHost');
    //     var messageContent = document.getElementById('message').value;
    //     if (messageContent != null) {
    //         db.collection("messages").doc(buildingCode + '-' + guestHost + '-' + guestId).collection(buildingCode + '-' + guestHost + '-' + guestId).doc(timestamp).set({
    //                 content: messageContent,
    //                 idFrom: buildingCode,
    //                 idTo: guestHost,
    //                 timestamp: timestamp,
    //                 type: 0
    //             }).then(function() {
    //                 document.getElementById('message').value = '';
    //             })
    //             .catch(function(error) {
    //                 console.error("Error adding document: ", error);
    //             });
    //     }
    // }
</script>
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function() {
        $('#visitor_today_table').DataTable();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


    });
</script>
@endsection