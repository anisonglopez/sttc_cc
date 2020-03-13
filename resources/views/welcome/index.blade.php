@extends('layout.template')

{{-- For  Content . Blade --}}
@section('content')
    <h3>ยินดีต้อนรับเข้าสู่ระบบ</h3>
    <hr>
    @guest
        <label for="">ยังไม่ได้เข้าสู่ระบบ</label>
    @else
         {{ Auth::user()}}
    @endguest
  
@endsection
{{-- For Script Javascript --}}
@section('js')

@endsection

{{-- For  Modal --}}
@section('modal')

@endsection