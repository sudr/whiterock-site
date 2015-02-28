@extends('layouts.main')

@section('content')
<h3>Report an Issue</h3>
<p>
    Please do not use this form if this is an urgent matter that must be fixed within 24 hrs,
    instead call Whiterock Conservancy Guest Services 712-304-5488.
</p>
<p>
    Please enter information about the issue, or problem that you encountered in the fields below.
    Your report of this issue is appreciated, and will help us create a better experience for all users.
</p>
<hr style="height:2px;border:none;color:#333;background-color:#333;">
<form>
    <label style="vertical-align: top">
        Your Name <span class="after" title="This field is required." style="color:#CC0000">*</span>
        &nbsp&nbsp&nbsp&nbsp<input class="required" type="text" id="name"><br>
    </label>
    <hr>
    <label style="vertical-align: top">
        Your Email <span class="after" title="This field is required." style="color:#CC0000">*</span>
        &nbsp&nbsp&nbsp&nbsp<input type="email" id="email">
    </label><br>
    <p>Your e-mail address will only be used in the event that we need to follow-up on your report.</p>
    <hr>
    <label style="vertical-align: top">
        Your Phone Number&nbsp&nbsp&nbsp&nbsp<input type="tel" id="phone">
    </label><br>
    <p>Your phone number address will only be used in the event that we need to follow-up on your report.</p><hr>
    <label style="vertical-align: top">
        Date of Incident <span class="after" title="This field is required." style="color:#CC0000;vertical-align: top">*</span>
        &nbsp&nbsp&nbsp&nbsp
        <input type="date" id="date">
    </label><br>
    <hr>
    <label style="vertical-align: top">
        Location of Incident&nbsp&nbsp&nbsp&nbsp<textarea id="location"></textarea>
    </label><br>
    <p>Please include as much detail as possible, such as building, campground or trail name. Include nearest landmark or cross road.</p>
    <hr>
    <label style="vertical-align: top">
        Type of Incident <span class="after" title="This field is required." style="color:#CC0000">*</span>
        &nbsp&nbsp&nbsp&nbsp
        <select id=select>
            <option>Trail Issue</option>
            <option>Non-Trail Land Issue</option>
            <option>Building Issue</option>
            <option>Sign Issue</option>
        </select>
    </label><br>
    <hr>
    <label style="vertical-align: top">
        Description of Issue&nbsp&nbsp&nbsp&nbsp<textarea id="description"> </textarea>
    </label><br>
    <hr>
    <label style="vertical-align: top">
        Upload Photo
        &nbsp&nbsp&nbsp&nbsp
        <input style="vertical-align: top" type="file" id="file">
    </label><br>
    <hr>
    <input type="submit" value="Submit Issue" id="btnSubmit">
</form>
@stop