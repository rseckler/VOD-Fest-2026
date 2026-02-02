/**
 * VOD Fest User Area JavaScript
 */

(function($) {
    'use strict';

    /**
     * Show message to user
     */
    function showMessage(formId, message, type) {
        const messageEl = $('#' + formId + '-message');
        messageEl
            .removeClass('success error')
            .addClass(type)
            .html(message)
            .fadeIn();

        // Auto-hide after 5 seconds
        setTimeout(function() {
            messageEl.fadeOut();
        }, 5000);
    }

    /**
     * Login Form Handler
     */
    $('#vod-login-form').on('submit', function(e) {
        e.preventDefault();

        const $form = $(this);
        const $button = $form.find('button[type="submit"]');
        const buttonText = $button.text();

        $button.prop('disabled', true).text('Logging in...');

        $.ajax({
            url: vodUserAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'vod_user_login',
                nonce: vodUserAjax.nonce,
                username: $form.find('[name="username"]').val(),
                password: $form.find('[name="password"]').val(),
                remember: $form.find('[name="remember"]').is(':checked')
            },
            success: function(response) {
                if (response.success) {
                    showMessage('vod-login', response.data.message, 'success');
                    setTimeout(function() {
                        window.location.href = response.data.redirect;
                    }, 1000);
                } else {
                    showMessage('vod-login', response.data.message, 'error');
                    $button.prop('disabled', false).text(buttonText);
                }
            },
            error: function() {
                showMessage('vod-login', 'An error occurred. Please try again.', 'error');
                $button.prop('disabled', false).text(buttonText);
            }
        });
    });

    /**
     * Registration Form Handler
     */
    $('#vod-register-form').on('submit', function(e) {
        e.preventDefault();

        const $form = $(this);
        const $button = $form.find('button[type="submit"]');
        const buttonText = $button.text();

        $button.prop('disabled', true).text('Creating account...');

        $.ajax({
            url: vodUserAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'vod_user_register',
                nonce: vodUserAjax.nonce,
                username: $form.find('[name="username"]').val(),
                email: $form.find('[name="email"]').val(),
                password: $form.find('[name="password"]').val(),
                first_name: $form.find('[name="first_name"]').val(),
                last_name: $form.find('[name="last_name"]').val()
            },
            success: function(response) {
                if (response.success) {
                    showMessage('vod-register', response.data.message, 'success');
                    setTimeout(function() {
                        window.location.href = response.data.redirect;
                    }, 1000);
                } else {
                    showMessage('vod-register', response.data.message, 'error');
                    $button.prop('disabled', false).text(buttonText);
                }
            },
            error: function() {
                showMessage('vod-register', 'An error occurred. Please try again.', 'error');
                $button.prop('disabled', false).text(buttonText);
            }
        });
    });

    /**
     * Profile Update Form Handler
     */
    $('#vod-profile-form').on('submit', function(e) {
        e.preventDefault();

        const $form = $(this);
        const $button = $form.find('button[type="submit"]');
        const buttonText = $button.text();

        $button.prop('disabled', true).text('Updating...');

        $.ajax({
            url: vodUserAjax.ajaxurl,
            type: 'POST',
            data: {
                action: 'vod_user_update_profile',
                nonce: vodUserAjax.nonce,
                first_name: $form.find('[name="first_name"]').val(),
                last_name: $form.find('[name="last_name"]').val(),
                email: $form.find('[name="email"]').val(),
                country: $form.find('[name="country"]').val(),
                phone: $form.find('[name="phone"]').val()
            },
            success: function(response) {
                if (response.success) {
                    showMessage('vod-profile', response.data.message, 'success');
                } else {
                    showMessage('vod-profile', response.data.message, 'error');
                }
                $button.prop('disabled', false).text(buttonText);
            },
            error: function() {
                showMessage('vod-profile', 'An error occurred. Please try again.', 'error');
                $button.prop('disabled', false).text(buttonText);
            }
        });
    });

})(jQuery);
