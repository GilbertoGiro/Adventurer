$(document).ready(function () {
    let count = 1;
    let steps = $('.steps');
    let tot_forms = steps.find('div[data-function="step"]').length;

    // Colocando as divs que conterão as ações e os títulos das etapas em seus lugares específicos
    steps.prepend('<div class="steps-titles"></div>');

    steps.find('div[data-function="step"]').each(function () {
        // Colocando o título de cada uma das etapas no header da página
        let title = $(this).find('h3').text();

        $(this).find('h3').remove();
        $('.steps-titles').append('<div class="step-title-box step-' + count + '-title">' + count + 'º - ' + title + '</div>');

        // Adicionando o menu inferior que conterá as ações da etapa
        $(this).append('<div class="actions step-actions-' + count + '"></div>');

        // Adicionando a classe que nomeia este formulário em específico
        $(this).addClass('hidden');
        $(this).addClass('step-' + count);

        // Adicionando as classes referente aos cabeçalhos
        $('.step-' + count + '-title').addClass('collapse');

        if (count === 1) {
            $(this).removeClass('hidden');
            $('.step-' + count + '-title').removeClass('collapse');
        }

        // Colocar os botões de ação na div de ações
        if (count === 1) {
            $('.step-actions-' + count).append('<button type="button" class="button button-success next">Próxima página <i class="fa fa-arrow-right white"></i></button>');
        } else if (count > 1 && count < tot_forms) {
            $('.step-actions-' + count).append('<button type="button" class="button button-success previous"><i class="fa fa-arrow-left white"></i> Página anterior</button>');
            $('.step-actions-' + count).append('<button type="button" class="button button-success next">Próxima página <i class="fa fa-arrow-right white"></i></button>');
        } else {
            $('.step-actions-' + count).append('<button type="button" class="button button-success previous"><i class="fa fa-arrow-left white"></i> Página anterior</button>');
            $('.step-actions-' + count).append('<button type="button" class="button button-success submit-form">Finalizar <i class="fa fa-arrow-right white"></i></button>');
        }

        count++;
    });

    $('.next').click(function (event) {
        let parent = $(this).closest('div[data-function="step"]');
        let actual = parent.attr('class').substring('5') * 1;
        let next = actual + 1;

        validate(parent, function () {
            console.log(2);
            if (parent.find('.warning').length > 0) {
                event.preventDefault();
                event.stopPropagation();

                return false;
            }

            $('.step-' + actual + '-title').addClass('collapse');
            $('.step-' + next + '-title').removeClass('collapse');

            parent.addClass('hidden');
            $('.step-' + next).removeClass('hidden');
        });
    });

    $('.previous').click(function () {
        let parent = $(this).closest('div[data-function="step"]');
        let actual = parent.attr('class').substring('5') * 1;
        let previous = actual - 1;

        $('.step-' + actual + '-title').addClass('collapse');
        $('.step-' + previous + '-title').removeClass('collapse');

        parent.addClass('hidden');
        $('.step-' + previous).removeClass('hidden');
    });

    $('.steps-titles').find('.step-title-box').each(function () {
        $(this).click(function () {
            let next = $(this).attr('class').split(/\s+/)[1].split('-')[1];
            let actual = $('.steps-titles').find('.step-title-box').not('.collapse').attr('class').split(/\s+/)[1].split('-')[1];
            let form = $('.step-' + actual);

            if (next > actual) {
                validate(parent, function () {
                    if (form.find('.warning').length > 0) {
                        event.preventDefault();
                        event.stopPropagation();

                        return false;
                    }

                    $('.step-' + actual + '-title').addClass('collapse');
                    $('.step-' + next + '-title').removeClass('collapse');

                    form.addClass('hidden');
                    $('.step-' + next).removeClass('hidden');
                });
            } else if (actual > next) {
                $('.step-' + actual + '-title').addClass('collapse');
                $('.step-' + next + '-title').removeClass('collapse');

                form.addClass('hidden');
                $('.step-' + next).removeClass('hidden');
            }
        });
    });

    steps.find(':input').each(function () {
        $(this).focus(function () {
            let group = $(this).closest('div[class="form-group"]');

            $(this).removeClass('warning');
            group.find('.invalid-field').remove();
        });
    });

    $(document).on('focus', '.note-editor', function () {
        $(this).parent().find('.invalid-field').remove();
        $(this).parent().find('.note-frame').removeClass('warning');
    });

    $(document).on('click', '.submit-form', function (event) {
        let parent = $(this).closest('div[data-function="step"]');

        validate(parent, function () {
            if (parent.find('.warning').length > 0) {
                event.preventDefault();
                event.stopPropagation();

                return false;
            }

            $('form').submit();
        });
    });

    // Method to validate Form
    function validate(parent, callback) {
        $(parent).find('.required-summernote').each(function () {
            let value = $(this).summernote('isEmpty');
            let formGroup = $(this).closest('.form-group');
            let container = formGroup.find('.note-frame');

            formGroup.find('.invalid-field').remove();
            container.removeClass('warning');

            if (value) {
                container.addClass('warning');
                formGroup.append('<p class="invalid-field">Este campo é obrigatório!</p>');
            }
        });

        $(parent).find('.required-selectize').each(function () {
            let value = $(this).val();
            let formGroup = $(this).closest('.form-group');
            let container = formGroup.find('.select2-selection');

            formGroup.find('.invalid-field').remove();
            container.removeClass('warning');

            if (!value) {
                container.addClass('warning');
                formGroup.append('<p class="invalid-field">Este campo é obrigatório!</p>');
            }
        });

        $(parent).find('.required').each(function () {
            let value = $(this).val();
            let container = $(this);
            let formGroup = container.closest('.form-group');

            container.removeClass('warning');
            formGroup.find('.invalid-field').remove();

            if (!value || value === '' || value === '-1') {
                container.addClass('warning');
                formGroup.append('<p class="invalid-field">Este campo é obrigatório!</p>');
            }
        });

        callback();
    }
});