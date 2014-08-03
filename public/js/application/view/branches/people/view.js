$(document).ready(function () {
    $.widget('ui.modalX', {
        options: {
            title: '',
            url: '',
            buttons: {},
            onLoad: function () {}
        },
        _create: function () {
            this._decorateModal();
            this._createFooterButtons();
            this._bindEvents();
        },
        setUrl: function (url) {
            this.options.url = url;
        },
        _decorateModal: function () {
            var template = '<div class="modal-dialog">' +
                '<div class="modal-content">' +
                    '<div class="modal-header">' +
                        '<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' +
                        '<h4 class="modal-title">' + this.options.title + '</h4>' +
                    '</div>' +
                    '<div class="modal-body"></div>' +
                    '<div class="modal-footer"></div>' +
                '</div>' +
            '</div>';

            var $modal = $(template);

            $(this.element)
                .addClass('modal fade')
                .append($modal);
        },
        _createFooterButtons: function () {
            var $footer = $('div.modal-footer', this.element);

            $.each(this.options.buttons, function (index, button) {
                var $button = $('<button>')
                    .attr({type: 'button', class: 'btn btn-default ' + button.classes})
                    .text(button.label);
                $button.on('click', button.callback);
                $footer.append($button);
            });
        },
        _bindEvents: function () {
            var _this = this;
            $(this.element).on('show.bs.modal', function (e) {
                var buttonUrl = $(e.relatedTarget).data('url');
                var onLoadCallback = function () {_this.options.onLoad(e)};

                if (buttonUrl) {
                    $('div.modal-body', _this.element).load(buttonUrl, onLoadCallback);
                } else if (_this.options.url) {
                    $('div.modal-body', _this.element).load(_this.options.url, onLoadCallback);
                }
            });
        }
    });

    var $eventSourceDialog = $('div#event-source-modal').modalX({
        title: 'Event Source',
        buttons: [
            {
                label: 'Close',
                classes: 'btn-primary',
                callback: function () {
                    $eventSourceDialog.modal('hide');
                    $eventSourcesDialog.modal('show');
                }
            },
            {
                label: 'Save',
                classes: 'btn-success',
                callback: function () {
                    $eventSourceDialog.modal('hide');
                    $eventSourcesDialog.modal('show');
                }
            }
        ],
        onLoad: function (e) {

        }
    });
    var $eventSourcesDialog = $('div#event-sources-modal').modalX({
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
