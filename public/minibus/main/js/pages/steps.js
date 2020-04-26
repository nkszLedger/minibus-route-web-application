$(".tab-wizard").steps({
    headerTag: "h6"
    , bodyTag: "section"
    , transitionEffect: "none"
    , titleTemplate: '<span class="step">#index#</span> #title#'
    , labels: {
        finish: "Submit"
    }
    , onFinished: function (event, currentIndex) {
       swal("Your Order Submitted!", "Sed dignissim lacinia nunc. Curabitur tortor. Pellentesque nibh. Aenean quam. In scelerisque sem at dolor. Maecenas mattis. Sed convallis tristique sem. Proin ut ligula vel nunc egestas porttitor.");

    }
});


var form = $(".validation-wizard").show();

$(".validation-wizard").steps({
    headerTag: "h6"
    , bodyTag: "section"
    , transitionEffect: "none"
    , titleTemplate: '<span class="step">#index#</span> #title#'
    , labels: {
        finish: "Submit"
    }
    , onStepChanging: function (event, currentIndex, newIndex) {
        return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
    }
    , onFinishing: function (event, currentIndex) {
        return form.validate().settings.ignore = ":disabled", form.valid()

    }
    , onFinished: function (event, currentIndex) {

        if($("#member-form").submit())
        {
            swal({
                icon: 'success',
                title: 'Successfully submitted!',
                showConfirmButton: true,
                // timer: 1500
            });

        }
        else{

            swal({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong, could not submit!!',
                showConfirmButton: true,
                // timer: 1500
            });

        }
       //document.location.href='create_member';
      //   swal("Your Form Submitted!", "Successfully submitted!");

        /**
         * * submit member registration form
         */

       // $("#submit-member-form").click(function() {
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });
            // $.ajax({
            //     type: 'POST',
            //     datatype: 'JSON',
            //     url: '/create_member',
            //     contentType: 'application/json',
            //     data: $('#member-form').serialize(),
            //
            //     success: function(response) {
            //         // $('#frmAddTask').trigger("reset");
            //         // $("#frmAddTask .close").click();
            //
            //         console.log(response);
            //         for(var i=0; i<length; i++)
            //         {
            //             var id = response[i].firstName;
            //             var username = response[i].lastName;
            //             var name = response[i].idnumber;
            //             //var email = response[i].email;
            //         }
            //
            //
            //             alert("sucesss");
            //         window.location.reload();
            //     },
            //     error: function(data) {
            //         var errors = $.parseJSON(data.responseText);
            //         $('#add-task-errors').html('');
            //         $.each(errors.messages, function(key, value) {
            //             $('#add-task-errors').append('<li>' + value + '</li>');
            //         });
            //         $("#add-error-bag").show();
            //
            //        // alert(errors);
            //
            //         console.log(errors);
            //     }
            // });
       // });
    }

}), $(".validation-wizard").validate({
    ignore: "input[type=hidden]"
    , errorClass: "text-danger"
    , successClass: "text-success"
    , highlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass)
    }
    , errorPlacement: function (error, element) {
        error.insertAfter(element)
    }
    , rules: {
        email: {
            email: !0
        }
    }
})
