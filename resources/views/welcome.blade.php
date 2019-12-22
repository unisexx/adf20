@extends('layouts.app')

@section('content')

welcome

<div class="text-center">
          <a href="" class="btn btn-default btn-rounded mb-4 waves-effect waves-light" data-toggle="modal" data-target="#modalContactForm">Launch Modal Contact Form</a>
        </div>

<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <!--Modal: Contact form-->
  <div class="modal-dialog cascading-modal" role="document">

    <!--Content-->
    <div class="modal-content">

      <!--Header-->
      <div class="modal-header primary-color white-text">
        <h4 class="title">
          <i class="fa fa-pencil-alt"></i> Contact form</h4>
        <button type="button" class="close waves-effect waves-light" data-dismiss="modal"
          aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">

        <!--Body-->
      <div class="md-form">
        <input type="text" id="Form-email1" class="form-control">
        <label for="Form-email1">Your email</label>
      </div>

      <div class="md-form pb-3">
        <input type="password" id="Form-pass1" class="form-control">
        <label for="Form-pass1">Your password</label>
        <p class="font-small blue-text d-flex justify-content-end">Forgot <a href="#" class="blue-text ml-1">
            Password?</a></p>
      </div>

      <div class="text-center mb-3">
        <button type="button" class="btn blue-gradient btn-block btn-rounded z-depth-1a">Sign in</button>
      </div>
      <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2"> or Sign in with:
      </p>

      <div class="row my-3 d-flex justify-content-center">
        <!--Facebook-->
        <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i
            class="fab fa-facebook-f blue-text text-center"></i></button>
        <!--Twitter-->
        <button type="button" class="btn btn-white btn-rounded mr-md-3 z-depth-1a"><i
            class="fab fa-twitter blue-text"></i></button>
        <!--Google +-->
        <button type="button" class="btn btn-white btn-rounded z-depth-1a"><i
            class="fab fa-google-plus-g blue-text"></i></button>
      </div>

      </div>
    </div>
    <!--/.Content-->
  </div>
  <!--/Modal: Contact form-->
</div>

@endsection
