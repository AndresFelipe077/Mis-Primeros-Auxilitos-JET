const form_material = [].map.call(document.querySelectorAll('.mdc-text-field'), function(el){
    return new mdc.textField.MDCTextField.attachTo(el);
});
