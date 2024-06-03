@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endsection
@section('content')
    <section>
        <div class="container">
            <div class="d-flex justify-content-end mt-4">
                <form action="{{ route('profile') }}" method="get">
                    <select onchange="this.form.submit()" name="type_user" class="form-select form-select-lg">
                        <option value="" {{ Request::get('type_user') == '' ? 'selected' : '' }}>All</option>
                        <option value="designer" {{ Request::get('type_user') == 'designer' ? 'selected' : '' }}>
                            Designer
                        </option>
                        <option value="participant" {{ Request::get('type_user') == 'participant' ? 'selected' : '' }}>
                            Participant
                        </option>
                    </select>
                </form>

            </div>

        </div>
        <div class="box-image-profile">
            <div class="box-image-area">
                {{-- {{ dd($users->toArray()) }} --}}
                @forelse ($users as $user)
                    <div class="image-area">
                        <div class="img-wrapper">
                            {{-- <img src="{{ $user->image ? $user->image : "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->email ) ) ) . "?d=" . urlencode( "https://i.pravatar.cc/" . rand( 1, 1000 )) . "&s=" . 1028;}}" alt="Atul Prajapati"> --}}
                            <img src="{{ $user->image ? $user->image : $user->profile_photo_url }}" alt="Atul Prajapati">
                            <p class="text"><a href="{{ route('upload', $user->id) }}"
                                    style="color: white;text-decoration: none">{{ $user->name }}
                                    ({{ $user->type_user }})</a>

                            </p>
                            <ul>
                                <li><a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/atulkprajapati2000/"><i
                                            class="fab fa-instagram"></i></a>
                                </li>
                                <li><a href="https://twitter.com/atuljustano"><i class="fab fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </section>
@endsection
