$.widget('ui.modalX', {
    options: {
        title: '',
        url: '',
        buttons: {},
        onLoad: function () {},
        onClose: function () {}
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
        }).on('hide.bs.modal', function (e) {
            if ($.isFunction(_this.options.onClose)) {
                _this.options.onClose(e);
            }
        });
    }
});
