<div class="col-md-12">
    <div class="banner-form-agileinfo">
        <h5>Need To <span>Transport</span>?</h5>
        
        <div role="alert" class="alert alert-success alert-dismissible fade in" style="display:none;" id="sucMsgDiv">
            <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
            <span class="sucmsgdiv"></span>
        </div>
        <div role="alert" class="alert alert-danger alert-dismissible fade in" style="display:none;" id="failMsgDiv">
            <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
            <span class="failmsgdiv"></span>
        </div>
        <form action="#" method="post" id="entryFrm">
            
            <input type="text" class="email" name="Order[name]" id="name" placeholder="Name" required="">
            <input type="text" class="email" name="Order[email]" id="email" placeholder="Email" required="">
            <input type="text" class="tel" name="Order[mobile]" id="mobile" placeholder="Phone Number" required="">
            <select name="Order[trans_from]" id="trans_from" class="form-control option-w3ls">
                    <option value="">Transport From</option>
                    <option value="Albania">Albania</option>
                    <option value="Belgium">Belgium</option>
                    <option value="Cameroon">Cameroon</option>
                    <option value="Dominica">Dominica</option>
                    <option value="France">France</option>
                    <option value="Jersey">Jersey</option>
            </select>
            <select name="Order[trans_to]" id="trans_to" class="form-control option-w3ls">
                    <option value="">Transport To</option>
                    <option value="Colombia">Colombia</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Japan">Japan</option>
                    <option value="Lebanon">Lebanon</option>
                    <option value="Luxembourg">Luxembourg</option>
                    <option value="Montserrat">Montserrat</option>
            </select>
            <input type="text" class="tel datemask" name="Order[mover_date]" id="mover_date" placeholder="DD-MM-YYYY" required="">
            <input type="button" class="hvr-shutter-in-vertical" value="Get started" onclick="postOrder();">  	
        </form>
    </div>
</div>
    
