@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile.css') }}">
@endsection
@section('content')
    <section>
        <div class="box-image-profile">
            <div class="box-image-area">
                {{-- {{ dd($users->toArray()) }} --}}
                @forelse ($users as $user)
                    <div class="image-area">
                        <div class="img-wrapper">
                            <img src="{{ $user->image ? $user->image : "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->email ) ) ) . "?d=" . urlencode( "https://i.pravatar.cc/" . rand( 1, 1000 )) . "&s=" . 1028;}}" alt="Atul Prajapati">
                            <h2><a href="{{ route('upload', $user->id) }}" style="color: white;text-decoration: none">{{ $user->name }}</a> ({{ $user->type_user }})</h2>
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
