document.addEventListener('DOMContentLoaded', (event) => {
    const kuotaCutiTahunan = document.getElementById('kuota_cuti_tahunan');
    const cutiN1 = document.getElementById('cutiN_1');
    const cutiN2 = document.getElementById('cutiN_2');
    const kuotaCuti = document.getElementById('kuota_cuti');

    function calculateQuota() {
        const total = parseFloat(kuotaCutiTahunan.value || 0) + parseFloat(cutiN1.value || 0) + parseFloat(cutiN2.value || 0);
        kuotaCuti.value = total;
    }

    kuotaCutiTahunan.addEventListener('input', calculateQuota);
    cutiN1.addEventListener('input', calculateQuota);
    cutiN2.addEventListener('input', calculateQuota);
});
