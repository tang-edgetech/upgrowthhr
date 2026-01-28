jQuery(document).ready(function($) {
    const params = new URLSearchParams(window.location.search);
    const $job_application_field = $('#job_application_form .input-control#job_position');

    $(document).on('click', '#submit-job-application', function(e) {
        e.preventDefault();
        var $submit = $(this);
        if( $('#job_application_form')[0] ) {
            $('#job_application_form button[type="submit"]').trigger('click');
        }
    });

    $(document).on('change', '#selecting_job_position', function() {
        var $field = $(this),
            $form = $field.closest('form'),
            $selection = $field.val(),
            $job_header = $field.parents('#job-header-info');
        $form.attr('disabled', true);
        $.ajax({
            type: 'POST',
            url: job.admin_ajax,
            data: {
                action: 'retrieving_job_position_details',
                nonce: job.nonce,
                job_position: $selection,
            },
            beforeSeond: function() {
                console.log($selection);
                $field.closest('.error').fadeOut();
                setTimeout(function() {
                    $field.closest('.error').remove();
                }, 250);
            },
            success: function(data) {
                var $response = JSON.parse(data);
                if( $response.status == 1000 ) {
                    $job_header.html($response.html);
                    $job_application_field.val($selection);
                    $('a.btn.btn-outline.back-button-link').attr('href', $response.back_url);
                }
                else {
                    if( $response.message !== null ) {
                        $job_header.append('<div class="error">Something went wrong during the execution. Please try again later.</div>');
                        $field.closest('.error').fadeIn();  
                    }
                }
            },
            error: function(xhr) {
                console.log(xhr);
                $job_header.append('<div class="error">Something went wrong during the execution. Please try again later.</div>');
                $field.closest('.error').fadeIn();
            }
        });
    });
});