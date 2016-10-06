$(document).ready( function() {

    $( '#login-submit' ).on( 'click', function() {

        $( "#LoginForm" ).validate( {
            onkeyup: false,
            onblur: true,
            rules: {
                user_email: {
                    required: true,
                    email: true,
                },
                user_pass: "required"
            },
            messages: {
                user_email: "Enter your Email",
                user_pass: "Enter your Password",
                /*lastname: "Enter your lastname",
                username: {
                    required: "Enter a username",
                    minlength: jQuery.format("Enter at least {0} characters"),
                    remote: jQuery.format("{0} is already in use")
                }*/
            },
            errorElement: "span",
            errorPlacement: function ( error, element ) {
                $( error ).insertBefore( element );
            },
            success: function ( label, element ) {},
            highlight: function ( element, errorClass, validClass ) {
                $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
            },
            unhighlight: function ( element, errorClass, validClass ) {
                $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
            },
            submitHandler: function ( form ) 
            {
                var Formdata = new FormData();

                Formdata.append( 'nonce',  Ajax.nonce );
                Formdata.append( 'action',  'login' );
                Formdata.append( 'login-data', $( form ).serialize() );

                $.ajax({
                    type: 'POST',
                    url: '/login/',
                    data: Formdata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function( data ) {
                        if( data.success ) {

                            window.location.href = $( '#LoginForm > #redirect_to' ).val();

                        } else {

                            $( form ).validate().elements( ':input:not([type="submit"], button):enabled:visible' ).each( function() {
                                $( this ).parents( ".col-sm-5" ).addClass( "has-error" );
                            });
                            setTimeout(function() {
                                $( form ).validate().elements( ':input:not([type="submit"], button):enabled:visible' ).each( function() {
                                    $( this ).parents( ".col-sm-5" ).addClass( "has-error" );
                                });
                            }, 3000);

                        }
                    }
                });
            }
        });

    });

    $( '#reg-submit' ).on( 'click', function() {

        $( "#RegisterForm" ).validate( {
            rules: {
                user_login: "required",
                user_email: {
                    required: true,
                    email: true
                },
                //user_first: "required",
                //user_last:  "required",
                user_pass:  {
                    required: true,
                    minlength: 6
                }, 
               /*user_pass_confirm:  {
                    required: true,
                    minlength: 6,
                    equalTo: "[name=user_pass]"
                }, */
            },
            errorElement: "em",
            errorPlacement: function ( error, element ) {
            },
            success: function ( label, element ) {
            },
            highlight: function ( element, errorClass, validClass ) {
                $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
            },
            unhighlight: function ( element, errorClass, validClass ) {
                $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
            },
            submitHandler: function ( form ) 
            {
                var Formdata = new FormData();
                Formdata.append( 'nonce',  Ajax.nonce );
                Formdata.append( 'action',  'register' );
                Formdata.append( 'reg-data', $( form ).serialize() );

                $.ajax({
                    type: 'POST',
                    url: '/login/',
                    data: Formdata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function() {
                        window.location.href = $( '#RegisterForm > #redirect_to' ).val();
                    }
                });
            }
        });

    });

});
