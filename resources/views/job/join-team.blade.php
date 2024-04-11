@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/join-team.css') }}">
@endsection
@section('content')
    <section>
        <div class="topic-pfupload">
            <div class="back">
                <a href="{{ route('upload', Auth::user()->id) }}"><i class="fas fa-arrow-left"></i><button>GO
                        BACK</button></a>
            </div>
        </div>
    </section>
    <section>
        <div class="box-content">
            <div class="jointeam-box">
                {{-- {{dd($job->toArray())}} --}}
                <div class="box-image">
                    <img src="/images/{{ $job->image }}" alt="">
                </div>
                <div class="box-pf">
                    <div class="pf-name">
                        <div class="pf">
                            <img src="{{ $job->user->image ? $job->user->image : $job->user->profile_photo_url }}" alt="">
                        </div>
                        <p>{{ $job->user->name }}</p>
                        <h5>(Young Designer)</h5>
                    </div>
                    <div class="role-parti">
                        <h1>Looking for Role</h1>
                        <h2>{{ $job->participants }}</h2>
                    </div>
                </div>
                <hr>
                <h3>Looking for ...</h3>
                <h4>{{ $job->full_description }}</h4>
            </div>
        </div>
    </section>
    {{-- {{dd($job->userApply->toArray())}} --}}

    @php
        // dd($job->userApply->toArray());
        $applycount = 0;
        $approvecount = 0;
        if (!empty($job->userApply)) {
            foreach ($job->userApply as $key => $value) {
                if ($value->status == 'wait') {
                    $applycount += 1;
                }
                if ($value->status == 'approve') {
                    $approvecount += 1;
                }
            }
        }
    @endphp

    @if ($job->user->id == Auth::user()->id)
        <section>
            <div class="new-apply">
                {{-- @if ($job->user_apply->isEmpty()) --}}
                <p>New Apply ({{ $applycount }})</p>
                @forelse ($job->userApply as $userApply)
                    <div class="box-nap">
                        <div class="nap1">
                            <form action="{{ route('apply', $userApply) }}" method="POST">
                                @csrf
                                @if ($userApply->status == 'wait')
                                    <div class="ap1">
                                        <img src="{{ $userApply->user->image ? $userApply->user->image : $userApply->user->profile_photo_url }}">
                                        <a href="{{ route('upload', $userApply->user->id) }}">
                                            <h1>{{ $userApply->user->name }}</h1>
                                        </a>
                                        <input type="hidden" name="user_id" value="{{ $userApply->user->id }}">
                                        <button type="submit">Approve</button>
                                    </div>
                                    {{-- <div class="denybtn">
                                    <button>Deny</button>
                                </div> --}}
                                @endif
                            </form>
                        </div>
                    </div>
                @empty
                @endforelse
                <hr>
                {{-- @endif --}}
            </div>
        </section>
    @else
    @empty($apply)
        <div class="startbtn">
            <a href="{{ route('apply', $job->id) }}">
                <button>Apply</button></a>
        </div>
    @endempty
    @if (!empty($apply))
        @if ($apply->status == 'wait')
            <div class="wait">
                รอการอนุมัติ กรุณากลับมาตรวจสอบอีกครั้งที่กระดิ่งแจ้งเตือน
            </div>
        @endif
    @endif
@endif

<section>
    <div class="pf1">
        <div class="accepted">
            {{-- <p>Accepted ({{ $approvecount }})</p> --}}
            <p>Approved</p>
            <div class="approved">
                @forelse ($job->userApply as $userApply)
                    @if ($userApply->status == 'approve')
                        <div class="approved-item">
                            <div class="box-approved">
                                <img src="{{ $userApply->user->image ? $userApply->user->image : $userApply->user->profile_photo_url }}">
                                <a href="{{ route('upload', $userApply->user->id) }}">
                                    <h1>{{ $userApply->user->name }}</h1>
                                </a>
                            </div>
                        </div>
                    @endif
                @empty
                @endforelse
            </div>
        </div>
    </div>
    @if ($job->user->id == Auth::user()->id && $job->status == 'start')
        <form action="{{ route('jointeam.close', $job->id) }}" method="POST">
            @csrf
            <div class="startbtn">
                <button>Closed for the team</button>
            </div>
        </form>
    @endif
</section>
@endsection
