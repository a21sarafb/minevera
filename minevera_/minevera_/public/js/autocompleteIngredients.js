$(document).ready(function() {
    $('.input-text').autocomplete({
        source: function(request, response) {
            $.ajax({
                type: "POST", // Intentar solicitud POST
                url: URL_SEARCH,
                data: {query: request.term},
                dataType: "json",
                cache: false,
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            label: item.name,
                            value: item.name
                        };
                    }));
                },
                error: function() {
                    // Si la solicitud POST falla, intentar solicitud GET
                    $.ajax({
                        type: "GET",
                        url: URL_SEARCH,
                        data: {query: request.term},
                        dataType: "json",
                        cache: false,
                        success: function(data) {
                            response($.map(data, function(item) {
                                return {
                                    label: item.name,
                                    value: item.name
                                };
                            }));
                        }
                    });
                }
            });
        },
        minLength: 3
    });
});