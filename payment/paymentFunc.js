function paymessage() {
    document.write("Thank you for your payment. We will email the invoive.");
    
}
function openForm() {
    document.getElementById("popupForm").style.display = "block";
}
function closeForm() {
    document.getElementById("popupForm").style.display = "none";
}

var FormStuff = {
    init: function() {
    this.applyConditionalRequired();
    this.bindUIActions();
    },
    
    bindUIActions: function() {
    $("input[type='radio'], input[type='checkbox']").on("change", this.applyConditionalRequired);
    },
    
    applyConditionalRequired: function() {
    $(".require-if-active").each(function() {
    var el = $(this);
    if ($(el.data("require-pair")).is(":checked")) {
        el.prop("required", true);
    } else {
        el.prop("required", false);
    }
    });
    }
};
