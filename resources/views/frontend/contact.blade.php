@extends('frontend.layout')

@section('contacts')
<div class="intro-header">
    <div style="display: block" class="container">
        <h1>Thông tin liên hệ</h1>
        <p>Nơi mùi hương gặp gỡ phong cách</p>
    </div>
</div>
<div class="container contact-container">
    <div class="row">
        <div class="col-md-6">
            <div class="contact-info">
                <h3>Thông tin liên hệ</h3>
                <div class="contact-details">
                    <i class="fas fa-map-marker-alt"></i> 169 Gò Xoài,P.BHHA,Q.Bình Tân,Tp.HCM
                </div>
                <div class="contact-details">
                    <i class="fas fa-phone"></i> 090 2346 044
                </div>
                <div class="contact-details">
                    <i class="fas fa-envelope"></i> lehuuvinh159@gmail.com
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="contact-form">
                <h3>Gửi thông tin cho chúng tôi</h3>
                <form>
                    <div class="form-group">
                        <label for="name">Tên Bạn:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email bạn:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="message">Message bạn:</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="Enter your message"></textarea>
                    </div>
                    <button type="submit" class="btn contact-button">Gửi thông tin</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
