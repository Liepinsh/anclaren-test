const hiddenInput = document.getElementById('data');
const checkBoxes = document.querySelectorAll('.item-checkbox');
const selectAll = document.getElementById('clickAll');

let itemsIdToDelete = [];

// creating a loop, to listen to clicks
    checkBoxes.forEach(function (checkBox) {
        checkBox.addEventListener('click', checkBoxClickHandler);
    });

// creating a function, to send or delete id from array, if it's checked
    function checkBoxClickHandler(e) {
        const isChecked = e.srcElement.checked;
        if (isChecked) {
            itemsIdToDelete.push(e.srcElement.dataset.itemid);
        } else {
            itemsIdToDelete.splice(itemsIdToDelete.indexOf(e.srcElement.dataset.itemid),1); //paskaties mdn index of
        }
        hiddenInput.value = itemsIdToDelete;
    };

// on click, selects all checkboxes and sends there id's to array
    selectAll.addEventListener('click', function(e){
        e.preventDefault();
        itemsIdToDelete = [];
        checkBoxes.forEach(function (checkBox) {
            itemsIdToDelete.push(checkBox.dataset.itemid);
        });
        hiddenInput.value = itemsIdToDelete;
        console.log(hiddenInput.value);
    });
        
// Checks all checkboxes
    $('#clickAll').click(function(){
        $(this).toggleClass('clicked');
        if ($(this).hasClass('clicked')){
            $('#allCheckoxes').find(':checkbox').prop('checked', true);
        }
    });
