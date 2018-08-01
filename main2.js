const selectBox = document.getElementById('type-selector');
const hiddenFields = document.querySelectorAll('.switcher');

let selectedInput, selectedType;

// listening to changes in selected type by type switcher
    selectBox.addEventListener('change', handleSelectBoxChange);

// looking through all swithcers, giving them class = hidden. For the selected one, removing class.
    function handleSelectBoxChange(event) {
        selectedType = event.srcElement.selectedOptions[0].dataset.type;
        selectedInput = document.getElementById(selectedType + '-input');

        hiddenFields.forEach(function (field) {
            if (!field.classList.contains('hidden')) {
                field.classList.add('hidden');
            };
        });
        
        selectedInput.classList.remove('hidden');
    };