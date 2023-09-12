<div id="email_smtp_configuration" class="hidechild">

    <div class="row mb-4">

        <div class="col-12">

            <div class="card border-0 box-shadow">

                <div class="card-header bg-transparent py-3 d-flex align-items-center text-dark">

                    <i class="fa-solid fa-envelope fs-5"></i>

                    <h5 class="px-2">{{ trans('labels.email_smtp_configuration') }}</h5>

                </div>

                <div class="card-body">

                    <form action="{{ URL::to('admin/settings/update_email_config') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="row">



                            <div class="form-group col-md-6">

                                <label class="form-label">{{ trans('labels.mail_driver') }}<span class="text-danger"> * </span></label>

                                <input type="password" class="form-control" name="mail_driver" value="{{ @$settingdata->mail_driver }}" placeholder="{{ trans('labels.mail_driver') }}" required>

                                @error('mail_driver')

                                <span class="text-danger">{{ $message }}</span>

                                @enderror

                            </div>



                            <div class="form-group col-md-6">

                                <label class="form-label">{{ trans('labels.mail_host') }}<span class="text-danger"> * </span></label>

                                <input type="password" class="form-control" name="mail_host" value="{{ @$settingdata->mail_host }}" placeholder="{{ trans('labels.mail_host') }}" required>

                                @error('mail_host')

                                <span class="text-danger">{{ $message }}</span>

                                @enderror

                            </div>	



                            

                            <div class="form-group col-md-6">

                                <label class="form-label">{{ trans('labels.mail_port') }}<span class="text-danger"> * </span></label>

                                <input type="password" class="form-control" name="mail_port" value="{{ @$settingdata->mail_port }}" placeholder="{{ trans('labels.mail_port') }}" required>

                                @error('mail_port')

                                <span class="text-danger">{{ $message }}</span>

                                @enderror

                            </div>

                            

                            <div class="form-group col-md-6">

                                <label class="form-label">{{ trans('labels.mail_username') }}<span class="text-danger"> * </span></label>

                                <input type="password" class="form-control" name="mail_username" value="{{ @$settingdata->mail_username }}" placeholder="{{ trans('labels.mail_username') }}" required>

                                @error('mail_username')

                                <span class="text-danger">{{ $message }}</span>

                                @enderror

                            </div>



                            <div class="form-group col-md-6">

                                <label class="form-label">{{ trans('labels.mail_password') }}<span class="text-danger"> * </span></label>

                                <input type="password" class="form-control" name="mail_password" value="{{ @$settingdata->mail_password }}" placeholder="{{ trans('labels.mail_password') }}" required>

                                @error('mail_password')

                                <span class="text-danger">{{ $message }}</span>

                                @enderror

                            </div>



                            <div class="form-group col-md-6">

                                <label class="form-label">{{ trans('labels.mail_encryption') }}<span class="text-danger"> * </span></label>

                                <input type="password" class="form-control" name="mail_encryption" value="{{ @$settingdata->mail_encryption }}" placeholder="{{ trans('labels.mail_encryption') }}" required>

                                @error('mail_encryption')

                                <span class="text-danger">{{ $message }}</span>

                                @enderror

                            </div>



                            <div class="form-group col-md-6">

                                <label class="form-label">{{ trans('labels.mail_fromaddress') }}<span class="text-danger"> * </span></label>

                                <input type="password" class="form-control" name="mail_fromaddress" value="{{ @$settingdata->mail_fromaddress }}" placeholder="{{ trans('labels.mail_fromaddress') }}" required>

                                @error('mail_fromaddress')

                                <span class="text-danger">{{ $message }}</span>

                                @enderror

                            </div>



                            <div class="form-group col-md-6">

                                <label class="form-label">{{ trans('labels.mail_fromname') }}<span class="text-danger"> * </span></label>

                                <input type="password" class="form-control" name="mail_fromname" value="{{ @$settingdata->mail_fromname }}" placeholder="{{ trans('labels.mail_fromname') }}" required>

                                @error('mail_fromname')

                                <span class="text-danger">{{ $message }}</span>

                                @enderror

                            </div>



                           



                        </div>



                        <div class="d-flex justify-content-between align-items-center">



                            <button class="btn btn-success btn-succes mt-3" @if (env('Environment') == 'sendbox') type="button" onclick="myFunction()" @else type="button" @endif

                            data-bs-toggle="modal" data-bs-target="#testmailmodal">{{ trans('labels.send_test_mail') }}</button>



                            <button class="btn btn-success btn-succes mt-3" @if (env('Environment')=='sendbox' ) type="button" onclick="myFunction()" @else type="submit" @endif>{{ trans('labels.save') }}</button>



                        </div>

                        

                        

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>







<!-- Modal -->

<div class="modal fade" id="testmailmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"

aria-labelledby="testmailmodalLabel" aria-hidden="true">

<div class="modal-dialog">

    <form action="{{ URL::to('/admin/testmail') }}" method="POST">

        @csrf

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="testmailmodalLabel">{{ trans('labels.send_test_mail') }}</h5>

                <button type="button" class="btn-close" data-bs-dismiss="modal"

                    aria-label="Close"></button>

            </div>

            <div class="modal-body">

                <label class="form-label">{{ trans('labels.email_address') }}<span class="text-danger"> *

                    </span></label>

                <input type="text" class="form-control" name="email_address"

                    value="{{ @$settingdata->email_address }}"

                    placeholder="{{ trans('labels.email_address') }}" required>

            </div>

            <div class="modal-footer">

                <button type="submit"

                    class="btn btn-success btn-succes mt-3">{{ trans('labels.send_test_mail') }}</button>

            </div>

        </div>

    </form>



</div>

</div>



