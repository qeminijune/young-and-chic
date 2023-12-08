@extends("layouts.main")
@section("head")
<link rel="stylesheet" type="text/css" href="{{ asset("css/savejobs.css") }}">
@endsection
@section("content")
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
        <section>
            <div class="save">
                <p>Save a Jobs</p>
                <div class="model">
                    <a href="#"><img src="images/AllModel.jpg"></a>
                </div>
            </div>
        </section>

        <section>
            <div class="tailor">
                <a href="#"><img src="images/AllTailor.jpg"></a>
            </div>
        </section>

        <section>
            <div class="photographer">
                <a href="#"><img src="images/AllPhotographer.jpg"></a>
            </div>
        </section>

        <section>
            <div class="makeup">
                <a href="#"><img src="images/AllMakeupArtist.jpg"></a>
            </div>
        </section>

        <section>
            <div class="hair">
                <a href="#"><img src="images/AllHairstylist.jpg"></a>
            </div>
        </section>
@endsection
