<?php session_start();
include("./comp/header.php"); ?>
<?php include("./comp/navbar.php"); ?>



<!-- Contact Start -->
<div class="container-fluid contact py-5">
    <div class="container py-5">
        <div class="p-5 bg-light rounded">
            <div class="row g-4">
                <div class="col-12">
                    <div class="text-center mx-auto" style="max-width: 700px;">
                        <h1 class="text-primary">Kunjungi Toko Kami</h1>
                        <p class="mb-4">Dapatkan bakery 100% homemdae dengan kualitas terbaik disini</p>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="h-100 rounded">
                    <iframe class="rounded w-100" style="height: 400px;"
                            src="https://maps.google.com/maps?q=Jl.+Dr.+Setia+Budi+No.2B,+Pati+Kidul,+Kec.+Pati,+Kabupaten+Pati,+Jawa+Tengah+59114&t=&z=19&ie=UTF8&iwloc=&output=embed"
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-map-marker-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Alamat</h4>
                            <p class="mb-2">l. Dr. Setia Budi No.2B, Pati Kidul, Kec. Pati, Kabupaten Pati, Jawa Tengah
                                59114</p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded mb-4 bg-white">
                        <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                        <div>
                            <h4>Sosial Media</h4>
                            <p class="mb-2"><a
                                    href="https://www.instagram.com/joycakebakerypati/" target="_blank">@joycakebakerypati</a>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex p-4 rounded bg-white">
                        <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                        <div>
                            <h4>No WhatsApp</h4>
                            <p class="mb-2"><a href="https://api.whatsapp.com/send?phone=6285772052750" target="_blank">085772052750</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<?php include("./comp/footer.php"); ?>