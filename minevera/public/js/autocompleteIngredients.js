$(document).ready(function() {
    $('.input-text').autocomplete({
        source: function(request, response) {
            $.ajax({
                type: "GET",
                url: "/search",
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
        },
        minLength: 3
    });
});