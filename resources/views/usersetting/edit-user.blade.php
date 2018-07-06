@extends('layouts.admin-layout')
@section('home-title')
MovoEasy | Edit User
@endsection
@section('admin-content')

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>User Setting</h3>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2> {{ $layoutArr['pageTitle'] }}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div role="alert" class="alert alert-success alert-dismissible fade in" style="display:none;" id="sucMsgDiv">
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                        <span class="sucmsgdiv"></span>
                    </div>
                    <div role="alert" class="alert alert-danger alert-dismissible fade in" style="display:none;" id="failMsgDiv">
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                        <span class="failmsgdiv"></span>
                    </div>
                    <div class="row">
                        <form name="entryFrm" id="entryFrm" class="form-horizontal form-label-left" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name='id' id="id" />
                            <fieldset>
                                <legend>Personal Information</legend>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="first-name" class="control-label col-md-4 col-sm-4 col-xs-12">Full Name <span style="color:red">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="User[fullname]" id="fullname" class="form-control" autocomplete="off" maxlength="125" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name" class="control-label col-md-4 col-sm-4 col-xs-12">Parcker Name</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="User[packer_name]" id="packer_name" class="form-control" autocomplete="off" maxlength="125" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name" class="control-label col-md-4 col-sm-4 col-xs-12">Status</label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                @if(isset($layoutArr['viewDataObj']->is_active) && $layoutArr['viewDataObj']->is_active == 'Y')
                                                <input type="radio" name="User[is_active]" value="Y" class="flat" checked/> Active
                                                @else
                                                <input type="radio" name="User[is_active]" value="Y" class="flat"/> Active
                                                @endif														                                        

                                                @if(isset($layoutArr['viewDataObj']->is_active) && $layoutArr['viewDataObj']->is_active == 'N')
                                                <input type="radio" name="User[is_active]" value="N" class="flat" checked/> In-Active
                                                @else
                                                <input type="radio" name="User[is_active]" value="N" class="flat" /> In-Active
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="row">
                                        <div class="form-group">
                                            <label for="first-name" class="control-label col-md-4 col-sm-4 col-xs-12">Mobile</label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input type="text" name="User[mobile]" id="mobile" class="form-control" autocomplete="off" maxlength="15" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name" class="control-label col-md-4 col-sm-4 col-xs-12">Email Address <span style="color:red">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" name="User[email]" id="email" class="form-control" autocomplete="off" maxlength="150" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="first-name" class="control-label col-md-4 col-sm-4 col-xs-12">User Role <span style="color:red">*</span></label>
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <select name="User[role_id]" class="form-control" id="role_id">
                                                    @foreach($layoutArr['rolesArr'] as $roleVal)
                                                        <option value="{{ $roleVal['id'] }}"> {{ $roleVal['name'] }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-success frmbtngroup" onclick="updateUser();"><i class="fa fa-save"></i> {{ $layoutArr['frmBtn'] }}</button>
                                    <button class="btn btn-danger frmbtngroup" onclick="changeUrl();"><i class="fa fa-close"></i> Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection