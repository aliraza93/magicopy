@extends('layouts/mainAdmin')
@section('content')
     <x-adstemplate :adsinfo="$adsinfo"  :adscounter="$adscounter" :user="$user" />

@endsection