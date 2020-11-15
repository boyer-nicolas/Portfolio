(function ($) {
  "use strict"; // Start of use strict

  // Closes the sidebar menu
  $(".menu-toggle").on("click touch", function (e) {
    e.preventDefault();
    $("#sidebar-wrapper").toggleClass("active");
    $(".menu-toggle > .fa-bars, .menu-toggle > .fa-times").toggleClass("fa-bars fa-times");
    $(this).toggleClass("active");
  });

  // Closes responsive menu when a scroll trigger link is clicked
  $('#sidebar-wrapper .js-scroll-trigger').on("click touch", function () {
    $("#sidebar-wrapper").removeClass("active");
    $(".menu-toggle").removeClass("active");
    $(".menu-toggle > .fa-bars, .menu-toggle > .fa-times").toggleClass("fa-bars fa-times");
  });

  // Scroll to top button appear
  $(document).scroll(function () {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

})(jQuery); // End of use strict

$(function () {

  $(document).ready(function () {

    function openModal(trigger, modalId, modal) {

      $(trigger).on("click touch", function () {

        $.get(modal, function (data) {

          if (!$(modalId).length) {

            $("body").append(data);

          }

          $(modalId).modal();

        });

      });

    }

    openModal("#certif-trigger", "#titrepro-modal", "/modals/certification-modal.php");
    openModal("#opquast-trigger", "#opquast-modal", "/modals/opquast-modal.php");

    $("input").on("click", function () {

      $(this).select();

    });

    var emailFormat;
    // validate email with php
    $.validator.addMethod("check_email_format", function () {

      $.ajax({
        url: "/form/validate-email-format.php",
        type: "POST",
        data: $(form).serialize(),
        success: function (msg) {
          emailFormat = (msg == "true") ? true : false;
        }
      });
      return emailFormat;

    }, "Veuillez fournir une adresse électronique valide.");

    var form = "form[name='contact']";
    // validate the form
    var validator = $(form).validate({
      rules: {
        email: {
          check_email_format: true,
        }
      },
      errorClass: "is-invalid",
      validClass: "is-valid",
      errorElement: "div",
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        error.addClass('ml-4');
        error.appendTo(element.parent("div").parent("div"));
      },
      submitHandler: function (form) {

        // send info to validation.php
        $.ajax({
          url: form.action,
          type: form.method,
          data: $(form).serialize(),
          success: function (response) {

            var contactMessage;
            var contactResult;

            if (response == "true") {

              contactMessage = 'Votre message a bien été envoyé.';
              contactResult = 'sent';

            } else {

              contactMessage = 'Une erreur est survenue, merci de ré-essayer plus tard.';
              contactResult = 'not-sent';

            }

            $(form).html('<div class="mx-auto"><h3>' + contactMessage + '</h3></div>');
            $("#send-btn, .modal-title").remove();
            $(".modal-header").remove();
            $('.modal-footer').append('<button type="button" class="btn btn-secondary" id="' + contactResult + '"data-dismiss="modal">Fermer</button>');

            if (contactResult == 'not-sent') {

              $('#not-sent').on("click touch", function () {

                location.reload();

              });
            }
          }
        });

        $('#contact-form :input').prop("disabled", true);
        $('#send-btn').html('ENVOI');

        // retrieve loader and add a class to separate it from button text
        $.get("/img/loader.html", function (data) {

          $("#send-btn").append(data);
          $('#spinningSquaresG').addClass("ml-2");

        });
      }
    });

    // remove spaces at beginning and end of string
    $('#send-btn').on("click touch", function () {

      $(":input").each(function () {

        if ($(this).val().length > 0) {

          $(this).val($.trim($(this).val()));

        }
      });
    });

    $(".close").on("click touch", function () {
      validator.resetForm();
    });
  });
});