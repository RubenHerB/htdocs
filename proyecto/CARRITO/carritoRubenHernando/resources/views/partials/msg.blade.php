@if(\Session::get("success"))
    <div class="alert alert-success text-center">
        <p>{{\Session::get("success")}}</p>
    </div>
@elseif(\Session::get("deny"))
<div class="alert alert-danger text-center">
        <p>{{\Session::get("deny")}}</p>
    </div>
@endif