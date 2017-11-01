var $collection;

jQuery(document).ready(function() {
    $collection = $('#definition_subdefinitions');
    $collection.data('index', $collection.find('>li').length);

    $collection.find('>li').each(function() {
        addDeleteSubdefinitionForm($(this));
    });

    $('#add_subdef').on('click', function(e) {
        e.preventDefault();

        addSubdefintionForm($collection);
    });
});

var addSubdefintionForm = function($collection) {
    var prototype = $collection.data('prototype'),
        index     = $collection.data('index'),
        newForm   = prototype;

    newForm = newForm.replace(/__name__/g, index);

    $collection.data('index', index + 1);
    $collection.append(newForm);
};

var addDeleteSubdefinitionForm = function($form) {
    var $removeForm = $('<a href="#">delete</a>');
    $form.append($removeForm);

    $removeForm.on('click', function(e) {
        e.preventDefault();
        $form.remove();
    });
};