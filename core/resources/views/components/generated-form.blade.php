@props(['form' => null])

<div class="form-field__wrapper">
    <div class="addedField simple_with_drop">
        @if ($form != null)
            @foreach ($form->form_data as $formData)
                <div class="form-field-wrapper" id="{{ $loop->index }}">
                    <input type="hidden" name="form_generator[is_required][]" value="{{ $formData->is_required }}">
                    <input type="hidden" name="form_generator[extensions][]" value="{{ $formData->extensions }}">
                    <input type="hidden" name="form_generator[options][]" value="{{ implode(',', $formData->options) }}">
                    <input type="hidden" name="form_generator[is_multiple][]" value="{{ @$formData->is_multiple ?? 0 }}">
                    <input type="hidden" name="form_generator[form_width][]" value="{{ @$formData->width }}">
                    <input type="hidden" name="form_generator[form_label][]" class="form-control" value="{{ $formData->name }}">
                    <input type="hidden" name="form_generator[instruction][]" class="form-control" value="{{ @$formData->instruction }}">
                    <input type="hidden" name="form_generator[form_type][]" class="form-control" value="{{ $formData->type }}">
                    @php
                        $jsonData = json_encode([
                            'type' => $formData->type,
                            'is_required' => $formData->is_required,
                            'instruction' => @$formData->instruction,
                            'label' => $formData->name,
                            'extensions' => explode(',', $formData->extensions) ?? 'null',
                            'options' => $formData->options,
                            'width' => @$formData->width,
                            'is_multiple' => @$formData->is_multiple ?? false,
                            'old_id' => '',
                        ]);
                    @endphp

                    <div class="form-field">
                        <div class="form-field__item d-flex align-items-center gap-2">
                            <div class="me-1">
                                <i class="las la-braille"></i>
                            </div>
                            <div>
                                <p class="title">@lang('Name')</p>
                                <p class="value">{{ __(@$formData->name) }}</p>
                            </div>
                        </div>
                        <div class="form-field__item">
                            <p class="title">@lang('Type')</p>
                            <p class="value">{{ __(ucfirst($formData->type)) }}</p>
                        </div>
                        <div class="form-field__item">
                            <p class="title">@lang('Width')</p>
                            <p class="value">
                                @if (@$formData->width == '12')
                                    @lang('100%')
                                @elseif(@$formData->width == '6')
                                    @lang('50%')
                                @elseif(@$formData->width == '4')
                                    @lang('33%')
                                @elseif(@$formData->width == '3')
                                    @lang('25%')
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                        <div class="form-field__item">
                            <p class="value">
                                @if ($formData->is_required == 'required')
                                    <span class="badge badge--success">@lang('Required')</span>
                                @else
                                    <span class="badge badge--dark">@lang('Optional')</span>
                                @endif
                            </p>
                        </div>
                        <div class="form-field__item">
                            <button type="button" class="btn btn--primary btn-sm editFormData" data-form_item="{{ $jsonData }}" data-update_id="{{ $loop->index }}"><i class="las la-pen me-0"></i></button>
                            <button type="button" class="btn btn--danger btn-sm removeFormData"><i class="las la-times me-0"></i></button>
                        </div>
                    </div>

                </div>
            @endforeach
        @endif
    </div>
</div>

<!-- Form Generator Modal -->
<div class="modal fade" id="formGenerateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Generate Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="las la-times"></i>
                </button>
            </div>
            <form class="generate-form">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="update_id" value="">
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label class="form-label">Form Type</label>
                        <select name="form_type" class="form-control" required>
                            <option value="text">Text</option>
                            <option value="textarea">Textarea</option>
                            <option value="select">Select</option>
                            <option value="checkbox">Checkbox</option>
                            <option value="radio">Radio</option>
                            <option value="file">File</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label class="form-label">Is Required</label>
                        <select name="is_required" class="form-control" required>
                            <option value="required">Required</option>
                            <option value="optional">Optional</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label class="form-label">Form Label</label>
                        <input type="text" name="form_label" class="form-control" required>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label class="form-label">Form Width</label>
                        <select name="form_width" class="form-control" required>
                            <option value="12">100%</option>
                            <option value="6">50%</option>
                            <option value="4">33%</option>
                            <option value="3">25%</option>
                        </select>
                    </div>
                    <div class="form-group" style="margin-bottom: 15px;">
                        <label class="form-label">Instruction</label>
                        <input type="text" name="instruction" class="form-control">
                    </div>
                    <div class="extra_area">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary w-100 generatorSubmit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('style')
    <style>
        .form-field {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #cdcdcd;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            cursor: grab;
            background: #fff;
        }

        .form-field .title {
            font-size: 15px;
            font-weight: 600;
        }

        .form-field .form-field__item {
            min-width: 170px;
            text-align: left;
        }

        .addedField.simple_with_drop.ui-sortable {
            min-width: 900px;
        }

        .form-field .form-field__item:last-child {
            text-align: right;
        }

        .submitRequired{
            cursor: unset;
        }
        .form-field__wrapper{
            overflow-x: auto;
            margin-bottom: 10px;
        }

    </style>
@endpush
@push('script-lib')
    <script src="{{ asset('assets/admin/js/jquery-ui.min.js') }}"></script>
@endpush
@push('script')
    <script>
        "use strict"
        var formGenerator = new FormGenerator();
        @if ($form)
            formGenerator.totalField = {{ $form ? count((array) $form->form_data) : 0 }}
        @endif
        $(".simple_with_drop").sortable({
            stop: function(event, ui) {
                var start = ui.item.data('start');
                var end = ui.item.index();
                if (start !== end) {
                    $('.submitRequired').removeClass('d-none');
                }
            },
            start: function(event, ui) {
                ui.item.data('start', ui.item.index());
            }
        });
    </script>

    <script src="{{ asset('assets/global/js/form_actions.js') }}"></script>
@endpush
