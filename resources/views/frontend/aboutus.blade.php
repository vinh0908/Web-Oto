@extends('frontend.layout')

@section('aboutus')
<!-- Intro Header -->
<div class="intro-header">
    <div style="display: block" class="container">
        <h1>Chào mừng bạn đến với TiNy</h1>
        <p>Nơi mùi hương gặp gỡ phong cách</p>
    </div>
</div>

<!-- About Section -->
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <h2>Về Chúng Tôi</h2>
            <p>TiNy là địa điểm lý tưởng để bạn khám phá và tìm kiếm những mùi hương độc đáo và phù hợp nhất với phong cách của mình. Chúng tôi tự hào mang đến các sản phẩm nước hoa cao cấp từ các thương hiệu nổi tiếng trên thế giới.</p>
            <p>Với đội ngũ nhân viên chuyên nghiệp và nhiệt tình, chúng tôi cam kết mang đến cho bạn trải nghiệm mua sắm tuyệt vời và dịch vụ hậu mãi chu đáo.</p>
        </div>
        <div class="col-md-6">
            <img src="{{ asset('frontend-oto/images/background.jpeg') }}" alt="About Image" class="img-fluid">
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Tại sao chọn chúng tôi?</h2>
    <div class="row">
        <div class="col-md-4 feature-box">
            <h3>Sản phẩm chất lượng</h3>
            <p>Chúng tôi cam kết chỉ cung cấp những sản phẩm chính hãng, đảm bảo chất lượng và an toàn cho người sử dụng.</p>
        </div>
        <div class="col-md-4 feature-box">
            <h3>Đa dạng lựa chọn</h3>
            <p>Từ những mùi hương nhẹ nhàng, tinh tế cho đến những nốt hương mạnh mẽ, quyến rũ, chúng tôi có đủ mọi phong cách để đáp ứng nhu cầu đa dạng của bạn.</p>
        </div>
        <div class="col-md-4 feature-box">
            <h3>Dịch vụ tận tâm</h3>
            <p>Đội ngũ nhân viên chuyên nghiệp và nhiệt tình của chúng tôi luôn sẵn sàng tư vấn, giúp bạn tìm ra mùi hương phù hợp nhất với cá tính và sở thích của mình.</p>
        </div>
    </div>
</div>

<!-- Testimonial Section -->
<div class="testimonial-section">
    <div class="container">
        <h2 class="text-center mb-4">Đánh giá từ khách hàng</h2>
        <div class="row">
            <div class="col-md-4 testimonial-box">
                <img src="https://via.placeholder.com/80x80" alt="Customer 1">
                <p>"Sản phẩm chất lượng tuyệt vời, mùi hương rất thơm và lâu phai. Tôi rất hài lòng với dịch vụ của cửa hàng."</p>
                <h4>Nguyễn Văn A</h4>
            </div>
            <div class="col-md-4 testimonial-box">
                <img src="https://via.placeholder.com/80x80" alt="Customer 2">
                <p>"Đội ngũ nhân viên rất nhiệt tình và chuyên nghiệp. Tôi đã tìm được mùi hương ưng ý thanks to their advice."</p>
                <h4>Trần Thị B</h4>
            </div>
            <div class="col-md-4 testimonial-box">
                <img src="https://via.placeholder.com/80x80" alt="Customer 3">
                <p>"Cửa hàng có nhiều lựa chọn nước hoa, giá cả hợp lý. Tôi sẽ tiếp tục ủng hộ."</p>
                <h4>Lê Văn C</h4>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action -->
<div class="call-to-action">
    <div style="display: block" class="container">
        <h3>Khám phá ngay bộ sưu tập nước hoa đa dạng và độc đáo của chúng tôi</h3>
    </div>
    <a href="{{ route('tongsanpham') }}" class="btn btn-primary btn-lg">Mua sắm ngay</a>
</div>

@endsection
