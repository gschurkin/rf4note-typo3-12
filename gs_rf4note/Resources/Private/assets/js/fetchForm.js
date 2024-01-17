const getAsyncForm = async(url,body) => {
    const response = await fetch(url,{
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: body,
    });
    const data = await response.json();
    return data;
}

function changeFormFish(url) {
    var reservoirSelect = document.querySelector('.point .reservoir');
    reservoirSelect.addEventListener('change', function() {
        var body = 'tx_gsrf4note_point[point][reservoir]='+this.value;
        if (body) {
            getAsyncForm(url,body)
            .then(function(response){
                var fishesSelect = document.querySelector('.point .fishes');
                var pos = document.querySelector('.point .pos-col');
                var fishesCol = document.querySelector('.point .fishes-col');
                fishesSelect.innerHTML = '';
                for (var key in response) {
                    if (response.hasOwnProperty(key)) {
                        var option = document.createElement('option');
                        option.value = key;
                        option.textContent = response[key];
                        fishesSelect.appendChild(option);
                    }
                }
                fishesCol.className = 'fishes-col';
                pos.className = 'pos-col';
            })
            .catch(err => console.log('rejected:', err));
        }
    });
}

function changeFormFishingtypes() {
    var fishSelect = document.querySelector('.point .fishes');
    fishSelect.addEventListener('change', function() {
        var fishingtypesSelect = document.querySelector('.point .fishingtypes-col');
        fishingtypesSelect.className = 'fishingtypes-col';
    })
}

function changeFormLure(url) {
    var fishingtypeSelect = document.querySelector('.point .fishingtypes');
    fishingtypeSelect.addEventListener('change', function() {
        var body = 'tx_gsrf4note_point[point][fishingtypes]='+this.value;
        if (body) {
            getAsyncForm(url,body)
            .then(function(response){
                var luresSelect = document.querySelector('.point .lures');
                var luresCol = document.querySelector('.point .lures-col');
                var descriptionCol = document.querySelector('.point .description-col');

                luresSelect.innerHTML = '';
                for (var key in response) {
                    if (response.hasOwnProperty(key)) {
                        var option = document.createElement('option');
                        option.value = key;
                        option.textContent = response[key];
                        luresSelect.appendChild(option);
                    }
                }
                luresCol.className = 'lures-col';
                descriptionCol.className = 'description-col';
            })
            .catch(err => console.log('rejected:', err));
        }
    })
}

document.addEventListener('DOMContentLoaded', () => {
    if (url = document.querySelector('[data-fetch]')) {
        changeFormFish(url.dataset.fetch);
        changeFormFishingtypes();
        changeFormLure(url.dataset.fetch);
    }
});
