//function login
function handleLogin(event) {
   
    document.querySelector('.preloader').style.display = 'flex';
    setTimeout(() => {
    }, 2000); 
}

function handleRegister(event) {

    event.preventDefault(); // Mencegah pengiriman form default
        const nama = document.querySelector('input[name="pekerja_nama"]').value;
        const alamat = document.querySelector('input[name="pekerja_alamat"]').value;
        const email = document.querySelector('input[name="pekerja_email"]').value;
        const ttl = document.querySelector('input[name="pekerja_ttl"]').value;
        const prov = document.querySelector('select[name="pekerja_provinsi"]').value;
        const kota = document.querySelector('select[name="pekerja_kota"]').value;
        const kecamatan = document.querySelector('select[name="pekerja_kecamatan"]').value;

        if (!nama || !alamat || !email || !ttl || !prov || !kota || !kecamatan) {
            valid = false;
        }

    if (valid) {
        Swal.fire({
            icon: 'success',
            title: 'Registrasi berhasil',
            text: 'Akun Anda telah dibuat.',
        }).then(() => {
            window.location.href = 'login.html';
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Registrasi gagal',
            text: 'Harap isi semua kolom yang diperlukan.',
        });
    }
}

//mengisi district
const provinces = {
    "Jawa Barat": ["Bandung", "Bogor", "Bekasi","Subang"],
    "Jawa Tengah": ["Semarang", "Surakarta", "Magelang"],
    "Jawa Timur": ["Surabaya", "Malang", "Kediri"]
};

const districts = {
    "Bandung": ["Andir", "Astana Anyar", "Bojongloa Kaler"],
    "Bogor": ["Bogor Barat", "Bogor Timur", "Bogor Utara"],
    "Bekasi": ["Bekasi Barat", "Bekasi Timur", "Bekasi Utara"],
    "Subang": ["Kasomalang", "Cisalak", "Jalan Cagak"],
    "Semarang": ["Banyumanik", "Candisari", "Gajah Mungkur"],
    "Surakarta": ["Banjarsari", "Jebres", "Laweyan"],
    "Magelang": ["Magelang Selatan", "Magelang Tengah", "Magelang Utara"],
    "Surabaya": ["Asemrowo", "Benowo", "Bubutan"],
    "Malang": ["Blimbing", "Kedungkandang", "Klojen"],
    "Kediri": ["Mojoroto", "Pesantren", "Kota"]
};

document.addEventListener("DOMContentLoaded", () => {
    const provinceSelects = document.querySelectorAll("select[id$='_provinsi']");
    provinceSelects.forEach(select => {
        select.innerHTML = '<option value="">Pilih Provinsi...</option>' +
            Object.keys(provinces).map(province => `<option value="${province}">${province}</option>`).join('');
    });
});

function updateCities(role) {
    const province = document.getElementById(`${role}_provinsi`).value;
    const citySelect = document.getElementById(`${role}_kota`);
    if (province) {
        citySelect.innerHTML = '<option value="">Pilih Kota...</option>' +
            provinces[province].map(city => `<option value="${city}">${city}</option>`).join('');
    } else {
        citySelect.innerHTML = '<option value="">Pilih Kota...</option>';
    }
    document.getElementById(`${role}_kecamatan`).innerHTML = '<option value="">Pilih Kecamatan...</option>';
}

function updateDistricts(role) {
    const city = document.getElementById(`${role}_kota`).value;
    const districtSelect = document.getElementById(`${role}_kecamatan`);
    if (city) {
        districtSelect.innerHTML = '<option value="">Pilih Kecamatan...</option>' +
            districts[city].map(district => `<option value="${district}">${district}</option>`).join('');
    } else {
        districtSelect.innerHTML = '<option value="">Pilih Kecamatan...</option>';
    }
}