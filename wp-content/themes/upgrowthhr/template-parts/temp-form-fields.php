<div class="form-row">
    <div class="form-group group-fields">
        <div class="form-group-header">
            <h4 class="form-group-title">Personal Details</h4>
        </div>
        <div class="form-group-body">
            <div class="form-col half">
                <label for="full_name">Full Name <span class="required">*</span></label>
                [text* full_name class:input-control id:full_name]
            </div>
            <div class="form-col half">
                <label for=""> <span class="required">*</span></label>
                [text*  class:input-control id:]
            </div>
            <div class="form-col half">
                <label for="nickname">Nickname </label>
                [text* nickname class:input-control id:nickname]
            </div>
            <div class="form-col half">
                <label for="phone_number">Phone Number <span class="required">*</span></label>
                [text* phone_number class:input-control id:phone_number]
            </div>
            <div class="form-col half">
                <label for="education_level">Education <span class="required">*</span></label>
                [text* education_level class:input-control id:education_level]
            </div>
            <div class="form-col half">
                <label for="current_location">Current Location</label>
                [text* current_location class:input-control id:current_location]
            </div>
            <div class="form-col half">
                <label for="linkedin_profile">LinkedIn Profile</label>
                [text* linkedin_profile class:input-control id:linkedin_profile]
            </div>
        </div>
    </div>
    <div class="form-group group-files">
        <div class="form-group-header">
            <h4 class="form-group-title">Documents</h4>
        </div>
        <div class="form-group-body">
            <div class="form-col half">
                <label for="upload_resume">Resume <span class="required">*</span></label>
                <ul><li>Only supports docx, pdf, jpg, jpeg & png</li><li>File size maximum 5MB</li></ul>
                [file* upload_resume class:input-control id:upload_resume]
            </div>
            <div class="form-col half">
                <label for="additional_documents">Additional Document </label>
                <ul><li>Only supports docx, pdf, jpg, jpeg & png</li><li>File size maximum 10MB</li></ul>
                [file* additional_documents class:input-control id:additional_documents]
            </div>
        </div>
    </div>
    <div class="form-group group-submission">
        <button type="submit" class="d-none" id="default-submit-button" style="display: none">Submit</button>
    </div>
</div>