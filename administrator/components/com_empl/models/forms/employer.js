var url = "/index.php?option=com_projects&task=api.getCities&api_key=4n98tpw49vtpw496npyww9p6by";
window.onload = function () {
    //Сохранение активной вкладки на странице
    jQuery('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        // save the latest tab; use cookies if you like 'em better:
        localStorage.setItem('lastTab', jQuery(this).attr('href'));
    });
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
        jQuery('[href="' + lastTab + '"]').tab('show');
    }

    let select_elem = jQuery("#jform_cityID");
    select_elem.chosen();
    let f = document.querySelector(".chzn-search input");
    unlockSearchCity(f);
    loadCity();
    jQuery(f).autocomplete({source: function () {
            let val = f.value;
            if (val.length < 2) return;
            jQuery.getJSON(`${url}&q=${val}`, function (json) {
                select_elem.empty();
                jQuery.each(json, function (idx, obj) {
                    select_elem.append(`<option value="${obj.id}">${obj.name} (${obj.region})</option>`);
                });
                select_elem.chosen({width: "95%"});
                select_elem.trigger("liszt:updated");
                unlockSearchCity(f);
                f.value = val;
            });
        }
    });
};

function unlockSearchCity(f) {
    let chzn = document.querySelector("#jform_cityID_chzn");
    chzn.classList.remove("chzn-container-single-nosearch");
    f.removeAttribute('readonly');
}

function loadCity() {
    let id = document.querySelector("#jform_hidden_city_id").value;
    let title = document.querySelector("#jform_hidden_city_title").value;
    if (id === '') id = 4400;
    if (title === '') title = 'Москва (Москва и Московская область)';
    let f = document.querySelector(".chzn-search input");
    let select_elem = jQuery("#jform_cityID");
    select_elem.append(`<option value="${id}">${title}</option>`);
    select_elem.chosen({width: "95%"});
    select_elem.trigger("liszt:updated");
    unlockSearchCity(f);
}