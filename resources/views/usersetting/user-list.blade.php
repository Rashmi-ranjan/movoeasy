@extends('layouts.admin-layout')
@section('home-title')
MovoEasy | User List
@endsection
@section('admin-content')
<?php 
use App\Http\Controllers\Controller;
?>
<div class="page-title">
    <div class="title_left">
        <h3>User Setting</h3>
    </div>
</div>
<div class="clearfix"></div>	
<div class="x_panel">
    <div class="x_title">
        <h2>{{ $layoutArr['pageTitle'] }}</h2>
        <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
            </li>
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
        
        
        
        <div id= "listingTable">
        @if(isset($layoutArr['userCnt']) && $layoutArr['userCnt'] > 0)
            <div class="table-responsive">  
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role</th>
                            <th>Packer Name</th>
                            <th>Full Name</th>
                            <th>Email address</th>
                            <th>Phone Number</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $trCnt = 1 ?>                
                        @foreach($layoutArr['custompaginatorres'] as $resKey=>$resVal)
                        <tr>
                            <th scope="row">{{ $trCnt }}</th>
                            <td>{{ Controller::getDisplayFieldName($resVal->role_id,'roles',array('role_name')) }}</td>
                            <td>{{ $resVal->packer_name }}</td>
                            <td>{{ $resVal->fullname }}</td>
                            <td>{{ $resVal->email }}</td>
                            <td>{{ $resVal->mobile }}</td>
                            <td class="text-center">
                                @if($resVal->is_active == 'Y')
                                <span class="label label-success">Active</span>
                                @elseif($resVal->is_active == 'P')
                                <span class="label label-warning">Pending</span>
                                @else
                                <span class="label label-danger">Inactive</span> 
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ URL::to('usersetting/edit-user/'.base64_encode(base64_encode($resVal->id))) }}" title="Discard record" class="btn btn-primary frmbtngroup">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                @if($resVal->is_active == 'N' || $resVal->is_active == 'P')
                                <a href="javascript:void(0);" title="Approve record" onclick="approveUser('{{ $resVal->id }}')" class="btn btn-success frmbtngroup">
                                    <i class="fa fa-check-circle"></i>
                                </a>
                                @endif
                                @if($resVal->is_active == 'Y')
                                <a href="javascript:void(0);" title="Pending record" onclick="pendingeUser('{{ $resVal->id }}')" class="btn btn-warning frmbtngroup">
                                    <i class="fa fa-ban"></i>
                                </a>
                                @endif
                                <a href="javascript:void(0);" title="Discard record" onclick="discardUser('{{ $resVal->id }}')" class="btn btn-danger frmbtngroup">
                                    <i class="fa fa-times-circle"></i>
                                </a>
                                <a href="{{ URL::to('usersetting/changepassword/'.base64_encode(base64_encode($resVal->id))) }}" title="Change Password" class="btn btn-info iframeXSml">
                                    <i class="fa fa-unlock"></i>
                                </a>
                                
                            </td>
                        </tr>
                        <?php $trCnt++; ?>
                        @endforeach
                    </tbody>
                </table> 
                {{ $layoutArr['custompaginatorres']->links() }}             
            </div>
        @else 
            <div class="alert alert-info margine10top">
                <i class="fa fa-info"></i>					
                No data found.
            </div>
        @endif
        </div>
    </div>
</div>

@endsection