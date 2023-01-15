<?php
require_once 'models/timesince.php';
require_once 'models/greetings.php';

$base_link      = "https://nikahalal.com/riniriyan/";
$couple_title   = "Undangan Pernikahan Rini & Riyan";
$date           = "Minggu, 19 Februari 2023";

$couple_name    = "Rini & Riyan";
$bride          = "Rini Apriana";
$groom          = "Riyan Yulianto";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $couple_title; ?></title>
    <link href="<?= $base_link; ?>assets/favicon.png" rel="icon">
    <link href="<?= $base_link; ?>assets/favicon.png" rel="apple-touch-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta property="og:title" content="<?= $couple_title; ?>" />
    <meta property="og:image" content="<?= $base_link; ?>assets/thumbnail.jpg" />
    <meta property="og:url" content="<?= $base_link; ?>" />
    <meta property=" og:site_name" content="<?= $couple_title; ?>" />
    <meta property="og:description" content="<?= $date; ?> - <?= $couple_title; ?>" />
    <link rel="shortcut icon" href="<?= $base_link; ?>assets/thumbnail.jpg" type="image/x-icon" />
    <meta name="description" content="<?= $couple_title; ?> - <?= $date; ?>">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/themes/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="assets/lib/bootstraps-5/bootstrap.min.css">
    <link rel="stylesheet" href="assets/lib/slick/slick.css">
    <link rel="stylesheet" href="assets/lib/slick/slick-theme.css">
    <link rel="stylesheet" href="assets/lib/aos/aos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>


</head>

<body class="position-relative overflow-hidden">
    <audio id="myAudio" loop="true" autoplay="true">
        <source src="assets/media/song.mp3" type="audio/ogg">
        <source src="assets/media/song.mp3" type="audio/mpeg">
    </audio>
    <div class="wrapper-container position-relative">
        <button onclick="topFunction()" id="myBtn" class="shadow" title="Go to top">
            <span class="material-icons">
                arrow_upward
            </span>
        </button>
        <button onclick="togglePlay()" id="btn-music" class="shadow" title="Play Song">
            <span class="material-icons">
                music_note
            </span>
        </button>
        <!-- COVER -->
        <div class="content">

            <section class="cover pb-5">
                <div class="text-content text-center mt-5" style="z-index:9999 ;">
                    <h3 class="title-text-1 fw-bolder font-size-40 text-theme-primary mb-0" style="letter-spacing: 10px;" data-aos="zoom-in">Undangan</h3>
                    <p class="text-theme-primary" data-aos="zoom-in" data-aos-delay="600">
                        <?= $date; ?></p>
                </div>

                <div class="py-5">
                    <div class="text-center mt-5 py-3 mx-5" style="border:4px solid #be9343;border-radius:20px 0px 20px 0px" data-aos="zoom-in" data-aos-delay="400">
                        <h1 class="text-gold ft-20 font-size-48 text-shadow-m">
                            <?= $couple_name; ?></h1>
                    </div>
                </div>

                <div class="text-content text-center absolute bottom-text" style="z-index: 99999;">
                    <div class="guest-detail text-theme-primary" data-aos="fade-in" data-aos-delay="800">
                        <span class="">Kepada Yth,</span><br>
                        <span class="">Bapak/Ibu/Saudara/i :</span>
                        <h3 class="my-1 fw-bold h3 ">
                            <u>
                                <?php if (isset($_GET['to'])) : ?>
                                    <?= str_replace('+', ' ', str_replace('dan', '&', ucfirst(@$_GET['to']))); ?>
                                <?php endif; ?>
                            </u>
                        </h3>
                        <span class="text-shadow-sm">Di tempat</span>
                    </div>
                    <button type="button" onclick="playAudio()" class="btn btn-theme-primary mt-3" data-aos="fade-up" data-aos-delay="1000">
                        <i class='bx bxs-book-heart'></i> Buka Undangan
                    </button>
                </div>

                <!-- <div class="section-divider-3"></div> -->
            </section>


            <section class="first-slide pb-5" style="background-image:url('assets/images/background.jpg');background-position: top center;background-repeat: repeat-y;background-size: contain;">
                <div class="text-content pb-4 h-100 px-3 d-flex align-items-center text-center flex-column justify-content-center" data-aos="fade-in">
                    <div class="text-content text-center text-invitation" style="z-index:1 ;">
                        <!-- <h3 class="title-text-1 text-theme-primary text-shadow-sm" data-aos="zoom-in">Pernikahan</h3> -->
                        <div class="text-center mt-5 py-3 mx-5 mb-4" style="border:4px solid #be9343;border-radius:20px 0px 20px 0px" data-aos="zoom-in" data-aos-delay="400">
                            <h1 class="text-gold ft-20 font-size-40 text-shadow-m">
                                <?= $couple_name; ?></h1>
                        </div>
                        <!-- <p class="text-theme-primary font-size-12" data-aos="zoom-in-up" data-aos-delay="600"><?= $date; ?></p> -->
                    </div>

                    <p class="text-theme-primary text-center">
                        "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan
                        untukmu
                        dari jenismu sendiri, agar
                        kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih
                        dan
                        sayang. Sungguh, pada yang
                        demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi kaum yang
                        berpikir."<br>
                        <span class="mt-2 fw-bolder text-theme-primary">(QS. AR-Rum - 21)</>
                    </p>
                </div>

                <!-- <div class="section-divider-3"></div> -->
            </section>

            <!-- Couple -->
            <section class="h-100 position-relative overflow-hidden d-flex align-items-center" style="background-image:url('assets/images/background.jpg');background-position: top center;background-repeat: repeat-y;background-size: contain;">
                <div id="couple" class="text-center pt-2 px-3 pb-4">
                    <h6 class="fw-bold text-theme-primary d-block mb-2" data-aos-delay="500" data-aos="fade-in"> Assalamu'alaikum Wr. Wb</h6>
                    <p class="text-theme-primary mb-5" data-aos="fade-in" data-aos-delay="700">
                        Maha suci Allah yang telah menciptakan Makhluk-Nya berpasang-pasangan.
                        Ya Allah semoga Ridho-Mu tercurah mengiringi putra-putri kami :
                    </p>

                    <div class="text-center my-5" data-aos="zoom-in" data-aos-delay="400">
                        <img src="assets/images/icon/genders.svg" alt="" width="50px" class="">
                    </div>

                    <div class="text-content">
                        <p class="ft-20 font-size-36 text-gold mb-1" data-aos="fade-right" data-aos-delay="500">
                            <?= $bride; ?>
                        </p>
                        <!-- <hr class="w-75 text-center m-auto border border-3 border-start-0 border-end-0 border-white border-bottom-0"> -->
                        <div class="" data-aos="zoom-in">
                            <label class="mt-3 font-size-12 text-theme-primary">Putri Bungsu dari</label>
                            <label class=" font-size-12 text-theme-primary">Bpk. Suparno (Alm) & Ibu Irah</label>
                        </div>
                    </div>

                    <div class="with text-center py-3">
                        <h2 class="ft-20 text-gold font-size-30" data-aos-delay="300" data-aos="zoom-in">&</h2>
                    </div>

                    <div class="text-content text-center py-3" style="z-index:9999 ;">
                        <div class="text-content">
                            <p class="ft-20 font-size-36 text-gold mb-1" data-aos="fade-left" data-aos-delay="800">
                                <?= $groom; ?>
                            </p>
                            <!-- <hr class="w-75 text-center m-auto border border-3 border-start-0 border-end-0 border-white border-bottom-0"> -->
                            <div class="" data-aos="zoom-in">
                                <label class="mt-3 font-size-12 text-theme-primary">Putra Pertama</label>
                                <label class="font-size-12 text-theme-primary">Bpk. Sugihardi (Alm) & Ibu Robiah</label>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <!-- Event -->
            <section id="event" class="position-relative h-100" style="background-image:url('assets/images/background.jpg');background-position: top center;background-repeat: repeat-y;background-size: contain;">
                <div class="px-3  h-100 d-flex align-items-center">
                    <div class="card text-center shadow text-white py-3 border-0 mb-3" style="border-radius:1rem;background-color:#271007d1" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="">
                        <div class="card-body">
                            <div class="text-center mb-4" data-aos="zoom-in" data-aos-delay="400">
                                <img src="assets/images/icon/flowers.svg" alt="" width="50px" class="">
                            </div>
                            <p class="font-size-14 mb-5">
                                Dengan memohon Rahmat dan Ridho Allah SWT.
                                Kami bermaksud akan menyelenggarakan acara pernikahan putra-putri kami. Yang Insyaallah akan dilaksanakan pada :
                            </p>

                            <div class="d-flex justify-content-center align-items-center mb-5" style="flex:1 1 0">
                                <div class="text-center flex-grow-0 px-2">
                                    <label for="" class="fw-bold font-size-12">Akad Nikah</label>
                                    <p class="font-size-12">Pukul : 08.00 WIB</p>
                                </div>
                                <div class="text-center px-2" style="border-left:2px solid;border-right:2px solid">
                                    <p class="font-size-12 mb-0 ">Minggu</p>
                                    <p class="font-size-30 mb-0">19</p>
                                    <p class="font-size-12 mb-0 ">Februari 2023</p>
                                </div>
                                <div class="text-center flex-grow-0">
                                    <label for="" class="fw-bold font-size-12">Resepsi</label>
                                    <p class="font-size-12">Pukul : 11.00 - 17.00 WIB</p>
                                </div>
                            </div>

                            <div class="text-center font-size-12">
                                <p>Bertempat di <strong>Villa Mas Garden Blok B.119</strong>
                                    <br>
                                    RT. 004 RW. 009, Kel.Perwira, Kec. Bekasi Utara 17122
                                </p>
                                <p>Merupakan suatu kehormatan dan kebahagiaan bagi kami, apabila Bapak/Ibu/Saudara/i berkenan untuk hadir untuk memberikan do'a dan restu kepada kedua mempelai.</p>
                                <p class="font-size-14">Wassalamu'alaikum Wr. Wb.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="mapss" class="pb-5" style="background-image:url('assets/images/background.jpg');background-position: top center;background-repeat: repeat-y;background-size: cover;">
                <div class="px-3 pb-5">
                    <div class="card text-center shadow text-theme-primary border-0" style="border-radius:1rem ;" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="800">
                        <div class="card-body">
                            <h2 class="my-4 text-theme-primary mb-3 font-size-32" data-aos="fade-up">Peta Lokasi</h2>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3966.4104054089858!2d107.0088407!3d-6.2094766!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6989cb5377fb1b%3A0x165c899232377874!2sBlok%20B.%20119!5e0!3m2!1sid!2sid!4v1673719272348!5m2!1sid!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <a href="https://goo.gl/maps/s7sPAS5sdJpyN8jp7" class="btn btn-sm fw-bold btn-light mt-4" data-aos="zoom-in">
                                <i class='bx bxs-map-alt mt-1'></i> Lihat Peta Lokasi
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section id="countdown" style="background-image:url('assets/images/background.jpg');background-position: top center;background-repeat: repeat-y;background-size: cover;">
                <h2 class="mb-3 py-3 text-center m-auto text-theme-primary font-size-32" data-aos="zoom-in">Menuju Bahagia</h2>
                <div class="countdown d-flex justify-content-evenly gap-3 px-3 py-">
                    <div class="countdown-item shadow-lg py-1 px-3 bg-theme-primary text-white" data-aos="zoom-in" data-aos-delay="400">
                        <div class="d-flex justify-content-center flex-column">
                            <span id="days" class="h1 m-0 slim_summer">00</span>
                            <small>Days</small>
                        </div>
                    </div>
                    <div class="countdown-item shadow py-1 px-3 bg-theme-primary text-white" data-aos="zoom-in" data-aos-delay="800">
                        <div class="d-grid gap-0">
                            <span id="hours" class="h1 m-0 slim_summer">00</span>
                            <small>Hour</small>
                        </div>
                    </div>
                    <div class="countdown-item shadow py-1 px-3 bg-theme-primary text-white" data-aos="zoom-in" data-aos-delay="1200">
                        <div class="d-flex justify-content-center flex-column">
                            <span id="minutes" class="h1 m-0 slim_summer">00</span>
                            <small>Min</small>
                        </div>
                    </div>
                    <div class="countdown-item shadow py-1 px-3 bg-theme-primary text-white" data-aos="zoom-in" data-aos-delay="1400">
                        <div class="d-flex justify-content-center flex-column">
                            <span id="seconds" class="h1 m-0 slim_summer">00</span>
                            <small>Sec</small>
                        </div>
                    </div>
                </div>

                <div class="save-date text-center py-5">
                    <button type="button" class="btn btn-sm btn-theme-primary fw-bold" data-aos="zoom-in" data-aos-delay="400">
                        <i class='bx bxs-calendar-heart'></i> Save the Date
                    </button>
                </div>
            </section>


            <!-- Gift -->
            <section id="whises" class="pt-4 pb-2 bg-theme-primary px-3 position-relative">
                <div class="text-white text-center">
                    <h2 class="text-white mb-3 mt-5 font-size-32" data-aos="zoom-in">Ucapan & Do'a</h2>
                    <p class="my-0" data-aos="fade-up">
                        Berikan do'a terbaik untuk kedua mempelai.
                    </p>
                </div>

                <div class="card shadow-sm text-center border-0 my-4" style="border-radius: 1rem;background-image:url('assets/images/background.jpg');background-position: top center;background-repeat: repeat-y;background-size: cover;" data-aos="zoom-in">
                    <div class="card-body fw-bold">
                        <form id="form-wish" class="text-start" data-aos="zoom-out" data-aos-delay="1000">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control fw-bold" name="name" id="name" placeholder="Nama Kamu">
                            </div>
                            <div class="mb-3">
                                <label for="greeting" class="form-label">Ucapan/Do'a</label>
                                <textarea name="greeting" id="greeting" class="form-control fw-bold" placeholder="Ucapan/Do'a terbaik"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="present" class="form-label">Konfirmasi</label>
                                <select name="present" id="present" class="form-select fw-bold">
                                    <option value="1" class="fw-bold">Hadir</option>
                                    <option value="2" class="fw-bold">Tidak Hadir</option>
                                    <option value="3" class="fw-bold">Semoga Hadir</option>
                                </select>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button type="button" id="send" class="btn btn-theme-primary text-center">
                                    <i id="icon-send" class='bx bxs-paper-plane'></i>
                                    Kirim
                                    <i id="loading" class='spinner-border spinner-border-sm d-none'></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card shadow-sm fw-bold text-theme-primary mb-3" style="border-radius: 1rem; background-image:url('assets/images/background.jpg');background-position: top center;background-repeat: repeat-y;background-size: cover;" data-aos="zoom-in">
                    <div class="card-body px-0 position-relative">
                        <div class="text-center mb-3 fw-bold text-theme-primary">
                            <label for="" class="fw-bold">Ucapan : <span id="total_comments"><?= count($getGreeting); ?></span></label>
                        </div>
                    </div>
                </div>
            </section>

            <section class="pb-2 bg-theme-primary position-relative load-whises">
                <div class="new-greeting"></div>
                <div class="whises" data-aos="fade-right">
                    <?php foreach ($getGreeting as $greeting) : ?>
                        <div class="px-3">
                            <div class="card shadow-sm text-theme-primary" style="border-radius: 1rem; background-image:url('assets/images/background.jpg');background-position: top center;background-repeat: repeat-y;background-size: cover;">
                                <div class="card-body position-relative">
                                    <div class="mb-3 px-1">
                                        <div class="mb-2 d-flex justify-content-between align-items-center">
                                            <span class="comments_name fw-bold"><?= $greeting['name']; ?></span>
                                            <!-- <span class="badge badge-sm font-size-10 text-sm <?= ($greeting['present'] == '1') ? 'bg-success' : (($greeting['present'] == '2') ? 'bg-danger' : 'bg-warning'); ?> comments_confirmations"><?= $confirm[$greeting['present']]; ?></span> -->
                                        </div>
                                        <p class=" text-theme-primary font-size-14 rounded-3">
                                            <?= $greeting['greeting']; ?>
                                            <small class="text-muted font-size-10 d-block mt-2"><i><?= time_since(strtotime($greeting['created_at'])); ?></i></small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="bg-theme-primary pb-5 pt-3">
                <p class="text-divider my-2 text-white">
                    <span class="material-icons">
                        favorite
                    </span>
                </p>
                <h3 class="text-center ft-20 text-white"><?= $couple_name; ?></h3>
            </section>
            <div id="alertMsg" class="text-white text-center">
                <small>
                    You should check in on some of those fields below.
                </small>
            </div>
        </div>
    </div>
</body>

<!-- JS -->
<script src="assets/themes/js/jquery-3.6.0.min.js"></script>
<script src="assets/lib/bootstraps-5/bootstrap.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="assets/lib/slick/slick.js"></script>
<script src="assets/lib/aos/aos.js"></script>
<script src="assets/themes/js/invitation.js"></script>

</html>