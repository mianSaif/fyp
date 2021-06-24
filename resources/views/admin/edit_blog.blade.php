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
                            @if(\Session::get('status'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong> {{ \Session::get('msg') }}.
                              </div>
                            @endif
                               <form action="{{ route('update_blog') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <input type="hidden" value="{{  $blog->id }}" name="blog_id">
                                    <div class="col-md-12 col-sm-12 col-xs-12 text-center mb-5">
                                        <img id="blog_image" width="300" class="img-thumbnail text-center" src="{{ asset('images/'.$blog->image) }}" alt="">
                                    </div>  

                                  <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="title">Blog Title</label>
                                            <input type="text" value="{{ $blog->title }}"  name="title" class="form-control" placeholder="Blog Title">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="title">Blog Image</label>
                                            <input accept="image/*" type="file" value="{{ $blog->image }}" onchange="loadFile(event)" name="image" class="form-control" placeholder="Blog Image">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-group">
                                            <label for="description">Blog Description</label>
                                            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $blog->description }}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <button type="submit" class="btn btn-info">Update Blog</button>
                                    </div>
                                
                                </div>
                               </form>
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

@section('script')

<script>

var loadFile = function(event) {
                var output = document.getElementById('blog_image');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
                }
            };

</script>
@endsection