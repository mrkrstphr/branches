function onEventSave() {
    $.ajax({
        url: '/people/events/add/1441',
        method: 'post',
        data: $('form#person-event-form').serialize(),
        success: function (result) {
            if (typeof(result) == 'object' && 'success' in result) {
                if (result.success == true) {
                    $('#person-events').load('/people/events/index/1441', function () {
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
        url: '/people/attributes/add/1441',
        method: 'post',
        data: $('form#person-attribute-form').serialize(),
        success: function (result) {
            if (typeof(result) == 'object' && 'success' in result) {
                if (result.success == true) {
                    $('#person-attributes').load('/people/attributes/index/1441', function () {
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
