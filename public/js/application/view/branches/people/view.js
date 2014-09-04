var $eventSourcesDialog = null;
var $eventSourceDialog = null;
$(document).ready(function () {
    $eventSourceDialog = $('div#event-source-modal').modalX({
        title: 'Event Source',
        buttons: [
            {
                label: 'Close',
                classes: 'btn-primary',
                callback: function () {
                    $eventSourceDialog.modal('hide');
                }
            },
            {
                label: 'Save',
                classes: 'btn-success',
                callback: function (event) {
                    var $form = $eventSourceDialog.find('form');
                    var eventId = $form.data('id');

                    $.ajax({
                        url: $form.attr('action'),
                        method: 'post',
                        data: $form.serialize(),
                        success: function (result) {
                            if (typeof(result) == 'object' && 'success' in result) {
                                    if (result.success == true) {
                                        if ('sources' in result) {
                                            $('button.event-sources[data-id="' + eventId + '"] span.badge').text(
                                                result.sources
                                            );
                                        }
                                        $eventSourceDialog.modal('hide');
                                    }
                                return;
                            }

                            $('#event-source-modal .modal-body').html(result);
                        }
                    });
                }
            }
        ],
        onClose: function () {
            $eventSourcesDialog.modal('show');
        }
    });
    $eventSourcesDialog = $('div#event-sources-modal').modalX({
        title: 'Event Sources',
        buttons: [
            {
                label: 'Close',
                classes: 'btn-primary',
                callback: function () {
                    $eventSourcesDialog.modal('hide');
                }
            },
            {
                label: 'Add',
                classes: 'btn-success',
                callback: function () {
                    $eventSourcesDialog.modal('hide');
                    $eventSourceDialog.modal('show');
                }
            }
        ],
        onLoad: function (e) {
            var eventId = $(e.relatedTarget).data('id');
            $eventSourceDialog.modalX('setUrl', '/people/events/add-source/' + eventId);
        }
    });
});

function onEventSave() {
    $.ajax({
        url: '/people/events/add/' + personId,
        method: 'post',
        data: $('form#person-event-form').serialize(),
        success: function (result) {
            if (typeof(result) == 'object' && 'success' in result) {
                if (result.success == true) {
                    $('#person-events').load('/people/events/index/' + personId, function () {
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

function onAttributeSave() {
    $.ajax({
        url: '/people/attributes/add/' + personId,
        method: 'post',
        data: $('form#person-attribute-form').serialize(),
        success: function (result) {
            if (typeof(result) == 'object' && 'success' in result) {
                if (result.success == true) {
                    $('#person-attributes').load('/people/attributes/index/' + personId, function () {
                        $('a[href="#person-attributes"] span.badge').html(
                            $('div#person-attributes tr').length - 1
                        );
                    });
                    $('#add-attribute-modal').modal('hide');
                }
                return;
            }

            $('#add-attribute').html(result);
        }
    });
}
