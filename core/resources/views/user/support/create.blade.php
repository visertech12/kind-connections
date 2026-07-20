@extends('user.layouts.app')
@section('panel')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="custom--card card">
            <div class="card-header d-flex flex-wrap align-items-center justify-content-between">
                <h2 class="card-header__title">{{ __($pageTitle) }}</h2>
                <div class="d-flex gap-2">
                    <a href="{{ route('user.ticket.new') }}" class="btn btn-sm btn--warning">
                        <i class="fa fa-exchange-alt"></i> @lang('Change Department')
                    </a>
                    <a href="{{ route('user.ticket.index') }}" class="btn btn-sm btn--danger">
                        <i class="fa fa-reply"></i> @lang('My Tickets')
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('user.ticket.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($department)
                        <input type="hidden" name="department" value="{{ $department }}">
                        <div class="alert alert--info mb-3"><strong>@lang('Department'):</strong> {{ $selectedDepartment['title'] ?? $department }}</div>
                    @endisset

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="subject" class="form--label">@lang('Subject')</label>
                                <input type="text" name="subject" id="subject" class="form--control" placeholder="@lang('In a few words, tell us what your enquiry is about')" value="{{ old('subject') }}" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="priority" class="form--label"> @lang('Priority')</label>
                                <select id="priority" name="priority" class="from-select form--control">
                                    <option value="Low">@lang('Low')</option>
                                    <option value="Medium">@lang('Medium')</option>
                                    <option value="High">@lang('High')</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-12 mt-3">
                            <div class="form-group">
                                <label for="message" class="form--label"> @lang('Message')</label>
                                <textarea id="message" name="message" class="form--control" rows="6" placeholder="@lang('Provide a detailed description')" required>{{ old('message') }}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-5">
                        <div class="col-md-12 mt-3 d-flex justify-content-between flex-wrap mb-3 gap-2">
                            <div>
                                <h6 class="m-0">@lang('Attachments') <span class="text-muted">(@lang('optional'))</span></h6>
                                <small class="text--warning"> @lang('Allowed File Extensions'): .@lang('jpg'), .@lang('jpeg'), .@lang('png'), .@lang('pdf'), .@lang('doc'), .@lang('docx')  </small>
                            </div>
                            <div class="card-header__buttons">
                                <a href="javascript:void(0)" class="btn btn--base outline addFile"> <i class="fas fa-plus me-2"></i> @lang('Add Attachment') </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group file-upload">
                                <input type="file" name="attachments[]" id="inputAttachments" class="form-control form--control mb-2" />
                                <div id="fileUploadsContainer"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn--base w-100">@lang('Submit')</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        (function ($) {
            "use strict";
            var fileAdded = 0;
            $('.addFile').on('click',function(){
                if (fileAdded >= 4) {
                    notify('error','You\'ve added maximum number of file');
                    return false;
                }
                fileAdded++;
                $("#fileUploadsContainer").append(`
                    <div class="input-group my-3">
                        <input type="file" name="attachments[]" class="form-control form--control" required />
                        <button class="input-group-text btn-danger remove-btn"><i class="las la-times"></i></button>
                    </div>
                `)
            });
            $(document).on('click','.remove-btn',function(){
                fileAdded--;
                $(this).closest('.input-group').remove();
            });
        })(jQuery);
    </script>
@endpush
