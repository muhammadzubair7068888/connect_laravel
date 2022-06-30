@extends('supperadmin.layouts.master')

@section('title')
    @lang('Exercises')
@endsection

@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            @lang('Exercises')
        @endslot
        @slot('title')
            @lang('Exercises')
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <form action="{{ route('save.edit_exercise', ['id' => $exercises->id]) }}" method="post"
                class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label">@lang('Name')</label>
                            <input type="text" name="name" value="{{ $exercises->name }}" class="form-control"
                                id="validationTooltip01" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="recipient-name" class="form-label">@lang('Type')</label>
                            <select name="ex_type" id="type" class="form-control" required>
                                @if ($exercises->copy_id)
                                    <option value="">@lang('Selec Type')</option>
                                    @forelse ($exercises_types as $type)
                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                    @empty
                                    @endforelse
                                @else
                                    @forelse ($exercises_types as $type)
                                        @if ($type->id == $exercises->exercise_id)
                                            <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                                        @else
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endif
                                    @empty
                                    @endforelse
                                @endif
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">@lang('Description')</label>
                    <textarea class="form-control" name="description" value="{{ $exercises->description }}" id="message-text" required>{{ $exercises->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="validationTooltip01" class="form-label">@lang('Details:')</label>
                    <button id="addRow" type="button" class="btn btn-info">+</button>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label">@lang('Title')</label>
                            <input type="text" name="title[]" value="{{ $exercises->excercise_detail[0]->title }}"
                                class="form-control" id="" placeholder="Title" required>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label">@lang('Link')</label>
                            <input type="text" name="link[]" value="{{ $exercises->excercise_detail[0]->link }}"
                                class="form-control" id="validationTooltip01" placeholder="Link" required>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label">@lang('Sets')</label>
                            <input type="text" name="sets[]" value="{{ $exercises->excercise_detail[0]->sets }}"
                                class="form-control" id="validationTooltip01" placeholder="Sets" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3 position-relative">
                            <label for="validationTooltip01" class="form-label">@lang('Reps')</label>
                            <input type="text" name="reps[]" value="{{ $exercises->excercise_detail[0]->reps }}"
                                class="form-control" id="validationTooltip01" placeholder="Reps" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">@lang('Notes')</label>
                        <textarea class="form-control" name="notes[]" value="{{ $exercises->excercise_detail[0]->notes }}" id="message-text"
                            required>{{ $exercises->excercise_detail[0]->notes }}</textarea>
                    </div>
                    @php
                        $j = -1;
                    @endphp
                    @forelse ($exercises->excercise_detail as $detail)
                        @php
                            $j++;
                        @endphp
                        @if ($j > 0)
                            <div id="inputFormRow">


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">@lang('Title')</label>
                                            <input type="text" name="title[]" value="{{ $detail->title }}"
                                                class="form-control" id="" placeholder="Title" required>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">@lang('Link')</label>
                                            <input type="text" name="link[]" value="{{ $detail->link }}"
                                                class="form-control" id="validationTooltip01" placeholder="Link"
                                                required>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">@lang('Sets')</label>
                                            <input type="text" name="sets[]" value="{{ $detail->sets }}"
                                                class="form-control" id="validationTooltip01" placeholder="Sets"
                                                required>
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3 position-relative">
                                            <label for="validationTooltip01" class="form-label">@lang('Reps')</label>
                                            <input type="text" name="reps[]" value="{{ $detail->reps }}"
                                                class="form-control" id="validationTooltip01" placeholder="Reps"
                                                required>
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">@lang('Notes')</label>
                                        <textarea class="form-control" name="notes[]" value="{{ $detail->notes }}" id="message-text" required>{{ $detail->notes }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <button id="removeRow" type="button" class="btn btn-danger">-</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @empty
                    @endforelse
                    <div id="newRow"></div>
                    <div class="mb-3">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>

    <script>
        // add row
        $("#addRow").click(function() {

            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="row">';
            html += '<div class="col-md-6">';
            html += '<div class="mb-3 position-relative">';
            html += '<label for="validationTooltip01" class="form-label">Title</label>';
            html +=
                '<input type="text" name="title[]" class="form-control" id="validationTooltip01" placeholder="Title" required > ';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-md-6">';
            html += '<div class="mb-3 position-relative">';
            html += '<label for="validationTooltip01" class="form-label">Link</label>';
            html +=
                '<input type="text" name="link[]" class="form-control" id="validationTooltip01" placeholder="Link" required > ';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '<div class="row">';
            html += '<div class="col-md-6">';
            html += '<div class="mb-3 position-relative">';
            html += '<label for="validationTooltip01" class="form-label">Sets</label>';
            html +=
                '<input type="text" name="sets[]" class="form-control" id="validationTooltip01" placeholder="Sets" required > ';
            html += '</div>';
            html += '</div>';
            html += '<div class="col-md-6">';
            html += '<div class="mb-3 position-relative">';
            html += '<label for="validationTooltip01" class="form-label">Reps</label>';
            html +=
                '<input type="text" name="reps[]" class="form-control" id="validationTooltip01" placeholder="Reps" required > ';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            html += '<div class="mb-3">';
            html += '<label for="message-text" class="col-form-label">@lang('Notes')</label>';
            html += '<textarea class="form-control" name="notes[]" id="message-text"></textarea>';
            html += '</div>';

            html += '<div class="mb-3">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">-</button>';
            html += '</div>';
            html += '</div>';
            $('#newRow').append(html);
        });
        $(document).on('click', '#removeRow', function() {

            $(this).closest('#inputFormRow').remove();
        });
    </script>
@endsection
