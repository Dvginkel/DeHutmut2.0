importScripts('https://www.gstatic.com/firebasejs/4.13.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.13.0/firebase-messaging.js');

  var config = {
    apiKey: "AIzaSyCrormnOYw_R6XfWjSa805bWnEBRhFyunU",
    authDomain: "de-hutmut.firebaseapp.com",
    databaseURL: "https://de-hutmut.firebaseio.com",
    projectId: "de-hutmut",
    storageBucket: "de-hutmut.appspot.com",
    messagingSenderId: "1076331702152"
  };
  firebase.initializeApp(config);

const messaging = firebase.messaging();
