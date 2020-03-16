$(document).ready(function() {


    $('form[validate]').submit(function(event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: result => {
                json = jQuery.parseJSON(result);
                if (json.url) {
                    window.location.href = json.url;
                } else if (json.validation) {
                    json.inputs.forEach(element => {
                        if (json.validation[element].error) {

                            $('#validate-' + element).removeClass("d-none").addClass("d-block");
                        } else {
                            $('#validate-' + element).removeClass("d-block").addClass("d-none");
                        }
                    });
                } else {
                    alert(json.status + ' - ' + json.message);
                    if (json.urlocation)
                        setTimeout(function() { window.location.href = json.urlocation; }, 250);
                    // window.location.href = json.urlocation;
                }

            }
        })
    });
});