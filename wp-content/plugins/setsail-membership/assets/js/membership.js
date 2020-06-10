// Load the SDK asynchronously
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
if (typeof qodefSocialLoginVars !== 'undefined') {
    var facebookAppId = qodefSocialLoginVars.social.facebookAppId;
}
if (facebookAppId) {
    window.fbAsyncInit = function () {
        FB.init({
            appId: facebookAppId, //265124653818954 - test app ID
            cookie: true,  // enable cookies to allow the server to access
            xfbml: true,  // parse social plugins on this page
            version: 'v2.5' // use version 2.5
        });

        window.FB = FB;
    };
}

(function ($) {
    "use strict";

    var socialLogin = {};
    if ( typeof qodef !== 'undefined' ) {
        qodef.modules.socialLogin = socialLogin;
    }

    socialLogin.qodefUserLogin = qodefUserLogin;
    socialLogin.qodefUserRegister = qodefUserRegister;
    socialLogin.qodefUserLostPassword = qodefUserLostPassword;
    socialLogin.qodefInitLoginWidgetModal = qodefInitLoginWidgetModal;
    socialLogin.qodefInitFacebookLogin = qodefInitFacebookLogin;
    socialLogin.qodefInitGooglePlusLogin = qodefInitGooglePlusLogin;
    socialLogin.qodefRenderAjaxResponseMessage = qodefRenderAjaxResponseMessage;

    $(document).ready(qodefOnDocumentReady);
    $(window).load(qodefOnWindowLoad);

    /**
     * All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
        qodefInitLoginWidgetModal();
        qodefUserLogin();
        qodefUserRegister();
        qodefUserLostPassword();
	    qodefUserLoggedInDD();
    }

    /**
     * All functions to be called on $(window).load() should be in this function
     */
    function qodefOnWindowLoad() {
        qodefInitFacebookLogin();
        qodefInitGooglePlusLogin();
        qodefMembershipFullScreen();
    }
	
	/**
	 * Login style for mobile devices
	 */
  
	function qodefUserLoggedInDD(){
		var loginHolder = $('.qodef-mobile-header .qodef-user-logged-in');
		
		if(loginHolder.length){
			loginHolder.each(function() {
				var thisLoginHolder = $(this),
					loginHolderClick = thisLoginHolder.find('.qodef-logged-in-user'),
					loginDDMenu = thisLoginHolder.find('.qodef-login-dropdown');
				
				loginHolderClick.on('click', function (e) {
					e.preventDefault();
					
					if (loginDDMenu.hasClass('qodef-active')) {
						loginDDMenu.removeClass('qodef-active');
					} else {
						loginDDMenu.addClass('qodef-active');
					}
				});
			});
        }
    }

    /**
     * Initialize login widget modal
     */
    function qodefInitLoginWidgetModal() {
        var modalOpener = $('.qodef-login-opener'),
            modalHolder = $('.qodef-login-register-holder');

        $( document.body ).on( 'open_user_login_trigger', function() {
            modalHolder.fadeIn(300);
            modalHolder.addClass('opened');
        });

        if (modalOpener) {
            var tabsHolder = $('.qodef-login-register-content');

            //Init opening login modal
            modalOpener.on('click', function (e) {
                e.preventDefault();
                modalHolder.fadeIn(300);
                modalHolder.addClass('opened');
            });

            //Init closing login modal
            modalHolder.on('click', function (e) {
                if (modalHolder.hasClass('opened')) {
                    modalHolder.fadeOut(300);
                    modalHolder.removeClass('opened');
                }
            });
            tabsHolder.on('click', function (e) {
                e.stopPropagation();
            });
            // on esc too
            $(window).on('keyup', function (e) {
                if (modalHolder.hasClass('opened') && e.keyCode === 27) {
                    modalHolder.fadeOut(300);
                    modalHolder.removeClass('opened');
                }
            });

            //Init tabs
            tabsHolder.tabs();
        }
    }

    /**
     * Login user via Ajax
     */
    function qodefUserLogin() {
        $('.qodef-login-form').on('submit', function (e) {
            e.preventDefault();
            
            var ajaxData = {
                action: 'setsail_membership_login_user',
                security: $(this).find('#qodef-login-security').val(),
                login_data: $(this).serialize()
            };
            
            $.ajax({
                type: 'POST',
                data: ajaxData,
                url: qodefGlobalVars.vars.qodefAjaxUrl,
                success: function (data) {
                    var response;
                    response = JSON.parse(data);

                    qodefRenderAjaxResponseMessage(response);
                    if (response.status === 'success') {
                        window.location = response.redirect;
                    }
                }
            });
            
            return false;
        });
    }

    /**
     * Register New User via Ajax
     */
    function qodefUserRegister() {
        $('.qodef-register-form').on('submit', function (e) {
            e.preventDefault();
            
            var ajaxData = {
                action: 'setsail_membership_register_user',
                security: $(this).find('#qodef-register-security').val(),
                register_data: $(this).serialize()
            };

            $.ajax({
                type: 'POST',
                data: ajaxData,
                url: qodefGlobalVars.vars.qodefAjaxUrl,
                success: function (data) {
                    var response;
                    response = JSON.parse(data);

                    qodefRenderAjaxResponseMessage(response);
                    if (response.status === 'success') {
                        window.location = response.redirect;
                    }
                }
            });

            return false;
        });
    }

    /**
     * Reset user password
     */
    function qodefUserLostPassword() {
        var lostPassForm = $('.qodef-reset-pass-form');
        
        lostPassForm.on('submit', function (e) {
            e.preventDefault();
            
            var data = {
                action: 'setsail_membership_user_lost_password',
                user_login: lostPassForm.find('#user_reset_password_login').val()
            };
            
            $.ajax({
                type: 'POST',
                data: data,
                url: qodefGlobalVars.vars.qodefAjaxUrl,
                success: function (data) {
                    var response = JSON.parse(data);
                    qodefRenderAjaxResponseMessage(response);
                    if (response.status === 'success') {
                        window.location = response.redirect;
                    }
                }
            });
        });
    }

    /**
     * Response notice for users
     * @param response
     */
    function qodefRenderAjaxResponseMessage(response) {
        var responseHolder = $('.qodef-membership-response-holder'), //response holder div
            responseTemplate = _.template($('.qodef-membership-response-template').html()); //Locate template for info window and insert data from marker options (via underscore)

        var messageClass;
        if (response.status === 'success') {
            messageClass = 'qodef-membership-message-succes';
        } else {
            messageClass = 'qodef-membership-message-error';
        }

        var templateData = {
            messageClass: messageClass,
            message: response.message
        };

        var template = responseTemplate(templateData);
        responseHolder.html(template);
    }

    /**
     * Facebook Login
     */
    function qodefInitFacebookLogin() {
        var loginForm = $('.qodef-facebook-login-holder');
        loginForm.on('submit', function (e) {
            e.preventDefault();
            
            window.FB.login(function (response) {
                qodefFacebookCheckStatus(response);
            }, {scope: 'email, public_profile'});
        });
    }

    /**
     * Check if user is logged into Facebook and App
     *
     * @param response
     */
    function qodefFacebookCheckStatus(response) {
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
            qodefGetFacebookUserData();
        } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
            console.log('Please log into this app');
        } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
            console.log('Please log into Facebook');
        }
    }

    /**
     * Get user data from Facebook and login user
     */
    function qodefGetFacebookUserData() {
        console.log('Welcome! Fetching information from Facebook...');
        FB.api('/me', 'GET', {'fields': 'id, name, email, link, picture'}, function (response) {
            var nonce = $('.qodef-facebook-login-holder [name^=qodef_nonce_facebook_login]').val();
            response.nonce = nonce;
            response.image = response.picture.data.url;
            var data = {
                action: 'setsail_membership_check_facebook_user',
                response: response
            };
            $.ajax({
                type: 'POST',
                data: data,
                url: qodefGlobalVars.vars.qodefAjaxUrl,
                success: function (data) {
                    var response;
                    response = JSON.parse(data);

                    qodefRenderAjaxResponseMessage(response);
                    if (response.status === 'success') {
                        window.location = response.redirect;
                    }
                }
            });
        });
    }

    /**
     * Google Login
     */
    function qodefInitGooglePlusLogin() {
        if (typeof qodefSocialLoginVars !== 'undefined') {
            var clientId = qodefSocialLoginVars.social.googleClientId;
        }
        
        if (clientId) {
            gapi.load('auth2', function () {
                window.auth2 = gapi.auth2.init({
                    client_id: clientId
                });
                qodefInitGooglePlusLoginButton();
            });
        } else {
            var loginForm = $('.qodef-google-login-holder');
            loginForm.on('submit', function (e) {
                e.preventDefault();
            });
        }
    }

    /**
     * Initialize login button for Google Login
     */
    function qodefInitGooglePlusLoginButton() {
        var loginForm = $('.qodef-google-login-holder');
        
        loginForm.on('submit', function (e) {
            e.preventDefault();
            
            window.auth2.signIn();
            qodefSignInCallback();
        });
    }

    /**
     * Get user data from Google and login user
     */
    function qodefSignInCallback() {
        var signedIn = window.auth2.isSignedIn.get();
        
        if (signedIn) {
            var currentUser = window.auth2.currentUser.get(),
                profile = currentUser.getBasicProfile(),
                nonce = $('.qodef-google-login-holder [name^=qodef_nonce_google_login]').val(),
                userData = {
                    id: profile.getId(),
                    name: profile.getName(),
                    email: profile.getEmail(),
                    image: profile.getImageUrl(),
                    link: 'https://plus.google.com/' + profile.getId(),
                    nonce: nonce
                },
                data = {
                    action: 'setsail_membership_check_google_user',
                    response: userData
                };
            $.ajax({
                type: 'POST',
                data: data,
                url: qodefGlobalVars.vars.qodefAjaxUrl,
                success: function (data) {
                    var response;
                    response = JSON.parse(data);

                    qodefRenderAjaxResponseMessage(response);
                    if (response.status === 'success') {
                        window.location = response.redirect;
                    }
                }
            });
        }
    }

    function qodefMembershipFullScreen() {
        var membership = $('.qodef-membership-main-wrapper');
        var profileContent = $('.page-template-user-dashboard .qodef-content');
        var footer = $('.qodef-page-footer');
        var reduceHeight = 0;

        if(!qodef.body.hasClass('qodef-header-transparent') && qodef.windowWidth > 1024) {
            reduceHeight = reduceHeight + qodefGlobalVars.vars.qodefMenuAreaHeight + qodefGlobalVars.vars.qodefLogoAreaHeight;
        }
        if(footer.length > 0) {
            reduceHeight += footer.outerHeight();
        }

        if(qodef.windowWidth > 1024) {
            var height = qodef.windowHeight - reduceHeight;
            profileContent.css({'min-height': height  + 'px'});
        }
    }

})(jQuery);
(function($) {
    'use strict';

    var membershipFavorites = {};
    qodef.modules.membershipFavorites = membershipFavorites;

    membershipFavorites.qodefOnDocumentReady = qodefOnDocumentReady;

    $(document).ready(qodefOnDocumentReady);
    
    /*
     All functions to be called on $(document).ready() should be in this function
     */
    function qodefOnDocumentReady() {
        qodefMembershipAddToWishlist();
        qodefMembershipAddToWishlistTriggerEvent();
    }

    function qodefMembershipAddToWishlist(){
        $('.qodef-membership-item-favorites').on('click',function(e) {
            e.preventDefault();
            var item = $(this),
                itemID;

            if(typeof item.data('item-id') !== 'undefined') {
                itemID = item.data('item-id');
            }

            qodefMembershipWhishlistAdding(item, itemID);
        });
    }

    function qodefMembershipWhishlistAdding(item, itemID){
        var ajaxData = {
            action: 'setsail_membership_add_item_to_favorites',
            item_id : itemID
        };

        $.ajax({
            type: 'POST',
            data: ajaxData,
            url: qodefGlobalVars.vars.qodefAjaxUrl,
            success: function (data) {
                var response = JSON.parse(data);
                
                if(response.status === 'success'){
                    if(!item.hasClass('qodef-icon-only')) {
                        item.find('span').text(response.data.message);
                    }
                    item.find('.qodef-favorites-icon').removeClass('fa-heart fa-heart-o').addClass(response.data.icon);
                }
            }
        });

        return false;
    }

    function qodefMembershipAddToWishlistTriggerEvent() {
        $( document.body ).on( 'setsail_membership_favorites_trigger', function() {
            qodefMembershipAddToWishlist();
        });
    }

})(jQuery);