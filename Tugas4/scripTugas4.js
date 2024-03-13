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
