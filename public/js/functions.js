let treatment = {
    successMessage: function (message) {
        return '<div class="alert alert-success">\n' +
                    '<div class="inline-block align-middle text-right m-l-sm">\n' +
                        '<i class="fa fa-check m-l-sm" style="font-size:35px;"></i>\n' +
                    '</div>\n' +
                    '<div class="inline-block align-middle m-l-md" style="max-width:80%;margin-top:-4px !important;">\n' +
                        '<div class="block" style="font-size:15px;">\n' +
                            '<span class="block">' + message + '</span>\n' +
                        '</div>\n' +
                    '</div>\n' +
                '</div>'
    },
    errorMessage: function (message) {
        return '<div class="alert alert-danger">\n' +
                    '<div class="inline-block align-middle text-right m-l-sm">\n' +
                        '<i class="fa fa-shield-alt" style="font-size:40px;"></i>\n' +
                    '</div>\n' +
                    '<div class="inline-block align-middle m-l-lg" style="max-width:80%;margin-top:-4px !important;">\n' +
                        '<div class="block m-t-sm" style="font-size:15px;">\n' +
                            '<span class="block">' + message + '</span>\n' +
                        '</div>\n' +
                    '</div>\n' +
                '</div>'
    }
};