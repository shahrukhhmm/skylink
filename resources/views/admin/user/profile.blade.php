@include('admin.component.header')
@include('admin.component.topnav')
@include('admin.component.navbar')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ __('SE.dashboard') }}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ __('SE.update_profile') }}</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-uppercase">{{ __('SE.update_profile') }}</h3>
                        <div class="form-validation">
                            <form class="form-valide" action="{{url('/update-user')}}" method="get">

                                <input type="hidden" value="{{$user->id}}" name="userId">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">{{ __('SE.username') }}<span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="name"
                                        value="{{$user->name}}"
                                        placeholder="Enter a username..">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">{{ __('SE.email') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-email" name="email"
                                        placeholder="Your valid email.."
                                        value="{{$user->email}}"
                                        >

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-password">{{ __('SE.password') }} <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Choose a safe one..">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">{{ __('SE.submit') }}</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@include('admin.component.footer')
