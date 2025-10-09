@extends('frontend.Default.layouts.app')

@section('page-title', trans('app.reset_your_password'))

@section('content')

  @include('backend.partials.messages')

  <!-- LOGIN BEGIN -->
  <div class="login" style="background-image: url('/frontend/Default/img/_src/redirected-bg.png')">
    <div class="login__block">
      <div class="login__left">

        <form class="login-form" action="