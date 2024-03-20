
var namaInput = document.querySelector('#name');
var pilihanInput = document.querySelector('#pilihan');
var container = document.querySelector('.contain');
var btnOk = document.querySelector('#btn');

var tampung = [];
var pilihan;
var nama;
var txtARy = '';

btnOk.addEventListener('click',tombolOk);
function tombolOk() {
    nama = namaInput.value.trim();
    pilihan = pilihanInput.value;
    if (nama == '' || pilihan == '') {
        alert('jangan ada yang kosong');
    } else {
        inputPilih();
    }
}

function inputPilih() {
    btn.remove();
    const element = document.querySelectorAll('.form-group')
    element.forEach(function(e) {
        e.parentNode.removeChild(e);
    });

    var batas = parseInt(pilihanInput.value.trim());
    for (let index = 0; index < batas; index++) {
        const pilih = document.createElement('div');
        pilih.classList.add('Tugas4.html');

        const label = document.createElement('label');
        label.textContent = 'pilihan' + (index + 1) + ':';
        label.setAttribute('for', 'pilihan');

        const input = document.createElement('input');
        input.type = 'text';
        input.setAttribute('id', 'pilihan');


        pilih.appendChild(label);
        pilih.appendChild(input);
        container.appendChild(pilih);
    }

    const ok = document.createElement('button');
    ok.type = 'submit';
    ok.setAttribute('id', 'btnOK');
    ok.textContent = 'OK';
    container.appendChild(ok);

    const okb = document.querySelector('#btnOK');
    okb.addEventListener('click', function(e) {
        const inp = document.querySelectorAll('#pilihan')
        for (let index = 0; index < inp.length; index++) {
            tamp[index] = inp[index].value;

        }
        inputHobi();
        ok.disabled = true;
    });
}

//function inputHobi() {
    const containDrop = document.createElement('div');
    containDrop.setAttribute('class', 'form-group');

    const hobiLabel = document.createElement('label');
    hobiLabel.textContent = 'Hobi';
    hobiLabel.setAttribute('for', 'hobi');

    const hobiSelect = document.createElement('select');
    hobiSelect.setAttribute('id', 'hobi');

    const hobi = ['membaca', 'sepakbola'];

    //hobi.forEach(function(hobi) {
        const optionElement = document.createElement('option');
        optionElement.textContent = hobi;
        // optionElement.value = hobi;
        hobiSelect.appendChild(optionElement);
    //});

    const defaultOption = document.createElement('option');
    defaultOption.textContent = 'Pilih Hobi';
    defaultOption.setAttribute('disabled', 'disabled');
    defaultOption.setAttribute('selected', 'selected');
    hobiSelect.insertBefore(defaultOption, hobiSelect.firstChild);

    containDrop.appendChild(hobiLabel);
    containDrop.appendChild(hobiSelect);
    container.appendChild(containDrop);

    const ok1 = document.createElement('button');
    ok1.type = 'submit';
    ok1.setAttribute('id', 'btn_ok');
    ok1.textContent = 'submit';
    container.appendChild(ok1);
   
