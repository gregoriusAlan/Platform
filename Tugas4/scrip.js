const nama = document.querySelector('nama')
const jmlPilihan = document.querySelector('pilihan');

var tampung = [];

btn.addEventListener('click', tombolOK);

function tombolOK() {
    var nama = nama.value.trim();
    var pilihan = jmlPilihanPilihan.value;
    if (nama == '' || pilihan == '') {
        alert('jangan ada yang kosong');
    } else {
        inputPilih();
    }
}