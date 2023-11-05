@extends('ProfessorHome.layouts.main')

@section('main-section')
@if (session('message'))
<script>
  window.onload = function() {
    window.alert('new course added');
};
    </script>
@endif


@endsection

