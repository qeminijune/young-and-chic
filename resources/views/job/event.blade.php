@extends("layouts.main")
@section("head")
<link rel="stylesheet" type="text/css" href="{{asset("css/event.css")}}">
@endsection
@section("content")
<section>
    <div class="topic-event1">
        <div class="event">
            <a href="/"><i class="fas fa-arrow-left"></i><button>GO BACK</button></a>
        </div>
        <h1>EVENT</h1>
        <img src="/images/event-home.jpg">
        <h2>YOUNG & CHIC</h2>
        <h3>A DAY OF FASHION</h3>
    </div>
</section>

<section>
    <div class="detail-event">
        <img src="/images/logo-black 1.png">
        <h3>FASHION EVENT
            <br>OCTOBER 22-22 NOVEMBER 2024.</h3>
        <p>ร่วมสนุกกับ Event ออกแบบเครื่องแต่งกายภายใต้หัวข้อ “Working Woman”
            <br>เพื่อชิงรางวัลมูลค่า 300,000 บาท และโอกาสต่อยอดผลงานในเชิงพาณิชย์</p>
        <h1>รายละเอียดร่วมสนุก</h1>
        <h2>Young Designer ที่สนใจเข้าร่วมให้โพสต์ผลลงาน<br>ลงโปรไฟล์ของท่านพร้อมติดแฮชแท็ก</h2>
        <div class="hasht">
            <a href="{{ route('hashtag') }}"><button>#YandCEvent2023</button></a>
        </div>
        <h5>ผู้ชนะอาจเป็นคุณ! อย่ารอช้า!</h5>
        <!-- <div class="postit">
            <img src="images/event-postit.png">
        </div> -->

        <h6>Click HashTag<br>เพื่อดู Post เพิ่มเติม</h6>
    </div>
</section>
@endsection
