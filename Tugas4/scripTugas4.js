var namaInput = document.querySelector('#namaInput');
var pilihanInput = document.querySelector('#pilihanInput');
var container = document.querySelector('.container')
const btnOk = document.querySelector('#btnOk');

var tampung = [];
var pilihan;
var nama;

btnOk.addEventListener('click', tombolOk);

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

    var batas = parseInt(inputPilihan.value.trim());
    for (let index = 0; index < batas; index++) {
        const pilih = document.createElement('div');
        pilih.classList.add('form-group');

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
   
