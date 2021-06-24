@extends('admin.layouts.master')

@section('title')
    <title>Company Detail</title>
@endsection   
@section('style')
<style>
    #company_logo {
    width: 150px;
    height: 150px;
    background-size: cover;
}
#profile_img {
    width: 150px;
    height: 150px;
    background-size: cover;
}
p {
    font-weight: 600;
    color: #34395e;
    font-size: 12px;
    letter-spacing: 0.5px;
}
</style>
@endsection 
@section('content')
      
      <!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="card-body">
                           
                                <div class="row">
                                    @if($company_detail->company_logo != '')
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <p>Company Brand</p>
                                        <img id="company_logo" src="{{ asset('images/').'/'.$company_detail->company_logo }}" alt="Company Logo">
                                    </div>
                                    @endif
                                    @if($company_detail->profile_img != '')
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <p>Profile Image</p>
                                        <img id="profile_img" src="{{ asset('images/').'/'.$company_detail->profile_img }}" alt="Profile Image">
                                    </div>
                                    @endif
                                </div> 
                                <div class="row mt-5">
                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="insurance_zone">Insurance Zone</label>
                                            <input required type="text" readonly value="{{ $company_detail->insurance_zone }}" name="insurance_zone" class="form-control" placeholder="Insurane Zone">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input required type="text" readonly value="{{ $company_detail->country }}" name="country" class="form-control" placeholder="Country">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label >Agreement number</label>
                                            <input required type="text" readonly value="{{ $company_detail->agreement_number }}" name="agreement_number" class="form-control" placeholder="Agreement Number">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label >Main user first name</label>
                                            <input required type="text" readonly value="{{ $company_detail->main_first_name }}" name="user_first_name" class="form-control" placeholder="First Name">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label >Main user last name</label>
                                            <input required type="text" readonly value="{{ $company_detail->main_last_name }}" name="user_last_name" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label >Social reason (company name)</label>
                                            <input required type="text" readonly value="{{ $company_detail->company_name }}" name="comp_name" class="form-control" placeholder="Company Name">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label >Company insurance code</label>
                                            <input required type="text" readonly value="{{ $company_detail->company_insurance_code }}" name="comp_code" class="form-control" placeholder="Company Insurance Code">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label >Company creation date</label>
                                            <input required type="date" readonly value="{{ $company_detail->company_creation_date }}" name="comp_create" class="form-control" placeholder="Creation Date">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label >Main user e-mail</label>
                                            <input required name="email" readonly value="{{ $company_detail->email }}" type="email" class="form-control" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label >Main user e-mail confirmation</label>
                                            <input required name="confirm_email" readonly value="{{ $company_detail->confirm_email }}" type="email" class="form-control" placeholder="Confirm Email">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label >Main user phone no</label>
                                            <input required name="main_user_contact" readonly value="{{ $company_detail->main_user_contact }}" type="text" class="form-control" placeholder="Contact">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label >Phone no</label>
                                            <input required name="contact" readonly value="{{ $company_detail->contact }}" type="text" class="form-control" placeholder="Phone No">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label >Address (Optional)</label>
                                            <textarea name="address" readonly id="" cols="30" rows="10" class="form-control">
                                                {{ $company_detail->address }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="settingSidebar">
        <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
        </a>
        <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
                <div class="setting-panel-header">Setting Panel
                </div>
                <div class="p-15 border-bottom">
                    <h6 class="font-medium m-b-10">Select Layout</h6>
                    <div class="selectgroup layout-color w-50">
                        <label class="selectgroup-item">
                            <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                            <span class="selectgroup-button">Light</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                            <span class="selectgroup-button">Dark</span>
                        </label>
                    </div>
                </div>
                <div class="p-15 border-bottom">
                    <h6 class="font-medium m-b-10">Sidebar Color</h6>
                    <div class="selectgroup selectgroup-pills sidebar-color">
                        <label class="selectgroup-item">
                            <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                            <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                  data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                            <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                  data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                        </label>
                    </div>
                </div>
                <div class="p-15 border-bottom">
                    <h6 class="font-medium m-b-10">Color Theme</h6>
                    <div class="theme-setting-options">
                        <ul class="choose-theme list-unstyled mb-0">
                            <li title="white" class="active">
                                <div class="white"></div>
                            </li>
                            <li title="cyan">
                                <div class="cyan"></div>
                            </li>
                            <li title="black">
                                <div class="black"></div>
                            </li>
                            <li title="purple">
                                <div class="purple"></div>
                            </li>
                            <li title="orange">
                                <div class="orange"></div>
                            </li>
                            <li title="green">
                                <div class="green"></div>
                            </li>
                            <li title="red">
                                <div class="red"></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="p-15 border-bottom">
                    <div class="theme-setting-options">
                        <label class="m-b-0">
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                   id="mini_sidebar_setting">
                            <span class="custom-switch-indicator"></span>
                            <span class="control-label p-l-10">Mini Sidebar</span>
                        </label>
                    </div>
                </div>
                <div class="p-15 border-bottom">
                    <div class="theme-setting-options">
                        <label class="m-b-0">
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                                   id="sticky_header_setting">
                            <span class="custom-switch-indicator"></span>
                            <span class="control-label p-l-10">Sticky Header</span>
                        </label>
                    </div>
                </div>
                <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                    <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                        <i class="fas fa-undo"></i> Restore Default
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
   
@endsection