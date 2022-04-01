$('#pinjaman').validin({
  validation_tests: {
    'min': {
      'regex': /.*/i,
      'error_message': "This number needs to be at least %i"
    }
  },
});

$('#pinjaman').validin({

  // delay time in milliseconds
  feedback_delay: 700,

  // default CSS classes
  invalid_input_class: 'invalid',
  error_message_class: "validation_error",

  // default error messages
  form_error_message: "Please fix any errors in the form",
  required_fields_initial_error_message: "Please fill in all required fields",
  required_field_error_message: "This field is required",

  // adjust margins on the validation error messages
  override_input_margins: true,

  // additional validate rules
  tests: {},

  // callback
  onValidateInput: function() {}
  
});
