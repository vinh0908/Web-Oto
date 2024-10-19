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
                <h3>Contact Information</h3>
                <div class="contact-details">
                    <i class="fas fa-map-marker-alt"></i> 123 Main Street, Cityville, State 12345
                </div>
                <div class="contact-details">
                    <i class="fas fa-phone"></i> (123) 456-7890
                </div>
                <div class="contact-details">
                    <i class="fas fa-envelope"></i> info@example.com
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="contact-form">
                <h3>Send Us a Message</h3>
                <form>
                    <div class="form-group">
                        <label for="name">Your Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message:</label>
                        <textarea class="form-control" id="message" rows="5" placeholder="Enter your message"></textarea>
                    </div>
                    <button type="submit" class="btn contact-button">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
