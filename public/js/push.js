  $(document).ready(function(){
    // Initialize Firebase
    var config = {
      apiKey: "AIzaSyCrormnOYw_R6XfWjSa805bWnEBRhFyunU",
      authDomain: "de-hutmut.firebaseapp.com",
      databaseURL: "https://de-hutmut.firebaseio.com",
      projectId: "de-hutmut",
      storageBucket: "de-hutmut.appspot.com",
      messagingSenderId: "1076331702152"
    };
    $("#registerPushBtn").click( function(){
      firebase.initializeApp(config);
      const messaging = firebase.messaging();
      messaging.requestPermission()
      .then(function(){
        return messaging.getToken();
      })
      .then(function(token){
         $.ajax({

                type: 'post',
                url:"/account/pushRegister",
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    user_token: token
                },
                success: function(data) {
                    console.log(data);
                    $('#pushSuccess').append('<div class="alert alert-success">Gelukt, je ontvangt vanaf nu Push Notificatie(s) als je iets wint.</div>');
                    $('#pushSuccess').fadeOut(4000);
                 },
                error: (error) => {
                  console.log(error);
                }
            });
      })
      .catch(function(err){
        console.log('error occured');
      })

    messaging.onMessage(function(payload){
        console.log('onMessage ', payload);
    });
  }); // button click
}); // doc rdy







