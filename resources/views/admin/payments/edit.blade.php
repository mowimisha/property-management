
@extends('layouts.admin')

@section('header')
    User
@endsection

@section('content')

    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <!-- BEGIN: Subheader -->

		<!-- END: Subheader -->


        <div class="m-content">
            @foreach($users as $user)
                <div class="row">
                    {{-- <div class="col-xl-3 col-lg-4">
                        <div class="m-portlet  ">
                            <div class="m-portlet__body">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <span class="m-portlet__head-icon m--hide">
                                                <i class="la la-gear"></i>
                                            </span>
                                            <span class="text-center">
                                                <br>
                                                <div class="col-md-12 "></div>
                                            </span>
                                        </div>
                                    </div>
					            </div>
                                <div class="m-card-profile">
                                    <div class="m-card-profile__title m--hide">
                                        Your Profile
                                    </div>
                                    <div class="m-card-profile__pic">
                                        <div class="m-card-profile__pic-wrapper">
                                            <img src="/uploads/users/documents/profile_picture/{{ $user->profile_picture }}" alt=""/ width="60" height="60">
                                        </div>
                                    </div>
                                    <div class="m-card-profile__details">
                                        <span class="m-card-profile__name">
                                            {{ $user->name }} {{ $user->middlename }} {{ $user->lastname }}
                                        </span>
                                        <a href="" class="m-card-profile__email m-link">
                                            {{ $user->email }}
                                        </a>
                                    </div>
                                </div>
                                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                                    <li class="m-nav__separator m-nav__separator--fit"></li>
                                    <li class="m-nav__section m--hide">
                                        <span class="m-nav__section-text">
                                            Section
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-xl-12 col-lg-12">
                        <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                            Edit Driver
                                        </h3>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="m_user_profile_tab_1">
                                    @if(Auth::user()->hasRole('admin'))
                                        <form class="m-form m-form--fit m-form--label-align-right" method="POST" action="/update-driver/{{ $user->id }}" autocomplete="off" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="m-portlet__body">
                                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                                <div class="alert m-alert m-alert--default" role="alert">
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <div class="col-10 ml-auto">
                                                    <h3 class="m-form__section">Driver Information</h3>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Firstname</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input" name="name"  type="text" value="{{ $user->name }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Middlename</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input"  name="middlename"  type="text" value="{{ $user->middlename }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Lastname</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input"  name="lastname"  type="text" value="{{ $user->lastname }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Passport photo</label>
                                                <div class="col-lg-7">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="profile_picture" value="{{ $user->driver_license }}">
                                                        <label class="custom-file-label" for="customFile">
                                                            {{ $user->profile_picture }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">National ID</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input"  name="national_id"  type="text" value="{{ $user->national_id }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Phone</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input"  name="phone"  type="text" value="{{ $user->phone }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                                                <div class="col-lg-7">
                                                    <input class="form-control m-input"  name="email"  type="email" value="{{ $user->email }}" required>
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} m-form__group row">
                                                    <label for="example-text-input" class="col-2 col-form-label">Password</label>

                                                    <div class="col-md-7">
                                                        <input id="password" type="password" value="{{ $user->password }}" class="form-control" name="password" required>

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('confirm_password') ? ' has-error' : '' }} m-form__group row">
                                                    <label for="password-confirm" class="col-2 col-form-label">Confirm Password</label>
                                                    <div class="col-md-7">
                                                        <input id="password-confirm" type="password" value="{{ $user->password }}" class="form-control" name="confirm_password" required>

                                                        @if ($errors->has('confirm_password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('confirm_password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Status:</label>
                                                <div class="col-lg-7">
                                                    <select class="form-control m-input" name="status" value="{{ old('status') }}" required>
                                                        <option hidden>
                                                        Select Status
                                                        </option>
                                                        <option value="{{ $user->status }}" selected>
                                                            @if($user->status == '1' )
                                                                Active
                                                            @elseif ($user->status == '0')
                                                                In-Active
                                                            @else

                                                            @endif
                                                        </option>
                                                        <option value="1">
                                                            Active
                                                        </option>
                                                        <option value="0">
                                                            In-Active
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Drivers License</label>
                                                <div class="col-lg-7">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="driver_license" value="{{ $user->driver_license }}">
                                                        <label class="custom-file-label" for="customFile">
                                                            {{ $user->driver_license }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Good Conduct Cert</label>
                                                <div class="col-lg-7">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="good_conduct" value="{{ $user->good_conduct }}">
                                                        <label class="custom-file-label" for="customFile">
                                                            {{ $user->good_conduct }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">PSV</label>
                                                <div class="col-lg-7">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="customFile" name="psv" value="{{ $user->psv }}">
                                                        <label class="custom-file-label" for="customFile">
                                                            {{ $user->psv }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="m-portlet__foot m-portlet__foot--fit">
                                            <div class="m-form__actions">
                                                <div class="row">
                                                    <div class="col-2"></div>
                                                    <div class="col-lg-7">
                                                        <button type="submit" class="btn btn-primary m-btn m-btn--air m-btn--custom">
                                                            Save Changes
                                                        </button>
                                                        &nbsp;&nbsp;
                                                        <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @else

                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

            <!--End::Section-->
                    </div>
                </div>
            </div>
            <!-- end:: Body -->

@endsection

































