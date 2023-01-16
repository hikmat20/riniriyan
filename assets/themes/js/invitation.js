window.scrollTo(0, 0);

$(document).ready(function () {
   run_AOS();
   $(".sakura-falling").sakura();
   $(".slide-photo").slick({
      infinite: true,
      speed: 1000,
      fade: true,
      cssEase: "linear",
      autoplay: true,
      autoplaySpeed: 3000,
      // loop: true,
      arrows: false,
   });

   $(".slider-for").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: ".slider-nav",
   });

   $(".slider-nav").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: ".slider-for",
      dots: true,
      centerMode: true,
      focusOnSelect: true,
      arrows: false,
   });

   $(".whises").slick({
      dots: false,
      infinite: true,
      speed: 1500,
      slidesToShow: 1,
      slidesToScroll: 1,
      adaptiveHeight: true,
      arrows: true,
      autoplay: true,
      autoplaySpeed: 3000,
   });

   // Send greeting
   $(document).on("click", "#send", function () {
      // alert('send');
      let name = $("#name").val();
      let greeting = $("#greeting").val();
      let present = $("#present").val();
      $("#send").prop("disabled", true);
      $("#icon-send").addClass("d-none");
      $("#loading").removeClass("d-none");
      $("#name").removeClass("is-invalid");
      $("#greeting").removeClass("is-invalid");
      $("#present").removeClass("is-invalid");

      if (name == "") {
         $("#alertMsg").css({ opacity: "1" }).html("<small>Isi Nama kamu dulu ya!</small>");
         $("#name").addClass("is-invalid");
         // return false;
         // alert("Isi Nama kamu dulu ya!");
      } else if (greeting == "") {
         $("#alertMsg").css({ opacity: "1" }).html("<small>Jangan lupa kasih Ucapan dan Do'a kamu untuk kedua mempelai!</small>");
         $("#greeting").addClass("is-invalid");
         // return false;
         // alert("Jangan lupa kasih Ucapan dan Do'a kamu untuk kedua mempelai!");
      } else if (present == "") {
         $("#alertMsg").css({ opacity: "1" }).html("<small>Jangan lupa juga Konfirmasi kehadiran mu di acara pernikahan kami ya..!!</small>");
         $("#present").addClass("is-invalid");
         // return false;
         // alert("Jangan lupa juga Konfirmasi kehadiran mu di acara pernikahan kami ya..!!");
      } else {
         let formData = new FormData($("#form-wish")[0]);
         $.ajax({
            url: "models/send_greeting.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            async: false,
            dataType: "JSON",
            success: function (result) {
               console.log(result);
               if (result.code == 1) {
                  $("#alertMsg")
                     .css({ opacity: "1" })
                     .html("<small>" + result.msg + "</small>");
                  const confirmation = () => {
                     if (result.present == "1") {
                        return "bg-success";
                     } else if (result.present == "2") {
                        return "bg-danger";
                     } else if (result.present == "3") {
                        return "bg-warning";
                     } else {
                        return false;
                     }
                  };

                  const greet =
                     `<div class="slick-slide slick-cloned"><div><div class="px-3">
                     <div class="card shadow-sm text-theme-primary" style="border-radius: 1rem; background-image:url('assets/images/background.jpg');background-position: top center;background-repeat: repeat-y;background-size: cover;">
                        <div class="card-body position-relative">
                           <div class="mb-3 px-1">
                                 <div class="mb-2 d-flex justify-content-between align-items-center">
                                    <span class="comments_name fw-bold">` +
                     result.name +
                     `</span>
                                    <span class="badge badge-sm font-size-10 text-sm ` +
                     confirmation +
                     ` comments_confirmations">` +
                     result.present +
                     `</span>
                                 </div>
                                 <p class=" text-theme-primary font-size-14 rounded-3">
                                    ` +
                     result.greeting +
                     `
                                    <small class="text-muted font-size-10 d-block mt-2"><i>` +
                     result.date +
                     `</i></small>
                                 </p>
                           </div>

                        </div>
                     </div>
                     </div>
                     </div>
               </div>`;
                  $(".whises").slick("slickAdd", greet);
                  console.log(result.count_present.dt_confirm);
                  console.log(result.count_present.dt_unconfirm);
                  console.log(result.count_present.dt_tentative);
                  $("#total_comments").text(result.count_present.getGreeting);
                  $("#total_confirm").text(result.count_present.dt_confirm);
                  $("#total_unconfirm").text(result.count_present.dt_unconfirm);
                  $("#total_tentative").text(result.count_present.dt_tentative);

                  setTimeout(function () {
                     // $("#alertMsg").fadeOut("slow");
                     $("#send").prop("disabled", false);
                     $("#loading").addClass("d-none");
                     $("#icon-send").removeClass("d-none");
                     $("#name").val("");
                     $("#greeting").val("");
                     $("#present").val("1").change();
                  }, 500);
               } else {
                  setTimeout(function () {
                     // $("#alertMsg").fadeOut("slow");
                     $("#send").prop("disabled", false);
                     $("#loading").addClass("d-none");
                     $("#icon-send").removeClass("d-none");
                     $("#name").val("");
                     $("#greeting").val("");
                     $("#present").val("1").change();
                  }, 500);
               }

               // $(".whises").load("models/load_greeting.php");

               // location.reload();
            },

            error: function (result) {
               $("#alertMsg").html("<div class='alert alert-danger'>#Internal server error!!</div>");
            },
         });
      }
      setTimeout(function () {
         // $("#alertMsg").fadeOut("slow");
         $("#send").prop("disabled", false);
         $("#loading").addClass("d-none");
         $("#icon-send").removeClass("d-none");
      }, 500);
      setTimeout(function () {
         $("#alertMsg").css({ opacity: "0" });
      }, 5000);
   });
});

function run_AOS() {
   AOS.init({
      // Global settings:
      disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
      startEvent: "DOMContentLoaded", // name of the event dispatched on the document, that AOS should initialize on
      initClassName: "aos-init", // class applied after initialization
      animatedClassName: "aos-animate", // class applied on animation
      useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
      disableMutationObserver: false, // disables automatic mutations' detections (advanced)
      debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
      // throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)

      // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
      offset: -20, // offset (in px) from the original trigger point
      delay: 0, // values from 0 to 3000, with step 50ms
      duration: 2000, // values from 0 to 3000, with step 50ms
      easing: "ease", // default easing for AOS animations
      once: false, // whether animation should happen only once - while scrolling down
      mirror: true, // whether elements should animate out while scrolling past them
      anchorPlacement: "center-center", // defines which position of the element regarding to window should trigger the animation
   });
}

// Set the date we're counting down to
var countDownDate = new Date("Feb 19, 2023 08:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function () {
   // Get today's date and time
   var now = new Date().getTime();

   // Find the distance between now and the count down date
   var distance = countDownDate - now;

   // Time calculations for days, hours, minutes and seconds
   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
   var seconds = Math.floor((distance % (1000 * 60)) / 1000);

   // Display the result in the element with id="demo"
   document.getElementById("days").innerHTML = days.toString().padStart(2, 0);
   document.getElementById("hours").innerHTML = hours.toString().padStart(2, 0);
   document.getElementById("minutes").innerHTML = minutes.toString().padStart(2, 0);
   document.getElementById("seconds").innerHTML = seconds.toString().padStart(2, 0);

   // If the count down is finished, write some text
   if (distance < 0) {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "EXPIRED";
   }
}, 1000);

//Get the button
var mybutton = document.getElementById("myBtn");
var btnMusic = document.getElementById("btn-music");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
   scrollFunction();
};

function scrollFunction() {
   if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
      mybutton.style.display = "block";
      btnMusic.style.display = "block";
      btnMusic.style.transition = "all .5s";
   } else {
      mybutton.style.display = "none";
      btnMusic.style.display = "none";
      btnMusic.style.transition = "all .5s";
   }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
   document.body.scrollTop = 0;
   document.documentElement.scrollTop = 0;
}

function togglePlay() {
   if (myAudio.paused) {
      $("#btn-music").html("<span class='material-icons mb-18'>music_note</span>");
   } else {
      $("#btn-music").html("<span class='material-icons mb-18'>music_off</span>");
   }

   return myAudio.paused || myAudio.stoped ? myAudio.play() : myAudio.pause();
}

function playAudio() {
   $("body").removeClass("overflow-hidden");
   $(".cover").addClass("open");
   setTimeout(() => {
      openFullscreen();
   }, 1000);
   return myAudio.play();
}

function openFullscreen() {
   if (document.documentElement.requestFullscreen) {
      document.documentElement.requestFullscreen();
   } else if (document.documentElement.webkitRequestFullscreen) {
      /* Safari */
      document.documentElement.webkitRequestFullscreen();
   } else if (document.documentElement.msRequestFullscreen) {
      /* IE11 */
      document.documentElement.msRequestFullscreen();
   }
}
