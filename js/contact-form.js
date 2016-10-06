$(document).ready( function() {

    $( '#submit' ).on( 'click', function() {

        $( "#ContactForm" ).validate( {
            rules: {
                Name: "required",
                Email: {
                    required: true,
                    email: true
                },
                Message: "required",
                Image:   "required"
            },
            errorElement: "em",
            errorPlacement: function ( error, element ) {},
            success: function ( label, element ) {},
            highlight: function ( element, errorClass, validClass ) {
                $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
            },
            unhighlight: function ( element, errorClass, validClass ) {
                $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
            },
            submitHandler: function ( form ) {

                var Formdata = new FormData();

                Formdata.append( 'Image' , ContactForm.elements.Image.files[0] );
                Formdata.append( 'action', 'contact_SendForm' );
                Formdata.append( 'nonce',  Ajax.nonce );
                Formdata.append( 'contact-data', $( form ).serialize() );

                $.ajax({
                    type: 'POST',
                    url: '/wp-admin/admin-ajax.php',
                    data: Formdata,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function( data ) {
                        $( form ).trigger( 'reset' );
                        $('#myModal').modal( 'show' );
                    }
                });
            }
        });
    });
});
