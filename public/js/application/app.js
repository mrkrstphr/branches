var places = null;
$(document).ready(function() {
    $('.automodal').each(function (index, modal) {
        var $close = $('<button>')
            .attr({
                "type": "button",
                "class": "close",
                "data-dismiss": "modal"
            })
            .append(
                $('<span>')
                    .attr({"aria-hidden": "true"})
                    .html('&times;')
            )
            .append(
                $('<span>')
                    .addClass('sr-only')
                    .text('Close')
        );

        var $header = $('<div>')
            .addClass('modal-header')
            .append($close)
            .append(
                $('<h4>')
                    .addClass('modal-title')
                    .text($(modal).data('modal-title'))
        );

        var $body = $('<div>').addClass('modal-body').append($(modal));

        var $save = $('<button>')
            .attr({"type": "button", "class": "btn btn-primary"})
            .text('Save');

        if ($(modal).data('on-save')) {
            $save.on('click', function () {
                var fn = window[$(modal).data('on-save')];

                if (typeof fn === 'function') {
                    fn();
                }
            });
        }

        var $footer = $('<div>')
            .addClass('modal-footer')
            .append(
                $('<button>')
                    .attr({"type": "button", "class": "btn btn-default", "data-dismiss": "modal"})
                    .text('Close')
            )
            .append($save);

        var $modal = $('<div>')
            .attr({"id": $(modal).data('modal-id'), "class": "modal fade"})
            .data({backdrop: 'static'})
            .append(
                $('<div>').addClass('modal-dialog').append(
                    $('<div>').addClass('modal-content').append(
                        $close
                    ).append($header).append($body).append($footer)
                )
            );

        $('body').append($modal);

        var loadUrl = $(modal).data('url');

        if (loadUrl) {
            $modal.on('show.bs.modal', function() {
                $(modal).load(loadUrl);
            });
        }
    });

    places = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('description'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        limit: 10,
        remote: {
            url: '/places/list-json',
            filter: function(list) {
                return $.map(list, function(place) { return place; });
            }
        }
    });

    places.initialize();
});

function onEventSave() {
    $.ajax({
        url: '/people/add-event/1441',
        method: 'post',
        data: $('form#person-event-form').serialize(),
        success: function (result) {
            if (typeof(result) == 'object' && 'success' in result) {
                if (result.success == true) {
                    $('#person-events').load('/people/reload-events/1441', function () {
                        $('a[href="#person-events"] span.badge').html(
                            $('div#person-events tr').length - 1
                        );
                    });
                    $('#add-event-modal').modal('hide');
                }
                return;
            }

            $('#add-event').html(result);
        }
    });
}
