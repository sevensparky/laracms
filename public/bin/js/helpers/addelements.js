let company = 1
let writer = 1
let translator = 1
let photographer = 1
let journalist = 1
let author = 1;
function addCompanies(name, id, label) {
    if (company < 5) {
        let div = `<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="${name}">${label}
        <span class="required">*</span>
    </label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" name="${name}[]" id="${name}"
                class="form-control col-md-7 col-xs-12" placeholder="${label} را وارد کنید...">
    </div>
</div> <br>`;
        $(`#${id}`).append(div)

    }

    company++
    if (company >= 6) {
        alert("امکان ایجاد فیلد بیشتر امکان پذیر نمی باشد")
    }
}

function addWriters(name, id, label) {
    if (writer < 5) {
        let div = `<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="${name}">${label}
        <span class="required">*</span>
    </label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" name="${name}[]" id="${name}"
                class="form-control col-md-7 col-xs-12" placeholder="${label} را وارد کنید...">
    </div>
</div> <br>`;
        $(`#${id}`).append(div)

    }

    writer++
    if (writer >= 6) {
        alert("امکان ایجاد فیلد بیشتر امکان پذیر نمی باشد")
    }
}

function addTranslators(name, id, label) {
    if (translator < 5) {
        let div = `<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="${name}">${label}
        <span class="required">*</span>
    </label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" name="${name}[]" id="${name}"
                class="form-control col-md-7 col-xs-12" placeholder="${label} را وارد کنید...">
    </div>
</div> <br>`;
        $(`#${id}`).append(div)

    }

    translator++
    if (translator >= 6) {
        alert("امکان ایجاد فیلد بیشتر امکان پذیر نمی باشد")
    }
}


function addPhotographers(name, id, label) {
    if (photographer < 5) {
        let div = `<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="${name}">${label}
        <span class="required">*</span>
    </label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" name="${name}[]" id="${name}"
                class="form-control col-md-7 col-xs-12" placeholder="${label} را وارد کنید...">
    </div>
</div> <br>`;
        $(`#${id}`).append(div)

    }

    photographer++
    if (photographer >= 6) {
        alert("امکان ایجاد فیلد بیشتر امکان پذیر نمی باشد")
    }
}


function addJournalists(name, id, label) {
    if (journalist < 5) {
        let div = `<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="${name}">${label}
        <span class="required">*</span>
    </label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" name="${name}[]" id="${name}"
                class="form-control col-md-7 col-xs-12" placeholder="${label} را وارد کنید...">
    </div>
</div> <br>`;
        $(`#${id}`).append(div)

    }

    journalist++
    if (journalist >= 6) {
        alert("امکان ایجاد فیلد بیشتر امکان پذیر نمی باشد")
    }
}

function addAuthors(name, id, label) {
    if (author < 5) {
        let div = `<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="${name}">${label}
        <span class="required">*</span>
    </label>
    <div class="col-md-9 col-sm-9 col-xs-12">
        <input type="text" name="${name}[]" id="${name}"
                class="form-control col-md-7 col-xs-12" placeholder="${label} را وارد کنید...">
    </div>
</div> <br>`;
        $(`#${id}`).append(div)

    }

    author++
    if (author >= 6) {
        alert("امکان ایجاد فیلد بیشتر امکان پذیر نمی باشد")
    }
}
