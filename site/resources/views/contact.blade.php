@extends('Layout.app')
@section('title','Conact')
@section('content')

    <div class="container-fluid jumbotron mt-5 ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6  text-center">
                <h1 class="page-top-title mt-3">- যোগাযোগ করুন  -</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d164776.17085878825!2d90.16175965302628!3d24.1340614101658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755fdb28eec55c5%3A0x1117679d80957ff!2z4Kau4Ka_4Kaw4KeN4Kac4Ka-4Kaq4KeB4Kaw!5e0!3m2!1sbn!2sbd!4v1615312597390!5m2!1sbn!2sbd" width="550" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>></iframe>
            </div>
            <div class="col-md-6">
                <h3 class="service-card-title">ঠিকানা</h3>
                <hr>
                <p class="footer-text"><i class="fas fa-map-marker-alt"></i> মির্জাপুর,টাঙ্গাইল,ঢাকা  <i class="fas ml-2 fa-phone"></i>   ০১৬১৩-১০১০১১   <i class="fas ml-2 fa-envelope"></i>   ashimtapu@gmail.com</p>
                <h3 class="service-card-title">মেসেজ পাঠান </h3>
                <div class="form-group ">
                    <input id="contactNameId" type="text" class="form-control w-100" placeholder="আপনার নাম">
                </div>
                <div class="form-group">
                    <input id="contactMobileId" type="text" class="form-control  w-100" placeholder="মোবাইল নং ">
                </div>
                <div class="form-group">
                    <input id="contactEmailId" type="text" class="form-control  w-100" placeholder="ইমেইল ">
                </div>
                <div class="form-group">
                    <input id="contactMsgId" type="text" class="form-control  w-100" placeholder="মেসেজ ">
                </div>
                <button id="contactSendBtnId"  class="btn btn-block normal-btn w-100">পাঠিয়ে দিন </button>
            </div>
        </div>
    </div>
@endsection

