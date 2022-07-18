@extends('supperadmin.layouts.master')

@section('title')
    @lang('Update User')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Update User')
        @endslot
        @slot('title')
            @lang('Update User')
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <x-greetings />
            <form action="{{ route('update.user.save', ['id' => $user->id]) }}" method="post" class="needs-validation"
                enctype='multipart/form-data' novalidate>
                @csrf
                <div class="mb-3">
                    <div class="text-start mt-2">
                        <img src="{{ asset($user->avatar) }}" alt="" class="rounded-circle avatar-lg">
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">@lang('Picture')</label>
                            <input type="file" name="photo" class="form-control">
                            <div class="valid-feedback">
                                @lang('Looks good!')
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom02" class="form-label">@lang('Name')</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                id="validationCustom02" placeholder="Email" value="" required>
                            <div class="valid-feedback">
                                @lang('Looks good!')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">@lang('Email')</label>
                            <input type="text" name="email" value="{{ $user->email }}" class="form-control"
                                id="" placeholder="Email" required>
                            <div class="valid-feedback">
                                @lang('Looks good!')
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom02" class="form-label">@lang('height')</label>
                            <input type="text" name="height" value="{{ $user->height }}" class="form-control"
                                id="validationCustom02" placeholder="Height" required>
                            <div class="valid-feedback">
                                @lang('Looks good!')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">@lang('Handedness')</label>
                            <select name="hand_type" id="hand_type" class="form-select" required>
                                @if ($user->handedness == 'left')
                                    <option value="Left" selected>@lang('Left')</option>
                                    <option value="Right">@lang('Right')</option>
                                @else
                                    <option value="Left">@lang('Left')</option>
                                    <option value="Right" selected>@lang('Right')</option>
                                @endif
                            </select>
                            <div class="valid-feedback">
                                @lang('Looks good!')
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom02" class="form-label">@lang('Starting Weight')</label>
                            <input type="text" name="starting_weight" value="{{ $user->starting_weight }}"
                                class="form-control" id="validationCustom02" placeholder="Starting Weight" value=""
                                required>
                            <div class="valid-feedback">
                                @lang('Looks good!')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">@lang('Level')</label>
                            <input type="text" name="level" value="{{ $user->level }}" class="form-control"
                                id="" placeholder="Email" required>
                            <div class="valid-feedback">
                                @lang('Looks good!')
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom02" class="form-label">@lang('School')</label>
                            <input type="text" name="school" value="{{ $user->school }}" class="form-control"
                                id="validationCustom02" placeholder="School" required>
                            <div class="valid-feedback">
                                @lang('Looks good!')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label">@lang('Age')</label>
                            <input type="text" name="age" value="{{ $user->age }}" class="form-control"
                                id="" placeholder="Email" required>
                            <div class="valid-feedback">
                                @lang('Looks good!')
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="validationCustom02" class="form-label">@lang('Status')</label>
                            <select name="user_status" id="user_status" class="form-select" required>
                                @if ($user->handedness == 'left')
                                    <option value="0" selected>@lang('Banned')</option>
                                    <option value="1">@lang('Active')</option>
                                @else
                                    <option value="1">@lang('Active')</option>
                                    <option value="0" selected>@lang('Banned')</option>
                                @endif
                            </select>
                            <div class="valid-feedback">
                                @lang('Looks good!')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label">@lang('Password')</label>
                            <input type="Password" name="password" class="form-control" id="validationTooltip01"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label">@lang('Confirm Password')</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                id="validationTooltip01" placeholder="Password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if (auth()->user()->role == 'superadmin')
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label for="formrow-inputState" class="form-label">@lang('Role')</label>
                                <select id="formrow-inputState" name="role" class="form-select">
                                    @if ($user->role == 'admin')
                                        <option value="admin" selected>@lang('Admin')</option>
                                        <option value="user">@lang('User')</option>
                                    @else
                                        <option value="admin">@lang('Admin')</option>
                                        <option value="user"selected>@lang('User')</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    @else
                        <div class="col-md-6">
                            <div class="mb-3 position-relative">
                                <label for="formrow-inputState" class="form-label">@lang('Role')</label>
                                <select id="formrow-inputState" name="role" value="{{ old('role') }}"
                                    class="form-select">
                                    <option value="user" selected>@lang('User')</option>
                                </select>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </form>
        </div>




    </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
@endsection
