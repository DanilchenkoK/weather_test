$(document).ready(function() {

    $('form').submit(function(event) {
        $('input[type=submit]').attr('disabled', '');
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: result => {
                console.log(result);
                json = jQuery.parseJSON(result);
                if (json.url) {
                    window.location.href = json.url;
                } else if (json.validation) {
                    json.inputs.forEach(element => {
                        if (json.validation[element].error) {
                            $('#validate-' + element).removeClass("d-none").addClass('d-block');
                        } else {
                            $('#validate-' + element).removeClass("d-block").addClass("d-none");
                        }
                    });
                } else {
                    alert(json.status + ' - ' + json.message);
                    if (json.urlocation)
                        setTimeout(function() { window.location.href = json.urlocation; }, 250);
                }
                $('input[type=submit]').removeAttr('disabled');

            }
        })
    });
});