<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Models\FIrstTimeBusinessClientSubscription;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Session;
use Validator;
use Illuminate\Support\Facades\Input;
use DB;
$companyname             	=  Controller::getCompanyname(1);
?>
<footer>
	<div class="copyright-info">
	    <p class="pull-right">{{ $companyname }} Copyright &copy; {{ date('Y') }} All rights reserved. Developed & Maintained by <a href="" target="target_blank">Inbowlabs</a></p>
	</div>
	<div class="clearfix"></div>
</footer>