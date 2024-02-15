@extends("layouts.main")
@section("head")
<link rel="stylesheet" type="text/css" href="{{ asset("css/mn-profile.css") }}">
@endsection
@section("content")
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
        <section>
            <div class="topic-pfupload">
                <div class="back">
                    <a href="/"><i class="fas fa-arrow-left"></i><button>GO BACK</button></a>
                </div>
            </div>
        </section>

        <section>
            <div class="manage">
                <img src="/images/banner-manage.jpg">
                <div class="pf13">
                    <img src="/images/pf13.png">
                </div>

                {{-- <form action="upload.php" method="post" enctype="multipart/form-data">
                    <label for="fileToUpload">
                  <div class="profile-pic" style="background-image: url('https://randomuser.me/api/portraits/med/men/65.jpg')">
                      <span class="fas fa-camera"></span>
                      <span>Change Image</span>
                  </div>
                  </label>
                  <input type="File" name="fileToUpload" id="fileToUpload">
                </form> --}}
                <form action="/upload.html">
                    <label for="fname" id="tname">Name</label><br>
                    <input type="text" id="name" name="fname" placeholder="Enter your name..."><br>
                    <label for="lname" id="taddress">Address</label><br>
                    <input type="text" id="address" name="lname" placeholder="Enter your address..."><br>
                    <label for="lname" id="temail">Email</label><br>
                    <input type="text" id="email" name="lname" placeholder="Enter email address..."><br>
                    <label for="lname" id="ttel">Tel.</label><br>
                    <input type="text" id="tel" name="lname" placeholder="Enter your number..."><br>
                    <label for="birthday" id="tbirthday">Birthday</label>
                    <input type="date" id="birthday" name="birthday"><br>
                    <input type="submit" id="submit" value="Save">
                </form>
            </div>
        </section>

@endsection
